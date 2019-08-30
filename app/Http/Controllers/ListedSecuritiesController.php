<?php

namespace App\Http\Controllers;

use App\ListedSecurity;
use Illuminate\Http\Request;

class ListedSecuritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number_listed_sum = ListedSecurity::sum('number_listed');
        $mkt_ngn_sum = ListedSecurity::sum('mkt_cpt_ngn');
        $mkt_usd_sum = ListedSecurity::sum('mkt_cpt_usd');
        $listings =ListedSecurity::orderBy('created_at', 'desc')->get();
        return view('Securities.securities_view', compact( 'listings', 'number_listed_sum', 'mkt_ngn_sum', 'mkt_usd_sum'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Securities.securities-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('index')->with('info', 'Security Listing Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = ListedSecurity::where('id', '=', $id)->firstOrFail();
        return view('Securities.securities-form_update', ['listing'=>$listing, 'listingId'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ListedSecurity::where('id' , $id)->delete();
        return redirect()->route('index');
    }
}
