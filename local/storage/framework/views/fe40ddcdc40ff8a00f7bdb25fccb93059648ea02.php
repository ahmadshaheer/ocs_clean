<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
$pdf = 'pdf_'.$lang;
$url = 'url_'.$lang;
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
  .ui.label.blue.header,.ui.yellow.label.meta {
    border:0;
    margin:0;
    border-radius: 0;
    box-shadow:0;
  }
  .ui.two.cards .content {
    padding:0;
    margin:0;
  }
  img {
    border-radius:0 !important;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.videos')); ?></h2>
              <div class="ui two cards">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                  if(sizeof($video->$title)==0)
                    continue;
                   ?>
                  <div class="ui card">
                    <div class="ui image" >
                      <a href="<?php echo e(url('video_details/'.$video->id)); ?>">
                      <img src="https://img.youtube.com/vi/<?php echo e($video->$url); ?>/hqdefault.jpg" alt="">
                      </a>
                    </div>
                    <div class="" style="background-color:#033B62 !important;padding:5px;border-radius: 0 !important;">
                      
                      <a href="<?php echo e(url('video_details/'.$video->id)); ?>" class="ui inverted header title_font" ><?php echo e($video->$title); ?></a>
                      <span class="ui <?php echo e($indir); ?> floated inverted tiny header body_font" style="color:white !important;padding-top:5px;"><?php echo e($jdate->detailedDate($video->$date,$lang)); ?></span>
                      

                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
             
                    <div class="ui centered grid">
                      <?php echo e($videos->links()); ?>

                    </div>
               
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
