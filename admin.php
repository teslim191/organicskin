<?php
session_start();
ob_start();
include("db.php");


if (isset($_SESSION["email"])) {
	header("Location: dashboard.php");
}else{


	if (isset($_POST['login'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];


		if (empty($email) or empty($password)) {
			$result = "All fields are required fields";
		}else if (strlen($password) < 6) {
			$result = "password too short";
		}
		else{
			$query = "SELECT * FROM admin where email='$email' && password='$password'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) == 1) {
				while ($arr=mysqli_fetch_array($result)) {
					$email = $arr["email"];
					$password = $arr["password"];

					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;

					header("Location: dashboard.php");
                    
				}
			}
			else{
				echo "<script>alert('Invalid login details!!')</script>";
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Login
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">
        	<label>Email</label>
        	<input type="email" name="email" placeholder="Email" required class="form-control mb-3">
        	<label>Password</label>
        	<input type="password" name="password" placeholder="Password" required class="form-control">
        	<input type="submit" name="login" class="btn btn-primary mt-3">
        <a href="resetpassword.php" style="float: right;"  class="mt-3">
  forgot password?
</a>
        </form>
      </div>
    </div>
  </div>
</div>



        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
}
?>
    
</body>
</html>