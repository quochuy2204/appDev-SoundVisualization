<!DOCTYPE html>
<html>
<head>
<?php
	$file = "soundlog.txt";
	//read the 4 last lines
	$data = file($file);
	$line = $data[count($data)-2];
	$line2 = $data[count($data)-3];
	$line3 = $data[count($data)-4];	
	$line4 = $data[count($data)-5];	

	//pass data into arrays
	$line = trim($line); 	
	$line2 = trim($line2);
	$line3 = trim($line3);	
	$line4 = trim($line4);

	$data = explode(";", $line);
	$data2 = explode(";", $line2);
	$data3 = explode(";", $line3);
	$data4 = explode(";", $line4);
?>


 <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', '');
        data.addRows([
		['', <?php echo $data4[0]; ?>],
		['', <?php echo $data4[1]; ?>],
		['', <?php echo $data4[2]; ?>],
		['', <?php echo $data4[3]; ?>],
		['', <?php echo $data4[4]; ?>],
		['', <?php echo $data4[5]; ?>],
		['', <?php echo $data4[6]; ?>],
		['', <?php echo $data4[7]; ?>],

		['', <?php echo $data3[0]; ?>],
		['', <?php echo $data3[1]; ?>],
		['', <?php echo $data3[2]; ?>],
		['', <?php echo $data3[3]; ?>],
		['', <?php echo $data3[4]; ?>],
		['', <?php echo $data3[5]; ?>],
		['', <?php echo $data3[6]; ?>],
		['', <?php echo $data3[7]; ?>],

     	['', <?php echo $data2[0]; ?>],
      	['', <?php echo $data2[1]; ?>],
      	['', <?php echo $data2[2]; ?>],
	  	['', <?php echo $data2[3]; ?>],
	  	['', <?php echo $data2[4]; ?>],
	  	['', <?php echo $data2[5]; ?>],
	  	['', <?php echo $data2[6]; ?>],
		['', <?php echo $data2[7]; ?>],

		['', <?php echo $data[0]; ?>],
		['', <?php echo $data[1]; ?>],
		['', <?php echo $data[2]; ?>],
		['', <?php echo $data[3]; ?>],
		['', <?php echo $data[4]; ?>],
		['', <?php echo $data[5]; ?>],
		['', <?php echo $data[6]; ?>],
		['', <?php echo $data[7]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Nguyen Quoc Huy - e1601121',
                       'width':1600,
                       'height':800,
			bar: {groupWidth: '50%'},
					vAxis: {
						viewWindow: {
						min: 0,
						max: 200
						},
					ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200] // display labels every 25
					}
				};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


</head>
<body style="text-align:center;">

 <div id="chart_div"></div>

<script>



	
setTimeout("location.reload()",1000); //Reload to update data
</script> 
</body>
</html>