<?php 
	include_once dirname(__FILE__) . "/../functions/database.php";
	include_once dirname(__FILE__) . "/../functions/library.php";
	include_once dirname(__FILE__) . "/../functions/action.php";
	$action = new action();

	function send ($title, $note, $to) {

		$body = "{\r\n    \"to\":  \"$to\",\r\n\r\n    \"data\": {\r\n        \"notification\": {\r\n\t        \"title\": \"$title\",\r\n\t        \"body\": \"$note\"\r\n\t    }\r\n    }\r\n}";
		$length = strlen($body);//echo $length;
		/////////////
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $body,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Accept-Encoding: gzip, deflate",
		    "Authorization: key=AAAAQ9_Syno:APA91bFvMS8TotRsvqei0_9Vn4qyaCVkEb6uZ1aNWTG2LrlJU0oeaeM8o4mm0Dsw4D0v7CCXPVMovBQqQ1rE3m-g2xp1LbvsHEQXI4Dqq68kzDfQAuYIXp3YembU_eHipJZlEdVbNaSo",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Length: ".$length,
		    "Content-Type: application/json",
		    "Host: fcm.googleapis.com",
		    "Postman-Token: e32868b1-ad47-480b-9d62-c8b441412fb7,658091a7-9456-4ee7-ad22-1cf1388d3808",
		    "User-Agent: PostmanRuntime/7.17.1",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}

	$list_user = $action->getList('fcm', '', '', 'id', 'asc', '', '', '');
	$page = $action->getDetail('page', 'page_id', 48);

	foreach ($list_user as $item) {
		$title = str_replace("\"", "", $page['page_name']);
		$note = str_replace("\"", "", $page['page_des']);
		send($title, $note, $item['token']);
	}
?>