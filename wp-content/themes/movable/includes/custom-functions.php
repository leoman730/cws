<?php

// Custom Menus
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-nav' => __( 'Primary Nav' ),
			'secondary-nav' => __( 'Secondary Nav' ),
		)
	);
}

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

// Register and deregister Scripts files	
if(!is_admin()) {
	add_action( 'wp_print_scripts', 'my_deregister_scripts', 100 );
}
	
function my_deregister_scripts() {
		wp_deregister_script( 'jquery' );
		
		//wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js', false, '1.5.1');
		wp_enqueue_script('jquery', get_bloginfo('template_url').'/includes/js/jquery-1.2.6.min.js', false, '1.2.6');
		wp_enqueue_script('jquery-superfish', get_bloginfo('template_url').'/includes/js/superfish.js', false, '1.4.2');
		wp_enqueue_script('jquery-scrolltop', get_bloginfo('template_url').'/includes/js/scrolltop.js', false, '1.4.2');	
		wp_enqueue_script('jquery-tabber', get_bloginfo('template_url').'/includes/js/tabber.js', false, '1.4.2');	
		wp_enqueue_script('jquery-custom', get_bloginfo('template_url').'/includes/js/custom.js', false, '1.4.2');				

		if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );
}

// Get limit excerpt
function tj_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "";
      echo $content;
      echo "...";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo "...";
   }
   else {
      echo "";
      echo $content;
   }
}

// Tabber: Get Most Popular Posts
function tj_tabs_popular( $posts = 5 ) {
	$popular = new WP_Query('orderby=comment_count&posts_per_page='.$posts);
	while ($popular->have_posts()) : $popular->the_post();
?>
<li>
<?php the_post_thumbnail('tabber-thumb', array('class' => 'tab-thumb')); ?>
 	<div class="info">
 	<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
 	<span class="meta"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments', 'comments-link', ''); ?></span>
	</div> <!--end .info-->
	<div class="clear"></div>
</li>
<?php endwhile; 
}

function tj_tabs_latest( $posts = 5 ) {
	$the_query = new WP_Query('showposts='. $posts .'&orderby=post_date&order=desc');	
	while ($the_query->have_posts()) : $the_query->the_post(); 
?>
<li>
	<?php the_post_thumbnail('tabber-thumb', array('class' => 'tab-thumb')); ?>
	<div class="info">
	<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
	<span class="meta"><abbr class="published" title="<?php the_time('g:i a'); ?>"><?php the_time('F j, Y'); ?></abbr></span>
	</div> <!--end .info-->
	<div class="clear"></div>
</li>
<?php endwhile; 
}

// Tabber: Get Recent Comments
function tj_tabs_comments( $posts = 5, $size = 35 ) {
	global $wpdb;
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
	comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
	comment_type,comment_author_url,
	SUBSTRING(comment_content,1,65) AS com_excerpt
	FROM $wpdb->comments
	LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
	$wpdb->posts.ID)
	WHERE comment_approved = '1' AND comment_type = '' AND
	post_password = ''
	ORDER BY comment_date_gmt DESC LIMIT ".$posts;
	
	$comments = $wpdb->get_results($sql);
	
	foreach ($comments as $comment) {
	?>
	<li>
		<?php echo get_avatar( $comment, $size ); ?>
	
		<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php _e('on ', 'themejunkie'); ?> <?php echo $comment->post_title; ?>">
			<?php echo strip_tags($comment->comment_author); ?>: <?php echo strip_tags($comment->com_excerpt); ?>...
		</a>
		<div class="clear"></div>
	</li>
	<?php 
	}
}

?>