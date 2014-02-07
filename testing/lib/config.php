<?php

/*
================================================================================

   The following array controls which tables are dumped from the
   database.  For each table, you need to specify a datetime key, for
   example 'date_for_shop' for the table 'aixada_cart'.  Only the
   entries of the table whose key value lies within the time interval
   specified by the user will be dumped, along with all the entries in
   other tables pointed to by foreign keys.

*/

$table_key_pairs = array(
			 ['aixada_cart', 'date_for_shop'],
			 ['aixada_order_item', 'date_for_order'],
			 //['aixada_shop_item', ''], // can't do this, no timestamp!
			 ['aixada_account', 'ts'],
			 ['aixada_incident', 'ts'],
			 ['aixada_stock_movement', 'ts'],
			 );
/*
=================================================================================
*/


$tmpdump = '/tmp/testdump.sql';
$logpath = 'testing/dumps+logs/';
$utilpath = 'testing/lib/';
$dumppath = 'testing/dumps+logs/';
$testrunpath = 'testing/runs/';
$testlogfilename = 'test.log';
$testloghandle = 0;
$db_log = 'local_config/aixada.log';
$dump_db_name = 'aixada_dump';
$db_name = 'aixada';
$query_dump_dir = 'testing/dumps+logs/';
$reference_dump_dir = $testrunpath . 'reference_dumps/';
$init_db_script = '/tmp/init_test.sql';
$db_definition = 'sql/aixada.sql';
$all_queries_file = 'sql/setup/aixada_queries_all.sql';

// neutralize timestamps
$sed = "sed 's/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9] [0-9][0-9]:[0-9][0-9]:[0-9][0-9]/timestamp/g' ";

$dateformat = '0000-00-00@00:00';

$debug = false;
$dry_run = false;

function do_exec($arg) {
    global $debug, $dry_run;
    if ($dry_run)
	echo "simulating $arg\n";
    else {
	if ($debug) echo "executing $arg\n";
	return exec($arg);
    }
}
?>