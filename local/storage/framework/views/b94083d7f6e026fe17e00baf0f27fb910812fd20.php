<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
?>
  
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.items > .item {
    border-bottom: 1px dashed #ddd;
    padding-bottom: 10px;
    direction:<?php echo e($rtl); ?> !important;
  }
  .ui.items {
    direction:rtl;
    float: right;
    text-align: right;
    margin-top:0;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.words')); ?></h2>
              <div class="ui items" style="">
                 <?php $__currentLoopData = $words_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php 
                 if(sizeof($word->$title)==0)
                   continue;
                  ?>
                <div class="ui item <?php echo e(($word == $words_all->last())?'no_border':''); ?>">
                  <div class="other_pages_thumbnail">
                    <img src="<?php echo e(asset('uploads/word/'.$word->image)); ?>" style="padding-left:8px;">
                  </div>
                  <div class="content">
                    
                    <div class=" description ">
                      <p class="body_font"><?php echo e($word->$title); ?></p>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <div class="ui centered grid">
              <?php echo e($words_all->links()); ?>

            </div>
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
