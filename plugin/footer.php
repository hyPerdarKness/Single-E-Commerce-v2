<?php if(!defined("include")){ echo '<meta http-equiv="refresh" content="0;URL=../index.php">'; exit(); } ?>
    <div align="center"><img src="<?php echo $bshrf; ?>images/dip.png" alt="dip" /></div>
  
    <div id="footer">
		<p align="center">
	<?php foreach($db->query("select * from pages where durum='1' order by sira desc") as $nxp){ if($print['seolink']==".php"){ ?>			
            <a href="pages.php?url=<?php echo $nxp['sefurl']; ?>"><?php echo $nxp['title']; ?></a> |
			<?php }elseif($print['seolink']==".html"){ ?>
            <a href="<?php echo $bshrf; ?>sayfa/<?php echo $nxp['sefurl']; ?>.html"><?php echo $nxp['title']; ?></a> | <?php } } ?>	
			</p><br><br>
        <p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank">Php Scriptlerim</a></p>

        <p>&copy; <?php echo date('Y'); ?>, <strong><?php echo $print['title']; ?></strong>. Tüm hakları saklıdır.</p>
    </div>