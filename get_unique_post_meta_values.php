<?php
 // When you will add the code in your file, you'll remove opening PHP tag
/**
 * Description: Getting all the values associated with a specific custom post meta key, across all posts
 * Author: Chinmoy Paul
 * Author URL: http://pwdtechnology.com
 */
 
 function get_unique_post_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) )
        return;

    $res = $wpdb->get_col( $wpdb->prepare( "
        SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s'
        AND p.post_status = '%s'
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $res;
}
