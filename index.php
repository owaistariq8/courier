<?php

require_once( __DIR__."/includes/common.php");
define("PAGE_NAME", "index");
if(isset($_GET['delete_id'])&&is_numeric($_GET['delete_id'])&&$_GET['delete_id']!=0)
{
	global $db;
	$delete_id = $_GET['delete_id'];
	$delete_query = "DELETE FROM `clients` WHERE id=".$delete_id;
	$db->upsert($delete_query);
}	
refer('name', 'active');
template_files("index.html");
show_all_included();



?>