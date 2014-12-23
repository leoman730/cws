<?php
/**
 * Template Name: Contact
 */
?>
 
<?php 
$nameError = '';
$emailError = '';
$commentError = '';

//If the form is submitted
if( isset( $_POST[ 'submitted' ] ) ) {

	//Check to see if the honeypot captcha field was filled in
	/*
	if( trim( $_POST[ 'checking' ] ) !== '' ) {
			$captchaError = true;
		} else {
	*/
		
		// name
		if( trim( $_POST[ 'contactName' ] ) === '' ) {
			$nameError = __( 'Enter your name!', 'kazaz' );
			$hasError = true;
		} else {
			$name = trim( $_POST[ 'contactName' ] );
		}
		
		// email
		if( trim( $_POST[ 'email' ] ) === '' ) {
			$emailError = __( 'Enter a valid email address!', 'kazaz' );
			$hasError = true;
		} else if( !k_is_valid_email_address( $_POST[ 'email' ] ) ) {
			$emailError = __( 'Invalid email address!', 'kazaz' );
			$hasError = true;
		} else {
			$email = trim( $_POST[ 'email' ] );
		}
			
		// message
		if( trim( $_POST[ 'comments' ] ) === '' ) {
			$commentError = __( 'Enter a message!', 'kazaz' );
			$hasError = true;
		} else {
			if( function_exists( 'stripslashes' ) ) {
				$comments = stripslashes( trim( $_POST[ 'comments' ] ) );
			} else {
				$comments = trim( $_POST[ 'comments' ] );
			}
		}
		
		// send if no errors
		if( !isset( $hasError ) ) {

			$emailTo = esc_attr( vp_option( 'vpt_option.contact_email' ) );
			$subject = __( 'Contact Form Submission from ', 'kazaz' ) . $name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: My Site <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
			
			wp_mail( $emailTo, $subject, $body, $headers );

			$emailSent = true;

		}
	/* } */
} 
?>

<?php
// print site header
get_header();
?>

<?php
// sidebar
$sidebar_class = '';
$sidebar_pos = vp_option( 'vpt_option.sidebar_position' );
if( $sidebar_pos == 'left' ) $sidebar_class = ' col-lg-push-4 col-md-push-4';
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
			
				<div class="row gutter"><!-- row -->
	
					<div class="col-lg-12 col-md-12">
					
						<?php 
						// show the map?
						$show_the_map = esc_attr( vp_option( 'vpt_option.show_google_map' ) );
						if( $show_the_map ) : 
						// pick variables from theme options
						$map_title  = esc_attr( vp_option( 'vpt_option.gmap_title' ) );
						$map_zoom   = esc_attr( vp_option( 'vpt_option.gmap_zoom' ) );
						$map_lon    = esc_attr( vp_option( 'vpt_option.gmap_lon' ) );
						$map_lat    = esc_attr( vp_option( 'vpt_option.gmap_lat' ) );
						$map_marker = esc_attr( vp_option( 'vpt_option.gmap_marker' ) );
						
						$contact_name = esc_attr( vp_option( 'vpt_option.contact_name' ) );
						$contact_address = esc_attr( vp_option( 'vpt_option.contact_address' ) );
						$contact_city = esc_attr( vp_option( 'vpt_option.contact_city' ) );
						$contact_state = esc_attr( vp_option( 'vpt_option.contact_state' ) );
						$contact_zip = esc_attr( vp_option( 'vpt_option.contact_zip' ) );
						$contact_country = esc_attr( vp_option( 'vpt_option.contact_country' ) );
						?>
						
						<div id="k-contact-map" class="clearfix"><!-- map -->
							<div id="g-map-1" class="map" data-gmaptitle="<?php echo $map_title; ?>" data-gmapzoom="<?php echo $map_zoom; ?>" data-gmaplon="<?php echo $map_lon; ?>" data-gmaplat="<?php echo $map_lat; ?>" data-gmapmarker="<?php echo $map_marker; ?>" data-cname="<?php echo $contact_name; ?>" data-caddress="<?php echo $contact_address; ?>" data-ccity="<?php echo $contact_city; ?>" data-cstate="<?php echo $contact_state; ?>" data-czip="<?php echo $contact_zip; ?>" data-ccountry="<?php echo $contact_country; ?>"></div>
						</div>
						
						<?php endif; ?>
				
						<?php						
						// main loop start
						while( have_posts() ) : the_post();
						?>
						
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<div id="post-<?php the_ID(); ?>" <?php post_class( 'news-body' ); ?>>
						
							<?php the_content(); // template content ?>
							
					        <h6><?php _e( 'Drop us Note', 'kazaz' ); // contact form title ?></h6>
					        
					        <?php 
					        // something went wrong
					        if( isset( $hasError ) || isset( $captchaError ) ) : ?>
					        
					            <div class="alert alert-danger">
					                <button type="button" class="close" data-dismiss="alert">&times;</button>
					                <?php _e( 'There was an error by form submission.', 'kazaz' ); ?>
					            </div>
					            
					        <?php endif; ?>
					        
					        <?php 
					        // allrighty, form sent!
					        if( isset( $emailSent ) && $emailSent == true ) : ?>
					        
					        <p class="text-danger"><?php _e( 'Thanks for contacting us!', 'kazaz' ); ?></p>
					        <p><?php _e( 'Your message was sent successfully. We will get in touch with you shortly.', 'kazaz' ); ?></p>
					            
					        <?php else : ?>
					
					        <form id="contactform" method="post" action="<?php the_permalink(); ?>">
					            <div class="row"><!-- starts row -->
					                <div class="form-group col-lg-6 col-md-6 col-sm-12<?php if( $nameError != '' ) echo ' has-error'; ?>">
					                    <label for="contactName"><span class="required">*</span> <?php _e( 'Name', 'kazaz' ); ?></label>
					                    <input type="text" aria-required="true" size="30" value="<?php if( isset( $_POST[ 'contactName' ] ) ) echo $_POST[ 'contactName' ]; ?>" name="contactName" id="contactName" class="form-control requiredField" />
					                    <?php if( $nameError != '' ) : ?><p class="help-block"><?php echo $nameError; ?></p><?php endif; ?>
					                </div>
					                <div class="form-group col-lg-6 col-md-6 col-sm-12<?php if( $emailError != '' ) echo ' has-error'; ?>">
					                    <label for="email"><span class="required">*</span> <?php _e( 'Email', 'kazaz' ); ?></label>
					                    <input type="text" aria-required="true" size="30" value="<?php if( isset( $_POST[ 'email' ] ) ) echo $_POST[ 'email' ]; ?>" name="email" id="email" class="form-control requiredField" />
					                    <?php if( $emailError != '' ) : ?><p class="help-block"><?php echo $emailError; ?></p><?php endif; ?>
					                </div>
					            </div><!-- ends row -->
					            
					            <div class="row"><!-- starts row -->
					                <div class="form-group col-lg-6 col-md-6 col-sm-12<?php if( $phoneError != '' ) echo ' has-error'; ?>">
					                    <label for="phone"><?php _e( 'Phone/Cell', 'kazaz' ); ?></label>
					                    <input type="text" aria-required="true" size="30" value="<?php if( isset( $_POST[ 'phone' ] ) ) echo $_POST[ 'phone' ]; ?>" name="phone" id="phone" class="form-control" />
					                </div>
					                <div class="form-group col-lg-6 col-md-6 col-sm-12<?php if( $msgSubject != '' ) echo ' has-error'; ?>">
					                    <label for="msgSubject"><?php _e( 'Message Subject', 'kazaz' ); ?></label>
					                    <input type="text" aria-required="true" size="30" value="<?php if( isset( $_POST[ 'email' ] ) ) echo $_POST[ 'email' ]; ?>" name="msgSubject" id="msgSubject" class="form-control" />
					                </div>
					            </div><!-- ends row -->
					            
					            <div class="row"><!-- starts row -->
					                <div class="form-group clearfix col-lg-12<?php if( $commentError != '' ) echo ' has-error'; ?>">
					                    <label for="comments"><span class="required">*</span> <?php _e( 'Message', 'kazaz' ); ?></label>
					                    <textarea aria-required="true" rows="5" cols="45" name="comments" id="comments" class="form-control requiredField mezage"><?php if( isset( $_POST[ 'comments' ] ) ) { if( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST[ 'comments' ] ); } else { echo $_POST[ 'comments' ]; } } ?></textarea>
					                    <?php if( $commentError != '' ) : ?><p class="help-block"><?php echo $commentError; ?></p><?php endif; ?>
					                </div>
					
					                <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
					                    <input type="hidden" name="submitted" id="submitted" value="true" />
					                    <input type="submit" value="Send Message" id="submit" name="submit" class="btn btn-default" />
					                </div>
					            </div><!-- ends row -->
					        </form>
					        
					        <?php endif; ?>
							
						</div>
							
						<?php
						// paging
						k_paging();
						
						// main loop end
						endwhile;
						?>
				
					</div>
				
				</div><!-- row end -->
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
			
		<?php
		// print sidebar wrappers - open
		k_sidebar_head();
		
		// print sidebar content
		get_template_part( 'sidebars/sidebar-contact' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>