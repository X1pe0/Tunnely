<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
header("location:login.php");
exit;
}
?>
<?php
if(!isset($_SESSION))
{
session_start();
}
if($_POST)
{
if($_SESSION['token']==$_POST['token'])
{
#code
}
else
{
header('Location: /');
}
}
$_SESSION['token']=$token=rand();
?>
<?php
$rando = md5(uniqid(mt_rand()));
?>
<?php 
if( isset( $_COOKIE['rez']  ) )
{

          if (!preg_match('/[^A-Za-z0-9]/', htmlspecialchars($_COOKIE["rez"])) && strlen(htmlspecialchars($_COOKIE["rez"])) == 32){
			  echo "";
		  }else{
		      setcookie('rez', $rando, time()+2147483647);
		  $dbh = fopen("./d/".$rando, "w");
		  fclose($dbh);
		  $dbh = fopen("./p/".$rando, "w");
		  fclose($dbh);		      
		  $dbh = fopen("./h/".$rando, "w");
		  fclose($dbh);	
		  $dbh = fopen("./lp/".$rando, "w");
		  fclose($dbh);	
		  }


}
else
{
          setcookie('rez', $rando, time()+2147483647);
		  $dbh = fopen("./d/".$rando, "w");
		  fclose($dbh);
		  $dbh = fopen("./p/".$rando, "w");
		  fclose($dbh);		      
		  $dbh = fopen("./h/".$rando, "w");
		  fclose($dbh);	
		  $dbh = fopen("./lp/".$rando, "w");
		  fclose($dbh);	
			  
}
?>
<html>
        <title>Tunnely</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./files/style.css">
		<script src="./files/modernizr.custom.js"></script>
	</head>
	<body class="mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
		<div id="loading" class="" style="opacity: 0; display: none;">
			<div id="preloader" class="" style="opacity: 0;">
				<span></span>
				<span></span>
			</div>
		</div>
		<div id="wavybg-wrapper"> 
	    	<canvas width="1408" height="760">Your browser does not support HTML5 canvas.</canvas>
		</div>
		<div class="global-overlay" style="opacity: 1; transform: translateX(100%);">
			<div class="overlay skew-part">

				<div id="stars"></div>
				<div id="stars2"></div>
				<div id="stars3"></div>

			</div>
		</div>
		<section id="left-side" class="" style="opacity: 1;">
			<img src="https://bitnix.site/storage/branding_media/ZK0XIFMXcWNmvx0oW68FHuzENwTzXuSmen8jD4cI.png" alt="" class="brand-logo mCS_img_loaded">

			<div class="content">

				<h1 class="text-intro animated-middle fadeInUp">Tunnely
					<div id="getting-started">Free Reverse Proxy Hosting</div>
				</h1>

				<h2 class="text-intro animated-middle fadeInUp">Free and always free reverse proxy hosting. Whether it be game <br>
					hosting	or other IoT devices, we provide unlimited bandwidth<br>
					and unlimited connections with free denial of service protection.</h2>

				<nav>
					<ul>
						<li>
							
<?php
$filez="d/".htmlspecialchars($_COOKIE["rez"]);
$linecount = 0;
$handle = fopen($filez, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}

fclose($handle);
$totalp = ($linecount-1);
if ($totalp > '49'){
		header('Location: /');
		exit;
		exit();
		exit(0);
	}
?>						
							
<?php
if (isset($_POST['submit'])){
	if ($_POST['ip'] == '0.0.0.0'){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['ip'] == '127.0.0.1'){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['ip'] == '127.0.1.1'){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['ip'] == '135.148.121.73'){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['ip'] == 'localhost'){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['ip'] == ''){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
	if ($_POST['port'] == ''){
		header('Location: /');
		exit;
		exit();
		exit(0);
		
		}
$ip = $_POST['ip'];
$port = $_POST['port'];
if (ctype_digit(htmlspecialchars($port)) && strlen(htmlspecialchars($port)) < 6){
if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
$count_my_page = ("./countlog.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
echo exec('sudo iptables -t nat -A PREROUTING -p tcp --dport '.$hits[0].' -j DNAT --to-destination '.$ip.':'.$port);
echo exec('sudo iptables -t nat -A POSTROUTING -j MASQUERADE');
echo 'Your new server address is 135.148.121.73:' . $hits[0];
} else {
echo("Please post a valid IP.");
exit;
exit();
exit(0);
}
}else{
echo("Please post a valid Port.");
exit;
exit();
exit(0);
}
}else{
header('Location: /');
exit;
exit();
exit(0);
}
?>
<?php
if (isset($_POST['submit'])){
$txt = htmlspecialchars($_COOKIE["rez"]); 
$fh = fopen('./d/'.$txt, 'a'); 
$txt=''.htmlspecialchars($_POST['ip']).':'.htmlspecialchars($_POST['port']).' - to -> '.'135.148.121.73:'.$hits[0].PHP_EOL;
fwrite($fh,$txt);
fclose($fh);

$txt = htmlspecialchars($_COOKIE["rez"]); 
$fh = fopen('./p/'.$txt, 'a'); 
$txt=$hits[0].PHP_EOL;
fwrite($fh,$txt);
fclose($fh);

$txt = htmlspecialchars($_COOKIE["rez"]); 
$fh = fopen('./h/'.$txt, 'a'); 
$txt=htmlspecialchars($_POST['ip']).PHP_EOL;
fwrite($fh,$txt);
fclose($fh);

$txt = htmlspecialchars($_COOKIE["rez"]); 
$fh = fopen('./lp/'.$txt, 'a'); 
$txt=htmlspecialchars($_POST['port']).PHP_EOL;
fwrite($fh,$txt);
fclose($fh);
}						
?>						
							
							<br><br>
							<a href="/" id="open-more-info" data-target="right-side" class="light-btn text-intro animated-middle fadeInUp">Back</a>
						</li>
						<li>
							<a href="H" data-dialog="somedialog" class="action-btn trigger text-intro animated-middle fadeInUp">History</a>
						</li>
					</ul>
				</nav>

			</div>
		</section>
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="pswp__bg"></div>
		    <div class="pswp__scroll-wrap">
		        <div class="pswp__container">
		            <div class="pswp__item"></div>
		            <div class="pswp__item"></div>
		            <div class="pswp__item"></div>
		        </div>
		        <div class="pswp__ui pswp__ui--hidden">

		            <div class="pswp__top-bar">
		                <div class="pswp__counter"></div>
		                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
		                <button class="pswp__button pswp__button--share" title="Share"></button>
		                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
		                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
		                <div class="pswp__preloader">
		                    <div class="pswp__preloader__icn">
		                      <div class="pswp__preloader__cut">
		                        <div class="pswp__preloader__donut"></div>
		                      </div>
		                    </div>
		                </div>
		            </div>
		            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
		                <div class="pswp__share-tooltip"></div> 
		            </div>
		            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
		            </button>
		            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
		            </button>
		            <div class="pswp__caption">
		                <div class="pswp__caption__center"></div>
		            </div>
		        </div>
		    </div>
		</div>
	<script src="./files/jquery.min.js"></script>
	<script src="./files/jquery.easings.min.js"></script>
	<script src="./files/bootstrap.min.js"></script>
	<script src="./files/velocity.min.js"></script> 
	<script src="./files/velocity.ui.min.js"></script>  
	<script src="./files/notifyMe.js"></script>
	<script src="./files/contact-me.js"></script>
	<script src="./files/waterpipe-2.js"></script>
	<script src="./files/jquery.mousewheel.js"></script>
	<script src="./files/jquery.mCustomScrollbar.js"></script>
	<script src="./files/classie.js"></script>
	<script src="./files/dialogFx.js"></script>
	<script src="./files/photoswipe.js"></script> 
	<script src="./files/photoswipe-ui-default.js"></script>
	<script src="./files/jquery.countdown.js"></script>
	<script src="./files/main.js"></script>
</div>
</div>
</body>
</html>
