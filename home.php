<?php get_header(); ?>

<main id="wsuwp-main" class="<?php echo esc_attr( $main_class ); ?>">

	<?php get_template_part( 'parts/headers' ); ?>

	<?php get_template_part( 'parts/banners/banner', 'home' ); ?>

	<?php get_template_part( 'parts/blocks/featured', 'home' ); ?>

	<?php get_template_part( 'parts/blocks/tabs', 'home' ); ?>

	<?php get_template_part( 'parts/footers' ); ?>

</main>
<?php get_footer();
