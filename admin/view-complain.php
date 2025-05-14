<?php
session_start();
include('functions.php');
$obj = new Operations();
// include('db.php');
include 'header.php';
?>
<!-- Sidebar Start -->
<?php include 'sidebar.php' ?>
<!-- Sidebar End -->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>View Student</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#ID</th>
                                                <th>Complain</th>
                                                <th>Room Number</th>
                                                <th>Email ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $vals = $obj->getAll('complain');
            // print_r($vals);

                                        foreach ($vals as $rows) {
                                          ?>
                                          <tr class="text-center">
                                            <td><?php echo $rows['id']?></td>
                                            <td><?php echo $rows['stu_complain']?></td>
                                            <td><?php echo $rows['room_number']?></td>
                                             <td><?php echo $rows['department']?></td>
                                        <td><a href="edit-admin.php?id=<?php echo $rows['id']?>" class="btn btn-success">Complete</a>
                    
                                            </td>
                                            <?php 
                                            }
                            ?>
                          </tr>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
<?php require_once 'footer.php' ?>