<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Yajra\DataTables\Facades\DataTables;

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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
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

        $client_allUsers = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client_allUsers->request('GET', 'http://139.162.161.150/nigg/index.php/api/getAllUsers');
        $allData = $response->getBody();
        $allUserData =  json_decode($allData, true);
        $last10 = array_slice($allUserData['users'], -20);
//        dd($allUserData);

        //sms logs table
        $client_logs = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_logs = $client_logs->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token='.$token);
        $sms_logs = $response_logs->getBody();
        $sms_logs_array = json_decode($sms_logs, true);
        $last_seven = array_slice( $sms_logs_array['responseObject'], -7);

        //sms summary div
        $client_sms_summary = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_summary = $client_sms_summary->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token='.$token);
        $sms_summary = $response_summary->getBody();
        $sms_summary_array = json_decode($sms_summary, true);
//        $total_sms = $sms_summary_array['responseObject'][0]['total'];
//        foreach($sms_summary_array['responseObject'] as $key=>$value){
//            $total_sms = array_sum($value['total']);
//        }
//        dd($total_sms);
        $last_five = array_slice( $sms_summary_array['responseObject'], -6);

        //user feedback
        $client_feedback = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_feedback = $client_feedback->request('GET', 'http://139.162.161.150/nigg/index.php/api/getUserFeedback');
        $user_feedback = $response_feedback->getBody();
        $feedback_array = json_decode($user_feedback, true);
//        dd($feedback_array['data']);

        return view('NSE-Data.nse_stats', compact('user_data_array','last10', 'sms_logs_array', 'last_seven', 'last_five', 'feedback_array', 'allUserData'));
    }


    public function usersData(){
        $client_allUsers = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client_allUsers->request('GET', 'http://139.162.161.150/nigg/index.php/api/getAllUsers');
        $allData = $response->getBody();
        $allUserData =  json_decode($allData, true);

        $type = $allUserData['users'];

        return Datatables::of($type)
            ->editColumn('email', function ($type) {
                return $type['email'];
            })
            ->editColumn('date_registered', function ($type) {
                return Carbon::parse(strtotime($type['created_on']))->format('d-m-Y h:i');
//                return date('d-m-Y , h:i:sa', strtotime($type['created_on']));
            })
            ->make(true);
    }

    public function smsLogsData(){
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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);

        $type = $array_data['responseObject'];

        return Datatables::of($type)
            ->editColumn('id', function ($type) {
                return $type['id'];
            })
            ->editColumn('phone_number', function ($type) {
                return $type['mobile'];
            })
            ->editColumn('date_registered', function ($type) {
                return date('d-m-Y , h:i:sa',strtotime($type['created_date']));
            })
            ->editColumn('message', function ($type) {
                return str_limit($type['message'], 60);
            })
            ->editColumn('status', function ($type) {
                return $type['status'];
            })
            ->make(true);
    }

    public function smsSummaryData(){
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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];

        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/summary?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
        $type = $array_data['responseObject'];

        return Datatables::of($type)
            ->editColumn('date', function ($type) {
                return date('d-m-Y',strtotime($type['date']));
            })
            ->editColumn('total', function ($type) {
                return  $type['total'];
            })
            ->make(true);

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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];

        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/users/summary?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
        return view('NSE-Data.user_details', compact('array_data'));
    }

    public function getAllUsers()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://139.162.161.150/nigg/index.php/api/getAllUsers');
        $data = $response->getBody();
        $array_data =  json_decode($data, true);

        return view('NSE-Data.all_users', compact('array_data'));

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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
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
                'refresh_token' => '558cba57-6a39-4152-9feb-1909b95aafda'
            ]
        ]);
        $data = $response->getBody();
        $data = json_decode($data, true);
        $token = $data['access_token'];
        $client = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response = $client->request('POST', 'http://139.162.161.150:8585/rest/get/sms/logs?access_token='.$token);
        $data = $response->getBody();
        $array_data = json_decode($data, true);
//        dd($array_data);
//        dd($array_data['responseObject'][2]['message']);
        return view('NSE-Data.sms_logs', compact('array_data'));
    }

    public function getUserFeedback(){
        $client_feedback = new Client(['headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],]);
        $response_feedback = $client_feedback->request('GET', 'http://139.162.161.150/nigg/index.php/api/getUserFeedback');
        $user_feedback = $response_feedback->getBody();
        $feedback_array = json_decode($user_feedback, true);

        return view('NSE-Data.user_feedback', compact('feedback_array'));
    }
}