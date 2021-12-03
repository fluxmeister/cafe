<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_handyman_services_before_slider' ); ?>

    <?php if( get_theme_mod( 'vw_handyman_services_slider_hide_show', false) != '' || get_theme_mod( 'vw_handyman_services_resp_slider_hide_show', false) != '') { ?>
      <section id="slider">        
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_handyman_services_slider_speed',4000)) ?>">
          <div class="row m-0">
            <div class="col-lg-11 col-md-10 col-sm-10 px-0">
              <?php $vw_handyman_services_pages = array();
                for ( $count = 1; $count <= 4; $count++ ) {
                  $mod = intval( get_theme_mod( 'vw_handyman_services_slider_page' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $vw_handyman_services_pages[] = $mod;
                  }
                }
                if( !empty($vw_handyman_services_pages) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $vw_handyman_services_pages,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $i = 1;
              ?>
              <div class="carousel-inner" role="listbox">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <?php the_post_thumbnail(); ?>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_handyman_services_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_handyman_services_slider_excerpt_number','30')))); ?></p>
                        <?php if( get_theme_mod('vw_handyman_services_slider_button_text','Read More') != ''){ ?>
                          <div class="slider-btn my-4">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="px-4 py-3"><?php echo esc_html(get_theme_mod('vw_handyman_services_slider_button_text',__('Read More','vw-handyman-services')));?><i class="fas fa-long-arrow-alt-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_handyman_services_slider_button_text',__('Read More','vw-handyman-services')));?></span></a>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile; 
                wp_reset_postdata();?>
              </div>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif;
              endif;?>                  
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 media-box">
              <div class="social-bx">
                <?php dynamic_sidebar('slider-social'); ?>
              </div>
              <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-handyman-services' );?></span>
              </a>
              <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-handyman-services' );?></span>
              </a>
            </div>
          </div>
        </div>  
      </section>
    <?php }?>

  <?php do_action( 'vw_handyman_services_after_slider' ); ?>

  <?php if( get_theme_mod( 'vw_handyman_services_professionals_heading', false) != '' || get_theme_mod( 'vw_handyman_services_professionals_text', false) != '' || get_theme_mod( 'vw_handyman_services_professionals_category', false) != '') { ?>
    <section id="services-sec" class="py-5 wow slideInUp delay-1000" data-wow-duration="2s">
      <div class="container">        
        <?php if( get_theme_mod('vw_handyman_services_professionals_text') != '' ){ ?>
          <p class="mb-0 heading-text text-center text-md-start"><?php echo esc_html(get_theme_mod('vw_handyman_services_professionals_text',''));?></p>
        <?php }?>
        <?php if( get_theme_mod('vw_handyman_services_professionals_heading') != '' ){ ?>
          <h3 class="text-center text-md-start"><?php echo esc_html(get_theme_mod('vw_handyman_services_professionals_heading',''));?></h3>
          <hr>
        <?php }?>
        <div class="owl-carousel">
            <?php
            $vw_handyman_services_catData = get_theme_mod('vw_handyman_services_professionals_category');
            if($vw_handyman_services_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $vw_handyman_services_catData ,'vw-handyman-services')));
              while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <?php if(has_post_thumbnail()) {?>
                  <div class="box mb-4 text-center wow zoomIn" data-wow-duration="2s">
                    <div class="bx-image"><?php the_post_thumbnail(); ?></div>
                    <h4 class="mt-3"><?php the_title();?></h4>
                    <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_handyman_services_string_limit_words( $excerpt, 15)); ?></p>
                    <div class="slider-btn my-4 pb-4">
                      <a href="<?php the_permalink();?>"><?php esc_html_e('HIRE ME','vw-handyman-services'); ?><span class="screen-reader-text"><?php esc_html_e('HIRE ME','vw-handyman-services'); ?></span></a>
                    </div>
                  </div>
                <?php }?>
              <?php endwhile;
              wp_reset_postdata();
            } ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_handyman_services_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>