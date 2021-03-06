<?php
/* @var $global DUP_PRO_Global_Entity */
defined("ABSPATH") or die("");
require_once(DUPLICATOR_PRO_PLUGIN_PATH.'/classes/entities/class.secure.global.entity.php');

$global  = DUP_PRO_Global_Entity::get_instance();
$sglobal = DUP_PRO_Secure_Global_Entity::getInstance();

$nonce_action		= 'duppro-settings-package-edit';
$action_updated		= null;
$action_response	= DUP_PRO_U::__("Package Settings Saved");
?>

<style>    
    input#package_mysqldump_path_found {margin-top:5px}
    div.dup-feature-found {padding:0; color: green;}
    div.dup-feature-notfound {padding:5px; color: maroon; width:600px;}
	select#package_ui_created {font-family: monospace}
	input#_package_mysqldump_path {width:500px}
	#dpro-ziparchive-mode-st, #dpro-ziparchive-mode-mt {height: 28px; padding-top:5px; display: none}
	div.engine-radio {float: left; min-width: 100px}
	div.engine-radio-disabled {}
	div.engine-sub-opts {padding:10px 0 10px 25px; }

	table#archive-build-schedule {display:none}
	span#archive-build-schedule-icon {display:none}
</style>

<?php
	$section = isset($_GET['section']) ? $_GET['section'] : 'basic';
	$txt_gen = DUP_PRO_U::__("Basic Settings");
	$txt_adv = DUP_PRO_U::__("Advanced Settings");
	$url = 'admin.php?page=duplicator-pro-settings&tab=package';

	switch ($section) {
		case 'basic':
				echo "<div class='dpro-sub-tabs'><b>{$txt_gen}</b> &nbsp;|&nbsp; <a href='{$url}&section=advanced'>{$txt_adv}</a></div>";
				include ('inc.basic.php');
			break;
			case 'advanced':
				echo "<div class='dpro-sub-tabs'><a href='{$url}&section=basic'>{$txt_gen}</a> &nbsp;|&nbsp; <b>{$txt_adv}</b></div>";
				include ('inc.advanced.php');
			break;
	}
?>


