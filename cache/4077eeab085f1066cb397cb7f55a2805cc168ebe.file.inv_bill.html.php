<?php /* Smarty version Smarty-3.1.15, created on 2016-03-02 22:21:57
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\inv_bill.html" */ ?>
<?php /*%%SmartyHeaderCode:3258656d75961e8d073-93016763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4077eeab085f1066cb397cb7f55a2805cc168ebe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\inv_bill.html',
      1 => 1456953713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3258656d75961e8d073-93016763',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56d75961eb9d49_90973622',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d75961eb9d49_90973622')) {function content_56d75961eb9d49_90973622($_smarty_tpl) {?><div >
<form action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/inv_bill.php" action="POST">
	<h2>Enter Invoice Bill Number</h2>
	<input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Bill Number e.g 123">
	<button type="submit"  class="btn btn-primary">Submit</button>
</form>

</div><?php }} ?>
