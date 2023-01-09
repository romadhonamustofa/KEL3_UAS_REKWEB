<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //return view('Dashboard.index', [
        //]);

        //Ini adalah script untuk melakukan request data dari Rekweb API yang telah kita buat
        $username       = 'user';
        $password       = 'user';
        $credentials    = base64_encode("$username:$password");

        $headers        = [];
        $headers[]      = "Authorization: Basic {$credentials}";
        $headers[]      = 'Content-Type: application/x-www-form-urlencoded';
        $headers[]      = 'Chace-Control: no-chace';

        //Initializing curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/mahasiswabaru");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Executing curl
        $response       = curl_exec($curl);

        // Checking if any error occurs during request or not
        if($e = curl_error($curl)) {
            echo $e;
        }else {

            //Decoding JSON data
            $decodedData = 
                json_decode($response, true);

            //Decoding JSON data in
            // Decoded form
            //var_dump($decodedData);
            $data = $decodedData;
        }

        // Closing curl
        curl_close($curl);
        return view('Dashboard.index', ["data"=>$data]);
    }

    public function create()
    {
        return view('Dashboard.create', [
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'=>'required',
            'no_hp'=>'required',
            'alamat' => 'required',
        ]);

        //dd($request);

        $postData = array(
            "nama" => $request->input('nama'),
            "asal_sekolah" => $request->input('asal_sekolah'),
            "tempat_lahir" => $request->input('tempat_lahir'),
            "tanggal_lahir"    =>  $request->input('tanggal_lahir'),
            "no_hp"    =>  $request->input('no_hp'),
            "alamat" => $request->input('alamat')
        );

        $data_string = json_encode($postData);

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ' . strlen($data_string);
        
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/mahasiswabaru");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
   
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } 
            // Closing curl
            curl_close($curl);
            return redirect()->to('/');

    }
    public function edit($id)
    {

        // Ini adalah scrip untuk melakukan request data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Cache-Control: no-cache';

            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/detail/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Executing curl
            $response = curl_exec($curl);

            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } else {
                // Decoding JSON data
                $decodedData =
                    json_decode($response, true);
                // Outputting JSON data in
                // Decoded form
                //var_dump($decodedData);
                $data = $decodedData;
            }

            // Closing curl
            curl_close($curl);
            return view('Dashboard.edit', ["data"=>$data]);

    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'=>'required',
            'no_hp'=>'required',
            'alamat' => 'required',
        ]);

        //dd($request->all());

        $postData = array(
            "nama" => $request->input('nama'),
            "asal_sekolah" => $request->input('asal_sekolah'),
            "tempat_lahir" => $request->input('tempat_lahir'),
            "tanggal_lahir"    =>  $request->input('tanggal_lahir'),
            "no_hp"    =>  $request->input('no_hp'),
            "alamat" => $request->input('alamat')
        );

        $data_string = json_encode($postData);

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ' . strlen($data_string);


            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/update/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

            // Executing curl
            $response = curl_exec($curl);

            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            }
            // Closing curl
            curl_close($curl);
            return redirect()->to('/')->with('success','Data Berhasil Diupdate');
    }

    public function destroy($id)
    {

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ';


            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/delete/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


            // Executing curl
            $response = curl_exec($curl);

            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            }
            // Closing curl
            curl_close($curl);
            return redirect()->to('/')->with('success','Data Berhasil Dihapus');
    }
}
