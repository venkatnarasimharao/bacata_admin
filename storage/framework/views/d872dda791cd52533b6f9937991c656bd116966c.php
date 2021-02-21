<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/category')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Category</h4> 
    <?php echo Form::open(['method' => 'POST', 'action' => 'CategoryController@store', 'files' => true]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Category Name / Title'); ?> - <p class="inline info">Like electronics, clothing</p>
              <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('icon') ? ' has-error' : ''); ?> currency-symbol-block">
            <?php echo Form::label('icon', 'Category Icon / Symbol'); ?>

            <p class="inline info"> - Please select catgeory symbol or category image</p>
              <div class="input-group">
                <?php echo Form::text('icon', null, ['class' => 'form-control category-icon-picker']); ?>

                <span class="input-group-addon simple-input"><i class="glyphicon glyphicon-th-large"></i></span>
              </div>
            <small class="text-danger"><?php echo e($errors->first('icon')); ?></small>
          </div>
          <h6 class="text-center"><b>OR</b></h6>
          <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('image', 'Category Image'); ?> 
            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Category Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose a File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_active', 'Status'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_active', 1, 1, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_active')); ?></small>
            </div>
          </div>          
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
          <div class="clear-both"></div>
        </div>  
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>