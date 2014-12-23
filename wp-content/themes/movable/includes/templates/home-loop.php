<li class="clear <?php if($postcount == 0) echo 'border-none';  ?>"> 

<?php if(get_option('movable_show_home_thumb') == 'on') { ?>

	<?php the_post_thumbnail('default-thumb', array('class' => 'entry-thumb')); ?>
	
<?php } ?>

<span class="news-item"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>
</li>