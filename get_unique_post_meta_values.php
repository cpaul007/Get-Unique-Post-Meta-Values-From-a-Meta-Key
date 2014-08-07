<?php
 /* Don't include the opening PHP tag*/
/**
 * Description: Getting all the values associated with a specific custom post meta key, across all posts
 * Author: Chinmoy Paul
 * Author URL: http://pwdtechnology.com
 * 
 * @param string $key Post Meta Key.
 * 
 * @param string $type Post Type. Default is post. You can pass custom post type here.
 * 
 * @param string $status Post Status like Publish, draft, future etc. default is publish
 * 
 * @return array
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
