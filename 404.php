<?php session_start(); define("include",true); include("config.php"); ?>

<!--
	Php Scriptlerim
		www.phpscriptlerim.com
			info@phpscriptlerim.com 
				!!! 2019 !!!
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">	
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	

	<title>404! | <?php echo $print['title']; ?></title>		

    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="color/<?php echo $print['color']; ?>/css/style.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="color/<?php echo $print['color']; ?>/css/main.css" />
<?php echo $print['analytics']; ?>	
</head>
<body>

<div id="main">

<?php include("plugin/header.php"); ?>

    <div id="cols2-top"></div>
    <div id="cols2" class="box">
    
        <div id="col-left" style="margin-top:-20px; !important" align="center">

			<img src="images/404.png" alt="404" />
			<br><br>
			<font style="font-weight:bold; font-size:16pt;">Ulaşmaya çalıştığınız sayfa, yazı bulunamadı.<br> İsmi değiştirilmiş veya silinmiş olabilir.</font>
			
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Bize Ulaşın</span></h4>

            <div class="box">
				
			<?php echo $print['contact']; ?>	
            
            </div>
        
        </div>
    
    </div>
    <div id="cols2-bottom"></div>

    <hr class="noscreen" />

<?php include("plugin/footer.php"); ?>
</div>
<script src="js/jquery-latest.min.js"></script>
<?php include("plugin/bizsizicalling.php"); ?>

</body>
</html>