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
/*
document.addEventListener('DOMContentLoaded', function () {
    var startDateEl = document.getElementById('startDate');
    var endDateEl = document.getElementById('endDate');

    var startDate = new FullCalendar.Calendar(startDateEl, {
        headerToolbar: {
            left: 'prevYear,prev',
            center: 'title',
            right: 'next,nextYear'
        },
        themeSystem: 'bootstrap',
        prev: 'fa-chevron-left',
        next: 'fa-chevron-right',
        prevYear: 'fa-angle-double-left',
        nextYear: 'fa-angle-double-right',
        initialDate: '2020-10-01', //remove for today
        selectable: true,
        dateClick: function(info) {
            info.dayEl.style.color = "white";
            changeColor(selectedDate, "black");
            selectedDate = info.dayEl
        },
        select: function (arg) {
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
            basic: {// name of view
                columnFormat: 'dd',
                columnHeaderFormat: 'dddd',
                titleFormat: 'dddd',

            },
            agenda: {// name of view
                columnFormat: 'dd',
                columnHeaderFormat: 'dddd',
                titleFormat: 'dddd',

            },
            week: {// name of view
                columnFormat: 'dd',
                columnHeaderFormat: 'dddd',
                titleFormat: 'dddd',

            },
            day: {// name of view
                columnFormat: 'dd',
                columnHeaderFormat: 'dddd',
                titleFormat: 'dddd',

            }
        },
        columnFormat: {
            month: 'dddd' //also tried 'D' but a number displayed instead
        },
        columnHeaderFormat: 'dddd',

    });

    let selectedDate = null;
    const changeColor = (el, color) => {
        if(selectedDate) {
            el.style.color = color;
        }
    };

    var endDate = new FullCalendar.Calendar(endDateEl, {
        headerToolbar: {
            left: 'prevYear,prev',
            center: 'title',
            right: 'next,nextYear'
        },
        themeSystem: 'bootstrap',
        prev: 'fa-chevron-left',
        next: 'fa-chevron-right',
        prevYear: 'fa-angle-double-left',
        nextYear: 'fa-angle-double-right',
        initialDate: '2020-10-31', //remove for today
        selectable: true,
        dateClick: function(info) {
            info.dayEl.style.color = "white";
            changeColor(selectedDate, "black");
            selectedDate = info.dayEl
        },
        select: function (arg) {
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
    startDate.select('2020-10-01');
    endDate.render();
    endDate.select('2020-10-31');
    
});*/

jQuery(document).ready(function ($) {
    // $(".generate").click(function() {  //use a class, since your ID gets mangled
    //     $('.raport').addClass("active");      //add the class to the clicked element
    // });


    let isMobile = false;
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
        isMobile = true;
    }

    if(!isMobile) {
        $("#dropdown-menu").click();
    } 

    let toggled = false;
    $('#account-dropdown').click(function() {
        if(toggled) {
            $('#account-dropdown span i').removeClass('fa-plus');
            $('#account-dropdown span i').addClass('fa-minus');   
        } else {
            $('#account-dropdown span i').removeClass('fa-minus');
            $('#account-dropdown span i').addClass('fa-plus');
        }
        toggled = !toggled;
    });
     
});

// Datatables
// $(document).ready(function ($) {

//     $('.transactions-table').DataTable({
//         "lengthChange": false,
//         "searching": false,
//         "ordering": true,
//         "info": false,
//         "paging": true,
//         "pageLength": 10,
//         "pagingType": "full_numbers",
//         "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
//                 "<'row'<'col-sm-12'tr>>" +
//                 "<'row'<'col-sm-12'p>>",
//         "language": {
//             "paginate": {
//                 "next": '<i class="fas fa-angle-right"></i>',
//                 "previous": '<i class="fas fa-angle-left"></i>',
//                 "first": '<i class="fas fa-angle-double-left"></i>',
//                 "last": '<i class="fas fa-angle-double-right"></i>',
//             }
//         }
//     });
   
// });


//init fancyBox
init.fancyBox = function () {
    // $(".fancybox").fancybox({
    // 	openEffect	: 'none',
    // 	closeEffect	: 'none'
    // });
}


//generate a random string
create.randString = function (n) {
    if (!n) {
        n = 5;
    }

    var text = '';
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for (var i = 0; i < n; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    return text;
}


//show/hide submenus on hover event
navBar.subMenuOnHover = function (target) {
    target.hover(function () {

        var thisChild = $(this).children('.sub-menu'),
                thisChild_width = thisChild.width(),
                window_width = $(window).width();

        //check if there is enough space in the right side
        if (thisChild.length > 0) {
            var rightPosition = window_width - (thisChild.offset().left + thisChild_width);

            if ((rightPosition < thisChild_width) && thisChild.closest('.sub-menu').length == 0) {
                thisChild.addClass('pull-to-left');
            }
        }


        $(this).children('.sub-menu').css({'visibility': 'visible', 'display': 'none'}).show();

    }, function () {
        $(this).children('.sub-menu').hide();
    });
};


//show/hide side menu on click event
navBar.sideMenuOnClick = function (target) {

    target.on('click', function () {
        var wrapper = $('#wrapper'),
                menuTarget = $(this).attr('data-menuTarget'),
                pushFrom = $(menuTarget).attr('data-pushFrom');

        if (typeof pushFrom !== typeof undefined && pushFrom !== false) {
            // wrapper.toggleClass(pushFrom);
        }

        $(menuTarget).toggleClass('sdm-menu-open');

        $('.sdm-menu').not($(menuTarget)).removeClass('sdm-menu-open');

        target.each(function () {
            if ($(this).attr('data-pushFrom') != pushFrom) {
                // wrapper.removeClass($(this).attr('data-pushFrom'));
            }
        })

    });
};


//show/hide side menu on swipe event
navBar.sideMenuOnSwipe = function () {

    var window_width = $(window).width();

    if (window_width < 1025) {

        $('html').swipe({
            allowPageScroll: "vertical",
            swipeStatus: function (event, phase, direction, distance, duration, fingers) {
                var elems = [],
                        wrapper = $('#wrapper');


                if (phase == 'cancel' || phase == 'end') {

                    if ($('.sdm-menu-vertical').size() == 2) {

                        $('.sdm-menu-vertical').each(function (i) {
                            elems[i] = '#' + $(this).attr('id');
                        });

                        if ((direction == 'left') && (distance > 50)) {
                            if (!wrapper.hasClass('push-from-left')) {
                                $(elems[1]).addClass('sdm-menu-open');
                                wrapper.addClass('push-from-right');
                            }

                            $(elems[0]).removeClass('sdm-menu-open');
                            wrapper.removeClass('push-from-left');
                        }
                        if ((direction == 'right') && (distance > 50)) {
                            if (!wrapper.hasClass('push-from-right')) {
                                $(elems[0]).addClass('sdm-menu-open');
                                wrapper.addClass('push-from-left');
                            }

                            $(elems[1]).removeClass('sdm-menu-open');
                            wrapper.removeClass('push-from-right');
                        }


                    } else if ($('.sdm-menu-vertical').size() == 1) {
                        var pushFrom = $('.sdm-menu-vertical').attr('data-pushFrom'),
                                elem = $('.sdm-menu-vertical');

                        if ((direction == 'left') && (distance > 50)) {
                            if (pushFrom == 'push-from-right') {
                                $(elem).addClass('sdm-menu-open');
                                wrapper.addClass(pushFrom);
                            } else {
                                $(elem).removeClass('sdm-menu-open');
                                wrapper.removeClass(pushFrom);
                            }
                        }
                        if ((direction == 'right') && (distance > 50)) {
                            if (pushFrom == 'push-from-left') {
                                $(elem).addClass('sdm-menu-open');
                                wrapper.addClass(pushFrom);
                            } else {
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



var equalheight = function (container) {

    var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;

    $(container).each(function () {

        $el = $(this);

        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
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

        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
};