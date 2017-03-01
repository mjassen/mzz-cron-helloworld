
=== mzz-cron-helloworld ===
Contributors: mjjojo
License: GPLv2

== Description ==

<strong>The Purpose of the plugin</strong>
The purpose of the plugin is to show a simple example of a working wp cron job.

<strong>What the Plugin Does</strong>
Upon activating, the plugin sets a cron job that will log a timestamp to the mzzcrondump.txt once per hour.

<strong>How the mzz-cron-helloworld plugin works</strong>
Once the plugin is activated, and the cron job thus has been started, as the native wp-cron functionality is triggered asynchronously as visitors browse the site, the cron job sits and waits. Before the hour is up, the cron job isn't triggered. Then, after an hour has passed, with the next site visit triggering the native wp-cron functionality, the mzz-cron-helloworld's hourly functionality is triggered, thus causing the plugin to log a timestamp and a new line to the mzzcrondump.txt file.

== Installation ==

To install the plugin manually, unzip the plugin and upload the entire "mzz-cron-helloworld" folder into the "wp-content/plugins" directory of your WordPress website. 
Then log into the WordPress dashboard, and under Plugins, click Activate. 

To deactivate and uninstall the plugin, browse to the WordPress dashboard and under Plugins, under the Mzz-cron-helloworld plugin, click Deactivate, then click Delete. 
