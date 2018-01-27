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
    width: 100%;
    height: 600px;
  }
  p {
    font-size:15px !important;
    font-weight: normal;
  }
  input,textarea,button {
    border-radius: 0 !important;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <h2 class="ui header title_font border"><?php echo e(trans('menu.complaint_regestration')); ?></h2>
          <div class="ui fluid card" style="direction:rtl;float:right;text-align:right;">
            <div class="content" id="" style="text-align:right">
              <h3 class="ui header title_font"><?php echo trans('home.complaint_header'); ?></p>
              <p><?php echo trans('home.complaint_p1'); ?></p>
              <p><?php echo trans('home.complaint_p2'); ?></p>
              <p><?php echo trans('home.complaint_p3'); ?></p>
              <p><?php echo trans('home.complaint_p4'); ?></p>
              <p><?php echo trans('home.complaint_p5'); ?></p>
              <p><?php echo trans('home.complaint_p6'); ?></p>

              <div class="ui item">
                <div class="ui tiny image icon" style="float:<?php echo e($dir); ?>;height:100%;padding-<?php echo e($indir); ?>:5px;">
                  <a target="_blank" href="<?php echo e(asset('assets/complaint_reg/complaint_doc.doc')); ?>">
                    <img src="<?php echo e(asset('assets/img/pdf.png')); ?>">
                  </a>
                </div>
                

                <div class="content" style="display:block;">
                    <p style="margin-bottom: 0;"><?php echo trans('home.complaint_p7'); ?></p>
                    <p style="display: flex;"><?php echo trans('home.complaint_p8'); ?></p>
                </div>
              </div>

              <div class="ui small centered header" style="clear: both;">
                <a href="<?php echo e(asset('assets/complaint_reg/complaint_report_'.$lang.'.pdf')); ?>" target="_blank" class=""><?php echo trans('home.complaint_report'); ?></a>
              </div>

              <!-- AddToAny BEGIN -->
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="float: <?php echo e($indir); ?>;">
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
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
