<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Course;

class CoursesController extends Controller
{
     private $periods = [
        'matutino'=>'matutino', 
        'vespertino'=>'vespertino', 
        'noturno'=>'noturno', 
    ];


    public function index()
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::find($id);

        return view('courses.show', compact('course'));       
    }

    public function create()
    {
        $periods = $this->periods;

        return view('courses.create', compact('periods'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required', 
            'monthly_amount' => 'required',
            'registration_tax' => 'required',
            'period' => 'required|in:'.implode(',', $this->periods),
            'duration' => 'required|integer'
            ],[
            'required' => 'Campo obrigatório',
            'in' =>'Desconhecido',           
            'integer' => 'Deve ser um número inteiro',
        ]);       

        $data = $request->toArray();
        
        $student = Course::create($data); 

        return redirect()->route("cursos.index"); 
    }


    public function edit($id)
    {
        $course = Course::find($id);

        $course['monthly_amount'] = number_format($course->monthly_amount,2,',','.');

        $periods = $this->periods;

        return view('courses.edit', compact('course','periods'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);


        request()->validate([
            'name' => 'required', 
            'monthly_amount' => 'required',
            'registration_tax' => 'required',
            'period' => 'required|in:'.implode(',', $this->periods),
            'duration' => 'required|integer'
            ],[
            'required' => 'Campo obrigatório',
            'in' =>'Desconhecido',           
            'integer' => 'Deve ser um número inteiro',
        ]);   
       

        $data = $request->toArray();
        
        $course->update($data);

        return redirect()->route("cursos.index");
    }

    public function destroy($id)
    {
    	Course::find($id)->delete(); 

        return redirect()->route("cursos.index");
    }
}
