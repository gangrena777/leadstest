<?
function printer($str){

	echo "<pre>";
	print_r($str);
	echo "</pre>";
}


function getTGApi($method, $options = null){


 	$srt_req = API_URL.Token.'/'.$method;

 	if($options){
 		$srt_req .= '?'.http_build_query($options);
 	}

 	$req = file_get_contents($srt_req);


 	return json_decode($req, 1);
 }

// function setHook($set = 1){
//  	$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//  	printer(
//  		  getTGApi('setWebhook', 

//  			array(
//  					'url' => $set ? $url : '',
					
// 				)
//           );
//     );

//          exit();


//  }	

// setHook();