/**
 * Keep this file as clean as possible.
 * Use file functions.js to define you functins
 */

jQuery(function($){


	//init fancyBox lib
	init.fancyBox()

	//show/hide side menu on click event
	navBar.sideMenuOnClick($('.showSideMenu'));

	//show/hide side menu on swipe event
	// navBar.sideMenuOnSwipe();

	//show/hide submenus on hover event
	navBar.subMenuOnHover($('.js-submenu li'));


	$(window).load(function() {

	  equalheight('.js-col-eq-height');

	}).resize(function(){

	  equalheight('.js-col-eq-height');

	});

	jQuery('.investment-chart .chart').highcharts({
	    chart: {
        	type: 'bar',
        	borderColor: '#EBBA95',
        	borderWidth: 2,
	    },
	    title:{
	        text: null
	    },
	    tooltip: {
	    	enabled:false
	    },
	    credits: {
	    	enabled:false
	    },
	    xAxis: {
	        categories: ['BORROWERS', 'STATES', 'LOAN TYPES', 'LOAN SUBTYPES'],
	        gridLineWidth:1,
			tickInterval:1,
			minorTickLength: 0,
			tickmarkPlacement:'between',
			lineWidth: 0,
		    minorGridLineWidth: 0,
		    startOnTick: false,
            tickmarkplacement:"on",
		    minorTickLength: 0,
		    tickLength: 0,
	        labels: {
				x: 10,
				align: 'left',
				reserveSpace: false,
				y: 5,
				zIndex: 101,
				useHTML:true,
			},
			plotLines: [
				{
			      color: '#B2B2B2',
			      width: 2,
			      value: -1,
			      zIndex: 100
			    },
				{
			      color: '#B2B2B2',
			      width: 2,
			      value: 0.5,
			      zIndex: 100
			    },
			    {
			      color: '#B2B2B2',
			      width: 2,
			      value: 1.5,
			      zIndex: 100
			    },
				{
			      color: '#B2B2B2',
			      width: 2,
			      value: 2.5,
			      zIndex: 100
			    }

		    ]
	    },
	    yAxis: {
			gridZIndex: 100,
			labels: {
				formatter: function() {
                    return '';
                },
				enable:false,
			},
			title: {
				text: ''
			}
	    },
	    defs: {
            gradient0: {
                tagName: 'linearGradient',
                id: 'gradient-0',
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1,
                children: [{
                    tagName: 'stop',
                    offset: 0
                }, {
                    tagName: 'stop',
                    offset: 1
                }]
            }, glow: {
                tagName: 'filter',
                id: 'glow',
                opacity: 0.5,
                children: [{
                    tagName: 'feGaussianBlur',
                    result: 'coloredBlur',
                    stdDeviation: 1.5
                }, {
                    tagName: 'feMerge',
                    children: [{
                        tagName: 'feMergeNode',
                        in: 'coloredBlur'
                    }, {
                        tagName: 'feMergeNode',
                        in: 'SourceGraphic'
                    }]
                }]
            }
        },
	    legend: {
            enabled:false
        },
	    plotOptions: {
	    	bar: {
	    		pointPadding: 0,
	            groupPadding: 0,
	            dataLabels: {
	                enabled: true,
	                align: 'right',
	                allowOverlap: true,
	                x: -20,
	                y: -5,
	                useHTML:true
	            }
	    	},
	        series: {
	            stacking: 'normal',
	        },
	    },
	    series: [{
	        data: [6, 6, 2, 5],
	    }]
	});

	var labels = ['$50K', '$100K', '$150K', '$200K', '$250K', '$300K', '$350K', '$400K'];

	jQuery('.return-chart .chart').highcharts({
		chart: {
        	type: 'area'
	    },
	    title:{
	        text: null
	    },
	    tooltip: {
	    	enabled:false
	    },
	    credits: {
	    	enabled:false
	    },
	    legend: {
            enabled:false
        },
	    xAxis: {
	        categories: ['2016', '2017', '2018', '2019', '2020', '2021',],
	        tickmarkPlacement: 'on',
	        title: {
	            enabled: false
	        }
	    },
	    yAxis: {
	        title: null,
	        tickAmount: labels.length,
	        labels: {
	            formatter: function() {
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
	        data: [5, 6, 5.5, 5.2, 5.8, 6.2, 5.7, 6, 7]
	    }, {
	        name: 'Capital Invested',
	        data: [4.5, 4.55, 4.6, 4.65, 4.7, 4.75, 4.8, 4.85, 5]
	    }]
	});
});