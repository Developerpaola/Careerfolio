$( document ).ready(function() {
    
    $('.opener-slider').slick();
    $('.testimonial-slider').slick();

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

});