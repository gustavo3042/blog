<?php

namespace App\Http\Livewire\Admin\Compras;

use App\Models\CheckList;
use Livewire\Component;
use Livewire\WithPagination; 
use Carbon\Carbon;

class ComprasIndex extends Component
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

       // $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->get();

     

    /*    $compras = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->get();

       // Cargar la relación uno a muchos de los registros
       $compras->load('presupuestos');
 */

      $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->with('presupuestos')->get();

     // dd($registros);
       //dd($compras);


        return view('livewire.admin.compras.compras-index',compact('registros'));
    }
}
