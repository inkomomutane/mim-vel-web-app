<?php

namespace App\Http\Controllers;

use App\Aspect\PostSearchAspect;
use App\Models\Imovel;
use Illuminate\Support\Collection;
use Spatie\Searchable\Search;

class PostSearchController extends Controller
{


    public function clearFilters()
    {
        request()->session()->forget('filter_posts');
        $this->flasher->addSuccess('Filtros da pesquisa foram removidos com sucesso');
        return redirect()->route('posts');
    }

    public function index()
    {
        return view('website.posts', [
            'posts' => Imovel::with('corretor')
                ->with('bairro')
                ->with('condicao')
                ->with('status')
                ->with('tipo_de_imovel')
                ->with('condicao')
                ->with('media')
                ->with('comentarios')
                ->with('imovelFor')
                ->with('ratings')
                ->paginate(10)
        ]);
    }


    public function search()
    {
        $request = $this->sessionUpdateFilter();

        $data = $this->filter((new Search())
                    ->registerAspect(PostSearchAspect::class)
                    ->search($request->search_term ?? '')
                    ->pluck('searchable'), [
                    $this->geneartorClass('whereIn', 'bairro.id', $request->bairros),
                    $this->geneartorClass('whereIn', 'tipo_de_imovel.id', $request->tipo_de_imovels),
                    $this->geneartorClass('whereIn', 'condicao.id', $request->condicaos),
                    $this->geneartorClass('whereIn', 'status.id', $request->estados),
                    $this->geneartorClass('where', 'preco', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->min_price)), '>='),
                    $this->geneartorClass('where', 'preco', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->max_price)), '<='),
                    $this->geneartorClass('where', 'ano', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->ano)), '>='),
                    $this->geneartorClass('where', 'area', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->area)), '>='),
                    $this->geneartorClass('where', 'quartos', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->quartos)), '>='),
                    $this->geneartorClass('where', 'suites', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->suites)), '>='),
                    $this->geneartorClass('where', 'banheiros', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->banheiros)), '>='),
                    $this->geneartorClass('where', 'piscinas', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->piscinas)), '>='),
                    $this->geneartorClass('where', 'garagens', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->garagens)), '>='),
                    $this->geneartorClass('where', 'andares', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', $request->andares)), '>='),
                    $this->geneartorClass('whereIn', 'for_rent', $request->rent ?? [true, false, null]),
                ]);
               $data = Imovel::with('ratings')
                ->with('corretor')
                ->with('bairro')
                ->with('condicao')
                ->with('status')
                ->with('tipo_de_imovel')
                ->with('condicao')
                ->with('media')
                ->with('comentarios')
                ->with('imovelFor')
                ->whereIn('id',$data->pluck('id'))->paginate(10);
                $data = $data->appends((array) $this->sessionUpdateFilter());

                return view('website.posts')->with('posts',$data);

    }
    // private function arrayRequest($requestValue = null)
    // {
    //     if ($requestValue == null) return null;
    //     return collect($requestValue)->except('search_terms')->toArray();
    // }

    public function filter(Collection $Modelcollection, mixed $requestArray): Collection
    {
        $Modelcollection = $Modelcollection;
        foreach ($requestArray as $requestBind) {
            if ($requestBind->value) {
                $Modelcollection = $Modelcollection->when($requestBind, function ($query, $requestBind) {
                    if ($requestBind->function == 'whereIn') {
                        $temp = $requestBind->function;
                        return $query->$temp($requestBind->key, $requestBind->value);
                    } else {
                        $temp = $requestBind->function;
                        return $query->$temp($requestBind->key, $requestBind->operator, $requestBind->value);
                    }
                });
            }
        }
        return $Modelcollection;
    }
    public function geneartorClass($function, $key, $value, $operator = null): object
    {
        return (object) array(
            'function' => $function,
            'key' => $key,
            'operator' => $operator,
            'value' => $value
        );
    }


    private function sessionUpdateFilter(){

        if (collect(request()->all())->isNotEmpty()) {
            request()->session()->forget('filter_posts');
            request()->session()->put('filter_posts', [
                'bairros' => request()->bairros,
                'tipo_de_imovels'    => request()->tipo_de_imovels,
                'condicaos'    => request()->condicaos,
                'estados'    => request()->estados,
                'min_price' => request()->min_price,
                'max_price' => request()->max_price,
                'rent'    => request()->rent,
                'ano'    => request()->ano,
                'area'    => request()->area,
                'quartos'    => request()->quartos,
                'suites'    => request()->suites,
                'banheiros' => request()->banheiros,
                'piscinas' => request()->piscinas,
                'garagens' => request()->garagens,
                'andares'    => request()->andares,
                'search_term' => request()->search_term
            ]);
        }
        return (object) request()->session()->get('filter_posts');
    }
}
