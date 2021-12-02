/**
 * Define your js functions here
 */


var init = {},
	navBar = {},
	create = {};

// Init Bootstrap Tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// FullCalendar
document.addEventListener('DOMContentLoaded', function() {
    var startDateEl = document.getElementById('startDate');
	var endDateEl = document.getElementById('endDate');

    var startDate = new FullCalendar.Calendar(startDateEl, {
	  headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      initialDate: '2020-10-01', //remove for today
      selectable: true,
      select: function(arg) {
		var selectedDate = startDate.formatDate(arg.start, {
			month: 'long',
			year: 'numeric',
			day: 'numeric'
		});
		jQuery('#startDateDisplay').text(selectedDate);
      },
	  selectAllow: function (e) {
		if (e.end.getTime() / 1000 - e.start.getTime() / 1000 <= 86400) {
			return true;
		}
	  },
	  views: {
        basic: { // name of view
			columnFormat: 'dd',
			columnHeaderFormat : 'dddd',
			titleFormat: 'dddd',
			
		},
        agenda: { // name of view
			columnFormat: 'dd',
			columnHeaderFormat : 'dddd',
			titleFormat: 'dddd',
			
		},
        week: { // name of view
			columnFormat: 'dd',
			columnHeaderFormat : 'dddd',
			titleFormat: 'dddd',
			
		},
		day: { // name of view
			columnFormat: 'dd',
			columnHeaderFormat : 'dddd',
			titleFormat: 'dddd',
			
        }
	  },
	  columnFormat: {
		month: 'dddd' //also tried 'D' but a number displayed instead
	  },
	  columnHeaderFormat : 'dddd',
    });

    var endDate = new FullCalendar.Calendar(endDateEl, {
	  headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      initialDate: '2020-10-31', //remove for today
      selectable: true,
      select: function(arg) {
		var selectedDate = endDate.formatDate(arg.start, {
			month: 'long',
			year: 'numeric',
			day: 'numeric'
		});
		jQuery('#endDateDisplay').text(selectedDate);
      },
	  selectAllow: function (e) {
		if (e.end.getTime() / 1000 - e.start.getTime() / 1000 <= 86400) {
			return true;
		}
	  },
    });

    startDate.render();
	startDate.select( '2020-10-01' )
	endDate.render();
	endDate.select( '2020-10-31' )
  });

// Datatables
$(document).ready(function() {
	$('.transactions-table').DataTable({
        "lengthChange": false,
		"searching": false,
        "ordering": true,
        "info":     false,
		"paging":   true,
		"pageLength": 10,
		"pagingType": "full_numbers",
		"dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
			   "<'row'<'col-sm-12'tr>>" +
			   "<'row'<'col-sm-12'p>>",
		"language": {
			"paginate": {
				"next": 	'<i class="fas fa-angle-right"></i>',
				"previous": '<i class="fas fa-angle-left"></i>',
				"first": 	'<i class="fas fa-angle-double-left"></i>',
				"last": 	'<i class="fas fa-angle-double-right"></i>',
			}
		}
    });
});


//init fancyBox
init.fancyBox = function(){
	// $(".fancybox").fancybox({
	// 	openEffect	: 'none',
	// 	closeEffect	: 'none'
	// });
}


//generate a random string
create.randString = function (n){
	if(!n){
	    n = 5;
	}

	var text = '';
	var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	for(var i=0; i < n; i++){
	    text += possible.charAt(Math.floor(Math.random() * possible.length));
	}

	return text;
}


//show/hide submenus on hover event
navBar.subMenuOnHover = function(target){
	target.hover(function(){

		var thisChild = $(this).children('.sub-menu'),
			thisChild_width = thisChild.width(),
			window_width = $(window).width();

			//check if there is enough space in the right side
			if(thisChild.length>0){
				var rightPosition = window_width - (thisChild.offset().left + thisChild_width);

				if((rightPosition < thisChild_width) && thisChild.closest('.sub-menu').length==0){
					thisChild.addClass('pull-to-left');
				}
			}


        $(this).children('.sub-menu').css({'visibility': 'visible', 'display': 'none'}).show();

    }, function(){
        $(this).children('.sub-menu').hide();
    });
};


//show/hide side menu on click event
navBar.sideMenuOnClick = function(target){

	target.on('click', function(){
		var wrapper = $('#wrapper'),
			menuTarget = $(this).attr('data-menuTarget'),
			pushFrom = $(menuTarget).attr('data-pushFrom');

		if(typeof pushFrom !== typeof undefined && pushFrom !== false){
			// wrapper.toggleClass(pushFrom);
		}

		$(menuTarget).toggleClass('sdm-menu-open');

		$('.sdm-menu').not($(menuTarget)).removeClass('sdm-menu-open');

		target.each(function(){
			if($(this).attr('data-pushFrom') != pushFrom){
				// wrapper.removeClass($(this).attr('data-pushFrom'));
			}
		})

	});
};


//show/hide side menu on swipe event
navBar.sideMenuOnSwipe = function(){

	var window_width = $(window).width();

	if( window_width < 1025){

		$('html').swipe({
			allowPageScroll:"vertical",
		 	swipeStatus:function(event, phase, direction, distance, duration, fingers){
				var elems = [],
					wrapper = $('#wrapper');


				if(phase == 'cancel' || phase == 'end'){

					if($('.sdm-menu-vertical').size() == 2){

						$('.sdm-menu-vertical').each(function(i){
							elems[i] = '#'+$(this).attr('id');
						});

						if( (direction =='left') && (distance > 50) ){
							if(!wrapper.hasClass('push-from-left')){
								$(elems[1]).addClass('sdm-menu-open');
								wrapper.addClass('push-from-right');
							}

							$(elems[0]).removeClass('sdm-menu-open');
							wrapper.removeClass('push-from-left');
						}
						if ( (direction =='right') && (distance > 50) ){
							if(!wrapper.hasClass('push-from-right')){
								$(elems[0]).addClass('sdm-menu-open');
								wrapper.addClass('push-from-left');
							}

							$(elems[1]).removeClass('sdm-menu-open');
							wrapper.removeClass('push-from-right');
						}


					}else if($('.sdm-menu-vertical').size() == 1){
						var pushFrom = $('.sdm-menu-vertical').attr('data-pushFrom'),
							elem = $('.sdm-menu-vertical');

						if ( (direction =='left') && (distance > 50) ) {
							if(pushFrom == 'push-from-right'){
								$(elem).addClass('sdm-menu-open');
								wrapper.addClass(pushFrom);
							}else{
								$(elem).removeClass('sdm-menu-open');
								wrapper.removeClass(pushFrom);
							}
						}
						if ( (direction =='right') && (distance > 50) ){
							if(pushFrom == 'push-from-left'){
								$(elem).addClass('sdm-menu-open');
								wrapper.addClass(pushFrom);
							}else{
								$(elem).removeClass('sdm-menu-open');
								wrapper.removeClass(pushFrom);
							}
						}
					}
				}
			}
		});

	}

};



var equalheight = function(container){

	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;

	$(container).each(function() {

		$el = $(this);

		$($el).height('auto')
		topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}

		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
};