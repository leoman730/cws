<?php get_header(); ?>
	
	<div id="content" class="archive">
	
		<!--<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php'); ?>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2 class="Museo-700"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<?php the_content(); ?>
			</div>

			<div class="postmetadata">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
							</div>

		</div>

	<?php endwhile; ?>

		<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

		


		<div class="pagination">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
			    <div class="newer"><?php previous_posts_link(__('Newer Entries', 'themejunkie')) ?></div>
			    <div class="older"><?php next_posts_link(__('Older Entries', 'themejunkie')) ?></div>
			    <div class="clear"></div>
			<?php } ?>
		</div><!--end .pagination-->		
			
	</div><!--end #content-->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>