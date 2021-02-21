<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/faq')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Faq</h4> 
    <?php echo Form::model($faq, ['method' => 'PATCH', 'action' => ['FaqController@update', $faq->id]]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-12">
          <div class="form-group<?php echo e($errors->has('faq_category_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('faq_category_id', 'Select a Category'); ?> - <p class="inline info">Please select a faq catergory</p>
              <?php echo Form::select('faq_category_id', $categories, null, ['class' => 'form-control select2']); ?>

              <small class="text-danger"><?php echo e($errors->first('faq_category_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
              <?php echo Form::label('question', 'Faq Question'); ?> - <p class="inline info">Please enter a question</p>
              <?php echo Form::text('question', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('question')); ?></small>
          </div>
          <div class="summernote-main form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
            <?php echo Form::label('answer', 'Faq Answer'); ?> - <p class="inline info">Please select a answer</p>
            <?php echo Form::textarea('answer', null, ['id' => 'summernote-main', 'class' => 'form-control']); ?>

            <small class="text-danger"><?php echo e($errors->first('answer')); ?></small>
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