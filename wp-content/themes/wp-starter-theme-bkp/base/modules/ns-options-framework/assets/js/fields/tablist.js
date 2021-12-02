jQuery(function($) {


    // $('.tab-links').each(function(){

    //     var _self = $(this),
    //         childClass = _self.first().children();

    //     if(childClass.hasClass('active')){
    //         var tab = $(this).find('a').attr('href');

    //         $(tab).show();
    //     }
    // });


    $(document).on('click', '.nsof-tabs .tab-links a', function(e)  {

        var _self = $(this);

        if( _self.parent().hasClass('group-name') ){

            $(this).parent().next().slideToggle();
        }else{

            var nav_index = $(this).parent().index();

            // Show/Hide Tabs
            $(this).closest('.tab-links').siblings('.tab-content').children().eq(nav_index).fadeIn(400).siblings().hide();

            //change/remove current tab to active (for simple tabs)
            $(this).parent().addClass('active').siblings().removeClass('active');

            //change/remove current tab to active (for group tabs)
            $(this).closest('.tab-links').find('.group-child').children('.active').not( $(this).parent().addClass('active') ).removeClass('active');
        }

        e.preventDefault();
    });
});