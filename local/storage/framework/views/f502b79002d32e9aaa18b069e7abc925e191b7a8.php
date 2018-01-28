<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
$pdf = 'pdf_'.$lang;
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
  .ui.items>.item>.image {
    padding-top:0 !important;
  }
  </style>
    

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.reports_and_documents')); ?></h2>
              <div class="ui items" style="width:100%;">
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                  if(sizeof($document->$title)==0)
                    continue;
                   ?>
                <div class="ui item <?php echo e(($document==$documents->last())?'no_border':''); ?>">
                  <div class="ui tiny image icon" style="width: 12%;padding:0;">
                    <a target="_blank" href="<?php echo e(asset('uploads/documents_'.$lang.'/'.$document->$pdf)); ?>">
                    <img src="<?php echo e(asset('assets/img/pdf.png')); ?>">
                    </a>
                  </div>
                  <div class="content">
                    <a href="<?php echo e(url('uploads/documents_'.$lang.'/'.$document->$pdf)); ?>" target="_blank" class="ui small header title_font"><?php echo e($document->$title); ?></a>
                    <div class="meta">
                      <span dir=""><?php echo e($jdate->detailedDate($document->$date,$lang)); ?></span>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
             
                    <div class="ui centered grid">
                      <?php echo e($documents->links()); ?>

                    </div>
               
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
