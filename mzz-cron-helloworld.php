 <?php
 /*
Plugin Name: mzz-cron-helloworld
Description: A hello world plugin showcasing WordPress cron functionality
License: GPLv2
*/


//This WordPress plugin showcases WordPress cron functionality by adding a cron job so that once per hour a timestamp will be written to a file. This assumes there is traffic coming to the site at least once per hour -- often enough so the cron job will run! Also

//if it's not already scheduled, then go ahead and schedule the next one
if ( ! wp_next_scheduled( 'mzz_cronhelloworld_task_hook' ) ) {
  wp_schedule_event( time(), 'hourly', 'mzz_cronhelloworld_task_hook' );
}

//specify what function will run when the scheduled task fires
add_action( 'mzz_cronhelloworld_task_hook', 'mzz_cronhelloworld' );


//define what the function does
function mzz_cronhelloworld() {

	// open the mzzcrondump.txt file for writing
	$mzzCronDumpFile = fopen(plugin_dir_path( __FILE__ ) ."mzzcrondump.txt", "a") or die("Error 002:Unable to open file!"); 

	// write timestamp to the file followed by a newline
	fwrite($mzzCronDumpFile, date("Y-m-d H:i:s") . "\r\n");

	// close the file
	fclose($mzzCronDumpFile);
}






//even though this is only a hello world plugin, let's clean up after ourselves and make sure we remove the cron job upon plugin deactivation
register_deactivation_hook( __FILE__, 'mzz_cronhelloworld_deactivate' );
 
function mzz_cronhelloworld_deactivate() {
   $timestamp = wp_next_scheduled( 'mzz_cronhelloworld_task_hook' );
   wp_unschedule_event( $timestamp, 'mzz_cronhelloworld_task_hook' );
}



?> 