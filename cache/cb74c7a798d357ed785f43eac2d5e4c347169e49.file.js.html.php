<?php /* Smarty version Smarty-3.1.15, created on 2016-02-29 19:48:20
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\js.html" */ ?>
<?php /*%%SmartyHeaderCode:4656c8c59b0f6460-20134464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb74c7a798d357ed785f43eac2d5e4c347169e49' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\js.html',
      1 => 1456771380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4656c8c59b0f6460-20134464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56c8c59b15e955_42187752',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c8c59b15e955_42187752')) {function content_56c8c59b15e955_42187752($_smarty_tpl) {?>
<script type="text/javascript">
    var informToUserstimeout;
    //This function use to show messags on front End
    function informToUsers(message,css_cls,hold) {
        console.log(message);
        if(hold==undefined)
            var hold = '.ajax-response';
        if(css_cls==undefined)
            var css_cls = 'danger';
        if(message==undefined)
            var message = 'Sorry! Somethings went wrong.';

        var _CONTAINER = $(hold);
        _CONTAINER.removeClass(' alert alert-success alert-danger hidden');
        _CONTAINER.addClass("alert alert-"+css_cls+" animated fadeInUp").find('#ajax-response-message').html(message);
        clearTimeout(informToUserstimeout);
        informToUserstimeout = setTimeout(function(){      
            _CONTAINER.addClass('hidden');
        }, 10000);
    }
    function print_page() 
    {
        window.print();
    }
	$(document).ready(function(){
        $(".edit_btn").on("click",function(e){
            var _this = $(this);
            var id = _this.attr("id");
            var cname = $("#"+id+"_cname").attr('data-id');
            console.log(cname);
            var acno = $("#"+id+"_acno").attr('data-id');
            var lr = $("#"+id+"_lr").attr('data-id');
            var pr = $("#"+id+"_pr").attr('data-id');
            var sr = $("#"+id+"_sr").attr('data-id');
            var fac = $("#"+id+"_fac").attr('data-id');
            var gst = $("#"+id+"_gst").attr('data-id');
            $("#cname_edit").val(cname);
            $("#acno_edit").val(acno);
            $("#lr_edit").val(lr);
            $("#pr_edit").val(pr);
            $("#sr_edit").val(sr);
            $("#fac_edit").val(fac);
            $("#gst_edit").val(gst);
            $("#_id").val(id);
        });
        $(".edit_btn_invoice").on("click",function(e){
            var _this = $(this);
            var id = _this.attr("id");
            var cnno = $("#"+id+"_cnno").attr('data-id');
            var date = $("#"+id+"_date").attr('data-id');
            var dest = $("#"+id+"_dest").attr('data-id');
            var wt = $("#"+id+"_wt").attr('data-id');
            var service = $("#"+id+"_service").attr('data-id');
            var octroi = $("#"+id+"_octroi").attr('data-id');
            var amount = $("#"+id+"_amount").attr('data-id');
            var acno = $("#"+id+"_acno").attr('data-id');
            $("#cnno_edit_invoice").val(cnno);
            $("#acno_edit_invoice").val(acno);
            $("#dest_edit_invoice").val(dest);
            $("#date_edit_invoice").val(date);
            $("#wt_edit_invoice").val(wt);
            $("#service_edit_invoice").val(service);
            $("#octroi_edit_invoice").val(octroi);
            $("#amount_edit_invoice").val(amount);
            $("#id_edit_invoice").val(id);
        });
        $('#create_account').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/ajax.php',
                type: "POST",
                data : $('#create_acount_form').serialize()+"&mode=create_account" ,
                dataType: "text",
                beforeSend: function () {
                    $("#create_account").html("Please wait");

                },
                success:function (data) 
                {
                    $("#create_account").html("Add Account");
                    if(data)
                    {
                        data = jQuery.parseJSON(data);
                        if(data.error)
                        {
                            informToUsers(data.msg,'danger');
                        }
                    }
                },
                error:function(data)
                {
                    informToUsers(data,'danger');
                },
                complete:function (data) 
                {
                  
                } 

            });
        });
        $('#edit_invoice_btn').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/ajax.php',
                type: "POST",
                data : $('#edit_inv_form').serialize()+"&mode=edit_invoice" ,
                dataType: "text",
                beforeSend: function () {
                    $("#edit_invoice_btn").html("Please wait");

                },
                success:function (data) 
                {
                    $("#edit_invoice_btn").html("Edit Invoice");
                    if(data)
                    {
                        data = jQuery.parseJSON(data);
                        if(data.error)
                        {
                            informToUsers(data.msg,'danger');
                        }
                        else
                        {
                            window.location.href = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/view_invoices.php';
                        }
                    }
                },
                error:function(data)
                {
                    informToUsers(data,'danger');
                },
                complete:function (data) 
                {
                  
                } 

            });
        });
        $(document).on('click','#edit_acc_btn',function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/ajax.php',
                type: "POST",
                data : $('#edit_acc_form').serialize()+"&mode=edit_account" ,
                dataType: "text",
                beforeSend: function () {
                    $("#edit_acc_btn").html("Please wait");

                },
                success:function (data) 
                {
                    $("#edit_acc_btn").html("Edit Account");
                    if(data)
                    {
                        data = jQuery.parseJSON(data);
                        if(data.error)
                        {
                            informToUsers(data.msg,'danger');
                        }
                        else
                        {
                            window.location.href = "<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
"
                        }
                    }
                },
                error:function(data)
                {
                    informToUsers(data,'danger');
                },
                complete:function (data) 
                {
                  
                } 

            });
        });
    });
</script>
<?php }} ?>
