<?php /* Smarty version Smarty-3.1.15, created on 2016-04-30 08:19:38
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\print_page.html" */ ?>
<?php /*%%SmartyHeaderCode:97356d350e8582a68-49887672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54aa05a82ceb15ed6f54b6315537c1b51018bc0b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\print_page.html',
      1 => 1461997105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97356d350e8582a68-49887672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56d350e86060f4_57943955',
  'variables' => 
  array (
    'result' => 0,
    'start_date' => 0,
    'end_date' => 0,
    'invoice_number' => 0,
    'invoice_results' => 0,
    'invoice_result' => 0,
    'total_amount' => 0,
    'cal_gst' => 0,
    'fac' => 0,
    'fac_new' => 0,
    'g_total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d350e86060f4_57943955')) {function content_56d350e86060f4_57943955($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_folder']->value)."/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body>
	<div id="wrapper">
		<!-- <h1 align="center">Hi-SPEED COURIER SERVICE</h1> -->
		<div class="pull-left">
			<h4><strong>Company Name :</strong> <?php echo $_smarty_tpl->tpl_vars['result']->value['cname'];?>
</h4>
			<h5><strong>A/C NO :</strong> <?php echo $_smarty_tpl->tpl_vars['result']->value['acno'];?>
</h5>
			<h5><strong>Start Date : </strong><?php if ($_smarty_tpl->tpl_vars['start_date']->value) {?><?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
<?php } else { ?><?php echo $_GET['start'];?>
<?php }?></h5> 
			<h5><strong>End Date : </strong><?php if ($_smarty_tpl->tpl_vars['end_date']->value) {?><?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
<?php } else { ?><?php echo $_GET['end'];?>
<?php }?></h5>
			<h5><strong>Invoince No. : </strong><?php echo $_smarty_tpl->tpl_vars['invoice_number']->value;?>
</h5>
		</div>
		<div class="pull-right">
			<h4><strong>N.T.N  No.</strong> 1124967-6</h4>		
			<h4><strong>Sale Tax No.</strong> 11-00-9808-002-82</h4>
		</div>
		<table class="table table-striped">
		    <thead>
		      	<tr>
			        <th>C/NNO</th>
			        <th>Date</th>
			        <th>Dest</th>
			        <th>WT/KGS</th>
			        <th>SERVICE</th>
			        <th>OCTROI</th>
			        <th>AMOUNT</th>
				</tr>
		    </thead>
		    <tbody class="tbody">
		    	<?php if (isset($_smarty_tpl->tpl_vars['total_amount'])) {$_smarty_tpl->tpl_vars['total_amount'] = clone $_smarty_tpl->tpl_vars['total_amount'];
$_smarty_tpl->tpl_vars['total_amount']->value = 0; $_smarty_tpl->tpl_vars['total_amount']->nocache = null; $_smarty_tpl->tpl_vars['total_amount']->scope = 0;
} else $_smarty_tpl->tpl_vars['total_amount'] = new Smarty_variable(0, null, 0);?>
		    	<?php  $_smarty_tpl->tpl_vars['invoice_result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice_result']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoice_results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice_result']->key => $_smarty_tpl->tpl_vars['invoice_result']->value) {
$_smarty_tpl->tpl_vars['invoice_result']->_loop = true;
?>
		      	<tr>
					<td class="cnno" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_cnno" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['cnno'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['cnno'];?>
</td>
					<td class="date" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_date" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['date'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['date'];?>
</td>
					<td class="dest" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_dest" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['dest'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['dest'];?>
</td>
					<td class="wt" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_wt" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['wt'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['wt'];?>
</td>
					<td class="service" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_service" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['service'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['service'];?>
</td>
					<td class="octroi" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_octroi" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['octroi'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['octroi'];?>
</td>
					<td class="amount" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_amount" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['amount'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['amount'];?>
</td>
					<?php if (isset($_smarty_tpl->tpl_vars['total_amount'])) {$_smarty_tpl->tpl_vars['total_amount'] = clone $_smarty_tpl->tpl_vars['total_amount'];
$_smarty_tpl->tpl_vars['total_amount']->value = $_smarty_tpl->tpl_vars['total_amount']->value+$_smarty_tpl->tpl_vars['invoice_result']->value['amount']; $_smarty_tpl->tpl_vars['total_amount']->nocache = null; $_smarty_tpl->tpl_vars['total_amount']->scope = 0;
} else $_smarty_tpl->tpl_vars['total_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_amount']->value+$_smarty_tpl->tpl_vars['invoice_result']->value['amount'], null, 0);?>
		      	</tr>
		      	<?php } ?>
		    </tbody>
		</table>
		<div class=" pull-right">
			<strong>Total</strong> : <?php echo number_format($_smarty_tpl->tpl_vars['total_amount']->value,2);?>

			<br>
			<?php if (isset($_smarty_tpl->tpl_vars['cal_gst'])) {$_smarty_tpl->tpl_vars['cal_gst'] = clone $_smarty_tpl->tpl_vars['cal_gst'];
$_smarty_tpl->tpl_vars['cal_gst']->value = ($_smarty_tpl->tpl_vars['result']->value['gst']/100)*$_smarty_tpl->tpl_vars['total_amount']->value; $_smarty_tpl->tpl_vars['cal_gst']->nocache = null; $_smarty_tpl->tpl_vars['cal_gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['cal_gst'] = new Smarty_variable(($_smarty_tpl->tpl_vars['result']->value['gst']/100)*$_smarty_tpl->tpl_vars['total_amount']->value, null, 0);?>
			<strong><?php echo $_smarty_tpl->tpl_vars['result']->value['gst'];?>
% Sales Tax</strong> : <?php echo number_format($_smarty_tpl->tpl_vars['cal_gst']->value,2);?>

			<br>
			<?php if (isset($_smarty_tpl->tpl_vars['fac'])) {$_smarty_tpl->tpl_vars['fac'] = clone $_smarty_tpl->tpl_vars['fac'];
$_smarty_tpl->tpl_vars['fac']->value = $_smarty_tpl->tpl_vars['result']->value['fac']; $_smarty_tpl->tpl_vars['fac']->nocache = null; $_smarty_tpl->tpl_vars['fac']->scope = 0;
} else $_smarty_tpl->tpl_vars['fac'] = new Smarty_variable($_smarty_tpl->tpl_vars['result']->value['fac'], null, 0);?>
			<strong>Fuel Adjust Charges</strong> : <?php echo number_format($_smarty_tpl->tpl_vars['fac']->value,2);?>
%
			<br>
			<?php if (isset($_smarty_tpl->tpl_vars['fac_new'])) {$_smarty_tpl->tpl_vars['fac_new'] = clone $_smarty_tpl->tpl_vars['fac_new'];
$_smarty_tpl->tpl_vars['fac_new']->value = ($_smarty_tpl->tpl_vars['fac']->value/100)*$_smarty_tpl->tpl_vars['total_amount']->value; $_smarty_tpl->tpl_vars['fac_new']->nocache = null; $_smarty_tpl->tpl_vars['fac_new']->scope = 0;
} else $_smarty_tpl->tpl_vars['fac_new'] = new Smarty_variable(($_smarty_tpl->tpl_vars['fac']->value/100)*$_smarty_tpl->tpl_vars['total_amount']->value, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['g_total'])) {$_smarty_tpl->tpl_vars['g_total'] = clone $_smarty_tpl->tpl_vars['g_total'];
$_smarty_tpl->tpl_vars['g_total']->value = $_smarty_tpl->tpl_vars['total_amount']->value+$_smarty_tpl->tpl_vars['cal_gst']->value+$_smarty_tpl->tpl_vars['fac_new']->value; $_smarty_tpl->tpl_vars['g_total']->nocache = null; $_smarty_tpl->tpl_vars['g_total']->scope = 0;
} else $_smarty_tpl->tpl_vars['g_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_amount']->value+$_smarty_tpl->tpl_vars['cal_gst']->value+$_smarty_tpl->tpl_vars['fac_new']->value, null, 0);?>
			<strong>Grand Total</strong> : <?php echo number_format($_smarty_tpl->tpl_vars['g_total']->value,2);?>

		</div>
		<!-- <button class="btn btn-success" onclick="print_page()">Print this page</button> -->
	</div>
</body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_folder']->value)."/js.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript">
	$(document).ready(function(){
		print_page();
	});
</script>

<style type="text/css">
	
</style><?php }} ?>
