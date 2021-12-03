<?php
//about theme info
add_action( 'admin_menu', 'vw_handyman_services_gettingstarted' );
function vw_handyman_services_gettingstarted() {
	add_theme_page( esc_html__('About VW Handyman Services', 'vw-handyman-services'), esc_html__('About VW Handyman Services', 'vw-handyman-services'), 'edit_theme_options', 'vw_handyman_services_guide', 'vw_handyman_services_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_handyman_services_admin_theme_style() {
	wp_enqueue_style('vw-handyman-services-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-handyman-services-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_handyman_services_admin_theme_style');

//guidline for about theme
function vw_handyman_services_mostrar_guide() { 
	//custom function about theme customizer
	$vw_handyman_services_return = add_query_arg( array()) ;
	$vw_handyman_services_theme = wp_get_theme( 'vw-handyman-services' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Handyman Services', 'vw-handyman-services' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-handyman-services' ); ?>: <?php echo esc_html($vw_handyman_services_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-handyman-services'); ?></p>
    </div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_handyman_services_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-handyman-services' ); ?></button>
			<button class="tablinks" onclick="vw_handyman_services_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-handyman-services' ); ?></button>
		</div>

		<?php
			$vw_handyman_services_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_handyman_services_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Handyman_Services_Plugin_Activation_Settings::get_instance();
				$vw_handyman_services_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-handyman-services-recommended-plugins">
				    <div class="vw-handyman-services-action-list">
				        <?php if ($vw_handyman_services_actions): foreach ($vw_handyman_services_actions as $key => $vw_handyman_services_actionValue): ?>
				                <div class="vw-handyman-services-action" id="<?php echo esc_attr($vw_handyman_services_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_handyman_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_handyman_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_handyman_services_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-handyman-services'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_handyman_services_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-handyman-services' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW Handyman Services is an elegant theme with expertly crafted and professional design giving you a sophisticated website for your handyman services. Any handyman, maintenance and renovation, plumbing or gardening, carpentry, and cleaning services provider will be able to get a stunning website with this theme. The design is kept minimal to keep the focus on the important points and gives you a clean and sorted display of every service you are providing along with its details as well as pricing. Developers have made it user-friendly and packed it with retina-ready images. SEO-friendly codes have been used in the design to bring more organic traffic to your website that will ultimately fetch you more clients. With amazing banner and slider settings, you will be able to flash catchy images. There are personalization options given with the live theme customizer. Call To Action Buttons (CTA) and social media options are very well integrated into the theme for providing you with better promotion options. Mobile-friendly options provided in the theme make the website work really well on small screen devices also. The Bootstrap framework makes the design easily modifiable and CSS animations make it interactive. The .pot files make the design translation ready and support multiple languages.','vw-handyman-services'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-handyman-services' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-handyman-services' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_HANDYMAN_SERVICES_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-handyman-services' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-handyman-services'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-handyman-services'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-handyman-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-handyman-services'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-handyman-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_HANDYMAN_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-handyman-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-handyman-services'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-handyman-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_HANDYMAN_SERVICES_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-handyman-services'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-handyman-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-handyman-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-handyman-services'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-handyman-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_professionals') ); ?>" target="_blank"><?php esc_html_e('Professionals Section','vw-handyman-services'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-handyman-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-handyman-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-handyman-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-handyman-services'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-handyman-services'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-handyman-services'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-handyman-services'); ?></span><?php esc_html_e(' Go to ','vw-handyman-services'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-handyman-services'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-handyman-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-handyman-services'); ?></span><?php esc_html_e(' Go to ','vw-handyman-services'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-handyman-services'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-handyman-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-handyman-services'); ?> <a class="doc-links" href="<?php echo esc_url( vw_handyman_services_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-handyman-services'); ?></a></p>
			  	</div>
			</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Handyman_Services_Plugin_Activation_Settings::get_instance();
			$vw_handyman_services_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-handyman-services-recommended-plugins">
				    <div class="vw-handyman-services-action-list">
				        <?php if ($vw_handyman_services_actions): foreach ($vw_handyman_services_actions as $key => $vw_handyman_services_actionValue): ?>
				                <div class="vw-handyman-services-action" id="<?php echo esc_attr($vw_handyman_services_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_handyman_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_handyman_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_handyman_services_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-handyman-services' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-handyman-services-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-handyman-services'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-handyman-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-handyman-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-handyman-services'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-handyman-services'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-handyman-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_handyman_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-handyman-services'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-handyman-services'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php } ?>