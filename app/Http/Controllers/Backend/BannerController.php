<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Flasher\Notyf\Prime\NotyfFactory;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BannerController extends Controller
{
    private Banner $banner;



    public function __construct() {
        if(Banner::all()->isEmpty()) {Banner::create([]);}
        $this->banner = Banner::first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.index')->with('images',
        Banner::first()->media() ->where('collection_name','banners')->paginate(8));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($request->hasFile('image')){
                foreach ($request->image as  $image) {
                    $this->banner->addMedia($image)
                    ->withResponsiveImages()
                    ->toMediaCollection('banners','banners');
                }
             }
             $this->flasher->addSuccess('Imagens adicionadas com sucesso!');
            return redirect()->route('banner.index');
        } catch (\Throwable $th) {
            // throw $th;
            $this->flasher->addErr('Erro ao adicionar imagens! Por favor contacte o Técnico!');
            return redirect()->back();
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        try {
            $media->delete();
            $this->flasher->addSuccess('A imagem foi deletada com sucesso!');
            return redirect()->route('banner.index');
        } catch (\Throwable $th) {
            //throw $th;
            $this->flasher->addErr('Erro ao deletar imagem por favor contacte o Técnico!');
            return redirect()->route('banner.index');
        }
    }
}
