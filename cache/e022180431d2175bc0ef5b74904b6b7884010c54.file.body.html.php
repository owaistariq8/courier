<?php /* Smarty version Smarty-3.1.15, created on 2016-02-28 21:00:26
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\\body.html" */ ?>
<?php /*%%SmartyHeaderCode:2555256d351da129352-97491486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e022180431d2175bc0ef5b74904b6b7884010c54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\\\body.html',
      1 => 1456689440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2555256d351da129352-97491486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'baseurl' => 0,
    'create_invoice' => 0,
    'view_invoice' => 0,
    'template_files' => 0,
    'template_file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56d351da1bb545_14829616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d351da1bb545_14829616')) {function content_56d351da1bb545_14829616($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_folder']->value)."/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<body>
		<div id="wrapper">
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_folder']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


			<div class="content-holder container clearfix">
				<div class="page-content clearfix">
					<div  class="alert alert-ajax hidden ajax-response">
					    <div id="ajax-response-message"></div>
					</div>
					<h3>Hi Speed menu</h3>
					<ul class="nav nav-pills">
						<li class="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/index.php">Home</a></li>
						<li class="<?php echo $_smarty_tpl->tpl_vars['create_invoice']->value;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/create_invoice.php">Create invoice</a></li>
						<li class="<?php echo $_smarty_tpl->tpl_vars['view_invoice']->value;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php">View All Invoices</a></li>
						<li class=""><a href="#">Menu 3</a></li>
					</ul>
					<br>
					<?php  $_smarty_tpl->tpl_vars['template_file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template_file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['template_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['template_file']->key => $_smarty_tpl->tpl_vars['template_file']->value) {
$_smarty_tpl->tpl_vars['template_file']->_loop = true;
?>
						<?php echo show_template($_smarty_tpl->tpl_vars['template_file']->value);?>

					<?php } ?>
				</div>
				
			</div><!-- content-holder -->
		</div><!-- wrapper -->
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_folder']->value)."/js.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- Modal -->
		
	</body>
</html><?php }} ?>
