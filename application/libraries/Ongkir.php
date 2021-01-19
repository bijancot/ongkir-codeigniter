<?php
class Ongkir {

   function test()
  {
    $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ruangapi.com/api/v1/provinces",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: tgdE2vHA696lTUUSyA3OA90HYNuVpuoRTerQkOoR",
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
  } 
}
?>