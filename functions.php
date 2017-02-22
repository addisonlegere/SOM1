<?php
//Error reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR);

//Define constants
define('SITE_URL', home_url().'/');
define('AJAX_URL', admin_url('admin-ajax.php'));
define('THEME_PATH', get_template_directory().'/');
define('CHILD_PATH', get_stylesheet_directory().'/');
define('THEME_URI', get_template_directory_uri().'/');
define('CHILD_URI', get_stylesheet_directory_uri().'/');
define('THEMEX_PATH', THEME_PATH.'framework/');
define('THEMEX_URI', THEME_URI.'framework/');
define('THEMEX_PREFIX', 'themex_');

//Set content width
$content_width=1140;

//Load language files
load_theme_textdomain('academy', THEME_PATH.'languages');

//Include theme functions
include(THEMEX_PATH.'functions.php');

//Include configuration
include(THEMEX_PATH.'config.php');

//Include core class
include(THEMEX_PATH.'classes/themex.core.php');

//Create theme instance
$themex=new ThemexCore($config);

//GETTING RID OF PRIVATE PREFIX IN PAGE TITLE
add_filter( 'private_title_format', 'yourprefix_private_title_format' );
add_filter( 'protected_title_format', 'yourprefix_private_title_format' );
 
function yourprefix_private_title_format( $format ) {
    return '%s';
}
//FUNCTION THAT SETS INSERT MEDIA LINK TO none BUT ONLY AFTER USER SET IT
function bhm_imagelink_setup() {
$image_set = get_option( ‘image_default_link_type’ );if ($image_set !== ‘none’) {
update_option(‘image_default_link_type’, ‘none’);
}
}
add_action(‘admin_init’, ‘bhm_imagelink_setup’, 10);

//CUSTOM WIDGET FOR COURSES
// ONE --------------

class Course_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'course_widget', // Base ID
		'Course Widget', // Name
		array('description' => __( 'Display your Courses, randomly.'))
	   );
}
function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['numberOfCourses'] = strip_tags($new_instance['numberOfCourses']);
		return $instance;
}
// TWO ---------- (Backend WordPress widget area)
function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfCourses = esc_attr($instance['numberOfCourses']);
	} else {
		$title = '';
		$numberOfCourses = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'course_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('numberOfCourses'); ?>"><?php _e('Number of Courses:', 'course_widget'); ?></label>
		<select id="<?php echo $this->get_field_id('numberOfCourses'); ?>"  name="<?php echo $this->get_field_name('numberOfCourses'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfCourses ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
	<?php
	}
// THREE ----------- (runs how many courses you selected)

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfCourses = $instance['numberOfCourses'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getCourseCourses($numberOfCourses);
	echo $after_widget;
}

// FOUR --------------- (Front End Output)

function getCourseCourses($numberOfCourses) { //html
	global $post;
	add_image_size( 'course_widget_size', 85, 45, false );
	$courses = new WP_Query();
	$courses->query('post_type=course&orderby=rand&posts_per_page=' . $numberOfCourses );
	if($courses->found_posts > 0) {
		echo '<ul class="course_widget">';
			while ($courses->have_posts()) {
				$courses->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID) : '<div class="noThumb"></div>';
				$listItem = '<li>' . $image;
				$listItem .= '<div class="course-info"><div class="course-inner"><a href="' . get_permalink() . '">';
				$listItem .= get_the_title() . '</a><p>' . get_the_excerpt() . '</p></div></div>';
				$listItem .= '</li>';
				echo $listItem;
			}
		echo '</ul>';
		wp_reset_postdata();
	}else{
		echo '<p style="padding:25px;">No course found</p>';
	}
}

} //end class Course_Widget
register_widget('Course_Widget');

// FORUM PROFILE
add_filter('bbp_pre_get_user_profile_url', 'mjj_profile_link');
function mjj_profile_link( $user_id ){
	$user_info = get_userdata( $user_id );
	$user_nicename = $user_info -> user_nicename;
	return '/profile/' . $user_nicename;
}

// BLOCK DOWNLOAD FILE POST PAGES FROM SEARCH
add_action( 'init', 'update_my_custom_type', 99 );
 
/**
 * update_my_custom_type
 *
 * @author  Joe Sexton <joe@webtipblog.com>
 */
function update_my_custom_type() {
	global $wp_post_types;
 
	if ( post_type_exists( 'wpdmpro' ) ) {
 
		// exclude from search results
		$wp_post_types['wpdmpro']->exclude_from_search = true;
	}
}

// Login page custom style
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

// Login redirect
function redirect_login_page(){

 // Store for checking if this page equals wp-login.php
 $page_viewed = basename($_SERVER['REQUEST_URI']);

 // Where we want them to go
 $login_page  = "http://bennyhinnbiblestudy.org/my-account/";

 // Two things happen here, we make sure we are on the login page
 // and we also make sure that the request isn't coming from a form
 // this ensures that our scripts & users can still log in and out.
if ( ! is_admin() ) { 
 	if( $page_viewed == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {

	  // And away they go...
	  wp_redirect($login_page);
	  exit();

	 }elseif( $page_viewed == 'wp-admin' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		  // And away they go...
		  wp_redirect($login_page);
		  exit();
		 }elseif( $page_viewed == 'wp-login.php?wpe-login=bhmsom' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		  // And away they go...
		  wp_redirect($login_page);
		  exit();
		 }elseif( $page_viewed == 'wp-login.php?checkemail=confirm' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		  // And away they go...
		  wp_redirect($login_page);
		  exit();
		 }elseif( $page_viewed == 'wp-login.php?redirect_to=http%3A%2F%2Fbennyhinnbiblestudy.org%2Fwp-admin%2F&reauth=1' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		  // And away they go...
		  wp_redirect($login_page);
		  exit();
		 }
	}
}

add_action('init','redirect_login_page');

// Reset Password email in theme
// Change email type to HTML
add_filter( 'wp_mail_content_type', function( $content_type ) {
	return 'text/html';
});

// Change the message/body of the email
add_filter( 'retrieve_password_message', 'rv_new_retrieve_password_message', 10, 4 );
function rv_new_retrieve_password_message( $message, $key, $user_login, $user_data ){

	/**
	 *	Assemble the URL for resetting the password
	 *	see line 330 of wp-login.php for parameters
	 */
	$reset_url = add_query_arg( array(

		'action' => 'rp',
		'key' => $key,
		'login' => rawurlencode( $user_login )

	), wp_login_url() );

	ob_start();
	
	//printf( '<p>%s</p>', __( 'Hi, ' ) . get_user_meta( $user_data->ID, 'first_name', true ) );

	//printf( '<p>%s</p>', __( 'It looks like you need to reset your password on the site. If this is correct, simply click the link below. If you were not the one responsible for this request, ignore this email and nothing will happen.' ) );

	//printf( '<p><a href="%s">%s</a></p>', $reset_url, __( 'Reset Your Password' ) );

	echo '<html>
<body>
	<table align="center" width="586" style="border: 1px solid #dcdcdc;border-radius: 5px;border-collapse:collapse;">
		<thead>
			<tr>
				<td style="padding: 0px 0px 10px 0px;">
					<a href="https://bennyhinnbiblestudy.org/donate-now/" style="display: block;line-height: 90%;text-align: center;height: 109px;"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/benny_hinn_bible_study_email_header.jpg"></a>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="background-color:#455564;padding:10px 20px;">
					<h2 style="color:#ffffff;font-weight: 400;margin:0;">Reset Password</h2>
				</td>
			</tr>
			<tr>
				<td style="padding: 20px;">
					<p>Hello ' . get_user_meta( $user_data->ID, 'first_name', true ) . ',</p>
					<p>It looks like you need to reset your password on the site. If this is correct, simply click the link below. If you were not the one responsible for this request, ignore this email and nothing will happen.</p>
					<p><a href="' . $reset_url . '">Reset Your Password</a></p>
					<p><br /></p>
					<p>May God bless you always,</p>
					<p>The Benny Hinn School of Ministry</p>
				</td>
			</tr>
			<tr>
				<td style="padding: 0px;">
					<a href="https://give.church/dw7i42j" style="display: block;line-height: 90%;text-align: center;height: 145px;"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/benny_hinn_bible_study_email_footer.jpg" alt="Benny Hinn Bible Study Footer" style="border:0; outline:none; text-decoration:none;"></a>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-right:10px;background-color:#455564;font-size: 13px;border-radius: 0px 0px 4px 4px;">
					<table style="border-collapse:collapse;">
						<td><p style="color:#ffffff;display:inline-block;font-size: 13px;">© 2016 Bookmark Publishing, Dallas, TX. All Rights Reserved.</p></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://plus.google.com/+bennyhinnministries"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/googleplus.png" alt="Google Plus" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://www.instagram.com/pastorbennyhinn/"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/instagram.png" alt="Instagram" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://www.youtube.com/channel/UCjnhyffXt8kQfsr8dNHrihA"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/youtube.png" alt="Youtube" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://www.pinterest.com/bennyhinnorg/"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/pinterest.png" alt="Pinterest" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://twitter.com/benny_hinn"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/twitter.png" alt="Twitter" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://www.facebook.com/BennyHinnMinistries/"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/facebook.png" alt="Facebook" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
						<td style="padding-top: 10px;padding-right:5px;display:inline-block;float:right;"><a href="https://www.periscope.tv/Benny_Hinn"><img src="https://bennyhinnbiblestudy.org/wp-content/uploads/2016/04/periscope.png" alt="Periscope" style="height: 20px;width: 20px;border-radius: 3px;display:inline-block;border:0; outline:none; text-decoration:none;"></a></td>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>';

	
	$message = ob_get_clean();

	return $message;
}

// Confirm change password email do not send
add_filter('send_password_change_email', '__return_false');


// SUBSCRIBERS CAN VEIW PRIVATE PAGES
$subRole = get_role( 'subscriber' );  $subRole->add_cap( 'read_private_posts' ); $subRole->add_cap( 'read_private_pages' );
$subRole = get_role( 'customer' );  $subRole->add_cap( 'read_private_posts' ); $subRole->add_cap( 'read_private_pages' );
$subRole = get_role( 'author' );  $subRole->add_cap( 'read_private_posts' ); $subRole->add_cap( 'read_private_pages' );

// FUNCTION TO STOP REDIRECT FOR USER PROFILE 
remove_action( 'template_redirect', 'wc_disable_author_archives_for_customers' );

// ADD MOBILE MENU LOCATION 
function register_my_menu() {
  register_nav_menu('mobile_menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_my_menu' );


/**
* Add Continue Shopping Button on Cart Page
* Add to theme functions.php file or Code Snippets plugin
*/
add_action( 'woocommerce_before_cart_table', 'woo_add_continue_shopping_button_to_cart' );
function woo_add_continue_shopping_button_to_cart() {
 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
 
 echo '<div class="woocommerce-message">';
 echo ' <a href="/all-courses" class="button">Continue Shopping →</a> Would you like to enroll in additional courses?';
 echo '</div>';
}

// WOO FUNCTION TO CHECK IF ITEM IS IN CART
function woo_in_cart($product_id) {
    global $woocommerce;
 
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
 
        if($product_id == $_product->id ) {
            return true;
        }
    }
 
    return false;
}