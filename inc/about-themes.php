<?php
//about theme info
add_action( 'admin_menu', 'skt_eauto_abouttheme' );
function skt_eauto_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-eauto'), esc_html__('About Theme', 'skt-eauto'), 'edit_theme_options', 'skt_eauto_guide', 'skt_eauto_mostrar_guide');   
} 
//guidline for about theme
function skt_eauto_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-eauto'); ?>
		   </div>
          <p><?php esc_html_e('SKT eAuto is a modern and responsive WordPress theme built for electric vehicle (EV) businesses, including electric car dealers, e-mobility startups, and battery-powered vehicle service providers. Perfect for showcasing eco-friendly cars, green vehicles, plug-in vehicles, and zero-emission vehicle offerings, this e-vehicle theme comes with customizable layouts, WooCommerce compatibility, and mobile-friendly design—ideal for promoting the future of clean transportation.','skt-eauto'); ?></p>
          <a href="<?php echo esc_url(SKT_EAUTO_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-eauto'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_EAUTO_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-eauto'); ?></a> | 
				<a href="<?php echo esc_url(SKT_EAUTO_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-eauto'); ?></a> | 
				<a href="<?php echo esc_url(SKT_EAUTO_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-eauto'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_EAUTO_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-eauto'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>