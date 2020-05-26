<?php if(!defined("include")){ echo '<meta http-equiv="refresh" content="0;URL=../index.php">'; exit(); } ?>
<br><br><br><br><style type="text/css"> 
#popupFixed { 
background:url("<?php echo $bshrf; ?>images/bizsizicallbg.jpg") 0 0 repeat-x;
color:#000;
z-index: 999;  
position: fixed;  
*position:absolute;  
overflow:hidden;  
bottom: 0px;  
left: 0px;  
width: 100%;  
height: 90px;  
top:expression(eval(document.compatMode && document.compatMode=="CSS1Compat") ? documentElement.scrollTop+(documentElement.clientHeight-this.clientHeight) : document.body.scrollTop+(document.body.clientHeight-this.clientHeight));}  
</style> 
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />		
	<script src="<?php echo $bshrf; ?>js/jquery-1.9.1.js"></script>
	<script src="<?php echo $bshrf; ?>js/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#dialog" ).dialog();
	});
	
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
<div id="popupFixed" align="center">

<?php 

if(isset($_POST['yolla'])){

if(@$_SESSION['kontrolzamani'] + 500 > time()){  $kalanzaman=$_SESSION['kontrolzamani']-time()+500;

echo '<br><br><b>Bu formu tekrar kullanabilmek için '.$kalanzaman.' saniye beklemelisiniz!</b>'; exit; }else{

$adsoyad = htmlclean($_POST['adsoyad']);
$telefon = $_POST['telefon'];
$tarih = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];
	
if($adsoyad==""||$telefon==""){

echo '<div id="dialog" title="Uyarı!"><p style="color:red; font-weight:bold;">Size ulaşabilmemiz için lütfen Ad Soyad ve Telefon bilgilerinizi giriniz!</p></div>'; }else{	

$kayit = $db->prepare("insert into calling set adsoyad=?,telefon=?,tarih=?,ip=?");
$kayit->execute(array($adsoyad, $telefon, $tarih, $ip)); 

echo '<div id="dialog" title="Onay"><p style="color:green; font-weight:bold;">Bilgileriniz kaydedildi. Müşteri temsilcimiz en kısa süre içinde size ulaşacaktır.</p></div>';

$_SESSION['kontrolzamani'] = time(); echo '<meta http-equiv="refresh" content="3">'; } } } ?>		
<form method="post">
  <table width="694" border="0" align="center" cellpadding="3" cellspacing="3"> 
    <tr> 
       <td width="314" rowspan="2"><img src="<?php echo $bshrf; ?>images/bizsizicalling.png" alt="" align="left" /><br /></td>   
      <td width="263" align="center"><b>Ad Soyad</b>&nbsp;
        <input type="text" name="adsoyad" onkeypress="HarfKontrol(event)" /> 
        
        <p><b>Telefon</b> &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="telefon" onkeypress="SayiKontrol(event)" />
        </td> 
      <td width="80" rowspan="2"><br /><input type="submit" name="yolla" class="buton kirmizi" value="Gönder" /></td> 
    </tr> 
  </table> 
</form>
</div>