<?php
/**
 * The template part for top header
 *
 * @package VW Handyman Services
 * @subpackage vw-handyman-services
 * @since vw-handyman-services 1.0
 */
?>

<div class="main-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-4 align-self-center logo-bg-bx">
        <div class="logo text-center text-md-start pb-3 pb-md-0">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_handyman_services_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_handyman_services_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_handyman_services_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-2 col-3 align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <div class="col-lg-2 col-md-4 col-9 align-self-center">
        <div class="topbar_btn text-end">
          <?php if( get_theme_mod('vw_handyman_services_topbar_btn_link') != '' || get_theme_mod('vw_handyman_services_topbar_btn_text') != '' ){ ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_handyman_services_topbar_btn_link',''));?>"><?php echo esc_html(get_theme_mod('vw_handyman_services_topbar_btn_text',''));?><i class="fas fa-long-arrow-alt-right ms-2"></i></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-1 col-md-2 align-self-center px-0">
        <i class="fas fa-bars media-box"></i>
      </div>
    </div>
  </div>
</div>