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

	<title>İletişim | <?php echo $print['title']; ?></title>		

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

			<h1>İletişim</h1>	
<?php if(isset($_POST['gonder'])){

 $adsoyad = htmlclean($_POST['adsoyad']);
 $email = $_POST['email'];
 $telefon = $_POST['telefon'];
 $mesaj = htmlclean($_POST['mesaj']);
 $tarih = date('Y-m-d H:i:s');
 $ip = $_SERVER['REMOTE_ADDR'];
 
if($adsoyad==""||$email==""||$telefon==""||$mesaj==""){ echo '<font color="red"><b>Lütfen tüm alanları doldurun!</b></font><br><br>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<font color="red"><b>Lütfen geçerli bir e-mail adresi girin!</b></font><br><br>'; }else{
	
if(isset($_POST['g-recaptcha-response'])){ $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost()); $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(!$resp->isSuccess()){ echo '<font color="red"><b>Güvenlik kodu hatası! Lütfen tekrar deneyin.</b></font><br><br>'; }else{	

$kayit = $db->prepare("insert into contact set adsoyad=?,email=?,telefon=?,mesaj=?,tarih=?,ip=?");
$kayit->execute(array($adsoyad, $email, $telefon, $mesaj, $tarih, $ip)); 

echo '<font color="green"><b>Mesajınız gönderildi. Kısa bir süre içinde sizinle iletişime geçeceğiz.</b></font><br><br>';
echo '<meta http-equiv="refresh" content="5">'; } } } } } ?> 			
		<form method="post">	
		
		<label><b>Ad Soyad</b></label><br>
		<input type="text" name="adsoyad" onkeypress="HarfKontrol(event)" style="width:300px;" /><br><br>
		
		<label><b>E-Mail</b></label><br>
		<input type="email" name="email" style="width:300px;" /><br><br>

		<label><b>Telefon</b></label><br>
		<input type="text" name="telefon" onkeypress="SayiKontrol(event)" style="width:300px;" /><br><br>

		<label><b>Mesaj</b></label><br>
		<textarea name="mesaj" cols="45" rows="10" /></textarea><br><br>	
		
		<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div><br><br>
				
		<input type="submit" class="buton kirmizi" name="gonder" value="Gönder" />	
			
		</form>
			
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Yerimiz</span></h4>

            <div class="box">
            
		<?php echo $print['yerimiz']; ?>
            
            </div><br><br>
        
            <h4><span>İletişim Bilgileri</span></h4>

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