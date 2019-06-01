<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Sport Watch">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Sport watch">
    <link rel="shortcut icon" href="../public/dist/img/favicon.png">

    <title>Administrator |  Home</title>

    <?php include('../includes/admin/style.php'); ?>
</head>

<body>
	<!-- container section start -->
	<section id="container" class="">


		<?php include("../includes/admin/header.php"); ?>
		<!--header end-->

		<!--sidebar start-->
		<?php include('../includes/admin/aside.php') ?>
		<!--sidebar end-->

		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<!--overview start-->
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
						<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/admin/home.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box blue-bg">
							<i class="fa fa-cloud-download"></i>
							<div class="count">6.674</div>
							<div class="title">Download</div>
						</div>
						<!--/.info-box-->
					</div>
					<!--/.col-->

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box brown-bg">
							<i class="fa fa-shopping-cart"></i>
							<div class="count">7.538</div>
							<div class="title">Purchased</div>
						</div>
						<!--/.info-box-->
					</div>
					<!--/.col-->

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box dark-bg">
							<i class="fa fa-thumbs-o-up"></i>
							<div class="count">4.362</div>
							<div class="title">Order</div>
						</div>
						<!--/.info-box-->
					</div>
					<!--/.col-->

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box green-bg">
							<i class="fa fa-cubes"></i>
							<div class="count">1.426</div>
							<div class="title">Stock</div>
						</div>
						<!--/.info-box-->
					</div>
					<!--/.col-->
				</div>
				<!--/.row-->

				<div class="row">
					<div class="col-lg-5 col-md-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="pull-left">Quick Post</div>
								<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="fa fa-times"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<div class="padd">

								<div class="form quick-post">
									<!-- Edit profile form (not working)-->
									<form method="POST" id="post_form" novalidate>
										<div class="form-group">
											<label for="title"><strong>Title</strong></label>
											<input type="text" name="post_title" class="form-control" placeholder="Enter Title" id="post_title">
										</div>

										<div class="form-group">
											<label for="picture"><strong>Picture</strong></label>
											<input type="file" name="post_image" class="form-control" id="post_image">
										</div>

										<div class="form-group">
											<label for="post_category"><strong>Post Category</strong></label>
											<select class="form-control">
												<option value="">--Select Post Cateogry --</option>
												<option value="General News">General News</option>
												<option value="Match Highight">Match Highight</option>
											</select>
										</div>

										<!-- Content -->
										<div class="form-group">
											<label for="content">Content</label>
											<textarea class="form-control" id="post_content" name="post_content" rows="6"></textarea>
										</div>
										<!-- Cateogry -->

										<!-- Buttons -->
										<div class="form-group">
											<button type="submit" class="btn btn-default" style="float:right">Save</button>
										</div>
									</form>
								</div>


								</div>
								<div class="widget-foot">
								<!-- Footer goes here -->
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-7 col-md-7">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
								<div class="panel-actions">
									<a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
									<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
									<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
								</div>
							</div>

							<div class="panel-body">
								<table id="example1" class="table table-bordered">
									<thead>
										<tr>
											<th></th>
											<th>Country</th>
											<th>Users</th>
											<th>Online</th>
											<th>Performance</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><img src="../public/dist/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
											<td>Germany</td>
											<td>2563</td>
											<td>1025</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%">
												</div>
												</div>
												<span class="sr-only">73%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/India.png" style="height:18px; margin-top:-2px;"></td>
											<td>India</td>
											<td>3652</td>
											<td>2563</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%">
												</div>
												</div>
												<span class="sr-only">57%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/Spain.png" style="height:18px; margin-top:-2px;"></td>
											<td>Spain</td>
											<td>562</td>
											<td>452</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
												</div>
												</div>
												<span class="sr-only">93%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/India.png" style="height:18px; margin-top:-2px;"></td>
											<td>Russia</td>
											<td>1258</td>
											<td>958</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
												</div>
												<span class="sr-only">20%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/Spain.png" style="height:18px; margin-top:-2px;"></td>
											<td>USA</td>
											<td>4856</td>
											<td>3621</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
												</div>
												<span class="sr-only">20%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
											<td>Brazil</td>
											<td>265</td>
											<td>102</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
												</div>
												<span class="sr-only">20%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
											<td>Coloumbia</td>
											<td>265</td>
											<td>102</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
												</div>
												<span class="sr-only">20%</span>
											</td>
										</tr>
										<tr>
											<td><img src="../public/dist/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
											<td>France</td>
											<td>265</td>
											<td>102</td>
											<td>
												<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
												</div>
												<span class="sr-only">20%</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="text-right">
				<div class="credits">
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
				</div>
			</div>
		</section>
		<!--main content end-->
	</section>
	<!-- container section start -->

	<!-- javascripts -->
	<?php include('../includes/admin/script.php'); ?>
<script>
	//knob
	$(function() {
		$(".knob").knob({
			'draw': function() {
			$(this.i).val(this.cv + '%')
			}
		})
	});

	//carousel
	$(document).ready(function() {
		$("#owl-slider").owlCarousel({
			navigation: true,
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: true
		});
	});

	//custom select box

	$(function() {
		$('select.styled').customSelect();
	});

	/* ---------- Map ---------- */
	$(function() {
		$('#map').vectorMap({
			map: 'world_mill_en',
			series: {
			regions: [{
				values: gdpData,
				scale: ['#000', '#000'],
				normalizeFunction: 'polynomial'
			}]
			},
			backgroundColor: '#eef3f7',
			onLabelShow: function(e, el, code) {
			el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
			}
		});
	});

	$('#example1').DataTable();

	$('#post_form').validate({
		rules:{
			post_image: {required:true, extension: true, maxsize: 1048576},
			post_title: {required:true, minlength: 3},
			post_category: {required: true},
			post_content: {required: true}
		},
		messages:{
			post_image:{
				required: 'The Post Image field is required.',
				extension: 'Invalid Extension format selected for the Images.',
				maxsize: 'Image cannot be greater than 1MB.'
			},
			post_title:{required: 'The Post Title field is required.'},
			post_category: {required: 'The Post Category field is required.'},
			post_content: {required: 'The Post Content field is required.'}
		},
		errorClass: 'help-block',
		errorElement: 'strong',
		onblur:true,
		onfocus:true,
		highlight:function(element){
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight:function(element){
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorPlacement:function(error, element){
			if(element.parent('.input-group').length)
			{
				error.insertAfter(element.parent());
				return false;
			}
			else
			{
				error.insertAfter(element);
				return false;
			}
		}
	});
</script>
</body>
</html>
