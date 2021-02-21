<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/slider')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> EDIT Home Banner</h4>
    <?php if($slider): ?>
    <?php echo Form::model($slider, ['method' => 'PATCH', 'action' => ['SliderController@update', $slider->id], 'files' => true]); ?>

        <div class="row admin-form-block z-depth-1">
          <div class="col-md-6">
            
            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Banner Title'); ?>

                <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('heading') ? ' has-error' : ''); ?>">
                <?php echo Form::label('heading', 'Banner Alt'); ?>

                <?php echo Form::text('heading', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('heading')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('link') ? ' has-error' : ''); ?>">
                <?php echo Form::label('link', 'Banner Link'); ?>

                <?php echo Form::text('link', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('link')); ?></small>
            </div>

          
            
            
            
          
             <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_active', 'Status'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">
                    <?php echo Form::checkbox('is_active', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_active')); ?></small>
              </div>
            </div>
            <button type="submit" class="btn btn-block btn-success">Save Slider</button>
            <div class="clear-both"></div>
          </div>
          <div class="col-md-offset-1 col-md-5">
            <img src="<?php echo e(asset('images/slider/'.$slider->image)); ?>" width="300">
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
              <?php echo Form::label('image', 'Slider Image'); ?> - <p class="inline info">Help block text</p>
              <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Slider Image">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
            </div>
          </div>
        </div>
      <?php echo Form::close(); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>