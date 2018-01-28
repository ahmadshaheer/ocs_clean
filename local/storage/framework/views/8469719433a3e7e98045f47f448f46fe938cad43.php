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
              <a class="section"><?php echo e(trans('menu.the_president')); ?></a>
              <div class="divider"> / </div>
              <a class="section"><?php echo e(trans('menu.decrees')); ?></a>
            </div>
          </div>
          <div class="ui fluid card" style="direction:rtl;float:right;text-align:right;">
            <div class="content">
              <?php if(sizeof($decree->$title)!=0): ?>
                <h2 class="ui header title_font border"><?php echo e($decree->$title); ?></h2>
                <p class="meta" style="font-weight: bold;font-size: 1.1em;"><?php echo e($jdate->detailedDate($decree->$date,$lang)); ?></p>
                <div>
                 <?php echo $decree->$description; ?>

                </div>
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
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
                  <?php else: ?>
                    <div class="ui huge label container">
                      <div class="ui icon image centered">
                        <img src="http://vignette1.wikia.nocookie.net/eastenders/images/f/f6/Under-construction.png/revision/latest?cb=20141120185311" alt="">
                      </div>
                      <div class="ui header container">
                        <h1 class="ui header centered">Under Construction</h1>
                      </div>
                    </div>
              <?php endif; ?>

              </div>
              <!-- AddToAny END -->
            </div>
          </div>


      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
