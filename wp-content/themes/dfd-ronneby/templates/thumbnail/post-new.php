<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if (has_post_thumbnail()) {
	
	$thumb = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($thumb, 'full'); //get img URL
	
?>
	<div class="entry-thumb <?php echo esc_attr($options['blog_comments_likes_style']) ?>">
		<img src="<?php echo esc_url($img_src[0]); ?>" width="<?php echo esc_attr($img_src[1]) ?>" height="<?php echo esc_attr($img_src[2]) ?>" alt="<?php the_title(); ?>"/>
		<?php if($options['blog_show_comments'] == 'on') : ?>
			<div class="post-comments-wrap">
				<?php get_template_part('templates/entry-meta/mini', 'comments-number'); ?>
			</div>
		<?php endif; ?>
		<?php if($options['blog_show_likes'] == 'on') : ?>
			<div class="post-like-wrap">
				<?php get_template_part('templates/entry-meta/mini', 'like'); ?>
			</div>
		<?php endif; ?>
	</div>
<?php
}