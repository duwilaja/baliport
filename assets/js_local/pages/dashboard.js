var mypie, myline;
$(document).ready(function(){
	var pielegend=[];
	var piedata=[];
	var piecolor=[];
	for(var i=0;i<pies.length;i++){
		var d=pies[i];
		pielegend.push(d['kategori']);
		piedata.push(d['cc']);
		piecolor.push(randomColor());
	}
	mypie = pie("#donutchart","doughnut",pielegend,piedata,piecolor);
	  
	var linelabel=[];
	var linedata=[];
	for(var i=0;i<lines.length;i++){
		var d=lines[i];
		linelabel.push(d['dt']);
		linedata.push(d['cc']);
	}
	myline = series("#linechart",'line','Jumlah Pengaduan',linelabel,linedata);
});

function randomColor(){
	return "#"+(Math.random().toString(16)+"000000").slice(2, 8).toUpperCase();
}

function pie(pieid,type,labels,data,colors,legend=true){
	//-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $(pieid).get(0).getContext('2d')
    var pieData        = {
      labels: labels,/*[
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
      ],*/
      datasets: [
        {
          data: data,//[700,500,400,600,300,100],
          backgroundColor : colors,//['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: legend
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: type,
      data: pieData,
      options: pieOptions
    })

  //-----------------
  //- END PIE CHART -
  //-----------------
  
  return pieChart;
}

function series(chrid,type,label,labels,data){
	var ctx = $(chrid).get(0).getContext('2d');
	var theChart = new Chart(ctx, {
		type: type,
		data: {
			datasets: [{
				label: label,
				data: data,//[10, 20, 30, 40],
				backgroundColor: randomColor()
			}],
			labels: labels//['January', 'February', 'March', 'April']
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						callback: function(value, index, values) {
							if(parseInt(value) >= 1000){
                               return '' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                               return '' + value;
                            }
						}
					}
				}]
			},
			tooltips: {
				  callbacks: {
					  label: function(tooltipItem, data) {
						  var value = tooltipItem.yLabel;
							if(parseInt(value) >= 1000){
                               return '' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                               return '' + value;
                            }
					  }
				  }
			  }
		}
	});
	
	return theChart;
}