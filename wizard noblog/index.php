<!DOCTYPE html>
<html>
<head>
	<title>My Web View - Get your App Instantly</title>
    <meta name="description" content="My web View is a web service to simply get your android application from your web site"/>
	<meta name="keywords" content="webview generator, mywebview, generate android application, android application generator, my web view"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.qtip-1.0.0-rc3.min.js"></script>
    <script type="text/javascript" src="jquery_download.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <!-- <script type="text/javascript" src="jquery.uniform.min.js"></script> -->
    <script type="text/javascript" charset="utf-8">
          /*$(function(){
            $("input, textarea, select, button").uniform();
          });*/
    </script>
    <link href='http://fonts.googleapis.com/css?family=Magra' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <link rel="icon" href="favicon.png" type="image/png" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>


<body>

	<div id="cross_menu">
    <a href="http://www.mywebview.com"> Service </a>|
    <a href="http://blog.mywebview.com"> Blog </a>
    </div>

	<div id="spot">
            <a href="index.php">
				<?php $val = rand(0,1); if($val){ ?>
                    <img src="images/defensors.png"/>
                <?php }else{ ?>
                    <img src="images/knight.png" />
                <?php } ?>
            </a>
     </div>
     <div id="particelle"><img src="images/particelle.png" /></div>  

	<div id="form_div">           
        <div id="risposta">
        </div>      
         
             
        <form id="fordownload" method="post" action="download.php" enctype="multipart/form-data">
        <div class="main_data">  
        	<img src="images/logo.png" />   
            <div class="Nome-wrapper wrap value">
            <!-- <label> Nome Applicazione: *</label> -->
            <span class="Nome-icon"></span>
            <input type="text" id="Nome" name="Nome"  value="Application Name"   maxlength="100" class="longer" 
            title="Application Name" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if (this.value=='') this.value=this.defaultValue"/><br />
            <span class="alert"></span>
            </div>
            
            <div class="SitoWeb-wrapper wrap value">
            <!-- <label>Sito web: *</label> -->
            <span class="SitoWeb-icon"></span>
            <input type="text" id="SitoWeb" name="SitoWeb"  value="Url"  maxlength="200" class="longer"
            title="Your Url: Starts with http://" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if (this.value=='') this.value=this.defaultValue"><br />
            <span class="alert"></span>
            </div>  
            
            <div class="Mode-wrapper">
             <input type="radio" name="radio" id="debug" value="debug" checked><label for="radio" title="App signed for independent release">debug</label>
             <input type="radio" name="radio" id="unsigned" value="unsigned"  disabled><label for="radio"  title="App ready for independent sign: avaiable soon">unsigned</label>
             <input type="radio" name="radio" id="market" value="market" disabled><label for="radio"  title="App ready to be publish in the market: avaiable soon">market</label>
            </div>
            
            <div class="Invia-wrapper wrap">
            <input id="invia" type="submit" value="Get My App!" name="invia">
            </div>            
            <div></div>
	   </div>
       </form>
       <div id="qrcode"></div>
       <div id="download_frame"></div>
       <div id="text" style="display:none;"><p>This service is born to make instantly your web application for android smartphones simply from your url!</p></div>
       <div id="credits"><small>Version: 1.0 Beta - Credits <a href="mailto:info@mywebview.com">Andrea Pola</a> - All logos are propreties of respective owner, include Android logo and Html5 logo. <a href="http://blog.mywebview.com/?page_id=6">See more information</a></small></div>
    </div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8933725-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>  
    
</body>
</html>