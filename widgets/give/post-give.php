<?php

class Post_Give_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'post_give_widget',
			'description' => 'Post Give Button',
		);
		parent::__construct( 'post_give_widget', 'Post Give Link', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		if ( is_singular() ) {

			$post_id = get_the_ID();

			$post_give_link = get_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_url', true );

			$post_give_label = get_post_meta( $post_id, '_wsuwp_cvm_advance_post_give_label', true );

			if ( ! empty( $post_give_link ) ) {

				echo wp_kses_post( $args['before_widget'] );

				echo '<a href="' . esc_url( $post_give_link ) . '" class="post-give-action">' . esc_html( $post_give_label ) . '</a>';

				echo wp_kses_post( $args['after_widget'] );

			} // End if
		} // End if

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
