<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                            Add Image to album
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?php echo e(url('admin/album/image/'.$id.'/'.$number)); ?>" enctype="multipart/form-data">
                                <?php for($i=0; $i<$number; $i++): ?>
                                    <div class="form-group ">
                                        <label for="title<?php echo e($i); ?>" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title<?php echo e($i); ?>" maxlength="150" name="title<?php echo e($i); ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title_dr<?php echo e($i); ?>" class="control-label col-lg-3">Title Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control rtl" id="title_dr<?php echo e($i); ?>" maxlength="150" name="title_dr<?php echo e($i); ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title_pa<?php echo e($i); ?>" class="control-label col-lg-3">Title Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control rtl" id="title_pa<?php echo e($i); ?>" maxlength="150" name="title_pa<?php echo e($i); ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image<?php echo e($i); ?>" class="control-label col-lg-3">Image</label>
                                        <input type="file" name="image<?php echo e($i); ?>" class="file">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>
                                 <?php endfor; ?>
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
