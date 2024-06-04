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

    $totales = Presupuesto::all();
    $productosvendidos = PresupuestoDetails::all();

 /*    $comprasmes=;

    $ventasmes=; */

 

 
/* 
    $chartData = [
      'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
      'data' => [65, 59, 80, 81, 56]
  ]; */

  $totals = [];

  $totals = DB::table('presupuestos')
            ->select(DB::raw('SUM(total) as total, MONTH(created_at) as month'))
            ->groupBy('month')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return $item->total;
            })
            ->toArray();

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

      return view('admin.index',compact('totals','totalComprasMes'));


    }
}
