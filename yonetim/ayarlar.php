<?php session_start(); define("include",true); include("../config.php"); include("../plugin/functions.php"); if(isset($_SESSION['tekurun'])){ ?>

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
	<title>Tek Ürün Satış Scripti v1 Yönetim Paneli</title>
</head>
<body>

<div id="main">

	<div id="tray" class="box">

		<p class="f-left box">

			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			<strong>Tek Ürün Satış Scripti v1 Yönetim Paneli</strong>

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

				<p id="logo"><a href="home.php"><img src="design/logo.png" title="Tek Ürün Satış Scripti v1 Yönetim Paneli" alt="" /></a></p><br><br>

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
			<h1>Ayarlar</h1>
			<br>
<?php if(isset($_POST['gonder'])){

$title = htmlclean($_POST['title']);
$logo = $_POST['logo'];
$color = $_POST['color'];
$seolink = $_POST['seolink'];
$keywords = htmlclean($_POST['keywords']);
$description = htmlclean($_POST['description']);
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$yerimiz = $_POST['yerimiz'];
$contact = $_POST['contact'];
$telefon = $_POST['telefon'];
$yazi_limit = $_POST['yazi_limit'];
$analytics = $_POST['analytics'];

if($title==""||$keywords==""||$description==""||$facebook==""||$twitter==""||$contact==""||$yerimiz==""||$telefon==""){
	
echo '<div class="error msg" style="width:300px;"><b>Alanları boş geçemezsiniz!</b></div>'; }else{

$db->query("UPDATE settings SET title='$title',logo='$logo',seolink='$seolink',keywords='$keywords',description='$description',facebook='$facebook',twitter='$twitter',telefon='$telefon',color='$color',yerimiz='$yerimiz',contact='$contact',yazi_limit='$yazi_limit',analytics='$analytics'");

 echo "<br><div class='done msg' style=\"width:300px;\"><b>Düzenleme Kaydedildi!</b></div>"; echo '<meta http-equiv="refresh" content="2">'; } } ?>
						<form method="post">			
			<div class="col50">
			
		<p class="t-justify">     
		
						<label><b>Site Adı</b></label><br>
						<input type="text" size="40" name="title" value="<?php echo $print['title']; ?>" class="input-text" /><br><br>
					
						<label><b>Logo</b></label><br>
						<input type="text" size="40" id="resim" class="input-text" value="<?php echo $print['logo']; ?>" name="logo" readonly /> <button style="font-weight:bold; width:100px; height:30px;" id="rbutton">Logo Seç</button><br><br>

						<label><b>Renk</b></label><br>
						<select name="color">
						<option><?php echo $print['color']; ?></option>
						<option value="blue">Mavi</option>
						<option value="bluegreen">Mavi & Yeşil</option>
						<option value="darkorange">Koyu Turuncu</option>
						<option value="green">Yeşil</option>
						<option value="greenblue">Yeşil & Mavi</option>
						<option value="lightblue">Açık Mavi</option>
						<option value="orange">Turuncu</option>
						<option value="purple">Mor</option>
						<option value="yellow">Sarı</option>
						</select><br><br>

						<label><b>Seo URL</b></label><br>
						<?php if($print['seolink']==".php"){ ?>
						<input type="radio" name="seolink" value=".php" checked> .php<br>
						<input type="radio" name="seolink" value=".html"> .html<br><br>
						<?php }elseif($print['seolink']==".html"){ ?>
						<input type="radio" name="seolink" value=".php"> .php<br>
						<input type="radio" name="seolink" value=".html" checked> .html<br><br>						
						<?php } ?>
						
						<label><b>Anahtar kelimeler</b>(keywords)</label><br>
						<textarea cols="75" rows="2" name="keywords" class="input-text"><?php echo $print['keywords']; ?></textarea><br><br>

						<label><b>Siteni tanımlama</b> (cümle,kelime v.b. - description)</label><br>
						<textarea cols="75" rows="2" name="description" class="input-text"><?php echo $print['description']; ?></textarea><br><br>		
		
						<label><b>İzleme/Sayaç Kodları</b> (analytics, metrica)</label><br>
						<textarea cols="75" rows="2" name="analytics" class="input-text"><?php echo $print['analytics']; ?></textarea><br><br>							

						<label><b>Bir Sayfada Kaç Adet Yazı Gösterilsin?</b></label><br>
						<input type="number" style="width:150px;" min="1" max="10" name="yazi_limit" value="<?php echo $print['yazi_limit']; ?>" class="input-text" /><br><br>		
		
		</p>
				
			</div> 

			<div class="col50 f-right">
			
				<p class="t-justify">
				
						<label><b>Telefon</b></label><br>
						<input type="text" size="40" name="telefon" value="<?php echo $print['telefon']; ?>" class="input-text" /><br><br>

						<label><b>Facebook</b></label><br>
						<input type="text" size="40" name="facebook" value="<?php echo $print['facebook']; ?>" class="input-text" /><br><br>

						<label><b>Twitter</b></label><br>
						<input type="text" size="40" name="twitter" value="<?php echo $print['twitter']; ?>" class="input-text" /><br><br>
						
						<label><b>Yerimiz</b>(İframe olarak ekleyiniz. İframe boyutları 270 x 250 olmalıdır.)</label><br>
						<textarea cols="75" rows="7" name="yerimiz" class="input-text"><?php echo $print['yerimiz']; ?></textarea><br><br>	

						<label><b>İletişim Sayfası İçeriği</b></label><br>
						<textarea cols="75" rows="7" name="contact" class="input-text"><?php echo $print['contact']; ?></textarea><br><br>								

				</p>
				
			</div> 
			<div class="fix"></div>						

			<p style="padding-left:300px;"><input type="submit" class="input-submit" name="gonder" style="width:500px;" value="Değişiklikleri Kaydet" /></p>
			
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

<script type="text/javascript" src="js/jquery.popupWindow.js"></script>
<script>
                    $(document).ready(function(){
                        $('#rbutton').popupWindow({ 
                            windowURL:'elfinder/elfinpop.php', 
                            windowName:'Filebrowser',
                            height:550, 
                            width:900,
                            centerScreen:1
                        }); 
                    });
					
                    function processFile1(file){
                        $('#resim').val(file);
                    }
</script>

</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../404.php";</script>'; } ?>