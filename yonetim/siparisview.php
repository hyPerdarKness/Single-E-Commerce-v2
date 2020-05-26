<?php session_start(); define("include",true); include("../config.php"); include("../plugin/functions.php"); if(isset($_SESSION['tekurun'])){ $id = intval($_GET['id']); ?>

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
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> 
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> 
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<title>Tek Ürün Satış Scripti v2 Yönetim Paneli</title>
</head>
<body>

<div id="main">

	<div id="tray" class="box">

		<p class="f-left box">

			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			<strong>Tek Ürün Satış Scripti v2 Yönetim Paneli</strong>

		</p>

		<p class="f-right"><strong><a href="admin.php?id=<?php echo $_SESSION['logid']; ?>"><?php echo $_SESSION['tekurun']; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="logout.php" id="logout">Çıkış</a></strong></p>

	</div>

	<hr class="noscreen" />

	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a href="../index.php" target="_blank"><span><strong>Siteyi Görüntüle &raquo;</strong></span></a></li>
		</ul>

		<ul class="box">
			<li><a href="home.php"><span>Anasayfa</span></a></li>				
			<li><a href="sayfalar.php"><span>Sayfalar</span></a></li>		
			<li><a href="yazilar.php"><span>Yazılar</span></a></li>
			<li><a href="siparisler.php"><span>Siparişler</span></a></li>
			<li><a href="obildirim.php"><span>Ödeme Bildirimi</span></a></li>			
			<li><a href="uyorum.php"><span>Ürün Yorumları</span></a></li>
			<li><a href="byorum.php"><span>Blog Yorumları</span></a></li>
			<li><a href="youcall.php"><span>Beni Arayın</span></a></li>					
			<li><a href="iletisim.php"><span>İletişim</span></a></li>			
			<li><a href="admin.php?id=<?php echo $_SESSION['logid']; ?>"><span>Yönetici Bilgileri</span></a></li>
			<li><a href="ayarlar.php"><span>Ayarlar</span></a></li>
		</ul>

	</div>

	<hr class="noscreen" />

	<div id="cols" class="box">

		<div id="aside" class="box">

			<div class="padding box">

				<p id="logo"><a href="home.php"><img src="design/logo.png" title="Tek Ürün Satış Scripti v2 Yönetim Paneli" alt="" /></a></p><br><br>

			</div>
			
			<div class="padding box">
			
				<p id="btn-create" class="box"><a href="sayfaekle.php"><span>Sayfa Ekle</span></a></p>
				<p id="btn-create" class="box"><a href="yaziekle.php"><span>Yazı Ekle</span></a></p>
				<p id="btn-edit" class="box"><a href="bloks.php?id=1"><span>Slayt Düzenle</span></a></p>
				<p id="btn-edit" class="box"><a href="bloks.php?id=2"><span>Blok 1 Düzenle</span></a></p>		
				<p id="btn-edit" class="box"><a href="bloks.php?id=3"><span>Blok 2 Düzenle</span></a></p>		
				<p id="btn-edit" class="box"><a href="bloks.php?id=4"><span>Blok 3 Düzenle</span></a></p>		

			</div>
			
			<div class="padding box" class="info msg">
			<br><br>
			<b>Hatırlatma :</b> Script ile ilgili yaşadığınız sorunlar için öncelikle script sayfasını inceleyin. Daha sonra sitemizdeki <a href="https://www.phpscriptlerim.com/forum" target="_blank">forum</a> bölümünde kullandığınız script için açılmış olan konuları inceleyin. Eğer yine çözüm bulamadıysanız forum üzerinden yeni konu açıp detaylı(ekran görüntüsü, hata kodu vs) açıklama yaparak bize bildirimde bulunabilirsiniz.
			</div>

		</div>

		<hr class="noscreen" />

		<div id="content" class="box">
			<h1>Sipariş Ayrıntıları</h1>
			<br>
<?php if(isset($_POST['gonder'])){

$urun = htmlclean($_POST['urun']);
$yontem = htmlclean($_POST['yontem']);
$adsoyad = htmlclean($_POST['adsoyad']);
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$il = $_POST['il'];
$ilce = $_POST['ilce'];
$adres = htmlclean($_POST['adres']);
$textnot = htmlclean($_POST['textnot']);

if($adsoyad==""||$email==""||$urun==""||$yontem==""||$telefon==""||$il==""||$ilce==""||$adres==""||$textnot==""){ echo '<div class="error msg" style="width:300px;"><b>Alanları boş geçemezsiniz!</b></div><br>'; }else{

$db->query("UPDATE siparisler SET urun='$urun',yontem='$yontem',adsoyad='$adsoyad',email='$email',telefon='$telefon',adres='$adres',il='$il',ilce='$ilce',textnot='$textnot' where id='$id'");

 echo "<div class='done msg' style='width:200px;'><b>Düzenleme Kaydedildi!</b></div><br>"; echo '<meta http-equiv="refresh" content="2">'; } }

foreach($db->query("select * from siparisler where id='$id'") as $gelen){ ?>
		<form method="post">	<div class="col50">
			
		<p class="t-justify">     
		
						<label><b>Ürün</b></label><br>
						<input type="text" size="40" name="urun" value="<?php echo $gelen['urun']; ?>" class="input-text" /><br><br>
						
						<label><b>Ödeme Yöntemi</b></label><br>
						<input type="text" size="40" name="yontem" value="<?php echo $gelen['yontem']; ?>" class="input-text" /><br><br>						
						
						<label><b>Ad Soyad</b></label><br>
						<input type="text" size="40" name="adsoyad" value="<?php echo $gelen['adsoyad']; ?>" class="input-text" /><br><br>
					
						<label><b>E-Mail</b></label><br>
						<input type="text" size="40" name="email" value="<?php echo $gelen['email']; ?>" class="input-text" /><br><br>

						<label><b>Telefon</b></label><br>
						<input type="text" size="40" name="telefon" value="<?php echo $gelen['telefon']; ?>" class="input-text" /><br><br>
						
						<label><b>İl</b></label><br>
						<input type="text" size="40" name="il" value="<?php echo $gelen['il']; ?>" class="input-text" /><br><br>

						<label><b>İlçe</b></label><br>
						<input type="text" size="40" name="ilce" value="<?php echo $gelen['ilce']; ?>" class="input-text" /><br><br>	

						<label><b>Sipariş Zamanı</b></label><br>
						<input type="text" size="40" readonly value="<?php echo date('d.m.Y H:i:s', strtotime($gelen['tarih'])); ?>" class="input-text" /><br><br>						
					
		</p>
				
			</div> 

			<div class="col50 f-right">
			
				<p class="t-justify">

						<label><b>Adres</b></label><br>
						<textarea cols="45" name="adres" rows="10"><?php echo $gelen['adres']; ?></textarea><br><br>		

						<label><b>Sipariş Notları</b></label><br>
						<textarea cols="45" name="textnot" rows="10"><?php echo $gelen['textnot']; ?></textarea><br><br>							

						<label><b>IP Adresi</b></label><br>
						<input type="text" size="40" value="<?php echo $gelen['ip']; ?>" readonly class="input-text" /><br><br>								

				</p>
				
			</div> 
			<div class="fix"></div>		
			<p style="padding-left:380px;"><input type="submit" class="input-submit" name="gonder" style="width:500px;" value="Değişiklikleri Kaydet" /></p>			
			<?php } ?>
			</form>
			<br>
		</div>

	</div>

	<hr class="noscreen" />

	<div id="footer" class="box">

		<p class="f-left">&copy; <?php echo date('Y'); ?>, Tek Ürün Satış Scripti v2</p>

		<p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank">Php Scriptlerim</a></p>

	</div> 

</div>

</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../404.php";</script>'; } ?>