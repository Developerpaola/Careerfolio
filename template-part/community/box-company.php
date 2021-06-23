<?php 
$post_author_id = get_post_field( 'post_author');

                                $terms = get_field('industries');
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                      array_push($arr, esc_html( $term->name ));
                                        $termsname .= '<div class="comma">,</div> <a href="'. esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>';
                                    endforeach; 
                                endif; 

                                


                                if( get_field('logo')){
                                     $logo = 'background-image:url('. get_field('logo').');';
                                }else{
                                    $logo = "";
                                }

                                if(get_field('hero_image')){
                                     $hero = 'background-image:url('. get_field('hero_image' ).');';
                                }else{
                                    $hero = "";
                                }
                                $city = get_field('city');
                                $country = get_field('location');
                                $countryname = get_term($country);

                                //get total case studies
                                  $post_list_case_studies = get_posts( array(
                                    'orderby'    => 'date',
                                    'sort_order' => 'asc',    
                                    'post_type'  => 'case_studies' ,
                                    'posts_per_page' => -1,
                                    'author' => $post_author_id,
                                    'meta_query'  => array(
                                      'relation'    => 'AND',
                                      array(
                                        'key'   => 'company',
                                        'value'   => get_the_ID(),
                                        'compare' => 'IN'
                                      )
                                      
                                    )
                                ) );
                                 $num_case_studie = 0;
                                foreach ( $post_list_case_studies as $post_case_studies ) {
                                  $num_case_studie++;
                                }
                                $total_case_studie = $num_case_studie;

                                //get total promotions
                                $post_list_promotions = get_posts( array(
                                  'orderby'    => 'date',
                                  'sort_order' => 'asc',    
                                  'post_type'  => 'promotions' ,
                                  'posts_per_page' => -1,
                                  'author' => $post_author_id,
                                  'post_status' => 'any',
                                  'meta_query'  => array(
                                      'relation'    => 'AND',
                                      array(
                                        'key'   => 'company',
                                        'value'   => get_the_ID(),
                                        'compare' => 'IN'
                                      )
                                      
                                    )
                              ) );
                                $num_promotions = 0;
                              foreach ( $post_list_promotions as $post_promotions ) {
                                $num_promotions++;
                              }
                              $total_promotions = $num_promotions;

                              //get total jobs
                                $post_list_jobs = get_posts( array(
                                  'orderby'    => 'date',
                                  'sort_order' => 'asc',    
                                  'post_type'  => 'jobs' ,
                                  'posts_per_page' => -1,
                                  'author' => $post_author_id,
                                  'post_status' => 'any',
                                  'meta_query'  => array(
                                      'relation'    => 'AND',
                                      array(
                                        'key'   => 'company',
                                        'value'   => get_the_ID(),
                                        'compare' => 'IN'
                                      )
                                      
                                    )
                                ) );
                                $num_jobs = 0;
                                foreach ( $post_list_jobs as $post_job ) { 
                                  $num_jobs++;
                                }
                                $total_jobs = $num_jobs;

                                $col = "4";
                                if  (is_author() ){
                                  $col = "6";

                                }

                                $msg .='<div class="col-'.$col.'"><div class="post-box company_box">
                                        <a href="'.get_permalink( ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
                                        <div class="table-box" style="'.$hero.'">
                                            <div class="table-cell">
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="row">
                                                <div class="col-5"> <a href="'.get_permalink( ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
                                                <div class="col-7 text-right"> <a class="btn-style-roundbox" style="margin:10px 0;" href="'.get_permalink( ).'">Connect +</a></div>
                                           </div>
                                           <h3>'.get_the_title( ).'</h3>
                                           <p>'.wp_trim_words(get_field('description'), 5) .'</p>
                                        </div>
                               </div></div>
                               ';
                               echo $msg;

                               



?>