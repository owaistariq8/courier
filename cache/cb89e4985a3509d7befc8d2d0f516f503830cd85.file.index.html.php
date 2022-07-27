<?php /* Smarty version Smarty-3.1.15, created on 2016-02-29 19:36:01
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2935356c8c55b9b5825-26126434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb89e4985a3509d7befc8d2d0f516f503830cd85' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\index.html',
      1 => 1456770344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2935356c8c55b9b5825-26126434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56c8c55b9b99b1_30579225',
  'variables' => 
  array (
    'clients' => 0,
    'client' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c8c55b9b99b1_30579225')) {function content_56c8c55b9b99b1_30579225($_smarty_tpl) {?><div >
	<?php if (isset($_smarty_tpl->tpl_vars['clients'])) {$_smarty_tpl->tpl_vars['clients'] = clone $_smarty_tpl->tpl_vars['clients'];
$_smarty_tpl->tpl_vars['clients']->value = get_all_clients(); $_smarty_tpl->tpl_vars['clients']->nocache = null; $_smarty_tpl->tpl_vars['clients']->scope = 0;
} else $_smarty_tpl->tpl_vars['clients'] = new Smarty_variable(get_all_clients(), null, 0);?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Companay Name</th>
				<th>Account number</th>
				<th>Local Rate</th>
				<th>Punjab Rate</th>
				<th>Sindh Rate</th>
				<th>Fuel Adjust Charges</th>
				<th>Actions</th>
				<th>General Sales Tax</th>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['client']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clients']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->_loop = true;
?>
			<tr class="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
">
				<td class="cname" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_cname" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['cname'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['cname'];?>
</td>
				<td class="acno" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_acno" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['acno'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['acno'];?>
</td>
				<td class="lr" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_lr" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['lr'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['lr'];?>
</td>
				<td class="pr" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_pr" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['pr'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['pr'];?>
</td>
				<td class="sr" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_sr" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['sr'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['sr'];?>
</td>
				<td class="fac" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_fac" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['fac'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['fac'];?>
</td>
				<td><!-- Single button -->
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php?acno=<?php echo $_smarty_tpl->tpl_vars['client']->value['acno'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
" class="view_btn" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
" >View Invoices</a></li>
							<li><a href="#" data-toggle="modal" class="edit_btn" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
" data-target="#edit_acc">Edit</a></li>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/index.php?delete_id=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
"  >Delete</a></li>
						</ul>
					</div>
				</td>
				<td class="gst" id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
_gst" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['gst'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['gst'];?>
</td>
			</tr>
		<?php } ?>

		</tbody>
	</table>
</div>
<div id="edit_acc" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create An Party/Client Account</h4>
			</div>
			<div class="modal-body">
				<p>Create Account of the party and set its specific rates</p>
				<form id="edit_acc_form" method="POST">
					<div class="form-group">
						<h3>Account Details</h3>
						<label>Company Name(required)</label>
						<input type="text" class="form-control" name="cname" id="cname_edit">
					</div>
					<div class="form-group">
						<label>Account Number (required)</label>
						<input type="text" class="form-control" name="acno" id="acno_edit">
					</div>
					<div class="form-group">
						<label>Local Rate </label>
						<input type="text" class="form-control"  name="lr" id="lr_edit">
					</div>
					<div class="form-group">
						<label>Punjab Rate </label>
						<input type="text" class="form-control"  name="pr" id="pr_edit">
					</div>
					<div class="form-group">
						<label>Sindh Rate </label>
						<input type="text" class="form-control"  name="sr" id="sr_edit">
					</div>
					<div class="form-group">
						<label>Fuel Adjust Charges </label>
						<input type="text" class="form-control"  name="fac" id="fac_edit">
					</div>
					<div class="form-group">
						<label>General Sales Tax (GST)</label>
						<input type="text" class="form-control"  name="gst" id="gst_edit">
					</div>
					<input type="hidden" value="" name="_id" id="_id"/>
					<button id='edit_acc_btn' class="btn btn-success btn-block">Edit Account</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div id="create_acc" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Create An Party/Client Account</h4>
		</div>
		<div class="modal-body">
			<p>Create Account of the party and set its specific rates</p>
			<form id="create_acount_form" method="POST">
				<div class="form-group">
					<h3>Account Details</h3>
					<label>Company Name(required)</label>
					<input type="text" class="form-control" name="cname" id="cname">
				</div>
				<div class="form-group">
					<label>Account Number (required)</label>
					<input type="text" class="form-control" name="acno" id="acno">
				</div>
				<div class="form-group">
					<label>Local Rate </label>
					<input type="text" class="form-control"  name="lr" id="lr">
				</div>
				<div class="form-group">
					<label>Punjab Rate </label>
					<input type="text" class="form-control"  name="pr" id="pr">
				</div>
				<div class="form-group">
					<label>Sindh Rate </label>
					<input type="text" class="form-control"  name="sr" id="sr">
				</div>
				<div class="form-group">
					<label>Fuel Adjust Charges </label>
					<input type="text" class="form-control"  name="fac" id="fac">
				</div>
				<div class="form-group">
					<label>General Sales Tax (GST)</label>
					<input type="text" class="form-control"  name="gst" id="gst">
				</div>
				<button id='create_account' class="btn btn-success btn-block">Add Account</button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>

<style type="text/css">
	
	.dropdown-menu{
		position:relative !important; 
		z-index:0 !important;
		overflow: hidden;
	}
</style><?php }} ?>
