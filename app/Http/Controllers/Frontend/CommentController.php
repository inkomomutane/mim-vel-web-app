<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'comentario' => 'required'
        ]);
        if($validate){
            $data = $request->all();
            $data = collect($data)->except('_token')->toArray();

            Comentario::updateOrCreate($data);
            session()->flash('success', 'Comentario feito com sucesso.');
            return redirect()->back();
        }
    }

}
