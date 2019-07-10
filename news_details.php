<?php 
  $id = $_GET['id'];
  if(empty($id))
  {
    header("location:index.php");
  }
  // get all news
  function newsDetails($id)
  {
    $conn = mysqli_connect("localhost", "root", "", "sport_watch");
    $fetchNews = "SELECT * FROM posts WHERE id = '".$id."' ";

    $result = mysqli_query($conn, $fetchNews);

    $totalRecords = mysqli_num_rows($result);

   if($totalRecords > 0){
      
      $row = mysqli_fetch_assoc($result);
        # code...
        return $row;
    }else{
      header("location:index.php");
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
            <h1 class="bg-text-line">News</h1>
            <p class="mt-4">All Local News in the world of Football as they happen within Ilorin.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">

          <?php 
            $list = newsDetails($id);
              echo('<div class="col-md-6 col-lg-12 mb-4">');
              echo('<div class="post-entry">');
                echo('<div class="image">');
                  echo('<img src="'.str_replace('../', '', $list['post_image']).'" alt="Image" class="img-fluid img-responsive" style="width:100%;object-fit: cover;overflow: hidden;margin:auto;">');
                echo('</div>');
                echo('<div class="text p-4">');
                  echo('<h2 class="h5 text-black"><a href="#">'.$list['heading'].'</a></h2>');
                  echo('<span class="text-uppercase date d-block mb-3"><small>By Sportz Watch; '.date("M d, Y", $list['post_date']).'</small></span>');
                  echo('<p class="mb-0">'.$list['body'].'</p>');
                echo(
                  '</div>
                    </div>
                  </div>');
          ?>

        </div>
      </div>
    </div>

	<?php include("includes/footer.php"); ?>
  </div>
	<?php include("includes/script.php"); ?>
  </body>
</html>