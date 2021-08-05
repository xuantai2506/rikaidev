<?php
class APINhanHoa {

	public function execute($cmd,$postfields,$formdata)
	{
		
		global $root_domain;
		$postdata = "";	
		
		if($cmd == "")
		{
			return array("status"=> "error", "msg" => "Không có lệnh để thực thi API.");
		}
		
		$url = $root_domain."?act=".$cmd;

		foreach ( $formdata as $fname => $fkey )
		{
			$postdata .= "{$fname}=".urlencode(str_replace('&amp;','&',$fkey))."&";	
		}	
		$postfields["cmd"] = $cmd;
		$postfields["formdata"] = $postdata;
	
		$user_agent = "Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)";
		$ch = curl_init();
		 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_TIMEOUT,1000); 
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		
		$data = curl_exec($ch);
		curl_close($ch); 
		return ($data);exit;
	}
}