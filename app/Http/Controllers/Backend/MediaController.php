<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{

    public function index()
    {
        return view('backend.media.index')->with('images',Media::with('model')->paginate(8));
    }

    public function store(Imovel $imovel,Request $request)
    {
        try {

            if($request->hasFile('image')){
                foreach ($request->image as  $image) {
                    $imovel->addMedia($image)
                    ->withResponsiveImages()
                    ->toMediaCollection('posts','posts');
                }
             }
            session()->flash('success', 'As imagens foram adicionadas com sucesso.');
            return redirect()->route('media.show',[
                'imovel' => $imovel
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'Erro ao adicionar imagens! Por favor contacte o Técnico.');
            return redirect()->route('media.show',[
                'imovel' => $imovel
            ]);
        }
    }
    public function show(Imovel $imovel)
    {
        return view('backend.media.index')->with('images',
        Media::
        where('model_type','App\Models\Imovel')
        ->where('model_id',$imovel->id)->with('model')->paginate(8)
    )->with('imovel',$imovel);
    }

    public function destroy(Media $media)
    {
        try {
            $media->delete();
            session()->flash('success', 'A imagem foi deletada com sucesso.');
            return redirect()->route('media.index');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'Erro ao deletar imagem por favor contacte o Técnico.');
            return redirect()->route('media.index');
        }
    }
}
