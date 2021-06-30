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
		<section id="right-side" class=""  style="background-color: transparent; opacity: 1;" >
			<center>
				<br><br>
				<h3><b>Your Recent Proxies</b></h3>
				<br><br></center>
				<?php
				$file = file("./d/".htmlspecialchars($_COOKIE["rez"]));
				$file = array_reverse($file);
				$file2 = file("./h/".htmlspecialchars($_COOKIE["rez"]));
				$file2 = array_reverse($file2);
				$file3 = file("./lp/".htmlspecialchars($_COOKIE["rez"]));
				$file3 = array_reverse($file3);
				for ($i = max(0, count($file)-10); $i < count($file); $i++) {
					$rport = trim($file3[$i], "\n\r\t\v\0");
					$rip = trim($file2[$i], "\n\r\t\v\0");
					$fp = @fsockopen(htmlspecialchars($rip), htmlspecialchars($rport), $errno, $errstr, .3);
					if (!$fp) {
					
					  echo '<div id="his" style="width:550px; margin:0 auto;"><h5 style="text-shadow: 1px 1px 2px black, 0 0 1em black, 0 0 0.2em black;"><font style="color:red">[Offline] </font>'.htmlspecialchars($file[$i]).'</h5></div><br>';
					}else{
					  echo '<div id="his" style="width:550px; margin:0 auto;"><h5 style="text-shadow: 1px 1px 2px black, 0 0 1em black, 0 0 0.2em black;"><font style="color:lime">[Online] </font>'.htmlspecialchars($file[$i]).'</h5></div><br>';
					

				}
			}
				?>
				<?php
				if ( 0 == filesize( 'd/'. htmlspecialchars($_COOKIE["rez"])))
				{
					echo '<center><h5>No Recent Proxies :(</h5></center>';
				}
				?>
				
				
				
				
				

				
				
				
				
				
				
				
				
				
				

			</center>
		</section>
		
		<section id="left-side" class="" style="opacity: 1;">
			<img src="https://bitnix.site/storage/branding_media/ZK0XIFMXcWNmvx0oW68FHuzENwTzXuSmen8jD4cI.png" alt="" class="brand-logo mCS_img_loaded">

			<div class="content">

				<h1 class="text-intro animated-middle fadeInUp">Tunnely</h1>
					<h3><div id="getting-started">Free Reverse Proxy Hosting</div></h3>
				

				<h2 class="text-intro animated-middle fadeInUp">Free and always free reverse proxy hosting. Whether it be game <br>
					hosting	or other IoT devices, we provide unlimited bandwidth<br>
					and unlimited connections with free denial of service protection.</h2>

				<nav>
					<ul>
						<li>
							<form action="G" method="POST">
								<input type="text" class="light-btn text-intro animated-middle fadeInUp" required="true" name="ip" placeholder="Server IP Address..."><input type="text" class="light-btn text-intro animated-middle fadeInUp" required="true" name="port" size="10" placeholder="Server Port...">
								<input class="light-btn text-intro animated-middle fadeInUp" type="submit" id="button" name="submit" value="Submit">
								<input type="hidden" style="display:none" name="token" value="<?php echo htmlspecialchars($token);?>"/>
							</form>
							<br><br><br><br>
							<a href="https://wiki.bitnix.co/tunnely" id="open-more-info" data-target="right-side" class="light-btn text-intro animated-middle fadeInUp">Wiki</a>
						</li>
						<li>
							<a href="H" data-dialog="somedialog" class="action-btn trigger text-intro animated-middle fadeInUp">Manage</a>
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
