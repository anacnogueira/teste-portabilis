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
        $student = Student::find($id);

         return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);


         request()->validate([
            'name' => 'required|fullname', 
            'cpf' => 'required|cpf',
            'phone' => 'required|min:12',
            'rg' => 'required',
            'date_birth' => 'required|date_format:d/m/Y'
            ],[
            'required' => 'Campo obrigatório',
            'unique' =>'CPF já cadastrado',           
            'fullname' => 'Informe o nome completo',
            'cpf' => 'CPF inválido',
            'phone.min'  => 'O telefone deve ter 10 números ou mais',
            'date' => 'Data Inválida'
        ]);
       

        $data = $request->toArray();
        
        $student->update($data);

        return redirect()->route("alunos.index");
    }

    public function destroy($id)
    {
    	Student::find($id)->delete();

 

        return redirect()->route("alunos.index");
    }
}
