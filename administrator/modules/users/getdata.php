<?php
/**
 *  LUCYCRAFT CORE - getdata.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 *  This is an Ajax file. Used by datatables (jQuery plugin). It returns a table with user-data.
 *
 */

$module_id = $_GET['module_id'];

$view = $_GET['view'];
$action = $_GET['action'];
$user_id = $_GET['user_id'];

switch ($view) {

    default:
    case 'overview':

        show_list();
    break;

    case 'specific':

        switch ($action) {

            default:
            case 'view':

                show_user($user_id);

            break;

            case 'edit':

                edit_user($user_id);
            break;

            case 'delete':

                delete_user($user_id);

            break;
        }

    break;
}
/*
 *  Gives a list of ...
 */
function show_list() {


}
/**
 * @param $id - ID for the user to focus on
 */
function show_user($id) {


}
/**
 * @param $id - ID for the user to edit
 */
function edit_user($id) {


}
/**
 * @param $id - ID for the user to delete
 */
function delete_user($id) {


}
