<?php
/**
 * The template part for displaying post
 *
 * @package VW Handyman Services 
 * @subpackage vw-handyman-services
 * @since vw-handyman-services 1.0
 */
?>

<?php 
  $vw_handyman_services_archive_year  = get_the_time('Y'); 
  $vw_handyman_services_archive_month = get_the_time('m'); 
  $vw_handyman_services_archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <div class="row">
      <?php if(has_post_thumbnail() && get_theme_mod( 'vw_handyman_services_featured_image_hide_show',true) != '') {?>
        <div class="box-image col-lg-6 col-md-6">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <article class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'vw_handyman_services_featured_image_hide_show',true) != '') { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'vw_handyman_services_toggle_postdate',true) != '' || get_theme_mod( 'vw_handyman_services_toggle_author',true) != '' || get_theme_mod( 'vw_handyman_services_toggle_comments',true) != '' || get_theme_mod( 'vw_handyman_services_toggle_time',true) != '') { ?>
          <div class="post-info">
            <hr>
            <?php if(get_theme_mod('vw_handyman_services_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_handyman_services_archive_year, $vw_handyman_services_archive_month, $vw_handyman_services_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_handyman_services_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('vw_handyman_services_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_handyman_services_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('vw_handyman_services_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-handyman-services'), __('0 Comments', 'vw-handyman-services'), __('% Comments', 'vw-handyman-services') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_handyman_services_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('vw_handyman_services_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $vw_handyman_services_theme_lay = get_theme_mod( 'vw_handyman_services_excerpt_settings','Excerpt');
          if($vw_handyman_services_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($vw_handyman_services_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( vw_handyman_services_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_handyman_services_excerpt_number','30')))); ?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('vw_handyman_services_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_handyman_services_button_text',__('Read More','vw-handyman-services')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_handyman_services_button_text',__('Read More','vw-handyman-services')));?></span></a>
          </div>
        <?php } ?>
      </article>
    </div>
  </div>
</div>