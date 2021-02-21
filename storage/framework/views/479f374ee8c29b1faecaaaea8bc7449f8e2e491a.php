<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/user')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create User</h4>
    <div class="admin-form-block z-depth-1">          
      <?php echo Form::open(['method' => 'POST', 'action' => 'UserController@store', 'files' => true]); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
              <?php echo Form::label('name', 'Enter Name'); ?> 
              <p class="inline info"> - Please enter your name</p>
              <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']); ?>

              <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>         
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::label('email', 'Enter Your Email ID*'); ?> - <p class="inline info">Please enter your email</p>
              <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
              <?php echo Form::label('mobile', 'Enter Your Mobile Number*'); ?> - <p class="inline info">Please enter your mobile number</p>
              <?php echo Form::text('mobile', null, ['class' => 'form-control', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('password', 'Password'); ?>

              <p class="inline info"> - Please enter your password</p>
              <?php echo Form::password('password', ['class' => 'form-control', 'required' => 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('confirm_password', 'Confirm Password'); ?>

              <p class="inline info"> - Please enter your password again</p>
              <?php echo Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('confirm_password')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('is_admin') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_admin', 'Administrator'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">								
                    <?php echo Form::checkbox('is_admin', 1, 0, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_admin')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
              <?php echo Form::label('image', 'User Image'); ?> - <p class="inline info">Help block text</p>
              <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="User Image">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
            </div>
          </div>
          <div class="col-md-6">            
            <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
              <?php echo Form::label('gender', 'Choose Your Gender'); ?>

              <?php echo Form::select('gender', ['m' => 'Male', 'f' => 'Female'], null, ['class' => 'form-control select2']); ?>

              <small class="text-danger"><?php echo e($errors->first('gender')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
              <?php echo Form::label('dob', 'Date of Birth'); ?> - <p class="inline info">Please enter your dob</p>
              <?php echo Form::date('dob', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
              <?php echo Form::label('website', 'Enter Your Website'); ?> - <p class="inline info">Please enter website link if any</p>
              <?php echo Form::text('website', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('website')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
              <?php echo Form::label('address', 'Enter Your Address'); ?> - <p class="inline info">Please enter your address</p>
              <?php echo Form::textarea('address', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('brief') ? ' has-error' : ''); ?>">
              <?php echo Form::label('brief', 'Biography'); ?> - <p class="inline info">Please enter about you</p>
              <?php echo Form::textarea('brief', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('brief')); ?></small>
            </div> 
          </div>
          <div class="col-md-12">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info">Reset</button>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
            <div class="clear-both"></div>
          </div>
        </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function(){
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>