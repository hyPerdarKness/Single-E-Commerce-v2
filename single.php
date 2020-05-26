<?php session_start(); define("include",true); include("config.php"); include("plugin/functions.php"); include("plugin/autoload.php"); $url = htmlclean($_GET['url']);
$sorgu = $db->prepare("select * from blog where sefurl=?"); $sorgu->execute(array($url)); if($sorgu->rowCount()=="0"){ header("Location: ".$bshrf."404.php"); }else{ $gelen = $sorgu->fetch(PDO::FETCH_ASSOC); ?>	

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
	<meta name="description" content="<?php echo $gelen['description']; ?>" />
	<meta name="keywords" content="<?php echo $gelen['keywords']; ?>" />	
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
			<p><?php echo timeConvert($gelen['tarih']); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php $say = $db->query("select count(*) from comments where blogID='".$gelen['id']."' AND onay='1'")->fetchColumn(); echo number_format($say); ?> Yorum</p>

		<?php echo $gelen['content']; ?>	
		
		<br><br><p align="center"><img src="<?php echo $bshrf; ?>images/divider2.jpg" alt="" /></p>
		
		<h2>Yorumlar</h2>
		
<?php foreach($db->query("select * from comments where blogID='".$gelen['id']."' AND onay='1' order by id desc") as $xxx){
	echo $xxx['adsoyad']; ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo timeConvert($xxx['tarih']); ?><br><br>
	<?php echo $xxx['yorum']; ?><br><br><?php } ?>
	
	<h2 id="yorum">Yorum Gönder</h2>
	
<?php if(isset($_POST['gonder'])){

 $adsoyad = htmlclean($_POST['adsoyad']);
 $email = $_POST['email'];
 $yorum = htmlclean($_POST['yorum']);
 $tarih = date('Y-m-d H:i:s');
 $ip = $_SERVER['REMOTE_ADDR'];
 
if($adsoyad==""||$email==""||$yorum==""){ echo '<font color="red"><b>Lütfen tüm alanları doldurun!</b></font><br><br>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<font color="red"><b>Lütfen geçerli bir e-mail adresi girin!</b></font><br><br>'; }else{
	
if(isset($_POST['g-recaptcha-response'])){ $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost()); $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(!$resp->isSuccess()){ echo '<font color="red"><b>Güvenlik kodu hatası! Lütfen tekrar deneyin.</b></font><br><br>'; }else{		

$kayit = $db->prepare("insert into comments set blogID=?,adsoyad=?,email=?,yorum=?,tarih=?,ip=?");
$kayit->execute(array($gelen['id'], $adsoyad, $email, $yorum, $tarih, $ip)); 

echo '<font color="green"><b>Yorumunuz kaydedilmiştir. Yönetici onayından sonra sitede gösterilecektir.</b></font><br><br>';
echo '<meta http-equiv="refresh" content="4">'; } } } } } ?> 			
		<form method="post" action="#yorum">	
		
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
        
            <h4><span>Son Yazılar</span></h4>

            <div class="box">
	
        <ul class="ul-01">
		<?php foreach($db->query("select * from blog order by id desc limit 0,10") as $rrr){ if($print['seolink']==".php"){ ?>	
			<li><a href="single.php?url=<?php echo $rrr['sefurl']; ?>"><?php echo $rrr['title']; ?></a></li>
			<?php }elseif($print['seolink']==".html"){ ?>
			<li><a href="<?php echo $bshrf; ?>blog/<?php echo $rrr['sefurl']; ?>.html"><?php echo $rrr['title']; ?></a></li>			
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
<script src="<?php echo $bshrf; ?>js/jquery-latest.min.js"></script>
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
<?php } ?>