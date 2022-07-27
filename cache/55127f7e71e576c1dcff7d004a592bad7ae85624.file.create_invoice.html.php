<?php /* Smarty version Smarty-3.1.15, created on 2016-03-10 17:24:26
         compiled from "C:\xampp\htdocs\hispeed\styles\layout\\create_invoice.html" */ ?>
<?php /*%%SmartyHeaderCode:1987156cb5d39049655-97766212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55127f7e71e576c1dcff7d004a592bad7ae85624' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hispeed\\styles\\layout\\\\create_invoice.html',
      1 => 1457626974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1987156cb5d39049655-97766212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56cb5d3904a7c3_31650519',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cb5d3904a7c3_31650519')) {function content_56cb5d3904a7c3_31650519($_smarty_tpl) {?><button  class="btn btn-success more_row pull-right">Add More Rows</button>
<br>
<form method="POST" id="insert_form">
	<label>Party Account Number</label>
	<input type="text" class="form-control" id="acno" name="acno" placeholder="Account number">
	<br>
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
	      	<tr class="parent">
				<td><input type="text" class="form-control cnno keyup"  name="cnno" placeholder="CNNO"></td>
				<td><input type="date" class="form-control date keyup"  name="date" placeholder="Date"></td>
				<td><input type="text" class="form-control dest keyup"  name="dest" placeholder="Dest"></td>
				<td><input type="text" class="form-control wt keyup"  name="wt" placeholder="KGS"></td>
				<td><input type="text" class="form-control service keyup"  name="service" placeholder="SERVICE"></td>
				<td><input type="text" class="form-control octroi keyup"  name="octroi" placeholder="OCTROI"></td>
				<td><input type="text" class="form-control amount keyup"  name="amount" placeholder="AMOUNT"></td>
	      	</tr>

	    </tbody>
	</table>
</form>
 <button  class="btn btn-primary enter_data pull-right">Enter All Data</button>
 <button  class="btn btn-success more_row ">Add More Rows</button>
<script type="text/javascript">
	
function addrowtable(times)
{
	if(!times)
	{
		times = 1;
	}
	var appnd_var ;
	for (var i = times - 1; i >= 0; i--) 
	{
		var appnd_var = '<tr class="parent"><td><input type="text" class="form-control cnno keyup" name="cnno'+Math.random()+'" placeholder="CNNO"></td><td><input type="date" class="form-control date keyup" name="date'+Math.random()+'" placeholder="Date"></td><td><input type="text" class="form-control dest keyup" name="dest'+Math.random()+'" placeholder="Dest"></td><td><input type="text" class="form-control wt keyup" name="wt'+Math.random()+'" placeholder="KGS"></td><td><input type="text" class="form-control service keyup" name="service'+Math.random()+'" placeholder="SERVICE"></td><td><input type="text" class="form-control octroi keyup" name="octroi'+Math.random()+'" placeholder="OCTROI"></td><td><input type="text" class="form-control amount keyup" name="amount'+Math.random()+'" placeholder="AMOUNT"></td></tr>';
		$(document).find('.tbody').last().append(appnd_var);
	}
}
$(document).ready(function(){
	addrowtable(5);
	$(document).on('click',".more_row",function(){
		addrowtable(5);
	});
	var inputTypes = [];
	var local_rate = 0;
	var sindh_rate = 0;
	var punjab_rate = 0;
	$(document).on('keyup','.keyup',function(e){
		var _this = $(this);
		var acno = $("#acno").val();
		// e.keyCode
		// if(e.keyCode==13||e.keyCode==9&&acno)
		// {
		// 	console.log(e.keyCode);

		// }
		if((e.keyCode==13||e.keyCode==9)&&(_this.hasClass('wt')||_this.hasClass('dest'))&&acno)
		{

			if(local_rate==0||sindh_rate==0||punjab_rate==0)
			{
				$.ajax({
		            url: '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/ajax.php',
		            type: "POST",
		            async:false,
		            data : { mode : 'get_client_details' , acno : acno } ,
		            dataType: "json",
		            beforeSend: function () {

		            },
		            success:function (data) 
		            {
	                    if(data.error)
	                    {
	                        informToUsers(data.msg,'danger');
	                    }
	                    else
	                    {
	                    	local_rate = data.lr;
							sindh_rate = data.sr;
							punjab_rate = data.pr;
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
			}
			var dest = '';
			var wt = 0;
			var amount = 0;
			if($.isNumeric(_this.val())) 
			{
				wt = _this.val();
			}
			else
			{
				dest = _this.val();
			}
			if(!dest)
			{
				dest = _this.parents('.parent').find('.dest').val();
				if(dest)
					dest = dest.toLowerCase();
			}
			//console.log("Pr"+punjab_rate);
			//console.log("Pr"+local_rate);
			//console.log("Pr"+sindh_rate);
			if(!wt||wt==0)
			{
				wt = _this.parents('.parent').find('.wt').val();
			}
			if((dest=='lhr'||dest=='lol'||dest=='fsd'||dest=='grw'||dest=='pew'||dest=='rwp'
				||dest=='isb'||dest=='mux'||dest=='sgd'||dest=='gut'||dest=='swl'||dest=='oka')&&wt)
			{
				amount = punjab_rate*wt;
			}
			else if(wt)
			{
				//console.log(local_rate);
				amount = local_rate*wt;
			}
			if((dest=='khi'||dest=='hyd'||dest=='skz'||dest=='qet'||dest=='mpk')&&wt)
			{
				amount = sindh_rate*wt;
			}
			//console.log(wt);
			//console.log(dest);
	        if(amount)
	        {
	        	_this.parents('.parent').find('.amount').val(amount);
	        }
		} 

	});
	$(document).on('click',".enter_data",function(){
		$.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/ajax.php',
            type: "POST",
            data : $('#insert_form').serialize()+"&mode=insert_invoice" ,
            dataType: "text",
            beforeSend: function () {
                $(".enter_data").attr('disabled',true);

            },
            success:function (data) 
            {
                $(".enter_data").attr('disabled',false);
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
/create_invoice.php";
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

</script><?php }} ?>
