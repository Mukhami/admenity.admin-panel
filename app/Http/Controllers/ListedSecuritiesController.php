<?php

namespace App\Http\Controllers;

use App\ListedSecurity;
use App\MarketFlow;
use App\PerformanceCapitalization;
use App\PerformanceSector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ListedSecuritiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $number_listed_sum = ListedSecurity::sum('number_listed');
        $mkt_ngn_sum = ListedSecurity::sum('mkt_cpt_ngn');
        $mkt_usd_sum = ListedSecurity::sum('mkt_cpt_usd');
        $listings =ListedSecurity::orderBy('created_at', 'desc')->get();
        return view('Securities.securities_view', compact( 'listings', 'number_listed_sum', 'mkt_ngn_sum', 'mkt_usd_sum'));

    }

    public function create()
    {
        return view('Securities.securities-form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'number_listed' => 'required',
            'mkt_cpt_ngn' => 'required',
            'mkt_cpt_usd' => 'required',
        ]);

        $category = $request->input('category');
        $number_listed = $request->input('number_listed');
        $mkt_ngn = $request->input('mkt_cpt_ngn');
        $mkt_usd = $request->input('mkt_cpt_usd');
        $securities = new ListedSecurity([
            'category' => $category,
            'number_listed' => $number_listed,
            'mkt_cpt_ngn' => $mkt_ngn,
            'mkt_cpt_usd' => $mkt_usd,
        ]);
//        dd($securities);
        $securities->save();
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $listing = ListedSecurity::where('id', '=', $id)->firstOrFail();
        return view('Securities.securities-form_update', ['listing'=>$listing, 'listingId'=>$id]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'number_listed' => 'required',
            'mkt_cpt_ngn' => 'required',
            'mkt_cpt_usd' => 'required',
        ]);
        $listing = ListedSecurity::find($request->input('id'));
        $listing->category = $request->input('category');
        $listing->number_listed = $request->input('number_listed');
        $listing->mkt_cpt_ngn = $request->input('mkt_cpt_ngn');
        $listing->mkt_cpt_usd = $request->input('mkt_cpt_usd');

        $listing->save();

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        ListedSecurity::where('id' , $id)->delete();
        return redirect()->route('index');
    }

/***************  MARKET FLOW METHODS *****************/

    public function create_market_flow(){
        return view('Market-Flow.market-flow-form');
    }

    public function store_market_flow(Request $request){
        $this->validate($request, [
            'period' => 'required',
            'domestic' => 'required',
            'foreign' => 'required',
            'total_ft_naira' => 'required',
            'total_ft_dollar' => 'required',
        ]);

        $period = $request->input('period');
        $domestic = $request->input('domestic');
        $foreign = $request->input('foreign');
        $total_naira = $request->input('total_ft_naira');
        $total_dollar = $request->input('total_ft_dollar');
        $mkt_flow = new MarketFlow([
            'period' => $period,
            'domestic' => $domestic,
            'foreign' => $foreign,
            'total_ft_naira' => $total_naira,
            'total_ft_dollar' => $total_dollar,
        ]);
//        dd($mkt_flow);
        $mkt_flow->save();
        return redirect()->route('index');
    }

    public function edit_market_flow($id){
        $mkt_flow = MarketFlow::where('id', '=', $id)->firstOrFail();
        $mktFlowId = $id;
        return view('Market-Flow.market-flow-update-form', compact('mkt_flow', 'mktFlowId'));
    }

    public function update_market_flow(Request $request)
    {
        $this->validate($request, [
            'period' => 'required',
            'domestic' => 'required',
            'foreign' => 'required',
            'total_ft_naira' => 'required',
            'total_ft_dollar' => 'required',
        ]);

        $mkt_flow = MarketFlow::find($request->input('id'));
        $mkt_flow->period = $request->input('period');
        $mkt_flow->domestic = $request->input('domestic');
        $mkt_flow->foreign = $request->input('foreign');
        $mkt_flow->total_ft_naira = $request->input('total_ft_naira');
        $mkt_flow->total_ft_dollar = $request->input('total_ft_dollar');

        $mkt_flow->save();

        return redirect()->route('index');
    }

    public function delete_market_flow($id)
    {
        MarketFlow::where('id' , $id)->delete();
        return redirect()->route('index');
    }

    /*********PERFORMANCE BY SECTOR********/

    public function create_industry_sector(){
        return view('Performance.performance-sector-form');
    }

    public function store_industry_sector(Request $request){
        $this->validate($request, [
            'industry_sector' => 'required',
            'change' => 'required',
            'transaction_naira' => 'required',
            'transaction_dollar' => 'required',

        ]);

        $industry_sector = $request->input('industry_sector');
        $change= $request->input('change');
        $total_naira = $request->input('transaction_naira');
        $naira_units = Input::get('NAIRA');
        $total_dollar = $request->input('transaction_dollar');
        $usd_units = Input::get('USD');
        $sector = new PerformanceSector([
            'industry_sector' => $industry_sector,
            'change' => $change,
            'transaction_naira' => $total_naira,
            'naira_units' => $naira_units,
            'transaction_dollar' => $total_dollar,
            'usd_units' => $usd_units,

        ]);
        dd($sector);
        $sector->save();
        return redirect()->route('index');
    }

    public function edit_industry_sector($id){
        $sectorId = $id;
        $sector = PerformanceSector::where('id', '=', $id)->firstOrFail();
        return view('Performance.performance-sector-update-form', compact('sector', 'sectorId'));
    }

    public function update_industry_sector(Request $request){
        $this->validate($request, [
            'industry_sector' => 'required',
            'change' => 'required',
            'transaction_naira' => 'required',
            'transaction_dollar' => 'required',

        ]);

        $sector = PerformanceSector::find($request->input('id'));
//        dd($sector);
        $sector->industry_sector = $request->input('industry_sector');
        $sector->change = $request->input('change');
        $sector->transaction_naira = $request->input('transaction_naira');
        $sector->naira_units = Input::get('NAIRA');
        $sector->transaction_dollar = $request->input('transaction_dollar');
        $sector->usd_units = Input::get('USD');

        $sector->save();

        return redirect()->route('index');
    }
    public function delete_industry_sector($id)
    {
        PerformanceSector::where('id' , $id)->delete();
        return redirect()->route('index');
    }
    /***********PERFORMANCE BY CAPITALIZATION ************/

    public function create_capitalization(){
        return view('Performance.by-capitalization-form');
    }

    public function store_capitalization(Request $request){
        $this->validate($request, [
            'capitalization' => 'required',
            'change' => 'required',
            'transaction_naira' => 'required',
//            'naira_units' => 'required',
            'transaction_dollar' => 'required',
//            'usd_units' => 'required',
        ]);

        $capitalization = $request->input('capitalization');
        $change= $request->input('change');
        $total_naira = $request->input('transaction_naira');
        $naira_units = Input::get('NAIRA');
        $total_dollar = $request->input('transaction_dollar');
        $usd_units = Input::get('USD');
        $new_capitalization = new PerformanceCapitalization([
            'capitalization' => $capitalization,
            'change' => $change,
            'transaction_naira' => $total_naira,
            'naira_units' => $naira_units,
            'transaction_dollar' => $total_dollar,
            'usd_units' => $usd_units,

        ]);
        $new_capitalization->save();
        return redirect()->route('index');
    }

    public function edit_capitalization($id){
        $captId = $id;
        $capitalization = PerformanceCapitalization::where('id', '=', $id)->firstOrFail();
        return view('Performance.by-capitalization-update-form', compact('capitalization', 'captId'));
    }

    public function update_capitalization(Request $request){
        $this->validate($request, [
            'capitalization' => 'required',
            'change' => 'required',
            'transaction_naira' => 'required',
            'transaction_dollar' => 'required',

        ]);

        $capitalization = PerformanceCapitalization::find($request->input('id'));
        $capitalization->capitalization = $request->input('capitalization');
        $capitalization->change = $request->input('change');
        $capitalization->transaction_naira = $request->input('transaction_naira');
        $capitalization->naira_units = Input::get('NAIRA');
        $capitalization->transaction_dollar = $request->input('transaction_dollar');
        $capitalization->usd_units = Input::get('USD');

        $capitalization->save();

        return redirect()->route('index');
    }
    public function delete_capitalization($id)
    {
        PerformanceCapitalization::where('id' , $id)->delete();
        return redirect()->route('index');
    }

}
