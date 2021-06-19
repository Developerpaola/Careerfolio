<?php 
 		if (isset($_POST['textsearch'])) {
            $text = htmlentities($_POST['textsearch'], ENT_QUOTES, "UTF-8");
        }else{
            $text = "";
        }
        if (isset($_POST['industries'])) {
            $industries = htmlentities($_POST['industries'], ENT_QUOTES, "UTF-8"); ?>
            <script>$("#industries").val("<?php echo $industries; ?>");</script>
        <?php }else{
            $industries = "";
        }
        if (isset($_POST['location'])) {
            $location = htmlentities($_POST['location'], ENT_QUOTES, "UTF-8"); ?>
            <script>$("#location").val("<?php echo $location; ?>");</script>
        <?php }else{
            $location = "";
        }
        if(isset($_POST['sort'])){
            $sort = htmlentities($_POST['sort'], ENT_QUOTES, "UTF-8");
        }else{
            $sort = "";
        }
?>


<div class="filter-information-box">
    <form class="flag"  id="search-people" method="post" action="<?php echo home_url(); ?>/companies/">
        <div class="row">
            <div class="col">
                <input id="mytext" type="text" name="textsearch" placeholder="Search by keywords" value="<?php echo $_POST['textsearch']; ?>">
            </div>
            <div class="col">
                <select name="industries" id="industries">
                    <option value="">Sector</option>
                    <?php $wcatTerms = get_terms('categorie_industries', array('hide_empty' => 0, 'parent' =>0)); 
				   foreach($wcatTerms as $wcatTerm) : 
                        if( $wcatTerm->slug == $_POST['industries']){
                            echo '<option value="'.$wcatTerm->slug .'" selected>'. $wcatTerm->name.'</option>';
                        }else{
                            echo '<option value="'.$wcatTerm->slug .'">'. $wcatTerm->name.'</option>';
                        }
				        
				
				   endforeach; 
				   ?>
                </select>
            </div>
            <div class="col">
           
            </div>
            <div class="col-2">
                <input type="submit" name="" value="Search">
            </div>
        </div>
    </form>
</div>

<div class="sort-companies">
    <form action="<?php echo home_url(); ?>/companies/?s=" id="sort-companies" method="post">
        <p><span>Sort by:</span></p>
        <div class="row">
            <div class="col-1">
 				<select name="sort" id="sort">
				  <option>Suggested</option>
				  <option value="DESC">Z-A</option>
				  <option value="ASC">A-Z</option>
				</select>
            </div>
            <div class="col-1">
				<input type="submit" name="" value="Order">
            </div>
        
        </div>
    </form>
</div>




<section id="show-results" >

    <?php 
    if ($text != '' || $industries != '' || $sort != '' || $location != '') { 
        echo do_shortcode('[list_companies text="'.$text.'" sort="'.$sort.'" industries="'.$industries.'" location="'.$location.'" ]'); 
    }else{ 
        echo do_shortcode('[list_companies]');
    } 
    ?>

</section>