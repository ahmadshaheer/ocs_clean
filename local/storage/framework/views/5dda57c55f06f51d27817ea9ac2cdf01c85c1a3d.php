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
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.links')); ?></h2>
              <div class="ui items" style="width:100%;">
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                  if(sizeof($item->$title)==0)
                    continue;
                   ?>
                  <div class="ui item <?php echo e(($item==$links->last())?'no_border':''); ?>">
                    <a href="<?php echo e($item->url); ?>">
                      <div class="other_pages_thumbnail">
                        <img src="<?php echo e(url('uploads/links/'.$item->image)); ?>" alt="" style="width: 100% !important">
                      </div>
                    </a>
                    <div class="content">
                      <a href="//<?php echo e($item->url); ?>" target="_blank" class="ui header title_font"><?php echo e($item->$title); ?></a>
                      <div class="description body_font"><?php echo e($item->$description); ?></div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
             
                    <div class="ui centered grid">
                      <?php echo e($links->links()); ?>

                    </div>
               
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
