<?php

/**
*Trigger this file on Plugin uninstall
*
* @package excelToWP
*/

defined('WP_UNINSTALL_PLUGIN') or die('Access to file : DENİED');
/*
//Clear Database stored data
$books = get_posts( array('post_type' => 'book', 'numberposts' => 1));

foreach( $books as $book ){
  //true delete all the posts ,false don't delete if they are in trash
  wp_delete_post( $book->ID, true);
}*/

//Access the database via SQL
//this commands
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
