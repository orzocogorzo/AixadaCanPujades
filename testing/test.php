<?php

require_once('testing/lib/config.php');
require_once('testing/lib/usage.php');
require_once('gnu/getopt/Getopt.php');
require_once('gnu/getopt/Longopt.php');

if (sizeof($argv) < 2) {
    echo $usage_str;
    exit();
}

if ($argv[1] != 'init') {
    require_once 'lib/dump_manager.php';
    try {
	$dump_db = DBWrap::get_instance($dump_db_name,
					false,
					'mysql',
					'localhost',
					'dumper',
					'dumper');
    } catch (InternalException $e) {
	echo "caught exception $e\n\n";
	echo "It appears that you haven't yet created a mysql user for testing the database.\n";
	echo "Please run \"{$argv[0]} init\" now to do this.\n\n";
	exit();
    }
}

$logfile = ''; // for later use

require_once 'lib/util.php';

$getopt = new Getopt($argv, 'n');
$getopt->setOpterr(false);
while (($c = $getopt->getopts()) != -1) {
    if ($c == 'n') {
	echo "Debug mode activated.\n";
	$debug = true;
    }
}


switch ($argv[1]) {
case 'init':
    require('testing/lib/init.php');
    break;

case 'dump':
    require('testing/lib/dump.php');
    break;

case 'log':
    require('testing/lib/log.php');
    break;

case 'test':
    require('testing/lib/test.php');
    break;

default:
    echo $usage_str;
    exit();
}


?>