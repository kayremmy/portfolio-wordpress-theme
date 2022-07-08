<?php	
/*
	========================
		WIDGET CLASS
	========================
*/

//profile widget
class kayremmie_Profile_Widget extends WP_Widget {
	
	// setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'kayremmie-profile-widget',
			'description' => 'Custom Kayremmie Profile Widget',
		);
		parent::__construct( 'kayremmie_profile', 'kayremmie Profile', $widget_ops );
		
	}
  	// back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields of this Widget from <a href="./admin.php?page=kayremmie_profile">This Page</a></p>';
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$picture = esc_attr( get_option( 'profile_picture' ) );
		$firstName = esc_attr( get_option( 'first_name' ) );
		$lastName = esc_attr( get_option( 'last_name' ) );
		$fullName = $firstName . ' ' . $lastName;
		$description = esc_attr( get_option( 'user_description' ) );
               $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
               $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
               $instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
		
		echo $args['before_widget'];
		?>
		<div class="sidebar-content">
    <h5 class="sidebar-title"><?php print $fullName; ?></h5>
         <img src="<?php print $picture; ?>" class="img-fluid rounded b-shadow-a" alt="">
			<p><?php print $description; ?></p>
      <div class="socials">
                 <ul>
			             <?php if( !empty( $twitter_icon ) ): ?>
                    <li><a href="https://twitter.com/<?php echo $twitter_icon; ?>"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                   <?php endif; 
			            if( !empty( $instagram_icon ) ): ?>
                    <li><a href="https://instagram.com/<?php echo $instagram_icon; ?>"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                   <?php endif; 
			              if( !empty( $facebook_icon ) ): ?>
                   <li><a href="https://facebook.com/<?php echo $facebook_icon; ?>"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
		            	<?php endif; ?>
                 </ul>
		    </div>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Kayremmie_Profile_Widget' );
} );


/*
	Popular Posts Widget
*/

class Kayremmie_Popular_Posts_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'kayremmie-popular-posts-widget',
			'description' => 'Popular Posts Widget',
		);
		parent::__construct( 'kayremmie_popular_posts', 'Kayremmie Popular Posts', $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';
		
		echo $output;
		
	}
	
	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
		return $instance;
		
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
		
		$tot = absint( $instance[ 'tot' ] );
		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'kayremmie_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		echo $args[ 'before_widget' ];
		
		if( !empty( $instance[ 'title' ] ) ):
			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
		endif;
		
		if( $posts_query->have_posts() ):
		
			//echo '<ul>';
				
			while( $posts_query->have_posts() ): $posts_query->the_post();
				
				echo '<div class="media">';
				echo '<div class="media-left"><img class="media-object" src="' . get_template_directory_uri() . '/img/post-' . ( get_post_format() ? get_post_format() : 'standard') . '.png" alt="' . get_the_title() . '"/></div>';
				echo '<div class="media-body">';
				echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
				echo '<div class="row"><div class="col-xs-12">'. sunset_posted_footer( true ) .'</div></div>';
				echo '</div>';
				echo '</div>';
				
			endwhile;
				
			//echo '</ul>';
		
		endif;
		
		echo $args[ 'after_widget' ];
		
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Kayremmie_Popular_Posts_Widget' );
} );



// Widget Locations
function kayremmie_init_widgets($id){	
  register_sidebar(array(
    'name'  => 'Sidebar',
    'id'    => 'sidebar',
    'before_widget' => '<div class="widget-sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="sidebar-title">',
    'after_title'   => '</h5>'
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-1',
    'id'    => 'sidebar-1',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-2',
    'id'    => 'sidebar-2',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-3',
    'id'    => 'sidebar-3',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-4',
    'id'    => 'sidebar-4',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-5',
    'id'    => 'sidebar-5',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

  register_sidebar(array(
    'name'  => 'Sidebar-service-6',
    'id'    => 'sidebar-6',
    'before_widget' => '<div class="service-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
  ));

}
add_action('widgets_init', 'kayremmie_init_widgets');

























