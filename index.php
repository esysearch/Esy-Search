<?php
	require_once("perpage.php");	
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$name = "";
	$code = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("name","about");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "name":
						$name = $v;
						$queryCondition .= "name LIKE '" . $v . "%'";
						break;
					case "code":
						$code = $v;
						$queryCondition .= "about LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM registration " . $queryCondition;
	$href = 'index.php';					
		
	$perPage = 2; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Esy search-Home Page</title>
<link rel="stylesheet" href="emx_nav_left.css" type="text/css" />
<script type="text/javascript">
<!--
<!--
var time = 3000;
var numofitems = 7;

//menu constructor
function menu(allitems,thisitem,startstate){ 
  callname= "gl"+thisitem;
  divname="subglobal"+thisitem;  
  this.numberofmenuitems = allitems;
  this.caller = document.getElementById(callname);
  this.thediv = document.getElementById(divname);
  this.thediv.style.visibility = startstate;
}

//menu methods
function ehandler(event,theobj){
  for (var i=1; i<= theobj.numberofmenuitems; i++){
    var shutdiv =eval( "menuitem"+i+".thediv");
    shutdiv.style.visibility="hidden";
  }
  theobj.thediv.style.visibility="visible";
}
				
function closesubnav(event){
  if ((event.clientY <48)||(event.clientY > 107)){
    for (var i=1; i<= numofitems; i++){
      var shutdiv =eval('menuitem'+i+'.thediv');
      shutdiv.style.visibility='hidden';
    }
  }
}
// -->

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<style type="text/css">
<!--
.style1 {font-size: xx-large}
.style2 {
	font-size: medium;
	color: #2A1F55;
	font-weight: bold;
	font-style: italic;
}
.style3 {color: #2A1F55}
.tftextinput3 {		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;		
}
.tfbutton41 {	margin: 0;
	padding: 0;
	width:35px;
	height:35px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	color: #ffffff;
	border: solid 1px #0076a3;
	border-right:0px;
	border-top-right-radius: 5px 5px;
	border-bottom-right-radius: 5px 5px;
	background: #438db8 url('tf-search-icon.png');
	background-image: url(Images/tf-search-icon.png);
}
.tftextinput41 {margin: 0;
		padding: 6px 100px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;	
}
.tftextinput411 {margin: 0;
		padding: 6px 150px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;	
}
.tfbutton411 {margin: 0;
	padding: 0;
	width:35px;
	height:35px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	color: #ffffff;
	border: solid 1px #0076a3;
	border-right:0px;
	border-top-right-radius: 5px 5px;
	border-bottom-right-radius: 5px 5px;
	background: #438db8 url('tf-search-icon.png');
	background-image: url(Images/tf-search-icon.png);
}
.tfbutton4111 {margin: 0;
	padding: 0;
	width:30px;
	height:30px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	color: #ffffff;
	border: solid 1px #0076a3;
	border-right:0px;
	border-top-right-radius: 5px 5px;
	border-bottom-right-radius: 5px 5px;
	background: #438db8 url('tf-search-icon.png');
	background-image: url(Images/tf-search-icon.png);
}
.style5 {
	color: #2A1F55;
	font-weight: bold;
	font-style: italic;
}
.tftextinput4111 {
	margin: 0;
	padding: 6px 150px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#2A1F55;
	border:1px solid #0076a3;
	border-right:0px;
	border-top-left-radius: 5px 5px;
	border-bottom-left-radius: 5px 5px;
	border-left-width: thin;
}
-->
</style>
</head>
<body onmousemove="closesubnav(event);">
<div class="skipLinks">skip to: <a href="#content">page content</a> | <a href="#pageNav">links on this page</a> | <a href="#globalNav">site navigation</a> | <a href="#siteInfo">footer (site information)</a> </div>
<div id="masthead">
  <h1 align="center" class="style1" id="siteName">Esy Search </h1>
  <p align="center" class="style2">Make Yoyur Life Easy </p>
  <div id="utility"><a href="signup.php"></a>  |<a href="esysearch.php"></a><a href="#"> </a>
    <input name="Button" type="button" onClick="MM_goToURL('parent','signin.php');return document.MM_returnValue" value="Login" />
    <input name="Submit2" type="button" onClick="MM_goToURL('parent','signup.php');return document.MM_returnValue" value="Sign Up">
    <input name="Submit3" type="button" onClick="MM_goToURL('parent','esysearch.php');return document.MM_returnValue" value="Esy Search">
  </div>
  <!-- end globalNav -->
  <div id="subglobal1" class="subglobalNav"> <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> </div>
</div>
<div id="pagecell1">
  <img alt="" src="../tl_curve_white.gif" height="6" width="6" id="tl" />
  <div id="pageName">
    <h2 align="center" class="style3">Search Your Need Here </h2>
  </div>
  <div id="pageNav">
    <div id="sectionLinks"> <a href="index.php">Home </a> <a href="esysearch.php">Esy Search </a> <a href="signin.php">Log In </a><a href="signup.php">Register</a><a href="contactus.php">Contact Us </a><a href="price.php">Subcription Price </a></div>
    <div id="advert"> <img src="" alt="" width="107" height="66" /> 
<!-- add -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7363188085033487"
     data-ad-slot="1595551656"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> </div>
  </div>
  <div id="content">
    <div class="feature">
      <form id="form2" name="form2" method="post" action="sr.php">
        <p>&nbsp;        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center">
          <input type="text" id="tfq" class="tftextinput4111" name="q" value="<?php echo $data[category]; ?>" size="21" maxlength="120" placeholder="search your need here" />
          <span class="style3"></span>
          <input name="submit" type="submit" class="tfbutton4111" value=" " />
          <input type="hidden" name="act" value="search_info" />
          <input type="hidden" name="ID" value="<?php echo $data[ID];?>" />
</p>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div class="story"></div>
  </div>
  <div id="siteInfo"><a href="about.php">About Us</a> | <a href="sitem.php">Site Map</a> |<a href="privacy.php"> Privacy Policy</a> | <a href="contactus.php">Contact Us</a> | <span class="style5">&copy;2015esysearch.com</span> </div>
</div>
<!--end pagecell1-->
<br />
<script type="text/javascript">
    <!--
      var menuitem1 = new menu(7,1,"hidden");
			var menuitem2 = new menu(7,2,"hidden");
			var menuitem3 = new menu(7,3,"hidden");
			var menuitem4 = new menu(7,4,"hidden");
			var menuitem5 = new menu(7,5,"hidden");
			var menuitem6 = new menu(7,6,"hidden");
			var menuitem7 = new menu(7,7,"hidden");
    // -->
    </script>
</body>
</html>
