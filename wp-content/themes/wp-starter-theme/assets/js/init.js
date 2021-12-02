/**
 * Keep this file as clean as possible.
 * Use file functions.js to define you functins
 */

jQuery(function ($) {


    //init fancyBox lib
    init.fancyBox();

    //show/hide side menu on click event
    navBar.sideMenuOnClick($('.showSideMenu'));

    //show/hide side menu on swipe event
    // navBar.sideMenuOnSwipe();

    //show/hide submenus on hover event
    navBar.subMenuOnHover($('.js-submenu li'));

    let isMobile = false;
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
        isMobile = true;
    }


    /* $(window).load(function () {
     
     equalheight('.js-col-eq-height');
     
     }).resize(function () {
     
     equalheight('.js-col-eq-height');
     
     });*/

/*
    const options = {
        scales: {
            x: {
                grid: {
                    z: 1,
                    color: isMobile ? 'white' : 'rgba(0, 0, 0, 0.1)'
                }
            },
            y: {
                ticks: {
                    mirror: true,
                    z: 1,
                    color: 'black',
                    font: {
                        family: 'helveticabold',
                        size: 10,
                        weight: 700
                    }
                },
                grid: {
                    z: 1,
                    color: isMobile ? 'white' : 'rgba(0, 0, 0, 0.1)'
                }
            }
        },
        indexAxis: 'y',
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide
        elements: {
          bar: {
            borderWidth: 2,
          }
        },
        responsive: true,
        plugins: {
          legend: {
              display: false
              
          },

        },
    };

    

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        
        type: 'bar',
        data: {
            labels: ['BORROWERS', 'STATES', 'LOAN TYPES', 'LOAN SUBTYPES'],
            datasets: [{
                order: 1,
                barPercentage: 1.0,
                categoryPercentage: 1.0,
                label: false,
                data: [7, 6, 5, 4, 3, 2],
                backgroundColor: [
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                ],
                borderColor: [
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                    'rgba(171, 204, 112, 0.9)',
                ],
                borderWidth: 1,
            }]
        },
        options: options,  
    });*/


    // jQuery('.investment-chart .chart').highcharts({
    //     chart: {
    //         type: 'bar',
    //         borderColor: '#EBBA95',
    //         borderWidth: 2,
    //     },
    //     title: {
    //         text: null
    //     },
    //     tooltip: {
    //         enabled: false
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     xAxis: {
    //         categories: ['BORROWERS', 'STATES', 'LOAN TYPES', 'LOAN SUBTYPES'],
    //         gridLineWidth: 1,
    //         tickInterval: 1,
    //         minorTickLength: 0,
    //         tickmarkPlacement: 'between',
    //         lineWidth: 0,
    //         minorGridLineWidth: 0,
    //         startOnTick: false,
    //         tickmarkplacement: "on",
    //         minorTickLength: 0,
    //         tickLength: 0,
    //         labels: {
    //             x: 10,
    //             align: 'left',
    //             reserveSpace: false,
    //             y: 5,
    //             zIndex: 101,
    //             useHTML: true,
    //         },
    //         plotLines: [
    //             {
    //                 color: '#B2B2B2',
    //                 width: 2,
    //                 value: -1,
    //                 zIndex: 100
    //             },
    //             {
    //                 color: '#B2B2B2',
    //                 width: 2,
    //                 value: 0.5,
    //                 zIndex: 100
    //             },
    //             {
    //                 color: '#B2B2B2',
    //                 width: 2,
    //                 value: 1.5,
    //                 zIndex: 100
    //             },
    //             {
    //                 color: '#B2B2B2',
    //                 width: 2,
    //                 value: 2.5,
    //                 zIndex: 100
    //             }

    //         ]
    //     },
    //     yAxis: {
    //         gridZIndex: 100,
    //         labels: {
    //             formatter: function () {
    //                 return '';
    //             },
    //             enable: false,
    //         },
    //         title: {
    //             text: ''
    //         }
    //     },
    //     defs: {
    //         gradient0: {
    //             tagName: 'linearGradient',
    //             id: 'gradient-0',
    //             x1: 0,
    //             y1: 0,
    //             x2: 0,
    //             y2: 1,
    //             children: [{
    //                     tagName: 'stop',
    //                     offset: 0
    //                 }, {
    //                     tagName: 'stop',
    //                     offset: 1
    //                 }]
    //         }, glow: {
    //             tagName: 'filter',
    //             id: 'glow',
    //             opacity: 0.5,
    //             children: [{
    //                     tagName: 'feGaussianBlur',
    //                     result: 'coloredBlur',
    //                     stdDeviation: 1.5
    //                 }, {
    //                     tagName: 'feMerge',
    //                     children: [{
    //                             tagName: 'feMergeNode',
    //                             in: 'coloredBlur'
    //                         }, {
    //                             tagName: 'feMergeNode',
    //                             in: 'SourceGraphic'
    //                         }]
    //                 }]
    //         }
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         bar: {
    //             pointPadding: 0,
    //             groupPadding: 0,
    //             dataLabels: {
    //                 enabled: true,
    //                 align: 'right',
    //                 allowOverlap: true,
    //                 x: -20,
    //                 y: -5,
    //                 useHTML: true
    //             }
    //         },
    //         series: {
    //             stacking: 'normal',
    //         },
    //     },
    //     series: [{
    //             data: [6, 6, 3, 5],
    //         }],
            
    // });

    var labels = ['$50K', '$100K', '$150K', '$200K', '$250K', '$300K', '$350K', '$400K'];

    jQuery('.return-chart .chart').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: null
        },
        tooltip: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        legend: {
            enabled: false
        },
        xAxis: {
            categories: ['2016', '2017', '2018', '2019', '2020', '2021', ],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: null,
            tickAmount: labels.length,
            labels: {
                formatter: function () {
                    if (this.isFirst) {
                        i = -1
                    }
                    i++;
                    return labels[i]
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' millions'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
                name: 'Internal Earned',
                data: [5, 6, 5.5, 5.2, 5.8, 6.2]
            }, {
                name: 'Capital Invested',
                data: [4.5, 4.55, 4.6, 4.65, 4.7, 4.75]
            }]
    });
});