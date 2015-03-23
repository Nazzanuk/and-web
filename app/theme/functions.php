<?php

include_once('lib/acf/acf.php');
//define( 'ACF_LITE' , true );
include_once('lib/acf-repeater/acf-repeater.php');

require('custom-fields/cf-what-we-do.php');

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

        $labels = array(
                'name'                => _x( 'People', 'Post Type General Name'),
                'singular_name'       => _x( 'Person', 'Post Type Singular Name'),
                'menu_name'           => __( 'People'),
                'parent_item_colon'   => __( 'Parent Person'),
                'all_items'           => __( 'All People'),
                'view_item'           => __( 'View Person'),
                'add_new_item'        => __( 'Add New Person'),
                'add_new'             => __( 'Add New'),
                'edit_item'           => __( 'Edit Person'),
                'update_item'         => __( 'Update Person'),
                'search_items'        => __( 'Search Person'),
                'not_found'           => __( 'Not Found'),
                'not_found_in_trash'  => __( 'Not found in Trash'),
        );

        $args = array(
                'label'               => __( 'people'),
                'description'         => __( 'People'),
                'labels'              => $labels,
                // Features this CPT supports in Post Editor
                // 'supports'            => array( 'title'),
                // You can associate this CPT with a taxonomy or custom taxonomy.
                'taxonomies'          => array( 'genres' ),
                /* A hierarchical CPT is like Pages and can have
                * Parent and child items. A non-hierarchical CPT
                * is like Posts.
                */
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => true,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );

        // Registering your Custom Post Type
        register_post_type( 'person', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );