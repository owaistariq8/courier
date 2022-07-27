<?php /* Smarty version Smarty-3.1.15, created on 2016-02-28 21:00:26
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\\header.html" */ ?>
<?php /*%%SmartyHeaderCode:993456d351da1fd881-35697633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8405e54478cc11ba106657758a1ca0d72b9f9a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\\\header.html',
      1 => 1456079553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '993456d351da1fd881-35697633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56d351da2e0587_58672429',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d351da2e0587_58672429')) {function content_56d351da2e0587_58672429($_smarty_tpl) {?>
<header id="header" class="clearfix">
	<div class="logo-holder pull-left btn-danger">
		<h1 class="logo">
			<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/index.php">
				<i class="icon-home"></i>
				<span class="logo-text">Hi Speed</span>
			</a>
		</h1>
	</div>
	<a href="#" class="search-icon visible-xs hidden-lg hidden-sm hidden-md">
		<i class="fa fa-search"></i>
	</a>
	<div class="search-holder pull-left hidden-xs">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="fa fa-search"></i>
				</button>
			</span>
			<input type="text" class="form-control" placeholder="Search for...">
		</div><!-- /input-group -->
    </div>
	<div class="cart-holder pull-right hidden-xs">
		<br>
    	<a type="button" class="btn btn-info" data-toggle="modal" data-target="#create_acc">Create Client/Party account</a>
	</div>
	<div class="mobHeadContent"></div>
</header><!-- header -->

<?php }} ?>
