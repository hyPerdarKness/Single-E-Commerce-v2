<?php session_start(); define("include",true); include("config.php"); include("plugin/functions.php"); ?>

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

	<title><?php echo $print['title']; ?></title>		

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

    <div id="col-top"></div>
    <div id="col" class="box">
<?php foreach($db->query("select * from bloks where id='1'") as $bbb){ ?>       
        <div id="col-browser"><img src="<?php echo $bbb['picture']; ?>" width="255" height="177" alt="<?php echo $bbb['title']; ?>" /></div> 
        
        <div id="col-text">

            <h2><?php echo $bbb['title']; ?></h2>
           
			<?php echo $bbb['content']; ?>
                       
            <p id="btns" align="right">
            <a href="yorumlar<?php echo $print['seolink']; ?>" class="buton yesil">Yorumlar</a>	
			&nbsp;&nbsp;&nbsp;&nbsp;	
            <a href="siparisver<?php echo $print['seolink']; ?>" class="buton kirmizi">Sipariş Ver</a>
            </p>
	
        </div>
    <?php } ?>
    </div>
    <div id="col-bottom"></div>
    
    <hr class="noscreen" />
    
    <div id="cols3-top"></div>
    <div id="cols3" class="box">
    
        <div class="col">
<?php foreach($db->query("select * from bloks where id='2'") as $bxb){ ?>       
            <h3><?php echo $bxb['title']; ?></h3>
            
            <p class="nom t-center"><img src="<?php echo $bxb['picture']; ?>" alt="<?php echo $bxb['title']; ?>" /></p>

            <div class="col-text">
			<?php echo $bxb['content']; ?>
            </div>

            <div class="col-more"><a href="siparisver<?php echo $print['seolink']; ?>" class="buton gri">Satın Al</a></div>
	<?php } ?>
        </div>

        <hr class="noscreen" />

        <div class="col">
<?php foreach($db->query("select * from bloks where id='3'") as $byb){ ?>       
            <h3><?php echo $byb['title']; ?></h3>

            <p class="nom t-center"><img src="<?php echo $byb['picture']; ?>" alt="<?php echo $byb['title']; ?>" /></p>

            <div class="col-text">
			<?php echo $byb['content']; ?>
            </div>

            <div class="col-more"><a href="siparisver<?php echo $print['seolink']; ?>" class="buton gri">Satın Al</a></div>
	<?php } ?>
        </div>

        <hr class="noscreen" />

        <div class="col last">
<?php foreach($db->query("select * from bloks where id='4'") as $btb){ ?>       
            <h3><?php echo $btb['title']; ?></h3>

            <p class="nom t-center"><img src="<?php echo $btb['picture']; ?>" alt="<?php echo $btb['title']; ?>" /></p>

            <div class="col-text">
			<?php echo $btb['content']; ?>
            </div>

            <div class="col-more"><a href="siparisver<?php echo $print['seolink']; ?>" class="buton gri">Satın Al</a></div>
	<?php } ?>
        </div>

        <hr class="noscreen" />
    
    </div>
    <div id="cols3-bottom"></div>

    <div id="cols2-top"></div>
    <div id="cols2" class="box">
    
        <div id="col-left">

            <div class="title">
                <h4>Blog</h4>
            </div>
            
            <ul class="ul-list nomb">
<?php foreach($db->query("select * from blog order by id desc") as $yxz){ if($print['seolink']==".php"){ ?>			
    <li><span class="f-right"><a href="single.php?url=<?php echo $yxz['sefurl']; ?>" class="ico-comment"><?php $say = $db->query("select count(*) from comments where blogID='".$yxz['id']."' AND onay='1'")->fetchColumn(); echo number_format($say); ?> Yorum</a></span> <?php echo timeConvert($yxz['tarih']); ?> &#8649; <a href="single.php?url=<?php echo $yxz['sefurl']; ?>" class="article"><?php echo $yxz['title']; ?></a></li>
	<?php }elseif($print['seolink']==".html"){ ?>
	<li><span class="f-right"><a href="blog/<?php echo $yxz['sefurl']; ?>.html" class="ico-comment"><?php $say = $db->query("select count(*) from comments where blogID='".$yxz['id']."' AND onay='1'")->fetchColumn(); echo number_format($say); ?> Yorum</a></span> <?php echo timeConvert($yxz['tarih']); ?>	&#8649; <a href="blog/<?php echo $yxz['sefurl']; ?>.html" class="article"><?php echo $yxz['title']; ?></a></li>	
    <?php } } ?>        
			</ul>
        
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Kullanıcı Yorumları</span></h4>

            <div class="box">
            
        <ul class="ul-01">
		<?php foreach($db->query("select * from yorumlar where onay='1' order by rand() limit 0,1") as $rrr){ ?>
			<li><a href="yorumlar<?php echo $print['seolink']; ?>">
		<?php echo kisalt($rrr['yorum'], 100); ?>		
			</a></li>			
		<?php } ?>
			</ul>
            
            </div>
        
        </div>
    
    </div> 
    <div id="cols2-bottom"></div>	

<?php include("plugin/footer.php"); ?>
</div>
<script src="js/jquery-latest.min.js"></script>
<?php include("plugin/bizsizicalling.php"); ?>

</body>
</html>