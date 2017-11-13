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
                            Add Biography
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?php echo e(route('the_bio.store')); ?>" enctype="multipart/form-data">

                                  <?php if($session =='en'): ?>
                                      <div class="form-group ">
                                        <label for="bio_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-6">
                                            <textarea name="bio_en" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php elseif($session=='dr'): ?>
                                     <div class="form-group ">
                                        <label for="bio_dr" class="control-label col-lg-3">Biography Dari</label>
                                        <div class="col-lg-6">
                                            <textarea name="bio_dr" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                     <div class="form-group ">
                                        <label for="bio_pa" class="control-label col-lg-3">Biography Pashto</label>
                                        <div class="col-lg-6">
                                            <textarea name="bio_pa" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" onclick="go()" type="">Save</button>
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
