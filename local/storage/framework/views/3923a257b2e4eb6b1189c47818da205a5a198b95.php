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
                            Edit Video
                        </header>
                        <div class="panel-body">
                        <div class="form cmxform form-horizontal ">
                            <?php echo Form::model($video, ['route' => array('videos.update',$video->id)]); ?>

                            <input name="_method" type="hidden" value="PATCH">
                            <?php if($session=='dr'): ?>
                              <div class="form-group ">
                                  <label for="title_dr" class="control-label col-lg-3">Title Dari</label>
                                  <div class="col-lg-6">
                                      <input class=" form-control rtl" maxlength="150" value="<?php echo e($video->title_dr); ?>" id="title_dr" name="title_dr" type="text">
                                  </div>
                              </div>

                              <div class="form-group ">
                                  <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                  <div class="col-lg-6">
                                      <input class=" form-control date_dr rtl" id="date_dr" vlaue="<?php echo e($video->date_dr); ?>" name="date_dr" type="text">
                                  </div>
                              </div>

                              <div class="form-group" style="margin-left:.25%;">
                                <label for="video_dr" class="control-label col-lg-3" style="padding-right:30px;">Video Dari</label>
                                <div class="input-group" style="width:48.7%;margin-bottom:0;">
                                  <span class="input-group-addon" id="basic-addon3">https://www.youtube.com/watch?v=</span>
                                  <input type="text" name="video_dr" class="form-control" value="<?php echo e($video->url_dr); ?>">
                                </div>
                              </div>

                            <?php elseif($session=='pa'): ?>
                              <div class="form-group ">
                                  <label for="title_pa" class="control-label col-lg-3">Title Pashto</label>
                                  <div class="col-lg-6">
                                      <input class=" form-control rtl" maxlength="150" id="title_pa" value="<?php echo e($video->title_pa); ?>" name="title_pa" type="text">
                                  </div>
                              </div>

                              <div class="form-group ">
                                  <label for="date_dr" class="control-label col-lg-3">Date Pashto</label>
                                  <div class="col-lg-6">
                                      <input class=" form-control date_dr rtl" id="date_dr" vlaue="<?php echo e($video->date_dr); ?>" name="date_dr" type="text">
                                  </div>
                              </div>


                              <div class="form-group" style="margin-left:.25%;">
                                <label for="video_pa" class="control-label col-lg-3" style="padding-right:30px;">Video Pashto</label>
                                <div class="input-group" style="width:48.7%;margin-bottom:0;">
                                  <span class="input-group-addon" id="basic-addon3">https://www.youtube.com/watch?v=</span>
                                  <input type="text" name="video_pa" value="<?php echo e($video->url_en); ?>" class="form-control">
                                </div>
                              </div>
                            <?php elseif($session=='en'): ?>
                              <div class="form-group ">
                                <label for="title" class="control-label col-lg-3">Title</label>
                                <div class="col-lg-6">
                                  <input class=" form-control" maxlength="150" id="title" value="<?php echo e($video->title_en); ?>" name="title" type="text">
                                </div>
                              </div>

                              <div class="form-group ">
                                <label for="date" class="control-label col-lg-3">Date</label>
                                <div class="col-lg-6">
                                  <input class=" form-control" id="date" name="date" value="<?php echo e($video->date_en); ?>" type="date" required>
                                </div>
                              </div>

                              <div class="form-group" style="margin-left:.25%;">
                                <label for="video" class="control-label col-lg-3" style="padding-right:30px;">Video English</label>
                                <div class="input-group" style="width:48.7%;margin-bottom:0;">
                                  <span class="input-group-addon" id="basic-addon3">https://www.youtube.com/watch?v=</span>
                                  <input type="text" name="video" value="<?php echo e($video->url_en); ?>" class="form-control">
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