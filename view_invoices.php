<?php

require_once( __DIR__."/includes/common.php");
define("PAGE_NAME", "view_invoice");
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) 
{
	$page = 1;
}
 
$per_page = 30000; // Set how many records do you want to display per page.
 
$startpoint = ($page * $per_page) - $per_page;
$limit = "{$startpoint} , {$per_page}";

global $db;

if(isset($_GET['delete_id'])&&is_numeric($_GET['delete_id'])&&$_GET['delete_id']!=0)
{
	$de_id = $_GET['delete_id'];
	$delete_qeury = "DELETE FROM invoices WHERE id='".$de_id."'";
	$db->upsert($delete_qeury);
}
$acc_cond = '';
$cond = ' WHERE invoices.id<>0 ';
if(isset($_GET['start'])&&isset($_GET['end'])&&!empty($_GET['start'])&&!empty($_GET['end']))
{
	$start = $_GET['start'];
	$end = $_GET['end'];
	$end_date = date('d-m-Y',time());
	$start_date = date('d-m-Y',$start);
	if($end_date==$end)
	{
		$time_end = time();
	}
	else
	{
		$time_end = strtotime($end);	
	}
	if($start_date==$start)
	{
		$time_end = strtotime($start_date);
	}
	
	$time_start = strtotime($start);
	$time_cond = "  AND invoices.time_added>={$time_start} AND invoices.time_added<={$time_end}";
}
if(isset($_GET['cid'])&&!empty($_GET['cid']))
{
	// $id = $_GET['cid'];
	// $cond = " WHERE clients.id={$id} ";
}
if(isset($_GET['acno'])&&!empty($_GET['acno']))
{
	$accno = $_GET['acno'];
	$acc_cond = " AND invoices.acno={$accno} ";
}
if(isset($_GET['cnno'])&&!empty($_GET['cnno']))
{
	$cnno = $_GET['cnno'];
	$cno_cond = " AND invoices.cnno={$cnno} ";
}
if(isset($_GET['dest'])&&!empty($_GET['dest']))
{
	$dest = $_GET['dest'];
	$dest_cond = " AND invoices.dest='{$dest}' ";
}
if(isset($_GET['octroi'])&&!empty($_GET['octroi']))
{
	$octroi = $_GET['octroi'];
	$octroi_cond = " AND invoices.octroi='{$octroi}' ";
}
$select_count_query = "SELECT count(invoices.id) FROM invoices  LEFT JOIN clients ON invoices.acno=clients.acno {$cond} {$cno_cond} {$acc_cond} {$dest_cond} {$octroi_cond} {$id_cond} {$time_cond} ";
$count_results = $db->select($select_count_query);
$total = $count_results[0]['count(invoices.id)'];
$select_query = "SELECT *,invoices.id FROM invoices  LEFT JOIN clients ON invoices.acno=clients.acno {$cond} {$cno_cond} {$acc_cond} {$dest_cond} {$octroi_cond} {$id_cond} {$time_cond}  ORDER BY `invoices`.`time_added` ASC  LIMIT {$limit}";
$invoice_results = $db->select($select_query);
$get_parms_arr = array();
foreach ($_GET as $key => $value) 
{
	$get_parms_arr[] = $key.'='.$value;
}
$get_parms = implode('&', $get_parms_arr);
$url = BASEURL."/view_invoices.php?{$get_parms}&";
$pagination = pagination($total,$per_page,$page,$url);
refer('view_invoice', 'active');
refer('pagination',$pagination);
refer('invoice_results',$invoice_results);
if(isset($_GET['print_page'])&&$_GET['print_page']=='yes')
{
	$encoded_bill = json_encode($invoice_results);
	$acno = $_REQUEST['acno'];
	$result_client = get_clients('acno',$acno);
	refer('result',$result_client);
	$client_id = $result_client['id'];
	if(isset($invoice_results[0])&&!empty($invoice_results[0])&&!empty($client_id))
	{
		$start_date = $_REQUEST['start'];
		$end_date = $_REQUEST['end'];
		$select_query = "SELECT id FROM `invoice_bill` WHERE json_bill='".$encoded_bill."' 
		AND start_date='".$start_date."' AND end_date='".$end_date."' AND client_id='{$client_id}'";
		$bill_detail = $db->select($select_query);
		if(isset($bill_detail[0])&&!empty($bill_detail[0]))
		{
			refer("invoice_number",$bill_detail[0]['id']);
		}
		else
		{
			$insert_query = "INSERT INTO `invoice_bill`( `json_bill`, `client_id`, `start_date`, `end_date`) 
			VALUES ('".$encoded_bill."','".$client_id."','".$start_date."','".$end_date."')";
			$insert_id = $db->upsert($insert_query);
			refer("invoice_number",$insert_id);
		}
	}
	global $template;
	$template->show_file(SKIN_LAYOUT."/print_page.html");
}
else
{
	template_files("view_invoices.html");
	show_all_included();
}




?>