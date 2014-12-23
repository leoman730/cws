<?php get_header(); ?>
	
	<div id="content">
	
		<!--<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php');
	
			rewind_posts();
			if (have_posts()) {
				while (have_posts()) : the_post();
				global $post;
					include(TEMPLATEPATH. '/includes/templates/loop.php');
				$postcount++;
				endwhile;
	
			} else { 
				include(TEMPLATEPATH. '/includes/templates/not-found.php'); 
			}
		?>
	
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