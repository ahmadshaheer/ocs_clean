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
              <h2 class="ui header title_font border"><?php echo e(trans('menu.orders')); ?></h2>
              <div class="ui items" style="">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                  if($order->$title=='')
                    continue;
                   ?>
                <div class="ui item <?php echo e(($order == $orders->last())?'no_border':''); ?>">
                  <div class="ui small image">
                    <img src="<?php echo e(asset('assets/img/thumb.jpg')); ?>" style="padding-left:8px;height:100%;">
                  </div>
                  <div class="content">
                    <a href="<?php echo e(url('order_details/'.$order->id)); ?>" class="ui small header title_font"><?php echo e($order->$title); ?></a>
                    <div class="meta">
                      <span class="body_font" dir=""><?php echo e($jdate->detailedDate($order->$date,$lang)); ?></span>
                    </div>
                    <div class=" description ">
                      <p class="body_font"><?php echo e($order->$short_desc); ?></p>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
             
                    <div class="ui centered grid">
                      <?php echo e($orders->links()); ?>

                    </div>
               
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
