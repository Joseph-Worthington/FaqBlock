// When document is ready look for the class faq-question-button and add a click event listener write this please

jQuery(document).ready(function($) {
    $('.faq-question-button').on('click', function() {
        if(!$(this).next().hasClass('active')){
            $('.faq-answer').removeClass('active');      
            $('.faq-question-button').removeClass('active');  
        }
        $(this).next().toggleClass('active');
        $(this).toggleClass('active');
    });
});

