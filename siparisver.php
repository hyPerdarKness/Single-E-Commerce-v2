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

	<title>Sipariş Ver | <?php echo $print['title']; ?></title>		

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

			<h1>Sipariş Ver</h1>
<?php if(isset($_POST['gonder'])){

 $adsoyad = htmlclean($_POST['adsoyad']);
 $email = $_POST['email'];
 $telefon = $_POST['telefon'];
 $urun = $_POST['urun'];
 $yontem = htmlclean($_POST['yontem']);
 $adres = htmlclean($_POST['adres']);
 $il = $_POST['il'];
 $ilce = $_POST['ilce'];
 $textnot = htmlclean($_POST['textnot']);
 $tarih = date('Y-m-d H:i:s');
 $ip = $_SERVER['REMOTE_ADDR'];
 
if($adsoyad==""||$email==""||$telefon==""||$urun==""||$yontem==""||$adres==""||$il==""||$ilce==""||$textnot==""){ echo '<font color="red"><b>Lütfen tüm alanları doldurun!</b></font><br><br>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<font color="red"><b>Lütfen geçerli bir e-mail adresi girin!</b></font><br><br>'; }else{
	
$say = $db->query("select count(*) from siparisler where email='$email'")->fetchColumn(); if($say!="0"){

echo '<font color="red"><b>Bu e-mail adresiyle daha önce bir sipariş kaydedilmiştir. Siparişiniz ile ilgili müşteri temsilcimiz size ulaşarak bilgi verecektir.</b></font><br><br>'; }else{
	
if(isset($_POST['g-recaptcha-response'])){ $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost()); $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(!$resp->isSuccess()){ echo '<font color="red"><b>Güvenlik kodu hatası! Lütfen tekrar deneyin.</b></font><br><br>'; }else{

$kayit = $db->prepare("insert into siparisler set urun=?,yontem=?,adsoyad=?,email=?,telefon=?,adres=?,il=?,ilce=?,textnot=?,tarih=?,ip=?");
$kayit->execute(array($urun, $yontem, $adsoyad, $email, $telefon, $adres, $il, $ilce, $textnot, $tarih, $ip)); 

echo '<font color="green"><b>Siparişiniz kaydedilmiştir. Kısa bir süre içinde müşteri temsilcimiz telefon numaranızdan siparişinizi teyit etmek(doğrulamak) amacıyla sizi arayacaktır.<br><br>Bizi tercih ettiğiniz için teşekkür ederiz.</b></font><br><br>';	

echo '<meta http-equiv="refresh" content="6">'; } } } } } } ?> 
		<form method="post">
		
		<label><b>Ürün</b></label><br>
		<select name="urun" style="width:300px;">
		<option></option>
	<?php foreach($db->query("select * from bloks limit 1,4") as $ptx){ ?>		
		<option><?php echo $ptx['title']; ?></option>
	<?php } ?>
		</select><br><br>			
		
		<label><b>Ödeme Yöntemi</b></label><br>
		<select name="yontem" style="width:300px;">
		<option></option>
		<option>Kapıda Ödeme</option>
		<option>Havale/EFT</option>		
		</select><br><br>		
		
		<label><b>Ad Soyad</b></label><br>
		<input type="text" name="adsoyad" onkeypress="HarfKontrol(event)" style="width:300px;" /><br><br>
		
		<label><b>E-Mail</b></label><br>
		<input type="email" name="email" style="width:300px;" /><br><br>

		<label><b>Telefon</b></label><br>
		<input type="text" name="telefon" onkeypress="SayiKontrol(event)" style="width:300px;" /><br><br>

		<label><b>Adres</b> (siparişin sorunsuz iletilmesi için açık adresinizi yazın)</label><br>
		<textarea name="adres" cols="45" rows="5" /></textarea><br><br>

		<label><b>İl</b></label><br>
		<select name="il" style="width:300px;">
		<option></option>
			<option value="Adana">Adana</option>
			<option value="Adıyaman">Adıyaman</option>
			<option value="Afyon">Afyon</option>
			<option value="Ağrı">Ağrı</option>
			<option value="Amasya">Amasya</option>
			<option value="Ankara">Ankara</option>
			<option value="Antalya">Antalya</option>
			<option value="Artvin">Artvin</option>
			<option value="Aydın">Aydın</option>
			<option value="Balıkesir">Balıkesir</option>
			<option value="Bilecik">Bilecik</option>
			<option value="Bingöl">Bingöl</option>
			<option value="Bitlis">Bitlis</option>
			<option value="Bolu">Bolu</option>
			<option value="Burdur">Burdur</option>
			<option value="Bursa">Bursa</option>
			<option value="Çanakkale">Çanakkale</option>
			<option value="Çankırı">Çankırı</option>
			<option value="Çorum">Çorum</option>
			<option value="Denizli">Denizli</option>
			<option value="Diyarbakır">Diyarbakır</option>
			<option value="Edirne">Edirne</option>
			<option value="Elazığ">Elazığ</option>
			<option value="Erzincan">Erzincan</option>
			<option value="Erzurum">Erzurum</option>
			<option value="Eskişehir">Eskişehir</option>
			<option value="Gaziantep">Gaziantep</option>
			<option value="Giresun">Giresun</option>
			<option value="Gümüşhane">Gümüşhane</option>
			<option value="Hakkari">Hakkari</option>
			<option value="Hatay">Hatay</option>
			<option value="Isparta">Isparta</option>
			<option value="Mersin (İçel)">Mersin (İçel)</option>
			<option value="İstanbul">İstanbul</option>
			<option value="İzmir">İzmir</option>
			<option value="Kars">Kars</option>
			<option value="Kastamonu">Kastamonu</option>
			<option value="Kayseri">Kayseri</option>
			<option value="Kırklareli">Kırklareli</option>
			<option value="Kırşehir">Kırşehir</option>
			<option value="Kocaeli (İzmit)">Kocaeli (İzmit)</option>
			<option value="Konya">Konya</option>
			<option value="Kütahya">Kütahya</option>
			<option value="Malatya">Malatya</option>
			<option value="Manisa">Manisa</option>
			<option value="Kahramanmaraş">Kahramanmaraş</option>
			<option value="Mardin">Mardin</option>
			<option value="Muğla">Muğla</option>
			<option value="Muş">Muş</option>
			<option value="Nevşehir">Nevşehir</option>
			<option value="Niğde">Niğde</option>
			<option value="Ordu">Ordu</option>
			<option value="Rize">Rize</option>
			<option value="Sakarya">Sakarya</option>
			<option value="Samsun">Samsun</option>
			<option value="Siirt">Siirt</option>
			<option value="Sinop">Sinop</option>
			<option value="Sivas">Sivas</option>
			<option value="Tekirdağ">Tekirdağ</option>
			<option value="Tokat">Tokat</option>
			<option value="Trabzon">Trabzon</option>
			<option value="Tunceli">Tunceli</option>
			<option value="Şanlıurfa">Şanlıurfa</option>
			<option value="Uşak">Uşak</option>
			<option value="Van">Van</option>
			<option value="Yozgat">Yozgat</option>
			<option value="Zonguldak">Zonguldak</option>
			<option value="Aksaray">Aksaray</option>
			<option value="Bayburt">Bayburt</option>
			<option value="Karaman">Karaman</option>
			<option value="Kırıkkale">Kırıkkale</option>
			<option value="Batman">Batman</option>
			<option value="Şırnak">Şırnak</option>
			<option value="Bartın">Bartın</option>
			<option value="Ardahan">Ardahan</option>
			<option value="Iğdır">Iğdır</option>
			<option value="Yalova">Yalova</option>
			<option value="Karabük">Karabük</option>
			<option value="Kilis">Kilis</option>
			<option value="Osmaniye">Osmaniye</option>
			<option value="Düzce">Düzce</option>
			</select><br><br>	

		<label><b>İlçe</b></label><br>
		<input type="text" name="ilce" onkeypress="HarfKontrol(event)" style="width:300px;" /><br><br>

		<label><b>Sipariş Notları</b></label><br>
		<textarea name="textnot" cols="45" rows="5" /></textarea><br><br>	
		
		<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div><br><br>	
		
		<input type="submit" class="buton kirmizi" name="gonder" value="Sipariş Ver" />	
			
		</form>
			
        </div>

        <hr class="noscreen" />

        <div id="col-right">
        
            <h4><span>Kullanıcı Yorumları</span></h4>

            <div class="box">
	
        <ul class="ul-01">
		<?php foreach($db->query("select * from yorumlar where onay='1' order by id desc limit 0,5") as $rrr){ ?>
			<li><a href="yorumlar<?php echo $print['seolink']; ?>">
		<?php kisalt($rrr['yorum'], 100) ?>			
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