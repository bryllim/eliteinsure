<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function newsalesrep()
    {
        return view('salesrep');
    }

    public function addsalesrep(Request $request)
    {
        $salesrep = \App\Salesreps::create($request->all());
        return view('salesrep')->with('successMsg','Added new salesrep!');
    }

    public function createpayroll()
    {
        $salesreps = \App\Salesreps::all();
        return view('createpayroll')->with(["salesreps" => $salesreps]);
    }

    public function newpayroll(Request $request)
    {
        $payroll = new \App\Payrolls;
        $payroll->salesrep_id = $request->salesrep;
        $payroll->month = $request->month;
        $payroll->period = $request->period;
        $payroll->year = $request->year;
        $payroll->bonuses = $request->bonus;
        $payroll->numberofclients = $request->clients;
        $payroll->save();

        $i = 0;
        $netcommission = 0;

        foreach($request->all() as $key => $value) {
            if($i > 6){
                if($i%2==1){
                    $client = new \App\Clients;
                    $client->name = $value;
                }else{
                    $netcommission += $value;
                    $client->commission = $value;
                    $client->payroll_id = $payroll->id;
                    $client->save();
                }
            }
            $i++;
        }
        $partialnet = $netcommission + $payroll->bonuses;
        $clients = \App\Clients::where('payroll_id', $payroll->id)->get();
        $salesrep = \App\Salesreps::findOrFail($request->salesrep);

        $taxrate = $salesrep->tax * 0.01;
        $commissionrate = $salesrep->commission * 0.01;

        $commission = $partialnet * $commissionrate;
        $tax = $commission * $taxrate;
        $paymentamount = $commission - $tax;
        
        $pdf = PDF::loadView('pdf', ['data' => $payroll, 'clients' => $clients, 'netcommission' => $netcommission, 'commission' => $commission, 'tax' => $tax, 'paymentamount' => $paymentamount]);
        return $pdf->stream();
    }
}