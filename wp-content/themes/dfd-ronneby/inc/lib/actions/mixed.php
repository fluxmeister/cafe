<?php
if(!defined('ABSPATH')) {
	exit;
}

if(!class_exists('Dfd_Mixed_Actions')) {
	class Dfd_Mixed_Actions {
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
			add_action('switch_theme', array($this, 'switchTheme'));
			add_action('after_setup_theme', array($this, 'initMenu'));
			add_action('widgets_init', array($this, 'widgetsInit'));
		}
		public function filters() {
			add_filter('use_default_gallery_style' , array($this, 'useDefaultGalleryStyleFilter'));
		}
		public function switchTheme() {
			update_option('image_default_link_type', 'none' );
			update_option('image_default_size', 'large' );
			update_option('yith_wcwl_button_position', 'shortcode');
			$custom_row_class = get_option('ultimate_custom_vc_row');
			if(!$custom_row_class) {
				update_option('ultimate_custom_vc_row', 'vc-row-wrapper');
			}
		}
		public function initMenu() {
			require_once get_template_directory().'/inc/lib/menu/mega_menu.php';
			if(is_admin()) {
				require_once get_template_directory().'/inc/lib/menu/edit_mega_menu_walker.php';
			} else {
				require_once get_template_directory().'/inc/lib/menu/front_mega_menu_walker.php';
			}

			$class = DFD_MEGA_MENU_CLASS;
			$mega_menu = new $class();
		}
		public function useDefaultGalleryStyleFilter($existing_code) {
			return false;
		}
		public function widgetsInit() {
			register_sidebar(array(
				'name' => esc_attr__('Left Sidebar', 'dfd'),
				'id' => 'sidebar-left',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Right Sidebar', 'dfd'),
				'id' => 'sidebar-right',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Footer column 1', 'dfd'),
				'id' => 'sidebar-footer-col1',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Footer column 2', 'dfd'),
				'id' => 'sidebar-footer-col2',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Footer column 3', 'dfd'),
				'id' => 'sidebar-footer-col3',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Footer column 4', 'dfd'),
				'id' => 'sidebar-footer-col4',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Sidebar for shop. Product page', 'dfd'),
				'id' => 'shop-sidebar',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Sidebar for shop left. Product list', 'dfd'),
				'id' => 'shop-sidebar-product-list-left',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Sidebar for shop right. Product list', 'dfd'),
				'id' => 'shop-sidebar-product-list',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('BBPress right', 'dfd'),
				'id' => 'sidebar-bbres-right',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_attr__('Side Area', 'dfd'),
				'id' => 'sidebar-sidearea',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}
	}
	
	$Dfd_Mixed_Actions = new Dfd_Mixed_Actions();
}

if(!class_exists('Dfd_Ronneby_Front_Helpers')) {
	class Dfd_Ronneby_Front_Helpers {
		public static function columnClassMaker($count = 1) {
			if($count % 3 == 0) {
				return 'third-size';
			} elseif($count % 2 == 0) {
				return 'half-size';
			} else {
				return 'full-width';
			}
		}
		public static function numToString( $str = 1){
			$arr = array(1 => 'twelve', 'six', 'four', 'three');

			if( isset($arr[$str]) ) {
				return $arr[$str];
			} else {
				return 'twelve';
			}
		}
		public static function numToStringFull( $str = 1, $reversal = false){
			$arr = array( 1 => 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', );

			if( isset($arr[$str]) && !$reversal ) {
				return $arr[$str];
			}elseif( isset($arr[$str]) && $reversal && 0 != 12 - $str ) {
				return $arr[12 - $str];
			} else {
				return 'twelve';
			}
		}
		public static function youtubeCounter() {
			$youtube_link = @parse_url($channel_link);
			$subs = 0;
			
			$cachetime = (isset($dfd_ronneby['cachetime']) && $dfd_ronneby['cachetime']) ? ((int) $dfd_ronneby['cachetime'] * 60) : (60 * 60 * 1);

			if ( false === ( $subs = get_transient('youtube_subs_cache') ) ) {
				if(!empty($youtube_link['host']) && ($youtube_link['host'] == 'www.youtube.com' || $youtube_link['host']  == 'youtube.com')) {
					try {
						$youtube_name = substr(@parse_url($channel_link, PHP_URL_PATH), 9);
						$json = @self::subscribeCounter("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$youtube_name."&key=".$api_key);
						$data = json_decode($json, true);

						$subs = intval($data['items'][0]['statistics']['subscriberCount']);
					} catch (Exception $e) {
						$subs = 0;
					}

					set_transient( 'youtube_subs_cache', $subs, $cachetime );
				}
			}

			return $subs;
		}
		public static function facebookCounter($facebook_page, $facebook_access_token) {
//			global $dfd_ronneby;
//			$cachetime = (isset($dfd_ronneby['cachetime']) && $dfd_ronneby['cachetime']) ? ((int) $dfd_ronneby['cachetime'] * 60) : (60 * 60 * 1);
//		
//			$api_url = 'https://graph.facebook.com';
//			if(empty($page_id)) {
//				$page_id = '100007429063653';
//			}
//			if(empty($app_id)) {
//				$app_id = '1305760362801157';
//			}
//			if(empty($token)) {
//				$token = '3d0ddfafdfc886fa8075d4a5992c25b7';
//			}
//			$url = sprintf(
//				'%s/oauth/access_token?client_id=%s&client_secret=%s&grant_type=client_credentials',
//				$api_url,
//				sanitize_text_field($app_id),
//				sanitize_text_field($token)
//			);
//			
//			$access_token = wp_remote_get($url, array('timeout' => 60));
//			
//			if (is_wp_error($access_token) || (isset($access_token['response']['code']) && 200 != $access_token['response']['code'])) {
//				return get_transient('facebook_fans_cache') ? get_transient('facebook_fans_cache') : 0;
//			} else {
//				$access_token = json_decode($access_token['body'], true);
//				if(!isset($access_token['access_token'])) {
//					return get_transient('facebook_fans_cache') ? get_transient('facebook_fans_cache') : 0;
//				} else {
//					$access_token = sanitize_text_field( $access_token['access_token'] );
//				}
//			}
//			
//			$url = sprintf(
//				'%s%s/friends?fields=fan_count&summery=true&access_token=%s',
//				$api_url . '/v2.8/',
//				sanitize_text_field($page_id),
//				$access_token
//			);
//
//			$connection = wp_remote_get($url, array('timeout' => 60 ));
//
//			if (is_wp_error($connection) || (isset($connection['response']['code']) && 200 != $connection['response']['code'])) {
//				return get_transient( 'facebook_fans_cache') ? get_transient( 'facebook_fans_cache') : 0;
//			} else {
//				$_data = json_decode($connection['body'], true);
//
//				if (isset($_data['summary']['total_count'])) {
//					$count = intval($_data['summary']['total_count']);
//
//					$fans = $count;
//				} else {
//					return get_transient('facebook_fans_cache') ? get_transient('facebook_fans_cache') : 0;
//				}
//			}
//			
//			set_transient('facebook_fans_cache', $fans, $cachetime);
			
			$url = 'https://graph.facebook.com/v3.2/'.$facebook_page.'?fields=fan_count&access_token='.$facebook_access_token;
			$connection = wp_remote_get( $url, array( 'timeout' => 60 ) );

			if ( is_wp_error( $connection ) || ( isset( $connection['response']['code'] ) && 200 != $connection['response']['code'] ) ) {
				return get_transient( 'facebook_fans_cache') ? get_transient( 'facebook_fans_cache') : 0;
			} else {
				$_data = json_decode( $connection['body'], true );
				if ( isset( $_data['fan_count'] ) ) {
					$count = intval( $_data['fan_count'] );
					$fans = $count;
				} else {
					return get_transient( 'facebook_fans_cache') ? get_transient( 'facebook_fans_cache') : 0;
				}
			}
	
			return $fans;
		}
		public static function twitterCounter() {
			if(!class_exists('DFDTwitter')) {
				return;
			}
			global $dfd_ronneby;
			$twitter_username = isset($dfd_ronneby['username']) ? $dfd_ronneby['username'] : '';

			$r['page_url'] = 'http://www.twitter.com/'.$twitter_username;

			try {
				$twitter = new DFDTwitter();
				$r['followers_count'] = $twitter->getFollowersCount();
			} catch (Exception $e) {
				$r['followers_count'] = 0;
			}

			return $r;
		}
		public static function subscribeCounter() {
			$data_buf = wp_remote_get($xml_url, array('sslverify' => false));
			if (!is_wp_error($data_buf) && isset($data_buf['body'])) {
				return $data_buf['body'];
			}
		}
		public static function setLayout($page, $open = true) {
			global $dfd_ronneby;
			$page = isset($dfd_ronneby[$page . '_layout']) && !empty($dfd_ronneby[$page . '_layout']) ? $dfd_ronneby[$page . '_layout'] : '1col-fixed';

			switch($page) {
				case '3c-l-fixed':
					$cr_layout = 'sidebar-left2';
					$cr_width = 'six dfd-eq-height';
					break;
				case '3c-r-fixed':
					$cr_layout = 'sidebar-right2';
					$cr_width = 'six dfd-eq-height';
					break;
				case '2c-l-fixed':
					$cr_layout = 'sidebar-left';
					$cr_width = 'nine dfd-eq-height';
					break;
				case '2c-r-fixed':
					$cr_layout = 'sidebar-right';
					$cr_width = 'nine dfd-eq-height';
					break;
				case '3c-fixed':
					$cr_layout = 'sidebar-both';
					$cr_width = 'six dfd-eq-height';
					break;
				case '1col-fixed':
				default:
					$cr_layout = '';
					$cr_width = 'twelve';
			}

			if ($open) {

				// Open content wrapper


				echo '<div class="blog-section ' . esc_attr($cr_layout) . '">';
				echo '<section id="main-content" role="main" class="' . $cr_width . ' columns">';


			} else {

				// Close content wrapper

				echo ' </section>';

				if (($page == "2c-l-fixed") || ($page == "3c-fixed")) {
					get_template_part('templates/sidebar', 'left');
					echo ' </div>';
				}
				if (($page == "3c-l-fixed")){
					get_template_part('templates/sidebar', 'right');
					echo ' </div>';
					get_template_part('templates/sidebar', 'left');
				}
				if ($page == "3c-r-fixed"){
					get_template_part('templates/sidebar', 'left');
					echo ' </div>';
				}
				if (($page == "2c-r-fixed") || ($page == "3c-fixed") || ($page == "3c-r-fixed") ) {
					get_template_part('templates/sidebar', 'right');
				}
				echo '</div>';
			}
		}
		public static function cutString($string = '', $maxlen=100) {
			if(!function_exists('mb_strlen') || !function_exists('mb_strripos') || !function_exists('mb_substr')) {
				return $string;
			}
			$len = (mb_strlen($string) > $maxlen)
				? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
				: $maxlen
			;

			$cutStr = mb_substr($string, 0, $len);
			return (mb_strlen($string) > $maxlen)
				? $cutStr . '...'
				: $cutStr
			;
		}
	}
}