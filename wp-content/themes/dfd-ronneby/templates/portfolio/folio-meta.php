<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="clear"></div>
	<div class="entry-meta meta-top">
		<?php get_template_part('templates/entry-meta/mini', 'date'); ?>
	</div>
	<div class="entry-meta meta-bottom">
		<span><?php esc_html_e('by', 'dfd'); ?></span>
		<?php
			get_template_part('templates/entry-meta/mini', 'author');
		?>
		<span><?php esc_html_e('in', 'dfd'); ?></span>
		<?php
			get_template_part('templates/folio', 'terms');
		?>
	</div>
<div class="clear"></div>