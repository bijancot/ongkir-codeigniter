<?php
class Ongkir
{

    public $endpoint, $apiKey;

    public function __construct()
    {
        $this->endpoint = "https://ruangapi.com/api/v1/";
        $this->apikey = "tgdE2vHA696lTUUSyA3OA90HYNuVpuoRTerQkOoR";
    }

    private function getEndpoint($param)
    {
        $end = $this->endpoint;
        return $end . $param;
    }

    private function mainQuery($param, $extraParam = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$param",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: $this->apikey",
                "content-type: application/json"
            ) ,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']['results'];
    }


    public function postQuery($url,$origin,$destination,$weight,$courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "$url",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
            "authorization: $this->apikey",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']['results'];
    }

    public function getAllProvinces()
    {
        $param = $this->getEndpoint("provinces");
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getCities($provinceId)
    {
        $param = $this->getEndpoint("cities");
        $param = $param."?provinces=".$provinceId;
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getDistricts($cityId)
    {
        $param = $this->getEndpoint("districts");
        $param = $param."?city=".$cityId;
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getProvinceById($provinceId)
    {
        $param = $this->getEndpoint("provinces");
        $param = $param."?id=".$provinceId;
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getCourierPrice($origin,$destination,$weight,$courier)
    {
        $param = $this->getEndpoint("shipping");
        $result = $this->postQuery($param,$origin,$destination,$weight,$courier);
        
        return $result;
    }
}
?>
