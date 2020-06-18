<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReseived;



class MessageController extends Controller
{
    public function store() {
        $mes = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);


        Mail::to('vasquezh1992@gmail.com')->queue(new MessageReseived($mes));

        return back()->with('status', 'Tu mensaje fue enviado, te responderemos en menos de 24 horas.');
    }
}
