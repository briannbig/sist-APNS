<?php 
    session_start();
    require('db/dbconfig.php');
    if (!isset($_SESSION['login'])){ 
        header('location:login.php');
    }    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "./includes/header.html" ?>
    <body class="sb-nav-fixed">
        <?php include "./includes/topnav.html" ?>
        <?php include "./includes/sidenavhod.html" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php 
                            if (isset($_GET['code'])) {                                                    
                                $code = $_GET['code'];                                
                                // $con = $conn;
                                $query = "SELECT * FROM  classes WHERE `code` = '$code'";
                                $ret = mysqli_query($con, $query);
                                while ($row=mysqli_fetch_array($ret)) { ?>   
                                    <h1><?php echo $row['code'];?></h1>
                                    <h2><?php echo $row['program'];?></h2> 
                                    <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-primary text-white mb-4">
                                            <div class="card-body"><i class="fa fa-user "></i ></div>                                            
                                            <div class="card-footer d-flex align-items-center justify-content-between">                                            
                                            <a class="small text-white stretched-link" href="edittrainee.php?updateclass=<?php echo $row['code'];?>">Add new student</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                        </div>    
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-secondary text-white mb-4">
                                            <div class="card-body"><i class="fas fa-book"></i></div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="editsubject.php?updateclass=<?php echo $row['code'];?>">Add new subject</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                        </div>    
                                    </div> 
                                    </div>                                                                                                                     
                                                                                                                                                                                                         
                                <?php }
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Students enrolled
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Registration number</th>
                                            <th>Name</th> 
                                            <th>Telephone</th>
                                            <th>Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $code = $_GET['code'];
                                            $query = "SELECT * FROM student WHERE `class` = '$code'";
                                            $ret = mysqli_query($con, $query);
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {                                                                                            
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['reg_no'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['telephone'];?></td>
                                            <!-- <td><i class="fa fa-eye" ></i> view</td> -->
                                            <td>                                                
                                                <a href="edittrainee.php?updatereg=<?php echo $row['reg_no'];?>"><button type="submit" class="btn btn-sm btn-warning"> <i class="fa fa-edit" ></i> edit</button></a>                                                
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1;}?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i><span>Subjects</span>                                
                                <!-- Students enrolled -->
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Title</th>
                                            <th>Class</th> 
                                            <th>Trainer</th>
                                            <!-- <th>Action</th>                                            -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $code = $_GET['code'];
                                            $query = "SELECT * FROM `subject` WHERE `class` = '$code'";
                                            $ret = mysqli_query($con, $query);
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {                                                                                            
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['code'];?></td>                                            
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['class'];?></td>
                                            <td><?php echo $row['trainer'];?></td>
                                            <!-- <td><i class="fa fa-eye" ></i> view</td> -->
                                            <!-- <td>                                                
                                                <a href="edittrainee.php?updatereg=<?php echo $row['reg_no'];?>"><button type="submit" class="btn btn-sm btn-warning"> <i class="fa fa-edit" ></i> edit</button></a>                                                
                                            </td> -->
                                        </tr>
                                        <?php $cnt=$cnt+1;}?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>                                                    
                    </div>
                </main>
                <?php include('./includes/footer.html') ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
