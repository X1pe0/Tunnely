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

	$findThisString = $_POST['fname'];
	if (!preg_match('/[^A-Za-z0-9]/', htmlspecialchars($findThisString)) && strlen(htmlspecialchars($findThisString)) == 32){
		setcookie('rez', $findThisString, time()+2147483647);
		header('Location: /H');
	}else{
		
	
		header('Location: /H');
	}



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
<style>
br {
display: block;
margin: 5px 0;
}
html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
</style>
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
		<section id="right-side" class=""  style="border-width:2px; border-style:solid; border-color:#00c8aa; background-color: #0D2435; opacity: 100%;" >
			<br><br><br><center><h2>My Network Traffic</h2>
			</center>
			<div id="his" style="overflow:hidden; width:550px; height: 10000vh; margin:0 auto;"><div id="ReloadThis" style="">Loading...</div><br><br><br><br><br></div>
			
		</section>
		<section id="left-side" class="" style="border-width:2px; border-style:solid; border-color:#00c8aa; background-color: #200D35; opacity: 100%;">
			
			<img src="https://bitnix.site/storage/branding_media/ZK0XIFMXcWNmvx0oW68FHuzENwTzXuSmen8jD4cI.png" alt="" class="brand-logo mCS_img_loaded">
			

			<br>


			</center>
			<div class="content">
			<h2>My Account</h2>
			<?php 
			echo 'Account Token: '.htmlspecialchars($_COOKIE["rez"]);
			?>
			<form action="/H" method="post">
			<label for="fname">Change Token</label>
			<input type="text" id="fname" name="fname">
			<input type="submit" value="Submit">
			</form>
			<?php
			$filez="d/".htmlspecialchars($_COOKIE["rez"]);
			$linecount = 0;
			$handle = fopen($filez, "r");
			while(!feof($handle)){
			  $line = fgets($handle);
			  $linecount++;
			}

			fclose($handle);
			echo '<br>Plan: Beta<br>My total proxies: '.($linecount-1).' out of 50.<br><br>';
			?>
			<p>Behind a firewall? OpenVPN Tunnel - <a href='files/vpnclients/Tunnely.ovpn.zip'>Tunnely Config</a></p>
			<p>Default username: tunnely | Password: 123456789</p><br>
			<p>Experience any issues? Email: service@bitnix.co.</p>
			<p><br>API Documentation - <a href='https://tunnely.bitnix.co/api?documentation=true'>Here</a>.</p>
			



				

				<nav>
					<ul>
						<li>

							<br><br>
							<a href="api?id=<?php echo htmlspecialchars($_COOKIE["rez"]); ?>" id="open-more-info" data-target="right-side" class="light-btn text-intro animated-middle fadeInUp">Raw View</a>
						</li>
						<li>
							<a href="/" data-dialog="somedialog" class="action-btn trigger text-intro animated-middle fadeInUp">Go Back</a>
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
<script type="text/javascript">

        function Ajax()
        {
            var
                $http,
                $self = arguments.callee;

            if (window.XMLHttpRequest) {
                $http = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                try {
                    $http = new ActiveXObject('Msxml2.XMLHTTP');
                } catch(e) {
                    $http = new ActiveXObject('Microsoft.XMLHTTP');
                }
            }

            if ($http) {
                $http.onreadystatechange = function()
                {
                    if (/4|^complete$/.test($http.readyState)) {
                        document.getElementById('ReloadThis').innerHTML = $http.responseText;
                        setTimeout(function(){$self();}, 1000);
                    }
                };
          
        
                $http.open('GET', 'api?id=<?php echo htmlspecialchars($_COOKIE["rez"]); ?>');
        
                $http.send(null);
            }

        }

    </script>

<script type="text/javascript">
        setTimeout(function() {Ajax();}, 1000);
</script>
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
