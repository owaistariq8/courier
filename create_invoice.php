<?php

require_once( __DIR__."/includes/common.php");
define("PAGE_NAME", "create_invoice");

refer('create_invoice', 'active');
template_files("create_invoice.html");
show_all_included();



?>