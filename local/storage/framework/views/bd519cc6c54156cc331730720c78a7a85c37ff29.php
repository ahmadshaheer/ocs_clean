<?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php 
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$url,$jdate;
$pdf = 'pdf_'.$lang;
 ?>
<style>
.ui.fluid.card {
  border:0 !important;
}
.ui.centered.container.grid {
  padding:0 !important;
}
</style>
  
    
    <div class="ui stackable segment masthead" style="background-color:#dfdfdf;margin-top:0;">
      <div class="owl-carousel" style="">
        <?php if(sizeof($news)!=0): ?>
          <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($value->$title!=null): ?>
              <div class="item">
                <div class="ui stackable container grid" id="carousel_div">
                  <div class="sixteen wide mobile tablet ten wide computer column" id="carousel_image_div" >
                    <div class="carousel_thumbnail">
                      <img style="" src="<?php echo e(asset('uploads/media/news/'.$value->image)); ?>" alt="">
                    </div>
                  </div>
                  <div class="sixteen wide mobile tablet six wide computer column" id="carousel_text_div" style="position: relative;max-height: 365px !important">
                    <blockquote style="position: absolute;bottom: 20px !important">
                      <a href="<?php echo e(url('news_details/'.$value->id)); ?>" class="ui header title_font news_title" id="carousel_title" style="display:block"><?php echo e($value->$title); ?></a>
                      <p class="body_font " style="color:#888;font-size:14px;" dir=""><i class="icon time"></i>
                        <?php echo e($jdate->detailedDate($value->$date,$lang)); ?></p>
                      <div style="font-size:17px;" class="body_font carousel_text"><?php echo e($value->$short_desc); ?></div>
                      <a class="body_font" href="<?php echo e(url('news_details/'.$value->id)); ?>" style="color:#888;font-size:14px;float:<?php echo e($indir); ?>"><?php echo e(trans('home.read_more')); ?></a>
                    </blockquote>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <div class="item">
            <div class="ui stackable container grid" id="carousel_div">
              <div class="sixteen wide mobile tablet ten wide computer column" id="carousel_image_div">
                <div class="carousel_thumbnail">
                  <h1 class="ui header">Please Enter Data from CMS</h1>
                </div>

              </div>
              <div class="sixteen wide mobile tablet six wide computer column" id="carousel_text_div" style="position: relative;max-height: 310px !important">
              </div>
            </div>
          </div>
      <?php endif; ?>


      </div>
    </div>
    
    
    <div class="ui segment" style="margin-top:0;">
      <div class="ui centered container grid" id="main_div" style="display: flex">
        <div class="sixteen wide tablet mobile four wide computer column"  id="president_word">
          <div class="ui fluid card" style="">
            <div class="content" style="border:0;!">
              <a href="<?php echo e(route('words')); ?>" class="header title_font test" style=""><?php echo e(trans('home.president_word')); ?></a>
                <?php if(sizeof($word)!=0): ?>
                  <div class="image" style="margin-top:21px;">
                    <img style="width:100%;" src="<?php echo e(asset('uploads/word/'.$word->image_thumb)); ?>" alt="">
                  </div>
                  <div class="description body_font" style="text-align:justify;margin-top:10px;direction: <?php echo e($rtl); ?>"><?php echo e($word->$title); ?></div>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile seven wide computer column" id="latest_news">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="<?php echo e(route('news')); ?>" class="header title_font test"><?php echo e(trans('home.latest_news')); ?></a>
              <div class="ui items">
                <?php if(sizeof($lattest_news)!=0): ?>
                  <?php $__currentLoopData = $lattest_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $url =  ($item->table_name=='documents')?asset('uploads/documents_'.$lang.'/'.$item->table_id.'.pdf'):'';?>
                    <?php if($item->$title!=null): ?>
                      <div class="news <?php echo e(($item == $lattest_news->last())?'no_borders':''); ?>" style="border-bottom:1px dashed #ddd;padding-bottom:10px;">
                        <div class="ui grid" style="display:flex;margin:0 !important;">
                          <div class="sixteen wide mobile tablet eleven wide computer column" id="news_title" style="padding-top:0;">
                            <a href="<?php echo e(($item->table_name=='documents')?$url:url($item->type.'_details/'.$item->table_id)); ?>" class="ui <?php echo e($dir); ?> floated small header title_font title_to_be_trimmed" dir="rtl" style="margin:0"><?php echo e($item->$title); ?></a>
                            <p class="meta" style="clear: both">
                              <i class="icon clock">
                              </i><?php echo e($jdate->detailedDate($item->$date,$lang)); ?>

                            </p>
                          </div>
                          <div class="sixteen wide mobile tablet five wide computer column thumbnail" id="news_image" style="">
                            <img style="float:right;" class="" src="<?php echo e(($item->table_name=='documents')?asset('assets/img/pdf.png'):asset($item->image_thumb)); ?>" alt="">
                          </div>
                        </div>
                        <div class="description body_font short_desc_to_be_trimmed" style="clear:both;">
                          <?php echo e($item->$short_desc); ?>

                        </div>
                        <div class="" style="padding-bottom:15px;">
                          <a href="<?php echo e(($item->table_name=='documents')?$url:url($item->type.'_details/'.$item->table_id)); ?>" class="meta body_font" style="float:left;"><?php echo e(trans('home.read_more')); ?></a>
                        </div>

                      </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile five wide computer column" id="articles">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="<?php echo e(route('articles')); ?>" class="header title_font test" style=""><?php echo e(trans('home.articles')); ?></a>
              <div class="ui items" style="margin-top:11px;">
              <?php if(sizeof($articles)!=0): ?>
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                 <?php if($item->$title!=null): ?>
                   <div class="article <?php echo e(($item == $articles->last())?'no_borders':''); ?>" style="border-bottom:1px dashed #ddd;padding-bottom:10px;">
                     <div class="ui grid" style="display:flex;margin:0 !important;">
                       <div class="sixteen wide mobile tablet nine wide computer column" id="article_title" style="padding-top:0;">
                         <a href="<?php echo e(url('article_details/'.$item->id)); ?>" class="ui <?php echo e($dir); ?> floated small header title_font title_to_be_trimmed" dir="rtl" style="margin:0"><?php echo e($item->$title); ?></a>
                         <p class="meta">
                           <i class="icon clock">
                           </i><?php echo e($jdate->detailedDate($item->$date,$lang)); ?>

                         </p>
                       </div>
                       <div class="sixteen wide mobile tablet seven wide computer column thumbnail" id="article_image" style="">
                         <img style="float:right;" class="" src="<?php echo e(asset('uploads/media/article/'.$item->image_thumb)); ?>" alt="">
                       </div>
                     </div>

                   </div>

                 <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    
    <div class="ui segment" id="social_segment">
      <div class="ui centered container grid" id="second_div" style="display: flex;">
        <div class="sixteen wide tablet mobile four wide computer column" id="social_div">
          <div class="ui fluid card" style="">
            <div class="content">
              <div class="ui stackable centered grid" style="margin-top:42px;">
                <div class="row" style="margin:10px;">
                  <div class="fb-page" data-href="https://www.facebook.com/ocs.afg/"  data-width="500" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ocs.afg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ocs.afg/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
                </div>
                <div class="row" style="margin:10px;">
                <a class="twitter-timeline" data-width="300" data-chrome="nofooter" data-height="200" href="https://twitter.com/OCS_AFG?ref_src=twsrc%5Etfw">Tweets by OCS_AFG</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile seven wide computer column" id="documents">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="<?php echo e(route('documents')); ?>" class="header title_font test" style=""><?php echo e(trans('home.reports_and_documents')); ?></a>
              <div class="ui items" style="margin-top: 11px !important">
                <?php if(sizeof($documents)!=0): ?>
                  <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($document->$title!=null): ?>
                      <div class="item <?php echo e(($document==$documents->last())?'no_border':''); ?>" style="direction:<?php echo e($rtl); ?>;border-bottom: 1px dashed #ddd;padding-bottom: 10px;">
                        <div class="ui tiny image icon" style="width: 12%">
                          <a target="_blank" href="<?php echo e(asset('uploads/documents_'.$lang.'/'.$document->$pdf)); ?>">
                          <img id="pdf_img" src="<?php echo e(asset('assets/img/pdf.png')); ?>">
                          </a>
                        </div>
                        <div class="top aligned content docs" style="padding-top: 7px;">
                          <a class="ui <?php echo e($dir); ?> floated small header title_font" target="_blank" href="<?php echo e(asset('uploads/documents_'.$lang.'/'.$document->$pdf)); ?>" style=""><?php echo e($document->$title); ?></a>
                          <div class="meta body_font" style="clear:both;" dir="rtl">

                            <i class="icon time"></i>
                            <?php echo e($jdate->detailedDate($document->$date,$lang)); ?></div>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile five wide computer column" id="videos">
          <div class="ui fluid card" style="">
            <div class="content" style="border:0;!">
              <a href="<?php echo e(route('videos')); ?>" class="header title_font test" style=""><?php echo e(trans('home.videos')); ?></a>
              <div class="ui stackable grid" style="margin-top:11px;">
                <?php if(sizeof($videos)): ?>
                  <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($video->$title!=null): ?>
                      <div class="row" style="">
                        <div class="column">
                          <div class="image"><iframe width="100%"  src="https://www.youtube.com/embed/<?php echo e($video->$url); ?>" frameborder="0" allowfullscreen></iframe></div>
                          <a href="<?php echo e(url('video_details/'.$video->id)); ?>" class="ui small header title_font" style="margin:0;padding:0;width:100%;"><?php echo e($video->$title); ?></a>
                          <div class="meta body_font" dir="" style="">
                            <i class="icon time"></i>
                            <?php echo e($jdate->detailedDate($video->$date,$lang)); ?></div>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   <?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

   <script>



      $(document).ready(function(){
        var width = $(window).width();
        if(width<=450){
          $(".news_image").removeClass('thumbnail');
          $(".news_image").addClass('image');

          $(".article_image").removeClass('thumbnail');
          $(".article_image").addClass('image');
        }
      });

   </script>
