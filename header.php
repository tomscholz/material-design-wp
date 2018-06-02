<!DOCTYPE html>
<html class="mdc-typography" id="root" lang="<?php bloginfo('language'); ?>">
	<head>
		<meta charset="<?php bloginfo('charset') ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
		<?php if(get_post_meta( $post->ID, '_mdcwp_immersive_mode_value_key', true )) {?>
			<style>.mat-toolbar--search {position:absolute;}</style>
		<?php } ?>
	</head>

	<body <?php global $post; if(get_post_meta( $post->ID, '_mdcwp_immersive_mode_value_key', true )) { $is_immersive = 'mdcwp--immersive-mode'; } body_class($is_immersive);?>>

	<div class="mdcwp-progressbar">
		<div role="progressbar" class="mdc-linear-progress mdc-linear-progress--indeterminate">
			<div class="mdc-linear-progress__buffering-dots"></div>
			<div class="mdc-linear-progress__buffer"></div>
			<div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar">
				<span class="mdc-linear-progress__bar-inner"></span>
			</div>
			<div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar">
				<span class="mdc-linear-progress__bar-inner"></span>
			</div>
		</div>
	</div>

	<header class="mdc-toolbar <?php if(!get_post_meta( $post->ID, '_mdcwp_immersive_mode_value_key', true )) { echo 'mdc-toolbar--fixed mdc-toolbar--waterfall'; } ?>" id="default-toolbar" data-mdc-auto-init="MDCToolbar" <?php if(get_post_meta( $post->ID, '_mdcwp_immersive_mode_value_key', true )) { echo 'style="position:absolute;"'; } ?>>
		<div class="mdc-toolbar__row">
			<section class="mdc-toolbar__section mdc-toolbar__section--align-start">
				<?php $menu = wp_nav_menu(array('echo'=>false, 'fallback_cb'=>'__return_false', 'theme_location'=>'primary')); if ( ! empty ($menu)) {echo '<a class="left-icon menu-icon material-icons mdc-toolbar__icon--menu" id="menu-icon"><div class="mdc-icon-toggle mat-ripple-effect" data-mdc-auto-init="MDCRipple" data-mdc-ripple-is-unbounded></div>menu</a>';} ?>
				<span class="mdc-toolbar__title"><?php bloginfo('name'); ?></span>
			</section>
			<section class="mdc-toolbar__section mat-search--desktop mdc-ripple-surface" data-mdc-auto-init="MDCRipple">
				<div class="mat-search--desktop__wrapper">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" style="display: flex; width: 100%;">
						<label class="mat-search--desktop__icon mat-search--desktop__content material-icons" for="mat-search--desktop__input">search</label>
						<input class="mat-search--desktop__input mat-search--desktop__content mdc-typography" id="mat-search--desktop__input" value="<?php echo get_search_query(); ?>" name="s" placeholder="Search">
					</form>
				</div>
			</section>
			<section class="mdc-toolbar__section mdc-toolbar__section--align-end mat-toolbar__section--end-icons">
				<a class="material-icons mdc-toolbar__icon mat-search--mobile mat-toolbar--open-search" aria-label="Search" alt="Search"><div class="mdc-icon-toggle mat-ripple-effect" data-mdc-auto-init="MDCRipple" data-mdc-ripple-is-unbounded></div>search</a>
				<?php $menu_right = wp_nav_menu(array('echo'=>false, 'fallback_cb'=>'__return_false', 'theme_location'=>'menutopright')); if ( !empty($menu_right)) {echo '<a class="material-icons mdc-toolbar__icon mat-toolbar--open-menu" aria-label="More options" alt="More options"><div class="mdc-icon-toggle mat-ripple-effect" data-mdc-auto-init="MDCRipple" data-mdc-ripple-is-unbounded></div>more_vert</a><div class="mdc-simple-menu mdc-simple-menu--open-from-top-right" style="min-width: 170px;" tabindex="-1" id="mdc-simple-menu"><ul class="mdc-simple-menu__items mdc-list" role="menu" aria-hidden="true" style="width: 100%;">'; wp_nav_menu(array('theme_location'=>'menutopright', 'items_wrap' => '%3$s', 'walker'=>new Walker_mdcwp_menu())); echo '</ul></div>';} ?>
			</section>
		</div>
		<?php
			$menu_tab = wp_nav_menu(array('echo'=>false, 'fallback_cb'=>'__return_false', 'theme_location'=>'tabmenu')); if ( !empty ($menu_tab) ) {echo '<div class="mdc-toolbar__row mat-toolbar__row--tab-bar"><section class="mdc-toolbar__section mat-toolbar--tab-bar__section"><nav class="mdc-tab-bar mat-tab-bar" data-mdc-auto-init="MDCTabBar">'; wp_nav_menu(array('container'=>false, 'theme_location'=>'tabmenu', 'items_wrap' => '%3$s', 'walker'=>new Walker_mdcwp_tab())); echo '<span class="mdc-tab-bar__indicator"></span></nav></section></div>';}
    ?>
    </header>

	<header class="mdc-toolbar mat-toolbar--search" data-mdc-auto-init="MDCToolbar" style="visibility: hidden; background-color: transparent;">
		<div class="mdc-toolbar__row mat-toolbar--search-container">
			<section class="mdc-toolbar__section mdc-toolbar__section--align-start">
				<a class="material-icons mdc-toolbar__icon--menu mat-toolbar--exit-search"><div class="mdc-icon-toggle mat-ripple-effect" data-mdc-auto-init="MDCRipple" data-mdc-ripple-is-unbounded></div>arrow_back</a>
				<div class="mdc-textfield mdc-textfield--fullwidth" style="border: none; padding: 16px; font-size: 1.25rem;">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
						<input class="mdc-textfield__input mdc-typography mat-toolbar--search-text" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="Search" autofocus />
					</form>
				</div>
			</section>
		</div>
    </header>

	<?php get_template_part('content', 'drawer'); ?>
