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
                            Edit Quote
                        </header>
                        <div class="panel-body">
                        <div class="form cmxform form-horizontal ">
                            <?php echo Form::model($quote, ['route' => array('quotes.update',$quote->id),'files'=>true]); ?>

                            <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Quote</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" maxlength="150" id="title" value="<?php echo e($quote->title); ?>" name="title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="control-label col-lg-3">Quote Image</label>
                                        <input type="file" name="image" value="<?php echo e($quote->image); ?>" class="file">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="Update Image">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>

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
