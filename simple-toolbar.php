<?php
/*
Plugin Name: Simple Toolbar
Plugin URI: http://www.erick-olivares.com
Description: Plugin for utilizing a simple menu. It's a simple to solution for a cluttered toolbar.
Author: Erick Olivares
Version: 1.0
Author URI: http://www.erick-olivares.com/simple-toolbar-plugin/
*/

function wpa85495_enqueue_style(){
	wp_register_style( 'simple-toolbar', plugins_url( '/simple-toolbar.min.css', __FILE__ ), array(), '1', 'all' );

    wp_enqueue_style( 'simple-toolbar' );
    wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array());
}
add_action( 'wp_enqueue_scripts', 'wpa85495_enqueue_style' );

function simple_toolbar() {

if ( is_user_logged_in() ) {

//Current User EMail
    global $current_user;
    get_currentuserinfo();
    $email = $current_user->user_email;
    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
    ?>

    <nav class="admin-nav">
        <a href="/wp-admin/profile.php" target="_blank">
            <li style="background-image: url('<?php echo $grav_url ?>')">
            </li>
        </a>
        <a href="/wp-admin/" target="_blank">
            <li>
                <i class="fa fa-home"></i>
                <nobr>Admin Dashboard</nobr>
            </li>
        </a>
        <a href="/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit" target="_blank">
            <li>
                <i class="fa fa-pencil"></i>
                <nobr>Edit Page</nobr>
            </li>
        </a>
        <a href="/wp-admin/post-new.php" target="_blank">
            <li>
                <i class="fa fa-plus"></i>
                <nobr>New Post</nobr>
            </li>
        </a>
    </nav>

    <?php
    }
}
add_action('wp_footer','simple_toolbar');