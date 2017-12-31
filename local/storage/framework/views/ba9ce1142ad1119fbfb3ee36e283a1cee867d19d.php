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
              <h2 class="ui header title_font border">Search Result</h2>
              <div class="ui items" style="">
                <?php if(sizeof($data_en)!=0): ?>
                  <?php $__currentLoopData = $data_en; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item <?php echo e(($value==$data_en->last())?'no_border':''); ?>">
                      <div class="content">
                        <a href="<?php echo e(url($value->type.'_details/'.$value->table_id)); ?>" class="ui small header title_font"><?php echo e($value->title_en); ?></a>
                        <div class="meta body_font">
                          <?php echo e($value->date_en); ?>

                          
                        </div>
                        <div class=" description body_font ">
                          <p class="body_font"><?php echo e($value->short_desc_en); ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php elseif(sizeof($data_pa)!=0): ?>

                   <?php $__currentLoopData = $data_pa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="item <?php echo e(($value==$data_pa->last())?'no_border':''); ?>">
                        <div class="content">
                          <a href="<?php echo e(url($value->type.'_details/'.$value->table_id)); ?>" class="ui small header title_font"><?php echo e($value->title_pa); ?></a>
                          <div class="meta body_font">
                            <?php echo e($value->date_pa); ?>

                            
                          </div>
                          <div class=" description body_font ">
                            <p class="body_font"><?php echo e($value->short_desc_pa); ?></p>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                <?php elseif(sizeof($data_dr)!=0): ?>
                  <?php $__currentLoopData = $data_dr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item <?php echo e(($value==$data_dr->last())?'no_border':''); ?>">
                      <div class="content">
                        <a href="<?php echo e(url($value->type.'_details/'.$value->table_id)); ?>" class="ui small header title_font"><?php echo e($value->title_dr); ?></a>
                        <div class="meta body_font">
                          <?php echo e($value->date_dr); ?>

                          
                        </div>
                        <div class=" description body_font ">
                          <p class="body_font"><?php echo e($value->short_desc_dr); ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <center><h2 style="">No match Found</h2></center>
                <?php endif; ?>
              </div>
            </div>
           
                <div class="ui centered grid">

                </div>
           

          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
