<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Biography</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
  <?php if($bio==null && Session::get('role')!='editor'): ?>
    <div class="ui form">
      <div class="eight fields">
        <div class="field">
          <select name="lang" id="lang">
            <option value="dr">Create</option>
            <option value="dr">dari</option>
            <option value="pa">Pashto</option>
            <option value="en">English</option>
          </select>
        </div>
      </div>
    </div>
    <?php endif; ?>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Bio</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $bio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
       $lang='';
       if($value->bio_en != null)
         $lang = "en";
       else if($value->bio_dr != null)
         $lang = "dr";
       else if($value->bio_pa != null)
         $lang = "pa";

       $bio = "bio_".$lang;
        ?>
    <tr>
      <td><div style="width:60em" class="test"><?php echo $value->$bio; ?></div></td>
      <td style="width:20em;">
        <form action="<?php echo e(route('the_bio.destroy', $value->id)); ?>" class="ui form" method="POST">
            <?php echo e(method_field('DELETE')); ?>

            <?php echo e(csrf_field()); ?>

            <div class="small field" style="float:left;padding-right:5px;">
              <select name="edit_lang" id="edit_lang">
                  <option value="0">Edit...</option>
                  <option value="dr_<?php echo e($value->id); ?>">dari</option>
                  <option value="pa_<?php echo e($value->id); ?>">Pashto</option>
                  <option value="en_<?php echo e($value->id); ?>">English</option>
              </select>
            </div>
            <?php if(Session::get('role')=='admin'): ?>
            <button class="ui tiny button red " onclick="return confirm_submit()">Delete</button>
            <?php endif; ?>
        </form>
      </td>
    </tr>
    <tr>

    </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</section>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>

  $("#lang").change(function(){
    var id = $(this).val();
    window.location = "<?php echo e(url('admin/set_session?lang=')); ?>"+id+"&route=<?php echo e(route('the_bio.create')); ?>";
  });

  $("#edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "<?php echo e(url('admin/set_session?lang=')); ?>"+lang+"&route=<?php echo e(url('admin/the_bio/')); ?>"+"/"+id+"/edit";
  });

</script>
