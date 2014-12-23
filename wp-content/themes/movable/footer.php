<?php if(!is_home()) echo('</div><!--end .wrap-->'); ?>



</div><!--end #wrapper-->
<div class="clear"></div>


<?php /* Footer Ad */ 
		if( get_option('movable_footer_ad_enable') == 'on') { 
		echo "<div class='footer-ad'>".get_option('movable_footer_ad_code')."</div>"; } 
	?>
  
	<div id="footer">
		
<!--<div class="footercont">
<strong>CONTACT</strong>
<p style="padding-top:10px;">Children's Workshop School PS361 | 610 East 12th Street, NYC, NY 10009  | T. (212) 614-9531 | <br>
<a href="http://www.childrensworkshopschool.org/">www.childrensworkshopschool.org</a></p>
</div>-->
		<div class="wrap">	
		<?php if ( is_active_sidebar( 'footer-widget-area-1' ) || is_active_sidebar( 'footer-widget-area-2' ) || is_active_sidebar( 'footer-widget-area-3' ) || is_active_sidebar( 'footer-widget-area-4' )) { ?>
			<div class="widget" id="fwidget-1">
				<?php if ( is_active_sidebar( 'footer-widget-area-1' ) ) :  dynamic_sidebar( 'footer-widget-area-1'); endif; ?>
			</div>
	
			<div class="widget" id="fwidget-2">
				<?php if ( is_active_sidebar( 'footer-widget-area-2' ) ) :  dynamic_sidebar( 'footer-widget-area-2'); endif; ?>
			</div>
			
			<div class="widget" id="fwidget-3">
				<?php if ( is_active_sidebar( 'footer-widget-area-3' ) ) :  dynamic_sidebar( 'footer-widget-area-3'); endif; ?>
			</div>
		
			<div class="widget" id="fwidget-4">				
				<?php if ( is_active_sidebar( 'footer-widget-area-4' ) ) :  dynamic_sidebar( 'footer-widget-area-4'); endif; ?>
			</div>
		<?php } ?>
			
			
		</div>
		
		<div class="clear"></div>					
					
			<div class="copyright">
				<div class="wrap">
				<div class="left"><p style="padding-top:5px; line-height:1.5em;">&copy;Content Copyright 2011-<?php echo mysql2date('Y',current_time('timestamp')); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <?php _e('All rights reserved','themejunkie'); ?>.<br>
This website may contain copyrighted material. Visitors may not download any such material without prior consent and approval of the copyright owner.<br>
				</div>
				
				<div class="right">
				<p><a href="http://www.childrensworkshopschool.org/contact">CONTACT</a> | <a href="http://www.childrensworkshopschool.org/userpolicy">USER POLICY</a> | <a href="http://www.childrensworkshopschool.org/sitemap">SITE MAP</a> | <span class="footer-top"><a href="#scrolltop"><?php _e('Return to Top','themejunkie'); ?></a></span></p>
				</div>
				
				</div>
			</div>
										
	</div><!--end #footer -->
    
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/jquery-ui-personalized-1.6rc2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/cookie.jquery.js"></script>    
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/inettuts.js"></script>

	
<?php wp_footer(); ?>

</body>
</html>