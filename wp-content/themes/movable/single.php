<?php get_header(); ?>

<div id="content">

	<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php'); ?>

	<?php the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="comment-bubble"><?php comments_popup_link( __( '0', 'themejunkie' ), __( '1', 'themejunkie' ), __( '%', 'themejunkie' ) ); ?></div>
		
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
	<div class="entry-meta">
		<?php _e('By ', 'themejunkie'); ?> <?php the_author_posts_link(); ?> <span class="meta-sep">|</span> <?php _e('Published:', 'themejunkie'); ?> <span class="meta-date"><abbr class="published" title="<?php the_time('g:i a'); ?>"><?php the_time(get_option('date_format')); ?></abbr></span>
	</div> <!--end .entry-meta-->
			
			<div class="entry entry-content">
			
				<?php if(get_option('movable_integrate_singletop_enable') == 'on') echo (get_option('movable_integration_single_top')); ?>
			
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
			
				<?php if(get_option('movable_integrate_singlebottom_enable') == 'on') echo (get_option('movable_integration_single_bottom')); ?>
				<div class="clear"></div>
			</div> <!--end .entry-->

			<?php printf(the_tags(__('<div class="entry-tags"><span>Tags:</span>&nbsp;','themejunkie'),', ','</div>')); ?>
			
			<?php if(get_option('movable_show_author_box') == 'on') { ?> 
			
				<div class="entry-author clear">
					<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themejunkie_author_bio_avatar_size', 60 ) ); ?>
					</div> <!--end .author-avatar-->
					<div class="author-description">
						<h3><?php the_author(); ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<div id="author-link">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'themejunkie' ), get_the_author() ); ?>"><?php _e( 'View all posts by ', 'themejunkie' ); ?><?php the_author(); ?> &rarr;</a>
						</div> <!--end .author-link-->
					</div> <!--end .author-description-->
				</div> <!--end .entry-author-->
				
			<?php } ?>	

		</div> <!--end #post-->



</div><!--end #content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
