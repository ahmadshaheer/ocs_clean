<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
?>
  
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.card .meta>a {
    direction: <?php echo e($rtl); ?>;
    float: <?php echo e($dir); ?>;
  }
  .image img {
    border: 0 !important;
    border-radius: 0 !important;
  }
  a.image {
    border: 5px solid #ddd !important;
    border-radius: 0 !important;
  }
  .ui.card > #album {
    padding-right: 0 !important;
    padding-left: 0 !important;

  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.photo_albums')); ?></h2>
              <div class="ui three stackable cards" style="direction:<?php echo e($rtl); ?>">
              <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                if(sizeof($album->$title)==0)
                  continue;
                 ?>
                <div class="ui card">
                  <a class="image" style="border: 5px solid #ddd !important;border-radius:0 !important;"href="<?php echo e(route('album_images',$album->id)); ?>">
                    <div class="ui bottom attached label body_font" style="text-align: center;"><?php echo e($jdate->detailedDate($album->$date,$lang)); ?></div>
                    <img src="<?php echo e(asset('uploads/album/'.$album->image)); ?>">
                  </a>
                  <div class="content" id="album">
                    <a class="ui  header" style="clear:both;" href="<?php echo e(route('album_images',$album->id)); ?>"><?php echo e($album->$title); ?></a>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>

          

          <div class="ui centered grid">
            <?php echo e($albums->links()); ?>

          </div>
          
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
