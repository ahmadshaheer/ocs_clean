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
    direction:<?php echo e($rtl); ?>;
    float: right;
    text-align: right;
  }
  input{
    direction: <?php echo e($rtl); ?>;
  }
  </style>
    
    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border"><?php echo e(trans('menu.advanced_search')); ?></h2>

              <form class="ui form" method="post" action="<?php echo e(url('get_search')); ?>">
                  <div class="field">
                      <div class="field">
                      <label><?php echo e(trans('search.search')); ?>*</label>
                        <input type="text" name="search" placeholder="<?php echo e(trans('search.search')); ?>" required="required">
                      </div>
                       <div class="field">
                       <label><?php echo e(trans('search.search_in')); ?></label>
                        <select style="direction:<?php echo e($rtl); ?>;" name="type">
                          <option value="word" style="direction:<?php echo e($rtl); ?>;"><?php echo e(trans('search.exact_word')); ?></option>
                          <option value="all" selected="selected" style="direction:<?php echo e($rtl); ?>;"><?php echo e(trans('search.all_words')); ?></option>
                        </select>
                      </div>
                  </div>
                  <div class="field">
                    <label class="ui header title_font"><?php echo e(trans('search.search_date')); ?></label>
                    <div class="field">
                      <label><?php echo e(trans('search.from')); ?></label>
                        <input type="date" name="from">
                      </div>
                       <div class="field">
                       <label><?php echo e(trans('search.to')); ?></label>
                       <input type="date" name="to">
                      </div>
                  </div>
                  <label class="ui header"><?php echo e(trans('search.search_inside')); ?></label>
                  <div class="ui three fields" style="direction:ltr;">
                  <div class="field">
                 <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="decree">
                    <label><?php echo e(trans('menu.decrees')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="orders">
                    <label><?php echo e(trans('menu.orders')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="statements">
                    <label><?php echo e(trans('menu.statements')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="mesasages">
                    <label><?php echo e(trans('menu.messages')); ?></label>
                  </div>
                </div>
                </div>
                  <div class="field">
                 <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="words">
                    <label><?php echo e(trans('menu.words')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="domestic">
                    <label><?php echo e(trans('menu.trips')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="news">
                    <label><?php echo e(trans('menu.news')); ?></label>
                  </div>
                </div>
                </div>
                <div class="field">
                 <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="articles">
                    <label><?php echo e(trans('menu.articles')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="infographic">
                    <label><?php echo e(trans('menu.infographics')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="album">
                    <label><?php echo e(trans('menu.photo_albums')); ?></label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui checkbox">
                    <input type="checkbox" name="search_in[]" checked="checked" value="video">
                    <label><?php echo e(trans('menu.videos')); ?></label>
                  </div>
                </div>
                </div>
                </div>
                <?php echo e(csrf_field()); ?>

              <button class="ui button" type="submit"><?php echo e(trans('search.search')); ?></button>
            </form>

            </div>
          </div>
        </div>

      </div>
    </div>
    

<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $("input[name=search]").focusout(function(){
      var value = $(this).val();
      var clear = value.replace(/(<([^>]+)>)/ig,"");
      $(this).val(clear);
    });
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
