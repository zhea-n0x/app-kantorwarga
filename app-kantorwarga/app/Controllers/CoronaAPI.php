<?php

namespace App\Controllers;

class CoronaAPI extends BaseController
{
    public function getData()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.kawalcorona.com/indonesia/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_CONNECTTIMEOUT => 1,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err || $response == E_ERROR) {
            $data = [
                'sembuh', 'dirawat', 'positif', 'meninggal'
            ];

            $array = array_fill_keys($data,'tidak ada data');

            return $array;
        } else {
            $array = json_decode($response, TRUE);
            
            return $array[0];
        }
    }
}

?>