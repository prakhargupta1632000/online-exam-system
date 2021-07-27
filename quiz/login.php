
<?php
   session_start();
   $error=''; 
    if (count($_POST)>0) {
        $username=$_POST['uname'];
        $password=$_POST['pwd'];
        $conn = mysqli_connect("localhost", "tn_18", "eZN3vL9-)GnD", "tooryanaad");
        if(!$conn){
			die("Connection failed - Try again");
		}
		
        $query = mysqli_query($conn, "SELECT * FROM `avhan21` WHERE `email`='$username';");
        if(!$query)
        echo "Error description this point: " .mysqli_error($conn);
      
        $rows = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);
        if ($rows == 0) {
            $error = "कृपया पहले पंजीकरण करें<a href='https://tooryanaad.in/'>Click Here</a><br>या आपके द्वारा दिया गया ईमेल गलत है";
        }
        elseif ($rows == 1) {
            if($password!=$row['mobileno']) {
                $error = "आपके द्वारा दिया गया पॉसवर्ड गलत है";
            }
            else{
            $_SESSION['login_user']=$username;
            $_SESSION['expire']=time()+2400;
            header("location: new.php");
            }
        }
    mysqli_close($conn);
    }
    
    if(isset($_SESSION['login_user'])){
        header("location: new.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>तूर्यनाद</title>
	<?php include "meta.php";?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/e0cbc93328.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
        <div class="img">
			<img src="tooryanaad_logo_black.png">
		</div>
		<div class="login-content">
			<form method='post' action="" autocomplete="off">
				<img src="avatar.svg">
				<h2 class="title">लॉग इन</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-play"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>ईमेल (Registered Email)</h5>
           		   		<input type="text" class="input" name="uname" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-play"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>पॉसवर्ड (Mobile Number)</h5>
           		    	<input type="password" class="input" name="pwd" require>
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="आगे बढ़ें">
                <?php
                    if($error==''){
                    }
                    else{
                        echo "<span class='error'>" . $error . "</span>";
                    }
                ?>
            </form>
        </div>
        
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>