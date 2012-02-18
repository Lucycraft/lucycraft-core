<?php
/**
 *  LUCYCRAFT CORE - database.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 *
 * Discription:
 * @TODO description
 *
 * @param $server - server IP adress
 * @param $username  - Username
 * @param $password - Password
 * @param $database - Database name
 * @param string $link - Database link
 * @return resource - Return Database link
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

/**
 * @param $link - DB link
 * @return bool - If close was succesfull
 */
function lucy_db_close($link) {
        global $$link;

        return mysql_close($$link);
    }

/**
 * @param $database - What datbase to select
 * @param string $link - Database link
 * @return bool - If selection was succesfull
 */
function lucy_db_select($database, $link = 'db_link') {
        global $$link;

        if (mysql_select_db($database, $$link)) {

            return true;
        } else {

            lucy_db_error('Selection of the database failed.');
            return false;
        }
    }

/**
 * @param $query - The input querry
 * @param string $link - Database link
 * @return resource - The result
 */
function lucy_db_query($query, $link = 'db_link') {
        global $$link;

        $result = mysql_query($query, $$link) or lucy_db_error($query);


        return $result;
    }

/**
 * @param $resource - @TODO What is this?
 * @param string $link - Database link
 * @return array - Output array
 */
function lucy_db_fetch_array ($resource, $link = 'db_link') {

        return mysql_fetch_array($resource);
    }

/**
 * @param $resource - @TODO What is this?
 * @param $data - The data to look for
 * @return bool - If find was succesfull
 */
function lucy_db_find_data($resource, $data) {

        return mysql_data_seek($resource, $data);
    }

/**
 * @param $resource - @TODO What is this?
 * @return int - Number of rows
 */
function lucy_db_num_rows ($resource) {
        return mysql_num_rows($resource);
    }

/**
 * @param string $link - Database link
 * @return int - @TODO What is this?
 */
function lucy_db_insert_id($link = 'db_link') {
        global $$link;

        return mysql_insert_id($$link);
    }

/**
 * @param $db_query - The query
 * @return bool - if the free_result was succesfull or not
 */
function lucy_db_free_result($db_query) {
        return mysql_free_result($db_query);
    }

/**
 * @param $db_query - The query
 * @return object - @TODO What is this?
 */
function lucy_db_fetch_fields($db_query) {
        return mysql_fetch_field($db_query);
    }

/**
 * @param $query - The error query
 */
function lucy_db_error ($query) {

        echo 'Auwtch. Something just went wrong.<br />';
        echo 'Lucy says it happened here: ' . $query;
        die (mysql_errno() . mysqli_error());
    }

/**
 * @param $dirtydata - @TODO What is this?
 * @param string $fromMySQL - If the command is triggerd from mysql.
 * @return string - Output of the cleandata
 */
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

/**
 * @return array - Lists the installed plugins
 */
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