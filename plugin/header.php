<?php if(!defined("include")){ echo '<meta http-equiv="refresh" content="0;URL=../index.php">'; exit(); } 
$directoryURI = $_SERVER['REQUEST_URI']; $path = parse_url($directoryURI, PHP_URL_PATH); $components = explode('/', $path); $part = $components[1]; ?>
    <div id="header">

        <h1 id="logo"><a href="<?php echo $bshrf; ?>index<?php echo $print['seolink']; ?>"><img src="<?php if($print['logo']==""){ echo 'http://'.$_SERVER['HTTP_HOST'].'/images/logo.png'; }else{ echo $print['logo']; } ?>" alt="<?php echo $print['title']; ?>" /></a></h1>
        <hr class="noscreen" />

        <div id="nav" style="font-size:20pt;">
		<img src="<?php echo $bshrf; ?>images/Telephone-icon.png" alt="Telefon" align="left" /> &nbsp; <?php echo $print['telefon']; ?><br><br>
        </div>

    </div>
    
    <div id="tray">

        <ul>
            <li<?php if($part=="index.php"||$part=="index.html"){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>index<?php echo $print['seolink']; ?>">Anasayfa</a></li>
	<?php foreach($db->query("select * from pages where durum='0' order by sira desc") as $nop){ if($print['seolink']==".php"){ ?>			
            <li<?php if(@$url==$nop['sefurl']){ echo ' id="tray-active"'; } ?>><a href="pages.php?url=<?php echo $nop['sefurl']; ?>"><?php echo $nop['title']; ?></a></li>
			<?php }elseif($print['seolink']==".html"){ ?>
            <li<?php if(@$url==$nop['sefurl']){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>sayfa/<?php echo $nop['sefurl']; ?>.html"><?php echo $nop['title']; ?></a></li><?php } } ?>			
            <li<?php if($part=="siparisver.php"||$part=="siparisver.html"){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>siparisver<?php echo $print['seolink']; ?>">Sipariş Ver</a></li>
            <li<?php if($part=="odemebildirimi.php"||$part=="odemebildirimi.html"){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>odemebildirimi<?php echo $print['seolink']; ?>">Ödeme Bildirimi</a></li>
            <li<?php if($part=="blog.php"||$part=="blog.html"||$part=="single.php"||$part=="blog"){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>blog<?php echo $print['seolink']; ?>">Blog</a></li>			
            <li<?php if($part=="iletisim.php"||$part=="iletisim.html"){ echo ' id="tray-active"'; } ?>><a href="<?php echo $bshrf; ?>iletisim<?php echo $print['seolink']; ?>">İletişim</a></li>
        </ul>
        
        <div id="search" class="box">
		<a href="<?php echo $print['facebook']; ?>" target="_blank"><img src="<?php echo $bshrf; ?>images/1364326420_facebook_02.png" alt="Facebook" title="Facebook" /></a>
		<a href="<?php echo $print['twitter']; ?>" target="_blank"><img src="<?php echo $bshrf; ?>images/1364326424_twitter_02.png" alt="Twitter" title="Twitter" /></a>
        </div> 

    <hr class="noscreen" />
    </div>