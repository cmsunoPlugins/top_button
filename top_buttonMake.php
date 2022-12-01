<?php
if(!isset($_SESSION['cmsuno'])) exit();
?>
<?php
$bgc = '#e86256';
if(file_exists('data/top_button.json')) {
	$q = file_get_contents('data/top_button.json'); $a = json_decode($q,true);
	if(!empty($a['bgc'])) $bgc = $a['bgc'];
}
$Ustyle .= '#back-to-top{position:fixed;bottom:40px;right:40px;z-index:9999;width:40px;height:40px;cursor:pointer;border:0;border-radius:2px;text-decoration:none;transition:opacity 0.2s ease-out;opacity:0;background:'.$bgc.' url(uno/plugins/top_button/top-arrow.svg) no-repeat center 50%;}';
$Ustyle .= '#back-to-top.show{opacity:.5;}#back-to-top.show:hover{opacity:.8;}'."\r\n";
$Ufoot .= "<script type=\"text/javascript\">var scrollTrigger=100,btt=document.createElement('a');btt.id='back-to-top';btt.href='#';btt.title='back to top';document.body.appendChild(btt);let backTop=function(){if(document.documentElement.scrollTop>scrollTrigger)document.getElementById('back-to-top').className='show';else document.getElementById('back-to-top').className='';};backTop();document.addEventListener('scroll',backTop);document.getElementById('back-to-top').onclick=function(e){e.preventDefault();window.scrollTo({top:0,behavior:'smooth'});};</script>\r\n";
?>
