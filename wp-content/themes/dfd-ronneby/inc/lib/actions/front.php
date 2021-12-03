<?php
if(!defined('ABSPATH')) {
	exit;
}

if(!class_exists('Dfd_Front_Actions')) {
	class Dfd_Front_Actions {
		public $pagenow;
		
		public function __construct() {
			global $pagenow;
			$this->pagenow = $pagenow;
			
			$this->init();
		}
		public function init() {
			$this->actions();
			$this->filters();
		}
		public function actions() {
//			add_action('init', array($this, 'isAjaxRequest'));
			add_action('template_redirect', array($this, 'templateRedirect'));
		}
		public function filters() {
//			add_filter('template_include', array( 'DFD_Wrapping', 'wrap' ), 99);
			add_filter('wp_title', array($this, 'titleFilter'), 10, 2);
			add_filter('get_search_form', array($this, 'searchForm'));
			add_filter('wp_nav_menu_args', array($this, 'menuArgs'));
			add_filter('nav_menu_item_id', '__return_null');
			add_filter('excerpt_length', array($this, 'excerptLength'), 999);
			add_filter('next_posts_link_attributes', array($this, 'nextPostLinkAttr'));
			add_filter('previous_posts_link_attributes', array($this, 'prevPostLinkAttr'));
			add_filter('wp_get_attachment_link', array($this, 'prettyAdd'));
			add_filter('upload_dir', array($this, 'cdnUploadUrl'));
			if(isset($this->pagenow) && $this->pagenow == 'wp-login.php') {
				// WordPress version is greater than 5.2 (PHP Notice:  login_headertitle is deprecated)
				global $wp_version;
				if ( version_compare( $wp_version, '5.2', '>=' ) ) {
					add_filter('login_headertext', array($this, 'loginTitleOnLogo'));
				} else {
					add_filter('login_headertitle', array($this, 'loginTitleOnLogo'));
				}
				// END WordPress version is greater than 5.2 (PHP Notice:  login_headertitle is deprecated)
				add_filter('login_headerurl',array($this, 'loginHomeLink'));
			}
			add_filter('bbp_before_get_breadcrumb_parse_args', array($this, 'bbpBreadcrumb'));
		}
		public function titleFilter($title) {
			$before_title = get_bloginfo('name');
			$title = $before_title . $title;
			return $title;
		}
		public function templateRedirect() {
			global $post, $portfolio_pagination_type, $dfd_pagination_style, $dfd_left_sidebar, $dfd_right_sidebar;
			if ( isset($post) && isset($post->ID) ) {
				$dfd_left_sidebar = get_post_meta($post->ID, 'crum_sidebars_sidebar_1', true);
				$dfd_right_sidebar = get_post_meta($post->ID, 'crum_sidebars_sidebar_2', true);
				$portfolio_pagination_type = get_post_meta($post->ID, 'dfd_pagination_type', true);
				$dfd_pagination_style = DfdMetaBoxSettings::compared('dfd_pagination_style', '');
			}
		}
		public function isAjaxRequest() {
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
					&& strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') === 0) {
				add_filter('template_include', array($this, 'ajaxTemplate'), 100);
			}
		}
		public function ajaxTemplate() {
			$template = locate_template(array('base-ajax.php'));
			return $template;
		}
		public function loginTitleOnLogo() {
			return get_bloginfo( 'name' );
		}
		public function loginHomeLink() {
			return site_url();
		}
		public function searchForm($form) {
			ob_start();
			get_template_part('templates/searchform');
			$form = ob_get_clean();

			return $form;
		}
		public function menuArgs($args = array()) {
			$metro_menu_walker['container'] = false;

			if (!$args['walker']) {
				$class = DFD_NAV_MENU_WALKER_CLASS;
				$metro_menu_walker['walker'] = new $class();
			}

			return array_merge($args, $metro_menu_walker);
		}
		public function excerptLength($length) {
			return 30;
		}
		public function nextPostLinkAttr() {
			return 'class="older"';
		}
		public function prevPostLinkAttr() {
			return 'class="newer"';
		}
		public function prettyAdd($content) {
			$content = preg_replace("/<a/","<a data-rel=\"prettyPhoto[slides]\"",$content,1);
			return $content;
		}
		public function cdnUploadUrl($args) {
			global $dfd_ronneby;
			if(isset($dfd_ronneby['custom_cdn_url_prefix']) && !empty($dfd_ronneby['custom_cdn_url_prefix'])) {
				$args['baseurl'] = $dfd_ronneby['custom_cdn_url_prefix'];
			}
			return $args;
		}
		public function bbpBreadcrumb() {
			$args['before'] = '<nav id="crumbs"><span>';
			$args['after'] = '</span></nav>';
			$args['sep'] = '<span class="del"></span>';
			$args['pad_sep'] = 0;
			$args['sep_before'] = '</span>';
			$args['sep_after'] = '<span>';
			$args['current_before'] = '';
			$args['current_after'] = '';
			$args['home_text'] = esc_html__('Home', 'dfd');

			return $args;
		}
	}
	
	$Dfd_Front_Actions = new Dfd_Front_Actions();
}

if(!class_exists('Dfd_Ronneby_Pagination')) {
	class Dfd_Ronneby_Pagination {
		function __construct() {
			$this->init();
		}
		function init() {
			global $portfolio_pagination_type;
	
			if (strcmp($portfolio_pagination_type, '1') === 0) {
				$this->ajaxPagination();
			} elseif(strcmp($portfolio_pagination_type, '2') === 0) {
				$this->lazyLoadPagination();
			} else {
				$this->defaultPagination();
			}
		}
		function defaultPagination () {
			global $wp_query, $dfd_pagination_style;

			if(is_home()) {
				global $paged;
				if(empty($paged)) {
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				}
			}

			$prev_link = $next_link = '';
			if(empty($dfd_pagination_style) || $dfd_pagination_style == '1') {
				$pagination_class = 'dfd-pagination-style-1';
				$prev_link = '<div class="prev-next-links">'. get_previous_posts_link( esc_html__('Prev.','dfd') ) . get_next_posts_link( esc_html__('Next','dfd') ).'</div>';
			} else {
				$prev_link = '<div class="prev-link">'. get_previous_posts_link( esc_html__('Prev.','dfd') ) .'</div>';
				$next_link = '<div class="next-link">'. get_next_posts_link( esc_html__('Next','dfd') ).'</div>';
				$pagination_class = 'dfd-pagination-style-'.$dfd_pagination_style;
			}

			$big = 999999999; // This needs to be an unlikely integer

			// For more options and info view the docs for paginate_links()
			// http://codex.wordpress.org/Function_Reference/paginate_links
			$paginate_links = paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'mid_size' => 5,
				'prev_next' => false,
				//'prev_text' => __('Previous', 'dfd'),
				//'next_text' => __('Next', 'dfd'),
				'type' => 'list'
			) );

			// Display the pagination if more than one page is found
			if ( $paginate_links ) {
				echo '<div class="pagination '.esc_attr($pagination_class).'">';
				echo wp_kses_post($prev_link);
				echo wp_kses_post($paginate_links);
				echo wp_kses_post($next_link);
				echo '</div><!--// end .pagination -->';
			}
		}
		function ajaxPagination() {
			global $wp_query;
	
			$max_num_pages = $wp_query->max_num_pages;
			$page = get_query_var('paged');
			$paged = ($page > 1) ? $page : 1;

			wp_localize_script(
				'ajax-pagination',
				'dfd_pagination_data',
				array(
					'startPage' => $paged,
					'maxPages' => $max_num_pages,
					'nextLink' => next_posts($max_num_pages, false),
					'container' => '#portfolio-page > .works-list, #grid-folio, #grid-posts, .dfd-news-layout #main-content .row, .dfd-portfolio-wrap #dfd-portfolio-loop, .dfd-blog-wrap #dfd-blog-loop, .dfd-gallery-wrap #dfd-gallery-loop',
				)
			);

			$post_type = get_post_type();

			if($post_type == 'post') {
				wp_enqueue_style('dfd_zencdn_video_css');
				wp_enqueue_script('dfd_zencdn_video_js');
			}

			wp_enqueue_script('ajax-pagination');

			echo '<div class="pagination ajax-pagination"><a id="ajax-pagination-load-more" class="button" href="#">'.esc_html__('Load more', 'dfd').'</a></div><!--// end .pagination -->';
		}
		function lazyLoadPagination() {
			global $wp_query, $dfd_ronneby;
	
			$max_num_pages = $wp_query->max_num_pages;
			$page = get_query_var('paged');
			$paged = ($page > 1) ? $page : 1;

			wp_localize_script(
				'dfd-lazy-load',
				'dfd_pagination_data',
				array(
					'startPage' => $paged,
					'maxPages' => $max_num_pages,
					'nextLink' => next_posts($max_num_pages, false),
					'container' => '#portfolio-page > .works-list, #grid-folio, #grid-posts, .dfd-news-layout #main-content .row, .dfd-portfolio-wrap #dfd-portfolio-loop, .dfd-blog-wrap #dfd-blog-loop, .dfd-gallery-wrap #dfd-gallery-loop',
				)
			);

			wp_enqueue_script('dfd-lazy-load');

			$lazy_load_pagination_image_html = '';

			if(isset($dfd_ronneby['lazy_load_pagination_image']['url']) && !empty($dfd_ronneby['lazy_load_pagination_image']['url'])) {
				$lazy_load_pagination_image_html .= '<img src="'. esc_url($dfd_ronneby['lazy_load_pagination_image']['url']).'" alt="'.esc_attr__('Lazy load image', 'dfd') .'" />';
			}

			$post_type = get_post_type();

			if($post_type == 'post') {
				wp_enqueue_style('dfd_zencdn_video_css');
				wp_enqueue_script('dfd_zencdn_video_js');
			}

			echo '<div class="dfd-lazy-load-pop-up box-name">'.wp_kses_post($lazy_load_pagination_image_html).'</div><!--// end .pagination -->';
		}
	}
}