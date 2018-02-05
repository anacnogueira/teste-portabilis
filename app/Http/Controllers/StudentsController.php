<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::find($id);

        return view('students.show', compact('student'));       
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
       request()->validate([
            'name' => 'required|fullname', 
            'cpf' => 'required|cpf|unique:students,cpf',
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
        
        $student = Student::create($data); 

        return redirect()->route("alunos.index"); 
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
