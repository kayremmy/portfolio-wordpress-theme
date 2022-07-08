<?php
/*========================
THEME CUSTOM POST TYPES
========================
*/
	
/* CONTACT CPT */
function contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'author' )
	);
	
	register_post_type( 'contact', $args );
}
add_action( 'init', 'contact_custom_post_type' );

function set_contact_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}
add_filter( 'manage_contact_posts_columns', 'set_contact_columns' );

function contact_custom_column( $column, $post_id ){
	
	switch( $column ){
		
		case 'message' :
			echo get_the_excerpt();
			break;
			
		case 'email' :
			//email column
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}
	
}
add_action( 'manage_contact_posts_custom_column', 'contact_custom_column', 10, 2 );

/* CONTACT META BOXES */

function contact_add_meta_box() {
	add_meta_box( 'contact_email', 'User Email', 'contact_email_callback', 'contact', 'side' );
}
add_action( 'add_meta_boxes', 'contact_add_meta_box' );

function contact_email_callback( $post ) {
	wp_nonce_field( 'save_contact_email_data', 'contact_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="contact_email_field">User Email Address: </label>';
	echo '<input type="email" id="contact_email_field" name="contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function save_contact_email_data( $post_id ) {
	
	if( ! isset( $_POST['contact_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['contact_email_meta_box_nonce'], 'save_contact_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['contact_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['contact_email_field'] );
	
	update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	
}
add_action( 'save_post', 'save_contact_email_data' );

/*
	==========================================
	Portfolio Post Type
	==========================================
*/
function portfolio_custom_post_type (){
	
	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add Portfolio',
		'all_items' => 'All Portfolios',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon'	=> 'dashicons-category',
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'editor',
			'title',
			'excerpt',
			'thumbnail',
			'revisions',
			'comments',
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio',$args);
}
add_action('init','portfolio_custom_post_type');

function portfolio_custom_taxonomies() {
	
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Fields',
		'singular_name' => 'Field',
		'search_items' => 'Search Fields',
		'all_items' => 'All Fields',
		'parent_item' => 'Parent Field',
		'parent_item_colon' => 'Parent Field:',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Field',
		'add_new_item' => 'Add New Work Field',
		'new_item_name' => 'New Field Name',
		'menu_name' => 'Fields'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'field' )
	);
	
	register_taxonomy('field', array('portfolio'), $args);
	
	//add new taxonomy NOT hierarchical
	
	register_taxonomy('software', 'portfolio', array(
		'label' => 'Software',
		'rewrite' => array( 'slug' => 'software' ),
		'hierarchical' => false
	) );
	
}

add_action( 'init' , 'portfolio_custom_taxonomies' );

/*
	==========================================
	portfolio Custom Term Function
	==========================================
*/

function portfolio_get_terms( $postID, $term ){
	
	$terms_list = wp_get_post_terms($postID, $term); 
	$output = '';
					
	$i = 0;
	foreach( $terms_list as $term ){ $i++;
		if( $i > 1 ){ $output .= ', '; }
		$output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
	}
	
	return $output;
	
}


/*
==========================================
	Testimonial Post Type
==========================================
*/
function testimonial_custom_post_type (){
	
	$labels = array(
		'name' => 'Testimonial',
		'singular_name' => 'Testimonial',
		'add_new' => 'Add Testimonial',
		'all_items' => 'All TestimonialS',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Testimonial',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon'	=> 'dashicons-welcome-write-blog',
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 8,
		'exclude_from_search' => false
	);
	register_post_type('testimonial',$args);
}
add_action('init','testimonial_custom_post_type');



/*
==========================================
	Programs Post Type
==========================================
*/
function program_custom_post_type (){
	
	$labels = array(
		'name' => 'Programs',
		'add_new_item' => 'Add New Program',
		'edit_item' => 'Edit Program',
		'all_items' => 'All Programs',
		'singular_name' => 'Program',
		'view_item' => 'View Program',
		'search_item' => 'Search programs',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'rewrite' => array('slug' => 'programs'),
		'has_archive' => true,
		'public' => true,

		'menu_icon' => 'dashicons-awards',
		'capability_type' => 'post',
		'hierarchical' => false,

		'exclude_from_search' => false
	);
	register_post_type('program',$args);
}
add_action('init','program_custom_post_type');

/*
==========================================
	Like Post Type
==========================================
*/
function like_custom_post_type (){
	
	$labels = array(
		'name' => 'Likes',
		'singular_name' => 'Like',
		'all_items' => 'All Lkes',
		'add_new_item' => 'Add New Like',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Likes',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon' => 'dashicons-heart',
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'revisions',
		),
		'exclude_from_search' => false
	);
	register_post_type('like',$args);
}
add_action('init','like_custom_post_type');


/*
==========================================
	Map Post Type
==========================================
*/
function map_custom_post_type (){
	
	$labels = array(
		'name' => 'Maps',
		'add_new_item' => 'Add New Program',
		'edit_item' => 'Edit Map',
		'all_items' => 'All Maps',
		'singular_name' => 'Map',
		'view_item' => 'View Map',
		'search_item' => 'Search Maps',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'rewrite' => array('slug' => 'maps'),
		'has_archive' => true,
		'public' => true,

		'menu_icon' => 'dashicons-location-alt',
		'capability_type' => 'post',
		'hierarchical' => false,

		'exclude_from_search' => false
	);
	register_post_type('map',$args);
}
add_action('init','map_custom_post_type');

