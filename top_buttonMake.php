<?php
if(!isset($_SESSION['cmsuno'])) exit();
?>
<?php
$bgc = '';
if(file_exists('data/top_button.json'))
	{
	$q = file_get_contents('data/top_button.json'); $a = json_decode($q,true);
	if(!empty($a['bgc'])) $bgc = $a['bgc'];
	}
if(empty($bgc)) $bgc = '232,98,86';
$Ustyle .= '#back-to-top{position:fixed;bottom:40px;right:40px;z-index:9999;width:40px;height:40px;cursor:pointer;border:0;border-radius:2px;text-decoration:none;transition:opacity 0.2s ease-out;opacity:0;background:rgba('.$bgc.',.8) url(uno/plugins/top_button/top-arrow.svg) no-repeat center 50%;}'."\r\n";
$Ustyle .= '#back-to-top:hover{background:rgba('.$bgc.',.9) url(uno/plugins/top_button/top-arrow.svg) no-repeat center 50%;}'."\r\n";
$Ustyle .= '#back-to-top.show{opacity:1;}'."\r\n";
$Ufoot .= '<script type="text/javascript" src="uno/plugins/top_button/top_buttonInc.js"></script>'."\r\n";
?>
