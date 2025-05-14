<?php
include('functions.php');
$obj = new Operations();

if($_GET['mode'] == 'edit'){
    $w = "where id = '".$_GET['id']."'";
    $rs = $obj->getSingle('page',$w);
}


if($_POST){

$data = array(

// page Information

'page_name'=>$_POST['page_name'],
'description'=>$_POST['description'],
'orders'=>$_POST['orders'],
'content'=>$_POST['content'],
'status'=>$_POST['status']
	
);

   if($_GET['mode'] != 'edit'){
    $obj->insert('page',$data);
    header('location:add-page.php?mode=success');
    }else{
    $obj->update('page',$data,$rs['id']);
    header('location:add-page.php?mode=update');  
    }
}


include 'header.php'?>

<?php require_once 'sidebar.php'?>
 <!--== SIDEBAR ENDS ==-->
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
<script>
    $(document).ready(function(){
       var mode = '<?php echo $_GET['mode']; ?>';
       if(mode == 'success'){
           $('#insert_msg').slideDown();
           $('#insert_msg').delay(1500).fadeOut();
       }
       if(mode == 'update'){
           $('#update_msg').slideDown();
           $('#update_msg').delay(1500).fadeOut();
           window.location = 'view-page.php';
       }
    });
</script>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <form method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Pages Information</h4>
                    </div>
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg">Data Inserted Succesfully</div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                      <div class="form-group">
                        <label>NAME *</label>
                        <input type="text" class="form-control" name="page_name"  value="<?php echo $rs['page_name'];?>" placeholder="Name" required="">
                      </div>
                      
                       <div class="form-group">
                        <label>DESCRIPTION</label>
                        <textarea type="text" class="form-control" name="description"   placeholder="Description" required=""><?php echo $rs['description'];?></textarea>
                      </div>
                    
        
                      
                       <div class="form-group">
                            <label for="list-title">CONTENT *</label>                       
                    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
                    
                            <textarea name="content" id="content" class="form-control ckeditor" ><?php echo $rs['content']; ?></textarea>
                           
                    <script>
                     CKEDITOR.replace( 'content', {
                      height: 300,
                      filebrowserUploadUrl: "upload.php"
                     });
                    </script>
                    </div>

                       <div class="form-group">
                        <label>ORDER *</label>
                        <input type="number" class="form-control" name="orders"  value="<?php echo $rs['orders'];?>"  placeholder="Order" required="">
                      </div>
                      
                      
                    <div class="form-group mb-3">

                        <label for="password">ACTIVE*</label>

                        <select class="form-control" name="status" autocomplete="off" placeholder="">

                            <option value="Disabeld"
                              <?php 
                              if ($rs['status']=='Disabeld'){echo "selected";}
                              ?>>Disabeld</option>
                              
                             <option value="Active"
                             <?php 
                             if ($rs['status']=='Active'){echo "selected";}
                            ?>>Active</option>

                        </select>

                    </div>

                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Submit</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
      </div>
<?php require_once 'footer.php' ?>