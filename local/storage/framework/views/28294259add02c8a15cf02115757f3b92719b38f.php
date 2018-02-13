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
            <div class="ui breadcrumb" style="direction:<?php echo e($rtl); ?>">
              <a class="section"><?php echo e(trans('menu.media')); ?></a>
              <div class="divider"> / </div>
              <a class="section"><?php echo e(trans('menu.news')); ?></a>
            </div>
          </div>
          <div class="ui fluid card" style="direction:rtl;float:right;text-align:right;">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e($news_details->$title); ?></h2>
              <img class="ui image" src="<?php echo e(asset('uploads/news/'.$news_details->image)); ?>">
              <p class="meta body_font"><?php echo e($news_details->$date); ?></p>
              <div class="description">
                <p><?php echo $news_details->$description; ?></p>
              </div>
              <!-- AddToAny BEGIN -->
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
              
              <!-- AddToAny BEGIN -->
              <a class="a2a_button_facebook"></a>
              <a class="a2a_button_twitter"></a>
              <a class="a2a_button_google_plus"></a>
              <a class="a2a_button_facebook_messenger"></a>
              <a class="a2a_button_telegram"></a>
              <a class="a2a_button_viber"></a>
              <a class="a2a_button_whatsapp"></a>
              <a class="a2a_button_line"></a>
              <a class="a2a_button_print"></a>
              <a class="a2a_button_email"></a>
              </div>
              <script>
              var a2a_config = a2a_config || {};
              a2a_config.prioritize = ["facebook", "twitter", "google_plus", "email", "print"];
              </script>
              <script async src="https://static.addtoany.com/menu/page.js"></script>
              <!-- AddToAny END -->
            </div>
          </div>
          <div class="ui fluid card">
            <div class="content">
            <h3 class="title_font" style="direction:rtl;"><?php echo e(trans('home.similar')); ?> </h3>
            <div class="ui three stackable cards" style="text-align:right;direction:<?php echo e($rtl); ?>">
              <?php if($final!=null): ?>
              <?php $__currentLoopData = $final; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="ui card">
                  <div class="content">
                    <div class="ui image" style="height: 103px;">
                      <img src="<?php echo e(asset('uploads/news/'.$item->image)); ?>" style="height: 100%" alt="">
                    </div>
                    <a href="<?php echo e(url('news_details/'.$item->id)); ?>" class="title_font"><?php echo e($item->$title); ?></a>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>

            </div>
          </div>
        </div>


      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
