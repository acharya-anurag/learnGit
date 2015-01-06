<!DOCTYPE html>
<html>
<head>
    <title>Sample file</title>

    <script src="ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="code.highcharts.com/highmaps.js"></script>
    <script src="code.highcharts.com/mapdata/custom/europe.js"></script>
    <script src="code.highcharts.com/modules/data.js"></script>

</head>
<body>

<div id="container" style="height: 500px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>

<script type="text/javascript">
$(function () {


    // Instanciate the map
    $('#container').highcharts('Map', {
        chart: {
            spacingBottom: 20
        },
        title : {
            text : 'Figure 3 Necessary style - various partitions'
        },

        subtitle : {
            text : 'Custom map needs to be created for the divisions: png image'
        },

        legend: {
            enabled: true
        },

        plotOptions: {
            map: {
                allAreas: false,
                joinBy: ['iso-a2', 'code'],
                dataLabels: {
                    enabled: true,
                    color: 'white',
                    formatter: function () {
                        if (this.point.properties && this.point.properties.labelrank.toString() < 5) {
                            return this.point.properties['iso-a2'];
                        }
                    },
                    format: null,
                    style: {
                        fontWeight: 'bold'
                    }
                },
                mapData: Highcharts.maps['custom/europe'],
                tooltip: {
                    headerFormat: '',
                    pointFormat: '{point.name}: <b>{series.name}</b>'
                }

            }
        },

        series : [{
            name: 'UTC',
            data: $.map(['IE', 'IS', 'GB', 'PT'], function (code) {
                return { code: code };
            })
        }, {
            name: 'UTC + 1',
            data: $.map(['NO', 'SE', 'DK', 'DE', 'NL', 'BE', 'LU', 'ES', 'FR', 'PL', 'CZ', 'AT', 'CH', 'LI', 'SK', 'HU',
                    'SI', 'IT', 'SM', 'HR', 'BA', 'YF', 'ME', 'AL', 'MK'], function (code) {
                return { code: code };
            })
        }, {
            name: 'UTC + 2',
            data: $.map(['FI', 'EE', 'LV', 'LT', 'BY', 'UA', 'MD', 'RO', 'BG', 'GR', 'TR', 'CY'], function (code) {
                return { code: code };
            })
        }, {
            name: 'UTC + 3',
            data: $.map(['RU'], function (code) {
                return { code: code };
            })
        }]
    });
});
        </script>
</body>
</html>