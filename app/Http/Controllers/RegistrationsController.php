<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Student;
use App\Entities\Course;
use App\Entities\Registration;
use Carbon\Carbon;

class RegistrationsController extends Controller
{
   
    protected $status = [
        'Não' => 'Sim',
        'Sim' => 'Não'
    ];


    public function index()
    {
        $years = array_combine(range(date("Y"), date("Y")-10), range(date("Y"), date("Y")-10));
        $courses = [];
        $students = [];
        $status = $this->status;


        $data = Course::orderBy('name', 'asc')->get();
        foreach ($data as $item) {
            $courses[$item->name] = $item->name;   
        }

        $data = Student::orderBy('name', 'asc')->get();
        foreach ($data as $item) {
            $students[$item->name] = $item->name;   
        }

        $registrations = Registration::all();

        return view('registrations.index', compact('registrations','years','courses','students','status'));
    }

    public function create()
    {
        $students   = [];
        $courses    = [];

        $year = date('Y');

        $data = Student::orderBy('name', 'asc')->get();
        foreach ($data as $item) {
            $students[$item->id] = $item->name;   
        }

        $data = Course::orderBy('name', 'asc')->get();
        foreach ($data as $item) {
            $courses[$item->id] = $item->name.' - '.$item->period;   
        }

        return view('registrations.create', compact('students','courses','year'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'student_id' => 'required|enrolled:student_id,course_id,year', 
            'course_id' => 'required',
            'year' => 'required|integer',
            ],[
            'required' => 'Campo obrigatório',     
            'integer' => 'Deve ser um número inteiro',
            'enrolled' => 'Aluno já matriculado neste ano letivo e periodo'
        ]);  

        $data = $request->toArray();
        $data['active'] = 0;
        $data['paid'] = 0;


        $student = Registration::create($data); 

        return redirect()->route("matriculas.index");       
    }

    public function edit($id)
    {
        $registration = Registration::find($id);

        $months_course = $registration->course->duration;

        $payments = $registration->payments->filter(function ($payment) {
            return $payment->type == "monthly_amount" && $payment->paid == 1;
        });

        $months_paid = count($payments->values());  

        $missing_months = $months_course - $months_paid;

        $fine_amount = ($registration->course->monthly_amount * $missing_months) * 0.1;

        return view('registrations.edit', compact('registration','missing_months','fine_amount'));

    }   

    public function update(Request $request, $id)
    {
        $registration = Registration::find($id)->update([
            'active' => 0,
            'canceled_at' => Carbon::now()
        ]);

        return redirect()->route("matriculas.show", ['id' => $id]); 
    } 


    public function show($id)
    {
        $registration = Registration::find($id);

        return view('registrations.show', compact('registration')); 
    }

    public function getValueCourse($id, $type)
    {
        $course = Registration::find($id)->course;

        return $course->{$type};
    }
}
