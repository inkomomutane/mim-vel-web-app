<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Agenda as AgendaModel;
use Livewire\WithPagination;

class Agenda extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $unreadMsg;
    public function mount()
    {
        $this->unreadMsg =AgendaModel::select(
            DB::raw(
            'count("select * from agendas where is_readed = 0") as count
          ')
          )->first()->count();
    }


    public function render()
    {
        return view('livewire.agenda',[
            'agendas' => AgendaModel::orderBy('is_readed','asc')
            ->orderBy('created_at','desc')->paginate(14),
            'unreadMsg' => $this->unreadMsg
        ]
        );
    }

    public function change($id)
    {
        try {
            $agenda =  AgendaModel::find($id);
            $agenda->is_readed = !$agenda->is_readed;
            $agenda->save();
            session()->flash('success', 'Mensagem de '. $agenda->nome_do_cliente . ' marcada como' .  ($agenda->is_readed ? 'lida.' : 'não lida.') . '.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao marcar a Mensagem '.$agenda->nome_do_cliente  .'  como '. ($agenda->is_readed ? 'lida.' : 'não lida.'));
        }
    }

}
