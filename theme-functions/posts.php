<?php

function cmv_get_featured_posts( $count = 6, $offset = 1, $img_size = 'medium', $excerpt_length = 35 ) {

    $featured_posts = array();

    $query_args = array(
        'post_status' => 'publish',
        'posts_per_page' => $count,
        'offset' => $offset,
        'post_type' => 'post',
        'category_name' => 'featured',
    );

    $the_query = new WP_Query( $query_args );

    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {

            $the_query->the_post();

            $post_id = get_the_ID();

            $image_array = cmv_get_post_image_array( $post_id, $img_size );

            $feature = array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink(),
                'img_src'   => ( ! empty( $image_array ) ) ? $image_array['src'] : '',
                'img_alt'   => ( ! empty( $image_array ) ) ? $image_array['alt'] : '',
                'img_id'    => ( ! empty( $image_array ) ) ? $image_array['id'] : '',
                'excerpt'   => $the_query->post->post_excerpt,
            );
            
            //ob_start();

            //the_excerpt();

           // $feature['excerpt'] = ob_get_clean();

            ob_start();

            the_content();

            $feature['content'] = ob_get_clean();

            $featured_posts[] = $feature;

        } // End While

        /* Restore original Post Data */
        wp_reset_postdata();

    } // End if

    return $featured_posts;

} // End cmv_get_featured_posts


function cmv_get_post_image_array( $post_id, $size = 'medium' ) {

	$image_array = array();

	if ( $post_id && has_post_thumbnail( $post_id ) ) {

        $img_id = get_post_thumbnail_id( $post_id );

        $img_post = wp_get_attachment_image_src( $img_id, $size, true );
        
        $image_array = array(
            'id' => $img_id,
            'alt' => get_post_meta( $img_id, '_wp_attachment_image_alt', true ),
            'src' => $img_post[0],
        );

	} // End if

	return $image_array;

} // End cmv_get_post_image_array