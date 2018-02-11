<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
$desc = "desc_".$lang;
?>
  
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.items > .item {
    border-bottom: 1px dashed #ddd;
    padding-bottom: 10px;
  }
  .ui.items {
    direction:rtl;
    float: right;
    text-align: right;
  }
  #bio img{
    height: 100%;
  }
  #bio a{
    height: 170px;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="direction:rtl;float:right;text-align:right;">
            <div class="content" id="bio" style="text-align:right">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.infographics')); ?></h2>
              <?php if(sizeof($info)!=0): ?>
                <div class="ui three stackable cards" style="direction:<?php echo e($rtl); ?>;">
                  <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                    if(sizeof($value->$title)==0)
                      continue;
                     ?>
                    <div class="ui card">
                      <a class="image" href="<?php echo e(route('infographic_details',$value->id)); ?>">
                        <img src="<?php echo e(asset('uploads/infographics/'.$value->image)); ?>">
                      </a>
                      <div class="content">
                        <a href="<?php echo e(route('infographic_details',$value->id)); ?>"><?php echo e($value->$title); ?></a>
                        <div class="meta">
                          
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              <?php endif; ?>

            </div>
             

          <div class="ui centered grid">
            <?php echo e($info->links()); ?>

          </div>
          
          </div>
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
