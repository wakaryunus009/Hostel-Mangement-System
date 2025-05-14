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
                            <h2>View Booking List</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#ID</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Student Email</th>
                                            <th>Room Number</th>
                                            <th>Number Of Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        

                                        // Fetch data from the 'page' table
                                        $sql = "SELECT * FROM booking";
                                        $result = $db->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($rss = $result->fetch_assoc()) {
                                        ?>
                                                <tr class="text-center">
                                                    <td>#<?php echo $rss['id']; ?></td>
                                                    <td><?php echo $rss['student_id']; ?></td>
                                                    <td><?php echo $rss['student_name']; ?></td>
                                                    <td><?php echo $rss['email']; ?></td>
                                                    <td><?php echo $rss['room_no']; ?></td>
                                                    <td><?php echo $rss['number_of_stu']; ?>
                                                    <!--<td><span id="view-pages_<?php echo $rss['id']; ?>" <?php if($rss['status'] == 'Active'){ ?>class="btn btn-success"<?php }else{ ?> class="btn btn-danger sub"<?php } ?>><?php echo $rss['status']; ?></span></td>-->
                                                    <td><a href="edit-student.php?mode=edit&id=<?php echo $rss['id'];?>" class="btn btn-primary">Edit</a>
                                                        <a href="delete-booking.php?id=<?php echo $rss['id']; ?>" class="btn btn-danger btn_dengars">Delete Room</a>
                                                        
                                                       
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
                                                <script>
                                                     $('#del-page_<?php echo $rss['id']; ?>').click(function(){

                                                        var r = confirm("Are You Sure You Want To Delete!");
                                                
                                                          if (r == true) {
                                                
                                                            window.location = "del-student.php?id=<?php echo $rss['id']; ?>";
                                                
                                                          } else {
                                                
                                                            
                                                
                                                          }
                                                
                                                    });

                                                </script>
                                                
                                                
                                                
                                                
                                                
                                        <?php 
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $db->close(); // Close the database connection
                                        ?>
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

<!-- JavaScript/jQuery -->
