<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Chief of Staff</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
  <?php if(sizeof($chief)==0 && Session::get('role')!='editor'): ?>
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
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $chief; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
       $lang='';
       if($value->desc_en != null)
         $lang = "en";
       else if($value->desc_dr != null)
         $lang = "dr";
       else if($value->desc_pa != null)
         $lang = "pa";

       $desc = "desc_".$lang;
        ?>
    <tr>
      <td><div style="width:60em" class="test"><?php echo $value->$desc; ?></div></td>
      <td>
      <form action="<?php echo e(route('the_chief.destroy', $value->id)); ?>" class="ui form" method="POST">
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
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</section>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>

  $("#lang").change(function(){
    var id = $(this).val();
    window.location = "<?php echo e(url('admin/set_session?lang=')); ?>"+id+"&route=<?php echo e(route('the_chief.create')); ?>";
  });

  $("#edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "<?php echo e(url('admin/set_session?lang=')); ?>"+lang+"&route=<?php echo e(url('admin/the_chief/')); ?>"+"/"+id+"/edit";
  });

</script>
