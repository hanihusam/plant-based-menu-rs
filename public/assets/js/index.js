$(function() {

    // chart1
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Downloads',
                data: [12, 10, 13, 25, 14, 10, 14, 10, 12],
                backgroundColor: [
                    '#212529'
                ],
                /* fill: {
                    target: 'origin',
                    above: 'rgb(146 62 185 / 21%)',   // Area will be red above the origin
                    below: 'rgb(146 62 185 / 21%)'    // And blue below the origin
                  }, */
                tension: 0.4,
                borderColor: [
                    '#212529'
                ],
                borderWidth: 0,
                borderRadius: 20
            },
            {
                label: 'Earnings',
                data: [8, 15, 9, 18, 10, 16, 8, 24, 24],
                backgroundColor: [
                    'rgb(33 37 41 / 20%)'
                ],
                fill: {
                    target: 'origin',
                    above: 'rgb(33 37 41 / 20%)',   // Area will be red above the origin
                    below: 'rgb(33 37 41 / 20%)'    // And blue below the origin
                  },
                tension: 0.4,
                borderColor: [
                    'rgb(33 37 41 / 20%)'
                ],
                borderWidth: 0,
                borderRadius: 20
            }]
        },
        options: {
            maintainAspectRatio: false,
            barPercentage: 0.7,
            categoryPercentage: 0.35,
            plugins: {
                legend: {
                    maxWidth: 20,
                    boxHeight: 20,
                    position:'bottom',
                    display: true,
                }
            },
            scales: {
                x: {
                  stacked: false,
                  beginAtZero: true
                },
                y: {
                  stacked: false,
                  beginAtZero: true
                }
              }
        }
    });




      // chart2
      var ctx = document.getElementById('chart2').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ['Clothing', 'Electronics', 'Furniture'],
              datasets: [{
                  data: [55, 20, 10],
                  backgroundColor: [
                    "rgb(33 37 41 / 100%)",
                    "rgb(33 37 41 / 50%)",
                    "rgb(33 37 41 / 25%)",
                   ],
                  borderWidth: 1
              }]
          },
          options: {
             maintainAspectRatio: false,
             cutout: 105,
             plugins: {
                legend: {
                    display: false,
                }
            }
             
          }
      });




// chart3
var ctx = document.getElementById('chart3').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Current Customers', 'New Customers', 'Retargeted Customers'],
        datasets: [{
            data: [155, 120, 110],
            backgroundColor: [
                "rgb(33 37 41 / 100%)",
                "rgb(33 37 41 / 50%)",
                "rgb(33 37 41 / 25%)",
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        cutout: 100,
        plugins: {
        legend: {
            display: false,
        }
    }
        
    }
});



   // chart 4

   var options = {
	chart: {
	  height: 300,
	  type: 'radialBar',
	  toolbar: {
		show: false
	  }
	},
	plotOptions: {
	  radialBar: {
		//startAngle: -135,
		//endAngle: 225,
		 hollow: {
		  margin: 0,
		  size: '80%',
		  background: 'transparent',
		  image: undefined,
		  imageOffsetX: 0,
		  imageOffsetY: 0,
		  position: 'front',
		  dropShadow: {
			enabled: true,
			top: 3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},
		track: {
		  ///background: '#e8edff',
		  strokeWidth: '67%',
		  margin: 0, // margin is in pixels
		  dropShadow: {
			enabled: 0,
			top: -3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},
		dataLabels: { 
		  showOn: 'always',
		  name: {
			offsetY: -20,
			show: true,
			color: '#212529',
			fontSize: '16px'
		  },
		  value: {
			formatter: function (val) {
					  return val + "%";
				  },
			color: '#212529',
			fontSize: '35px',
			show: true,
			offsetY: 10,
		  }
		}
	  }
	},
	fill: {
	  type: 'gradient',
	  gradient: {
		shade: 'light',
		type: 'horizontal',
		shadeIntensity: 0.5,
		gradientToColors: ['#212529'],
		inverseColors: false,
		opacityFrom: 1,
		opacityTo: 1,
		stops: [0, 100]
	  }
	},
	colors: ["#212529"],
	series: [78],
	stroke: {
	  lineCap: 'round',
	  //dashArray: 4
	},
	labels: ['Total Traffic'],
	responsive: [
		{
		  breakpoint: 1281,
		  options: {
			chart: {
				height: 280,
			}
		  }
		}
	  ],

  }

  var chart = new ApexCharts(
	document.querySelector("#chart4"),
	options
  );

  chart.render();




// chart 5

var options = {
    series: [{
        name: "New Visitors",
        data: [640, 560, 871, 614, 755, 457, 650]
    },{
        name: "Old Visitors",
        data: [440, 360, 671, 414, 555, 257, 450]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "bar",
        //width: 130,
		stacked: true,
        height: 335,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 15,
            blur: 4,
            opacity: .12,
            color: "#212529"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
       // colors: ["#212529", "rgb(33 37 41 / 100%)"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            //endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
	legend: {
		show: false,
	},
    stroke: {
        show: !0,
        width: 0,
        curve: "smooth"
    },
    colors: ["#212529", "#d3d3d3"],
    xaxis: {
        categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"]
    },
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();




// chart6
var ctx = document.getElementById('chart6').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Orders',
            data: [12, 19, 13, 15, 20, 10],
            backgroundColor: [
                'rgb(33 37 41 / 100%)'
            ],
            borderColor: [
                'rgb(33 37 41 / 100%)'
            ],
            borderWidth: 0,
            borderRadius: 20
        },
        {
            label: 'Visits',
            data: [7, 15, 9, 12, 17, 16],
            backgroundColor: [
                'rgb(33 37 41 / 20%)'
            ],
            borderColor: [
                'rgb(33 37 41 / 20%)'
            ],
            borderWidth: 0,
            borderRadius: 20
        }]
    },
    options: {
        maintainAspectRatio: false,
        barPercentage: 0.3,
        //categoryPercentage: 0.5,
        plugins: {
            legend: {
                position:'bottom',
                display: false,
            }
        },
        scales: {
            x: {
                stacked: true,
                beginAtZero: true
            },
            y: {
                stacked: true,
                beginAtZero: true
            }
            }
    }
});








// chart 7
var options = {
    series: [{
        name: "Total Expense",
        data: [0, 160, 671, 414, 555, 414, 555, 257, 300, 0]
    }],
    chart: {
        type: "area",
        //width: 130,
        height: 70,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#212529"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#212529"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2.5,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#212529'],
		  inverseColors: false,
		  opacityFrom: 0.7,
		  opacityTo: 0.2,
		  //stops: [0, 100]
		}
	  },
    colors: ["#212529"],
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart7"), options);
  chart.render();




// chart 8
var options = {
    series: [{
        name: "Total Orders",
        data: [0, 160, 671, 414, 555, 414, 555, 257, 300, 0]
    }],
    chart: {
        type: "area",
        //width: 130,
        height: 70,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#212529"
        },
        sparkline: {
            enabled: !0
        }
    },
    markers: {
        size: 0,
        colors: ["#212529"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "30%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2.5,
        curve: "smooth"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#212529'],
		  inverseColors: false,
		  opacityFrom: 0.7,
		  opacityTo: 0.2,
		  //stops: [0, 100]
		}
	  },
    colors: ["#212529"],
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart8"), options);
  chart.render();








  

// worl map

jQuery('#geographic-map').vectorMap(
	{
		map: 'world_mill_en',
		backgroundColor: 'transparent',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		zoomOnScroll: false,
		color: '#009efb',
		regionStyle : {
			initial : {
			  fill : '#343a40'
			}
		  },
		markerStyle: {
		  initial: {
					r: 9,
					'fill': '#fff',
					'fill-opacity':1,
					'stroke': '#000',
					'stroke-width' : 5,
					'stroke-opacity': 0.4
					},
					},
		enableZoom: true,
		hoverColor: '#009efb',
		markers : [{
			latLng : [21.00, 78.00],
			name : 'Lorem Ipsum Dollar'
		  
		  }],
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: [],
		showTooltip: true,
	});



  
    
});