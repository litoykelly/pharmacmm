<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicament;
use App\Models\entree;
use App\Models\sortie;

use Illuminate\Support\Facades\DB;

class stockController extends Controller
{
    public function index(Request $request)
    {

       $produitStocks=medicament::where('stock','!=',0)->get();

                             /* $showSorties=medicament::join('sorties','sorties.medicament_id','=','medicaments.id')
                              ->join('entrees','entrees.medicament_id','=','medicaments.id')

                              ->select('medicaments.id','medicaments.denomination','entrees.qty_entree','entrees.date_exp','entrees.date_entree',
                                         'sorties.qty_sortie','sorties.date_sortie')

                              ->get(['medicaments.id','medicaments.denomination','entrees.qty_entree','entrees.date_entree',
                                     'sorties.qty_sortie','sorties.date_sortie']);  */

                                     if($request->has('search')){
                                        $produitStocks=medicament::where('denomination','like',"%{$request->search}%")
                                        ->orWhere('id','like',"%{$request->search}%")
                                        ->orWhere('stock','like',"%{$request->search}%")
                                        ->get();
                                       } 
        return view('stock.index',compact('produitStocks'));
                         
    } 

      
        
}


