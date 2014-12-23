<?php get_header(); ?>

<div id="content">

	<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php'); ?>
		
	<?php the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div class="entry entry-content">
			
			<?php the_content(); ?>
				
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
				
		</div><!--end .entry-->
	
	</div><!--end #post-->
			
	<?php if(get_option('movable_show_page_comments') == 'on') comments_template( '', true ); ?>

</div><!--end #content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
