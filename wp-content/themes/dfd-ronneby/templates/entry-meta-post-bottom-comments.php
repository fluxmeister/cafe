<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="entry-meta meta-bottom">
	<?php get_template_part('templates/entry-meta/mini', 'date'); ?>
	<span><?php esc_html_e('by', 'dfd'); ?></span>
	<?php
		get_template_part('templates/entry-meta/mini', 'author');
	?>
	<span><?php esc_html_e('in', 'dfd'); ?></span>
	<?php get_template_part('templates/entry-meta/mini', 'category'); ?>
	<span class="right">
		<?php get_template_part('templates/entry-meta/mini', 'comments'); ?>
	</span>
</div>