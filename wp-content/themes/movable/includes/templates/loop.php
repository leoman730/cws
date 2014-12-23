<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(get_option('movable_show_archive_thumb') == 'on') { ?>
	
		<?php the_post_thumbnail('archive-thumb', array('class' => 'entry-thumb')); ?>

	<?php } ?>
	
	<div class="comment-bubble"><?php comments_popup_link( __( '0', 'themejunkie' ), __( '1', 'themejunkie' ), __( '%', 'themejunkie' ) ); ?></div>
	
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
	<div class="entry-meta">
		<?php _e('By ', 'themejunkie'); ?> <?php the_author_posts_link(); ?> <span class="meta-sep">|</span> <?php _e('Published:', 'themejunkie'); ?> <span class="meta-date"><abbr class="published" title="<?php the_time('g:i a'); ?>"><?php the_time(get_option('date_format')); ?></abbr></span>
	</div> <!--end .entry-meta-->
	
	<div class="entry-excerpt">
		<?php tj_content_limit(get_option('movable_archive_char_num')); ?>
	</div> <!--end .entry-excerpt-->
	
	<div class="clear"></div>
	
</div> <!-- end #post -->