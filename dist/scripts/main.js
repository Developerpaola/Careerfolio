$( document ).ready(function() {
    
    $('.opener-slider').slick();
    $('.testimonial-slider').slick({
        dots: true,
        infinite: false,
    });

    $( ".down-btn" ).click(function() {
        let parent = $( this ).parent();
        if( $(parent).hasClass('active') ){
            $(parent).removeClass('active');
            $( this ).html('Read more');
        }else{
            $(parent).addClass('active');
            $( this ).html('Read less');
        }
        
    });

    $( ".openModal" ).click(function() {   
        let modal = $( this ).attr('modal');
        
        if( $("#"+modal).hasClass('active') ){
            $("#"+modal).removeClass('active');
        }else{
            $("#"+modal).addClass('active');
        }
    });


    $( ".open-tab" ).click(function() {   
        let tab = $( this ).attr('tab');
        tab = "#"+tab;
        $( tab ).click();
        
    });

    $( ".dot-btn" ).click(function() {   
        
        if( $(this).hasClass('active') ){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
    });

    $('.remove-btn').on('click', function () {
        return confirm('Are you sure?');
    });

    function goBack() {
        window.history.back();
      }


    //edit text to sections
    $('#primary-835 label[for="acf-_post_title"]').html( "Group name <span class='acf-required'>*</span>" );
    $('#primary-835 label[for="acf-_post_content"]').html( "Add a description" );

    //add text to sections
    $('#user-registration-form-41').append( "<center><p>Already have an account? <a href='http://www.careerfolio.co.uk/sign-in/'>Sign in here</a></p></center>" );
    $('.acf-field--post-title').prepend( "<h3>Basic information</h3><br>" );



});