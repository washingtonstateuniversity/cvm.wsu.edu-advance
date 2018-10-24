<section class="row gutter pad-ends">

	<div class="column one">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'articles/single', get_post_type() ) ?>

		<?php endwhile; ?>

	</div><!--/column-->

</section>
