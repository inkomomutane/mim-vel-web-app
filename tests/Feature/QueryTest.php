<?php

namespace Tests\Feature;

use App\Models\Imovel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class QueryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $imovels = Imovel::all();

        $requestArray =[(object) array(
            'function' => 'where',
            'key' => 'id',
            'operator' => '=',
            'value' => 228
        ),(object) array(
            'function' => 'where',
            'key' => 'id',
            'operator' => '=',
            'value' => 228
       )];

       dd($this->filter($imovels,$requestArray));

        if($this->filter($imovels,$requestArray) == []) $this->assertTrue(true);
        else $this->assertFalse(false);
    }


    public function filter(Collection $Modelcollection, mixed $requestArray): Collection
    {
        $Modelcollection = $Modelcollection;
        foreach ($requestArray as $requestBind) {
            $Modelcollection = $Modelcollection
                ->when($requestBind, function ($query, $requestBind) {
                    if($requestBind->function == 'whereIn'){
                        $temp = $requestBind->function;
                        return $query->$temp($requestBind->key,$requestBind->value);
                    }else{
                        $temp = $requestBind->function;
                        return $query->$temp($requestBind->key,$requestBind->operator,$requestBind->value);
                    }
                });
        }
        return $Modelcollection;
    }
}
