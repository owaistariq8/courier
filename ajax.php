<?php
require_once( __DIR__."/includes/common.php");
if(isset($_REQUEST['mode']))
{

	$mode = $_REQUEST['mode'];
}
else
{
	$mode = '';	
}

switch ($mode) 
{
	case 'create_account':
	{
		if(isset($_POST['acno'])&&is_numeric($_POST['acno'])&&$_POST['acno']!=0)
		{
			$company_name = isset_check('cname');
			$acount_number = isset_check('acno');
			$local_rate = isset_check('lr');
			$sindh_rate = isset_check('sr');
			$punjab_rate = isset_check('pr');
			$fuel_adjust_charge = isset_check('fac');
			$gst = isset_check('gst');
			if(empty($local_rate))
			{
				$local_rate = 0;
			}
			if(empty($sindh_rate))
			{
				$sindh_rate = 0;
			}
			if(empty($punjab_rate))
			{
				$punjab_rate = 0;
			}
			if(empty($fuel_adjust_charge))
			{
				$fuel_adjust_charge = 0;
			}
			if(empty($gst))
			{
				$gst = 0;
			}
			if(empty($company_name))
			{
				echo json_encode(array('error'=>'yes','msg'=>'Company Name  can not be empty.'));			
			}
			else
			{
				global $db;
				$select_query = "SELECT * FROM `clients` WHERE acno='".$acount_number."'";
				$select_results = $db->select($select_query);
				if(empty($select_results[0]))
				{
					$array = array('cname','acno','lr','sr','pr','fac','gst');
					unset($_POST['mode']);
					$time = time();
					$insert_query = "INSERT INTO `clients`( `cname`, `acno`, `lr`, `pr`, `sr`, `fac`, `gst`, `time_added`, `date_added`, `date_updated`) 
					VALUES ('{$company_name}','{$acount_number}',{$local_rate},{$sindh_rate},{$punjab_rate},{$fuel_adjust_charge},{$gst},{$time},'".NOW()."','".NOW()."')";
					$db->upsert($insert_query);
					echo json_encode($_POST);
				}
				else
				{
					echo json_encode(array('error'=>'yes','msg'=>'Account Number already exists'));			
				}
			}
		}
		else
		{
			echo json_encode(array('error'=>'yes','msg'=>'Account Number can not be empty.'));
		}
	}
	break;
	
	case 'edit_account':
	{
		if(isset($_POST['acno'])&&is_numeric($_POST['acno'])&&$_POST['acno']!=0)
		{
			$company_name = isset_check('cname');
			$id = isset_check('_id');
			$account_number = isset_check('acno');
			$local_rate = isset_check('lr');
			$sindh_rate = isset_check('sr');
			$punjab_rate = isset_check('pr');
			$fuel_adjust_charge = isset_check('fac');
			$gst = isset_check('gst');
			if(empty($local_rate))
			{
				$local_rate = 0;
			}
			if(empty($sindh_rate))
			{
				$sindh_rate = 0;
			}
			if(empty($punjab_rate))
			{
				$punjab_rate = 0;
			}
			if(empty($fuel_adjust_charge))
			{
				$fuel_adjust_charge = 0;
			}
			if(empty($gst))
			{
				$gst = 0;
			}
			if(empty($company_name))
			{
				echo json_encode(array('error'=>'yes','msg'=>'Company Name  can not be empty.'));			
			}
			else
			{
				global $db;
				$select_query = "SELECT * FROM `clients` WHERE id='".$id."'";
				$select_results = $db->select($select_query);
				if(!empty($select_results[0]))
				{
					$array = array('cname','acno','lr','sr','pr','fac','gst');
					unset($_POST['mode']);
					$time = time();
					$udpate_query = "UPDATE `clients` SET `cname`='{$company_name}' , `acno`='{$account_number}',
					`lr`='{$local_rate}' , `pr`='{$punjab_rate}', `sr`='{$sindh_rate}', `fac`='{$fuel_adjust_charge}',
					 `gst`={$gst}, date_updated='".NOW()."' WHERE id={$id}";
					$db->upsert($udpate_query);
					if($select_results[0]['acno']!=$acount_number)
					{
						$old_acno = $select_results[0]['acno'];
						$update_invoice_query = "UPDATE invoices SET acno='{$account_number}' WHERE acno='".$old_acno."'";
						$db->upsert($update_invoice_query);
					}
					echo json_encode($_POST);
				}
				else
				{
					echo json_encode(array('error'=>'yes','msg'=>'No Account found!'));			
				}
			}
		}
		else
		{
			echo json_encode(array('error'=>'yes','msg'=>'Account Number can not be empty.'));
		}
	}
	break;
	case 'insert_invoice':
	{
		global $db;
		unset($_POST['mode']);
		$account_number = $_POST['acno'];
		if(empty($account_number))
		{
			echo json_encode(array('error'=>'yes',"Please enter Account !"));
			exit();
		}
		unset($_POST['acno']);
		$index_arr = array('cnno','date','dest','wt','service','octroi','amount','acno');
		$array = array_chunk($_POST, 7);
		$new_array = array();
		foreach ($array as $key => $value) 
		{
			foreach ($value as $key_1=> $value_1) 
			{
				$new_array[$key][$index_arr[$key_1]] = $value_1;
			}
		}
	 	$index_arr[] = 'time_added';
	 	$index_arr[] = 'date_added';
	 	$index_arr[] = 'date_updated';

		$query_f = implode(',', $index_arr);
		if(is_array($new_array)&&!empty($new_array))
		{
			foreach ($new_array as $key => $value) 
			{
				$query_val = array();
				$empty_check = 0;
				if(!empty($value['cnno']))
				{
					foreach ($value as $key_1 => $value_1) 
					{
						$query_val[] = "'".$value_1."'";
						
					}
					$query_val[] = $account_number;
					// pre($value['date'],true);
					$query_val[] = strtotime($value['date']);
					$query_val[] = "'".NOW()."'";
					$query_val[] = "'".NOW()."'";
					if(!$empty_check)
					{
						$query_v = implode(",", $query_val);
						$insert_query = "INSERT INTO `invoices`({$query_f}) VALUES ({$query_v})";
						$db->upsert($insert_query);
						$_POST['success'] = 'yes';
						echo json_encode($_POST);
					}
					else
					{
						// echo json_encode(array('error'=>'yes'))
					}
				}
			}
		}
		else
		{
			echo json_encode(array('error'=>'yes'));
		}
	}
	break;

	case 'edit_invoice':
	{
		global $db;
		unset($_POST['mode']);
		$id = isset_check('id_edit_invoice');
		if(empty($id))
		{
			echo json_encode(array('error'=>'yes',"Please enter id !"));
			exit();
		}
		unset($_POST['id']);
		$cnno = isset_check('cnno');
		$acno = isset_check('acno');
		$dest = isset_check('dest');
		$date = isset_check('date');
		$time = strtotime($date);
		$octroi = isset_check('octroi');
		$service = isset_check('service');
		$amount = isset_check('amount');
		$wt = isset_check('wt');
		$select_query = "SELECT * FROM `invoices` WHERE id='".$id."'";
		$select_results = $db->select($select_query);
		if(!empty($select_results[0]))
		{
			$udpate_query = "UPDATE `invoices` SET `cnno`='{$cnno}' , `acno`='{$acno}',`dest`='{$dest}' ,
			 `octroi`='{$octroi}', `service`='{$service}', `amount`='{$amount}',
			 `wt`={$wt},date='{$date}',time_added ={$time}, date_updated='".NOW()."' WHERE id={$id}";
			$db->upsert($udpate_query);
			echo json_encode($_POST);
		}
		else
		{
			echo json_encode(array('error'=>'yes','msg'=>'Record not found'));
		}
	}
	break;

	case 'get_client_details':
	{
		global $db;
		unset($_POST['mode']);
		$acno = isset_check('acno');
		if(empty($acno))
		{
			echo json_encode(array('error'=>'yes',"Please enter account Number !"));
			exit();
		}
		$select_query = "SELECT * FROM `clients` WHERE acno='".$acno."'";
		$select_results = $db->select($select_query);
		if(!empty($select_results[0]))
		{
			
			echo json_encode($select_results[0]);
		}
		else
		{
			echo json_encode(array('error'=>'yes','msg'=>'Record not found'));
		}
	}
	break;

	default:
	{
		echo json_encode(array('error'=>'yes','msg'=>'Invalid mode'));
		exit();	
	}
	break;
}




?>