<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
$description = "description_".$lang;
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
    width: 100%;
    height: 600px;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="direction:rtl;float:right;text-align:right;">
            <div class="content" id="bio" style="text-align:right">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.media_directorate')); ?></h2>
              <?php if(sizeof($media)!=0): ?>
              <?php echo $media->$description; ?>

              <!-- AddToAny BEGIN -->
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="float:<?php echo e($indir); ?>">
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
             <!-- AddToAny END -->
             <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
