<?php

namespace App\Http\Controllers;

use App\ListedSecurity;
use App\MarketFlow;
use App\PerformanceSector;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
        $profile = DB::table('profiles')->first();
        $mkt_flows =MarketFlow::orderBy('created_at', 'desc')->get();
        $sectors =PerformanceSector::orderBy('created_at', 'desc')->get();
        return view('admin_panel', compact('profile','sectors', 'mkt_flows', 'listings', 'number_listed_sum', 'mkt_ngn_sum', 'mkt_usd_sum'));
    }

    public function stats_index()
    {
        return view('nse_stats');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profile.profile-form_create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'body' => 'required'
        ]);

        $title = $request->input('title');
        $subtitle = $request->input('sub_title');
        $body = $request->input('body');
        $profile = new Profile([
            'title' => $title,
            'sub_title' => $subtitle,
            'body' => $body,
        ]);
        $profile->save();

        return redirect()->route('index')->with('info', 'Profile Edited.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', '=', $id)->firstOrFail();
        return view('Profile.profile-form_update', ['profile'=>$profile, 'profileId'=>$id]);
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
            'title' => 'required',
            'sub_title' => 'required',
            'body' => 'required'
        ]);
        $profile = Profile::find($request->input('id'));
        $profile->title = $request->input('title');
        $profile->sub_title = $request->input('sub_title');
        $profile->body = $request->input('body');
        $profile->save();

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
        //
    }
}
