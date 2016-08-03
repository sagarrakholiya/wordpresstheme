<?php

// Registers a widget area
	function bsquare_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'twentysixteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	}
	add_action( 'widgets_init', 'bsquare_widgets_init' );

// Creating Custom Widget
	class wpb_widget extends WP_Widget {
	function __construct() {
	parent::__construct(
	// Base ID of your widget
	'wpb_widget',
	// Widget name will appear in UI
	__('WPBeginner Widget', 'wpb_widget_domain'),
	// Widget description
	array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
	);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	// This is where you run the code and display the output
	echo __( 'Hello, World!', 'wpb_widget_domain' );
	echo $args['after_widget'];
	}
			
	// Widget Backend
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'wpb_widget_domain' );
	}
	// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
	} // Class wpb_widget ends here
	// Register and load the widget
	function wpb_load_widget() {
		register_widget( 'wpb_widget' );
	}
	add_action( 'widgets_init', 'wpb_load_widget' );
	

 
// Customize the title for the home page, if one is not set.
	add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
	function wpdocs_hack_wp_title_for_home( $title )
	{
	  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
	    $title = get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	  }
	  return $title;
	}

require_once ( get_stylesheet_directory() . '/theme-options/theme-options.php' );
// require_once ( get_stylesheet_directory() . '/theme-options/theme-options-new.php' );