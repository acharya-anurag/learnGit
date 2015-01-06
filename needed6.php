<!DOCTYPE html>
<html>
<head>
	<title>Sample file</title>

    <script src="ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="code.highcharts.com/highmaps.js"></script>
    <script src="code.highcharts.com/mapdata/custom/us-all.js"></script>
    <script src="code.highcharts.com/modules/data.js"></script>

</head>
<body>

<div id="container" style="height: 600px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>

<script>

$(function () {

    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=us-population-density.json&callback=?', function (data) {

        // Make codes uppercase to match the map data
        $.each(data, function () {
            this.code = this.code.toUpperCase();
        });

        // Instanciate the map
        $('#container').highcharts('Map', {

            chart : {
                borderWidth : 1
            },

            title : {
                text : 'Needed for figure 6'
            },

            subtitle : {
                text: 'Add lines as before and use custom maps, that is it!'
            },

            legend: {
                layout: 'horizontal',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: true,
                verticalAlign: 'bottom',
                y: 15
            },

            mapNavigation: {
                enabled: true
            },

            colorAxis: {
                min: 1,
                type: 'logarithmic',
                minColor: '#EEEEFF',
                maxColor: '#000022',
                stops: [
                    [0, '#EFEFFF'],
                    [0.67, '#4444FF'],
                    [1, '#000022']
                ]
            },

            series : [{
                animation: {
                    duration: 1000
                },
                data : data,
                mapData: Highcharts.maps['countries/us/us-all'],
                joinBy: ['postal-code', 'code'],
                dataLabels: {
                    enabled: true,
                    color: 'white',
                    format: '{point.code}'
                },
                name: 'Population density',
                tooltip: {
                    pointFormat: '{point.code}: {point.value}/km²'
                }
            }]
        });
    });
});

</script>
</body>
</html>