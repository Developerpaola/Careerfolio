<?php

 get_header(); 
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
 ?>


<div class="container">
	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args =  array(
                                'orderby' => 'date',  
                                'post_type'  => 'company',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'meta_query' => array(
                                array(
                                    'key' => 'industries',
                                    'value' => $term_id,
                                    'compare' => 'LIKE'
                                )
                            )
                                
    
                                
                            ) ;
    $postslist = new WP_Query( $args );
    if ( $postslist->have_posts() ) :
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

                            
                            
                                $post_author_id = get_post_field( 'post_author');
                                $terms = get_field('industries');
                                $termsname='';
                                if( $terms ): 
                                    foreach( $terms as $term ):
                                        $termsname .= '<a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>, ';
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


                                

                               $msg .='<div class="post-box company_box">
                                        <a href="'.get_permalink( ).'"><div class="post-box-img" style="'.$hero.'"></div></a>
                                        <div class="table-box" style="'.$hero.'">
                                            <div class="table-cell">
                                                <a class="black-btn" href="'.get_permalink( ).'">View company</a>
                                                <a class="white-btn" href="'.get_permalink( ).'/?open=true">Connect</a>
                                            </div>
                                        </div>
                                        <div class="post-box-info">
                                            <div class="clear"></div>
                                            <div class="column c_30"> <a href="'.get_permalink( ).'"><div class="circle-img" style="'.$logo.'"> </div></a></div>
                                           <div class="column c_70"><a href="'.get_permalink( ).'"><h3>'.get_the_title( ).'</h3><p>'.wp_trim_words(get_field('description'), 10) .'</p></a></div>
                                           <div class="clear"></div>
                                           <div class="line"></div>
                                           <div class="info-co">
                                            <p><strong>Location: </strong>'.get_field('location')->taxonomy.'</p>
                                            <p><strong>Industries: </strong>'. $termsname.'</p>
                                           </div>

                                           <span class="info-label">Case Studies: 54</span>
                                           <span class="info-label">Promotions: 5</span>
                                           <span class="info-label">Active Jobs: 4</span>
                                        </div>
                               </div>
                               ';
                            
         endwhile;  

             $big = 999999999;
     echo '<nav class="pagination">'.paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $postslist->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) ).'</nav>';

    endif;
                            

    echo $msg;

	?>
</div>

<?php get_footer(); ?>