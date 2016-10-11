<?
	error_reporting( 6135 );

	class QuickViewer{
		
		var $country,
			$countryDescription,
			$countrySelection,
			$countriesSelected,
			$system,
			$environment,
			$storeType,
			$storeTypeDescription,
			$subDomain,
			$environmentDescription,
			$geoSelected,
			$viewRequestData,
			$viewRequestType,
			$baseGeoUrl,
			$baseGeoUrlFolder,
			$geoFolders,
			$imageGeoFolder,
			$flavours,
			$domain;
				
		function QuickViewer(){
			
		}
		// http://stg-prod.uk.burberry.com:8080/store/
		function Initiate(){
			//
			//	set sub-domain and description based on the environment (stg or prod)
			//	
			
			if( $this->environment == "stg" ){
				$this->domain = '.burberry.com:8080/store/';		
				$this->subDomain = "stg-prod.";
			}
			else{
				$this->domain = '.burberry.com/store/';		
				$this->subDomain = "";			
			}
			$this->environmentDescription = ( $this->environment == "stg" ? "Staging" : "Live" );
			//$this->geoSelected = "emea";
			
			
			$this->SetQuickViewType();			
			$this->SetGeo();
			$this->flavours = array();
		
		}
		
		function SetValue( $varname, $value ) {
			$this->$varname = $value;
		} 
		
		function GetValue( $varname ) {
			return $this->$varname;
		}
		
		
		function SetGeo(){
			$this->countrySelection = explode( ",","uk,au,at,be,br,bg,ca,cn,cy,cz,dk,ee,fi,fr,de,gr,hk,hu,in,ie,it,jp,kr,kw,lv,lt,lu,mo,my,mt,nl,pl,pt,qa,row,ro,ru,sg,sk,si,es,se,ch,tw,tr,ae,us" );
			$this->countryDescription = explode( ",", "United Kingdom,Australia,Austria,Belgium,Brazil,Bulgaria,Canada,China,Cyprus,Czech Republic,Denmark,Estonia,Finland,France,Germany,Greece,Hong Kong,Hungary,India,Ireland,Italy,Japan,Korea,Kuwait,Latvia,Lithuania,Luxembourg,Macao,Malaysia,Malta,Netherlands,Poland,Portugal,Qatar,Rest of World,Romania,Russian Federation,Singapore,Slovakia,Slovenia,Spain,Sweden,Switzerland,Taiwan,Turkey,UAE,United States" );
			$this->imageGeoFolders = $this->countrySelection;
			
			$this->baseGeoUrlFolder = "uk";	
			$this->geoFolders = explode( ",", "uk,au,at,be,br,bg,ca,cn,cy,cz,dk,ee,fi,fr,de,gr,hk,hu,in,ie,it,jp,kr,kw,lv,lt,lu,mo,my,mt,nl,pl,pt,qa,row,ro,ru,sg,sk,si,es,se,ch,tw,tr,ae,us" );
						
		}
		
		function SetQuickViewType(){
			
			$viewRequestDataLen = strlen( $this->viewRequestData );
			//echo $this->viewRequestData;
			//
			//	check for new lines.
			//
			if( eregi( "\n", trim( $this->viewRequestData ) ) ){
				
				$this->viewRequestType = "multiplePartNo";
				
			}
			else{
				if( is_numeric( trim( $this->viewRequestData ) ) ){	
					//
					//	numbers?
					//
					$this->viewRequestType = "article";
					
				}
				else if( eregi( "http://", $this->viewRequestData ) ){
					//
					//	url
					//
					$this->viewRequestType = "url";	
					//echo http://hk.burberry.com/store/womenswear/prorsum/aw11-runway-collection/prod-10000018744-wool-coat-with-oversize-rain-shield/sku-44488231001?WT.ac=LP_H_B12_SEP_PROD_44488231;			
				}
				else if( strlen( trim( $this->viewRequestData ) ) > 0 ){
					$this->viewRequestType = "node";
				}
				else{
					$this->viewRequestType = "";	
				}
			
			}		
			
		}
		
		function BuildUrl( $index ){
		
			$isCTO = false;
			//http://stg-prod.uk.burberry.com:8080/store/
			$val = $this->baseGeoUrl = "http://" . $this->subDomain . $this->baseGeoUrlFolder . $this->domain;
			//echo $this->viewRequestType;
			switch( $this->viewRequestType ){
			
				case "url":
					$val = $this->viewRequestData;
					break;
				case "article":
					//32009791
					//$val = $this->baseGeoUrl . $this->baseGeoUrlFolder . "/product/" . $this->viewRequestData;
					$val = $this->baseGeoUrl = "http://" . $this->subDomain . $this->baseGeoUrlFolder . $this->domain;
					break;
				case "node":
					//32009791
					//$val = $this->baseGeoUrl . $this->baseGeoUrlFolder . "/product/" . $this->viewRequestData;
					$val = $this->baseGeoUrl = "http://" . $this->subDomain . $this->baseGeoUrlFolder . $this->domain . $this->viewRequestData;
					break;
				case "multiplePartNo": 
					//$this->MultiplePartNo( $index );
					$val = $this->baseGeoUrl = "http://" . $this->subDomain . $this->baseGeoUrlFolder . $this->domain;

					break;
				default:	
					//$val = $this->viewRequestData;
					$val = $this->baseGeoUrl = "http://" . $this->subDomain . $this->baseGeoUrlFolder . $this->domain;
					break;
				
			}
			//echo  $val . "<br>";
			
			//
			//	final base URL built, now switch out the geo folder
			//
			$foldersToBeReplaced = ( $this->viewRequestType == "image" ? $this->imageGeoFolders : $this->geoFolders );
			//echo $this->baseGeoUrlFolder . "---" . $foldersToBeReplaced[$index];
			$val = eregi_replace( $this->baseGeoUrlFolder . ".", $foldersToBeReplaced[$index] . ".", $val );
			
			return $val;
		
		}
		
		
		
		function Build(){
		
			for( $i=0; $i<count( $this->countrySelection ); $i++ ){
				//
				//	countriesSelected = from the navigation
				//	countrySelection = on offer
				//
				//
				if( in_array( "all", $this->countriesSelected ) || in_array( $this->countrySelection[$i], $this->countriesSelected ) ){
					
					//
					//	only display if there is a store in this country - this is a check in case an SMB etc store isn't listed.
					//
					if( !empty( $this->geoFolders[$i] ) ){
					
						switch( $this->viewRequestType ){
							
							case "image":
								$url = $this->BuildUrl( $i );
?>
<fieldset class="imagefs"><legend><img align="middle" src="../gfx/icon<?= $this->countrySelection[$i] ?>.gif"> <span class="title"><strong><?= $this->countryDescription[$i] ?></strong></span></legend>
<p><?= $url ?></p><p><a href='<?= $url ?>' target='_new' ><img name='' id='img_<?= $i ?>' src='<?= $url ?>' title='' alt='' align='top' border='0'></a>
</fieldset>
<?						
								break;
							case "article";
								//$this->MultiplePartNo( $i );
								//$i = count( $this->countrySelection );
								//echo $i;	
								$url = $this->BuildUrl( $i ) . "prod-" . $this->viewRequestData;
								$this->BuildFrame( $url, $i );
								break;
							case "multiplePartNo";
								$this->MultiplePartNo( $i );
								$i = count( $this->countrySelection );
								break;
							default:	
								$url = $this->BuildUrl( $i );
								$this->BuildFrame( $url, $i );
		
						}	// switch
					}	//if geofolder
				}	//if
			}	//for
		}
		
		function MultiplePartNo( $countryIndex ){
			$parts = explode( "\n", $this->viewRequestData );
			
			//echo $countryIndex;
			
			for( $i=0; $i<count( $parts ); $i++ ){
				$this->viewRequestData = $parts[$i];
				
				if( trim( $this->viewRequestData ) != "" ){
					$url = $this->BuildUrl( $countryIndex )  . "prod-" . $this->viewRequestData; 
					$this->BuildFrame( $url, $countryIndex, $this->viewRequestData );
				}
				
			}
		}
		
		function BuildFrame( $url, $i, $name = "" ){
		
?>
<td><fieldset class="fs"><legend><!--<img align="middle" src="../gfx/icon<?= $this->countrySelection[$i] ?>.gif"> --><span class="title"><strong><?= $this->countryDescription[$i] . ( !empty( $name ) ? " - " . $name : "" )?></strong></span> - <?= $this->environmentDescription ?> &nbsp;&nbsp;&nbsp;(<a href="<?= $url ?>" target="FRAME_<?= $i ?>">refresh</a>)</legend>
<iframe src="<?= $url ?>" title="" name="FRAME_<?= $i ?>" align="left" frameborder="1" height="<?= $this->windowHeight ?>" width="<?= $this->windowWidth ?>" id="" marginheight="" marginwidth="" scrolling="yes" style="overflow-x:none;"></iframe>
</fieldset></td>
<?
		
		}
		
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Quick Launcher</title>
<style type="text/css" media="all">
body {margin: 0; padding: 0; background: #fff; font: 10px 'Lucida Grande', Geneva, Arial, Verdana, sans-serif; color: #000;}
table, td, input {font: 10px 'Lucida Grande', Geneva, Verdana, Arial, sans-serif; color: #000;}
H1, .title {font: 14px 'Lucida Grande', Geneva, Verdana, Arial, sans-serif; color: #000; font-weight:bold;}

a {text-decoration: none; color: #36C;}
a:hover { text-decoration: underline; }
a:active {color: #666666; text-decoration: none;}
.header {margin-bottom: 5px; margin-top: 10px; text-align: center;} 
legend {
	padding: 0.2em 0.5em;
	border:1px solid silver;
	text-align:left;
	background-color: #F1F1F1;
  }
.imagefs {
	border:1px solid silver;
	display: inline;
	background-color: #F1F1F1;

 }
 
.fs {
	border:1px solid silver;
	display: inline;
	background-color: #FFF;

 }

</style> 
</head>
<body>
<table width="0" border="0" cellspacing="6" cellpadding="6">

<?
	//echo $_GET['storeType'];
	$qv = new QuickViewer();
	$qv->SetValue( "geoSelected", $_GET['geo'] );					//	what geo navigation has been selected?
	$qv->SetValue( "countriesSelected", $_GET['countrySelect'] );	//	all or specific countries selected?
	$qv->SetValue( "system", $_GET['system'] );						//	system: aspen or mercury
	$qv->SetValue( "environment", $_GET['environment'] );			//	environment:	stg or prod
	$qv->SetValue( "storeType", $_GET['storeType'] );				//	store stype: consumer, smb, edu etc
	$qv->SetValue( "windowHeight", $_GET['height'] );				//	frame height
	$qv->SetValue( "windowWidth", $_GET['width'] );					//	frame width
	
	//
	//	set the input value... URL, node, image, multiple part numbers etc.
	//
	//
	
	if( !empty( $_GET['url'] ) ){
		if( isset( $_GET['search'] ) && !empty( $_GET['url'] ) ){
			$viewRequestData = '../search/?find=' . $_GET['url'];
		}
		else{
			$viewRequestData = $_GET['url'];
		}
	}
	else if( !empty( $_GET['node'] ) ){
		$viewRequestData = $_GET['node'];
	}
	
	if( $_GET['view-all'] == 'yes' ){
		echo "???";
		$viewRequestData .= "#accessories=true&bags=true&ballerinas-flats=true&beauty-fragrance=true&blends=true&blends=true&boots=true&bowling=true&brit=true&business=true&cashmere=true&clutches-slings=true&coats=true&crossbody=true&cufflinks=true&denim=true&dresses=true&exotic-bags=true&eye-definer-mascara=true&fragrance=true&gifts-sets=true&hats-gloves=true&haymarket=true&haymarket=true&heels=true&house-check=true&jackets=true&jerseywear=true&light-glow=true&lip-cover=true&lip-definer=true&lip-glow=true&lip-mist=true&london=true&luggage=true&messengers-totes=true&nova=true&prorsum=true&rain-boots=true&sandals=true&scarves=true&sheer-compact-foundation=true&sheer-eye-shadow=true&sheer-foundation=true&sheer-luminous-concealer=true&sheer-powder=true&shirts=true&shoes=true&shoulder=true&silk=true&skirts=true&skirts-trousers=true&small-accessories=true&smoked-check=true&sport=true&sport=true&sweaters=true&swimwear=true&tailoring=true&the-beat-check=true&ties=true&timepieces=true&tops=true&totes=true&trainers=true&trench-coats=true&trousers=true&trousers-shorts=true&umbrellas=true&wallets=true&warm-glow=true&wedges";
	}
	
	$qv->SetValue( "viewRequestData", $viewRequestData );
	$qv->Initiate();
	$qv->Build();

?>

</table>
</body>
</html>
