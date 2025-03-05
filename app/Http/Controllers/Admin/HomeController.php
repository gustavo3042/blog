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
use Psy\VersionUpdater\Checker;

class HomeController extends Controller
{
    public function index(Request $request){


     $startOfMonth = Carbon::now()->startOfMonth();
     $endOfMonth = Carbon::now()->endOfMonth();

      $totalVentas = CheckList::join('presupuestos','presupuestos.check_lists_id','=','check_lists.id')
      
      ->whereBetween('check_lists.fecha',[$startOfMonth, $endOfMonth])->sum('presupuestos.total');



    $totalCompras = CheckList::join('presupuestos','presupuestos.check_lists_id','=','check_lists.id')
    ->join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
   // ->where('check_lists.statusNow',2)
    ->whereBetween('check_lists.fecha', [$startOfMonth, $endOfMonth])
    ->sum('presupuesto_details.totalRepuestos');
 
   $obInsumos = Insumo::whereBetween('created_at',[$startOfMonth, $endOfMonth])->get();

   
      $a = array();
      $totalFinal = 0;

       foreach ($obInsumos as $item) {

        $a[] = $item->precioCompra * $item->stock;
        $totalFinal +=$item->precioCompra * $item->stock;
      } 

            $allMonths1 = array_fill(1, 12, 0);


            $totals1 =   DB::table('check_lists')
            ->join('presupuestos','presupuestos.check_lists_id','=','check_lists.id')
            
            ->select(
            DB::raw('SUM(presupuestos.total) as total'),
            DB::raw('MONTH(check_lists.fecha) as month'))
            ->groupBy('month')
            ->get()
            ->keyBy('month','statusNow')
            ->map(function ($item) {
                return 
                  $item->total;  
            })
            ->toArray(); 

            $totals = array_replace($allMonths1, $totals1);




         $inicioDeMes = Carbon::now()->startOfMonth();
         $finDeMes = Carbon::now()->endOfMonth();
      
         $registros = CheckList::whereBetween('created_at', [$inicioDeMes, $finDeMes])->get();

         if ($request->fecha_inicio && $request->fecha_fin) {
          $registros = CheckList::whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])->get();
         }

         // Cargar la relación uno a muchos de los registros
         $registros->load('presupuestos');
             

            $allMonths = array_fill(1, 12, 0);
       

            $totalsComprasMes = DB::table('check_lists')
            ->join('presupuestos','presupuestos.check_lists_id','=','check_lists.id')
            ->join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
          
            ->select(DB::raw('SUM(presupuesto_details.totalRepuestos) as total, MONTH(check_lists.fecha) as month'))
           
            ->groupBy('month')
          /*   ->orderBy('month') */
            ->get()
            ->keyBy('month')
            ->map(function ($item) {

              
                return

                 $item->total;
                  
                
            })
            ->toArray();

            $totalComprasMes = array_replace($allMonths, $totalsComprasMes);

        //   dd($totalComprasMes);
    

  $sales = Presupuesto::all();
  $chartData = [
      'labels' => $sales->pluck('total'),
      'data' => $sales->pluck('subtotal')
  ];

  $checkList = CheckList::all();



      return view('admin.index',compact('checkList','totals','totalComprasMes','totalVentas','totalCompras','registros','totalFinal'));


    }


    public function show($id){


       //dd('holis');
       
      return view('admin.show',compact('id'));

    }
}
