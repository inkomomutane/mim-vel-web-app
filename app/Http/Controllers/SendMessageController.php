<?php

namespace App\Http\Controllers;

use App\Mail\SendMailFromContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMessageController extends Controller
{
    public function index(Request $request )
    {
        $mailMessage = $request->validate([
            'name' => 'required|string|max:125',
            'email' => 'required|email',
            'subject' => 'required|string|max:125',
            'contactMessageText' => 'required|string'
        ]);

        if($mailMessage){
            try {
                Mail::to('assistencia.mimovel@gmail.com')
                    ->cc(request()->email)
                    ->queue(new SendMailFromContacto(
                        (object) [
                            'name'=> request()->name,
                            'email'=> request()->email,
                            'subject'=> request()->subject,
                            'contactMessageText'=> request()->contactMessageText,
                        ]
                    ));
                $this->flasher->addSuccess('Messagem enviada com sucesso!');
            return redirect()->route('contacto');
            } catch (\Throwable $th) {
                $this->flasher->addError('Erro ao enviar mensagem !');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
