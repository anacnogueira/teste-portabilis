<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Payment;

class PaymentsController extends Controller
{

    protected $types = [
        'registration_tax' => 'Matrícula',
        'monthly_amount' => 'Mensalidade'
    ];

    public function create($registration_id)
    {
       
        $types = $this->types;

       return view('payments.create', compact('registration_id','types'));
    }

    public function store(Request $request)
    {
        //Validação
        request()->validate([
            'type' => 'required', 
            'value_paid' => 'required',
            
            ],[
            'required' => 'Campo obrigatório',            
        ]); 

        $data = $request->toArray();
        $data['paid'] = 1;

        $payment = Payment::create($data); 

        if ($payment->type == "registration_tax") {
            $payment->registration->update([
                'paid' => 1,
                'active' => 1
            ]);
        }


        return redirect()->route("matriculas.show", ['id' => $data['registration_id']]); 
    }    
}
