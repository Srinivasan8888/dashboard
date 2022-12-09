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

   if(isset($_POST['sign']))
    {
        $empid = $_POST["empid"];
        $name = $_POST["name"];
        $date = $_POST["date"];
        $dep = $_POST["dep"];
        $desig = $_POST["desig"];
        $task = $_POST["task"];
        $status = $_POST["status"];
        $quer = "insert into work(empid,name,date,dep,desig,task,status) values('$empid','$name','$date','$dep','$desig','$task','$status')";
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
<?php
   $sql1 = "SELECT count(uname) As 'staff' FROM signup";
   $result1 = mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_array($result1);
   $num1 = $row1['staff'];
   ?>
<?php
   if(isset($_GET['id'])){
    $id = $_GET['id'];
   $sqll = "SELECT count(status) As 'sta' FROM work WHERE empid='$id' AND status='completed'";
   $resultt = mysqli_query($conn, $sqll);
   $roww = mysqli_fetch_array($resultt);
   $numm = $roww['sta'];
   }
   ?>
<?php
   if(isset($_GET['id'])){
    $id = $_GET['id'];
   $sqlll = "SELECT count(status) As 'staa' FROM work WHERE empid='$id' AND status='pending'";
   $resulttt = mysqli_query($conn, $sqlll);
   $roww = mysqli_fetch_array($resulttt);
   $nummm = $roww['staa'];
   }
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
      <title>Dashboard</title>
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
               <?php
                           $sql = "SELECT * FROM signup";
                           $result = mysqli_query($conn, $sql);
                            //$result = mysqli_query($db, $sql);
                            if($row = mysqli_fetch_array($result))
                            {
                            ?>
                  <!-- Navigation -->
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="empdashboard.php">
                        <i class="bi bi-bar-chart"></i> Dashboard
                        </a>
                        <a class="nav-link" href="empnotification.php?id=<?php echo $row['empid']?>">
                        <i class="bi bi-app-indicator"></i>Notification
                        </a>
                     </li>
                  </ul><?php } ?>
                  <!-- Divider -->
                  <hr class="navbar-divider my-5 opacity-20">
                  <!-- Push content down -->
                  <div class="mt-auto"></div>
                  <!-- User (md) -->
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="bi bi-person-square"></i>Account
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
                           <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-md-6 col-12 text-sm-end">
                           <div class="mx-n1">
                              Applications
                              <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                              <span class=" pe-2">
                              <i class="bi bi-pencil"></i>
                              </span>
                              <span>Edit</span>
                              </a>
                              <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                 <span class=" pe-2">
                                 <i class="bi bi-plus"></i>
                                 </span>
                                 <!-- <span>Create</span> -->
                                 <span>create</span>
                              </a>
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          <form method="post" action="#">
                                            <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="text" class="form-control" placeholder="ID" name="empid" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="text" class="form-control" placeholder="name" name="name" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="date" class="form-control" placeholder="date" name="date" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="text" class="form-control" placeholder="department" name="dep" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="text" class="form-control" placeholder="designation" name="desig" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                                <input type="text" class="form-control" placeholder="task" name="task" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                 <select class="form-select" aria-label="Default select example" name="status">
                                                    <option selected>status</option>
                                                    <option value="completed">completed</option>
                                                    <option value="pending">pending</option>
                                                </select>
                                             </div> 
                                              
                                             <!-- <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Message:</label> 
                                                <textarea class="form-control" id="message-text"></textarea>
                                                </div> -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn" value="Sign up" name="sign"/>
                                                </div>
                                          </form>

                                       </div>
                                       
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
                  <div class="row g-6 mb-6">
                     <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Employee</span>
                                    <span class="h3 font-bold mb-0"><?php echo $num1; ?></span>
                                 </div>
                                 <div class="col-auto">
                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                       <i class="bi bi-people"></i>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-2 mb-0 text-sm">
                                 <!-- <span class="badge badge-pill bg-soft-success text-success me-2">
                                    <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Projects</span>
                                    <span class="h3 font-bold mb-0">215</span>
                                 </div>
                                 <div class="col-auto">
                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                       <i class="bi bi-credit-card"></i>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-2 mb-0 text-sm">
                                 <!-- <span class="badge badge-pill bg-soft-success text-success me-2">
                                    <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Completed</span>
                                    <span class="h3 font-bold mb-0"><?php echo $numm; ?></span>
                                 </div>
                                 <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                       <i class="bi bi-check2-circle"></i>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-2 mb-0 text-sm">
                                 <!-- <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                    <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Pending</span>
                                    <span class="h3 font-bold mb-0"><?php echo $nummm?></span>
                                 </div>
                                 <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                       <i class="bi bi-clock-history"></i>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-2 mb-0 text-sm">
                                 <!-- <span class="badge badge-pill bg-soft-success text-success me-2">
                                    <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card shadow border-0 mb-7">
                     <div class="card-header">
                        <h5 class="mb-0">Applications</h5>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                           <thead class="thead-light">
                              <tr>
                                <th scope="col">ID</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Date</th>
                                 <!-- <th scope="col">Task</th> -->
                                 <th scope="col">Department</th>
                                 <th scope="col">designation</th>
                                 <th scope="col">task</th>
                                 <th scope="col">Status</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                           $sql = "SELECT * FROM work where empid='$id'";
                $result = mysqli_query($conn, $sql);
                //$result = mysqli_query($db, $sql);
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
                                     <?php echo $row['name']; ?>
                                </td>
                                <td>
                                     <?php echo $row['date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['dep']; ?>
                                 </td>
                                 <td>
                                    <?php echo $row['desig']; ?>
                                 </td>
                                 <!-- <td>
                                    <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                                    <a class="text-heading font-semibold" href="#">
                                        Dribbble
                                    </a>
                                    </td> -->
                                 <td>
                                    <?php echo $row['task']; ?>
                                 </td>
                                 <td>
                                    <span class="badge badge-lg badge-dot">
                                    <?php 

                                            if($row['status']=='completed'){
                                                    echo "<i class='bg-success'></i>completed";
                                            }
                                            else{
                                                echo "<i class='bg-warning'></i>pending";
                                                    // echo "<div><i class="bg-success"></i>pending</div>";
                                            }
                                    ?>

                                    </span>
                                 </td>
                                 
                                 <td class="text-end">
                                    <!-- <a href="#" class="btn btn-sm btn-neutral">View</a> -->
                                    <!-- <a href="delete.php?del=<?php echo $row['s.no'];?>" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></a>  -->
                                    <button type="button" onclick="return table_raw()" name="delete" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                    <i class="bi bi-trash"></i>
                                    </button>
                                 </td>
                              </tr>

                              
                <?php
                }}
                ?>
                              <!-- <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Darlene Robertson
                                     </a>
                                 </td>
                                 <td>
                                     Apr 15, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-2.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Netguru
                                     </a>
                                 </td>
                                 <td>
                                     $2.750
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-warning"></i>pending
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Theresa Webb
                                     </a>
                                 </td>
                                 <td>
                                     Mar 20, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-3.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Figma
                                     </a>
                                 </td>
                                 <td>
                                     $4.200
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-success"></i>completed
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Kristin Watson
                                     </a>
                                 </td>
                                 <td>
                                     Feb 15, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-4.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Mailchimp
                                     </a>
                                 </td>
                                 <td>
                                     $3.500
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-dark"></i>not started
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Cody Fisher
                                     </a>
                                 </td>
                                 <td>
                                     Apr 10, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Webpixels
                                     </a>
                                 </td>
                                 <td>
                                     $1.500
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-danger"></i>canceled
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Robert Fox
                                     </a>
                                 </td>
                                 <td>
                                     Feb 15, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Dribbble
                                     </a>
                                 </td>
                                 <td>
                                     $3.500
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-success"></i>completed
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Darlene Robertson
                                     </a>
                                 </td>
                                 <td>
                                     Apr 15, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-2.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Netguru
                                     </a>
                                 </td>
                                 <td>
                                     $2.750
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-warning"></i>pending
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Theresa Webb
                                     </a>
                                 </td>
                                 <td>
                                     Mar 20, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-3.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Figma
                                     </a>
                                 </td>
                                 <td>
                                     $4.200
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-success"></i>completed
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Kristin Watson
                                     </a>
                                 </td>
                                 <td>
                                     Feb 15, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-4.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Mailchimp
                                     </a>
                                 </td>
                                 <td>
                                     $3.500
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-dark"></i>not started
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Cody Fisher
                                     </a>
                                 </td>
                                 <td>
                                     Apr 10, 2021
                                 </td>
                                 <td>
                                     <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                     <a class="text-heading font-semibold" href="#">
                                         Webpixels
                                     </a>
                                 </td>
                                 <td>
                                     $1.500
                                 </td>
                                 <td>
                                     <span class="badge badge-lg badge-dot">
                                         <i class="bg-danger"></i>Canceled
                                     </span>
                                 </td>
                                 <td class="text-end">
                                     <a href="#" class="btn btn-sm btn-neutral">View</a>
                                     <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </td> -->
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
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script>
    public function table_raw(){
    $delete_data = "DELETE FROM `work` WHERE `work`. "$row['s.no']" AND `work`. "$row['empid']" ";
    return $delete_data;
    }
    </script>
   </body>
</html>