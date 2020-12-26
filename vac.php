<!DOCTYPE html>
<html>
<head>
  <title>Cat Lover Society</title>

<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
  input[type=text], input[type=password],input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=number]:focus{
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style></head>
<body>
  
<?php
    session_start();
  ?>

  <?php
      include 'memberHeader.php';

    ?>
  

  <?php
    if(isset($_POST["submit"])){
        
      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'csejobs';

      $conn = mysqli_connect($host, $user, $pass, $dbname);

      if(!$conn){
        echo mysqli_connct_error();
      }

  
      $name = $_POST["nname"];
      $mind = $_POST["onMind"];
      $emailMember=$_SESSION["emailIsLoggedIn"];
      
       $sql = "INSERT INTO `posts`(`Name`, `Post`, `EmailMember`) VALUES ('$name','$mind','$emailMember')";
          if(mysqli_query($conn, $sql)){
            echo "<script>
                  alert('Successful');
                </script>";
          

          }
          else{
             echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }
        
      }
  ?> 
  		<div style="display: block; background-color:#E7EDEE; margin-top: 50px">
		<fieldset style="width: 150px; margin: auto; padding: 20px; border-radius: 6px;border-color: #F69483; border-width: .5px;  background-color:#FFFFFF">
			<img src="user.png" style="text-align: center; height: 50px; width: 50px;margin-bottom: 30px"><br>
			
  <form action="" method="post" style="border:1px solid #ccc; margin-top:30px"> 
  <div class="container">
  
    <h1> <div align="center">
    	Welcome  <?php 
$emailMember=$_SESSION["emailIsLoggedIn"];
echo $emailMember 
?> </div> </h1>
    <hr>
    <label for="nname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="nname" required>


  <label for="onMind"><b>What is on your mind?</b></label><br>
    <textarea type="text" rows="10" cols="100" name="onMind"></textarea><br>

<div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn">Submit</button>
    </div>
  </div>
</form>

</fieldset>
</div>

<?php
  include 'footer.php';
?>
</body>
</html>