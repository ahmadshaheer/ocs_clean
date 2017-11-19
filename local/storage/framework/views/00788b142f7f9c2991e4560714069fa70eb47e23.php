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
                            Add Video
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?php echo e(route('videos.store')); ?>" novalidate="novalidate" enctype="multipart/form-data">
                                <?php if($session=='en'): ?>
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title" maxlength="150" name="title" type="text">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="date" class="control-label col-lg-3">Date</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="date" maxlength="10"  name="date" type="date" required>
                                        </div>
                                    </div>
                                 <div class="form-group">
                                        <label for="video" class="control-label col-lg-3">Video English</label>
                                        <div class="col-lg-6">
                                        <input type="url" name="video" class="form-control">
                                      </div>
                                    </div>
                                  <?php elseif($session=='dr'): ?>
                                    <div class="form-group ">
                                        <label for="title_dr" class="control-label col-lg-3">Title Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_dr" maxlength="150" name="title_dr" type="text">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control date_dr"  maxlength="10" id="date_dr" name="date_dr" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="video_dr" class="control-label col-lg-3">Video Dari</label>
                                        <div class="col-lg-6">
                                        <input type="url" name="video_dr" class="form-control">
                                      </div>
                                    </div>
                                  <?php elseif($session=='pa'): ?>
                                    <div class="form-group ">
                                        <label for="title_pa" class="control-label col-lg-3">Title Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_pa" maxlength="150" name="title_pa" type="text">
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="date_dr" class="control-label col-lg-3">Date Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control date_dr"  maxlength="10" id="date_dr" name="date_dr" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="video_pa" class="control-label col-lg-3">Video Pashto</label>
                                        <div class="col-lg-6">
                                        <input type="url" name="video_pa" class="form-control">
                                      </div>
                                    </div>
                                    <?php endif; ?>
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
<script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>
<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
