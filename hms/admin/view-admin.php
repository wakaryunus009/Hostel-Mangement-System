<?php
include('functions.php');
$obj = new Operations();

include ('header.php');
include ('db.php');
?>

<?php 
include('sidebar.php'); 
?>
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
                                            <th>full_name</th>
                                            <th>user_id</th>
                                            <th>password</th>
                                            <th>eiin</th>
                                            <th>position</th>
                                            <th>email_id</th>
                                            <th>contact_no</th>
                                            <th>image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sel = "SELECT * FROM admin_portal";
                                        $qry = mysqli_query($db,$sel);
                                        while($rows=mysqli_fetch_array($qry)){
                                      ?>
                                      <tr class="text-center">
                                        <td><?php echo $rows['id']?></td>
                                        <td><?php echo $rows['full_name']?></td>
                                        <td><?php echo $rows['user_id']?></td>
                                        <td><?php echo $rows['password']?></td>
                                        <td><?php echo $rows['eiin']?></td>
                                        <td><?php echo $rows['position']?></td>
                                         <td><?php echo $rows['email_id']?></td>
                                        <td><?php echo $rows['contact_no']?></td>
                                        <td><img src="./images/<?php echo $rows['image']?>" height="50"></td>
                                        
                                        
                                        <td><a href="edit-admin.php?id=<?php echo $rows['id']?>" class="btn btn-success">Edit</a>
                                         <a href="delete-admin.php?id=<?php echo $rows['id']?>" class="btn btn-danger">Delete</a>
                
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
<?php require_once 'footer.php'; ?>

