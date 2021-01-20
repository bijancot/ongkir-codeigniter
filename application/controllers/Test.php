<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
		//loading ongkir-library
		parent::__construct();
		$this->load->library("ongkir");
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('testing');
	}

	public function getProvince()
	{
		$res1 = $this->ongkir->getAllProvinces();
		$res2 = $this->ongkir->getProvinceById("11");

		echo "This is output of <em>getAllProvinces()</em><br/>";
		echo "It Will Return all province in indonesia<br/><br/>";
		var_dump($res1);
		
		echo "This is output of <em>getProvinceById(\$param\ <strong>String</strong>)</em><br/>";
		echo "It Will Return all province in indonesia<br/>";
		echo "<em>\$param -> String value of province id -> the value for this one is \"11\"</em><br/><br/>";
		var_dump($res2);

		echo "<br/><br/><br/><em>also you can compare the output with the param that listed above</em><br/>";
	}

	public function getCity()
	{
		$res1 = $this->ongkir->getCities("11");
		
		echo "This is output of <em>getCities(\$param\ <strong>String</strong>)</em><br/>";
		echo "It Will Return all citirs base on param that given (province id)<br/>";
		echo "<em>\$param -> String value of province id -> the value for this one is \"11\"</em><br/><br/>";
		var_dump($res1);

		echo "<br/><br/><br/><em>also you can compare the output with the param that listed above</em><br/>";
	}

	public function getDistrict()
	{
		$res1 = $this->ongkir->getDistricts("255");
		
		echo "This is output of <em>getCities(\$param\ <strong>String</strong>)</em><br/>";
		echo "It Will Return all citirs base on param that given (city id)<br/>";
		echo "<em>\$param -> String value of city id -> the value for this one is \"255\"</em><br/><br/>";
		var_dump($res1);

		echo "<br/><br/><br/><em>also you can compare the output with the param that listed above</em><br/>";
	}

	public function ongkir()
	{
		$res1 = $this->ongkir->getCourierPrice("22","3611","2000","sicepat");
		
		echo "This is output of <em>getCities(\$origin\ <strong>String</strong>,\$destination\ <strong>String</strong>,\$weight\ <strong>String</strong>,\$courier\ <strong>String</strong>)</em><br/>";
		echo "It Will Return all citirs base on param that given (city id)<br/>";
		echo "<em>\$origin -> String value of city id -> the value for this one is \"22\"</em><br/>";
		echo "<em>\$destination -> String value of district id -> the value for this one is \"3611\"</em><br/>";
		echo "<em>\$weight -> int|bigint|sting value of weight -> the value for this one is \"2000\"</em><br/>";
		echo "<em>\$courier -> String value of courier code -> the value for this one is \"sicepat\"</em><br/>";
		var_dump($res1);

		echo "<br/><br/><br/><em>for courier list you can take a look at https://ruangapi.com/dokumentasi/ongkos-kirim</em><br/>";
		echo "<em>also you can compare the output with the param that listed above</em><br/>";
	}
}
