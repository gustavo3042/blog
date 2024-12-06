<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\CheckList;
use Livewire\Component;
use App\Models\Insumo;
use Livewire\WithPagination; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class VentasIndex extends Component
{

    use WithPagination;

    public $insumo_id;

    protected $paginationTheme = "bootstrap";


    public function updatingSearch(){
      $this->resetPage();
    }

    public function render()
    {

        $inicioDeMes = Carbon::now()->startOfMonth();
        $finDeMes = Carbon::now()->endOfMonth();

        $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->with('presupuestos')->get();


        $insumos = Insumo::with('ventas')->get();

       // dd($insumos);


       
        return view('livewire.admin.ventas.ventas-index',compact('registros','insumos'));
    }
}

     //   $insumos  = Insumo::whereBetween('created_at',[$inicioDeMes, $finDeMes])->get();
/* 
         $insumos = Insumo::join('venta_insumos','venta_insumos.insumo_id','=','insumos.id')
        ->select('insumos.id as id','insumos.descripcion as descripcion','insumos.stock as stock','insumos.precio as precio',
        'insumos.precioCompra as precioCompra','venta_insumos.precioVenta as precioVenta','venta_insumos.venta as venta',
        'venta_insumos.totalVenta as totalVenta','venta_insumos.insumo_id as insumo_id',
        'venta_insumos.fechaVenta as fechaVenta','insumos.name as name',
      
        DB::raw('SUM(venta_insumos.totalVenta) as total'),
        DB::raw('MONTH(venta_insumos.fechaVenta) as month'))
        
        ->whereBetween('venta_insumos.fechaVenta',[$inicioDeMes, $finDeMes])
        ->groupBy('id','descripcion','stock','precio','precioCompra','precioVenta','venta','totalVenta','insumo_id','fechaVenta','name')
      ->get()->keyBy('insumo_id'); 
 */
