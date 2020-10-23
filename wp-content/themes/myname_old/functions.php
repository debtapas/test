<?php
/**
 * my name functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_name
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'myname_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function myname_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on my name, use a find and replace
		 * to change 'myname' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'myname', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'myname' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'myname_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'myname_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myname_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'myname_content_width', 640 );
}
add_action( 'after_setup_theme', 'myname_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function myname_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'myname' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'myname' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'myname_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function myname_scripts() {
	wp_enqueue_style( 'myname-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'myname-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'myname-fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css', array(), _S_VERSION, false );

	wp_style_add_data( 'myname-style', 'rtl', 'replace' );
	wp_enqueue_style( 'Open-Sans-Roboto', 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto' );
	wp_enqueue_script( 'myname-jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'myname-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, false );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'myname_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Register nav Menus ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// function register_my_menu() {
//   register_nav_menu('header-menu',__( 'Header Menu' ));
// }
// add_action( 'init', 'register_my_menu' );



function myname_post_slide() {
    $labels = array(
        'name'                  => _x( 'Slides', 'Post type general name', 'Slide' ),
        'singular_name'         => _x( 'Slide', 'Post type singular name', 'Slide' ),
        'menu_name'             => _x( 'Slides', 'Admin Menu text', 'Slide' ),
        'name_admin_bar'        => _x( 'Slide', 'Add New on Toolbar', 'Slide' ),
        'add_new'               => __( 'Add New', 'Slide' ),
        'add_new_item'          => __( 'Add New Slide', 'Slide' ),
        'new_item'              => __( 'New Slide', 'Slide' ),
        'edit_item'             => __( 'Edit Slide', 'Slide' ),
        'view_item'             => __( 'View Slide', 'Slide' ),
        'all_items'             => __( 'All Slides', 'Slide' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Slide custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slide' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => false
    );   
      
    register_post_type( 'slide', $args ); // Slider Custom Post type

    unset($labels);
    unset($args);

    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'Services' ),
        'singular_name'         => _x( 'Services', 'Post type singular name', 'Services' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'Services' ),
        'name_admin_bar'        => _x( 'Services', 'Add New on Toolbar', 'Services' ),
        'add_new'               => __( 'Add New', 'Services' ),
        'add_new_item'          => __( 'Add New Services', 'Services' ),
        'new_item'              => __( 'New Services', 'Services' ),
        'edit_item'             => __( 'Edit Services', 'Services' ),
        'view_item'             => __( 'View Services', 'Services' ),
        'all_items'             => __( 'All Services', 'Services' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Services custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slide' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => false
    );   
      
    register_post_type( 'services', $args );

	unset($labels);
	unset($args);


// Gallery custom Post type ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

     $labels = array(
        'name'                  => _x( 'Gallery', 'Post type general name', 'gallery' ),
        'singular_name'         => _x( 'Galleries', 'Post type singular name', 'gallery' ),
        'menu_name'             => _x( 'Gallery', 'Admin Menu text', 'gallery' ),
        'name_admin_bar'        => _x( 'Gallery', 'Add New on Toolbar', 'gallery' ),
        'add_new'               => __( 'Add New', 'gallery' ),
        'add_new_item'          => __( 'Add New Gallery', 'gallery' ),
        'new_item'              => __( 'New Gallery', 'gallery' ),
        'edit_item'             => __( 'Edit Gallery', 'gallery' ),
        'view_item'             => __( 'View Gallery', 'gallery' ),
        'all_items'             => __( 'All Gallery', 'gallery' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'galleries custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => false
    );   
      
    register_post_type( 'gallery', $args );

	unset($labels);
	unset($args);


//create  Gallery  custom taxonomy name it "category" for your posts ~~~~~~~~~~~~~~~~~~~~~~
	  $labels = array(
	    'name' => _x( 'Category', 'taxonomy general name' ),
	    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Categories' ),
	    'all_items' => __( 'All Category' ),
	    'parent_item' => __( 'Parent Category' ),
	    'parent_item_colon' => __( 'Parent Category:' ),
	    'edit_item' => __( 'Edit Category' ), 
	    'update_item' => __( 'Update Category' ),
	    'add_new_item' => __( 'Add New Category' ),
	    'new_item_name' => __( 'New Type Category' ),
	    'menu_name' => __( 'Category' ),
	  ); 	

	  $args = array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_ui' => true,
	    'show_admin_column' => true,
	    'show_in_rest' => true,
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'gallery-cat' ),
	  );
	 
	  register_taxonomy('gallery-cat', array('gallery'), $args );

		unset($labels);
		unset($args);

}

add_action( 'init', 'myname_post_slide' );



// Slider custom filed ~~~~~~~~~~~~~~~~~~~~~~~~~

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function slider_titles_filelds_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function slider_titles_filelds_add_meta_box() {
	add_meta_box(
		'slider_titles_filelds-slider-titles-filelds',
		__( 'Slider titles filelds', 'slider_titles_filelds' ),
		'slider_titles_filelds_html',
		'Slide',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'slider_titles_filelds_add_meta_box' );


// Custom field ~~~~~~~~~~~~~~~~~~~~~~~~~
function slider_titles_filelds_html( $post) {
	wp_nonce_field( '_slider_titles_filelds_nonce', 'slider_titles_filelds_nonce' ); ?>

	<p>
		<label for="slider_titles_filelds_slide_subtitle"><?php _e( 'Slide Subtitle', 'slider_titles_filelds' ); ?></label><br>
		<input type="text" name="slider_titles_filelds_slide_subtitle" id="slider_titles_filelds_slide_subtitle" value="<?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_slide_subtitle' ); ?>">
	</p>	<p>
		<label for="slider_titles_filelds_button_name"><?php _e( 'Button name', 'slider_titles_filelds' ); ?></label><br>
		<input type="text" name="slider_titles_filelds_button_name" id="slider_titles_filelds_button_name" value="<?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_button_name' ); ?>">
	</p>	<p>
		<label for="slider_titles_filelds_button_url"><?php _e( 'Button URL', 'slider_titles_filelds' ); ?></label><br>
		<input type="text" name="slider_titles_filelds_button_url" id="slider_titles_filelds_button_url" value="<?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_button_url' ); ?>">
	</p><?php
}

function slider_titles_filelds_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['slider_titles_filelds_nonce'] ) || ! wp_verify_nonce( $_POST['slider_titles_filelds_nonce'], '_slider_titles_filelds_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['slider_titles_filelds_slide_subtitle'] ) )
		update_post_meta( $post_id, 'slider_titles_filelds_slide_subtitle', esc_attr( $_POST['slider_titles_filelds_slide_subtitle'] ) );
	if ( isset( $_POST['slider_titles_filelds_button_name'] ) )
		update_post_meta( $post_id, 'slider_titles_filelds_button_name', esc_attr( $_POST['slider_titles_filelds_button_name'] ) );
	if ( isset( $_POST['slider_titles_filelds_button_url'] ) )
		update_post_meta( $post_id, 'slider_titles_filelds_button_url', esc_attr( $_POST['slider_titles_filelds_button_url'] ) );
}
add_action( 'save_post', 'slider_titles_filelds_save' );

// for replace in <a> tag (addition class="nav-link") in nav menu ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


// to create shortcode ~~~~~~~~~~~~~~~~~~~~~~~~~~~
function HelloWorldShortcode() {
	return '<p>Hello World!</p>';
}
add_shortcode('helloworld', 'HelloWorldShortcode');


//
add_action('acf/init', 'my_acf_op_init', 98);
function my_acf_op_init() {
    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}