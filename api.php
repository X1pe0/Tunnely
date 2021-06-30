<?php

$token  = $_GET['id'];
$html = $_GET['html'];
$create = $_GET['create'];
$rport  = $_GET['port'];
$raddr = $_GET['addr'];
$doc = $_GET['documentation'];

if ($doc == 'true'){
echo '<center><h1>Tunnely API Documentation</h1><br>';

echo 'Example Requests<br>';
echo '----------------------';
echo '<br><br>https://tunnely.bitnix.co/api?id=KEY -> View all RAW network traffic. (Beta is limited to 1000 results per proxy)<br><br>';
echo 'https://tunnely.bitnix.co/api?id=KEY&create=true&port=80&addr=1.1.1.1 -> Create a proxy via API.<br><br>';
echo 'https://tunnely.bitnix.co/api?id=KEY&html=false -> Network traffic parsed for curl/scripting applications. (No HTML tags)';

exit;
exit();
exit(0);
	
}


	if (!preg_match('/[^A-Za-z0-9]/', htmlspecialchars($token)) && strlen(htmlspecialchars($token)) == 32){
		if (file_exists('d/'.htmlspecialchars($token))) {
			#	echo 'True';
		}else{
			echo 'This is not a valid token. If you need a token, visit the manage page at https://tunnely.bitnix.co/H.';
			exit;
			exit();
			exit(0);
			}
		
			if (htmlspecialchars($_GET['create'] == 'true')){
				if ($rport  == ''){
				echo 'You need a valid port.';
				exit;
				exit();
				exit(0);
				}
				if ($raddr  == ''){
				echo 'You need a valid address. ';
				exit;
				exit();
				exit(0);
				}
				if (ctype_digit($rport) && strlen($rport) < 6){
			#	echo 'True';
				}else{
				echo 'You need a valid port.';
				exit;
				exit();
				exit(0);
				}
				if (!filter_var($raddr, FILTER_VALIDATE_IP) === false) {
			#	echo 'True';
				}else{
				echo 'You need a valid address. ';
				exit;
				exit();
				exit(0);						
				}
				$filez="d/".htmlspecialchars($token);
				$linecount = 0;
				$handle = fopen($filez, "r");
				while(!feof($handle)){
				  $line = fgets($handle);
				  $linecount++;
				}
				fclose($handle);
				$totalp = ($linecount-1);
				if ($totalp > '49'){
						echo 'You have reached your 50 proxy limit. ';
						exit;
						exit();
						exit(0);
				}
				
				
				
				

						
				
				
				
				
				$filez="d/".htmlspecialchars($token);
				$linecount = 0;
				$handle = fopen($filez, "r");
				while(!feof($handle)){
				  $line = fgets($handle);
				  $linecount++;
				}
				fclose($handle);
				$count_my_page = ("./countlog.txt");
				$hits = file($count_my_page);
				$hits[0] ++;
				$fp = fopen($count_my_page , "w");
				fputs($fp , "$hits[0]");
				fclose($fp);
				echo exec('sudo iptables -t nat -A PREROUTING -p tcp --dport '.$hits[0].' -j DNAT --to-destination '.$raddr.':'.$rport);
				echo exec('sudo iptables -t nat -A POSTROUTING -j MASQUERADE');
				echo (50-$linecount).' Proxies left | ';
				echo '135.148.121.73:' . $hits[0];
				
				
				$txt = htmlspecialchars($token); 
				$fh = fopen('./d/'.$txt, 'a'); 
				$txt=''.htmlspecialchars($raddr).':'.htmlspecialchars($rport).' - to -> '.'135.148.121.73:'.$hits[0].PHP_EOL;
				fwrite($fh,$txt);
				fclose($fh);

				$txt = htmlspecialchars($token); 
				$fh = fopen('./p/'.$txt, 'a'); 
				$txt=$hits[0].PHP_EOL;
				fwrite($fh,$txt);
				fclose($fh);

				$txt = htmlspecialchars($token); 
				$fh = fopen('./h/'.$txt, 'a'); 
				$txt=htmlspecialchars($raddr).PHP_EOL;
				fwrite($fh,$txt);
				fclose($fh);

				$txt = htmlspecialchars($token); 
				$fh = fopen('./lp/'.$txt, 'a'); 
				$txt=htmlspecialchars($rport).PHP_EOL;
				fwrite($fh,$txt);
				fclose($fh);
				
				
				
				
				exit;
				exit();
				exit(0);				

				}




		
		
				$file = file("./p/".htmlspecialchars($token));
				$file = array_reverse($file);
				$file2 = file("./lp/".htmlspecialchars($token));
				$file2 = array_reverse($file2);
				$file3 = file("./h/".htmlspecialchars($token));
				$file3 = array_reverse($file3);
				for ($i = max(0, count($file)-100); $i < count($file); $i++) {
					$rip = trim($file[$i], "\n\r\t\v\0");
					$rip2 = trim($file3[$i], "\n\r\t\v\0");
					$rip3 = trim($file2[$i], "\n\r\t\v\0");
					$parse = $rip2.':'.$rip3;
					$command = "sudo netstat-nat -n | grep '".$parse."'";
					$output = shell_exec($command);
					if ($html == 'false'){
					echo 'Proxy: '.htmlspecialchars($parse).' -> 135.148.121.73:'.htmlspecialchars($rip);
					echo ' -> ' . htmlspecialchars($output) . '';
				}else{
					echo '<br><br>Proxy: '.htmlspecialchars($parse).' -> 135.148.121.73:'.htmlspecialchars($rip);
					echo '<br>----------------------------------------------------------------------------------------------';
					echo '<pre>' . htmlspecialchars($output) . '</pre>';
					}
	}
		  }else{
	



		echo 'You need a valid token...';
		exit;
		exit();
		exit(0);


}
?>



