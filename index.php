<?php
require_once 'constant.php';
require_once 'function.php';


 $data = file_get_contents('php://input');






 $data = json_decode($data, true);


if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];
 
	if (mb_stripos($text, 'getCountries') !== false) {

		$contries = file_get_contents('http://api.leads.su/webmaster/geo/getCountries?token=faf4e32dc758538ab4b12e3957d9a2f5');

		$data_1 = json_decode($contries, true);

	    //	file_put_contents(__DIR__ . '/message.txt', print_r($data_1, true));

		 uasort($data_1['data'], function($a, $b){
          return $b['name'] <=> $a['name'];
        });

       $output = array_slice($data_1['data'], 0, 10);

       $city = '';
       foreach ($output as $key => $value) {

       	$city .= $value['id']." ".$value['iso_alpha2']." ".$value['name'].PHP_EOL;
       	
       }



		getTGApi(
			'sendMessage', 
			array(
				'chat_id' => $data['message']['chat']['id'],
				'text' => $city
			)
		);
 
		exit();	
	} 
} 




if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];
 
	if (mb_stripos($text, 'getUser') !== false) {

		$user = file_get_contents('http://api.leads.su/webmaster/account?token=faf4e32dc758538ab4b12e3957d9a2f5');

		$data_2 = json_decode($user, true);

		$user_info =  $data_2['data']['id']."  ".$data_2['data']['name'];

        getTGApi(
			'sendMessage', 
			array(
				'chat_id' => $data['message']['chat']['id'],
				'text' => $user_info
			)
		);
 
		exit();	
	} 
}

			

