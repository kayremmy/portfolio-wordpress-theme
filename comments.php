<div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left"><?php comments_number();?></h4>
            </div>
            <ul class="list-comments">
            <?php 
	               $args = array(
                    'walker'            => null,
                    'max_depth'         => '',
                    'style'             => 'ul',
                    'reply_text'        => 'Reply',
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 40,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => '', // or 'xhtml' if no 'HTML5' theme support
                    'short_ping'        => false,   // @since 3.6
                    'echo'              => true     // boolean, default is true
                   ); 
	                wp_list_comments( $args);
	 
	?>
            </ul>
          </div>
         <div class="form-comments">
            <?php 
            		$fields = array(
                        'author' =>
                            '<div class="col-md-12 mb-3"><div class="form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div></div>',
                            
                        'email' =>
                            '<div class="col-md-12 mb-3"><div class="form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',
                            
                        'url' =>
                            '<div class="col-md-12 mb-3"><div class="form-group last-field"><label for="url">' . __( 'Website', 'domainreference' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>'
                    );
                    $args = array(		
                        'class_submit' => 'button button-a button-big button-rouded',
                        'label_submit' => __( 'Submit Comment' ),
                        'comment_field' =>
                            '<div class="col-md-12 mb-3"><div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment"  class="form-control input-mf" name="comment"  cols="45" rows="4" required="required"></textarea></p></div></div>',
                        'fields' => apply_filters( 'comment_form_default_fields', $fields )
                    );
            if(comments_open()){
            comment_form($args); 
            }else{
                echo '<h4 class="title-comments title-left">Comments are closed</h4>';
                }
        ?>
          </div>