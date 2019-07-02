<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="site_contact_us"; ?>
		<?php 
		if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($name) && !empty($email) && !empty($phone) && !empty($mobile) && !empty($how_did_he_or_she_hear_about_us) && !empty($questions__comments))
			{  $insert=array('name'=>$name,'email'=>$email,'phone'=>$phone,'mobile'=>$mobile,'how_did_he_or_she_hear_about_us'=>$how_did_he_or_she_hear_about_us,'questions__comments'=>$questions__comments,'date'=>date('Y-m-d'),'status'=>1);
				if($obj->insert($table,$insert)==1)
				{
					$plugin->Success("Successfully Saved",$obj->filename());
				}
				else 
				{
					$plugin->Error("Failed",$obj->filename());
				}
			}
			else 
			{
				$plugin->Error("Fields is Empty",$obj->filename());
			}   
		}
		elseif(isset($_POST['update'])) 
		{
			extract($_POST);if(!empty($name) && !empty($email) && !empty($phone) && !empty($mobile) && !empty($how_did_he_or_she_hear_about_us) && !empty($questions__comments))
			{$updatearray=array("id"=>$id);$upd2=array('name'=>$name,'email'=>$email,'phone'=>$phone,'mobile'=>$mobile,'how_did_he_or_she_hear_about_us'=>$how_did_he_or_she_hear_about_us,'questions__comments'=>$questions__comments,'date'=>date('Y-m-d'),'status'=>1);
						$update_merge_array=array_merge($updatearray,$upd2);
						if($obj->update($table,$update_merge_array)==1)
						{ 
							$plugin->Success("Successfully Updated",$obj->filename());
						} 
						else 
						{ 
							$plugin->Error("Failed",$obj->filename()); 
						}}}
		elseif(isset($_GET['del'])=="delete") 
		{
			$delarray=array("id"=>$_GET['id']);if($obj->delete($table,$delarray)==1)
			{ 
				$plugin->Success("Successfully Delete",$obj->filename());  
			} 
			else 
			{ 
				$plugin->Error("Failed",$obj->filename()); 
			}
		}
		?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
		<?php 
		echo $plugin->softwareTitle();
		echo $plugin->TableCss(); ?>
    </head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Site Contact Us</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Site Contact Us</a></li>
                    <li><a href="site_contact_us_data.php">Site Contact Us List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
				<?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                        <!-- Widget -->
                        <div class="widget widget-inverse" >
							<?php 
							if(isset($_GET['edit']))
							{
							?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Update/Change - Site Contact Us</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form">
								<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> NAME </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"name"); ?>' placeholder='NAME' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> EMAIL </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='email' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"email"); ?>' placeholder='EMAIL' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> PHONE </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='phone' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"phone"); ?>' placeholder='PHONE' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> MOBILE </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='mobile' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"mobile"); ?>' placeholder='MOBILE' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> HOW DID He Or She HEAR ABOUT US </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='how_did_he_or_she_hear_about_us' value='<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"how_did_he_or_she_hear_about_us"); ?>' placeholder='HOW DID He Or She HEAR ABOUT US' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> QUESTIONS  COMMENTS </label>
		
											<div class='col-sm-9'>
												<textarea id='form-field-1' name='questions__comments' placeholder='QUESTIONS  COMMENTS' class='form-control'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"questions__comments"); ?></textarea>
											</div>
										</div><div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
							<?php }else{ ?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Create New Site Contact Us</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form  class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> NAME </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='name' placeholder='NAME' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> EMAIL </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='email' placeholder='EMAIL' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> PHONE </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='phone' placeholder='PHONE' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> MOBILE </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='mobile' placeholder='MOBILE' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> HOW DID He Or She HEAR ABOUT US </label>
		
											<div class='col-sm-9'>
												<input type='text' id='form-field-1' name='how_did_he_or_she_hear_about_us' placeholder='HOW DID He Or She HEAR ABOUT US' class='form-control' />
											</div>
										</div><div class='form-group'>
											<label  for="inputEmail3" class="col-sm-2 control-label"> QUESTIONS  COMMENTS </label>
		
											<div class='col-sm-9'>
												<textarea id='form-field-1' name='questions__comments' placeholder='QUESTIONS  COMMENTS' class='form-control'></textarea>
											</div>
										</div><div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- // Widget END -->


                        
                        
              <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    
    <?php echo $plugin->TableJs(); ?></body>
</html>