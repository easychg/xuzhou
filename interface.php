<?php
	
	require "response.class.php";    //引入返回信息类
	header("Access-Control-Allow-Origin: *");
	if(isset($_REQUEST['key'])&&isset($_REQUEST['method'])){
		if($_REQUEST['key']=='547e38a6ba741e9cf15db18a29cefa54'){
			//京东接口转发
			switch($_REQUEST['method']){
				case 'news':
					$ch=curl_init('https://way.jd.com/jisuapi/get?channel=新闻&num=10&start=0&appkey=547e38a6ba741e9cf15db18a29cefa54');
					curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
					curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
					$output=curl_exec($ch);
					echo $output;
				break;
				//图灵机器人
				case 'turing':
					if(isset($_REQUEST['info'])){
						$info=$_REQUEST['info'];
						/* //京东图灵机器人
						$ch=curl_init('https://way.jd.com/turing/turing?info='.$info.'&loc=北京市海淀区信息路28号&userid=222&appkey=547e38a6ba741e9cf15db18a29cefa54');
						curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
						curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
						$output=curl_exec($ch);
						echo $output; */
						//阿里机器人
						$host = "http://jisuznwd.market.alicloudapi.com";
						$path = "/iqa/query";
						$method = "GET";
						$appcode = "04de90b314af49e5a1a401c452966511";
						$headers = array();
						array_push($headers, "Authorization:APPCODE " . $appcode);
						$querys = "question=".$info;
						$bodys = "";
						$url = $host . $path . "?" . $querys;

						$curl = curl_init();
						curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($curl, CURLOPT_FAILONERROR, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_HEADER, false);
						if (1 == strpos("$".$host, "https://"))
						{
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
						}
						echo curl_exec($curl);
					}else{
						$code = 10000;
						$message = "非法的请求参数";
						$data = array(
								"detail" => "详询微信：18363228341",
							);
						$response = new Response;
						echo $response -> json($code,$message,$data); 
					}
					
				break;
				default:
					$code = 10000;
					$message = "非法的请求参数";
					$data = array(
							"detail" => "详询微信：18363228341",
						);
					$response = new Response;
					echo $response -> json($code,$message,$data); 
			}
		}else{
			$code = 10001;
			$message = "用户认证失败";
			$data = array(
					"detail" => "详询微信：18363228341",
				);
			$response = new Response;
			echo $response -> json($code,$message,$data); 
		}
	}else{
		$code = 10000;
		$message = "非法的请求参数";
		$data = array(
				"detail" => "详询微信：18363228341",
			);
		$response = new Response;
		echo $response -> json($code,$message,$data); 
	}
?>