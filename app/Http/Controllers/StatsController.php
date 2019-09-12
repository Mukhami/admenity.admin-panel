<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function stats_index()
    {
        //gets access token for requests
        $http = new Client([
            'auth' => [
                'app_client',
                'secret'
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded']
        ]);
        $response = $http->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => 'd219a297-d588-403c-908b-236bbc8b1a8e'
            ]
        ]);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
        $token = $array_data['access_token'];

        //user details
        $client_user = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_user = $client_user->request('POST', 'http://139.162.161.150:8585/rest/users/list?access_token='.$token);
        $user_data = $response_user->getBody();
        $user_data_array = json_decode($user_data, true);

        //sms logs table
        $client_logs = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_logs = $client_logs->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token='.$token);
        $sms_logs = $response_logs->getBody();
        $sms_logs_array = json_decode($sms_logs, true);
        $last_ten = array_slice( $sms_logs_array['responseObject'], -10);

        //sms summary div
        $client_sms_summary = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_summary = $client_sms_summary->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token='.$token);
        $sms_summary = $response_summary->getBody();
        $sms_summary_array = json_decode($sms_summary, true);
        $last_five = array_slice( $sms_summary_array['responseObject'], -5);

        return view('NSE-Data.nse_stats', compact('user_data_array', 'sms_logs_array', 'last_ten', 'last_five'));
    }

    public function refreshAccessToken(){
        $client = new Client([
            'auth' => [
                'app_client',
                'secret'
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded']
            ]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => 'd219a297-d588-403c-908b-236bbc8b1a8e'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];

    }


    public function getUsersList(){
        $client = new Client([
            'auth' => [
                'app_client',
                'secret'
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded']
        ]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => 'd219a297-d588-403c-908b-236bbc8b1a8e'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];

        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/users/list?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
        return view('NSE-Data.user_details', compact('array_data'));
    }

    public function getSentSMSSummary(){
        $client = new Client([
            'auth' => [
                'app_client',
                'secret'
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded']
        ]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => 'd219a297-d588-403c-908b-236bbc8b1a8e'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];

        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
//        dd($array_data);
        return view('NSE-Data.sms_summary', compact('array_data'));
    }

    public function getSentSMSLogs(){
        $client = new Client([
            'auth' => [
                'app_client',
                'secret'
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded']
        ]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/authenticate',[
            'form_params'=>[
                'grant_type' => 'refresh_token',
                'refresh_token' => 'd219a297-d588-403c-908b-236bbc8b1a8e'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
//        dd($array_data['responseObject'][2]['message']);
        return view('NSE-Data.sms_logs', compact('array_data'));
    }
}