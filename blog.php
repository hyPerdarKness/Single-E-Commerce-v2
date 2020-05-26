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

	<title>Blog | <?php echo $print['title']; ?></title>		

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
    
        <div id="col-left" style="margin-top:-20px; !important">

			<h1>Blog</h1>
<?php $limit = $print['yazi_limit']; $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; }
$k = $db->prepare("select * from blog"); $k->execute(); $count = $k->rowCount();
$toplamsayfa	 = ceil($count / $limit);
$baslangic		 = ($page-1)*$limit;
if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'">'; exit(); }else{ } 
$ver = $db->query("select * from blog order by id desc limit $baslangic,$limit");
foreach($ver as $yazdir){ if($print['seolink']==".php"){ ?>
		<h2><a href="single.php?url=<?php echo $yazdir['sefurl']; ?>"><?php echo $yazdir['title']; ?></a></h2>
		<?php }elseif($print['seolink']==".html"){ ?>
		<h2><a href="blog/<?php echo $yazdir['sefurl']; ?>.html"><?php echo $yazdir['title']; ?></a></h2><?php } ?>		
		<p><?php echo timeConvert($yazdir['tarih']); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php $say = $db->query("select count(*) from comments where blogID='".$yazdir['id']."' AND onay='1'")->fetchColumn(); echo number_format($say); ?> Yorum</p>
		<?php if($print['seolink']==".php"){ ?>
		<a href="single.php?url=<?php echo $yazdir['sefurl']; ?>"><img src="<?php echo $yazdir['resimyolu']; ?>" width="150" height="100" alt="<?php echo $yazdir['title']; ?>" align="left" style="padding-right:10px;" /></a>
		<?php }elseif($print['seolink']==".html"){ ?>
		<a href="blog/<?php echo $yazdir['sefurl']; ?>.html"><img src="<?php echo $yazdir['resimyolu']; ?>" width="150" height="100" alt="<?php echo $yazdir['title']; ?>" align="left" style="padding-right:10px;" /></a><?php } ?>		
		<?php echo htmlclean(kisalt($yazdir['content'], 400)); ?>
			
	<br><br><br><img src="images/divider2.jpg" alt="divider" />
		
<?php } echo '</ul><p align="center">';

if($count > $limit) : 
  $x = 2; 
  $lastP = ceil($count/$limit); 

  if($page > 1){

  $onceki = $page-1;
  echo "<a href=\"?page=$onceki\">Geri</a>&nbsp;"; 
  }
 
  if($page==1) echo "1&nbsp;"; 
  else echo "<a href=\"?page=1\">1</a>&nbsp;";   

  
  if($page-$x > 2) { 
    echo "..."; 
    $i = $page-$x; 
  } else { 
    $i = 2; 
  } 

  for($i; $i<=$page+$x; $i++) { 
    if($i==$page) echo "$i&nbsp;"; 
    else echo "<a href=\"?page=$i\">$i</a>&nbsp;"; 
    if($i==$lastP) break; 
  } 

  if($page+$x < $lastP-1) { 
    echo "..."; 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } elseif($page+$x == $lastP-1) { 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } 
  
  if($page < $lastP){
  $sonraki = $page+1;
  echo "<a href=\"?page=$sonraki\">İleri</a>"; 
  }
endif; 
echo '</p>'; ?>		
			
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