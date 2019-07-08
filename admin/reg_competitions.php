<?php 
session_start();
include('../functions/auth.php');
include('../__factory/fetch_all_competitions.php');
$edit='';
if(!empty($_GET['id']))
{
	$records = new FetchRecords();

	$edit  = $records->editCompetition($_GET['id']);
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

    <title>Administrator |  Register Competitions</title>

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
						<li><i class="fa fa-laptop"></i>Register Competitions</li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-5 col-md-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="pull-left">Regsitration Form</div>
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
										<form method="POST" id="reg_form" action="../__factory/create.competitions.php"  enctype="multipart/form-data">
											<div class="form-group">
												<label for="title"><strong>Competition Name</strong></label>
												<input type="text" name="competition_name" class="form-control" placeholder="Enter Competition Name" id="competition_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition Location</strong></label>
												<input type="text" name="competition_location" class="form-control" placeholder="Enter Competition Location" id="competition_location">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition Start Date</strong></label>
												<input type="text" name="start_date" class="form-control" placeholder="Enter Competition Start Date" id="start_date">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition End Date</strong></label>
												<input type="text" name="end_date" class="form-control" placeholder="Enter Competition End Date" id="end_date">
											</div>

											<div class="form-group">
												<label for="picture"><strong>Competition Logo</strong></label>
												<input type="file" name="logo" class="form-control" id="logo">
											</div>

											<!-- Buttons -->
											<div class="form-group">
												<button type="submit" class="btn btn-default" style="float:right">Save</button>
											</div>
										</form>
									<?php }else{ ?>
										<form method="POST" id="reg_form" action="../__factory/update.competition.php"  enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
										
											<div class="form-group">
												<label for="title"><strong>Competition Name</strong></label>
												<input type="text" name="competition_name" value="<?php echo $edit['competition_name']; ?>" class="form-control" placeholder="Enter Competition Name" id="competition_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition Location</strong></label>
												<input type="text" name="competition_location" value="<?php echo $edit['location']; ?>" class="form-control" placeholder="Enter Competition Location" id="competition_location">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition Start Date</strong></label>
												<input type="text" name="start_date" value="<?php echo $edit['start_date']; ?>" class="form-control" placeholder="Enter Competition Start Date" id="start_date">
											</div>
											<div class="form-group">
												<label for="title"><strong>Competition End Date</strong></label>
												<input type="text" name="end_date" class="form-control" value="<?php echo $edit['end_date']; ?>"  placeholder="Enter Competition End Date" id="end_date">
											</div>

											<div class="form-group">
												<label for="picture"><strong>Competition Logo</strong></label>
												<input type="file" name="logo" class="form-control" id="logo">
											</div>

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
						<div id="info"></div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><i class="fa fa-flag-o red"></i><strong>Competitions</strong></h2>
								<div class="panel-actions">
									<a href="" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
									<a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
									<a href="" class="btn-close"><i class="fa fa-times"></i></a>
								</div>
							</div>

							<div class="panel-body">
								<div class="table-responsive">
									<table id="example1" class="table table-striped table-bordered responsive nowrap">
										<thead>
											<tr>
												<th>S/N</th>
												<th>Competition Name</th>
												<th>Competition location</th>
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
													echo '<td>'.$list['competition_name'].'</td>';
													echo '<td>'.$list['location'].'</td>';
													echo '<td>'.$list['start_date'].' - '.$list['end_date'].'</td>';
													echo '<td>
															<a href="reg_competitions.php?id='.$list['id'].'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" onclick="return deletePost('.$list['id'].');" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete
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

	$('#reg_form').validate({
		rules:{
			logo: {required:true, extension: true, maxsize: 1048576},
			competition_name: {required:true, minlength: 3},
			competition_location: {required: true},
			start_date: {required: true},
			end_date: {required: true}
		},
		messages:{
			logo:{
				required: 'The Post Image field is required.',
				extension: 'Invalid Extension format selected for the Images.',
				maxsize: 'Image cannot be greater than 1MB.'
			},
			competition_name:{required: 'The Competition Name field is required.'},
			competition_location: {required: 'The Competition Location field is required.'},
			start_date: {required: 'The Competition Start Date field is required.'},
			end_date: {required: 'The Competition End Date field is required.'}

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

	// delete post
	function deletePost(id)
	{
		var id = id;

		if(id.length > 0 || id != ''){

			$.ajax({
				type:"POST",
				url:"../__factory/delete.competition.php",
				data:{id:id},
				cache:false,
				success:res=>{
					$("#info").html(res);
					setTimeout(function(){
						window.location.reload();
					}, 2000);
				}
			});

			return false;
		}

		return;
	}
</script>
</body>
</html>
