<?php


$db = new beatsaudio_db();

if(empty($write_user))
{
    $write_user = 'root';
}

if(empty($read_user))
{
    $read_user = 'root';
}

if(empty($write_pass))
{
    $write_pass = '';
}
if(empty($read_pass))
{
    $read_pass = '';
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
	$environment = $local;
}
else
{
	$environment = $live;
}
$db->connection($environment);

?>