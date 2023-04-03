<?php

namespace App\Http\Controllers;

use App\Models\FiscalYear;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceAnalysisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $this->authorize('invoice_access');
        $fiscal_years = FiscalYear::all();

        return view('admin.invoiceanalysis.index', compact('fiscal_years'));
    }

    public function allFiscalTotal(){
       $years = FiscalYear::all();

        $json_array = array();

        for($i=0; $i<count($years); $i++){
            $year = explode('-', $years[$i]->start_date)[0];
            $total = (int)Invoice::whereBetween('date_of_entry', [$years[$i]->start_date, $years[$i]->end_date])->sum('total');

            array_push($json_array, array("year"=>$year, "total"=>$total));
        }

        return $json_array;
    }

    public function fiscalData(Request $request){
        $fiscal = FiscalYear::find($request->get("id"));

        return Invoice::whereBetween('date_of_entry', [$fiscal->start_date, $fiscal->end_date])->with("user")->get()->toArray();
    }
}
