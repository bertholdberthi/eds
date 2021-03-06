<?php
//activer init pour le réglagage des header er footer

add_action('init','on_eds_init');

function on_eds_init()
{
    register_nav_menu('header_menu','Header Menu');
    register_nav_menu('faq_menu','FAQ Menu');

}


//register_taxonomy( 'media_category' , 'attachment', $args );
	/* ce if pour rajouter la partie option de page*/ 
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
		));
	   
		acf_add_options_sub_page(array(
		'page_title' => 'Theme Header Settings',
		'menu_title' => 'Header',
		'parent_slug' => 'theme-general-settings',
		));
	   
		acf_add_options_sub_page(array(
		'page_title' => 'Theme Footer Settings',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
		));
	}


add_action('wp_nav_menu','eds_menu_responsive',3,2);

function eds_menu_responsive($menu, $args)
{
    if('header_menu'== $args->theme_location)
    {
        $button = '<button type ="button" class ="toggle-menu">
        <i class = "fa fa-bars"></i></button>';
        $menu = preg_replace('/(<nav(.*?)>)/','${1}'.$button,$menu);

	}
    return $menu;
}


/**
 *  wordpress met en apllication eds_styles_scripts quand il est 
 * enrégisté par wp_register_style et exécuté par wp_enqueue
 */
add_action('wp_enqueue_scripts', 'eds_styles_scripts');

function eds_styles_scripts()
{
  
    wp_register_style('eds-bootstrap', get_template_directory_uri().'/css/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('eds-bootstrap');
    
    wp_register_style("fontawesome","https://use.fontawesome.com/releases/v5.3.1/css/all.css");
    wp_enqueue_style('fontawesome');
    

    wp_register_style("eds-jqueryui","http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
    wp_enqueue_style('eds-jqueryui');

    wp_register_style('eds-style', get_template_directory_uri() . '/style.css',array(),"1.1");
    wp_enqueue_style('eds-style');



    wp_register_script('mobile', get_template_directory_uri().'/js/mobile.js', array('jquery',"jquery-ui-core","jquery-ui-accordion","jquery-ui-button"), "1.1");
    wp_enqueue_script('mobile');


    if(is_page_template("template-faq.php"))
    {
        wp_register_script('eds-accordion', get_template_directory_uri().'/js/new.js', array('jquery',"jquery-ui-core","jquery-ui-accordion","jquery-ui-button"), "1.1");
        wp_enqueue_script('eds-accordion');
    }


    
}

// ici on change le titre du projet dans la barre des adresses  url
add_theme_support('title-tag');

add_theme_support('post-thumbnails');

