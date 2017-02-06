<?php
session_start(); 
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])!='xmlhttprequest') {sleep(2);exit;} // ajax request
if(!isset($_POST['unox']) || $_POST['unox']!=$_SESSION['unox']) {sleep(2);exit;} // appel depuis uno.php
?>
<?php
include('../../config.php');
include('lang/lang.php');
// ********************* actions *************************************************************************
if (isset($_POST['action']))
	{
	switch ($_POST['action'])
		{
		// ********************************************************************************************
		case 'plugin':
		$bgc = '';
		if(file_exists('../../data/top_button.json'))
			{
			$q = file_get_contents('../../data/top_button.json'); $a = json_decode($q,true);
			if(!empty($a['bgc'])) $bgc = $a['bgc'];
			}
		if(empty($bgc)) $bgc = '232,98,86';
		?>
		<style>
		.del{background:transparent url(<?php echo $_POST['udep']; ?>includes/img/close.png) no-repeat center center;cursor:pointer;padding:0 20px;margin-left:10px}
		.topButImg{float:right;margin-right:20px;width:40px;height:40px;border:0;border-radius:2px;background:rgba(<?php echo $bgc; ?>,.8) url(uno/plugins/top_button/top-arrow.svg) no-repeat center 50%;
		</style>
		<div id="topButton" class="blocForm">
			<h2><?php echo T_("Top Button");?></h2>
			<div class="topButImg" id="topButImg"></div>
			<p><?php echo T_("This plugin adds a floating button in the bottom right of the page to return smoothly to the top.");?></p>
			<p><?php echo T_("JQuery is needed.");?></p>
			<h3><?php echo T_("Settings");?></h3>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Button color");?></label></td>
					<td><input type="text" class="input color" name="topButtonCol" id="topButtonCol" style="width:100px;" /><span class="del" onclick="f_delColor_topButton(this);"></span></td>
					<td><em><?php echo T_("Background color for the button.");?></em></td>
				</tr>
			</table>
			<div class="bouton fr" onClick="f_save_topButton();" title="<?php echo T_("Save settings");?>"><?php echo T_("Save");?></div>
			<div class="clear"></div>
		</div>
		<?php break;
		// ********************************************************************************************
		case 'save':
		$a = array();
		if(isset($_POST['c'])) $a['bgc'] = strip_tags($_POST['c']);
		$out = json_encode($a);
		if(file_put_contents('../../data/top_button.json', $out)) echo T_('Backup performed');
		else echo '!'.T_('Impossible backup');
		break;
		// ********************************************************************************************
		}
	clearstatcache();
	exit;
	}
?>
