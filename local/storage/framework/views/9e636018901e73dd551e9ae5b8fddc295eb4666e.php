<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $session = Session::get('lang'); ?>
<style>
    .file {
      visibility: hidden;
      position: absolute;
    }
    textarea {
  resize: normal; /* user can resize vertically, but width is fixed */
    }


</style>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit chief Description
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
                                <?php echo Form::model($chief, ['route' => array('the_chief.update',$chief->id),'files' =>true]); ?>

                                <input name="_method" type="hidden" value="PATCH">
                                <?php if($session=='en'): ?>
                                    <div class="form-group ">
                                      <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_en" class="form-control format"><?php echo e($chief->desc_en); ?></textarea>
                                      </div>
                                  </div>
                                  <?php elseif($session=='dr'): ?>
                                   <div class="form-group ">
                                      <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_dr" class="form-control format rtl"><?php echo e($chief->desc_dr); ?></textarea>
                                      </div>
                                  </div>
                                  <?php else: ?>
                                   <div class="form-group ">
                                      <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_pa" class="form-control format rtl"><?php echo e($chief->desc_pa); ?></textarea>
                                      </div>
                                  </div>
                                  <?php endif; ?>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
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
