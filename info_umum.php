<?php
include "connect.php";
session_start();
?>
<!doctype html>
<html class="fixed">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Basic -->
	

	<title>Sistem Adminitrasi Online</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
	<meta name="author" content="JSOFT.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="assets/vendor/modernizr/modernizr.js"></script>


	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
	<link href="css/icheck/flat/green.css" rel="stylesheet" />
	<link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

	<script src="js/jquery.min.js"></script>
	<script src="js/nprogress.js"></script>
	<script>
		NProgress.start();
	</script>

</head>
<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			
					<?php include "notif.php"?>
					
				
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">
				<?Php	
				$sql1 ="SELECT nama_pegawai FROM pegawai where pegawai.username='$_SESSION[username]'";
				$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
				$r1 = mysqli_fetch_array($results1);
				?>
				<div class="sidebar-header">
					<div class="sidebar-title">
						<h4 style="color:white">Sistem Kependudukan</span></h4><hr>
					</div>

					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div><br>
				<figure class="profile-picture">
					<center><img src="img/lg.png" width="100" alt="Joseph Doe"  data-lock-picture="assets/images/!logged-user.jpg" /></center>
				</figure>
				<center><h4 style="color:white">Halaman <span class="role"><?php echo $_SESSION['username'];?></h4></center>
					<br>
					
					<div class="nano">
						<div class="nano-content">
							<?php include 'navigasi.php'?>
						</div>
				
					</div>

						</aside>
						<!-- end: sidebar -->

						<section role="main" class="content-body">
							<header class="page-header">
								<h2 class="panel-title"><span class="badge badge-pill badge-success">Alamat</span> Kalurahan Gari, Wonosari, Gunung Kidul, 55851 </h2>

								<div class="right-wrapper pull-right">
									<ol class="breadcrumbs">
										<li>
											<a href="index.html">
												<i class="fa fa-home"></i>
											</a>
										</li>
										<li><span>Beranda </span></li>
									</ol>

									<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
								</div>
							</header>

							<!-- page content -->
							<div class="right_col" role="main">

					
								<!-- /top tiles -->

								<div class="row">


									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_panel tile fixed_height_500">
											<div class="x_title">
												<h2>LEMBAGA KEMASYARAKATAN</h2>
												
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												
												
												
													<div class="">
														<img src="img/l0.jpg" width="1070" height="150"  data-lock-picture="assets/images/!logged-user.jpg" />
														<img src="img/l9.jpg" width="1070" height="500"  data-lock-picture="assets/images/!logged-user.jpg" />
														<img src="img/l11.jpg" width="1070" height="500"  data-lock-picture="assets/images/!logged-user.jpg" />
														</div>
													
										</div>
									</div>
								</div>

								

							</div>
						</div>

						<!-- footer content -->

						
						<!-- /footer content -->
					</div>
					<!-- /page content -->


					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>

						<div class="sidebar-right-wrapper">

							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>

								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>

							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- gauge js -->
		<script type="text/javascript" src="js/gauge/gauge.min.js"></script>
		<script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
		<!-- chart js -->
		<script src="js/chartjs/chart.min.js"></script>
		<!-- bootstrap progress js -->
		<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
		<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
		<!-- icheck -->
		<script src="js/icheck/icheck.min.js"></script>
		<!-- daterangepicker -->
		<script type="text/javascript" src="js/moment.min.js"></script>
		<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

		<script src="js/custom.js"></script>

		<!-- flot js -->
		<!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
		<script type="text/javascript" src="js/flot/jquery.flot.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
		<script type="text/javascript" src="js/flot/date.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
		<script type="text/javascript" src="js/flot/curvedLines.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
		


    <!-- dashbord linegraph -->
    blue","green","purple","aero","red","primary","success"
    <script>
    	var c = document.getElementById("blue").value;
    	c = Number(c).toFixed(2)*100;
    	var g = document.getElementById("green").value;
    	g = Number(g).toFixed(2)*100;
    	var p = document.getElementById("purple").value;
    	p = Number(p).toFixed(2)*100;
    	var doughnutData = [
    	{
    		
    		value: c/100,
    		color: "blue"
    	},
    	{
    		value: g/100,
    		color: "green"
    	},
    	{
    		value: p/100,
    		color: "purple"
    	}
    	
    	];
    	var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    </script>
    <!-- /dashbord linegraph -->
    <!-- datepicker -->
    <script type="text/javascript">
    	$(document).ready(function () {

    		var cb = function (start, end, label) {
    			console.log(start.toISOString(), end.toISOString(), label);
    			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
            	startDate: moment().subtract(29, 'days'),
            	endDate: moment(),
            	minDate: '01/01/2012',
            	maxDate: '12/31/2015',
            	dateLimit: {
            		days: 60
            	},
            	showDropdowns: true,
            	showWeekNumbers: true,
            	timePicker: false,
            	timePickerIncrement: 1,
            	timePicker12Hour: true,
            	ranges: {
            		'Today': [moment(), moment()],
            		'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            		'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            		'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            		'This Month': [moment().startOf('month'), moment().endOf('month')],
            		'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            	},
            	opens: 'left',
            	buttonClasses: ['btn btn-default'],
            	applyClass: 'btn-small btn-primary',
            	cancelClass: 'btn-small',
            	format: 'MM/DD/YYYY',
            	separator: ' to ',
            	locale: {
            		applyLabel: 'Submit',
            		cancelLabel: 'Clear',
            		fromLabel: 'From',
            		toLabel: 'To',
            		customRangeLabel: 'Custom',
            		daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            		monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            		firstDay: 1
            	}
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
            	console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
            	console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            	console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
            	console.log("cancel event fired");
            });
            $('#options1').click(function () {
            	$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
            	$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
            	$('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <script>
    	NProgress.done();
    </script>
</body>
</html>