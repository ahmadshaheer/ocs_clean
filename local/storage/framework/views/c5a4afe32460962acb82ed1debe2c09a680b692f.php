<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $session = Session::get('lang'); ?>
<style>
    .file {
      visibility: hidden;
      position: absolute;
    }


</style>
<?php
// $type = array('decree','order','message','word','statement');
// $route= substr(URL::previous(), strrpos(URL::previous(), '/') + 1);
// $url = substr($route, 0,-1);
// if (in_array($url, $type)==0) {
//     return;
// }
?>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Add President's <?php echo e($url); ?>

                        </header>
                        <div class="panel-body">
                          <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          <?php endif; ?>
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?php echo e(route('the_president.store')); ?>" enctype="multipart/form-data">
                                    <?php if($session == 'en'): ?>
                                    <?php if($url=='word'): ?>
                                    <div class="form-group ">
                                        <label for="short_desc_en" class="control-label col-lg-3">President Word</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_en" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title" name="title_en" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="date" class="control-label col-lg-3">Date</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="date"  name="date_en" type="date" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="short_desc_en" class="control-label col-lg-3">Short Description English</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_en" class="form-control"></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-6">
                                            <textarea name="desc_en" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php elseif($session =='dr'): ?>
                                    <?php if($url=='word'): ?>
                                    <div class="form-group ">
                                        <label for="short_desc_dr" class="control-label col-lg-3">President Word Dari</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_dr" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group ">
                                        <label for="title_dr" class="control-label col-lg-3">Title Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_dr" name="title_dr" type="text">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control date_dr"  id="date_dr" name="date_dr" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="short_desc_dr" class="control-label col-lg-3">Short Description Dari</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_dr" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                        <div class="col-lg-6">
                                            <textarea name="desc_dr" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php elseif($session == 'pa'): ?>
                                    <?php if($url=='word'): ?>
                                     <div class="form-group ">
                                        <label for="short_desc_pa" class="control-label col-lg-3">President Word Pashto</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_pa" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                     <div class="form-group ">
                                        <label for="title_pa" class="control-label col-lg-3">Title Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_pa" name="title_pa" type="text">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="date_dr" class="control-label col-lg-3">Date Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control date_dr"  id="date_dr" name="date_dr" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="short_desc_pa" class="control-label col-lg-3">Short Description Pashto</label>
                                        <div class="col-lg-6">
                                            <textarea name="short_desc_pa" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                        <div class="col-lg-6">
                                            <textarea name="desc_pa" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($url!='order' AND $url!='decree'): ?>
                                      <div class="form-group">
                                        <label for="image" class="control-label col-lg-3">Image</label>
                                        <input type="file" name="image" class="file">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    
                                    <div class="form-group ">
                                        <label for="type" class="control-label col-lg-3">Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="type">
                                                <option value="decree" selected=>Decree</option>
                                                <option value="order">Order</option>
                                                <option value="statment">Statment</option>
                                                <option value="message">Message</option>
                                                <option value="word">Word</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default"  type="button">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
        </div>

</section>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>
