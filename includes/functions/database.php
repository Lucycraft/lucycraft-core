<?php
/**
 *  LUCYCRAFT CORE - database.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 *
 * Discription:
 * TODO description
 *
 * @param $server server IP adress
 * @param $username Username
 * @param $password Password
 * @param $database Database name
 * @param string $link
 * @return resource
 */
    function lucy_db_connect($server = DB_SERVER, $username = DB_USERNAME, $password = DB_PASSWORD, $database = DB_NAME, $link = 'db_link') {
        global $$link;

        if (USE_PERSISTENT == 'true') {
            $$link = mysql_pconnect($server, $username, $password);
        } else {
            $$link = mysql_connect($server, $username, $password);
        }

        if ($$link) {
            lucy_db_select($database, $$link);
        } else {

        }

        mysql_set_charset('utf8', $$link);

        return $$link;
    }

    function lucy_db_close($link) {
        global $$link;

        return mysql_close($$link);
    }

    function lucy_db_select($database, $link = 'db_link') {
        global $$link;

        if (mysql_select_db($database, $$link)) {

            return true;
        } else {

            lucy_db_error('Selection of the database failed.');
            return false;
        }
    }

    function lucy_db_query($query, $link = 'db_link') {
        global $$link;

        $result = mysql_query($query, $$link) or lucy_db_error($query);


        return $result;
    }

    function lucy_db_fetch_array ($resource, $link = 'db_link') {

        return mysql_fetch_array($resource);
    }

    function lucy_db_find_data($resource, $data) {

        return mysql_data_seek($resource, $data);
    }

    function lucy_db_num_rows ($resource) {
        return mysql_num_rows($resource);
    }

    function lucy_db_insert_id($link = 'db_link') {
        global $$link;

        return mysql_insert_id($$link);
    }

    function lucy_db_free_result($db_query) {
        return mysql_free_result($db_query);
    }

    function lucy_db_fetch_fields($db_query) {
        return mysql_fetch_field($db_query);
    }

    function lucy_db_error ($query) {

        echo 'Auwtch. Something just went wrong.<br />';
        echo 'Lucy says it happened here: ' . $query;
        die (mysql_errno() . mysqli_error());
    }

    function lucy_db_clean($dirtydata, $fromMySQL = 'false') {
        $cleandata = '';

        if (!$fromMySQL) {

            // Do stuff.

            return $cleandata;
        } else {

            return $cleandata;
        }
    }

    // Lucyforum functions.


    // General Plugin Database Functions

    function lucy_installed_plugins () {

        $plugins = array();

        $query = 'SELECT plugin_name FROM plugins WHERE activated = 1';
        $resource = lucy_db_query($query);

        while (($row = lucy_db_fetch_array($resource))) {

            $plugins[] = $row['plugin_name'];
        }

        return $plugins;
    }

?>