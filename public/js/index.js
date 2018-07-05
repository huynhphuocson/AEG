var Highcharts = require('highcharts');

// Load module after Highcharts is loaded
require('highcharts/modules/exporting')(Highcharts);

// Create the chart

$(document).ready(function(){
   var options ={
       chart: {
           renderTo: 'container-charts',
           type: 'column'
       },

       xAxis: {
           type: 'category'
       },

       series: [{
           "data":{
           }
       }],

       title: {
           text: 'Chart with orders'
       },
   };
   $.getJSON('/AEG_2/AEG/admin/home/datacharts', function (data) {
       /*console.log(data);*/

       /*var i = 0;
       var a = new Array();
       var b = new Array();
       while(i < data.length ){
           /!*options.xAxis.categories = data[i]['order_date'];*!/
           b[i] = data[i]['order_date'];
           a[i] = data[i]['soluong'] ;
           i++;
       }*/

       /*console.log(a);*/
       options.series[0].data = data;

       var chart = new Highcharts.Chart(options);
   });
   $('#clickme').click(function(event) {
       event.preventDefault();
       $.ajax({
           url : "/AEG_2/AEG/admin/home/datacharts",
           type : "post",
           dataType:"json",
           data : {
               data_status: $('#orders_status').val(),
               date_select_1 : $('#date_select_1').val(),
               date_select_2 : $('#date_select_2').val(),
           },
           success : function (data){
               /*console.log(data);*/
               /*var i = 0;
               while(i < data.length ){
                   console.log(i + ' ------ ' +data[i][0]);
                   options.xAxis.categories = data[i][0];
                   i++;
               }*/
               options.series[0].data = data;
               var chart = new Highcharts.Chart(options);
           }
       });
   });


});