<div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Me A Message 
                    </h5>
                  </div>
                  <div>
                      <form  id="contactForm" action="#" method="post"  data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                            <div class="invalid-feedback">Your Name is Required</div> 
						            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                        <div class="invalid-feedback">Your Email is Required</div>  
						           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message"></textarea>
                           <div class="invalid-feedback ">A Message is Required</div> 
						              </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Submit</button>
                          <div class="js-form-submission validation">Submission in process, please wait..</div>
                          <div class="valid-feedback">Message Successfully submitted,Thank you!</div>
                          <div class="invalid-feedback ">There was a problem with the Contact Form, please try again!</div> 
                       </div>
                      </div>
                    </form>
                  </div>
                </div>
	            	<div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                  <?php 
                  $email= esc_attr( get_option( 'profile_email' ) );
                  $address = esc_attr( get_option( 'profile_address' ) );
                  $phone = esc_attr( get_option( 'profile_phone' ) );
	
	                $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
	                $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
	                $instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
                ?>
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Please use the social media handles below to get in touch,call me,email me or fill the form.
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span><?php echo $address; ?></li>
                      <li><span class="ion-ios-telephone"></span> <?php echo $phone; ?></li>
                      <li><span class="ion-email"></span> <?php echo $email; ?></li>
                    </ul>
                  </div>
                  <div class="socials">
                  <ul>
			             <?php if( !empty( $twitter_icon ) ): ?>
                    <li><a href="https://twitter.com/<?php echo $twitter_icon; ?>"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                   <?php endif; 
			            if( !empty( $instagram_icon ) ): ?>
                    <li><a href="https://instagram.com/<?php echo $instagram_icon; ?>"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                   <?php endif; 
			              if( !empty( $facebook_icon ) ): ?>
                   <li><a href="https://facebook.com/<?php echo $facebook_icon; ?>"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
		            	<?php endif; ?>
		              </div>
                </div>
 </div>
                    
