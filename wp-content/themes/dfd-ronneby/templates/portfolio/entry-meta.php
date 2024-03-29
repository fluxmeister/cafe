<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="dfd-meta-container">
	<div class="post-like-wrap left">
		<?php get_template_part('templates/entry-meta/mini-like', 'old'); ?>
		<div class="box-name"><?php esc_html_e('Recommend', 'dfd'); ?></div>
	</div>
	<div class="dfd-single-share left">
		<?php get_template_part('templates/entry-meta/mini', 'share-popup'); ?>
		<div class="box-name"><?php esc_html_e('Share', 'dfd'); ?></div>
	</div>
	<div class="dfd-single-tags right">
		<?php get_template_part('templates/entry-meta/mini', 'folio-tags'); ?>
		<div class="box-name"><?php esc_html_e('Tagged in', 'dfd'); ?></div>
	</div>
</div>