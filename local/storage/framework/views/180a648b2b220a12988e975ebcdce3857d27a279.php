
<div class="sixteen wide tablet mobile five wide computer column" >
  <div class="ui fluid card" style="">
    <div class="content" style="border:0;!">
      <div class="header title_font test" style="text-align:<?php echo e($dir); ?>;margin-bottom:11px;padding-left:0;font-size: 25px !important;">
      <?php echo e(trans('home.president_word')); ?>

    </div>
      <?php if(sizeof($word->$title)!=0): ?>
        <div class="image"><img style="width:100%;" src="<?php echo e(asset('uploads/word/'.$word->image)); ?>" alt=""></div>
        <div class="description body_font" style="text-align:justify;margin-top:10px;padding-bottom:10px;" dir="rtl"><?php echo e($word->$title); ?></div>
      <?php endif; ?>
    </div>
  </div>
  <div class="ui fluid card">
    <div class="content">
      <div class="header title_font test" style="text-align:<?php echo e($dir); ?>;margin-bottom:11px;">
      <?php echo e(trans('home.latest_news')); ?>

    </div>
      <?php if(sizeof($news)!=0): ?>
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
          if(sizeof($item->$title)==0)
            continue;
           ?>

          <div class="latest_articles <?php echo e(($item==$news->last())?'no_border':''); ?>" style="padding:3px 0px;">
            <a href="<?php echo e(url('news_details/'.$item->id)); ?>" class="ui tiny header title_font" dir="rtl" style="text-align:<?php echo e($dir); ?>;display: block;margin-bottom:0;"><?php echo e($item->$title); ?></a>
            <div class="meta body_font" style="text-align:<?php echo e($dir); ?>;" dir="rtl">
              <i class="icon clock"></i>
              <?php echo e($jdate->detailedDate($item->$date,$lang)); ?></div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="ui fluid card" style="">
    <div class="content fb">
     <div class="fb-page" data-href="https://www.facebook.com/<?php echo e(($lang=='en')?'AFG.OCS':'ocs.afg'); ?>/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/<?php echo e(($lang=='en')?'AFG.OCS':'ocs.afg'); ?>/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/<?php echo e(($lang=='en')?'AFG.OCS':'ocs.afg'); ?>/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
    </div>
  </div>
  <div class="ui fluid card" style="">
    <div class="content fb">
      <div class="fb-page" data-href="https://www.facebook.com/AFG.OCS/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ocs.afg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AFG.OCS/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
    </div>
  </div>
</div>
