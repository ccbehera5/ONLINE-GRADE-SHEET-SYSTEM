<!DOCTYPE html>
<html>
<head>
<?php session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
.botton2 {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.botton2:hover {
  opacity: 0.8;
}


/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 25%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }

}




.logo
{
  display: block;
  margin-left: auto;
  margin-right: auto;
  height: 150px;
  width: 300px;
}


button
{
 background-color: #4CAF50;
  color: white;
  padding: 1px 20px;
  margin: 2px ;
  cursor: pointer;
  width: 400px;
  height: 60px;
  text-align: center;
  margin-left: 36%;
}






</style>
</head>

<body>
    
      <img src="fakir.png" alt="logo" class="logo">
        <h1 style="color:blue; text-align: center;">FAKIR MOHAN UNIVERSITY</h1>
        <h3 style="color:blue; text-align: center; ">ONLINE GRADESHEET GENERATION</h3>
    

  <div class="botton">
    
    <button onclick="document.getElementById('id01').style.display='block'"><b> LOGIN </b>
    </button> 
    
  </div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="fakir.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
       <label for="uname"><b>USER ID</b></label>
      <input type="text" placeholder="Enter Username" name="uid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" required>
        
      <input type="submit" name="login" value="LOGIN" class="botton2">
<?php
   include('connection.php');
  
   
   if(isset($_POST['login'])) {
      // username and password sent from form 
      
      $uid = mysqli_real_escape_string($conn,$_POST['uid']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pwd']); 
      
      $sql = "SELECT * FROM admin WHERE uid = '$uid' and pwd = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $r=mysqli_fetch_assoc($result);
      $uname=$r['uname'];
      $count = mysqli_num_rows($result);
      
     if($count == 1) {
         
         $_SESSION['uid'] = $uid;
         $_SESSION["uname"]=$r['uname'];
         header("location: index.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
     
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
