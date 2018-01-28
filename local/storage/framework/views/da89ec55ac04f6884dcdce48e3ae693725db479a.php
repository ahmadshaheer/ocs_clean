<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
$bio = "bio_".$lang;
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
    height: auto;
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
              <a class="section"><?php echo e(trans('menu.biography')); ?></a>
            </div>
          </div>
          <div class="ui fluid card" style="">
            <div class="content" id="bio" style="text-align:right">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.biography')); ?></h2>
              <?php if(sizeof($biography)!=0): ?>
                <?php echo $biography->$bio; ?>

              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
