$(document).ready(function() {
    // Drop Down Function
    $('#menuButton').on('change', function(){
        ($('#menuButton').is(':checked'))?(
            $('.the-bass').addClass('dropped')
        ):(
            $('.the-bass').removeClass('dropped')
        );
    });
});
