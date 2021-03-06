<section class="row side-right gutter pad-ends">

	<?php if ( is_search() ) : ?><header>
		<h1>Search</h1>
</header><?php endif; ?>

	<div class="column one">


		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

				if ( is_search() ) {

					get_template_part( 'articles/post', 'search' );

				} else {

					get_template_part( 'articles/post', get_post_type() );

				};

				?>

			<?php endwhile; ?>

		<?php elseif ( is_search() ) : ?>

			<p class="search-results-empty">Sorry, no results were found for your search.</p>

		<?php endif; ?>
	</div><!--/column-->

	<div class="column two">

		<?php get_sidebar(); ?>

	</div><!--/column two-->

</section>
