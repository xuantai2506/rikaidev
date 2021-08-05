<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

?>

<!-- /.row -->

<div class="row">

	<div class="col-lg-3 col-md-6">

		<div class="rec-banner darkblue" onclick="Forward('?<?php echo TTH_PATH?>=article_manager');">

			<div class="banner"> <img src="./images/home/slbv.svg" class="thongkeok">

				<div class="cangiua">
					<div class="col-xs-8 text-right">
						<p>Bài viết</p>
						<h3><?php echo getTotalArticle();?></h3>
					</div>
				</div>

			</div>

		</div>

	</div>

	<div class="col-lg-3 col-md-6">

		<div class="rec-banner blue" onclick="Forward('?<?php echo TTH_PATH?>=core_user');">

			<div class="banner"> <img src="./images/home/sltv.svg" class="thongkeok">
				<div class="cangiua">
					<div class="col-xs-8 text-right">
						<p>Số lượng thành viên</p>
						<h3><?php echo getTotalUser();?></h3>
					</div>
				</div>

			</div>

		</div>

	</div>

	<div class="col-lg-3 col-md-6">

		<div class="rec-banner black" onclick="Forward('?<?php echo TTH_PATH?>=core_role');">

			<div class="banner"> <img src="./images/home/nqtv.svg" class="thongkeok">
				<div class="cangiua">
					<div class="col-xs-8 text-right">
						<p>Nhóm quản trị viên</p>
						<h3><?php echo getTotalRole();?></h3>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="col-lg-3 col-md-6">

		<div class="rec-banner green">

			<div class="banner"> <img src="./images/home/sltc.svg" class="thongkeok">
				<div class="cangiua">
					<div class="col-xs-8 text-right">
						<p>Số lượt truy cập</p>
						<h3><?php echo getTotalHits()?></h3>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<!-- /.row -->

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default">

			<div class="panel-heading title_bieudo">

				<?php

				$t_month = strtotime(date('Y-m', time()));

				$monthStatic = "";

				$monthStatic = isset($_GET['month']) ? $_GET['month'] : date('Y-m', $t_month);

				?>

				<select onchange="return onChangeForward()" id="monthStatistic" class="selectpicker sm-select show-tick" data-container="body">

					<?php

					for($i=0; $i<=10; $i++) {

						?>

						<option value="<?php echo date('Y-m', strtotime('-'.$i.' month' , $t_month))?>" <?php echo ($monthStatic==date('Y-m', strtotime('-'.$i.' month' , $t_month))) ? "selected" : ""?> ><?php echo date('m/Y', strtotime('-'.$i.' month' , $t_month))?></option>

					<?php

					}

					?>

				</select>

			<!-- 	<div class="box-icon-right clearfix">

					<a href="#" class="btn btn-minimize btn-round" data-toggle="tooltip" data-placement="top" title="Mở rộng/Thu gọn"><i class="fa fa-chevron-up"></i></a>

					<a href="#" class="btn btn-close btn-round" data-toggle="tooltip" data-placement="top" title="Đóng"><i class="fa fa-remove"></i></a>

				</div> -->

			</div>

			<!-- /.panel-heading -->

			<div class="panel-body">

				<script type="text/javascript">

					var domain = location.hostname;

					$(function () {

						$.getJSON('<?php echo ADMIN_DIR?>/data_charts_visitor.php?month=<?php echo $monthStatic?>&callback=?', function (csv) {

							$('#container').highcharts({

								data: {

									csv: csv

								},

								title: {

									text: 'Thống kê truy cập website ' + domain

								},

								subtitle: {

									text: '(theo tháng)'

								},

								xAxis: {

									tickInterval: 5 * 24 * 3600 * 1000, // 5 day

									tickWidth: 0,

									gridLineWidth: 1,

									labels: {

										align: 'left',

										x: 3,

										y: -3

									}

								},

								yAxis: [{

									title: {

										text: null

									},

									labels: {

										align: 'left',

										x: 3,

										y: 16,

										format: '{value:.,0f}'

									},

									showFirstLabel: false

								}, { // right y axis

									linkedTo: 0,

									gridLineWidth: 0,

									opposite: true,

									title: {

										text: null

									},

									labels: {

										align: 'right',

										x: -3,

										y: 16,

										format: '{value:.,0f}'

									},

									showFirstLabel: false

								}],

								legend: {

									align: 'left',

									verticalAlign: 'top',

									y: 20,

									floating: true,

									borderWidth: 0

								},

								tooltip: {

									shared: true,

									crosshairs: true

								},

								plotOptions: {

									series: {

										cursor: 'pointer',

										point: {

											events: {

												click: function (e) {

													hs.htmlExpand(null, {

														pageOrigin: {

															x: e.pageX,

															y: e.pageY

														},

														headingText: this.series.name,

														maincontentText: Highcharts.dateFormat('%A, %e %B, %Y', this.x) + ':<br/> ' +

															this.y + ' (lượt)',

														width: 260

													});

												}

											}

										},

										marker: {

											lineWidth: 1

										}

									}

								},

								series: [{

									name: 'Tất cả truy cập',

									lineWidth: 4,

									marker: {

										radius: 4

									}

								}]

							});

						});

					});

				</script>

				<script type="text/javascript" src="./js/highcharts/highcharts.js"></script>

				<script src="./js/highcharts/modules/data.js"></script>

				<script src="./js/highcharts/modules/exporting.js"></script>



				<!-- Additional files for the Highslide popup effect -->

				<script type="text/javascript" src="./js/highcharts/highslide-full.min.js"></script>

				<script type="text/javascript" src="./js/highcharts/highslide.config.js" charset="utf-8"></script>

				<script type="text/javascript" src="./js/highcharts/themes/tth-v2.js" charset="utf-8"></script>

				<link rel="stylesheet" type="text/css" href="./js/highcharts/highslide.css" />



				<div id="container" style="height: 400px; margin: 0 auto;"></div>

			</div>

		</div>

	</div>

</div>

<!-- /.row -->

<?php

if(getConstant('google_calendar')!='') {

?>

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default">

			<div class="panel-heading">

				<i class="fa fa-calendar fa-fw"></i> Lịch Google

				<div class="box-icon-right clearfix">

					<a href="#" class="btn btn-minimize btn-round" data-toggle="tooltip" data-placement="top" title="Mở rộng/Thu gọn"><i class="fa fa-chevron-up"></i></a>

					<a href="#" class="btn btn-close btn-round" data-toggle="tooltip" data-placement="top" title="Đóng"><i class="fa fa-remove"></i></a>

				</div>

			</div>

			<!-- /.panel-heading -->

			<div class="panel-body">

				<iframe src="https://www.google.com/calendar/embed?src=<?php echo getConstant('google_calendar')?>&ctz=Asia/Saigon" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

			</div>

		</div>

	</div>

</div>

<?php } ?>



<script>

	function onChangeForward() {

		var url = '?month=' + document.getElementById("monthStatistic").value;

		return Forward(url);

	}

</script>