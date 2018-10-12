<div id="block-tabs" class="cmv-tabs">
	<ul>
		<?php if ( is_active_sidebar( 'home_tab_1' ) ) : ?><li><a href="#tabs-1">Nunc tincidunt</a></li><?php endif; ?>
		<?php if ( is_active_sidebar( 'home_tab_2' ) ) : ?><li><a href="#tabs-2">Proin dolor</a></li><?php endif; ?>
		<?php if ( is_active_sidebar( 'home_tab_3' ) ) : ?><li><a href="#tabs-3">Aenean lacinia</a></li><?php endif; ?>
	</ul>
	<?php if ( is_active_sidebar( 'home_tab_1' ) ) : ?><?php dynamic_sidebar( 'home_tab_1' ); ?><?php endif; ?>
	<?php if ( is_active_sidebar( 'home_tab_2' ) ) : ?><?php dynamic_sidebar( 'home_tab_2' ); ?><?php endif; ?>
	<?php if ( is_active_sidebar( 'home_tab_3' ) ) : ?><?php dynamic_sidebar( 'home_tab_3' ); ?><?php endif; ?>
</div>
