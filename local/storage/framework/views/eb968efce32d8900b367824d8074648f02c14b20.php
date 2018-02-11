<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
    .head {
        font-size:16px;
        font-weight: bold;

    }
</style>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">

                        <?php if(Session::has('user_exists')): ?>
                            <div class="ui error message">
                              <div class="head">
                                <?php echo e(Session::get('user_exists')); ?>

                              </div>
                              <ul class="list">
                                <li>Login as <?php echo e(Session::get('email_exists')); ?>!</li>
                                <li>Choose another Email!</li>
                              </ul>
                            </div>
                        <?php elseif(Session::has('bad_match')): ?>
                            <div class="ui error message">
                              <div class="head">
                                <?php echo e(Session::get('bad_match')); ?>

                              </div>
                              <ul class="list">
                                <li>Re-enter Your Credintials!</li>
                              </ul>
                            </div>
                        <?php endif; ?>

                        <header class="panel-heading">
                           Register User
                        </header>
                            <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                            <div class="col-md-5">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Role</label>

                            <div class="col-md-5">
                             <select name="role" class="form-control">
                                    <option value="editor">Editor</option>
                                    <option value="author">author</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                          </div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default"  type="button">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                    </section>
        </div>

</section>

<?php echo $__env->make('admin.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
