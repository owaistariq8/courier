<?php

require_once( __DIR__."/includes/common.php");
define("PAGE_NAME", "inv_bill");
	
if(isset($_REQUEST['bill_no'])&&is_numeric($_REQUEST['bill_no'])&&$_REQUEST['bill_no']!=0)
{
	global $db;
	$id = $_REQUEST['bill_no'];
	$select_query = "SELECT * FROM invoice_bill WHERE id='".$id."'";
	$results = $db->select($select_query);
	$json_bill = json_decode($results[0]['json_bill'],true);
	refer("invoice_number",$results[0]['id']);
	refer("start_date",$results[0]['start_date']);
	refer("end_date",$results[0]['end_date']);
	refer('invoice_results',$json_bill);
	$result_client = get_clients('id',$results[0]['client_id']);
	refer('result',$result_client);
	global $template;
	$template->show_file(SKIN_LAYOUT."/print_page.html");
	exit();
}
else
{
	refer('inv_bill', 'active');
	template_files("inv_bill.html");
}
show_all_included();
?>