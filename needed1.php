<!DOCTYPE html>
<html>
<head>
	<title>Sample file</title>

	<script src="ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="code.highcharts.com/highmaps.js"></script>
    <script src="code.highcharts.com/mapdata/custom/europe.js"></script>

</head>
<body>

<div id="container" style="height: 500px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>

<script type="text/javascript">
$(function () {
    // Instanciate the map
    $('#container').highcharts('Map', {
        chart : {
            borderWidth : 1
        },

        title : {
            text : 'Figure 1 Necessary Stuff'
        },
        subtitle : {
            text : 'Demo of drawing all areas in the map, only highlighting partial data'
        },

        legend: {
            enabled: false
        },

        series : [{
            name: 'Country',
            mapData: Highcharts.maps['custom/europe'],
            data: [{
                code: 'UA',
                value: 1
            }],
            joinBy: ['iso-a2', 'code'],
            dataLabels: {
                enabled: true,
                color: 'white',
                formatter: function () {
                    if (this.point.value) {
                        return this.point.name;
                    }
                }
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '{point.name}'
            }
        }]
    });
});
        </script>
</body>
</html>