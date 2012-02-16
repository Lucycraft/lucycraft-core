<?php
/**
 *  LUCYCRAFT CORE - database.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 */


/**
 * This function prepares $data for database input.
 *
 * @param $data
 * @return mixed
 */
function prepareInput($data) {


    return $data;
}


/**
 * Inverse of prepareInput, this undoes what happened in prepareInput so
 * that $data can be used.
 *
 * @param $data
 * @return mixed
 */
function cleanOutput($data) {


    return $data;
}

function lc_db_query($sql) {

    return mysql_query($sql);
}

function lc_db_array($query) {

    return mysql_fetch_array($query);
}


function connectDB() {



}

?>