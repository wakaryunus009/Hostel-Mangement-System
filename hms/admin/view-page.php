<?php
include('functions.php');
$obj = new Operations();

include 'header.php'
?>

<?php require_once 'sidebar.php'?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h2>Page</h2>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                             <th>#ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $rs=$obj->getAll('page');
                        foreach($rs as $rss){
                        ?>
                          <tr class="text-center">
                            
                            <td>#<?php echo $rss['id'];?></td>
                            
                            <td><?php echo $rss['page_name'];?></td>

                            <td><?php echo $rss['description']; ?></td>
                            
                           <td><?php echo $rss['content'];?></td>

                            <td><?php echo $rss['orders']; ?></td>
                           
                           <td><span id="view-pages_<?php echo $rss['id']; ?>" <?php if($rss['status'] == 'Active'){ ?>class="btn btn-success"<?php }else{ ?> class="btn btn-danger sub"<?php } ?>><?php echo $rss['status']; ?></span>
                           
                            <td><a href="add-page.php?mode=edit&id=<?php echo $rss['id'];?>" class="btn btn-primary">Edit</a>
                               <a id="del-page_<?php echo $rss['id']; ?>" href="javascript:void(0)" class="btn btn-danger btn_dengars">Delete</a></td>

                            </td>
                          </tr>
                          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    
    <script>

    $('#view-pages_<?php echo $rss['id']; ?>').click(function(){

    window.location = "page_bac.php?id=<?php echo $rss['id']; ?>";

    });

</script> 

<script>

    $('#del-page_<?php echo $rss['id']; ?>').click(function(){

        var r = confirm("Are You Sure You Want To Page!");

          if (r == true) {

            window.location = "del-page.php?id=<?php echo $rss['id']; ?>";

          } else {

            
          }

    });

</script>     

                          <?php }?>
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
      <?php require_once 'footer.php'?>