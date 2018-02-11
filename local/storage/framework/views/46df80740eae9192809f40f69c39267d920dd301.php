<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Users</h2>
        </div>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>License Number</th>
      <th>Type</th>
      <th>Coverage area</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php $__currentLoopData = $expert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th><?php echo $i++; ?></th>
      <td><div class="test"><?php echo e($user->name); ?></div></td>
      <td><div class="test"><?php echo e($user->license_number); ?></div></td>
      <td><div class="test"><?php echo e($user->type); ?></div></td>
      <td><div class="test"><?php echo e($user->coverage_area); ?></div></td>
      <td>
      <form action="" method="POST">
          <?php echo e(method_field('DELETE')); ?>

          <?php echo e(csrf_field()); ?>

          <button class="ui tiny label red " onclick="return confirm_submit()">Delete</button>
      </form>
     
        
      </td>
    </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</section>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>