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

			<h1>Blog Yorumları</h1>
			<br><br>
<?php if(isset($_GET['sil'])){ $sil = intval($_GET['sil']); $db->query("delete from comments where id='$sil'"); 
echo "<div class='warning msg' style='width:200px;'><b>Yorum silindi.</b></div><br>"; echo '<meta http-equiv="refresh" content="2;URL=byorum.php">'; } ?>				
			<table>
				<tr>
				    <th>Ad Soyad</th>
				    <th>E-Mail</th>					
					<th style="text-align:center;">Zaman</th>
				    <th style="text-align:center;">İşlemler</th>
				</tr>
<?php $limit = 20; $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; }
$k = $db->prepare("select * from comments"); $k->execute(); $count = $k->rowCount();
$toplamsayfa	 = ceil($count / $limit);
$baslangic		 = ($page-1)*$limit;
if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'">'; exit(); }else{ } 
$ver = $db->query("select * from comments order by id desc limit $baslangic,$limit");
foreach($ver as $gelen){ $id = $gelen['id']; $on = $gelen['onay']; if($on=="1"){ ?>					
			<?php if($id%2!=0){ echo '<tr>'; }else{ echo '<tr class="bg">'; } ?>	
				    <td style="width:500px;"><b><?php echo $gelen['adsoyad']; ?></b></td>
				    <td style="width:500px;"><b><?php echo $gelen['email']; ?></b></td>						
				    <td align="center" style="width:120px;"><b><?php echo timeConvert($gelen['tarih']); ?></b></td>					
				    <td style="width:100px;" align="center"><a href="byorumedit.php?id=<?php echo $gelen['id']; ?>"><img src="design/edit.png" alt="" title="Düzenle" /></a> &nbsp;&nbsp; <a href="byorum.php?sil=<?php echo $gelen['id']; ?>"><img src="design/cross.png" alt="" title="Sil" /></a></td>
				</tr>
			<?php }elseif($on=="0"){ ?>
			<?php if($id%2!=0){ echo '<tr>'; }else{ echo '<tr class="bg">'; } ?>	
				    <td style="width:500px;"><?php echo $gelen['adsoyad']; ?></td>
				    <td style="width:500px;"><?php echo $gelen['email']; ?></td>						
				    <td align="center" style="width:120px;"><?php echo timeConvert($gelen['tarih']); ?></td>					
				    <td style="width:100px;" align="center"><a href="byorumedit.php?id=<?php echo $gelen['id']; ?>"><img src="design/edit.png" alt="" title="Düzenle" /></a> &nbsp;&nbsp; <a href="byorum.php?sil=<?php echo $gelen['id']; ?>"><img src="design/cross.png" alt="" title="Sil" /></a></td>
				</tr>			
<?php } } echo '</table><br>';
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
    echo "...&nbsp;"; 
    $i = $page-$x; 
  } else { 
    $i = 2; 
  } 

  for($i; $i<=$page+$x; $i++) { 
    if($i==$page) echo "$i&nbsp;"; 
    else echo "<a href=\"?page=$i\">$i&nbsp;</a>&nbsp;"; 
    if($i==$lastP) break; 
  } 

  if($page+$x < $lastP-1) { 
    echo "...&nbsp;"; 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } elseif($page+$x == $lastP-1) { 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } 
  
  if($page < $lastP){
  $sonraki = $page+1;
  echo "<a href=\"?page=$sonraki\">İleri</a>"; 
  }
endif;  ?>
			<br>
			<p class="info msg">Onaylanmış yorumlar <b>kalın</b> olarak belirtilmiştir.</p>
			
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