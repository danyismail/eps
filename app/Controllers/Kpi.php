<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Kpi extends BaseController
{

    use ResponseTrait;
    public function index()
	{
        $data = array(
            'page' => 1,
            'view' => 10
        );

        // $body = json_encode($data);

        // $response['test'] = $this->perform_http_request('POST', 'http://36.88.42.95:1523/api/eps/getKpis', $body);
        // $response['data'] = $this->perform_http_request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $arr = '[
            {
                "TglEntri": "2023-01-10T13:04:39.563Z",
                "TglStatus": "2023-01-10T13:04:56.75Z",
                "TglTempo": "2023-01-10T13:07:56.75Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081373422094",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 17 detik ",
                "Kpi": 17
            },
            {
                "TglEntri": "2023-01-10T13:10:51.48Z",
                "TglStatus": "2023-01-10T13:13:46.177Z",
                "TglTempo": "2023-01-10T13:16:46.177Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081251230492",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 02 menit 55 detik ",
                "Kpi": 175
            },
            {
                "TglEntri": "2023-01-10T13:22:12.493Z",
                "TglStatus": "2023-01-10T13:22:32.353Z",
                "TglTempo": "2023-01-10T13:25:32.353Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081338071648",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 20 detik ",
                "Kpi": 20
            },
            {
                "TglEntri": "2023-01-10T13:25:03.213Z",
                "TglStatus": "2023-01-10T13:25:26.317Z",
                "TglTempo": "2023-01-10T13:28:26.317Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081283719062",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 23 detik ",
                "Kpi": 23
            },
            {
                "TglEntri": "2023-01-10T13:26:01.19Z",
                "TglStatus": "2023-01-10T13:26:01.563Z",
                "TglTempo": "2023-01-10T13:29:01.563Z",
                "KodeProduk": "FZ8",
                "Tujuan": "082182374868",
                "Status": "52",
                "WaktuRespon": "00 hari 00 jam 00 menit 00 detik ",
                "Kpi": 0
            },
            {
                "TglEntri": "2023-01-10T13:26:01.21Z",
                "TglStatus": "2023-01-10T13:29:55.137Z",
                "TglTempo": "2023-01-10T13:32:55.137Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081292753315",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 03 menit 54 detik ",
                "Kpi": 234
            },
            {
                "TglEntri": "2023-01-10T13:26:01.23Z",
                "TglStatus": "2023-01-10T13:26:17.977Z",
                "TglTempo": "2023-01-10T13:29:17.977Z",
                "KodeProduk": "FZ8",
                "Tujuan": "082175267084",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 16 detik ",
                "Kpi": 16
            },
            {
                "TglEntri": "2023-01-10T13:47:49.103Z",
                "TglStatus": "2023-01-10T13:50:31.66Z",
                "TglTempo": "2023-01-10T13:53:31.66Z",
                "KodeProduk": "FZ8",
                "Tujuan": "081351715766",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 02 menit 42 detik ",
                "Kpi": 162
            },
            {
                "TglEntri": "2023-01-10T14:11:17.123Z",
                "TglStatus": "2023-01-10T14:12:14.353Z",
                "TglTempo": "2023-01-10T14:15:14.353Z",
                "KodeProduk": "FZ5",
                "Tujuan": "081261555396",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 57 detik ",
                "Kpi": 57
            },
            {
                "TglEntri": "2023-01-10T14:11:17.143Z",
                "TglStatus": "2023-01-10T14:12:06.563Z",
                "TglTempo": "2023-01-10T14:15:06.563Z",
                "KodeProduk": "FZ5",
                "Tujuan": "081341572433",
                "Status": "40",
                "WaktuRespon": "00 hari 00 jam 00 menit 49 detik ",
                "Kpi": 49
            }
        ]';

        $response['data'] = json_decode($arr, true);
        echo view('admin/dashboard/kpi_view', $response);
	}

    function perform_http_request($method, $url, $data = false) {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);

                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

}
