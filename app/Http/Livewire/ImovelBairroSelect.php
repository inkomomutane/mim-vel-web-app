<?php

namespace App\Http\Livewire;

use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Province;
use Livewire\Component;

class ImovelBairroSelect extends Component
{

    public $provinces;
    public $provinceId;

    public $cidades;
    public $cidadeId;

    public $bairros;
    public $bairroId;

    public function mount(int $bairroId = null)
    {
        $this->provinces = Province::all();

        if ($bairroId) {
            $bairro =  Bairro::where('id', $bairroId)->with('cidade.province')->first();
            $this->provinceId = $bairro->cidade->province->id;
            $this->updatedProvinceId($this->provinceId,$bairro->cidade->id);
            $this->updatedCidadeId(cidadeId: $bairro->cidade->id, bairroId: $bairro->id);
        } else {
            if (!$this->isNullOrEmpty($this->provinces)) {
                $this->provinceId = $this->provinces->first()->id;
                $this->updatedProvinceId($this->provinceId);
            }
        }
    }

    public function updatedProvinceId(int $provinceId,?int $cidadeId = null)
    {
        if($provinceId){$this->provinceId = $provinceId;}
        $this->cidades = Cidade::where('province_id', $this->provinceId)->get();
        if (!$this->isNullOrEmpty($this->cidades) && is_null($cidadeId)) {
            $this->cidadeId = $this->cidades->first()->id;
            $this->updatedCidadeId(cidadeId: $this->cidadeId);
        }else{
            $this->updatedCidadeId(cidadeId: $cidadeId);
        }
    }

    public function updatedCidadeId(int $cidadeId, ?int $bairroId = null)
    {
        $this->bairros = Bairro::where('cidade_id', $cidadeId)->get();
        if (!$this->isNullOrEmpty($this->bairros) && is_null($bairroId)) {
            $this->bairroId = $this->bairros->first()->id;
        } else {
            $this->bairroId = $bairroId;
        }
    }



    private function isNullOrEmpty(mixed $collection): bool
    {
        return (is_null($collection) ||  (count($collection) < 1));
    }


    public function render()
    {
        return view('livewire.imovel-bairro-select');
    }


    public function filterSelection(int $bairroId = null)
    {
        $bairro = Bairro::where('id', $bairroId)->with('cidade.province')->first();
        if ($bairro) {
            $this->bairroId = $bairro->id;
            $this->cidadeId = $bairro->cidade->id;
            $this->provinceId = $bairro->cidade->province->id;
        } else
            $this->provinces = Province::all();
    }
}
