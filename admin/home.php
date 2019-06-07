<?php session_start();
include('../__factory/fetch_all_posts.php');
$edit='';
if(!empty($_GET['id']))
{
	$records = new FetchRecords();

	$edit  = $records->editPost($_GET['id']);
}

 ?>
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
									<?php

										if(!empty($_SESSION['success'])) 
										{
											echo($_SESSION['success']);

										}elseif(!empty($_SESSION['error'])){

											echo($_SESSION['error']);
										}

									?>
								<div class="form quick-post">
									<!-- Create post form (not working)-->
									<?php if(empty($edit)){ ?>
										<form method="POST" id="post_form" action="../__factory/create.posts.php"  enctype="multipart/form-data">
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
												<select class="form-control" name="post_category">
													<option value="">--Select Post Category --</option>
													<option value="General News">General News</option>
													<option value="Match Highlight">Match Highlight</option>
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
									<?php }else{ ?>
										<form method="POST" id="post_form" action="../__factory/update.posts.php"  enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
										<div class="form-group">
											<label for="title"><strong>Title</strong></label>
											<input type="text" name="post_title" class="form-control" placeholder="Enter Title" id="post_title" value="<?php echo $edit['heading']; ?>">
										</div>

										<div class="form-group">
											<label for="picture"><strong>Picture</strong></label>
											<input type="file" name="post_image" class="form-control" id="post_image">
										</div>

										<div class="form-group">
											<label for="post_category"><strong>Post Category</strong></label>
											<select class="form-control" name="post_category">
												<option value="">--Select Post Category --</option>
												<option value="General News">General News</option>
												<option value="Match Highlight">Match Highlight</option>
											</select>
											<p style="color: blue">Previous Selection: <?php echo($edit['category']) ?></p>
										</div>

										<!-- Content -->
										<div class="form-group">
											<label for="content">Content</label>
											<textarea class="form-control" id="post_content" name="post_content" rows="6"><?php echo($edit['body']); ?>
											</textarea>
										</div>
										<!-- Cateogry -->

										<!-- Buttons -->
										<div class="form-group">
											<button type="submit" class="btn btn-info" style="float:right">Update</button>
										</div>
									</form>
									<?php } ?>
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
								<div class="table-responsive">
									<table id="example1" class="table table-striped table-bordered responsive nowrap">
										<thead>
											<tr>
												<th>S/N</th>
												<th>Category</th>
												<th>TItle</th>
												<th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$i =1;

												foreach ($data as $list) {
													# code...
													echo '<tr>';
													echo '<td>'.$i.'</td>';
													echo '<td>'.$list['category'].'</td>';
													echo '<td>'.$list['heading'].'</td>';
													echo '<td>'.date('d-m-y', $list['post_date']).'</td>';
													echo '<td>
															<a href="home.php?id='.$list['id'].'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit
															</a>
															<a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete
															</a>
														 </td>
													</tr>';
													$i++;
												}
											?>
										</tbody>
									</table>
								</div>
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

	$('#example1').DataTable({
		destroy: true,
		responsive: true,
		columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 1, targets: 1 },
			{ responsivePriority: 1, targets: -1 }
		]
	});

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

	function sessionRemove(){

		$.ajax({
			type:"GET",
			url:"../functions/session_remover.php",
			cache:false,
			success:result=>{
				return;
			}
		})
	}
</script>
</body>
</html>
