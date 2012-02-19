<?php
/**
 *  LUCYCRAFT CORE - general.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 */

    function lucy_mc_plugins () {

        if (is_dir(LUCY_MC_FOLDER)) {


        } else {
            lucy_error("I can't find where you installed Minecraft!");
        }
    }


/**
 * @param $lucysays - The error
 */
function lucy_error($lucysays) {

        echo 'Auwtch. Something just went wrong.<br />';
        echo 'Lucy says: ' . $lucysays;
        die ('LUCY STOPPED');
    }

    function Translate($text) {
        global $languages_id;

        $query = 'SELECT `translation`, `pages`, `count` from `translation` where `text` = "' . $text . '" and language_id = "' . (int)$languages_id . '"';
        $resource = lucy_db_query($query);
        $translation = lucy_db_fetch_array($resource);
        if (lucy_db_num_rows($resource) > 0) {

            return $translation['translation'];

        } else {
            // The text is not found in the supplied language. This is the fallback clause.
            // Check whether the standard text has been entered at all in the DB.
            $query = "SELECT code FROM languages WHERE languages_id = ".$languages_id;
            $resource = lucy_db_query($query);
            $result = lucy_db_fetch_array($resource);
            $language = $result['code'];

            $query = "SELECT * FROM translation WHERE `text` = '" . $text . "'";
            $resource = lucy_db_query($query);

            if (lucy_db_num_rows($resource) > 0 ) {
                // It has already been entered into the database. Just not in supplied language.
                translateRequest($text, $language);
            } else {
                // The text has not yet been entered into the database. Place a general translation request.
                translateRequest($text);
            }

            return $text;
        }
    }


    /**
     * This is a function that places a translationRequest for a specified text
     * and language in the administrator panel. It is fired every time a text is
     * loaded up via Translate() but isn't translated due to a missing translation.
     *
     * Tables:
     * translation_todo
     *
     * @param $text
     *      The text that should be requested for translation
     * @param $lang
     *      The language that is missing
     */
    function translateRequest($text, $lang = 'all') {

        $text = lucy_db_clean($text);

        // Check if the request hasn't been made yet:
        $query = "SELECT * FROM translation_request WHERE request_text = '".$text. "' AND language = '".$lang."'";
        $resource = lucy_db_query($query);
        if (lucy_db_num_rows($resource) == 0) {

            if ($lang == 'all') {
                // Translation has not been initialized.

                $sql = "INSERT INTO translation_request (request_text, language) VALUES ('".$text."', 'all')";
                $query = lucy_db_query($sql);

            } else {
                // Only for a selected language.
                $query = "INSERT INTO translation_request (request_text, language) VALUES ('".$text."', '".$lang."')";
                $resource = lucy_db_query($query);
            }
        } else {
            // Ignore requests that have already been made.
        }
    }