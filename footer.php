<footer class="mdcwp-footer">
		<?php $menu_footer = wp_nav_menu(array('echo'=>false, 'fallback_cb'=>'__return_false', 'theme_location'=>'secondary', 'menu_class'=>'mdc-footer__link-list', 'container_class'=>'mdcwp-footer__bottom-section')); if ( !empty ($menu_footer)) { wp_nav_menu(array('theme_location'=>'secondary', 'menu_class'=>'mdc-footer__link-list', 'container_class'=>'mdcwp-footer__bottom-section')); } ?>
		<?php dynamic_sidebar('footer-1'); ?>
</footer>
	
	<?php wp_footer(); ?>
	
	<script type="text/javascript">
	  window.mdc.autoInit();
	</script>
	</body>
</html>