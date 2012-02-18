<?php
/**
 *  LUCYCRAFT CORE - seo.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 */

require_once('../functions/database.php');

/**
 * Discription:
 * Checks if we know the url
 *
 * @param $url - The input url
 * @return bool - If the url is known
 */
function knownPage($url) {

    $known = false;

    $request = lucy_db_clean($url);

    $sql = "SELECT * FROM seo_urls WHERE url = " . $url;
    $query = lucy_db_query($sql);


    return $known;
}