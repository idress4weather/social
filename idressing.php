     <?php
$file="base_bot";        //имя файла с логами ботов
$col_zap=2499;            //записей в логе ботов
$xxx=trim(strip_tags($_SERVER['HTTP_USER_AGENT']));
if (strpos($xxx, 'YandexBot')!==false) {$bot='YandexBot';}
elseif (strpos($xxx, 'Googlebot')!==false) {$bot='Googlebot';}
elseif (strpos($xxx, 'bingbot')!==false) {$bot='Bingbot';}
elseif (strpos($xxx, 'Mail')!==false) {$bot='Mail.ru';}
elseif (strpos($xxx, 'YandexBlogs')!==false) {$bot='YandexBlogs';}
elseif (strpos($xxx, 'YandexImage')!==false) {$bot='YandexImages';}
elseif (strpos($xxx, 'YandexFavicons')!==false) {$bot='YandexFavicons';}
elseif (strpos($xxx, 'YandexDirect')!==false) {$bot='YandexDirect';}
elseif (strpos($xxx, 'YandexNews')!==false) {$bot='YandexNews';}
elseif (strpos($xxx, 'YandexSomething')!==false) {$bot='YandexSomething';}
elseif (strpos($xxx, 'YandexMetrika')!==false) {$bot='YandexMetrika';}
elseif (strpos($xxx, 'YandexAntivirus')!==false) {$bot='YandexAntivirus';}
elseif (strpos($xxx, 'Feedfetcher-Google')!==false) {$bot='Feedfetcher-Google';}
elseif (strpos($xxx, 'Googlebot-Image')!==false) {$bot='Googlebot-Image';}
elseif (strpos($xxx, 'Yahoo')!==false) {$bot='Yahoo!';}
elseif (strpos($xxx, 'WebCrawler')!==false) {$bot='WebCrawler';}
elseif (strpos($xxx, 'ZyBorg')!==false) {$bot='ZyBorg';}
elseif (strpos($xxx, 'Scooter')!==false) {$bot='AltaVista';}
elseif (strpos($xxx, 'StackRambler')!==false) {$bot='Rambler';}
elseif (strpos($xxx, 'Aport')!==false) {$bot='Aport';}
elseif (strpos($xxx, 'lycos')!==false) {$bot='Lycos';}
elseif (strpos($xxx, 'fast')!==false) {$bot='Fast Search';}
elseif (strpos($xxx, 'msnbot')!==false) {$bot='MSN';}
elseif (strpos($xxx, 'Nigma.ru')!==false) {$bot='Nigma';}
elseif (strpos($xxx, 'ia_archiver')!==false) {$bot='Alexa';}
elseif (strpos($xxx, 'Baiduspider')!==false) {$bot='Baidu';}
elseif (strpos($xxx, 'Exabot')!==false) {$bot='Exabot';}
elseif (strpos($xxx, 'archive.org_bot')!==false) {$bot='Archive.org';}
elseif (strpos($xxx, 'Ezooms')!==false) {$bot='Ezooms';}
elseif (strpos($xxx, 'GrepNetstat.com Bot')!==false) {$bot='GrepNetstat.com';}
elseif (strpos($xxx, 'MJ12bot')!==false) {$bot='Majestic-12';}
elseif (strpos($xxx, 'AhrefsBot')!==false) {$bot='Ahrefs';}
elseif (strpos($xxx, 'TurnitinBot')!==false) {$bot='Turnitin';}
elseif (strpos($xxx, 'discobot')!==false) {$bot='Discobot';}
elseif (strpos($xxx, 'Subscribe.Ru')!==false) {$bot='Subscribe';}
elseif (strpos($xxx, 'TOP.NET.RU')!==false) {$bot='TOP.NET.RU';}
elseif (strpos($xxx, 'SISTRIX Crawler')!==false) {$bot='SISTRIX';}
elseif (strpos($xxx, 'Wotbox')!==false) {$bot='Wotbox';}
else {
    $file="base_user";        //имя файла с логами пользователей
    $col_zap=3499;          //записей в логе пользователей
    $bot=htmlspecialchars(substr($xxx,0,80));//обрезаем USER-AGENT до 80 символов
}
// my ip not write 127.0.0.1 ifconfig | less
 if ($_SERVER['REMOTE_ADDR']!='192.168.0.84') {
//записываем логи в файл с блокировкой
$l_cash='';
$fh=fopen($file,"a+");
flock($fh,LOCK_EX);
fseek($fh,0);
while (!feof($fh)) $l_cash.= fread($fh,8192);
$lines=explode("\n",$l_cash);
while(count($lines)>$col_zap) array_shift($lines);
$l_cash=implode("\n",$lines);
$l_cash.=date("H:i:s d.m")."|".$bot."|".$_SERVER['REMOTE_ADDR']."|".
    htmlspecialchars($_SERVER['REQUEST_URI'])."\n";
ftruncate($fh,0);
fwrite($fh,$l_cash);
flock($fh,LOCK_UN);
fclose($fh);
}
?>
<!DOCTYPE html>

<html lang="en">
	<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iDress4weather</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
	<link href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" rel="stylesheet" />

    <link href="css/main.css" rel="stylesheet" />

    <script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous">
    </script>

    <script src="js/main.js"></script>
    
	 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/instafeed.js/instafeed.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
   <script src="js/index.js"></script>
   <script type="text/javascript" src="libs/instafeed/instafeed.min.js"></script>    
   <script type="text/javascript"></script>	
<!-- coffe form -->
        <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
        <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
   <!-- Bootstrap Core CSS 
    <link href="css/bootstrap.min.css" rel="stylesheet"-->
    <!-- Custom CSS 
    <link href="css/business-casual.css" rel="stylesheet"-->
    <!-- Fonts 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--link href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" rel="stylesheet" /-->

    <!--link href="css/main.css" rel="stylesheet" /-->

    <script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous">
    </script>

    <!--script src="js/main.js"></script-->
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



	<script src="popup.html"></script>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header clearfix">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
		  
                <a class="navbar-brand page-scroll" href="#page-top">
                     
        <!--i class="fa fa-play-circle"></i--><span class="feelslike_c"  style = 'cursor: pointer;' title="Click to feelslike ºF"></span><span class="feelslike_f"  style = 'cursor: pointer;' title="Click to feelslike ºC"></span>
                <span><img class="icon" title="Have a nice day!"><!--span class="wind_dir" style="margin-right: 8px !Important;" title="Wind direction"></span--><!--span><img class="img" style="margin-right: 8px !Important;" src="img/kompas.png" alt=""--></span></span><span class="wind_kph" style = 'cursor: pointer;' title="Click to miles per hour"></span><span class="wind_mph"  style = 'cursor: pointer;' title="Click to mitres/second"></span></a>
		   
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
		
	
                    <li>
                        <a class="page-scroll" href="#weather">Weather</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#instruction">Instruction</a>
                    </li>			
                    <li>
                        <a class="page-scroll" href="#iwishit">I wish it</a>
                    </li>
                  		  

		    
		    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                                <li>
                        <a class="page-scroll" href="#newapps">New apps</a>
                    </li>	
		    <li>
                        <a class="page-scroll" href="#map-canvas">Map</a>
                    </li>
			
			
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
			<div class="column column-1"> 
	
				
				
				
				
                        <!--h1 class="brand-heading"><hr></h1-->
			 	
                        <p class="intro-text" style="margin-top: 50px; font-family: 'Quicksand', sans-serif; margin-right: 8px;">____________________________</p>
           
           			    
			
<style>
#instafeed a {
  padding:5px 5px 1px 5px;
  margin:10px;
  border:1px solid #e1e1e1;
  display:inline-block;
  border-radius: 4px;
  position:relative;
}
	#instafeed .likes {
  background:rgba(10,100,105,0.8);
  font-family:sans-serif;
  font-size:1em;
  position:absolute;
  color:#fff;
  right:5px;
  top:5px;
  left:5px;
  opacity:0;
  text-align:center;
  line-height:150px;
  text-shadow:0 1px rgba(0,0,0,0.5);
  -webkit-font-smoothing:antialiased;
  -webkit-transition: opacity 100ms ease;
    -moz-transition: opacity 100ms ease;
    -o-transition: opacity 100ms ease;
    -ms-transition: opacity 100ms ease;
    transition: opacity 100ms ease;
}
#instafeed a:hover .likes {
  opacity:1;

.clearfix:after,
.clearfix:before{
    display: table;
    content: '';
}
.clearfix:after{
    clear: both;
}
}
</style>
<marquee behavior="scroll" scrollAmount="5" direction="up" position="inherit"  width="auto" height="150" onMouseOver="this.scrollAmount=0" onMouseOut="this.scrollAmount=3">
   <div class='beg_stroka' align="middle" > 
  				
<div id="instafeed class="brand-heading" clearfix">
	<a href="https://www.instagram.com/idress4weather/" id="next-button" title="Add New INSTA #25">!</a></div>
	</div>
	
</div>
</marquee>
			    
<div class="row">
            <div class="box">
                <div class="col-lg-12">
                  
                    <h1 class="intro-text text-center" >		
			    <hr id="weather" style="margin-top: 30px;"></div></div> </div>
                <h3 class="intro-text text-center"  style="margin-top: 35px;"><a class="page-scroll" href="#map-canvas">FORECAST</a></h3> 
	<!--button  type="button"  class="btn btn-default btn-lg" style="margin-top: 35px;" onclick="popup('popup.html', '', 800, 600);">FORECAST</button>
         
<script>
    function popup(url, title, width, height) {
        var left = (screen.width / 2) - (width / 2);
        var top = (screen.height / 2) - (height / 2);
        var options = '';    
        options += ',width=' + width;
        options += ',height=' + height;
        options += ',top=' + top;
        options += ',left=' + left;    
        return window.open(url, title, options);
    }
    function setData(data) {
        console.log(data);
        var strData = JSON.stringify(data);
        document.getElementById('retrievedData').innerHTML = strData;
        var requestBinUrl = 'http://requestb.in/18u87g81';
        window.location.href = requestBinUrl + '?data=' + strData;
    }
</script-->
	  <p  class="intro-text text-center" style="margin-top: 2px; font-family: 'Quicksand', sans-serif; margin-right: 8px;">____________________________</p>



 <br><h2 >Current Weather</a></h2></p>		
<marquee behavior="scroll" scrollAmount="5" direction="up" position="inherit"  width="auto" height="250" onMouseOver="this.scrollAmount=0" onMouseOut="this.scrollAmount=3">
   <div class='beg_stroka' align="middle" >				

	
      <img src="https://media.giphy.com/media/xUPGck3phxwOSkm3f2/giphy.gif" id="loader">
      <div class="flex-parent">
        <div class="flex-child">

            <div id="city" title="The best city of the world!">
                New York
            </div>       

            <div id="temp_c" class="temperature">
                +25 <a id="temp_unit_c" style = 'cursor: pointer;' title="Click to current ºF">ºC</a>
            </div>      
            <div id="temp_f" class="temperature">
                0 <a id="temp_unit_f" style = 'cursor: pointer;' title="Click to current ºC">ºF</a>
            </div>
            <div id="wind_dir" title="Wind dirrection">
                
            </div>
            <div id="wind_kph" class="temperature">
                +25 <a id="temp_unit_kph" style = 'cursor: pointer;' title="Click to miles per hour">m/s</a>
            </div>      
            <div id="wind_mph" class="temperature">
                0 <a id="temp_unit_mph" style = 'cursor: pointer;' title="Click to mitres per sececond">mph</a>
            </div>                         

            <img id="icon" title="Have a nice day" src="img/images/icons/black/sunny.svg" />

            <div id="weather">
                Sunny
            </div>
            <div id="feelslike_c" class="temperature">
                +25 <a id="temp_unit_c" style = 'cursor: pointer;' title="Click to feelslike ºF">ºC</a>
            </div>      
            <div id="feelslike_f" class="temperature">
                0 <a id="temp_unit_f" style = 'cursor: pointer;' title="Click to feelslike ºF">ºF</a>
            </div
            

        </div>
    </div>
                 
        <!--p class="location" title="The best city of the world!"></p>
        <p class="temp_c"  style = 'cursor: pointer;' title="Click to current ºF"></p> 
        <p class="temp_f"  style = 'cursor: pointer;' title="Click to current ºC"></p>

	<span><p class="wind_dir" title="Wind dirrection"></p></span><span><p class="wind_kph" style = 'cursor: pointer;' title="Click to miles per hour"></p></span>	
  	<span><p class="wind_mph" style = 'cursor: pointer;' title="Click to mitres per sececond"></p></span>	
  
	<p class="text"></p>
        <img class="icon" title="Have a nice day">
	<p class="feelslike_c"  style = 'cursor: pointer;' title="Click to feelslike ºF"></p> 
        <p class="feelslike_f"  style = 'cursor: pointer;' title="Click to feelslike ºC"></p-->	
	
	   
 </div>
</marquee>
	

                    </div>
                </div>
            </div>
        </div>
</header style="margin-bottom: 60px;">
	<section id="instruction">
        <div id="thumb-wrap" style="margin-top: 1px">
        <iframe width="500" height=2500" src="https://www.youtube.com/embed/MIKkAfmY4KE?enablejsapi=1; autoplay=1 &origin="https://example.com" frameborder="0" allowfullscreen></iframe>    
        </div>
        
    
        </div>
    </div>
</section>
<!-- /*  56.25 % задаёт высоту контейнера для 16:9 (если 4:3 — поставьте 75%) */-->
<style>
#thumb-wrap {
  position: relative;
  padding-bottom: 75%;
  padding-top: 5px;
  height: 0;
  overflow: hidden;
}
#thumb-wrap iframe {
  position: absolute;
margin: auto;                                      
  top: 67px;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
   


<script>
 window.onload= function() {
    document.getElementById('toggler').onclick = function() {
        openbox('box', this);
        return false;
    };
};
function openbox(id, toggler) {
    var div = document.getElementById(id);
    if(div.style.display == 'block') {
        div.style.display = 'none';
        toggler.innerHTML = 'Open instuction';
    }
    else {
        div.style.display = 'block';
        toggler.innerHTML = 'Close';
    }
}
</script>
            

    <!-- Download Section -->
    <section id="iwishit" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
			<p  style = 'cursor: pointer; margin-top: 3px !Important;'><h1><a id="toggler"  
				 href="#" title="Click what to do">Contact
                        IF YOU WISH THE SAME APP</a></h1><p>
                   
		    <hr>
<div id="box" style="display: none;">

<h5><p>1. Create 
<br>new Instagram account 
<br>WITH
<br>new Instagram login 
<br>WITH 
<br>temporary password 12345admin 

<br>2. Send
<br> your new Instagram Login 
<br>TO  
<br>us
    
<br>3. Add and Mark
<br>your Instagram photo 
<br>WITH 
<br>current weather #25 #26 #27
							 
<br>4. Tomorrow 
<br>you will start with us
</p></h5>
	</div>
		   </div>
            </div>

			     <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>		

                  
                    <p></p>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>New Instagram Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
    <!-- /.container -->
			
  
 
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contacts iDress4weather</h2>
                <p>Feel free to email us to provide some feedback on our icontrolmy.pp.ua/dressing, give us suggestions for new functionality, or to just say hello!</p>
                
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://www.facebook.com/ID4W-309131922831787/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
		        <a href="https://plus.google.com/102141724140807407327" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                    <li>
			  <a href="https://github.com/DInnaD" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
 
                    </li>
                </ul>

            </div>
        </div>
</section>
<section   id="newapps" class="container" style="margin-top: 300px;">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to new apps which coming soon</small>
                    </h2>
                    
                </div>
            </div>
        </div>
</section>
    <!-- Map Section -->
    <div id="map-canvas"></div>


   
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; <a href="https://icontrolmy.com">icontrolmy.pp.ua</a> &copy; 2017</p>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Google Maps API Key - Use your own API key= AIzaSyCx713Z6MzLSQe5QSC2mtrRE0XIxb1LRns to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>
				     
	 

</body>
</html>			     

