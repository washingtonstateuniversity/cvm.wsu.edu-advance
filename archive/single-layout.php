<section class="row side-right gutter pad-ends">

	<div class="column one">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'articles/post', get_post_type() ) ?>

			<?php
			$link_label = get_post_meta( get_the_ID(), '_wsuwp_cvm_advance_post_give_label', true );
			$link_url = get_post_meta( get_the_ID(), '_wsuwp_cvm_advance_post_give_url', true );

			if ( $link_label && $link_url ) {
				?>
				<div class="cvm-give-now-link">
					<a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_label ); ?></a>
				</div>
				<?php
			}
			?>

		<?php endwhile; ?>

	</div><!--/column-->

	<div class="column two">

		<?php get_sidebar(); ?>

	</div><!--/column two-->

</section>
