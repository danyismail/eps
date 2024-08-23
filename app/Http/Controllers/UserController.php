<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function Login(Request $request){
        if ($request->session()->exists('userdata')) {
            if($request->session()->get('userdata')['expires_at'] >= strtotime("now")) {
                return redirect('/');
            } else {
                $request->session()->forget('userdata');
            }
        }
        return view('login');
    }

    public function Auth(Request $request) {
        $client = new Client();
        $username = $request->email;
        $password = $request->password;
        $url = env('API_HOST').'/auth/login';

        if($username != '' && $password != '') {
            $params = ["email" => $username, "password" => $password];

            $response = $client->request('POST', $url, [
                'json' => $params
            ]);
            
            $resData = json_decode($response->getBody());

            if($resData->statusCode == 200) {
                session([
                    'userdata' => [
                        'username'      => $resData->data->username,
                        'role'          => $resData->data->role,
                        'token'         => $resData->data->token,
                        'expires_at'    => $resData->data->expires_at
                    ]
                ]);
                return redirect('/');
            } else {
                $request->session()->forget('userdata');
                return redirect('/login');
            }
        } else {
            $request->session()->forget('userdata');
            return redirect('/login');
        }
    
    }

    public function Logout(Request $request) {
        $request->session()->forget('userdata');
        return redirect('/login');
    }

    public function List(Request $request) {
        $client = new Client();

        try {
            $url = env('API_HOST')."/user/list";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
                
            $res = json_decode($response->getBody());
            $data['data'] = $res->data ?? array();
        } catch (\Exception $e) {
            $data['data'] = array();
        }

        return view('main.user', $data);

    }

    public function Create(Request $request) {
        $client = new Client();

        $dataform = array();
        if($request->post('username')) {
            $dataform['username'] = $request->post('username');
        }

        if($request->post('email')) {
            $dataform['email'] = $request->post('email');
        }

        if($request->post('role')) {
            $dataform['role'] = $request->post('role');
        }

        if($request->post('password')) {
            $dataform['password'] = $request->post('password');
        }

        try {
            $url = env('API_HOST')."/user/create";
            $response = $client->request('POST', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "json" => $dataform
            ]);
                
            $res = json_decode($response->getBody());
            if($res->statusCode == 200) {
                return redirect('/user')->with(['success' => "Insert data successfully"]);
            } else {
                return redirect('/user')->with(['warning' => $res->message]);
            }

        } catch (\Exception $e) {
            return redirect('/user')->with(['error' => $e]);
        }
        return redirect('/user');
    }

    public function Delete(Request $request) {
        $client = new Client();

        try {
            $url = env('API_HOST')."/user/delete?id=".strtoupper($request->get("id"));
            $response = $client->delete($url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token']
                ]
            ]);
            $res = json_decode($response->getBody());

            if($res->statusCode == 200) {
                return redirect('/user')->with(['success' => "Delete data successfully"]);
            } else {
                return redirect('/user')->with(['warning' => $res->message]);
            }
        } catch (GuzzleHttp\Exception\ClientException $e) {
            return redirect('/user')->with(['errors' => $e]);
        }

    }
}
