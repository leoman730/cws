<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="content" class="archive">
	
		<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php'); ?>
	
		<?php the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
			</div><!--end .entry-->
			
		</div><!--end #post-->
	
	</div><!--end #content-->


<?php get_sidebar(); ?>
	
<?php get_footer(); ?>