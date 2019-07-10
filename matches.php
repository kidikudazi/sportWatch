<?php 
  // get all teams on the platform 
  function fetchAllCompetitions()
  {
    $conn = mysqli_connect("localhost", "root", "", "sport_watch");
    $fetchCompetition = "SELECT * FROM competitions";

    $result = mysqli_query($conn, $fetchCompetition);

    $totalRecords = mysqli_num_rows($result);

   if($totalRecords > 0){
      $data = [];
      while ($row = mysqli_fetch_assoc($result)) {
        # code...
        $data[] = $row;
      }
      return $data;
    }else{
      $data = [];
      return $data;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sport Watch</title>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include('includes/style.php'); ?>
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-logo">
          <a href="#"><img src="public/images/logo.png" alt="Image"></a>
        </div>
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

  <?php include('includes/header.php'); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(public/images/cool.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Competitions</h1>
            <p class="mt-4">Registered Local Football Competitions within Ilorin that are on the platform</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-5">
            <h2 class="text-black">Competitions</h2>
          </div>
        </div>
        <div class="row">
          <?php 

            $data = fetchAllCompetitions();

            foreach($data as $list)
            {
              echo('<div class="mb-4 mb-lg-0 col-6 col-md-4 col-lg-2 text-center">');
              echo('<div class="player mb-5">');
              echo('<img src="'.str_replace('../', '', $list['competition_logo']).'" alt="Image" class="img-fluid image rounded-circle">');
              echo(' <h2>'.$list['competition_name'].'</h2>');
              echo('<span class="position"><i style="color:black;">Location:</i> '.$list['location'].'</span><br>');
              echo('<span class="position"><i style="color:black;">Start Date:</i> '.$list['start_date'].'</span><br>');
              echo('<span class="position"><i style="color:black;">End Date:</i> '.$list['end_date'].'</span>');
              echo('</div>');
              echo('</div>');
            }
          ?>

        </div>
      </div>
    </div>
  <?php include("includes/footer.php"); ?>
  </div>
  <?php include("includes/script.php"); ?>
  </body>
</html>