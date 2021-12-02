jQuery(function($) {

    var isSending = false;

    $('#nsof-save-action').on('click', function(){
        var _self = $(this);

        if(isSending){return;}

        $('#nsof-form-options').ajaxForm({
            url: ajaxurl,
            type    : 'POST',
            target  : '[data-response]',
            data: {action : 'nsofsaveformdata'},
            beforeSubmit: function(){
                isSending =  true;
                _self.attr('disabled', true).find('.loading-spinner').addClass('show');
            },
            success : function(res){
                console.log(res);
            },
            complete: function(){
                isSending = false;

                 $("html, body").animate({ scrollTop: 0 }, "slow");

                _self.attr('disabled', false).find('.loading-spinner').removeClass('show');

                setTimeout(function(){
                    _self.parent('form').find('[data-response]').children().fadeOut();
                },2500);
            }

        });
    });

});