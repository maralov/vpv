<?php

define("THEME_ROOT", get_template_directory_uri());
define("SAN_CSS_DIR", THEME_ROOT . "/assets/styles");
define("SAN_JS_DIR", THEME_ROOT . "/assets/js");
define("SAN_IMG_DIR", THEME_ROOT . "/assets/img");


remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
remove_filter('comment_text', 'wpautop');
remove_filter('acf_the_content', 'wpautop');

function up_assets()
{
	wp_enqueue_style('main', SAN_CSS_DIR . '/main.min.css',  false, time());

	wp_enqueue_script('vendor', SAN_JS_DIR . '/vendor.min.js', null, null, true);
	wp_enqueue_script('main', SAN_JS_DIR . '/main.min.js', null, null, true);
}

add_action('wp_enqueue_scripts', 'up_assets');

add_filter('upload_mimes', 'upload_allow_types');

// remove wp version number from scripts and styles
function remove_css_js_version($src)
{
	if (strpos($src, '?ver='))
		$src = remove_query_arg('ver', $src);
	return $src;
}
add_filter('style_loader_src', 'remove_css_js_version', 9999);
add_filter('script_loader_src', 'remove_css_js_version', 9999);

function upload_allow_types($mimes)
{
	// разрешаем новые типы
	$mimes['svg']  = 'text/plain'; // image/svg+xml

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'filter_function_name_497', 10, 4);
function filter_function_name_497($type_and_ext, $file, $filename, $mimes)
{

	// загружается файл с расширением .svg
	if ('.svg' === strtolower(substr($filename, -4))) {

		$filesize = filesize($file) / 2048; // КБ

		// разрешим
		if ($filesize < 600 && current_user_can('manage_options')) {
			$type_and_ext['ext']  = 'svg';
			$type_and_ext['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$type_and_ext['ext'] = $type_and_ext['type'] = false;
		}
	}

	return $type_and_ext;
}

add_action('after_setup_theme', function () {
	register_nav_menus([
		'header_menu' => 'Меню в хедер',
		'footer_menu' => 'Меню в футере',
	]);
});

add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


if (function_exists('acf_add_options_page')) {
	// Adds ACF Pro options page for Global Options
	$globalOptions = acf_add_options_page(array(
		'page_title'  => 'Загальні налаштування',
		'menu_title' => 'Загальні налаштування',
		'menu_slug'  => 'global-options',
		'capability' => 'edit_posts',
		'redirect'  => false
	));

	// Adds ACF Pro sub options page for Header
	acf_add_options_sub_page(array(
		'page_title'  => 'Футер',
		'menu_title'  => 'Футер',
		'parent_slug'   => $globalOptions['menu_slug'],
	));
}

if (function_exists('acf_add_options_page')) {
	// Adds ACF Pro options page for Global Options
	$globalOptions = acf_add_options_page(array(
		'page_title'  => 'Часті питання',
		'menu_title' => 'Часті питання',
		'menu_slug'  => 'faq-options',
		'capability' => 'edit_posts',
		'redirect'  => false,
		'icon_url' => 'dashicons-info-outline', // Add this line and replace the second inverted commas with class of the icon you like
		'position' => 3
	));
	// Adds ACF Pro sub options page for Header
}

/*
	*  Отключаем wp-json
	*
	* https://sheensay.ru/?p=2044
	*/

// Отключаем WP-API версий 1.x
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

// Отключаем WP-API версий 2.x
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');

// Удаляем информацию о REST API из заголовков HTTP и секции head
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);

// Отключаем фильтры REST API
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);

// Отключаем Embeds связанные с REST API
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

// Убираем oembed ссылки в секции head
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Редиректим со страницы /wp-json/ на главную
add_action('template_redirect', function () {
	if (preg_match('#\/wp-json\/.*?#', $_SERVER['REQUEST_URI'])) {
		wp_redirect(get_option('siteurl'), 301);
		die();
	}
});


/*
	*  Отключаем emoji
	*
	*  https://sheensay.ru/?p=2044
	*/
add_action('init', 'sheensay_disable_emojis');

function sheensay_disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

	add_filter('tiny_mce_plugins', 'sheensay_disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'sheensay_disable_emojis_remove_dns_prefetch', 10, 2);
}

function sheensay_disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

function sheensay_disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

/*
	*  Удаляем остальные ненужные meta из head
	*
	* https://sheensay.ru/?p=2044
	*/
// Удаляем код meta name="generator"
remove_action('wp_head', 'wp_generator');

// Удаляем link rel="canonical" // Этот тег лучше выводить с помощью плагина Yoast SEO или All In One SEO Pack
remove_action('wp_head', 'rel_canonical');

// Удаляем link rel="shortlink" - короткую ссылку на текущую страницу
remove_action('wp_head', 'wp_shortlink_wp_head');

// Удаляем link rel="EditURI" type="application/rsd+xml" title="RSD"
// Используется для сервиса Really Simple Discovery
remove_action('wp_head', 'rsd_link');

// Удаляем link rel="wlwmanifest" type="application/wlwmanifest+xml"
// Используется Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

// Удаляем различные ссылки link rel
// на главную страницу
remove_action('wp_head', 'index_rel_link');
// на первую запись
remove_action('wp_head', 'start_post_rel_link', 10);
// на предыдущую запись
remove_action('wp_head', 'parent_post_rel_link', 10);
// на следующую запись
remove_action('wp_head', 'adjacent_posts_rel_link', 10);

// Удаляем связь с родительской записью
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

// Удаляем вывод /feed/
remove_action('wp_head', 'feed_links', 2);
// Удаляем вывод /feed/ для записей, категорий, тегов и подобного
remove_action('wp_head', 'feed_links_extra', 3);

// Удаляем ненужный css плагина WP-PageNavi
remove_action('wp_head', 'pagenavi_css');


add_action('template_redirect', 'wpds_parent_category_template');
function wpds_parent_category_template()
{
	if (!is_category())
		return true;

	// получаем объект текущей рубрики
	$cat = get_category(get_query_var('cat'));

	while ($cat && !is_wp_error($cat)) {
		$template = TEMPLATEPATH . "/category-{$cat->slug}.php";
		// загружаем, если файл шаблона существует.
		if (file_exists($template)) {
			load_template($template);
			exit;
		}

		$cat = $cat->parent ? get_category($cat->parent) : false;
	}
}

function kama_excerpt($args = '')
{
	global $post;

	if (is_string($args))
		parse_str($args, $args);

	$rg = (object) array_merge(array(
		'maxchar'   => 350,   // Макс. количество символов.
		'text'      => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
		// Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется все до <!--more--> вместе с HTML.
		'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет?
		'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
		'more_text' => 'Читать дальше...', // Текст ссылки `Читать дальше`.
	), $args);

	$rg = apply_filters('kama_excerpt_args', $rg);

	if (!$rg->text)
		$rg->text = $post->post_excerpt ?: $post->post_content;

	$text = $rg->text;
	$text = preg_replace('~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
	$text = preg_replace('~\[/?[^\]]*\](?!\()~', '', $text); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
	$text = trim($text);

	// <!--more-->
	if (strpos($text, '<!--more-->')) {
		preg_match('/(.*)<!--more-->/s', $text, $mm);

		$text = trim($mm[1]);

		$text_append = ' <a href="' . get_permalink($post) . '#more-' . $post->ID . '">' . $rg->more_text . '</a>';
	}
	// text, excerpt, content
	else {
		$text = trim(strip_tags($text, $rg->save_tags));

		// Обрезаем
		if (mb_strlen($text) > $rg->maxchar) {
			$text = mb_substr($text, 0, $rg->maxchar);
			$text = preg_replace('~(.*)\s[^\s]*$~s', '\\1 ...', $text); // убираем последнее слово, оно 99% неполное
		}
	}

	// Сохраняем переносы строк. Упрощенный аналог wpautop()
	if ($rg->autop) {
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters('kama_excerpt', $text, $rg);

	if (isset($text_append))
		$text .= $text_append;

	return ($rg->autop && $text) ? "<p>$text</p>" : $text;
}

function facebook_open_graph()
{
	global $post;
	global $wp;
	//ДЛЯ ССЫЛОК
	$current_url = home_url($wp->request);

	//ДЛЯ DESCRIPTION
	//    $trim_words = "";
	//    if($excerpt = $post->post_excerpt){
	//        $trim_words  = strip_tags($post->post_excerpt);
	//    } elseif( !empty(the_field('post_preview_description')) ){
	//        $trim_words = wp_trim_words(the_field('post_preview_description'), 25);
	//    } elseif (!empty( the_field('banner_industry_description'))){
	//        $trim_words = wp_trim_words(the_field('banner_industry_description'), 25);
	//    }else{
	//        $trim_words = wp_trim_words(get_the_content(), 25);
	//    }
	//ДЛЯ ИЗОБРАЖЕНИЙ

	$first_img = get_field('post_header_img');
	if (empty($first_img)) {
		$first_img = get_bloginfo('template_directory') . '/assets/img/logo.svg';
	}
	//ОБЩИЕ META-ТЕГИ
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:site_name" content="';
	echo bloginfo('name');
	echo '"/>';
	if (has_post_thumbnail($post->ID)) {
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
		echo '<meta name="image" property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
	} else {
		echo '<meta name="image" property="og:image" content="' . get_field('post_header_img') . '"/>';
		echo '<meta name="image" property="og:image:secure_url" content="' . get_field('post_header_img') . '"/>';
	}
	echo '<meta name="description" property="og:description" content="' . get_the_title() . '"/>';
	//META-ТЕГИ ДЛЯ СТАТЕЙ, СТРАНИЦ
	if (is_singular()) {
		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta name="image" property="og:image" content="' . $first_img . '"/>';
		echo '<meta name="image" property="og:image" content="' . get_field('post_header_img') . '"/>';
		echo '<meta name="image" property="og:image:secure_url" content="' . get_field('post_header_img') . '"/>';
	} else {
		//META-ТЕГИ ДЛЯ ГЛАВНОЙ, РУБРИКИ И ОСТАЛЬНЫХ
		echo '<meta property="og:title" content="';
		echo bloginfo('name');
		echo '"/>';
		echo '<meta property="og:url" content="' . $current_url . '"/>';
	}
}
add_action('wp_head', 'facebook_open_graph');

add_action('wp_head', 'kama_postviews');


$post = $wp_query->post;
if (in_category('14')) { //ID категории
	include(TEMPLATEPATH . '/single-monitors.php');
} else {
	include(TEMPLATEPATH . '/single-default.php');
}
