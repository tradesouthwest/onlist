<?php
/**
 * Register widget with WordPress.
 * @since 1.0.6
 */
class Onlist_Widget extends WP_Widget {

function __construct() {
    parent::__construct(
    // Base ID of widget
    'onlist_widget',

    // Widget name will appear in UI
    __( 'Onlist Category Sidebar', 'onlist' ), // Name
	array(
        'description' => __( 'Add Widget for Onlist Plugin',
                            'onlist' ),
        ));
}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

            //do_shortcode('[onlist-categories]');
            echo onlist_display_category_widget();
	// return after widget parts
    echo $args['after_widget'];
    }
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'OnList Listings', 'onlist' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'onlist' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
} // Ends class Depict_Widget

// Register and load the widget
	function onlist_load_widget() {
		register_widget( 'onlist_widget' );
}

add_action( 'widgets_init', 'onlist_load_widget' );
?>
