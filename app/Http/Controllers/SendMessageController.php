<?php

namespace App\Http\Controllers;

use App\Mail\SendMailFromContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Flasher\Prime\FlasherInterface;

class SendMessageController extends Controller
{
    public function index(Request $request ,FlasherInterface $flasher)
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
                $flasher->addSuccess('Messagem enviada com sucesso!');
            return redirect()->route('contacto');
            } catch (\Throwable $th) {
                $flasher->addError('Erro ao enviar mensagem !');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
