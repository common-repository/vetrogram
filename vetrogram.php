<?php
/*
Plugin Name: Vetrogram
Plugin URI: http://plugins.vetrotheme.com/vetrogram/
Description: A plugin for presenting your latest instagram posts in Wordpress.
Version: 1.0.0
Author: VetroTheme
Author URI: http://vetrotheme.com
Text Domain: vetrogram
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function vtg_init()
{
	load_plugin_textdomain('vetrogram', plugin_dir_path(__FILE__) . '/languages');

}
add_action('init', 'vtg_init');

require_once (plugin_dir_path(__FILE__) . '/google-fonts.php');

require_once (plugin_dir_path(__FILE__) . '/admin/options.php');


if (!function_exists('vtg_init_style')) {
	function vtg_init_style()
	{
		wp_enqueue_style('vtg-style', plugin_dir_url(__FILE__) . 'css/vetrogram.min.css');
	}

	add_action('wp_enqueue_scripts', 'vtg_init_style');
}

if (!function_exists('vtg_init_scripts')) {
	function vtg_init_scripts()
	{
		wp_enqueue_script('vtg-default', plugin_dir_url(__FILE__) . 'js/vetrogram.min.js', array(
			'jquery'
		) , NULL, true);
		wp_enqueue_script('vtg-waitforimages', plugin_dir_url(__FILE__) . 'js/jquery.waitforimages.js', array(
			'jquery'
		) , NULL, true);
		wp_register_script('vtg-isotope', plugin_dir_url(__FILE__) . 'js/isotope.pkgd.min.js', array(
			'jquery'
		) , NULL, true);
	}

	add_action('wp_enqueue_scripts', 'vtg_init_scripts');
}

function vtg_format_large_number($number)
{
	if ($number > 10000000) {
		$number = round($number / 1000000) . 'm';
	}
	elseif ($number > 1000000) {
		$number = round(($number / 1000000) , 1) . 'm';
	}
	elseif ($number > 100000) {
		$number = round($number / 1000) . 'k';
	}
	elseif ($number > 10000) {
		$number = round(($number / 1000) , 1) . 'k';
	}
	else {
		$number = number_format($number);
	}

	return $number;
}

if (!function_exists('vtg_get_excerpt')) {
	function vtg_get_excerpt($length = - 1, $content = null)
	{
		$content = preg_replace(" (\[.*?\])", '', $content);
		$content = strip_shortcodes($content);
		$content = strip_tags($content);
		if (strlen($content) > $length && $length > - 1) {
			$content = substr($content, 0, $length);
			$content = substr($content, 0, strripos($content, " "));
			$content = trim(preg_replace('/\s+/', ' ', $content));
			$content = $content . '...';
		}

		return $content;
	}
}

if (!function_exists('vtg_enqueue_font')) {
	function vtg_enqueue_font($font_family)
	{
		$font_name = str_replace(' ', '+', $font_family);
		$font_id = 'vtg-google-font-' . strtolower(str_replace(' ', '-', $font_family));
		$font_url = 'http://fonts.googleapis.com/css?family=' . $font_name . ':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';
		wp_enqueue_style($font_id, $font_url);
	}
}

if (!function_exists('vtg_get_size')) {
	function vtg_get_size($sizes)
	{
		$sizes = explode(' ', $sizes);
		foreach($sizes as $size) {
			if ($size != '' && strpos($size, '%') === false && strpos($size, '#') === false && strpos($size, 'rgb') === false) {
				$size = intval($size);
				if ($size != '0') {
					$output[] = $size . 'px';
				}
				else {
					$output[] = '0';
				}
			}
			elseif ($size == 'inset' or strpos($size, '%') !== false or strpos($size, '#') !== false or strpos($size, 'rgb') !== false) {
				$output[] = $size;
			}
		}

		if ($output) {
			$output = implode(' ', $output);
		}

		return $output;
	}
}
$GLOBALS['vtg_pagination'] = 0;
if (!function_exists('vetrogram_shortcode')) {
	function vetrogram_shortcode($atts)
	{
		extract(shortcode_atts(array(
			'css_class' => '',
			'username' => '',
			'show_bio' => '',
			'show_statistic' => '',
			'show_avatar' => '',
			'show_name' => '',
			'show_website' => '',
			'website_letter_spacing' => '',
			'website_font_size' => '',
			'website_font_weight' => '',
			'website_font_family' => '',
			'website_color' => '',
			'website_icon_color' => '',
			'show_profile' => '',
			'show_post_details' => '',
			'profile_align' => 'center',
			'profile_style' => 'one',
			'posts_per_page' => 12,
			'enable_pagination' => '',
			'style' => '',
			'column' => 'four-column',
			'pagination_style' => '',
			'loadmore_text' => '',
			'column_margin' => '',
			'loadmore_background_color' => '',
			'loadmore_font_family' => '',
			'loadmore_font_size' => '',
			'loadmore_font_weight' => '',
			'loadmore_font_color' => '',
			'loadmore_letter_spacing' => '',
			'loadmore_text_transform' => '',
			'loadmore_border_width' => '',
			'loadmore_border_color' => '',
			'loadmore_border_radius' => '',
			'loadmore_background_hover_color' => '',
			'loadmore_font_hover_color' => '',
			'loadmore_border_hover_color' => '',
			'loading_icon_color' => '',
			'loading_icon_size' => '',
			'post_border_radius' => '',
			'post_details_icons_color' => '',
			'post_details_icons_size' => '',
			'post_details_number_letter_spacing' => '',
			'post_details_number_font_size' => '',
			'post_details_number_font_weight' => '',
			'post_details_number_font_family' => '',
			'post_details_number_color' => '',
			'post_cover_color' => '',
			'post_cover_border_color' => '',
			'post_cover_border_size' => '',
			'name_letter_spacing' => '',
			'name_font_size' => '',
			'name_font_weight' => '',
			'name_text_transform' => '',
			'name_font_family' => '',
			'name_color' => '',
			'bio_letter_spacing' => '',
			'bio_font_size' => '',
			'bio_font_weight' => '',
			'bio_text_transform' => '',
			'bio_font_family' => '',
			'bio_color' => '',
			'avatar_size' => '',
			'avatar_border_radius' => '',
			'statistic_letter_spacing' => '',
			'statistic_font_size' => '',
			'statistic_font_family' => '',
			'statistic_label_text_transform' => '',
			'statistic_label_color' => '',
			'statistic_label_font_weight' => '',
			'statistic_count_color' => '',
			'statistic_count_font_weight' => '',
		) , $atts));
		$uniqid = uniqid();
		wp_enqueue_script('jquery');
		if ($css_class != '') $css_class = ' ' . $css_class;
		if ($style == 'masonry') wp_enqueue_script('vtg-isotope');

		// Avatar Styles

		if ($avatar_size) {
			$avatar_style[] = 'height:' . vtg_get_size(intval($avatar_size));
			$avatar_style[] = 'width:' . vtg_get_size(intval($avatar_size));
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-profile-holder.style-two .vtg-desc-holder {max-width: calc(100% - ' . vtg_get_size(intval($avatar_size) + 20) . ');}';
		}

		if ($avatar_border_radius) {
			$avatar_style[] = 'border-radius:' . vtg_get_size($avatar_border_radius);
		}

		if ($avatar_style) {
			$avatar_style = implode(';', $avatar_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-avatar-holder img {' . $avatar_style . ';}';
		}

		// Name Styles

		if ($name_font_family) {
			vtg_enqueue_font($name_font_family);
			$name_style[] = $username_style[] = 'font-family:\'' . $name_font_family . '\'';
		}

		if ($name_letter_spacing) {
			$name_style[] = 'letter-spacing:' . vtg_get_size($name_letter_spacing);
		}

		if ($name_font_size) {
			$name_style[] = 'font-size:' . vtg_get_size($name_font_size);
			$username_style[] = 'font-size:' . vtg_get_size(round(intval($name_font_size) * 0.7));
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-name-holder {margin-bottom:' . vtg_get_size(round(intval($name_font_size) * 0.2)) . ';}';
		}

		if ($name_font_weight) {
			$name_style[] = $username_style[] = 'font-weight:' . $name_font_weight;
		}

		if ($name_text_transform) {
			$name_style[] = 'text-transform:' . $name_text_transform;
		}

		if ($name_color) {
			$name_style[] = 'color:' . $name_color;
			$username_style[] = 'color:' . $name_color.' !important';
		}

		if ($name_style) {
			$name_style = implode(';', $name_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-name-holder .vtg-name {' . $name_style . ';}';
			$username_style = implode(';', $username_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-name-holder a {' . $username_style . ';}';
		}

		// Bio Styles

		if ($bio_font_family) {
			vtg_enqueue_font($bio_font_family);
			$bio_style[] = 'font-family:\'' . $bio_font_family . '\'';
		}

		if ($bio_letter_spacing) {
			$bio_style[] = 'letter-spacing:' . vtg_get_size($bio_letter_spacing);
		}

		if ($bio_font_size) {
			$bio_style[] = 'font-size:' . vtg_get_size($bio_font_size);
		}

		if ($bio_font_weight) {
			$bio_style[] = 'font-weight:' . $bio_font_weight;
		}

		if ($bio_text_transform) {
			$bio_style[] = 'text-transform:' . $bio_text_transform;
		}

		if ($bio_color) {
			$bio_style[] = 'color:' . $bio_color;
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-bio a {color:' . $bio_color . ' !important;}';
		}

		if ($bio_style) {
			$bio_style = implode(';', $bio_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-bio {' . $bio_style . ';}';
		}

		// Website Link Styles

		if ($website_font_family) {
			vtg_enqueue_font($website_font_family);
			$website_style[] = 'font-family:\'' . $website_font_family . '\'';
		}

		if ($website_letter_spacing) {
			$website_style[] = 'letter-spacing:' . vtg_get_size($website_letter_spacing);
		}

		if ($website_font_size) {
			$website_style[] = 'font-size:' . vtg_get_size($website_font_size);
		}

		if ($website_font_weight) {
			$website_style[] = 'font-weight:' . $website_font_weight;
		}

		if ($website_color) {
			$website_style[] = 'color:' . $website_color . ' !important';
		}

		if ($website_style) {
			$website_style = implode(';', $website_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-bio .vtg-website {' . $website_style . ';}';
		}

		if ($website_icon_color) {
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-bio .vtg-website:before {color:' . $website_icon_color . ' !important;}';
		}

		// Statistics Styles

		if ($statistic_font_family) {
			vtg_enqueue_font($statistic_font_family);
			$statistic_style[] = 'font-family:\'' . $statistic_font_family . '\'';
		}

		if ($statistic_letter_spacing) {
			$statistic_style[] = 'letter-spacing:' . vtg_get_size($statistic_letter_spacing);
		}

		if ($statistic_font_size) {
			$statistic_style[] = 'font-size:' . vtg_get_size($statistic_font_size);
		}

		if ($statistic_style) {
			$statistic_style = implode(';', $statistic_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-statistic li {' . $statistic_style . ';}';
		}

		if ($statistic_label_font_weight) {
			$statistic_label_style[] = 'font-weight:' . $statistic_label_font_weight;
		}

		if ($statistic_label_text_transform) {
			$statistic_label_style[] = 'text-transform:' . $statistic_label_text_transform;
		}

		if ($statistic_label_color) {
			$statistic_label_style[] = 'color:' . $statistic_label_color;
		}

		if ($statistic_label_style) {
			$statistic_label_style = implode(';', $statistic_label_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-statistic li .label {' . $statistic_label_style . ';}';
		}

		if ($statistic_count_font_weight) {
			$statistic_count_style[] = 'font-weight:' . $statistic_count_font_weight;
		}

		if ($statistic_count_color) {
			$statistic_count_style[] = 'color:' . $statistic_count_color;
		}

		if ($statistic_count_style) {
			$statistic_count_style = implode(';', $statistic_count_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-statistic li .count {' . $statistic_count_style . ';}';
		}

		// Post Styles

		if ($column_margin) {
			$column_margin = intval($column_margin) / 2;
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner {margin:-' . vtg_get_size($column_margin) . ';}';
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post {padding:' . vtg_get_size($column_margin) . ';}';
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-profile-holder {padding-bottom:' . vtg_get_size(round(37 + ($column_margin / 2))) . ';}';
			if ($column_margin * 2 > 30) {
				$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-pagination {margin-top:' . vtg_get_size($column_margin * 2) . ';}';
			}
		}

		if ($post_border_radius) {
			$post_cover_border_size = $post_cover_border_size != '' ? intval($post_cover_border_size) : 5;
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-image-holder {border-radius:' . vtg_get_size(intval($post_border_radius)) . ';}';
			if ($post_border_radius > $post_cover_border_size) {
				$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post .vtg-post-cover-holder {border-radius:' . vtg_get_size(intval($post_border_radius) - intval($post_cover_border_size)) . ';}';
			}
		}

		if ($post_cover_color) {
			$post_cover_style[] = 'background:' . $post_cover_color;
		}

		if ($post_cover_border_color) {
			$post_cover_style[] = 'color:' . $post_cover_border_color;
		}

		if ($post_cover_border_size) {
			$post_cover_border_size = vtg_get_size(intval($post_cover_border_size));
			$post_cover_style[] = 'box-shadow: 0 0 0 ' . $post_cover_border_size;
			$post_cover_style[] = 'top: ' . $post_cover_border_size;
			$post_cover_style[] = 'right: ' . $post_cover_border_size;
			$post_cover_style[] = 'bottom: ' . $post_cover_border_size;
			$post_cover_style[] = 'left: ' . $post_cover_border_size;
		}

		if ($post_cover_style) {
			$post_cover_style = implode(';', $post_cover_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post .vtg-post-cover-holder {' . $post_cover_style . ';}';
		}

		// Post Details Numbers

		if ($post_details_number_font_family) {
			vtg_enqueue_font($post_details_number_font_family);
			$post_details_number_style[] = 'font-family:\'' . $post_details_number_font_family . '\'';
		}

		if ($post_details_number_letter_spacing) {
			$post_details_number_style[] = 'letter-spacing:' . vtg_get_size($post_details_number_letter_spacing);
		}

		if ($post_details_number_font_size) {
			$post_details_number_style[] = 'font-size:' . vtg_get_size($post_details_number_font_size);
		}

		if ($post_details_number_font_weight) {
			$post_details_number_style[] = 'font-weight:' . $post_details_number_font_weight;
		}

		if ($post_details_number_color) {
			$post_details_number_style[] = 'color:' . $post_details_number_color;
		}

		if ($post_details_number_style) {
			$post_details_number_style = implode(';', $post_details_number_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-comments-holder span, #vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-likes-holder span, #vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-views-holder span {' . $post_details_number_style . ';}';
		}

		// Post Details Icons

		if ($post_details_icons_size) {
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-comments-holder i{font-size:' . vtg_get_size(round(intval($post_details_icons_size) * 1.1)) . ';}';
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-likes-holder i{font-size:' . vtg_get_size($post_details_icons_size) . ';}';
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-views-holder i {font-size:' . vtg_get_size(round(intval($post_details_icons_size) * 1.9)) . ';}';
		}

		if ($post_details_icons_color) {
			$custom_style.= '#vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-comments-holder i, #vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-likes-holder i, #vetrogram-' . $uniqid . ' .vetrogram-inner .vtg-post-views-holder i {color:' . $post_details_icons_color . ';}';
		}

		// Loadmore Button Styles

		if ($pagination_style == 'load-more-button') {
			if ($loadmore_background_color) {
				$loadmore_button_style[] = 'background:' . $loadmore_background_color;
			}

			if ($loadmore_text_transform) {
				$loadmore_button_style[] = 'text-transform:' . $loadmore_text_transform;
			}

			if ($loadmore_border_color) {
				$loadmore_button_style[] = 'border-color:' . $loadmore_border_color . ' !important';
			}

			if ($loadmore_border_width) {
				$loadmore_button_style[] = 'border-width:' . vtg_get_size($loadmore_border_width) . ' !important';
			}

			if ($loadmore_letter_spacing) {
				$loadmore_button_style[] = 'letter-spacing:' . vtg_get_size($loadmore_letter_spacing);
			}

			if ($loadmore_border_radius) {
				$loadmore_button_style[] = 'border-radius:' . vtg_get_size($loadmore_border_radius);
			}

			if ($loadmore_font_family) {
				vtg_enqueue_font($loadmore_font_family);
				$loadmore_button_style[] = 'font-family:\'' . $loadmore_font_family . '\'';
			}

			if ($loadmore_font_weight) {
				$loadmore_button_style[] = 'font-weight:' . $loadmore_font_weight;
			}

			if ($loadmore_font_color) {
				$loadmore_button_style[] = 'color:' . $loadmore_font_color;
			}

			if ($loadmore_font_size) {
				$loadmore_button_style[] = 'font-size:' . vtg_get_size($loadmore_font_size);
			}

			if ($loadmore_button_style) {
				$loadmore_button_style = implode(';', $loadmore_button_style);
				$custom_style.= '#vetrogram-' . $uniqid . '.vetrogram .vtg-loadmore {' . $loadmore_button_style . ';}';
			}

			if ($loadmore_background_hover_color) {
				$loadmore_hover_style[] = 'background:' . $loadmore_background_hover_color;
			}

			if ($loadmore_border_hover_color) {
				$loadmore_hover_style[] = 'border-color:' . $loadmore_border_hover_color . ' !important';
			}

			if ($loadmore_font_hover_color) {
				$loadmore_hover_style[] = 'color:' . $loadmore_font_hover_color;
			}

			if ($loadmore_hover_style) {
				$loadmore_hover_style = implode(';', $loadmore_hover_style);
				$custom_style.= '#vetrogram-' . $uniqid . '.vetrogram .vtg-loadmore:hover {' . $loadmore_hover_style . ';}';
			}
		}

		// Loading Icon Styles

		if ($loading_icon_size) {
			$loading_icon_style[] = 'font-size:' . vtg_get_size($loading_icon_size);
		}

		if ($loading_icon_color) {
			$loading_icon_style[] = 'color:' . $loading_icon_color;
		}

		if ($loading_icon_style) {
			$loading_icon_style = implode(';', $loading_icon_style);
			$custom_style.= '#vetrogram-' . $uniqid . ' .vtg-loading i {' . $loading_icon_style . ';}';
		}

		// OUTPUT

		if ($username != '') {
			$GLOBALS['vtg_pagination']++;
			$pagination_id = 'instagram' . $GLOBALS['vtg_pagination'] . '_';
			$max_id = $_GET[$pagination_id . 'max_id'] ? '?max_id=' . $_GET[$pagination_id . 'max_id'] : '';
			$page = $_GET[$pagination_id . 'page'] ? intval($_GET[$pagination_id . 'page']) : 1;
			$pages = ceil($posts_per_page / 12);
			$i = 1;
			$username = strtolower(str_replace('@', '', $username));
			for ($x = 1; $x <= $pages; $x++) {
				$content = wp_remote_get('https://instagram.com/' . $username . $max_id);
				if (!is_wp_error($content)) {
					$content = wp_remote_retrieve_body($content);
					$content = explode('window._sharedData = ', $content);
					$content = explode(';</script>', $content[1]);
					$content = json_decode($content[0], TRUE);
					$user = $content['entry_data']['ProfilePage'][0]['user'];
					if ($user['username'] != '') {
						if (!$user['is_private']) {
							if ($x == 1) {
								$name = $user['full_name'];
								$website = $user['external_url'];
								if (substr($website, -1) == '/') $website = substr($website, 0, -1);
								$followers = vtg_format_large_number($user['followed_by']['count']);
								$following = vtg_format_large_number($user['follows']['count']);
								$avatar_src = $user['profile_pic_url'];
								if (intval($avatar_size) > 150) $avatar = str_replace('s150x150', 's320x320', $avatar);
								$bio = $user['biography'];
								$posts_count = $user['media']['count'];
							}

							foreach($user['media']['nodes'] as $image) {
								$images[] = array(
									'caption' => vtg_get_excerpt(50, $image['caption']) ,
									'src' => ($style == 'masonry' ? str_replace('e35', 'e35/s640x640', $image['display_src']) : $image['thumbnail_src']) ,
									'likes' => vtg_format_large_number($image['likes']['count']) ,
									'comments' => vtg_format_large_number($image['comments']['count']) ,
									'url' => $image['code'],
									'views' => $image['video_views'],
									'is_video' => $image['is_video'],
									'comments_disabled' => $image['comments_disabled'],
								);
								if ($i == $posts_per_page) {
									$last_id = $image['id'];
									break;
								}

								$i++;
							}

							$max_id = '/?max_id=' . $user['media']['page_info']['end_cursor'];
						}
						else {
							$output.= '<div class="vtg-error">' . __('This Account is Private.', 'vetrogram') . '</div>';
							break;
						}
					}
					else {
						$output.= '<div class="vtg-error">' . __('This user does not exist. Please check your Username.', 'vetrogram') . '</div>';
						break;
					}
				}
				else {
					$response = '404';
					break;
				}
			}

			if ($response != '404') {
				if (count($images) > 0) {
					$output.= '<div class="vetrogram vetrogram-' . $GLOBALS['vtg_pagination'] . $css_animation_class . $css_class . '" id="vetrogram-' . $uniqid . '">';
					if ($show_profile == 'yes') {
						$output.= '<div class="vtg-profile-holder vtg-align-' . $profile_align . ' style-' . $profile_style . '">';
						if ($show_avatar == 'yes') {
							$avatar.= '<div class="vtg-avatar-holder">';
							$avatar.= '<a href="https://instagram.com/' . $username . '"><img src="' . $avatar_src . '"></a>';
							$avatar.= '</div>'; // End div.vtg-avatar-holder
						}

						if ($profile_align == 'left' && $profile_style == 'two' or $profile_align == 'center' && $profile_style == 'two' or $profile_style == 'one') {
							$output.= $avatar;
						}

						if ($show_name == 'yes' or $show_bio == 'yes' or $show_statistic == 'yes') {
							$output.= '<div class="vtg-desc-holder">';
							if ($show_name == 'yes') {
								$output.= '<div class="vtg-name-holder">';
								$output.= '<h2 class="vtg-name">' . $name . '</h2>';
								$output.= '<a href="https://instagram.com/' . $username . '">@' . $username . '</a>';
								$output.= '</div>'; // End div.vtg-name-holder
							}

							if ($show_bio == 'yes' or $show_website == 'yes') {
								$output.= '<div class="vtg-bio">';
								if ($show_bio == 'yes') {
									$output.= '<span>' . preg_replace(array('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '/(^|\s)@(\w*[a-zA-Z_]+\w*)/') , array('\1<a href="https://www.instagram.com/explore/tags/\2">#\2</a>', '\1<a href="https://www.instagram.com/\2">@\2</a>') , $bio) . '</span>';
								}

								if ($website != '' && $show_website == 'yes') $output.= '<a class="vtg-website" href="' . $website . '">' . str_replace(array('https://', 'http://') , '', $website) . '</a>';
								$output.= '</div>'; // End div.vtg-bio
							}

							if ($show_statistic == 'yes') {
								$output.= '<ul class="vtg-statistic">';
								$output.= '<li><span class="label">' . __('Posts', 'vetrogram') . '</span><span class="count">' . vtg_format_large_number($posts_count) . '</span></li>';
								$output.= '<li><span class="label">' . __('Followers', 'vetrogram') . '</span><span class="count">' . $followers . '</span></li>';
								$output.= '<li><span class="label">' . __('Following', 'vetrogram') . '</span><span class="count">' . $following . '</span></li>';
								$output.= '</ul>'; // End ul.vtg-statistic
							}

							$output.= '</div>'; // End div.vtg-desc-holder
						}

						if ($profile_align == 'right' && $profile_style == 'two') {
							$output.= $avatar;
						}

						$output.= '</div>'; // End div.vtg-profile-holder
					}

					$output.= '<div class="vetrogram-holder">';
					$output.= '<div class="vetrogram-inner vtg-clearfix ' . $column . ($style == 'masonry' ? ' vtg-masonry-holder' : '') . '">';
					foreach($images as $image) {
						$output.= '<div class="vtg-post' . ($style == 'masonry' ? ' vtg-masonry-item' : '') . '">';
						$output.= '<a href="https://instagram.com/p/' . $image['url'] . '" class="vtg-post-inner">';
						$output.= '<div class="vtg-post-image-holder">';
						$output.= '<img src="' . $image['src'] . '" alt="">';
						$output.= '</div>'; // End div.vtg-post-image-holder
						if ($show_post_details == 'yes') {
							if ($image['is_video']) $output.= '<i class="vtg-icon vtg-icon-movie"></i>';
							$output.= '<div class="vtg-post-cover-holder">';
							$output.= '<div class="vtg-post-cover-inner">';
							if ($image['views'] != '' && $image['is_video']) {
								$output.= '<div class="vtg-post-views-holder">';
								$output.= '<i class="vtg-icon vtg-icon-controller-play"></i>';
								$output.= '<span>' . vtg_format_large_number($image['views']) . '</span>';
								$output.= '</div>'; // End div.vtg-post-likes-holder
							}
							else {
								$output.= '<div class="vtg-post-likes-holder">';
								$output.= '<i class="vtg-icon vtg-icon-heart"></i>';
								$output.= '<span>' . $image['likes'] . '</span>';
								$output.= '</div>'; // End div.vtg-post-likes-holder
							}

							if (!$image['comments_disabled']) {
								$output.= '<div class="vtg-post-comments-holder">';
								$output.= '<i class="vtg-icon vtg-icon-bubble"></i>';
								$output.= '<span>' . $image['comments'] . '</span>';
								$output.= '</div>'; // End div.vtg-post-comments-holder
							}

							$output.= '</div>'; // End div.vtg-post-cover-inner
							$output.= '</div>'; // End div.vtg-post-cover-holder
						}

						$output.= '</a>'; // a.vtg-post-inner
						$output.= '</div>'; // End div.vtg-post
					}

					$output.= '</div>'; // End div.vetrogram-inner
					$output.= '</div>'; // End div.vetrogram-holder
					if ($posts_count > (($page * $posts_per_page)) && $enable_pagination == 'yes') {
						$output.= '<div class="vtg-pagination vtg-align-' . $profile_align . ($pagination_style == 'infinite-scroll' ? ' vtg-infinite-scroll' : '') . ' ">';
						$output.= '<div class="vtg-pagination-inner">';
						$output.= '<a href="#" data-url="' . get_the_permalink() . '?' . $pagination_id . 'max_id=' . $last_id . '&' . $pagination_id . 'page=' . ($page + 1) . '" class="vtg-loadmore" id="vetrogram-' . $GLOBALS['vtg_pagination'] . '">' . ($loadmore_text != '' ? $loadmore_text : __('Load More', 'vetrogram')) . '</a>';
						$output.= '<span class="vtg-loading"><i class="vtg-icon vtg-icon-refresh"></i></span>';
						$output.= '</div>'; // End div.vtg-pagination-inner
						$output.= '</div>'; // End div.vtg-pagination
					}

					$output.= '</div>'; // End div.vetrogram
					if ($custom_style) {
						$output.= '<style>' . $custom_style . '</style>';
					}
				}
				else {
					$output.= '<div class="vtg-error">' . __('No posts found.', 'vetrogram') . '</div>';
				}
			}
			else {
				$output.= '<div class="vtg-error">' . __('Unable to connect to Instagram. Please check your internet connection.', 'vetrogram') . '</div>';
			}
		}
		else {
			$output.= '<div class="vtg-error">' . __('Please enter your Username.', 'vetrogram') . '</div>';
		}

		return $output;
	}
}

add_shortcode('vetrogram', 'vetrogram_shortcode');

if (!function_exists('vtg_init_admin_files')) {
	function vtg_init_admin_files()
	{
		wp_enqueue_style('vtg-admin', plugin_dir_url(__FILE__) . 'admin/vetrogram-admin.css');
		wp_enqueue_script('vtg-admin', plugin_dir_url(__FILE__) . 'admin/vetrogram-admin.js', NULL, true);
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'admin/wp-color-picker-alpha.js', array(
			'wp-color-picker'
		) , '1.2.2', true);
	}

	add_action('admin_enqueue_scripts', 'vtg_init_admin_files');
}


if (!function_exists('vtg_shotrcode_generator_page')) {
	function vtg_shotrcode_generator_page()
	{
		add_menu_page(__('Shortcode Generator', 'vetrogram') , __('VetroGeram', 'vetrogram') , 'administrator', 'vetrogram-shortcode-generator', 'vtg_shortcode_generator');
	}
	add_action('admin_menu', 'vtg_shotrcode_generator_page');
}