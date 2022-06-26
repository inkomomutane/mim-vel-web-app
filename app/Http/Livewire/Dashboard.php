<?php

namespace App\Http\Livewire;

use App\Models\Agenda;
use App\Models\Imovel;
use App\Models\User;
use Awssat\Visits\Models\Visit;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{

    public $dates = "";
    public $dateRangeLabels;
    public $data;
    public function mount()
    {
        $this->data = $this->getData();
        $this->dates = "01-01-". now()->year . " A " . "31-12-" . now()->year;
        $this->dateRangeLabels = [];
    }

    public function render()
    {
        return view('livewire.dashboard',[
            'imoveis' => Imovel::count(),
            'users' => User::count(),
            'visitas' => visits('App\Models\Imovel')->count(),
            'mensagens' => Agenda::where('is_readed',false)->count()
        ]);
    }

    public function setDates(string $dates)
    {

        $this->dates = $dates;
    }

    public function getData()
    {
        $data = array();
        for ($i = 1; $i <= 12; $i++) {
            $sum = Visit::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->count();
            array_push($data, $sum);
        }
        return collect($data);
    }
    public function send():void{}


}
