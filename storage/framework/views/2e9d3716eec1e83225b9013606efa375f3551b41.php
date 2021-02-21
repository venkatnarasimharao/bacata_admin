<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/blog')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Blog</h4> 
    <?php echo Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'files' => true]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-8">
          <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('user_id', 'Select User*'); ?> - <p class="inline info">Please select user name</p>
              <?php echo Form::select('user_id', $all_user, null, ['class' => 'form-control select2','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('user_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Blog Title*'); ?> - <p class="inline info">Please enter blog heading</p>
              <?php echo Form::text('title', null, ['class' => 'form-control', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('tag') ? ' has-error' : ''); ?>">
              <?php echo Form::label('tag', 'Tag*'); ?> - <p class="inline info">Please select or create new tags using comma or space</p>
              <?php echo Form::select('tag[]', $tags, $ta, ['class' => 'form-control tag-select', 'multiple' => 'multiple','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('tag')); ?></small>
          </div>       
          <div class="summernote-main form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
            <?php echo Form::label('desc', 'Description*'); ?> - <p class="inline info">Please enter blog detail</p>
            <?php echo Form::textarea('desc', null, ['id' => 'summernote-main','class' => 'form-control' ,'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('desc')); ?></small>
          </div>                                        
          <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_active', 'Active Status'); ?>

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
          <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('image', 'Image'); ?> - <p class="inline info">Help block text</p>
            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Blog Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
          </div>    
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          <div class="clear-both"></div>
        </div>  
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>