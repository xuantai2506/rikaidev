<script>
	$(function() {
		Morris.Area({
			// ID of the element in which to draw the chart.
			element: 'morris-area-chart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			data: [
				{ month: '2014-01', value: 20 },
				{ month: '2014-02', value: 10 },
				{ month: '2014-03', value: 2 },
				{ month: '2014-04', value: 200 }
			],
			// The name of the data record attribute that contains x-values.
			xkey: 'month',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['value'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['Value']
		});
	});
</script>