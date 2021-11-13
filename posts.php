<?php
session_start();
include "db.php";

if (!isset($_SESSION["email"])) {
    header("Refresh:0; url=admin.php");
		  echo"<script>alert('you are not authorised to view this page')</script>";    
} else {
	// code...
?>
<!DOCTYPE html>
<html>
<head>
<title>Post</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abi skincare</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- bootstrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    
    <style>
        #body{}
    </style>

</head>
<body>

	<!-- main -->
  <?php


if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $imagename = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $path = "img/".$imagename;
    

    if (empty($title) or empty($body)) {
        $alert= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>All fields are required</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    else {
        $query = "INSERT INTO posts(title, body, imagename) VALUES('$title','$body','$imagename')";
        $result = mysqli_query($con, $query);
        $upload = move_uploaded_file($tmp_name, $path);
        if ($result && $upload) {
            $alert ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Post added successfully</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
        else {
            $alert= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Unable to add post</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";            
        }
    }
}

?>
   <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Abi skincare</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
            <?php include("adminHeader.php"); ?>
    
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Post</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->

            <div class="container-fluid">
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="managepost.php" class="btn btn-info">Manage Posts</a>
                        </div>                         
                    </div>
                </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Add Post</h3>
                        
                            <form action="posts.php" method="POST" enctype="multipart/form-data">
                            <?php echo @$alert; ?>    
                            <label>Title:</label><br>
                                <input class="text" type="text" name="title" placeholder="Title" class="form-control" style="margin-bottom: 5px !important;"><br>
                                <label>Body:</label>
                                <div class="mb-3">
                                <textarea name="body" id="body" class="form-control"></textarea>
                                </div>
                                <label>Image:</label>
                                <input class="text" type="file" name="fileToUpload" class="btn btn-info">
                                <div style="margin-top: 20px !important;">
                                <input type="submit" value="Add Post" name="submit" class="btn btn-info">
                                </div>
				            </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <footer class="footer text-center"> <?php echo date("Y") ?> &copy; Abi Skincare <a
                    href="#">skyNet</a>
            </footer>
        </div>
	<!-- //main -->
  <!-- JQuery -->
  <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
<?php
}
?>
</body>
</html>
    

    
