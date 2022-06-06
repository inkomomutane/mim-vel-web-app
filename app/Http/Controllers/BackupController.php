<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function create()
    {
        try {
            Artisan::call('backup:clean');
            Artisan::call('backup:run');
            session()->flash('success', 'Backup criado com sucesso.');
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao criar backup! se persistir o problema contacte o Técnico.');
            return redirect()->route('dashboard');
        }
    }

    public function download()
    {

    }
}
