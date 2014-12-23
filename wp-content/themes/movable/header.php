<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php tj_custom_titles(); ?></title>
<?php tj_custom_description(); ?>
<?php tj_custom_keywords(); ?>
<?php tj_custom_canonical(); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/custom.css" />

<!--
/* @license
 * MyFonts Webfont Build ID 2373896, 2012-09-27T22:19:18-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Museo 700 by exljbris
 * URL: http://www.myfonts.com/fonts/exljbris/museo/700/
 * Copyright: Copyright (c) 2008 by Jos Buivenga/exljbris. All rights reserved.
 * Licensed pageviews: Unlimited
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2373896
 * 
 * © 2012 Bitstream Inc
*/

-->
<link rel="stylesheet" type="text/css" href="MyFontsWebfontsKit.css">	

<?php wp_head(); ?>

<script>
  (function() {
    var cx = '011315769598679106729:5y8oibgyqd4';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>

</head>

<body <?php body_class(); ?>>
    
<?php if (is_home()) add_filter('img_caption_shortcode', create_function('$a, $b, $c','return $c;'), 10, 3); ?> 
<?php if (is_category()) add_filter('img_caption_shortcode', create_function('$a, $b, $c','return $c;'), 10, 3); ?>

<div id="header">
	<div class="wrap">

	<?php if (get_option('movable_text_logo_enable') == 'on') { ?>
	
		<div id="text-logo">
			<h1 id="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<p id="site-desc"><?php bloginfo('description'); ?></p>
		</div>
		
	<?php } else { ?>
	
		<a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('movable_logo') <> '') ? get_option('movable_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" id="logo"/></a>
		
	<?php }?>
		
	    <?php /* Header Ad */
		if( get_option('movable_header_ad_enable') == 'on'){
			echo "<div class='header-ad'>";
			echo get_option('movable_header_ad_code');
			echo "</div>";
		} ?>

	</div>
</div><!--end #header-->

<div id="primary-nav">
	<div class="wrap nav">
	
		<?php $menuClass = '';
		$menuID = '';
		$primaryNav = '';
		if (function_exists('wp_nav_menu')) {
			$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
		};
		if ($primaryNav == '') { ?>
			<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
				<?php if (get_option('movable_home_link') == 'on') { ?>
					<li><a href="<?php bloginfo('url'); ?>" class="home <?php if(is_home()) echo('first'); ?>"><?php _e('Home', 'themejunkie') ?></a></li>	
				<?php } ?>					
				<?php show_page_menu($menuClass,false,false); ?>
			</ul>
		<?php }	else echo($primaryNav); ?>

		
	</div><!--end .nav-->
</div><!--#primary-nav-->


<div id="social-icons">
	<?php if( get_option('movable_digg_id') != null ) { ?>
		<a class="icon-digg" href="http://www.digg.com/<?php echo get_option('movable_digg_id'); ?>" title="<?php _e('Follow us on Digg','themejunkie');?>"><?php _e('Digg','themejunkie');?></a> 	
	<?php } ?>
	
	<?php if( get_option('movable_stumbleupon_id') != null ) { ?>
		<a class="icon-stumbleupon" href="http://www.stumbleupon.com/stumbler/<?php echo get_option('movable_stumbleupon_id'); ?>" title="<?php _e('Follow us on StumbleUpon','themejunkie');?>"><?php _e('StumbleUpon','themejunkie');?></a>
	<?php } ?>
	
	<?php if( get_option('movable_linkedin_id') != null ) { ?>
		<a class="icon-linkedin" href="http://www.linkedin.com/<?php echo get_option('movable_linkedin_id'); ?>" title="<?php _e('Become a fan on LinkedIn','themejunkie');?>"><?php _e('LinkedIn','themejunkie');?></a>
	<?php } ?>
	
	<?php if( get_option('movable_youtube_id') != null ) { ?>
		<a class="icon-youtube" href="http://www.youtube.com/user/<?php echo get_option('movable_youtube_id'); ?>" title="<?php _e('YouTube Channel','themejunkie');?>"><?php _e('YouTube','themejunkie');?></a> 	<?php } ?>
	
	<?php if( get_option('movable_flickr_id') != null ) { ?>
		<a class="icon-flickr" href="http://www.flickr.com/photos/<?php echo get_option('movable_flickr_id'); ?>" title="<?php _e('Flickr Photo Stream','themejunkie');?>"><?php _e('Flickr','themejunkie');?></a>
	<?php } ?>
	
	<?php if( get_option('movable_facebook_id') != null ) { ?>
		<a class="icon-facebook" href="http://www.facebook.com/<?php echo get_option('movable_facebook_id'); ?>" title="<?php _e('Become a fan on Facebook','themejunkie');?>"><?php _e('Facebook','themejunkie');?></a>
	<?php } ?>
	
	<?php if( get_option('movable_twitter_id') != null ) { ?>
	<a class="icon-twitter" href="http://twitter.com/<?php echo get_option('movable_twitter_id'); ?>" title="<?php _e('Follow us on Twitter','themejunkie');?>"><?php _e('Twitter','themejunkie');?></a>
	<?php } ?>
	
	<?php if( get_option('movable_feedburner_id') != null ) { ?>
		<a class="icon-rss" href="http://feeds.feedburner.com/<?php echo get_option('movable_feedburner_id'); ?>" title="<?php _e('Subscribe via Feedburner','themejunkie');?>"><?php _e('RSS','themejunkie');?></a>
	<?php } else { ?>
		<a class="icon-rss" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('RSS feed','themejunkie');?>"><?php _e('RSS','themejunkie');?></a>
	<?php } ?>
	<a class="refresh" href="#resetLayout" id="reset" title="<?php _e('Reset Homepage Layout','themejunkie');?>"><?php _e('Reset','themejunkie');?></a>	
	
</div><!--end #social-icons-->

<div id="wrapper">

<?php if(!is_home()) echo('<div class="wrap">'); ?>
