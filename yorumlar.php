<?php session_start(); define("include",true); include("config.php"); include("plugin/functions.php"); include("plugin/autoload.php"); ?>

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

	<title>Yorumlar | <?php echo $print['title']; ?></title>		

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

			<h1>Yorumlar</h1>
			
	<h3>Toplam Yorum Sayısı : <?php $say = $db->query("select count(*) from yorumlar where onay='1'")->fetchColumn(); echo number_format($say); ?></h3>		

<?php $limit = $print['yazi_limit']; $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; }
$k = $db->prepare("select * from yorumlar where onay='1'"); $k->execute(); $count = $k->rowCount();
$toplamsayfa	 = ceil($count / $limit);
$baslangic		 = ($page-1)*$limit;
if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'">'; exit(); }else{ } 
$ver = $db->query("select * from yorumlar where onay='1' order by id desc limit $baslangic,$limit");
foreach($ver as $yazdir){ ?>
		<?php echo $yazdir['adsoyad']; ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo timeConvert($yazdir['tarih']); ?><br>
		<?php echo $yazdir['yorum']; ?>
		
	<br><br><div align="center"><img src="images/divider2.jpg" alt="" /></div>
	
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

<h2>Yorum Gönder</h2>			
			
<?php if(isset($_POST['gonder'])){

 $adsoyad = htmlclean($_POST['adsoyad']);
 $email = $_POST['email'];
 $yorum = htmlclean($_POST['yorum']);
 $tarih = date('Y-m-d H:i:s');
 $ip = $_SERVER['REMOTE_ADDR'];
 
if($adsoyad==""||$email==""||$yorum==""){ echo '<font color="red"><b>Lütfen tüm alanları doldurun!</b></font><br><br>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<font color="red"><b>Lütfen geçerli bir e-mail adresi girin!</b></font><br><br>'; }else{
	
if(isset($_POST['g-recaptcha-response'])){ $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost()); $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(!$resp->isSuccess()){ echo '<font color="red"><b>Güvenlik kodu hatası! Lütfen tekrar deneyin.</b></font>'; }else{	

$kayit = $db->prepare("insert into yorumlar set adsoyad=?,email=?,yorum=?,tarih=?,ip=?");
$kayit->execute(array($adsoyad, $email, $yorum, $tarih, $ip)); 

echo '<font color="green"><b>Yorumunuz kaydedilmiştir. Yönetici onayından sonra sitede gösterilecektir.</b></font><br><br>';	
		
echo '<meta http-equiv="refresh" content="3">'; } } } } } ?> 			
		<form method="post">	
		
		<label><b>Ad Soyad</b></label><br>
		<input type="text" name="adsoyad" onkeypress="HarfKontrol(event)" style="width:300px;" /><br><br>
		
		<label><b>E-Mail</b></label><br>
		<input type="email" name="email" style="width:300px;" /><br><br>

		<label><b>Yorum</b></label><br>
		<textarea name="yorum" cols="45" rows="10" /></textarea><br><br>	
		
		<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div><br><br>	
				
		<input type="submit" class="buton kirmizi" name="gonder" value="Gönder" />	
			
		</form>
			
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Blog</span></h4>

            <div class="box">
	
        <ul class="ul-01">
		<?php foreach($db->query("select * from blog order by id desc limit 0,10") as $rrr){ if($print['seolink']==".php"){ ?>	
			<li><a href="single.php?url=<?php echo $rrr['sefurl']; ?>"><?php echo $rrr['title']; ?></a></li>
			<?php }elseif($print['seolink']==".html"){ ?>
			<li><a href="blog/<?php echo $rrr['sefurl']; ?>.html"><?php echo $rrr['title']; ?></a></li>			
		<?php } } ?>
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
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>
<script src="js/jquery-latest.min.js"></script>
<?php include("plugin/bizsizicalling.php"); ?>
<script language="javascript">	
function SayiKontrol(e) {
	olay = document.all ? window.event : e;
	tus = document.all ? olay.keyCode : olay.which;
	if(tus<48||tus>57) {
		if(document.all) { olay.returnValue = false; } else { olay.preventDefault(); }
	}
}

function HarfKontrol(e) {
	olay = document.all ? window.event : e;
	tus = document.all ? olay.keyCode : olay.which;
	if(tus>=48&&tus<=57) {
		if(document.all) { olay.returnValue = false; } else { olay.preventDefault(); }
	}
}
</script> 

</body>
</html>