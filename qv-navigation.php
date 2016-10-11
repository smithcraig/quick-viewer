<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Navigation</title>
<style type="text/css" media="all">
body {margin: 10; padding: 0; background: #fff; font: 10px 'Lucida Grande', Geneva, Arial, Verdana, sans-serif; color: #000;}
table, td, form, textarea, select, input {font: 10px 'Lucida Grande', Geneva, Verdana, Arial, sans-serif; color: #000;}
H1, .title {font: 14px 'Lucida Grande', Geneva, Verdana, Arial, sans-serif; color: #000; font-weight:bold;}
H2 {font: 12px 'Lucida Grande', Geneva, Verdana, Arial, sans-serif; color: #000; font-weight:bold;}

a {text-decoration: none; color: #36C;}
a:hover { text-decoration: underline; }
a:active {color: #666666; text-decoration: none;}
.header {margin-bottom: 5px; margin-top: 10px; text-align: center;} -->



legend {
	font-weight:bold;
	padding: 0.2em 0.5em;
  }
 
.fs {
	border:1px solid silver;
	background-color: #FFF;

 }
</style> 

<script language="javascript">
function makeSelection( type ){
 
var selObj = document.getElementById('countrySelect[]');
	for (var i=0; i<selObj.options.length; i++) {
		selObj.options[i].selected = false;
	}
	 
	for (var i=0; i<selObj.options.length; i++) {
	 
		if( selObj.options[i].value == "uk" ){ selObj.options[i].selected = true; }
		if( selObj.options[i].value == "de" ){ selObj.options[i].selected = true; }
		if( selObj.options[i].value == "fr" ){ selObj.options[i].selected = true; }
		if( selObj.options[i].value == "jp" ){ selObj.options[i].selected = true; }
		if( selObj.options[i].value == "cn" ){ selObj.options[i].selected = true; }
	} 
}
</script>

</head>
<body>

<table width="230" border="0" cellspacing="3" cellpadding="3">
<form action="qv-view.php" target="mainFrame" name="qv">
<tr valign="bottom">
<td nowrap>
<h1>Quick Launcher.</h1>
<div id="req-os">
<fieldset class="fs">
<legend>URL / Articles</legend>
<textarea name="url" id="url" rows="2" style="width:98%;" onFocus="clearSelection('node');"><?= ( !empty( $_GET['url'] ) ? $_GET['url'] : "" ) ?></textarea><br>
<!--<input type="checkbox" name="search" id="search"><label for="search">Search</label>-->

<p>Categories:<br>
<select name="node" id="node" style="width:98%;" onChange="clearInput('url')">
<option value="" style="font-weight:bold;">Homepage</option>

<option value='womenswear/' style="font-weight:bold;">Womenswear</option>
<option value='womenswear/body/'>&nbsp;&nbsp;-&nbsp;Body</option>
<option value='womenswear/brit/'>&nbsp;&nbsp;-&nbsp;Brit</option>
<option value='womenswear/coats/'>&nbsp;&nbsp;-&nbsp;Coats</option>
<option value='womenswear/denim/'>&nbsp;&nbsp;-&nbsp;Denim</option>
<option value='womenswear/dresses/'>&nbsp;&nbsp;-&nbsp;Dresses</option>
<option value='womenswear/jackets/'>&nbsp;&nbsp;-&nbsp;Jackets</option>
<option value='womenswear/jerseywear/'>&nbsp;&nbsp;-&nbsp;Jerseywear</option>
<option value='womenswear/london/'>&nbsp;&nbsp;-&nbsp;London</option>
<option value='womenswear/new-arrivals/'>&nbsp;&nbsp;-&nbsp;New Arrivals</option>
<option value='womenswear/prorsum/'>&nbsp;&nbsp;-&nbsp;Prorsum</option>
<option value='womenswear/shirts/'>&nbsp;&nbsp;-&nbsp;Shirts</option>
<option value='womenswear/skirts/'>&nbsp;&nbsp;-&nbsp;Skirts</option>
<option value='womenswear/sweaters/'>&nbsp;&nbsp;-&nbsp;Sweaters</option>
<option value='womenswear/swimwear/'>&nbsp;&nbsp;-&nbsp;Swimwear</option>
<option value='womenswear/tailoring/'>&nbsp;&nbsp;-&nbsp;Tailoring</option>
<option value='womenswear/trench-coats/'>&nbsp;&nbsp;-&nbsp;Trench Coats</option>
<option value='womenswear/trousers/'>&nbsp;&nbsp;-&nbsp;Trousers</option>

<option value='womens-accessories/' style="font-weight:bold;">Women&#039;s Accessories</option>
<option value='womens-accessories/aw11-runway-accessories/'>&nbsp;&nbsp;-&nbsp;A/W11 Runway Accessories</option>
<option value='womens-accessories/bags/'>&nbsp;&nbsp;-&nbsp;Bags</option>
<option value='womens-accessories/belts/'>&nbsp;&nbsp;-&nbsp;Belts</option>
<option value='womens-accessories/home/'>&nbsp;&nbsp;-&nbsp;Home</option>
<option value='womens-accessories/iconic-checks/'>&nbsp;&nbsp;-&nbsp;Iconic Checks</option>
<option value='womens-accessories/jewellery/'>&nbsp;&nbsp;-&nbsp;Jewellery</option>
<option value='womens-accessories/new-arrivals/'>&nbsp;&nbsp;-&nbsp;New Arrivals</option>
<option value='womens-accessories/scarves/'>&nbsp;&nbsp;-&nbsp;Scarves</option>
<option value='womens-accessories/shoes/'>&nbsp;&nbsp;-&nbsp;Shoes</option>
<option value='womens-accessories/small-accessories/'>&nbsp;&nbsp;-&nbsp;Small Accessories</option>
<option value='womens-accessories/sunglasses/'>&nbsp;&nbsp;-&nbsp;Sunglasses</option>
<option value='womens-accessories/timepieces/'>&nbsp;&nbsp;-&nbsp;Timepieces</option>

<option value='menswear/' style="font-weight:bold;">Menswear</option>
<option value='menswear/body/'>&nbsp;&nbsp;-&nbsp;Body</option>
<option value='menswear/coats/'>&nbsp;&nbsp;-&nbsp;Coats</option>
<option value='menswear/denim/'>&nbsp;&nbsp;-&nbsp;Denim</option>
<option value='menswear/jackets/'>&nbsp;&nbsp;-&nbsp;Jackets</option>
<option value='menswear/jerseywear/'>&nbsp;&nbsp;-&nbsp;Jerseywear</option>
<option value='menswear/new-arrivals/'>&nbsp;&nbsp;-&nbsp;New Arrivals</option>
<option value='menswear/shirts/'>&nbsp;&nbsp;-&nbsp;Shirts</option>
<option value='menswear/sweaters/'>&nbsp;&nbsp;-&nbsp;Sweaters</option>
<option value='menswear/tailoring/'>&nbsp;&nbsp;-&nbsp;Tailoring</option>
<option value='menswear/ties/'>&nbsp;&nbsp;-&nbsp;Ties</option>
<option value='menswear/trench-coats/'>&nbsp;&nbsp;-&nbsp;Trench Coats</option>
<option value='menswear/trousers/'>&nbsp;&nbsp;-&nbsp;Trousers</option>

<option value='mens-accessories/' style="font-weight:bold;">Men&#039;s Accessories</option>
<option value='mens-accessories/aw11-runway-accessories/'>&nbsp;&nbsp;-&nbsp;A/W11 Runway Accessories</option>
<option value='mens-accessories/bags/'>&nbsp;&nbsp;-&nbsp;Bags</option>
<option value='mens-accessories/belts/'>&nbsp;&nbsp;-&nbsp;Belts</option>
<option value='mens-accessories/home/'>&nbsp;&nbsp;-&nbsp;Home</option>
<option value='mens-accessories/iconic-checks/'>&nbsp;&nbsp;-&nbsp;Iconic Checks</option>
<option value='mens-accessories/new-arrivals/'>&nbsp;&nbsp;-&nbsp;New Arrivals</option>
<option value='mens-accessories/scarves/'>&nbsp;&nbsp;-&nbsp;Scarves</option>
<option value='mens-accessories/shoes/'>&nbsp;&nbsp;-&nbsp;Shoes</option>
<option value='mens-accessories/small-accessories/'>&nbsp;&nbsp;-&nbsp;Small Accessories</option>
<option value='mens-accessories/sunglasses/'>&nbsp;&nbsp;-&nbsp;Sunglasses</option>
<option value='mens-accessories/timepieces/'>&nbsp;&nbsp;-&nbsp;Timepieces</option>
<option value='mens-accessories/travel/'>&nbsp;&nbsp;-&nbsp;Travel</option>

<option value='childrenswear/' style="font-weight:bold;">Childrenswear</option>
<option value='childrenswear/baby-bags/'>&nbsp;&nbsp;-&nbsp;Baby Bags</option>
<option value='childrenswear/baby-boy/'>&nbsp;&nbsp;-&nbsp;Baby Boy</option>
<option value='childrenswear/baby-girl/'>&nbsp;&nbsp;-&nbsp;Baby Girl</option>
<option value='childrenswear/boys-2-6/'>&nbsp;&nbsp;-&nbsp;Boys 2-6</option>
<option value='childrenswear/boys-7-14/'>&nbsp;&nbsp;-&nbsp;Boys 7-14</option>
<option value='childrenswear/girls-2-6/'>&nbsp;&nbsp;-&nbsp;Girls 2-6</option>
<option value='childrenswear/girls-7-14/'>&nbsp;&nbsp;-&nbsp;Girls 7-14</option>

<option value='beauty/' style="font-weight:bold;">Beauty</option>
<option value='beauty/eyes/'>&nbsp;&nbsp;-&nbsp;Eyes</option>
<option value='beauty/glow/'>&nbsp;&nbsp;-&nbsp;Glow</option>
<option value='beauty/lips/'>&nbsp;&nbsp;-&nbsp;Lips</option>
<option value='beauty/skin/'>&nbsp;&nbsp;-&nbsp;Skin</option>

<option value='fragrance/' style="font-weight:bold;">Fragrance</option>
<option value='fragrance/body/'>&nbsp;&nbsp;-&nbsp;Body</option>
<option value='fragrance/mens-fragrance/'>&nbsp;&nbsp;-&nbsp;Men&#039;s Fragrance</option>
<option value='fragrance/womens-fragrance/'>&nbsp;&nbsp;-&nbsp;Women&#039;s Fragrance</option>

<option value='home-gifts/' style="font-weight:bold;">Home &amp; Gifts</option>
<option value='home-gifts/home/'>&nbsp;&nbsp;-&nbsp;Home</option>
<option value='home-gifts/men/'>&nbsp;&nbsp;-&nbsp;Men</option>
<option value='home-gifts/women/'>&nbsp;&nbsp;-&nbsp;Women</option>



</select>
</fieldset>
</div>


<tr>
<td nowrap  style="width:80%;">
<p>
<fieldset class="fs">
<legend>Environment</legend>
<input name="environment" type="radio" value="stg" checked name="stg" id="stg">&nbsp;&nbsp;<label for="stg">Staging</label>&nbsp;
<input name="environment" type="radio" value="prod" name="prod" id="prod">&nbsp;&nbsp;<label for="prod">Live</label>&nbsp;
</fieldset>
</p>
</td>
</tr>
<tr>
<td nowrap>
<p>
<fieldset class="fs">
<legend>Countries</legend>
<select name="countrySelect[]" multiple style="width:98%;" size="8" id="countrySelect[]">
<option value="all" style="font-weight:bold;">ALL STORES</option>
<?
$countrySelection = explode( ",","uk,au,at,be,br,bg,ca,cn,cy,cz,dk,ee,fi,fr,de,gr,hk,hu,in,ie,it,jp,kr,kw,lv,lt,lu,mo,my,mt,nl,pl,pt,qa,row,ro,ru,sg,sk,si,es,se,ch,tw,tr,ae,us" );
$countryDescription = explode( ",", "United Kingdom,Australia,Austria,Belgium,Brazil,Bulgaria,Canada,China,Cyprus,Czech Republic,Denmark,Estonia,Finland,France,Germany,Greece,Hong Kong,Hungary,India,Ireland,Italy,Japan,Korea,Kuwait,Latvia,Lithuania,Luxembourg,Macao,Malaysia,Malta,Netherlands,Poland,Portugal,Qatar,Rest of World,Romania,Russian Federation,Singapore,Slovakia,Slovenia,Spain,Sweden,Switzerland,Taiwan,Turkey,UAE,United States" );
for( $i=0; $i<count( $countrySelection ); $i++ ){
	echo "<option value='" . $countrySelection[$i] . "'" . ( $i == 0 ? " selected ": "" ) . ">" . $countryDescription[$i] . "</option>"."\n";
}
?>
</select>
</p>
<a href='javascript:makeSelection("");'>Default Languages</a>
</td>
</tr>
<tr>
<td nowrap>
<p>
<fieldset class="fs">
<legend>Frame height</legend>
<table width="0" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Width&nbsp;&nbsp;<input name="width" type="input" value="<?= ( !empty( $_GET['height'] ) ? $_GET['width']  : 1024 ) ?>" style="width: 35px;"></td>
<td>&nbsp;</td>
<td>Height&nbsp;&nbsp;<input name="height" type="input" value="<?= ( !empty( $_GET['height'] ) ? $_GET['height']  : 5000 ) ?>" style="width: 35px;"> pixels.
</td>
</tr>
</table>
</fieldset>
</p>
</td>
</tr>
<tr>
<td><input name="view" type="image"  src="/gfx/gfx-view-stores.gif" alt="View stores"></td>
</tr>
<input type="hidden" value="aspen" name="system">
<input name="storeType" type="hidden" value="consumer" checked name="consumer" id="consumer">
</form>
</table>
</body>
</html>
