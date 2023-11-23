<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MApi extends CI_Model {
	private $url = "https://backend.elingbali.com:8082/api/v.0.1/";
	private $token = "5b3dac76aaee24d14185cbc3d010fd20";
	
	public function post($url,$param){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url.$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($param),
			CURLOPT_HTTPHEADER => array(
					'Content-Type:application/json',
					'token: '.$this->token
				),
			)
		);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		return array($err,$response);
	}
	public function get($url){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url.$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
					"token: ".$this->token
				),
			)
		);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		return array($err,$response);
	}
	public function put($url,$param){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url.$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "PUT",
			CURLOPT_POSTFIELDS => json_encode($param),
			CURLOPT_HTTPHEADER => array(
					'Content-Type:application/json',
					'token: '.$this->token
				),
			)
		);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		return array($err,$response);
	}
	public function del($url){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url.$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "DELETE",
			CURLOPT_HTTPHEADER => array(
					"token: ".$this->token
				),
			)
		);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		return array($err,$response);
	}
}
?>