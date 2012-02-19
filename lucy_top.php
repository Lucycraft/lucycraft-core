<?php
/**
 *  LUCYCRAFT CORE - lucy_top.php
 *  http://www.lucycraft.be
 *
 *  This files handles ALL the includes, and ALL the defines.
 *  You need this almost everywhere for full access to all the
 *  functionality Lucy has to offer.
 *
 *  Written by Boris Wintein & Glenn Latomme.
 */

$whereami = getcwd();

if (!file_exists ($whereami . '/includes/config.php')) {

    echo "<h1>Wait a minute, wait a minute! I am not installed yet!</h1><br />";
    echo "<p>Please, install me first. You can do this by surfing to the /scripts/install.php file</p><br />";
    echo "<p>Before you do, however, make sure that the includes folder is writable!</p>";
    exit();
}


    require ('includes/config.php');

    include ('includes/functions/database.php');
    include ('includes/functions/general.php');
    include ('includes/functions/users.php');

    lucy_db_connect();

    // Check if there is an economy plugin installed.

    $query = "SELECT plugin_name, plugin_folder FROM plugins WHERE plugin_type = economy";
    $resource = lucy_db_query($query);
    $economy = lucy_db_num_rows($resource);

    if ($economy) {

        include ('includes/functions/plugins/ecodatabase.php');
    }

    // Checks for plugins like jobs mcMMO etc.
    $query = "SELECT plugin_name, plugin_folder FROM plugins WHERE plugin_type = jobs";
    $resource = lucy_db_query($query);
    $jobs = lucy_db_num_rows($resource);

    if ($jobs) {

        include ('includes/functions/plugins/jobsdatabase.php');
    }

    // Check for plugins like towny, factions, ...
    $query = "SELECT plugin_name, plugin_folder FROM plugins WHERE plugin_type = nations";
    $resource = lucy_db_query($query);
    $nations = lucy_db_num_rows($resource);

    if ($nations) {

        include ('includes/functions/plugins/nationsdatabase.php');
    }