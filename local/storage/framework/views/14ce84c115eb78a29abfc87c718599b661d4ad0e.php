<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $session = Session::get('lang');?>
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
                            Edit OCS Description
                        </header>
                        <div class="panel-body">
                            <div class="form cmxform form-horizontal">
                                <?php echo Form::model($ocs, ['route' => array('the_ocs.update',$ocs->id),'files' =>true]); ?>

                                <?php echo e(method_field('PATCH')); ?>

                                    <?php if($session=='en'): ?>
                                      <div class="form-group ">
                                        <label for="description_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-9">
                                            <textarea name="description_en" class="form-control format"><?php echo e($ocs->description_en); ?></textarea>
                                        </div>
                                    </div>
                                    <?php elseif($session=='dr'): ?>
                                    <div class="form-group ">
                                        <label for="description_dr" class="control-label col-lg-3">Description Dari</label>
                                        <div class="col-lg-9">
                                            <textarea name="description_dr" class="form-control format rtl"><?php echo e($ocs->description_dr); ?></textarea>
                                        </div>
                                    </div>
                                     <?php else: ?>
                                    <div class="form-group ">
                                        <label for="description_pa" class="control-label col-lg-3">Description Pashto</label>
                                        <div class="col-lg-9">
                                            <textarea name="description_pa" class="form-control format rtl"><?php echo e($ocs->description_en); ?></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <a href="javascript:void(0)" onclick="clearForm()" class="btn btn-warning"  type="button">Clear All</a>
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
