<?php /* Smarty version Smarty-3.1.15, created on 2016-02-29 19:39:52
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\view_invoices.html" */ ?>
<?php /*%%SmartyHeaderCode:1583456d137a0dadbf4-15534870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed01eef2674a8e4ba1828b91828e7697b4f326f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\view_invoices.html',
      1 => 1456771179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1583456d137a0dadbf4-15534870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56d137a0e1cc30_87708572',
  'variables' => 
  array (
    'baseurl' => 0,
    'invoice_results' => 0,
    'invoice_result' => 0,
    'result' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d137a0e1cc30_87708572')) {function content_56d137a0e1cc30_87708572($_smarty_tpl) {?><div class="bodysearch-holder clearfix">
	<form id="video_search" name="video_search" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php" class="video_search form-horizontal">
		<div class="form-group multiple-form-group search-advance input-group pull-right">
			
			<div class="input-group-btn input-group-select">

				<button type="submit" class="btn btn-default dropdown-toggle glyphicon glyphicon-search"></button>
			</div>
			
			<input name="cnno" value="<?php echo $_GET['cnno'];?>
" placeholder="cnno" type="text" class="form-control" value="">
			<input name="search" type="hidden" class="form-control">
			
			
			<span class="input-group-btn">
				<button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#searchdiv">Advance Search</button>
			</span>
		</div>
	</form>
</div><!-- end of bodysearch-holder -->
	
<?php if ($_smarty_tpl->tpl_vars['invoice_results']->value) {?>
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
	        <th>ACCOUNT NUMBER</th>
	        <th>COMPANY NAMES</th>
	        <th>Action</th>
		</tr>
    </thead>
    <tbody class="tbody">
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
			<td class="acno" id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
_acno" data-id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['acno'];?>
"><?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['acno'];?>
</td>
			<?php if (isset($_smarty_tpl->tpl_vars['result'])) {$_smarty_tpl->tpl_vars['result'] = clone $_smarty_tpl->tpl_vars['result'];
$_smarty_tpl->tpl_vars['result']->value = get_clients('acno',$_smarty_tpl->tpl_vars['invoice_result']->value['acno']); $_smarty_tpl->tpl_vars['result']->nocache = null; $_smarty_tpl->tpl_vars['result']->scope = 0;
} else $_smarty_tpl->tpl_vars['result'] = new Smarty_variable(get_clients('acno',$_smarty_tpl->tpl_vars['invoice_result']->value['acno']), null, 0);?>
			<td><?php echo $_smarty_tpl->tpl_vars['result']->value['cname'];?>
</td>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" class="edit_btn_invoice " id="<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
" data-target="#edit_btn_invoice">Edit</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php?delete_id=<?php echo $_smarty_tpl->tpl_vars['invoice_result']->value['id'];?>
">Delete</a></li>
					</ul>
				</div>
			</td>
      	</tr>
      	<?php } ?>
    </tbody>
</table>
<div>
	<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

</div>
<?php if ($_GET['acno']) {?>
<a class="btn btn-info" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php?print_page=yes&acno=<?php echo $_GET['acno'];?>
&start=<?php echo $_GET['start'];?>
&end=<?php echo $_GET['end'];?>
">Print Page</a>
<?php }?>
<?php } else { ?>
<h2><span class='' >No Entry Found </span></h2>
<?php }?>



<div class="modal fade" id="searchdiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Advance Search</h4>
			</div>
			<!-- form start -->
			<form id="video_search" name="video_search" method="get" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php" class="video_search form-horizontal">
				<div class="modal-body" >
					<div class="form-group">
						<label for="cnno" class="col-sm-4 control-label">Cnno</label>
						<div class="col-sm-8">
							<input name="cnno" type="text" class="form-control" id="cnno" value='<?php echo $_GET['cnno'];?>
'>
						</div>
					</div>	
					<div class="form-group">
						<label for="dest" class="col-sm-4 control-label">Destination</label>
						<div class="col-sm-8">
							<input name="dest" type="text" class="form-control" id="dest" value='<?php echo $_GET['dest'];?>
'>
						</div>
					</div>
					<div class="form-group">
						<label for="acno" class="col-sm-4 control-label">Account Number</label>
						<div class="col-sm-8">
							<input name="acno" type="text" class="form-control" id="acno" value='<?php echo $_GET['acno'];?>
'>
						</div>
					</div>
					<div class="form-group">
						<label for="octroi" class="col-sm-4 control-label">OCTROI</label>
						<div class="col-sm-8">
							<input name="octroi" type="text" class="form-control" id="octroi" value="<?php echo $_GET['octroi'];?>
">
						</div>
					</div>
					<div class="form-group">
				        <span class="col-md-2 control-label"><strong>Date</strong></span>
				        <div class="col-md-8">
				            <div class="form-group row">
				                <label for="start" class="col-md-2 control-label">Start</label>
				                <div class="col-md-4">
				                    <input type="text" class="form-control" value="<?php echo $_GET['start'];?>
" name="start" id="start" placeholder="Date">
				                </div>
				                <label for="end" class="col-md-2 control-label">End</label>
				                <div class="col-md-4">
				                    <input type="text" class="form-control" value="<?php echo $_GET['end'];?>
" name="end" id="end" placeholder="Date">
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="search" id="search" class="btn btn-primary">Search Form</button>
				</div>
			</form>
			<!-- from end -->
		</div>
	</div>
	
</div><!-- end of modal -->


<div id="edit_btn_invoice" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit An Invoice</h4>
			</div>
			<form id="edit_inv_form" method="POST">
				<div class="modal-body" >
					<div class="form-group">
						<label for="cnno" class="col-sm-4 control-label">Cnno</label>
						<div class="col-sm-8">
							<input name="cnno" type="text" class="form-control" id="cnno_edit_invoice" value='<?php echo $_GET['cnno'];?>
'>
						</div>
					</div>	
					<div class="form-group">
						<label for="dest" class="col-sm-4 control-label">Destination</label>
						<div class="col-sm-8">
							<input name="dest" type="text" class="form-control" id="dest_edit_invoice" value='<?php echo $_GET['dest'];?>
'>
						</div>
					</div>
					<div class="form-group">
						<label for="date" class="col-sm-4 control-label">Date</label>
						<div class="col-sm-8">
							<input name="date" type="text" class="form-control" id="date_edit_invoice" value='<?php echo $_GET['date'];?>
'>
						</div>
					</div>
					<div class="form-group">
						<label for="acno" class="col-sm-4 control-label">Account Number</label>
						<div class="col-sm-8">
							<input name="acno" type="text" class="form-control" id="acno_edit_invoice" value='<?php echo $_GET['acno'];?>
'>
						</div>
					</div>
					<div class="form-group">
						<label for="octroi" class="col-sm-4 control-label">OCTROI</label>
						<div class="col-sm-8">
							<input name="octroi" type="text" class="form-control" id="octroi_edit_invoice" value="<?php echo $_GET['octroi'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label for="service" class="col-sm-4 control-label">Service</label>
						<div class="col-sm-8">
							<input name="service" type="text" class="form-control" id="service_edit_invoice" value="<?php echo $_GET['service'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label for="amount" class="col-sm-4 control-label">Amount</label>
						<div class="col-sm-8">
							<input name="amount" type="text" class="form-control" id="amount_edit_invoice" value="<?php echo $_GET['amount'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label for="wt" class="col-sm-4 control-label">Weight</label>
						<div class="col-sm-8">
							<input name="wt" type="text" class="form-control" id="wt_edit_invoice" value="<?php echo $_GET['wt'];?>
">
						</div>
					</div>
					<input type="hidden" name="id_edit_invoice" id="id_edit_invoice" value="" />
					<button id='edit_invoice_btn' class="btn btn-success btn-block">Edit Invoice</button>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div><?php }} ?>
