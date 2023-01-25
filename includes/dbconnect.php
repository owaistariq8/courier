<?php


$db = new beatsaudio_db();

if(empty($write_user))
{
    $write_user = 'hispeed';
}

if(empty($read_user))
{
    $read_user = 'hispeed';
}

if(empty($write_pass))
{
    $write_pass = 's#@^9hI0wiD2';
}
if(empty($read_pass))
{
    $read_pass = 's#@^9hI0wiD2';
}

$local = array(
	'write' => array(
            'host' => '127.0.0.1',
            'db' => WRITE_DBNAME,
            'user' => $write_user,
            'pass' => $write_pass
    ),
    'read' => array(
            'host' => '127.0.0.1',
            'db' => READ_DBNAME,
            'user' => $read_user,
            'pass' => $read_pass
    ),
);

$live = array(
	'write' => array(
            'host' => '127.0.0.1',
            'db' => WRITE_DBNAME,
            'user' => 'root',
            'pass' => ''
    ),
    'read' => array(
            'host' => '127.0.0.1',
            'db' => READ_DBNAME,
            'user' => 'root',
            'pass' => ''
    ),
);
if(CODE_MODE)
{
}
else
{
	$environment = $live;
}
	$environment = $local;
$db->connection($environment);

?>