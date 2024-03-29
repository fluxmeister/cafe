<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.10
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $wp_query;

$prepend      = '';
$permalinks   = get_option( 'woocommerce_permalinks' );
if(function_exists('wc_get_page_id')) {
	$shop_page_id = wc_get_page_id( 'shop' );
} else {
	$shop_page_id = woocommerce_get_page_id( 'shop' );
}
$shop_page    = get_post( $shop_page_id );
$delimiter    = '<span class="del"></span>';

// If permalinks contain the shop page in the URI prepend the breadcrumb with shop
if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . ( isset($shop_page->post_name) ? $shop_page->post_name : '' ) ) && get_option( 'page_on_front' ) !== $shop_page_id ) {
	$prepend = $before . '<a href="' . get_permalink( $shop_page ) . '">' . ( isset($shop_page->post_title) ? $shop_page->post_title : '' ) . '</a> ' . $after . $delimiter;
}

if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && get_option( 'page_on_front' ) == $shop_page_id ) ) || is_paged() ) {

	echo wp_kses_post($wrap_before);

	if ( ! empty( $home ) ) {
		echo wp_kses_post($before . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) . '">' . $home . '</a>' . $after . $delimiter);
	}

	if ( is_category() ) {

		$cat_obj = $wp_query->get_queried_object();
		$this_category = get_category( $cat_obj->term_id );

		if ( $this_category->parent != 0 ) {
			$parent_category = get_category( $this_category->parent );
			echo get_category_parents($parent_category, TRUE, $delimiter );
		}

		echo wp_kses_post($before . single_cat_title( '', false ) . $after);

	} elseif ( is_tax('product_cat') ) {

		echo wp_kses_post($prepend);
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		$parents = array();
		$parent = $term->parent;
		while ( $parent ) {
			$parents[] = $parent;
			$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ) );
			$parent = $new_parent->parent;
		}

		if ( ! empty( $parents ) ) {
			$parents = array_reverse( $parents );
			foreach ( $parents as $parent ) {
				$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
				echo wp_kses_post($before .  '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . esc_html( $item->name ) . '</a>' . $after . $delimiter);
			}
		}

		$queried_object = $wp_query->get_queried_object();
		echo wp_kses_post($before . esc_html( $queried_object->name ) . $after);

	} elseif ( is_tax('product_tag') ) {

		$queried_object = $wp_query->get_queried_object();
		echo wp_kses_post($prepend . $before . esc_html__( 'Products tagged &ldquo;', 'dfd' ) . $queried_object->name . '&rdquo;' . $after);

	} elseif ( is_day() ) {

		echo wp_kses_post($before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter);
		echo wp_kses_post($before . '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $after . $delimiter);
		echo wp_kses_post($before . get_the_time('d') . $after);

	} elseif ( is_month() ) {

		echo wp_kses_post($before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter);
		echo wp_kses_post($before . get_the_time('F') . $after);

	} elseif ( is_year() ) {

		echo wp_kses_post($before . get_the_time('Y') . $after);

	} elseif ( is_post_type_archive('product') && get_option('page_on_front') !== $shop_page_id ) {

		$_name = $shop_page_id ? get_the_title( $shop_page_id ) : '';

		if ( ! $_name ) {
			$product_post_type = get_post_type_object( 'product' );
			$_name = $product_post_type->labels->singular_name;
		}

		if ( is_search() ) {

			echo wp_kses_post($before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'dfd' ) . get_search_query() . '&rdquo;' . $after);

		} elseif ( is_paged() ) {

			echo wp_kses_post($before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after);

		} else {

			echo wp_kses_post($before . $_name . $after);

		}

	} elseif ( is_single() && !is_attachment() ) {

		if ( get_post_type() == 'product' ) {

			echo wp_kses_post($prepend);

			if ( $terms = wp_get_object_terms( $post->ID, 'product_cat' ) ) {
				$term = current( $terms );
				$parents = array();
				$parent = $term->parent;

				while ( $parent ) {
					$parents[] = $parent;
					$new_parent = get_term_by( 'id', $parent, 'product_cat' );
					$parent = $new_parent->parent;
				}

				if ( ! empty( $parents ) ) {
					$parents = array_reverse($parents);
					foreach ( $parents as $parent ) {
						$item = get_term_by( 'id', $parent, 'product_cat');
						echo wp_kses_post($before . '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . $item->name . '</a>' . $after . $delimiter);
					}
				}

				echo wp_kses_post($before . '<a href="' . get_term_link( $term->slug, 'product_cat' ) . '">' . $term->name . '</a>' . $after . $delimiter);

			}

			echo wp_kses_post($before . get_the_title() . $after);

		} elseif ( get_post_type() != 'post' ) {

			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
				echo wp_kses_post($before . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $after . $delimiter);
			echo wp_kses_post($before . get_the_title() . $after);

		} else {

			$cat = current( get_the_category() );
			echo get_category_parents( $cat, true, $delimiter );
			echo wp_kses_post($before . get_the_title() . $after);

		}

	} elseif ( is_404() ) {

		echo wp_kses_post($before . esc_html__( 'Error 404', 'dfd' ) . $after);

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

		$post_type = get_post_type_object( get_post_type() );

		if ( $post_type )
			echo wp_kses_post($before . $post_type->labels->singular_name . $after);

	} elseif ( is_attachment() ) {

		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];
		echo get_category_parents( $cat, true, '' . $delimiter );
		echo wp_kses_post($before . '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $after . $delimiter);
		echo wp_kses_post($before . get_the_title() . $after);

	} elseif ( is_page() && !$post->post_parent ) {

		echo wp_kses_post($before . get_the_title() . $after);

	} elseif ( is_page() && $post->post_parent ) {

		$parent_id  = $post->post_parent;
		$breadcrumbs = array();

		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id  = $page->post_parent;
		}

		$breadcrumbs = array_reverse( $breadcrumbs );

		foreach ( $breadcrumbs as $crumb )
			echo wp_kses_post($crumb . '' . $delimiter);

		echo wp_kses_post($before . get_the_title() . $after);

	} elseif ( is_search() ) {

		echo wp_kses_post($before . esc_html__( 'Search results for &ldquo;', 'dfd' ) . get_search_query() . '&rdquo;' . $after);

	} elseif ( is_tag() ) {

			echo wp_kses_post($before . esc_html__( 'Posts tagged &ldquo;', 'dfd' ) . single_tag_title('', false) . '&rdquo;' . $after);

	} elseif ( is_author() ) {

		$userdata = get_userdata($author);
		echo wp_kses_post($before . esc_html__( 'Author:', 'dfd' ) . ' ' . $userdata->display_name . $after);

	}

	if ( get_query_var( 'paged' ) )
		echo ' (' . esc_html__( 'Page', 'dfd' ) . ' ' . get_query_var( 'paged' ) . ')';

	echo wp_kses_post($wrap_after);

}