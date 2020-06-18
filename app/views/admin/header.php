<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Advanced PHP OOP</title>
<style>
body {font-family: arial;font-size: 15px;line-height: 18px;margin: 0 auto;width: 850px;
		<?php  foreach ($color as $key => $value) { ?>
				background:<?php echo $value['color'];?>
		<?php }?>
}
a{color:#3399FF;}



.headeroption {background: #3399ff url("img/php.png") no-repeat scroll 25px 12px;height: 74px;overflow: hidden;padding-left: 140px;}
.headeroption h2{color: #000;font-size: 30px;padding-top: 2px;text-shadow: 0 1px 1px #fff;}
.content{background: #fff;border: 6px solid #3399ff;font-size: 16px;line-height: 22px;margin-bottom: 3px;margin-top: 3px;min-height: 380px;overflow: hidden;padding: 10px;}

.subject {border-bottom: 1px solid #3399ff;font-size: 20px;margin-bottom: 10px;padding-bottom: 10px;}
.subject p{margin:0;}

.insert{color:#06960E;font-weight:bold;}
.delete{color:#DE5A24;font-weight:bold;}

.mainleft{border-right: 1px dotted #999;float:left;margin-right:16px;width: 350px;}
.mainright{float:right;width:450px;}

.tblone{width:100%;border:1px solid #fff;}
.tblone td{padding:5px 10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#fdf0f1;height:30px;}

input[type="text"]{border:1px solid #ddd;margin-bottom:5px;padding:5px;width:350px;font-size:16px}
input[type="submit"]{cursor: pointer}
.cat {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:300px;font-size:16px; cursor: pointer;}

.adminleft{width: 200px; float: left; border-right: 1px solid #ddd; margin-right: 10px; padding-right: 10px;}
.widget{margin-bottom: 20px;}
.widget h3{background: #3399ff none repeat scroll 0 0; border-bottom: 2px solid #066cd2; color: #000; margin: 0 0 2px; padding: 5px; text-shadow: 0 1px 1px #fff;}
.widget ul{margin: 0; padding: 0; list-style: none;}
.widget ul li{display: block;}
.widget ul li a{background: #ddd none repeat scroll 0 0; border-bottom: 1px solid #fff; color: #000; display: block; padding: 5px 10px; text-decoration: none;}
.widget ul li a:hover{background: #bebebe;}
.adminright{width: 577px; float: right; padding: 5px 10px; background: #fafafa;}
.adminright h2{border-bottom: 2px dashed #666; color: #666; margin: 0 0 10px; padding-bottom: 10px; }


.footeroption{height:90px;background:#177de3;overflow:hidden;padding-top:10px;}
.footerone {background: #3aa0ff;border-radius: 5px;float: left;font-size:18px;line-height:23px;margin-left: 10px;padding:6px 10px;text-align:center;text-shadow: 1px 0 2px #fff;width:390px;overflow: hidden;}
.footerone p{margin:0;}
</style>
</head>
<body>
  <header class="headeroption">
    <h2>Advanced PHP OOP [MVC Framework]</h2>
	
  </header>
<div class="content">
Admin Panel <span style="float: right;"><a href="<?php echo BASE_URL;?>" target="_blank">Visit Website</a></span> <hr/>