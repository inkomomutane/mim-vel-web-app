<?php

namespace App\Http\Controllers;

use App\Events\Task;
use App\Http\Traits\RemoveAccent;
use App\Models\Foto;
use App\Models\WebLink;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebLinkController extends Controller
{
    use RemoveAccent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.web.weblink')->with('links',WebLink::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validade = $request->validate(
            [
                'icon'=>'required',
                'url'=>'required'
            ]
        );
        if($validade){
            try {
                WebLink::create($validade);
            session()->flash('success', 'Link criado com sucesso.');
            return redirect()->back();
            } catch (\Throwable $th) {

                    session()->flash('error', 'Erro na criação do link.');
                    return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebLink  $webLink
     * @return \Illuminate\Http\Response
     */
    public function show(WebLink $weblink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebLink  $webLink
     * @return \Illuminate\Http\Response
     */
    public function edit(WebLink $weblink)
    {
        return view('backend.web.weblink_crud')->with('weblink',$weblink);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebLink  $webLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebLink $weblink)
    {
        $validade = $request->validate(
            [
                'icon'=>'required',
                'url'=>'required'
            ]
        );
        if($validade){
            try {
                $weblink->update($validade);


            session()->flash('success', 'Link actualizado com sucesso.');
            return redirect()->back();
            } catch (\Throwable $th) {

                    session()->flash('error', 'Erro na actualização do link.');
                    return redirect()->back();
            }
        }
    }



    public function store_image(Request $request,WebLink $weblink)
    {
        $validation = $request->validate([
            'default_image_link' => 'required'
        ]);

        if ($validation) {
            try {
                $date = date_format((new DateTime('now'))," Y m d H i s");
                $path =  str_replace(" ", "_", $this->str_without_accents($weblink->url) . $date);
                $imageName = 'weblinks/' . $path . '.' . 'png';
                $image = str_replace('data:image/png;base64,', '', $request->default_image_link);
                $image = str_replace(' ', '+', $image);
                Storage::put('public/' . $imageName, base64_decode($image));
                Foto::create([
                    'fotable_id' =>$weblink->id,
                    'fotable_type' => 'App\Models\WebLink',
                    'url'=> $imageName
                ]);
                session()->flash('success', 'Foto criada com sucesso.');
                return redirect()->back();

            } catch (\Throwable $th) {

                session()->flash('error', 'Erro na criação da Foto.'.$th);
                return redirect()->back();
            }
        }
        session()->flash('error', 'Erro na criação da Foto.');
        return redirect()->back();
    }

    public function delete_image(Request $request,WebLink $weblink)
    {

        try {
            foreach($request->all() as $id => $value){
                if ($id != '_token') {
                     $foto = $weblink->fotos->where('id',$id)->first();
                     $foto->delete();
                   //  dd($value);
                     Storage::delete('public/'.$value);

                }
            }
            session()->flash('success', 'Fotos deletadas com sucesso.');
            return redirect()->back();

        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao deletar Fotos.'. $th);
            return redirect()->back();
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebLink  $webLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebLink $weblink)
    {

    }
}
