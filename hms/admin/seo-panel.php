<?php
include('functions.php');
$obj = new Operations();

$where = "where id = '1'";
$rsss = $obj->getSingle('global_config',$where);

if($_POST){

$data = array(

'meta_title'=>$_POST['meta_title'],
'meta_description'=>$_POST['meta_description'],
'currency'=>$_POST['currency'],
'meta_keywords'=>$_POST['meta_keywords'],
'google_recapthca_key'=>$_POST['google_recapthca_key'],
'google_recapthca_secret_key'=>$_POST['google_recapthca_secret_key']
);
$obj->update('global_config',$data,$_GET['id']);
}
?>

<?php include 'header.php'?>

<?php require_once 'sidebar.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
document.write('<?php echo $message; ?>');
$('#insert_msg').delay(2000).fadeOut();
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
                      <h2>SEO PANEL</h2>
                    </div>
                    <div class="card-body">
                      <div class="form-group required">
                        <label for="application_name">Meta Title</label>
                        <input name="meta_title" type="text" class="form-control" placeholder="Meta Title" 
                        value="<?php echo $rsss['meta_title'];?>" required>
                    </div>
                      <div class="form-group required">
                        <label for="meta_description">Meta Description</label>
                        <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" 
                        value="<?php echo $rsss['meta_description'];?>" required>
                    </div>
                    <div class="form-group">
                       <div class="form-group required">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input name="meta_keywords" type="text" class="form-control" placeholder="Meta Keywords" 
                        value="<?php echo $rsss['meta_keywords'];?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Currency</label>
                        <select name="currency" class="form-control" >
                            <option value="0">Select Currency</option>
                            <?php 
                            $currency = $obj->getAll('currency');
                            foreach($currency as $crncy){
                                
                            	$cr_name_code = $crncy['currency_code']
                            	." - ".$crncy['currency_name'];
                            	$rs_name_code = $rsss['currency'];
                            ?>
                            <option value="<?php echo $crncy['currency_code']; ?> - <?php echo $crncy['currency_name']; ?>" <?php if($cr_name_code == $rs_name_code)
                                        { echo "selected"; } ?>>
                                
                                <?php echo $crncy['currency_code']; ?> - 
                                <?php echo $crncy['currency_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        </div>
                      <div class="form-group">
                        <label for="google_recapthca_key">Google reCaptcha Site Key (v3)</label> 
                        <input name="google_recapthca_key" type="text" class="form-control" placeholder="Google reCaptcha Site Key (v3)" 
                        value="<?php echo $rsss['google_recapthca_key'];?>">
                    </div>
                      <div class="form-group">
                        <label for="google_recapthca_secret_key">Google reCaptcha Secret Key (v3)</label> 
                        <input name="google_recapthca_secret_key" type="text" class="form-control" placeholder="Google reCaptcha Secret Key (v3)" 
                        value="<?php echo $rsss['google_recapthca_secret_key'];?>">
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php require_once 'footer.php' ?>