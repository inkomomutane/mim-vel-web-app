<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Http\Requests\Imovel\ImovelCreateRequest;
use App\Http\Requests\Imovel\ImovelUpdateRequest;
use App\Models\Bairro;
use App\Models\Condicao;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Intervention\Image\Facades\Image;
use Jorenvh\Share\ShareFacade;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.imovel.index')->with('imovels',Imovel::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.imovel.create_edit',[
            'bairros' => Bairro::all(),
            'condicaos' => Condicao::all(),
            'tipo_de_imovels' => TipoDeImovel::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImovelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImovelCreateRequest $request)
    {
        try {
           $data = $request->all();
           $data['corretor_id'] = auth()->user()->id;
                $imovel = Imovel::create($data);
                if(request()->hasFile('image')){
                   foreach ($request->image as  $image) {
                       $imovel->addMedia($image)
                       ->withResponsiveImages()
                       ->toMediaCollection('posts','posts');
                   }
                }
            session()->flash('success', 'Imovel criado com sucesso.');
           return redirect()->route('imovel.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação do imovel.');
           return redirect()->route('imovel.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        return view('website.post')->with('imovel',$imovel)->with('socialMedias',
        ShareFacade::page(route('posts.show',$imovel->slug), 'Share title')
        ->facebook()
        ->twitter()
        ->linkedin()
        ->reddit()
        ->telegram()
        ->whatsapp()->getRawLinks());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        return view('backend.imovel.create_edit',[
            'bairros' => Bairro::all(),
            'condicaos' => Condicao::all(),
            'tipo_de_imovels' => TipoDeImovel::all(),
            'statuses' => Status::all()
        ])->with('imovel',$imovel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImovelRequest  $request
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(ImovelUpdateRequest $request, Imovel $imovel)
    {
        try {
            $imovel->update($request->all());
            if(request()->hasFile('image')){
                foreach ($request->image as  $image) {
                 try {
                    $imovel->addMedia($image)
                    ->withResponsiveImages()
                    ->toMediaCollection('posts','posts');
                 } catch (\Throwable $th) {
                     throw $th;
                 }
                }
             }
            session()->flash('success', 'Imovel actualizado com sucesso.');
            return redirect()->route('imovel.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na actualização da imovel.');
            return redirect()->route('imovel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        if (!is_null($imovel)) {
            try {
                $imovel->delete();
                session()->flash('success', 'Imovel deletado com sucesso.');
                return redirect()->route('imovel.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar imovel.');
                return redirect()->route('imovel.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('imovel.index');
        }
    }
}
