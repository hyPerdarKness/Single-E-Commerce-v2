<?php session_start(); define("include",true); include("config.php"); include("plugin/functions.php"); $url = htmlclean($_GET['url']);
$sorgu = $db->prepare("select * from pages where sefurl=?"); $sorgu->execute(array($url)); if($sorgu->rowCount()=="0"){ header("Location: ".$bshrf."404.php"); }else{ $gelen = $sorgu->fetch(PDO::FETCH_ASSOC); ?>

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
	<meta name="description" content="<?php echo $print['description']; ?>" />
	<meta name="keywords" content="<?php echo $print['keywords']; ?>" />	
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	

	<title><?php echo $gelen['title']; ?> | <?php echo $print['title']; ?></title>		

    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $bshrf; ?>css/reset.css" />
    <link rel="stylesheet" media="print" type="text/css" href="<?php echo $bshrf; ?>css/print.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $bshrf; ?>color/<?php echo $print['color']; ?>/css/style.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $bshrf; ?>color/<?php echo $print['color']; ?>/css/main.css" />
<?php echo $print['analytics']; ?>	
</head>
<body>

<div id="main">

<?php include("plugin/header.php"); ?>

    <div id="cols2-top"></div>
    <div id="cols2" class="box">
    
        <div id="col-left" style="margin-top:-20px; !important">

			<h1><?php echo $gelen['title']; ?></h1>

		<?php echo $gelen['content']; ?>	
			
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Kullanıcı Yorumları</span></h4>

            <div class="box">
	
        <ul class="ul-01">
		<?php foreach($db->query("select * from yorumlar where onay='1' order by id desc limit 0,5") as $rrr){ ?>
			<li><a href="yorumlar<?php echo $print['seolink']; ?>">
		<?php echo kisalt($rrr['yorum'], 100); ?>			
			</a></li>			
		<?php } ?>
			</ul>
			
            </div><br><br>
        
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
<?php } ?>