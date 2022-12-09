<?php 
   require "conn.php";
   ?>
<?php 
session_start();
//echo $_GET['id'];
require "conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<?php 
   session_start();
   require "conn.php";
   if(!isset($_SESSION['uname']) && !isset($_SESSION['pass'])){
       header('location:index.php');
   	  die();
   }
?>
<?php

   if(isset($_POST['submit']))
    {
        $notifications = $_POST["notifications"];
        $quer = "insert into notification(`notifications`)values('$notifications')";

        //$quer = "insert into notifications(notifications) values('$message')";
        $conn->query($quer);
        // if($result)
        // {
        //     echo"done ra dailee";
        // } 
        // else{
        //     echo "insert a value";
        // }
}	
?>
<!-- <?php
   $sql1 = "SELECT count(uname) As 'staff' FROM signup";
   $result1 = mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_array($result1);
   $num1 = $row1['staff'];
   ?>
<?php
   $sqll = "SELECT count(status) As 'sta' FROM work WHERE status='completed'";
   $resultt = mysqli_query($conn, $sqll);
   $roww = mysqli_fetch_array($resultt);
   $numm = $roww['sta'];
   ?>
<?php
  
   $sqlll = "SELECT count(status) As 'staa' FROM work WHERE status='pending'";
   $resulttt = mysqli_query($conn, $sqlll);
   $roww = mysqli_fetch_array($resulttt);
   $nummm = $roww['staa'];
?>
<?php
// require "conn.php";
// if(isset($_POST['delete'])){
//  $id = $_POST['id'];
// // sql to delete a record
// $sqli = "DELETE FROM work WHERE empid='.$id.'";

// if ($conn->query($sqli) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }
// }
?>
<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="UTF-8">
      <title>notifications</title>
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <!-- <script src="./js/bootstrap.bundle.min.js"> -->
      <link rel="stylesheet" href="./style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
         /* Webpixels CSS */
         /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
         /* URL: https://github.com/webpixels/css */
         @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
         /* Bootstrap Icons */
         @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
      </style>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </head>
   <body>
      <!-- partial:index.partial.html -->
      <!-- Banner -->
      <!-- Dashboard -->
      <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
         <!-- Vertical Navbar -->
         <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
               <!-- Toggler -->
               <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <!-- Brand -->
               <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
               <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="..."> -->
               </a>
               <!-- User menu (mobile) -->
               <div class="navbar-user d-lg-none">
                  <!-- Dropdown -->
                  <div class="dropdown">
                     <!-- Toggle -->
                     <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                           <!-- <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle"> -->
                           <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                     </a>
                     <!-- Menu -->
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                     </div>
                  </div>
               </div>
               <!-- Collapse -->
               <div class="collapse navbar-collapse" id="sidebarCollapse">
                  <!-- Navigation -->
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                        <i class="bi bi-bar-chart"></i> Dashboard
                        </a>
                        <a class="nav-link" href="">
                        <i class="bi bi-app-indicator"></i>Notification
                        </a>
                     </li>
                  </ul>
                  <!-- Divider -->
                  <hr class="navbar-divider my-5 opacity-20">
                  <!-- Push content down -->
                  <div class="mt-auto"></div>
                  <!-- User (md) -->
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="bi bi-person-square"></i> Account
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                        <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <!-- Main content -->
         <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
               <div class="container-fluid">
                  <div class="mb-npx">
                     <div class="row align-items-center">
                        <div class="col-md-6 col-12 mb-4 mb-sm-0">
                           <!-- Title -->
                           <h1 class="h2 mb-0 ls-tight">Admin</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-md-6 col-12 text-sm-end">
                           <div class="mx-n1">
                              
                              <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"> -->
                              <!-- <span class=" pe-2">
                              <i class="bi bi-pencil"></i>
                              </span>
                              <span>Edit</span> -->
                              <!-- </a> -->
                              <!-- <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                 <span class=" pe-2">
                                 <i class="bi bi-plus"></i>
                                 </span>
                                 <!-- <span>Create</span> -->
                                 <!-- <span>Create Message</span>
                              </a> -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <?php
                            if(isset($_GET['id'])){
                              $id = $_GET['id'];
                          
                           $sql = "SELECT * FROM notification where empid='$id'";
                           $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                                       <div class="modal-body">
                                          <form method="post" action="#">
                                          <div class="mb-3">
                                                <!-- <label for="message-text" class="col-form-label">Message:</label>  -->
                                                <!-- <input type="hidden" class="form-control" value=<?php echo $row['empid'];?> id="recipient-name"> -->
                                                </div>
                                             <div class="mb-3">
                                                <!-- <label for="message-text" class="col-form-label">Message:</label>  -->
                                                <textarea class="form-control" placeholder="notification" name="notifications" id="message-text"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-outline-primary" value="post" name="submit"/>
                                                </div>
                                          </form>

                                       </div><?php } }?>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Nav -->
                     <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                           <a href="#" class="nav-link active">Home</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
               <div class="container-fluid">
                  <!-- Card stats -->
                  <div class="card shadow border-0 mb-7">
                     <div class="card-header">
                        <h5 class="mb-0">Messages</h5>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                           <thead class="thead-light">
                              <tr>
                                <th scope="col">Id</th> 
                                 <th scope="col">Message</th>
                                 <th scope="col">Date</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            if(isset($_GET['id'])){
                              $id = $_GET['id'];
                          
                           $sql = "SELECT * FROM notification where empid='$id'";
                           $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                              <tr>
                                 <td>
                                    <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row['empid']; ?>
                                    </a>
                                 </td>
                                 <td>
                                     <?php echo $row['notifications']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date']; ?>
                                 </td>
                                 
                                 <!-- <td>
                                    <a href="view.php?id=<?php echo $row['empid']?>" class="btn btn-sm btn-neutral">View</a>
                                    <!-- <button type="button" name="delete" placeholder="view" class="btn btn-sm btn-square btn-neutral text-danger-hover"> -->
                                    <!-- <i class="bi bi-trash"></i> -->
                                    </button>
                                 </td>
                              </tr>
                <?php
                }
               }
                ?>
                              </tr>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </main>
         </div>
      </div>
      <!-- partial -->
   </body>
</html>