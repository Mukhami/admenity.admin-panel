<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StatsController extends Controller
{
    public function stats_index()
    {
        //user details
        $client_user = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_user = $client_user->request('POST', 'http://139.162.161.150:8585/rest/users/list?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $user_data = $response_user->getBody();
        $user_data_array = json_decode($user_data, true);

        //sms logs table
        $client_logs = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_logs = $client_logs->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $sms_logs = $response_logs->getBody();
        $sms_logs_array = json_decode($sms_logs, true);
        $last_ten = array_slice( $sms_logs_array['responseObject'], -10);

        //sms summary div
        $client_sms_summary = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_summary = $client_sms_summary->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $sms_summary = $response_summary->getBody();
        $sms_summary_array = json_decode($sms_summary, true);
        $last_five = array_slice( $sms_summary_array['responseObject'], -5);
//        $barsize = $sms_summary_array['responseObject'];
//        dd($barsize);


        return view('NSE-Data.nse_stats', compact('user_data_array', 'sms_logs_array', 'last_ten', 'last_five'));
    }

    public function refreshAccessToken(){

        $http = new Client(['headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'auth' => 'app_client', 'secret']]);
        $response = $http->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => '7072c979-b2cc-4c07-80ec-3d1e8c644b50'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        dd($data);
    }


    public function getUsersList(){
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/users/list?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $data = $response->getBody();
        $array_data = json_decode($data, true);
        return view('NSE-Data.user_details', compact('array_data'));
    }

    public function getSentSMSSummary(){
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $data = $response->getBody();
        $array_data = json_decode($data, true);
//        dd($array_data);
        return view('NSE-Data.sms_summary', compact('array_data'));
    }

    public function getSentSMSLogs(){
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token=854e6ef7-2f02-4220-a11c-70a85e676e79');
        $data = $response->getBody();
        $array_data = json_decode($data, true);
//        dd($array_data['responseObject'][2]['message']);
        return view('NSE-Data.sms_logs', compact('array_data'));
    }
}