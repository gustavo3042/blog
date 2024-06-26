<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\CheckList;
use Livewire\Component;
use App\Models\Insumo;
use Livewire\WithPagination; 
use Carbon\Carbon;

class VentasIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";


    public function updatingSearch(){
      $this->resetPage();
    }

    public function render()
    {

        $inicioDeMes = Carbon::now()->startOfMonth();
        $finDeMes = Carbon::now()->endOfMonth();

        $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->with('presupuestos')->get();
        $insumos  = Insumo::whereBetween('created_at',[$inicioDeMes, $finDeMes])->get();

        return view('livewire.admin.ventas.ventas-index',compact('registros','insumos'));
    }
}
