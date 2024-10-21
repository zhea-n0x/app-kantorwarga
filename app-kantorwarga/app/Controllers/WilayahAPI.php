<?php

namespace App\Controllers;

class WilayahAPI extends BaseController
{

    public function getProvinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, TRUE);
            $dataprovinsi = $array["provinsi"];

            echo "<option value=''>-- Pilih Provinsi --</option>";
            foreach ($dataprovinsi as $key => $provinsi) {
                echo "<option value='" . $provinsi["nama"] . "' id_provinsi='" . $provinsi["id"] . "'>";
                echo $provinsi["nama"];
                echo "</option>";
            }
        }
    }

    public function getKota()
    {
        $selected_id = $_POST['id_provinsi'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" . $selected_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, TRUE);
            $datakota = $array["kota_kabupaten"];

            //echo "<pre>";
            //print_r($array["kota_kabupaten"]);
            //echo "</pre>";

            echo "<option value=''>-- Pilih Kota --</option>";
            foreach ($datakota as $key => $kota) {
                echo "<option value='" . $kota["nama"] . "' id_kota='" . $kota["id"] . "'>";
                echo $kota["nama"];
                echo "</option>";
            }
        }
    }

    public function getKecamatan()
    {
        $selected_id = $_POST['id_kota'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" . $selected_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, TRUE);
            $datakecamatan = $array["kecamatan"];


            //echo "<pre>";
            //print_r($datakecamatan);
            //echo "</pre>";

            echo "<option value=''>-- Pilih Kecamatan --</option>";
            foreach ($datakecamatan as $key => $kecamatan) {
                echo "<option value='" . $kecamatan["nama"] . "' id_kecamatan='" . $kecamatan["id"] . "'>";
                echo $kecamatan["nama"];
                echo "</option>";
            }
        }
    }

    public function getKelurahan()
    {
        $selected_id = $_POST['id_kecamatan'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" . $selected_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, TRUE);
            $datakelurahan = $array["kelurahan"];


            //echo "<pre>";
            //print_r($datakecamatan);
            //echo "</pre>";

            echo "<option value=''>-- Pilih Kelurahan --</option>";
            foreach ($datakelurahan as $key => $kelurahan) {
                echo "<option value='" . $kelurahan["nama"] . "' id_kecamatan='" . $kelurahan["id"] . "'>";
                echo $kelurahan["nama"];
                echo "</option>";
            }
        }
    }

    
}
