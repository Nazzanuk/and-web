<?
$version = 14;
$checkPages;

function printVersion()
{
    global $version;
    echo '?v=' . $version;
}

function headers_for_page_cache($cache_length = 600)
{
    $cache_expire_date = gmdate("D, d M Y H:i:s", time() + $cache_length);
    header("Expires: $cache_expire_date");
    header("Pragma: cache");
    header("Cache-Control: max-age=$cache_length");
    header("User-Cache-Control: max-age=$cache_length");
}

// Returns page ID
function getPageID()
{
    $page = 'home';
    $subject = substr(get_permalink(), strlen(get_site_url()));
    $pattern = "/.*\/([a-zA-Z-]+)\/?$/";
    if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
        $page = $matches[1][0];
    }
    return $page;
}

// sets which pages to display the share icon
function setCheckPages($currentCheckPages)
{
    global $checkPages;
    $checkPages = $currentCheckPages;
}

// gets which pages to display the share icon
function getCheckPages()
{
    global $checkPages;
    return $checkPages;
}

/*	function wp_get_attachment_url_safe_https($id) {
		if (is_ssl())
			$url = str_replace('http://', 'https://', wp_get_attachment_url($id));
		return $url;
	}*/

// Print template directory
function themeDir()
{
    return get_template_directory_uri() . "/";
}

function getThemeDir()
{
    echo get_template_directory_uri() . "/";
}

// Register and load the sidebars
function custom_sidebars_init()
{
    register_sidebar(array(
            'name' => 'Home',
            'id' => 'home-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Who We Are',
            'id' => 'who-we-are-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'What We Do',
            'id' => 'what-we-do-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Contact Us',
            'id' => 'contact-us-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Join Us',
            'id' => 'join-us-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Jobs',
            'id' => 'jobs-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Job Description',
            'id' => 'job-description',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Header',
            'id' => 'header-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Footer',
            'id' => 'footer-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Privacy Policy',
            'id' => 'privacy-policy-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Terms Of Use',
            'id' => 'terms-of-use-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Answer',
            'id' => 'answer-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'Answers',
            'id' => 'answers-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'ANDShare',
            'id' => 'andshare-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'ANDGenie',
            'id' => 'andgenie-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'argos',
            'id' => 'argos-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'newlook',
            'id' => 'newlook-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'travisperkins',
            'id' => 'travisperkins-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'whitbread',
            'id' => 'whitbread-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'achica',
            'id' => 'achica-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
    register_sidebar(array(
            'name' => 'ANDTravel',
            'id' => 'andtravel-content',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
    ));
}

add_action('widgets_init', 'custom_sidebars_init');

include('widgets/feature_widget.php');

include('widgets/values_widget.php');

include('widgets/text_1_widget.php');

include('widgets/employees_widget.php');

include('widgets/tabs_widget.php');

include('widgets/jobs_widget.php');

include('widgets/home_feature_widget.php');

include('widgets/quote_widget.php');

include('widgets/home_pages_widget.php');

include('widgets/charter_widget.php');

include('widgets/benefits_widget.php');

include('widgets/careers_widget.php');

include('widgets/job_description_widget.php');

include('widgets/map_widget.php');

include('widgets/contacts_widget.php');

include('widgets/header_widget.php');

include('widgets/client_carousel_widget.php');

include('widgets/footer_widget.php');

include('widgets/clients_widget.php');

include('widgets/job_feature_widget.php');

include('widgets/services_widget.php');

include('widgets/academy_widget.php');

include('widgets/testimonials_widget.php');

include('widgets/menu_widget.php');

include('widgets/share_widget.php');

include('widgets/dod_widget.php');

//include('widgets/html_text_widget.php');

include('widgets/answer_widget.php');

include('widgets/answers_widget.php');

include('widgets/heading_widget.php');

include('widgets/advisors_widget.php');

include('widgets/casestudy_widget.php');

include('widgets/casestudies_widget.php');

include('widgets/carousel_widget.php');

include('widgets/three_rows_widget.php');

include('widgets/vimeo_widget.php');

// Register and load the widgets
function custom_widgets_init()
{
    // widgets for all pages
    register_widget('header_widget');
    register_widget('footer_widget');
    register_widget('feature_widget');
    register_widget('menu_widget');
    register_widget('share_widget');
    register_widget('heading_widget');
    register_widget('vimeo_widget');

    // widgets for home page
    register_widget('home_feature_widget');
    register_widget('quote_widget');
    register_widget('home_pages_widget');

    // widgets for what-we-do page
    register_widget('services_widget');
    register_widget('academy_widget');
    register_widget('testimonials_widget');
    register_widget('dod_widget');
    register_widget('casestudies_widget');
    register_widget('client_carousel_widget');

    // widgets for who-we-are page
    register_widget('values_widget');
    register_widget('text_1_widget');
    register_widget('employees_widget');
    register_widget('tabs_widget');
    register_widget('jobs_widget');
    register_widget('advisors_widget');

    // widgets for join-us and jobs pages
    register_widget('charter_widget');
    register_widget('benefits_widget');
    register_widget('careers_widget');
    register_widget('job_description_widget');

    // widgets for contact-us page
    register_widget('map_widget');
    register_widget('contacts_widget');

    // widgets for job page
    register_widget('job_feature_widget');

    // widgets for answer page
    register_widget('answer_widget');

    // widgets for answers page
    register_widget('answers_widget');

    // widgets for ANDShare, ANDGenie, ANDTravel pages
    register_widget('casestudy_widget');
    register_widget('carousel_widget');
    register_widget('three_rows_widget');

    //register_widget( 'html_text_widget' );
}

add_action('widgets_init', 'custom_widgets_init');

// unregister all widgets
function unregister_default_widgets()
{
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Text');
}

add_action('widgets_init', 'unregister_default_widgets', 11);

include('settings/analytics.php');

add_filter('wp_get_attachment_url', 'set_url_scheme');
?>