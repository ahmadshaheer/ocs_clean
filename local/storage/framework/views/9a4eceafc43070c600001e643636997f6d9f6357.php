<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $session = Session::get('lang'); ?>


<style>
    .file {
      visibility: hidden;
      position: absolute;
    }


</style>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit InfoGraphic
                        </header>
                        <div class="panel-body">
                            <?php if($errors->any()): ?>
                              <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                            <?php endif; ?>
                            <div class="form cmxform form-horizontal">
                                <?php echo Form::model($info, ['route' => array('infographic.update',$info->id),'files' =>true]); ?>

                                <input name="_method" type="hidden" value="PATCH">
                                <?php if($session=='dr'): ?>

                                  <div class="form-group ">
                                      <label for="title_dr" class="control-label col-lg-3">Title Dari</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="title_dr" maxlength="150" value="<?php echo e($info->title_dr); ?>" name="title_dr" type="text">
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control date_dr"  maxlength="10" id="date_dr" value="<?php echo e($info->date_dr); ?>" name="date_dr" type="text" required>
                                      </div>
                                  </div>

                                <?php elseif($session=='pa'): ?>
                                  <div class="form-group ">
                                      <label for="title_pa" class="control-label col-lg-3">Title Pashto</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="title_pa" maxlength="150" value="<?php echo e($info->title_pa); ?>" name="title_pa" type="text">
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="date_dr" class="control-label col-lg-3">Date Pashto</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control date_dr"  maxlength="10" id="date_dr" value="<?php echo e($info->date_dr); ?>" name="date_dr" type="text" required>
                                      </div>
                                  </div>


                                <?php elseif($session=='en'): ?>
                                  <div class="form-group ">
                                      <label for="title" class="control-label col-lg-3">Title</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="title" maxlength="150" value="<?php echo e($info->title_en); ?>" name="title_en" type="text">
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="date" class="control-label col-lg-3">Date</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="date" maxlength="10" value="<?php echo e($info->date_en); ?>"  name="date_en" type="date" required>
                                      </div>
                                  </div>
                                <?php endif; ?>






                                    <div class="form-group">
                                        <label for="image" class="control-label col-lg-3">Image</label>
                                        <input type="file" name="image" class="file" value="<?php echo e($info->image); ?>">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default"  type="button">Cancel</a>
                                        </div>
                                    </div>
                               <?php echo Form::close(); ?>

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
