<?php 
$post_author_id = get_post_field ('post_author', get_the_ID()  );
$companyPostId = get_field('company', get_the_ID() );

                               $msg .='<a href="'.get_the_permalink( get_the_ID() ) .'">
                                            <div class="post-box find-job">
                                                <div class="circle-img" style="background-image:url('.get_field('logo', $companyPostId ).' )"> </div>
                                                <div class="post-box-info">
                                                    <div class="clear"></div>
                                                    <h3>'.get_the_title(get_the_ID()).'</h3>
                                                    <p>'.get_field('location',$companyPostId ).'</p>
                                                    <div class="excert_box"><p>'.wp_trim_words(get_field('description', get_the_ID() ), 25).'</p></div>
                                                     <span class="info-label">Case Studies: 54</span>
                                                    <span class="info-label">Promotions: 5</span>
                                                    <span class="info-label">Active Jobs: 4</span>
                                                </div>
                                             </div>
                                        </a>';
                            }

                            echo $msg;

?>