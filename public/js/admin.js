$(document).ready(function(){
    //accordeon
    $('.accHeader').on('click', function(){
        $(this).toggleClass('accOpen');
        $(this).next('.accContent').slideToggle();
    });
    $('.accSearch').on('click', function(event){
        event.stopPropagation();
    });
    $('.aInAcc').on('click', function(event){
        event.stopPropagation();
    });
    $('.inAccSelect').on('click', function(event){
        event.stopPropagation();
    });
    // --accordeon}
    
    // Alert Notes -->
    $('div.alert').fadeIn(500);
    setTimeout(function(){
        $('div.alert').fadeOut();
    }, 3000);
    //Alert Notes -->
   
});