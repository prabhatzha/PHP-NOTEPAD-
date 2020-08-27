<?php
//here i will connect it to database
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "mynotebook";

//now i make a connection object

$conn = mysqli_connect($servername, $username, $password, $database);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = $_POST['title'];
  $description = $_POST['description'];
 
  $sql= "INSERT INTO `notes` ( `title`, `description`) VALUES ('$title', '$description')";
   $result = mysqli_query($conn, $sql);
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


    <title>MY NOTEPAD </title>
  
  </head>
 
  <body>
  
  <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="note.png" width="30" height="30" class="d-inline-block align-top">
    My NotePad
  </a>
</nav>
<div class="container my-4" >
<h3> WRITE YOUR NOTES : </h3>
<form action="/notepad/notepad.php" method="post">
  <div class="form-group">
    <label for="title">NOTE TITLE</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter your notes title here">
  </div>
  <div class="form-group">
    <label for="description"> NOTE DISCRIPTION</label>
    <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Enter your text here"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">ADD NOTES</button>
</form>
</div>

<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col"> Title</th>
      <th scope="col"> Description</th>
     
    </tr>
  </thead>
  <?php
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);
$sno = 0;
while($row =mysqli_fetch_assoc($result))
{
  $sno = $sno + 1;
  echo " <tr>
 <th scope='row'>".$sno."</th>
 <td>".$row['title']."</td>
 <td>".$row['description']."</td>
</tr>";
 
}

?>
  <tbody>
   
  </tbody>
</table>
</div>
<hr>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
  </body>
</html>