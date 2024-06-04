<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    $totalCompras = Presupuesto::join('presupuesto_details','presupuesto_details.presupuestos_id','=','presupuestos.id')
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('totalRepuestos');

    //dd($startOfMonth,$endOfMonth,$totalCompras);
/* 
    $chartData = [
      'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
      'data' => [65, 59, 80, 81, 56]
  ]; */



  $totals = DB::table('presupuestos')
           // ->join('check_lists','check_lists.id','=','presupuestos.check_lists_id')
            ->select(DB::raw('SUM(presupuestos.total) as total, MONTH(presupuestos.created_at) as month'))
            //->where('check_lists.statusNow',0)
            ->groupBy('month')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return $item->total;
            })
            ->toArray();

           // dd($totals);

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

      return view('admin.index',compact('totals','totalComprasMes','totalVentas','totalCompras'));


    }
}
