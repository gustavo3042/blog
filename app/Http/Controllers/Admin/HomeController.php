<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckList;
use App\Models\Insumo;
use App\Models\Presupuesto;
use App\Models\PresupuestoDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){

     // dd('holis');

   // $totales = Presupuesto::all();
   // $productosvendidos = PresupuestoDetails::all();

     $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $totalVentas = Presupuesto::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('total');

/* 
    $totalCompras = Presupuesto::join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('totalRepuestos'); */

    $totalCompras = CheckList::join('presupuestos','presupuestos.check_lists_id','=','check_lists.id')
    ->join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
   // ->where('check_lists.statusNow',2)
    ->whereBetween('check_lists.created_at', [$startOfMonth, $endOfMonth])
    ->sum('presupuesto_details.totalRepuestos');
 

  
   // $totalInsumos = Insumo::whereBetween('created_at',[$startOfMonth, $endOfMonth])->sum('stock');
    //$compraInsumos = Insumo::whereBetween('created_at',[$startOfMonth, $endOfMonth])->sum('precioCompra');

    $obInsumos = Insumo::whereBetween('created_at',[$startOfMonth, $endOfMonth])->get();

   // $totalFinal = ($totalInsumos*$compraInsumos) + $totalCompras;

    
      $a = array();
      $totalFinal = 0;

       foreach ($obInsumos as $item) {

        $a[] = $item->precioCompra * $item->stock;
        $totalFinal +=$item->precioCompra * $item->stock;
      } 

   // dd($obInsumos,$totalFinal);
 
    //dd($startOfMonth,$endOfMonth,$totalCompras);
/* 
    $chartData = [
      'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
      'data' => [65, 59, 80, 81, 56]
  ]; */





            $totals = Presupuesto::join('check_lists','check_lists.id','=','presupuestos.check_lists_id')
            ->select('check_lists.statusNow as statusNow',
            DB::raw('SUM(presupuestos.total) as total'),
            DB::raw('MONTH(presupuestos.created_at) as month'))
            ->where('check_lists.statusNow',2)
            ->groupBy('month','statusNow')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return 
                  $item->total;  
            })
            ->toArray(); 

            

          /*   $this->coursesAll = Course::where('teachingType_id', $dt)->with('grade')->get(); */

          //$id = 1; 
         // $m = CheckList::where('statusNow','!=',1)->with('presupuestos')->get();
          //  $m = CheckList::where('statusNow',0)->get();
         /*  */

         $inicioDeMes = Carbon::now()->startOfMonth();
         $finDeMes = Carbon::now()->endOfMonth();
      
         $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->get();

         // Cargar la relación uno a muchos de los registros
         $registros->load('presupuestos');
           
       //  dd($registros);

      

        

            $totalComprasMes = DB::table('presupuestos')
            ->join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
          
            ->select(DB::raw('SUM(presupuesto_details.totalRepuestos) as total, MONTH(presupuestos.created_at) as month'))
           
            ->groupBy('month')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return $item->total;
            })
            ->toArray();

           // dd($totalComprasMes);
    

  $sales = Presupuesto::all();
  $chartData = [
      'labels' => $sales->pluck('total'),
      'data' => $sales->pluck('subtotal')
  ];

      return view('admin.index',compact('totals','totalComprasMes','totalVentas','totalCompras','registros','totalFinal'));


    }
}
