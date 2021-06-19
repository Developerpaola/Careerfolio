<?php 
 		if (isset($_POST['jobtitle'])) {
 			$namejob = htmlentities($_POST['jobtitle'], ENT_QUOTES, "UTF-8");
	 	}else{
	 		$namejob = "";
	 	}
	 	if (isset($_POST['peopleindustries'])) {
 			$peopleindustries = htmlentities($_POST['peopleindustries'], ENT_QUOTES, "UTF-8");
	 	}else{
	 		$peopleindustries = "";
	 	}
	 	if (isset($_POST['locationpeople'])) {
 			$locationpeople = htmlentities($_POST['locationpeople'], ENT_QUOTES, "UTF-8");
	 	}else{
	 		$locationpeople = "";
	 	}
	 	if (isset($_POST['carrerlevel'])) {
 			$carrer_level = htmlentities($_POST['carrerlevel'], ENT_QUOTES, "UTF-8");
	 	}else{
	 		$carrer_level = "";
	 	}
?>

<div class="filter-information-box">
    <form class="flag"  id="search-people" method="post" action="<?php echo home_url(); ?>/">
        <div class="row">
            <div class="col">
                <input id="jobtitle" type="text" name="jobtitle" placeholder="Search by keywords" value="<?php echo $_POST['jobtitle']; ?>">
            </div>
            <div class="col">
                <select name="peopleindustries" id="peopleindustries">
                    <option value="">Category</option>
                    <?php $wcatTerms = get_terms('categorie_industries', array('hide_empty' => 0, 'parent' =>0)); 
				   foreach($wcatTerms as $wcatTerm) : 
                        if( $wcatTerm->slug == $_POST['peopleindustries']){
                            echo '<option value="'.$wcatTerm->slug .'" selected>'. $wcatTerm->name.'</option>';
                        }else{
                            echo '<option value="'.$wcatTerm->slug .'">'. $wcatTerm->name.'</option>';
                        }
				        
				
				   endforeach; 
				   ?>
                </select>
            </div>
            <div class="col">
            <!--
                <select name="locationpeople" id="locationpeople">
				  <option value="">Location</option>
				  <?php $wcatTerms = get_terms('categorie_country', array('hide_empty' => 0, 'parent' =>0)); 
                    foreach($wcatTerms as $wcatTerm) : 
                        if( $wcatTerm->slug == $_POST['locationpeople']){
                            echo '<option value="'.$wcatTerm->slug .'" selected>'. $wcatTerm->name.'</option>';
                        }else{
                            echo '<option value="'.$wcatTerm->slug .'">'. $wcatTerm->name.'</option>';
                        }
				
				   endforeach;
				   ?>
				   
				</select>
                -->
                <select name="carrerlevel" id="carrerlevel"> 
                    <option value="">I want to grow in:</option>
                    <option value="Senior">Senior</option>
				    <option value="Junior">Junior</option>
                </select>

            </div>
            <div class="col-2">
                <input type="submit" name="" value="Search">
            </div>
        </div>
    </form>
</div>



<section id="show-results" >

    <?php 
    if ($namejob != '' || $peopleindustries != '' || $locationpeople != '' || $carrer_level != '') { 
        echo do_shortcode('[list_user textjob="'.$namejob.'" peopleindustries="'.$peopleindustries.'" locationpeople="'.$locationpeople.'" carrerlevel="'.$carrer_level.'"]'); 
    } else{ 
        echo do_shortcode('[list_user]');
    } 
    ?>

</section>