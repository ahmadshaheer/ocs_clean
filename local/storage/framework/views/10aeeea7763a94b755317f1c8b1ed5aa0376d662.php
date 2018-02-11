<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/lightbox.min.css')); ?>">
  
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.card .meta>a {
    direction: <?php echo e($rtl); ?>;
    float: <?php echo e($dir); ?>;
  }
  .card img{
    height: 112px !important;
    border: 0;
    border-radius: 0 !important;
  }
  .card {
    border: 5px solid #cecece !important;
    border-radius:0 !important;
    box-shadow: none !important;
  }
  </style>

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.image')); ?></h2>
              <div class="ui three doubling stackable cards">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                  <a href="<?php echo e(asset('uploads/albumImage/'.$image->image)); ?>" class="image example-image-link" data-lightbox="test" data-title="">
                    <img class="example-image" src="<?php echo e(asset('uploads/albumImage/'.$image->image)); ?>">
                  </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('assets/js/lightbox.min.js')); ?>"></script>
<script>


</script>
