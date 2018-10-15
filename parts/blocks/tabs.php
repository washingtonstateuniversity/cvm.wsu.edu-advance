<?php

$tab_1_label = get_theme_mod( 'home_tab_1', 'Tab 1' );
$tab_2_label = get_theme_mod( 'home_tab_2', 'Tab 2' );
$tab_3_label = get_theme_mod( 'home_tab_3', 'Tab 3' );

?>
<div id="block-tabs" class="cmv-tabs">
	<ul>
		<?php if ( is_active_sidebar( 'home_tab_1' ) ) : ?><li><a href="#tabs-1"><?php echo esc_html( $tab_1_label ); ?></a></li><?php endif; ?>
		<?php if ( is_active_sidebar( 'home_tab_2' ) ) : ?><li><a href="#tabs-2"><?php echo esc_html( $tab_2_label ); ?></a></li><?php endif; ?>
		<?php if ( is_active_sidebar( 'home_tab_3' ) ) : ?><li><a href="#tabs-3"><?php echo esc_html( $tab_3_label ); ?></a></li><?php endif; ?>
	</ul>
	<?php if ( is_active_sidebar( 'home_tab_1' ) ) : ?><?php dynamic_sidebar( 'home_tab_1' ); ?><?php endif; ?>
	<?php if ( is_active_sidebar( 'home_tab_2' ) ) : ?><?php dynamic_sidebar( 'home_tab_2' ); ?><?php endif; ?>
	<?php if ( is_active_sidebar( 'home_tab_3' ) ) : ?><?php dynamic_sidebar( 'home_tab_3' ); ?><?php endif; ?>
</div>
