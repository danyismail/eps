<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class LoginController extends BaseController
{
    public function index()
	{
        $session = \Config\Services::session();
        if($session->get('isLoggedIn') === true) {
            // If the user is not logged in, redirect to the login page
            return redirect()->back();
        } else {
            echo view('login');   
        }
	}

    public function Auth() {
        $session = session();   
        $request = request();
        $client = service('curlrequest');
        $data_request = array();

        $email = $request->getPost('email');
        $password = $request->getPost('password');

        if($email && $password) {

             // Define the API endpoint and the data to be sent
            $url = getenv('API_HOST').'/auth/login';
            $data = [
                'email' => $email,
                'password' => $password
            ];

            // Initialize cURL session
            $ch = curl_init($url);

            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_POST, true); // Use POST method
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Set the POST fields

            // Execute the cURL request
            $response = curl_exec($ch);

            // Check for errors
            if ($response === false) {
                $error = curl_error($ch);
                curl_close($ch);
                die('cURL Error: ' . $error);
            }

            // Close the cURL session
            curl_close($ch);

            // Decode the JSON response
            $responseData = json_decode($response, true);

            if($responseData['statusCode'] === 200) {
                $session->set([
                    'data' => $responseData['data'],
                    'isLoggedIn' => true,
                ]);
                
                if($responseData['data']['role'] === 'admin') {
                    return redirect()->to(base_url('/supplier'));
                } else {
                    return redirect()->to(base_url('/kpi'));
                }

            } else {
                $session->setFlashData('info', $responseData['message']);
                return redirect()->to(base_url('/login'));
                print_r($responseData['message']);
            }
        }
        return redirect()->to(base_url('/login'));
    }

    public function logout()
    {
        $this->session->remove('data');
        $this->session->set(['isLoggedIn' => false]);
        return redirect()->to('/login');
    }

}