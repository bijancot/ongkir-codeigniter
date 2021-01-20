<?php
class Ongkir {

    public $endpoint,$apiKey;

    public function __construct() {
    $this->endpoint = "https://ruangapi.com/api/v1/";
    $this->apikey = "tgdE2vHA696lTUUSyA3OA90HYNuVpuoRTerQkOoR";
    }

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
            "authorization: $this->apikey",
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
	      $data = json_decode($response, true);
        return $data['data']['results'];
  } 

  private function getEndpoint($param){
    $end = $this->endpoint;
    return $end.$param;
  }

  private function mainQuery($param){

  }

  public function getAllProvinces(){
    echo getEndpoint("provinces");
  }
}
?>
