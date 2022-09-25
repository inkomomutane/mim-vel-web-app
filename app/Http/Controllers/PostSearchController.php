<?php

namespace App\Http\Controllers;

use App\Aspect\PostSearchAspect;
use Illuminate\Support\Collection;
use Spatie\Searchable\Search;

class PostSearchController extends Controller
{
    public function search()
    {



        dd(request()->all());


        if (request()->home_link) {
            return view('website.posts', [
                'search' => request()->search
            ])
                ->with('posts', (((new Search())
                    ->registerAspect(PostSearchAspect::class)
                    ->search(request()->search ?? ''))
                    ->pluck('searchable')
                    ->whereIn(
                        'for_rent',
                        $this->arrayRequest(request()->rent) ?? [true, false, null]
                    )
                ));
        } else {
            return view('website.posts', [
                'search' => request()->search,
                'posts' => $this->filter((new Search())
                    ->registerAspect(PostSearchAspect::class)
                    ->search(request()->search ?? '')
                    ->pluck('searchable'), [
                    $this->geneartorClass('whereIn', 'bairro.id', request()->bairros),
                    $this->geneartorClass('whereIn', 'tipo_de_imovel.id', request()->tipo_de_imovels),
                    $this->geneartorClass('whereIn', 'condicao.id', request()->condicaos),
                    $this->geneartorClass('whereIn', 'status.id', request()->estados),
                    $this->geneartorClass('where', 'preco', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->min_price)), '>='),
                    $this->geneartorClass('where', 'preco', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->max_price)), '<='),
                    $this->geneartorClass('where', 'ano', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->ano)), '>='),
                    $this->geneartorClass('where', 'area', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->area)), '>='),
                    $this->geneartorClass('where', 'quartos', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->quartos)), '>='),
                    $this->geneartorClass('where', 'suites', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->suites)), '>='),
                    $this->geneartorClass('where', 'banheiros', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->banheiros)), '>='),
                    $this->geneartorClass('where', 'piscinas', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->piscinas)), '>='),
                    $this->geneartorClass('where', 'garagens', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->garagens)), '>='),
                    $this->geneartorClass('where', 'andares', str_replace([','], '.', str_replace(['(MZN) ', '.'], '', request()->andares)), '>='),
                    $this->geneartorClass('whereIn', 'for_rent', request()->rent ?? [true, false, null]),
                ])
            ]);
        }
    }
    private function arrayRequest($requestValue = null)
    {
        if ($requestValue == null) return null;
        return collect($requestValue)->except('search_terms')->toArray();
    }

    public function filter(Collection $Modelcollection, mixed $requestArray):Collection
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
}
