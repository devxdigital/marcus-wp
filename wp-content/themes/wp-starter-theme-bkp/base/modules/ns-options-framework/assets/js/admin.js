// http://spin.js.org/#v2.3.2
!function(a,b){"object"==typeof module&&module.exports?module.exports=b():"function"==typeof define&&define.amd?define(b):a.Spinner=b()}(this,function(){"use strict";function a(a,b){var c,d=document.createElement(a||"div");for(c in b)d[c]=b[c];return d}function b(a){for(var b=1,c=arguments.length;c>b;b++)a.appendChild(arguments[b]);return a}function c(a,b,c,d){var e=["opacity",b,~~(100*a),c,d].join("-"),f=.01+c/d*100,g=Math.max(1-(1-a)/b*(100-f),a),h=j.substring(0,j.indexOf("Animation")).toLowerCase(),i=h&&"-"+h+"-"||"";return m[e]||(k.insertRule("@"+i+"keyframes "+e+"{0%{opacity:"+g+"}"+f+"%{opacity:"+a+"}"+(f+.01)+"%{opacity:1}"+(f+b)%100+"%{opacity:"+a+"}100%{opacity:"+g+"}}",k.cssRules.length),m[e]=1),e}function d(a,b){var c,d,e=a.style;if(b=b.charAt(0).toUpperCase()+b.slice(1),void 0!==e[b])return b;for(d=0;d<l.length;d++)if(c=l[d]+b,void 0!==e[c])return c}function e(a,b){for(var c in b)a.style[d(a,c)||c]=b[c];return a}function f(a){for(var b=1;b<arguments.length;b++){var c=arguments[b];for(var d in c)void 0===a[d]&&(a[d]=c[d])}return a}function g(a,b){return"string"==typeof a?a:a[b%a.length]}function h(a){this.opts=f(a||{},h.defaults,n)}function i(){function c(b,c){return a("<"+b+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',c)}k.addRule(".spin-vml","behavior:url(#default#VML)"),h.prototype.lines=function(a,d){function f(){return e(c("group",{coordsize:k+" "+k,coordorigin:-j+" "+-j}),{width:k,height:k})}function h(a,h,i){b(m,b(e(f(),{rotation:360/d.lines*a+"deg",left:~~h}),b(e(c("roundrect",{arcsize:d.corners}),{width:j,height:d.scale*d.width,left:d.scale*d.radius,top:-d.scale*d.width>>1,filter:i}),c("fill",{color:g(d.color,a),opacity:d.opacity}),c("stroke",{opacity:0}))))}var i,j=d.scale*(d.length+d.width),k=2*d.scale*j,l=-(d.width+d.length)*d.scale*2+"px",m=e(f(),{position:"absolute",top:l,left:l});if(d.shadow)for(i=1;i<=d.lines;i++)h(i,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(i=1;i<=d.lines;i++)h(i);return b(a,m)},h.prototype.opacity=function(a,b,c,d){var e=a.firstChild;d=d.shadow&&d.lines||0,e&&b+d<e.childNodes.length&&(e=e.childNodes[b+d],e=e&&e.firstChild,e=e&&e.firstChild,e&&(e.opacity=c))}}var j,k,l=["webkit","Moz","ms","O"],m={},n={lines:12,length:7,width:5,radius:10,scale:1,corners:1,color:"#000",opacity:.25,rotate:0,direction:1,speed:1,trail:100,fps:20,zIndex:2e9,className:"spinner",top:"50%",left:"50%",shadow:!1,hwaccel:!1,position:"absolute"};if(h.defaults={},f(h.prototype,{spin:function(b){this.stop();var c=this,d=c.opts,f=c.el=a(null,{className:d.className});if(e(f,{position:d.position,width:0,zIndex:d.zIndex,left:d.left,top:d.top}),b&&b.insertBefore(f,b.firstChild||null),f.setAttribute("role","progressbar"),c.lines(f,c.opts),!j){var g,h=0,i=(d.lines-1)*(1-d.direction)/2,k=d.fps,l=k/d.speed,m=(1-d.opacity)/(l*d.trail/100),n=l/d.lines;!function o(){h++;for(var a=0;a<d.lines;a++)g=Math.max(1-(h+(d.lines-a)*n)%l*m,d.opacity),c.opacity(f,a*d.direction+i,g,d);c.timeout=c.el&&setTimeout(o,~~(1e3/k))}()}return c},stop:function(){var a=this.el;return a&&(clearTimeout(this.timeout),a.parentNode&&a.parentNode.removeChild(a),this.el=void 0),this},lines:function(d,f){function h(b,c){return e(a(),{position:"absolute",width:f.scale*(f.length+f.width)+"px",height:f.scale*f.width+"px",background:b,boxShadow:c,transformOrigin:"left",transform:"rotate("+~~(360/f.lines*k+f.rotate)+"deg) translate("+f.scale*f.radius+"px,0)",borderRadius:(f.corners*f.scale*f.width>>1)+"px"})}for(var i,k=0,l=(f.lines-1)*(1-f.direction)/2;k<f.lines;k++)i=e(a(),{position:"absolute",top:1+~(f.scale*f.width/2)+"px",transform:f.hwaccel?"translate3d(0,0,0)":"",opacity:f.opacity,animation:j&&c(f.opacity,f.trail,l+k*f.direction,f.lines)+" "+1/f.speed+"s linear infinite"}),f.shadow&&b(i,e(h("#000","0 0 4px #000"),{top:"2px"})),b(d,b(i,h(g(f.color,k),"0 0 1px rgba(0,0,0,.1)")));return d},opacity:function(a,b,c){b<a.childNodes.length&&(a.childNodes[b].style.opacity=c)}}),"undefined"!=typeof document){k=function(){var c=a("style",{type:"text/css"});return b(document.getElementsByTagName("head")[0],c),c.sheet||c.styleSheet}();var o=e(a("group"),{behavior:"url(#default#VML)"});!d(o,"transform")&&o.adj?i():j=d(o,"animation")}return h});


jQuery(function($){

   var defaults = {
        lines: 7, // The number of lines to draw
        length: 21, // The length of each line
        width: 12, // The line thickness
        radius: 28, // The radius of the inner circle
        scale: 0.15, // Scales overall size of the spinner
        corners: 1, // Corner roundness (0..1)
        color: '#fff', // #rgb or #rrggbb or array of colors
        opacity: 0.3, // Opacity of the lines
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        speed: 1.5, // Rounds per second
        trail: 60, // Afterglow percentage
        fps: 20, // Frames per second when using setTimeout() as a fallback for CSS
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        className: '', // The CSS class to assign to the spinner
        top: '50%', // Top position relative to parent
        left: '50%', // Left position relative to parent
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        position: 'absolute', // Element positioning
    };

    $('.loading-spinner').each(function(){
        var opts = jQuery.extend(true, defaults, $(this).data('spinner') );
        new Spinner(opts).spin(this);
    });
});



/* globals wp, jQuery, nsOptions, confirm, tinymce */


var nsofEmitters = {

    /**
     * Find the group/state and an extra match part.
     *
     * @param arg
     * @param matchPart
     * @return {*}
     */
    '_match': function(arg, matchPart) {
        if( typeof matchPart === 'undefined' ) { matchPart = '.*'; }

        // Create the regular expression to match the group/state and extra match
        var exp = new RegExp( '^([a-zA-Z0-9_-]+)(\\[([a-zA-Z0-9_-]+)\\])? *: *(' + matchPart + ') *$' );
        var m = exp.exec( arg );

        if( m === null ) { return false; }

        var state = '';
        var group = 'default';

        if( m[3] !== undefined ) {
            group = m[1];
            state = m[3];
        }
        else {
            state = m[1];
        }

        return {
            'match' : m[4].trim(),
            'group' : group,
            'state' : state
        };
    },

    '_checker' : function(val, args, matchPart, callback){
        var returnStates = {};
        if( typeof args.length === 'undefined' ) {
            args = [args];
        }

        var m;
        for( var i = 0; i < args.length; i++ ) {
            m = nsofEmitters._match( args[i], matchPart );
            if ( m === false ) { continue; }

            if( m.match === '_true' || callback( val, args, m.match ) ) {
                returnStates[ m.group ] = m.state;
            }
        }

        return returnStates;
    },

    /**
     * A very simple state emitter that simply sets the given group the value
     *
     *
     * @param val
     * @param args
     * @returns {{}}
     */
    'select': function(val, args) {
        if( typeof args.length === 'undefined' ) {
            args = [args];
        }

        var returnGroups = {};
        for( var i = 0; i < args.length; i++ ) {
            if( args[i] === '' ) {
                args[i] = 'default';
            }
            returnGroups[args[i]] = val;
        }

        return returnGroups;
    },

    /**
     * The conditional state emitter uses eval to check a given conditional argument.
     *
     * @param val
     * @param args
     * @return {{}}
     */
    'conditional' : function(val, args){
        return nsofEmitters._checker( val, args, '[^;{}]*', function( val, args, match ){
            return eval( match );
        } );
    },

    /**
     * The in state emitter checks if the value is in an array of functions
     *
     * @param val
     * @param args
     * @return {{}}
     */
    'in' :  function(val, args) {
        return nsofEmitters._checker( val, args, '[^;{}]*', function( val, args, match ){
            return match.split(',').map( function(s) { return s.trim(); } ).indexOf( val ) !== -1;
        } );
    }
};


(function($){

    $.fn.nsofSetupForm = function() {

        return $(this).each( function(i, el){
            var $el = $(el),
                $mainForm,
                formId,
                formInitializing = true;

            // Skip this if the widget has any fields with an __i__
            var $inputs = $el.find('input[name]');
            if( $inputs.length && $inputs.attr('name').indexOf('__i__') !== -1 ) {
                return this;
            }

            // Skip this if we've already set up the form
            if( $el.is('.nsof-form-main') ) {
                if( $el.data('nsof-form-setup') === true ) {
                    return true;
                }
                // If we're in the main widgets interface and the form isn't visible and it isn't contained in a
                // panels dialog (when using the Layout Builder widget), don't worry about setting it up.
                if( $('body').hasClass('widgets-php') && !$el.is(':visible') && $el.closest('.panel-dialog').length === 0 ) {
                    return true;
                }

                // Listen for a state change event if this is the main form wrapper
                $el.on('nsofstatechange', function( e, incomingGroup, incomingState ){

                    // Find all wrappers that have state handlers on them
                    $el.find('[data-state-handler]').each( function(){
                        var $$ = $(this);
                        // Create a copy of the current state handlers. Add in initial handlers if the form is initializing.
                        var handler = $.extend( {}, $$.data( 'state-handler' ), formInitializing ?  $$.data('state-handler-initial' ) : {} ) ;
                        if( Object.keys( handler ).length === 0 ) {
                            return true;
                        }

                        // We need to figure out what the incoming state is
                        var handlerStateParts, handlerState, thisHandler, $$f, runHandler, handlerStateNames;

                        // Indicates if the handler has run
                        var handlerRun = {};

                        var repeaterIndex = window.nsofForms.getRepeaterId($$);
                        if( repeaterIndex !== false ) {
                            var repeaterHandler = {};
                            for( var state in handler ) {
                                repeaterHandler[ state.replace('{$repeater}', repeaterIndex) ] = handler[ state ];
                            }
                            handler = repeaterHandler;
                        }

                        // Go through all the handlers
                        for( var state in handler ) {
                            runHandler = false;

                            // Parse the handler state parts
                            handlerStateParts = state.match(/^([a-zA-Z0-9_-]+)(\[([a-zA-Z0-9_\-,]+)\])?(\[\])?$/);
                            if( handlerStateParts === null ) {
                                // Skip this if there's a problem with the state parts
                                continue;
                            }

                            handlerState = {
                                'group' : 'default',
                                'name' : '',
                                'multi' : false
                            };

                            // Assign the handlerState attributes based on the parsed state
                            if( handlerStateParts[2] !== undefined ) {
                                handlerState.group = handlerStateParts[1];
                                handlerState.name = handlerStateParts[3];
                            }
                            else {
                                handlerState.name = handlerStateParts[0];
                            }
                            handlerState.multi = (handlerStateParts[4] !== undefined);

                            if( handlerState.group === '_else' ) {
                                // This is the special case of an group else handler
                                // Always run if no handlers from the current group have been run yet
                                handlerState.group = handlerState.name;
                                handlerState.name = '';

                                // We will run this handler because none have run for it yet
                                runHandler = ( handlerState.group === incomingGroup && typeof handlerRun[ handlerState.group ] === 'undefined' );
                            }
                            else {
                                // Evaluate if we're in the current state
                                handlerStateNames = handlerState.name.split(',').map( function(a){ return a.trim() } );
                                for( var i = 0; i < handlerStateNames.length; i++ ) {
                                    runHandler = (handlerState.group === incomingGroup && handlerStateNames[i] === incomingState);
                                    if( runHandler ) break;
                                }
                            }

                            // Run the handler if previous checks have determined we should
                            if( runHandler ) {
                                thisHandler = handler[ state ];

                                // Now we can handle the the handler
                                if ( !handlerState.multi ) {
                                    thisHandler = [ thisHandler ];
                                }

                                for (var i = 0; i < thisHandler.length; i++) {
                                    // Choose the item we'll be acting on here
                                    if ( typeof thisHandler[i][1] !== 'undefined' && Boolean( thisHandler[i][1] ) ) {
                                        // thisHandler[i][1] is the sub selector
                                        $$f = $$.find( thisHandler[i][1] );
                                    }
                                    else {
                                        $$f = $$;
                                    }

                                    // Call the function on the wrapper we've selected
                                    $$f[thisHandler[i][0]].apply($$f, typeof thisHandler[i][2] !== 'undefined' ? thisHandler[i][2] : []);

                                }

                                // Store that we've run a handler
                                handlerRun[ handlerState.group ] = true;
                            }
                        }

                    } );
                } );

                // Lets set up the preview
                $el.nsofSetupPreview();
                $mainForm = $el;
            }
            else {
                $mainForm = $el.closest('.nsof-form-main');
            }
            formId = $mainForm.find('> .nsof-form-id').val();

            // Find any field or sub widget fields.
            var $fields = $el.find('> .nsof-field');

            // Process any sub sections
            $fields.find('> .nsof-section').nsofSetupForm();

            // Process any tab pane content
            $fields.find('> .nsof-tabs > .tab-content > .nsof-tab-pane > .nsof-field-type-tab').nsofSetupForm();

            // Process any sub widgets whose fields aren't contained in a section
            //$fields.filter('.nsof-field-type-widget:not(:has(> .nsof-section))').nsofSetupForm();

            // Store the field names
            $fields.find('.nsof-input').each(function(i, input){
                if( $(input).data( 'original-name') === null ) {
                    $(input).data( 'original-name', $(input).attr('name') );
                }
            });

            // Setup all the repeaters
            $fields.find('> .nsof-field-repeater').nsofSetupRepeater();

            // For any repeater items currently in existence
            $el.find('.nsof-field-repeater-item').nsofSetupRepeaterItems();

            // Set up any color fields
            $fields.find('> .nsof-wrap-input > .nsof-input-color').wpColorPicker();

            ///////////////////////////////////////
            // Handle the media upload field

            $fields.find('> .nsof-wrap-input > .media-field-wrapper').each(function(){
                var $media = $(this);
                var $field = $media.closest('.nsof-field');

                // Handle the media uploader
                $media.find('a.media-upload-button' ).click(function(e){
                    if( typeof wp.media === 'undefined' ) {
                        return;
                    }

                    var $$ = $(this);
                    var $c = $(this ).closest('.nsof-field');
                    var frame = $(this ).data('frame');

                    // If the media frame already exists, reopen it.
                    if ( frame ) {
                        frame.open();
                        return false;
                    }

                    // Create the media frame.
                    frame = wp.media( {
                        // Set the title of the modal.
                        title: $$.data('choose'),

                        // Tell the modal to show only images.
                        library: {
                            type: $$.data('library').split(',').map(function(v){ return v.trim(); })
                        },

                        // Customize the submit button.
                        button: {
                            // Set the text of the button.
                            text: $$.data('update'),
                            // Tell the button not to close the modal, since we're
                            // going to refresh the page when the image is selected.
                            close: false
                        }
                    } );

                    // Store the frame
                    $$.data('frame', frame);

                    // When an image is selected, run a callback.
                    frame.on( 'select', function() {
                        // Grab the selected attachment.
                        var attachment = frame.state().get('selection').first().attributes;

                        $c.find('.current .title' ).html(attachment.title);
                        var $inputField = $c.find( 'input[type=hidden]' );
                        $inputField.val(attachment.id);
                        $inputField.trigger('change');

                        if(typeof attachment.sizes !== 'undefined'){
                            if(typeof attachment.sizes.thumbnail !== 'undefined'){
                                $c.find('.current .thumbnail' ).attr('src', attachment.sizes.thumbnail.url).fadeIn();
                            }
                            else {
                                $c.find('.current .thumbnail' ).attr('src', attachment.sizes.full.url).fadeIn();
                            }
                        }
                        else{
                            $c.find('.current .thumbnail' ).attr('src', attachment.icon).fadeIn();
                        }

                        $field.find('.media-remove-button').removeClass('remove-hide');

                        frame.close();
                    } );

                    // Finally, open the modal.
                    frame.open();

                    return false;
                });

                $media.find('.current' )
                    .mouseenter(function(){
                        var t = $(this ).find('.title' );
                        if( t.html() !== ''){
                            t.fadeIn('fast');
                        }
                    })
                    .mouseleave(function(){
                        $(this ).find('.title' ).clearQueue().fadeOut('fast');
                    })

                $field.find('a.media-remove-button' )
                    .click(function(e){
                        e.preventDefault();
                        $field.find('.current .title' ).html('');
                        $field.find('input[type=hidden]' ).val('');
                        $field.find('.current .thumbnail' ).fadeOut('fast');
                        $(this).addClass('remove-hide');
                    });

            });

            ///////////////////////////////////////
            // Handle the sections

            $fields.filter('.nsof-field-type-widget, .nsof-field-type-section').find('> label').click(function(){
                var $$ = $(this);
                $(this).toggleClass( 'nsof-section-visible' );
                $(this).siblings('.nsof-section').slideToggle(function(){
                    $(window).resize();
                    $(this).find('> .nsof-field-container-state').val($(this).is(':visible') ? 'open' : 'closed');
                });
            });

            ///////////////////////////////////////
            // Handle the icon selection

            var iconWidgetCache = {};
            $fields.filter('.nsof-field-type-icon').each(function(){
                var $$ = $(this),
                    $is = $$.find('.nsof-icon-selector'),
                    $v = $is.find('.nsof-icon-icon'),
                    $b = $$.find('.nsof-icon-selector-current');

                // Clicking on the button should display the icon selector
                $b.click(function(){
                    $is.slideToggle();
                });

                var rerenderIcons = function(){
                    var family = $is.find('select.nsof-icon-family').val();
                    var container = $is.find('.nsof-icon-icons');

                    if(typeof iconWidgetCache[family] === 'undefined') {
                        return;
                    }

                    container.empty();

                    if( $('#'+'nsof-font-'+family).length === 0) {

                        $("<link rel='stylesheet' type='text/css'>")
                            .attr('id', 'nsof-font-' + family)
                            .attr('href', iconWidgetCache[family].style_uri)
                            .appendTo('head');
                    }


                    for ( var i in iconWidgetCache[family].icons ) {

                        var icon = $('<div data-nsof-icon="' + iconWidgetCache[family].icons[i] +  '"/>')
                            .attr('data-value', family + '-' + i)
                            .addClass( 'nsof-icon-' + family )
                            .addClass( 'nsof-icon-icons-icon' )
                            .click(function(){
                                var $$ = $(this);
                                if( $$.hasClass('nsof-active') ) {
                                    // This is being unselected
                                    $$.removeClass('nsof-active');
                                    $v.val( '' );

                                    // Hide the button icon
                                    $b.find('span').hide();
                                }
                                else {
                                    // This is being selected
                                    container.find('.nsof-icon-icons-icon').removeClass('nsof-active');
                                    $$.addClass('nsof-active');
                                    $v.val( $$.data('value') );

                                    // Also add this to the button
                                    $b.find('span')
                                        .show()
                                        .attr( 'data-nsof-icon', $$.attr('data-nsof-icon') )
                                        .attr( 'class', '' )
                                        .addClass( 'nsof-icon-' + family );
                                }
                                $v.trigger('change');

                                // Hide the icon selector
                                $is.slideUp();
                            });

                        container.append(icon);

                        if( $v.val() === family + '-' + i ) {
                            if( !icon.hasClass('nsof-active') ) {
                                // This is becoming active, so simulate a click
                                icon.click();
                            }
                            icon.addClass('nsof-active');
                        }
                    }

                    // Move a selcted item to the first position
                    container.prepend( container.find('.nsof-active') );
                };

                // Create the function for changing the icon family and call it once
                var changeIconFamily = function(){
                    // Fetch the family icons from the server
                    var family = $is.find('select.nsof-icon-family').val();
                    if(typeof family === 'undefined' || family === '') {
                        return;
                    }

                    if(typeof iconWidgetCache[family] === 'undefined') {
                        $.getJSON(
                            nsOptions.ajaxurl,
                            { 'action' : 'nsof_get_icons', 'family' :  $is.find('select.nsof-icon-family').val() },
                            function(data) {
                                iconWidgetCache[family] = data;
                                rerenderIcons();
                            }
                        );
                    }
                    else {
                        rerenderIcons();
                    }
                };

                changeIconFamily();

                $is.find('select.nsof-icon-family').change(function(){
                    $is.find('.nsof-icon-icons').empty();
                    changeIconFamily();
                });
            });

            ///////////////////////////////////////
            // Handle the slider fields

            $fields.filter('.nsof-field-type-slider').each(function(){
                var $$ = $(this);
                var $input = $$.find('input[type="number"]');
                var $c = $$.find('.nsof-value-slider');

                $c.slider({
                    max: parseInt( $input.attr('max') ),
                    min: parseInt( $input.attr('min') ),
                    value: parseInt( $input.val() ),
                    slide: function( event, ui ) {
                        $input.val( parseInt(ui.value) );
                        $$.find('.nsof-slider-value').html( ui.value );
                    }
                });
            });

            ///////////////////////////////////////
            // Setup the URL fields

            $fields.filter('.nsof-field-type-link').each( function(){
                var $$ = $(this);

                // Function that refreshes the list of
                var request = null;
                var refreshList = function(){
                    if( request !== null ) {
                        request.abort();
                    }

                    var query = $$.find('.content-text-search').val();

                    var $ul = $$.find('ul.posts').empty().addClass('loading');
                    $.get(
                        nsOptions.ajaxurl,
                        { action: 'nsof_link_search_posts', query: query },
                        function(data){
                            for( var i = 0; i < data.length; i++ ) {
                                if( data[i].post_title === '' ) {
                                    data[i].post_title = '&nbsp;';
                                }

                                // Add all the post items
                                $ul.append(
                                    $('<li>')
                                        .addClass('post')
                                        .html( data[i].post_title + '<span>(' + data[i].post_type + ')</span>' )
                                        .data( data[i] )
                                );
                            }
                            $ul.removeClass('loading');
                        }
                    );
                };

                // Toggle display of the existing content
                $$.find('.select-content-button, .button-close').click( function(e) {
                    e.preventDefault();

                    $(this).blur();
                    var $s = $$.find('.existing-content-selector');
                    $s.toggle();

                    if( $s.is(':visible') && $s.find('ul.posts li').length === 0 ) {
                        refreshList();
                    }

                } );

                // Clicking on one of the url items
                $$.on( 'click', '.posts li', function(e){
                    e.preventDefault();
                    var $li = $(this);
                    $$.find('input.nsof-input').val( 'post: ' + $li.data('ID') );
                    $$.find('.existing-content-selector').toggle();
                } );

                var interval = null;
                $$.find('.content-text-search').keyup( function(){
                    if( interval !== null ) {
                        clearTimeout(interval);
                    }

                    interval = setTimeout(function(){
                        refreshList();
                    }, 500);
                } );
            } );

            ///////////////////////////////////////
            // Now lets handle the state emitters

            var stateEmitterChangeHandler = function(){
                var $$ = $(this);

                // These emitters can either be an array or a
                var emitters = $$.closest('[data-state-emitter]').data('state-emitter');

                if( typeof emitters !== 'undefined' ) {
                    var handleStateEmitter = function(emitter, currentStates){
                        if( typeof nsofEmitters[ emitter.callback ] === 'undefined' || emitter.callback.substr(0,1) === '_' ) {
                            // Skip if the function doesn't exist, or it starts with an underscore (internal functions).
                            return currentStates;
                        }

                        // Check if this is inside a repeater
                        var repeaterIndex = window.nsofForms.getRepeaterId($$);
                        if( repeaterIndex !== false ) {
                            emitter.args = emitter.args.map( function( a ){
                                return a.replace('{$repeater}', repeaterIndex);
                            } );
                        }

                        // Return an array that has the new states added to the array
                        return $.extend( currentStates, nsofEmitters[emitter.callback]( $$.val(), emitter.args ) );
                    };

                    // Run the states through the state emitters
                    var states = { 'default' : '' };

                    // Go through the array of emitters
                    if( typeof emitters.length === 'undefined' ) {
                        emitters = [emitters];
                    }

                    for( var i = 0; i < emitters.length; i++ ) {
                        states = handleStateEmitter( emitters[i], states );
                    }

                    // Check which states have changed and trigger appropriate nsofstatechange
                    var formStates = $mainForm.data('states');
                    if( typeof formStates === 'undefined' ) {
                        formStates = { 'default' : '' };
                    }
                    for( var k in states ) {
                        if( typeof formStates[k] === 'undefined' || states[k] !== formStates[k] ) {
                            // If the state is different from the original formStates, then trigger a state change
                            formStates[k] = states[k];
                            $mainForm.trigger( 'nsofstatechange', [ k, states[k] ] );
                        }
                    }

                    // Store the form states back in the form
                    $mainForm.data('states', formStates);
                }
            };

            $fields.filter('[data-state-emitter]').each( function(){

                // Listen for any change events on an emitter field
                $(this).find('.nsof-input').on('keyup change', stateEmitterChangeHandler);

                // Trigger initial state emitter changes
                $(this).find('.nsof-input').each(function(){
                    var $$ = $(this);
                    if( $$.is(':radio') ) {
                        // Only checked radio inputs must have change events
                        if( $$.is(':checked') ) {
                            stateEmitterChangeHandler.call( $$[0] );
                        }
                    }
                    else{
                        stateEmitterChangeHandler.call( $$[0] );
                    }
                });

            } );

            // Give plugins a chance to influence the form
            $el.trigger( 'nsofsetupform', $fields ).data('nsof-form-setup', true);
            $el.find('.nsof-field-repeater-item').trigger('updateFieldPositions');

            /////////////////////////////
            // The end of the form setup.
            /////////////////////////////

            formInitializing = false;
        } );
    };

    $.fn.nsofSetupPreview = function(){
        var $el = $(this);
        var previewButton = $el.siblings('.nsof-preview');

        previewButton.find('> a').click(function(e){
            e.preventDefault();

            // TODO: This very closely resembles the data extraction code in Page Builder. Try find a way to avoid having
            // to maintain it in two places.
            // Lets build the data from the widget
            var data = {};
            $el.find( '*[name]' ).each( function () {
                var $$ = $(this);
                var name = /[a-zA-Z0-9\-]+\[[a-zA-Z0-9]+\]\[(.*)\]/.exec( $$.attr('name') );

                if( name === undefined ) {
                    return true;
                }

                name = name[1];
                var parts = name.split('][');

                // Make sure we either have numbers or strings
                parts = parts.map(function(e){
                    if( !isNaN(parseFloat(e)) && isFinite(e) ) {
                        return parseInt(e);
                    }
                    else {
                        return e;
                    }
                });

                var sub = data;
                for(var i = 0; i < parts.length; i++) {
                    if(i === parts.length - 1) {
                        // This is the end, so we need to store the actual field value here
                        if( $$.attr('type') === 'checkbox' ){
                            if ( $$.is(':checked') ) {
                                sub[ parts[i] ] = $$.val() !== '' ? $$.val() : true;
                            } else {
                                sub[ parts[i] ] = false;
                            }
                        }
                        else if( $$.attr('type') === 'radio' ){
                            if ( $$.is(':checked') ) {
                                sub[ parts[i] ] = $$.val() !== '' ? $$.val() : true;
                            }
                        }
                        else if($$.prop('tagName') === 'TEXTAREA' && $$.hasClass('wp-editor-area')) {
                            // This is a TinyMCE editor, so we'll use the tinyMCE object to get the content
                            var editor = null;
                            if ( typeof tinyMCE !== 'undefined' ) {
                                editor = tinyMCE.get( $$.attr('id') );
                            }

                            if( editor !== null && typeof( editor.getContent ) === "function" && !editor.isHidden() ) {
                                sub[ parts[i] ] = editor.getContent();
                            }
                            else {
                                sub[ parts[i] ] = $$.val();
                            }
                        }
                        else {
                            sub[ parts[i] ] = $$.val();
                        }
                    }
                    else {
                        if(typeof sub[parts[i]] === 'undefined') {
                            sub[parts[i]] = {};
                        }
                        // Go deeper into the data and continue
                        sub = sub[parts[i]];
                    }
                }
            } );

            // Create a new modal window
            var modal = $( $('#so-widgets-bundle-tpl-preview-dialog').html().trim() ).appendTo('body');
            modal.find('input[name="data"]').val( JSON.stringify(data) );
            modal.find('input[name="class"]').val( $el.data('class') );
            modal.find('iframe').on('load', function(){
                $(this).css('visibility', 'visible');
            });
            modal.find('form').submit();

            modal.find('.close').click(function(){
                modal.remove();
            });
        });
    };

    $.fn.nsofSetupRepeater = function(){

        return $(this).each( function(i, el){
            var $el = $(el);
            var $items = $el.find('.nsof-field-repeater-items');
            var name = $el.data('repeater-name');

            $items.bind('updateFieldPositions', function(){
                var $$ = $(this);
                var $rptrItems = $$.find('> .nsof-field-repeater-item');
                // Set the position for the repeater items
                $rptrItems.each(function(i, el){
                    $(el).find('.nsof-input').each(function(j, input){
                        var pos = $(input).data('repeater-positions');
                        if( typeof pos === 'undefined' ) {
                            pos = {};
                        }

                        pos[name] = i;
                        $(input).data('repeater-positions', pos);
                    });
                });

                // Update the field names for all the input items
                $$.find('.nsof-input').each(function(i, input){
                    var pos = $(input).data('repeater-positions');
                    var $in = $(input);

                    if(typeof pos !== 'undefined') {
                        var newName = $in.data('original-name');

                        if(typeof newName === 'undefined') {
                            $in.data( 'original-name', $in.attr('name') );
                            newName = $in.attr('name');
                        }
                        if( ! newName ) {
                            return;
                        }
                        for(var k in pos) {
                            newName = newName.replace('#' + k + '#', pos[k] );
                        }
                        $(input).attr('name', newName);
                    }
                });

                //Setup scrolling.
                var scrollCount = $el.data('scroll-count') ? parseInt($el.data('scroll-count')) : 0;
                if( scrollCount > 0 && $rptrItems.length > scrollCount) {
                    var itemHeight = $rptrItems.first().outerHeight();
                    $$.css('max-height', itemHeight * scrollCount).css('overflow', 'auto');
                }
                else {
                    //TODO: Check whether there was a value before overriding and set it back to that.
                    $$.css('max-height', '').css('overflow', '');
                }
            });

            $items.sortable( {
                handle : '.nsof-field-repeater-item-top',
                items : '> .nsof-field-repeater-item',
                update: function(){
                    $items.trigger('updateFieldPositions');
                }
            });
            $items.trigger('updateFieldPositions');

            $el.find('> .nsof-field-repeater-footer .nsof-field-repeater-add').disableSelection().click( function(e){
                e.preventDefault();
                $el.closest('.nsof-field-repeater')
                    .nsofAddRepeaterItem()
                    .find('> .nsof-field-repeater-items').slideDown('fast', function(){
                        $(window).resize();
                    });
            } );

            $el.find('> .nsof-field-repeater-top > .nsof-field-repeater-expand').click( function(e){
                e.preventDefault();
                $el.closest('.nsof-field-repeater').find('> .nsof-field-repeater-items').slideToggle('fast', function() {
                    $(window).resize();
                });
            } );
        } );
    };

    $.fn.nsofAddRepeaterItem = function(){
        return $(this).each( function(i, el){

            var $el = $(el);
            var $nextIndex = $el.find('> .nsof-field-repeater-items').children().length+1;

            // Create an object with the repeater html so we can make some changes to it.
            var repeaterObject = $( '<div>' + $el.find('> .nsof-field-repeater-item-html').html() + '</div>' );
            repeaterObject.find('[data-name]').each( function(){
                var $$ = $(this);
                // Skip out items that are themselves inside repeater HTML wrappers
                if( $$.closest('.nsof-field-repeater-item-html').length === 0 ) {
                    $$.attr('name', $(this).data('name'));
                }
            } );
            var repeaterHtml = repeaterObject.html().replace(/_id_/g, $nextIndex);

            var readonly = typeof $el.attr('readonly') != 'undefined';
            var item = $('<div class="nsof-field-repeater-item ui-draggable" />')
                .append(
                    $('<div class="nsof-field-repeater-item-top" />')
                        .append(
                            $('<div class="nsof-field-expand" />')
                        )
                        .append(
                            readonly ? '' : $('<div class="nsof-field-copy" />')
                        )
                        .append(
                            readonly ? '' : $('<div class="nsof-field-remove" />')
                        )
                        .append( $('<h4 />').html( $el.data('item-name') ) )
                )
                .append(
                    $('<div class="nsof-field-repeater-item-form" />')
                        .html( repeaterHtml )
                );

            // Add the item and refresh
            $el.find('> .nsof-field-repeater-items').append(item).sortable( "refresh").trigger('updateFieldPositions');
            item.nsofSetupRepeaterItems();
            item.hide().slideDown('fast', function(){
                $(window).resize();
            });

        } );
    };

    $.fn.nsofRemoveRepeaterItem = function () {
        return $(this).each( function(i, el){
            var $itemsContainer = $(this).closest('.nsof-field-repeater-items');
            $(this).remove();
            $itemsContainer.sortable("refresh").trigger('updateFieldPositions');
        });
    };

    $.fn.nsofSetupRepeaterItems = function () {
        return $(this).each(function (i, el) {
            var $el = $(el);

            if (typeof $el.data('nsofrepeater-actions-setup') === 'undefined') {
                var $parentRepeater = $el.closest('.nsof-field-repeater');
                var itemTop = $el.find('> .nsof-field-repeater-item-top');
                var itemLabel = $parentRepeater.data('item-label');
                if (itemLabel && itemLabel.selector) {
                    var updateLabel = function () {
                        var functionName = ( itemLabel.hasOwnProperty('valueMethod') && itemLabel.valueMethod ) ? itemLabel.valueMethod : 'val';
                        var txt = $el.find(itemLabel.selector)[functionName]();
                        if (txt) {
                            if (txt.length > 80) {
                                txt = txt.substr(0, 79) + '...';
                            }
                            itemTop.find('h4').text(txt);
                        }
                    };
                    updateLabel();
                    var eventName = ( itemLabel.hasOwnProperty('updateEvent') && itemLabel.updateEvent ) ? itemLabel.updateEvent : 'change';
                    $el.bind(eventName, updateLabel);
                }

                itemTop.click(function (e) {
                    if (e.target.className === "nsof-field-remove" || e.target.className === "nsof-field-copy") {
                        return;
                    }
                    e.preventDefault();

                    $(this).toggleClass('active');

                    $(this).closest('.nsof-field-repeater-item').find('.nsof-field-repeater-item-form').eq(0).slideToggle('fast', function () {
                        $(window).resize();
                        if($(this).is(':visible')) {
                            $(this).trigger('slideToggleOpenComplete');
                        }
                        else {
                            $(this).trigger('slideToggleCloseComplete');
                        }
                    });
                });

                itemTop.find('.nsof-field-remove').click(function (e) {
                    e.preventDefault();
                    if ( confirm( nsOptions.sure ) ) {
                        var $s = $(this).closest('.nsof-field-repeater-items');
                        $(this).closest('.nsof-field-repeater-item').slideUp('fast', function () {
                            $(this).remove();
                            $s.sortable("refresh").trigger('updateFieldPositions');
                            $(window).resize();
                        });
                    }
                });
                itemTop.find('.nsof-field-copy').click(function(e){
                    e.preventDefault();
                    var $form = $(this).closest('.nsof-form-main');
                    var $item = $(this).closest('.nsof-field-repeater-item');
                    var $copyItem = $item.clone();
                    var $items = $item.closest('.nsof-field-repeater-items');
                    //var $nextIndex = $item.index()+1;
                    var $nextIndex = $items.children().length;
                    var newIds = {};

                    $copyItem.find( '*[name]' ).each( function () {
                        var $inputElement = $(this);
                        var id = $inputElement.attr('id');
                        var nm = $inputElement.attr('name');
                        // TinyMCE field :/
                        if($inputElement.is('textarea') && $inputElement.parent().is('.wp-editor-container') && typeof tinymce != 'undefined') {
                            $inputElement.parent().empty().append($inputElement);
                            $inputElement.css('display', '');
                            var curEd = tinymce.get(id);
                            if(curEd) {
                                $inputElement.val(curEd.getContent());
                            }
                        }
                        // Color field :/
                        else if( $inputElement.is('.wp-color-picker')) {
                            var $wpPickerContainer = $inputElement.closest('.wp-picker-container');
                            var $soWidgetField = $inputElement.closest('.nsof-field');
                            $wpPickerContainer.remove();
                            $soWidgetField.append($inputElement.remove());
                        }
                        else {
                            var $originalInput = $item.find('[name="' + nm + '"]');
                            if( $originalInput.length && $originalInput.val() != null ){
                                $inputElement.val($originalInput.val());
                            }
                        }
                        if(id) {
                            var idBase = id.replace(/-\d+$/, '');
                            if (!newIds[idBase]) {
                                newIds[idBase] = $form.find('.nsof-input[id^=' + idBase + ']').not('[id*=_id_]').length + 1;
                            }
                            var newId = idBase + '-' + newIds[idBase]++;
                            $inputElement.attr('id', newId);
                            $copyItem.find('label[for=' + id + ']').attr('for', newId);
                            $copyItem.find('[id*=' + id + ']').each(function() {
                                var oldIdAttr = $(this).attr('id');
                                var newIdAttr = oldIdAttr.replace(id, newId);
                                $(this).attr('id', newIdAttr);
                            });
                            if(typeof tinymce != 'undefined' && tinymce.get(newId)) {
                                tinymce.get(newId).remove();
                            }
                        }
                        var nestLevel = $item.parents('.nsof-field-repeater').length;
                        var $body = $('body');
                        if( ($body.hasClass('wp-customizer') || $body.hasClass('widgets-php')) && $el.closest('.panel-dialog').length == 0) {
                            nestLevel += 1;
                        }
                        var newName = nm.replace(new RegExp('((?:.*?\\[\\d+\\]){'+(nestLevel-1).toString()+'})?(.*?\\[)\\d+(\\])'), '$1$2'+$nextIndex.toString()+'$3');
                        $inputElement.attr('name', newName);
                        $inputElement.data('original-name', newName);
                    } );

                    //$item.after($copyItem);
                    //$items.sortable( "refresh").trigger('updateFieldPositions');
                    $items.append($copyItem).sortable( "refresh").trigger('updateFieldPositions');
                    $copyItem.nsofSetupRepeaterItems();
                    $copyItem.hide().slideDown('fast', function(){
                        $(window).resize();
                    });
                });

                $el.find('> .nsof-field-repeater-item-form').nsofSetupForm();

                $el.data('nsofrepeater-actions-setup', true);
            }
        });
    };


    // Widgets Bundle utility functions
    var nsofForms = {
        /**
         * Get the unique index of a repeater item.
         *
         * @param $el
         * @return {*}
         */
        getRepeaterId: function( $el ) {
            if( typeof this.id === 'undefined' ) {
                this.id = 1;
            }

            var $r = $el.closest('.nsof-field-repeater-item');
            if( $r.length ) {
                var itemId = $r.data('item-id');
                if( itemId === undefined ) {
                    itemId = this.id++;
                }
                $r.data('item-id', itemId);

                return itemId;
            }
            else {
                return false;
            }
        },

        getWidgetFieldVariable: function ( widgetClass, elementName, key ) {
            var widgetVars = window.nsof_field_javascript_variables[widgetClass];
            // Get rid of any index placeholders
            elementName = elementName.replace( /\[#.*?#\]/g, '');
            var variablePath = /[a-zA-Z0-9\-]+(?:\[c?[0-9]+\])?\[(.*)\]/.exec( elementName )[1];
            var variablePathParts = variablePath.split('][');
            var elementVars = variablePathParts.length ? widgetVars : null;
            while(variablePathParts.length) {
                elementVars = elementVars[variablePathParts.shift()];
            }
            return elementVars[key];
        },

        fetchWidgetVariable: function (key, widget, callback) {
            window.nsofVars = window.nsofVars || {};

            if (typeof window.nsofVars[widget] === 'undefined') {
                $.post(
                    nsOptions.ajaxurl,
                    { 'action': 'nsof_get_javascript_variables', 'widget': widget, 'key': key },
                    function (result) {
                        window.nsofVars[widget] = result;
                        callback(window.nsofVars[widget][key]);
                    }
                );
            }
            else {
                callback(window.nsofVars[widget][key]);
            }
        }
    };
    window.nsofForms = nsofForms;

    $(document).trigger('nsofadminloaded');

})(jQuery);

