<?php

require_once("telegramma/include/data.php");
require_once("telegramma/include/image.php");


if ($_POST and isset($_GET['comment']))
{
   $img = Data::getNewImageID();
   if (!Image::processImage($img))
      $img = 0;
   if ($n = trim($_POST['name']) and $c = trim($_POST['comment']))
   {
      Data::writeComment($n, $img, $c);
      header("Location: telegramma.php");
   }
   else
      header("Location: send_telegramma.php");
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><!-- InstanceBegin template="/Templates/inside.dwt" codeOutsideHTMLIsLocked="false" --><HEAD>
<!-- InstanceBeginEditable name="doctitle" -->
<TITLE>Поздравительная телеграмма</TITLE>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style_screen.css"  rel="stylesheet"  type="text/css">
<STYLE type=text/css>BODY {
	SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #8a2d15; SCROLLBAR-SHADOW-COLOR: #8a2d15; SCROLLBAR-3DLIGHT-COLOR: #000000; SCROLLBAR-ARROW-COLOR: #8a2d15; SCROLLBAR-TRACK-COLOR: #c3401d; SCROLLBAR-DARKSHADOW-COLOR: #000000; SCROLLBAR-BASE-COLOR: #000000;
}
</STYLE>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language="JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</HEAD>
<BODY leftMargin=100 topMargin=20 
onload="setVariables();checkLocation();MM_preloadImages('Images/research_menu-over.gif','Images/research.jpg','Images/collaborators_menu-over.gif','Images/collaborators.jpg','Images/otprav_telegr-over.gif','Images/flag_inside-over.gif','Images/menu-menu_telegramma.gif','Images/menu-menu_bumagi.gif','Images/menu-menu_pamyatnik.gif','Images/menu-menu_delo.gif','Images/menu-menu_skeroznichek.gif','Images/menu-menu_naidi.gif','Images/menu-menu_collectiv.gif')" 
marginheight="0" marginwidth="0" >
<div id="Layer2" style="position:absolute; width:737px; height:1400px; z-index:6; left: 158px; top: -5px"> 
  <table width="743" height="100%" border="0" align="left" cellpadding="0" cellspacing="0" background="Images/bg_table.jpg" >
    <tr> 
      <td height="68" align="left" valign="top" colspan="2"><img src="Images/spacer.gif" width="21" height="150"></td>
    </tr>
    <tr> 
      <td width="24"  align="left" valign="top"><img src="Images/spacer.gif" width="24" height="1"></td>
      <td width="692"  align="left" valign="top"> 
      <!-- InstanceBeginEditable name="content" --> 
      <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <a href="send_telegramma.php" class="send" <?php // onClick="MM_openBrWindow('send_telegramma.php','Sendtelegramma','width=550px,height=400px'); return false;" ?>>ОТПРАВЬ ТЕЛЕГРАММУ!!!</a>
       <p>&nbsp;</p>
      <h1>Дорогой Вася тебя поздравляют:</h1>



      <?php

$comments_str = file_get_contents("telegramma/data/comments");
$comments = Data::getComments($comments_str);

//$comments = array_reverse($comments);

foreach($comments AS $comment)
{
   if ($c = trim($comment))
   {
      $c_arr = Data::getComment($c);
      // c_arr: img, time, name, commment


      echo "<p class='from'> " . $c_arr[2] . " </p>\n";
      echo "<div id='image'>";
      if ($img = trim($c_arr[0]) and Image::exists($img))
         Image::display($img);
      echo "</div>\n";
      echo "<div id='wishes'> " . $c_arr[3] . "</div>\n";
      echo "<div id='date'> Date: " . $c_arr[1] . " </div>\n";
      echo "<div class='dash'></div>\n";
   }
}


?>


 
	  <!-- InstanceEndEditable -->      </td>
    <td width="27"  align="left" valign="top">&nbsp;</td>
	</tr>
  </table>
<img src="Images/spacer.gif" width="24" height="1"></div>
<SCRIPT language=JavaScript>

function setVariables() {
if (document.layers) {
v=".top=";
dS="document.";
sD="";
y="window.pageYOffset";
}
else if (document.all){
v=".pixelTop=";
dS="";
sD=".style";
y="document.body.scrollTop";
}
else if (document.getElementById){
y="window.pageYOffset";
}
}
function checkLocation() {
object="object1";
yy=eval(y);
if (document.getElementById)
document.getElementById("object1").style.top=yy
else
eval(dS+object+sD+v+yy)
setTimeout("checkLocation()",10);
}
</SCRIPT>
<div id="header" style="Z-INDEX: 8; LEFT: 26px; POSITION: absolute; TOP: -1px; width: 882px; height: 245px">
<img src="Images/flag_inside.gif" name="Image2" width="874" height="245" border="0" usemap="#Image2Map" id="Image2" onMouseOver="MM_swapImage('Image2','','Images/flag_inside-over.gif',1)" onMouseOut="MM_swapImgRestore()"></div>

<DIV id=object1 style="Z-INDEX: 3; LEFT: 29px; POSITION: absolute; TOP: 2px; width: 882px; height: 447px"> 
  <TABLE cellSpacing=0 cellPadding=0 width="900" border=0 height="716">
    <TR> 
      <TD height="231" colspan="2" align="left" valign="top"></TD>
      <TD width="75" height="231" align="left" valign="top"><img src="Images/spacer.gif" width="30" height="205"></TD>
    </TR>
    <TBODY> 
    <TR> 
      <TD height="2" colspan="2" align="left" valign="top"><img src="Images/spacer.gif" width="1" height="1"></TD>
      <TD rowspan="2" height="197" align="left" valign="top" width="75"> <img src="Images/spacer.gif" width="1" height="80">
        <!-- InstanceBeginEditable name="right_float" --><a href="send_telegramma.php"><img src="Images/otprav_telegr.gif" name="Image1" width="69" height="257" border="0" id="Image1" onMouseOver="MM_swapImage('Image1','','Images/otprav_telegr-over.gif',1)" onMouseOut="MM_swapImgRestore()"></a><!-- InstanceEndEditable -->     </TD>
    </TR>
    <TR> 
      <TD height="152" width="141" align="right" valign="top"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right" valign="top"></td>
          </tr>
          <tr>
            <td align="right" valign="top"></a></a></a><img src="Images/menu.gif" name="contact" width="132" height="468" border="0" usemap="#contactMap"></a></td>
          </tr>
        </table>      </TD>
      <TD align="left" width="750" valign="top" height="152"><img src="Images/spacer.gif" width="738" height="8"></TD>
    </TR>
    </TBODY> 
  </TABLE>
</DIV>

<SCRIPT language=JavaScript type=text/JavaScript>
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</SCRIPT>

<map name="Image2Map">
  <area shape="rect" coords="714,3,873,133" href="index.html">
</map>
<map name="contactMap">
<area shape="poly" coords="24,133" href="#"><area shape="poly" coords="2,102,21,135" href="#">
<area shape="poly" coords="5,101,23,133" href="#">
<area shape="poly" coords="123,29,3,100,22,136,130,73,129,26" href="telegramma.php" onMouseOver="MM_swapImage('contact','','Images/menu-menu_telegramma.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="20,88,1,30,85,2,99,33,55,18,33,81,22,89" href="bumagi.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_bumagi.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="130,74,132,160,112,209,5,169,15,130,24,137,94,97" href="pamyatnik.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_pamyatnik.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="34,80,56,18,112,35,33,80" href="pamyatnik.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_pamyatnik.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="123,199" href="#"><area shape="poly" coords="129,172,130,302,83,257,64,279,61,257,7,267,23,180,110,210,119,197" href="levin_delo.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_delo.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="60,258,79,357,16,369,5,292,3,265,57,259" href="http://levin60.blogspot.com" target="_blank" onMouseOver="MM_swapImage('contact','','Images/menu-menu_skeroznichek.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="124,299" href="#"><area shape="poly" coords="122,296" href="#"><area shape="poly" coords="129,300,129,385,110,404,68,362,80,359,65,280,84,259" href="find_levin.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_naidi.gif',1)" onMouseOut="MM_swapImgRestore()">
<area shape="poly" coords="24,370,3,404,87,463,129,411,127,387,110,402,68,361" href="collectiv.html" onMouseOver="MM_swapImage('contact','','Images/menu-menu_collectiv.gif',1)" onMouseOut="MM_swapImgRestore()">
</map>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-760627-2";
urchinTracker();
</script>
</BODY><!-- InstanceEnd --></HTML>
