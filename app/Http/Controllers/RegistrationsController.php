<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Student;
use App\Entities\Course;
use App\Entities\Registration;

class RegistrationsController extends Controller
{
   
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
}
