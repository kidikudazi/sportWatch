<?php 
session_start();
include('../functions/auth.php');
include('../__factory/fetch_all_teams.php');
$edit='';
if(!empty($_GET['id']))
{
	$records = new FetchRecords();

	$edit  = $records->editTeam($_GET['id']);
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

    <title>Administrator |  Register Teams</title>

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
						<li><i class="fa fa-laptop"></i>Register Team</li>
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
										<form method="POST" id="reg_form" action="../__factory/create.teams.php"  enctype="multipart/form-data">
											<div class="form-group">
												<label for="title"><strong>Team Name</strong></label>
												<input type="text" name="team_name" class="form-control" placeholder="Enter Team Name" id="team_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Coach Name</strong></label>
												<input type="text" name="coach_name" class="form-control" placeholder="Enter Competition Location" id="coach_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Address</strong></label>
												<input type="text" name="address" class="form-control" placeholder="Enter Competition Start Date" id="address">
											</div>
											<div class="form-group">
												<label for="title"><strong>Email Address</strong></label>
												<input type="email" name="email" class="form-control" placeholder="Enter Competition Email Address" id="email">
											</div>
											<div class="form-group">
												<label for="title"><strong>Phone Number</strong></label>
												<input type="number" name="phone_number" min="0" class="form-control" placeholder="Enter Team Phone Number" id="phone_number">
											</div>

											<div class="form-group">
												<label for="picture"><strong>Team Logo</strong></label>
												<input type="file" name="logo" class="form-control" id="logo">
											</div>

											<!-- Buttons -->
											<div class="form-group">
												<button type="submit" class="btn btn-default" style="float:right">Save</button>
											</div>
										</form>
									<?php }else{ ?>
										<form method="POST" id="reg_form" action="../__factory/update.team.php"  enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
										
											<div class="form-group">
												<label for="title"><strong>Team Name</strong></label>
												<input type="text" name="team_name" value="<?php echo( $edit['team_name'] ); ?>" class="form-control" placeholder="Enter Team Name" id="team_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Coach Name</strong></label>
												<input type="text" name="coach_name" value="<?php echo( $edit['coach_name'] ); ?>"  class="form-control" placeholder="Enter Competition Location" id="coach_name">
											</div>
											<div class="form-group">
												<label for="title"><strong>Address</strong></label>
												<input type="text" name="address" value="<?php echo( $edit['address'] ); ?>"  class="form-control" placeholder="Enter Competition Start Date" id="address">
											</div>
											<div class="form-group">
												<label for="title"><strong>Email Address</strong></label>
												<input type="email" name="email" value="<?php echo( $edit['email'] ); ?>"  class="form-control" placeholder="Enter Competition Email Address" id="email">
											</div>
											<div class="form-group">
												<label for="title"><strong>Phone Number</strong></label>
												<input type="number" name="phone_number" value="<?php echo( $edit['phone'] ); ?>"  min="0" class="form-control" placeholder="Enter Team Phone Number" id="phone_number">
											</div>

											<div class="form-group">
												<label for="picture"><strong>Team Logo</strong></label>
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
								<h2><i class="fa fa-flag-o red"></i><strong>Teams</strong></h2>
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
												<th>Team Name</th>
												<th>Coach Name</th>
												<th>Address</th>
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
													echo '<td>'.$list['team_name'].'</td>';
													echo '<td>'.$list['coach_name'].'</td>';
													echo '<td>'.$list['address'].'</td>';
													echo '<td>
															<a href="reg_teams.php?id='.$list['id'].'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" onclick="return deleteTeam('.$list['id'].');" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete
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
			team_name: {required:true, minlength: 3},
			coach_name: {required: true},
			address: {required: true},
			phone_number: {required: true},
			email: {required: true}
		},
		messages:{
			logo:{
				required: 'The Team Logo field is required.',
				extension: 'Invalid Extension format selected for the Images.',
				maxsize: 'Image cannot be greater than 1MB.'
			},
			team_name:{required: 'The Team Name field is required.'},
			coach_name: {required: 'The Coach Name field is required.'},
			address: {required: 'The Address field is required.'},
			phone_number: {required: 'The Phone Number field is required.'},
			email: {required: 'The Email field is required.'},
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
	function deleteTeam(id)
	{
		var id = id;

		if(id.length > 0 || id != ''){

			$.ajax({
				type:"POST",
				url:"../__factory/delete.team.php",
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
