<?php

class Post_Images_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'post_images_widget',
			'description' => 'List of Post Images',
		);
		parent::__construct( 'post_images_widget', 'Post Images', $widget_ops );
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

			$post_images_ids_string = get_post_meta( $post_id, '_additional_images', true );

			if ( ! empty( $post_images_ids_string ) ) {

				$post_images_ids = explode( ',', $post_images_ids_string );

				echo $args['before_widget'];

				if ( ! empty( $instance['title'] ) ) {

					echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );

				} // End if

				foreach ( $post_images_ids as $post_image_id ) {

					$image_array = cmv_get_post_image_array_by_id( $post_image_id );

					$img_src     = $image_array['src'];
					$img_alt     = $image_array['alt'];
					$img_caption = $image_array['caption'];

					include __DIR__ . '/displays/figure.php';

				} // End foreach

				echo $args['after_widget'];

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