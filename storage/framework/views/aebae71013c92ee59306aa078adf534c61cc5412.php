<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/coupon')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Deal Or Coupon</h4> 
    <?php echo Form::open(['method' => 'POST', 'action' => 'CouponController@store', 'files' => true]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-12">
           <div class="bootstrap-checkbox form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
            <div class="row">
              <div class="col-md-4">
                <h5 class="bootstrap-switch-label">Select Coupon Or Deal</h5>
              </div>
              <div class="col-md-2 pad-0">
                <div class="make-switch">
                  <?php echo Form::checkbox('type', 1,1, ['class' => 'bootswitch', 'id' => 'CouponCheckBox', "data-on-text"=>"Coupon", "data-off-text"=>"Deal", "data-size"=>"small"]); ?>

                </div>
              </div>
            </div>
            <div class="col-md-12">
              <small class="text-danger"><?php echo e($errors->first('type')); ?></small>
            </div>
          </div>
        </div>
        <div class="col-md-6">                              
          
          <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
            <?php echo Form::label('user_id', 'Select User*'); ?> - <p class="inline info">Please select user name</p>
            <?php echo Form::select('user_id', $all_users, null, ['class' => 'form-control select2', 'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('user_id')); ?></small>
          </div>            
          <div class="form-group<?php echo e($errors->has('forum_category_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('forum_category_id', 'Select Forum Category*'); ?> - <p class="inline info">Please select forum type</p>
              <?php echo Form::select('forum_category_id', $cat_coupon, null, ['class' => 'form-control select2', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('forum_category_id')); ?></small>
          </div>  
          <div class="form-group<?php echo e($errors->has('store_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('store_id', 'Select Store*'); ?> - <p class="inline info">Please select store</p>
              <?php echo Form::select('store_id', $all_store, null, ['class' => 'form-control select2', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('store_id')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('category_id', 'Select Category*'); ?> - <p class="inline info">Please select category</p>
              <?php echo Form::select('category_id', $all_category, null, ['class' => 'form-control select2', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('category_id')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Deal Name/Title*'); ?> - <p class="inline info">Please enter deal name</p>
              <?php echo Form::text('title', null, ['class' => 'form-control', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div class="summernote-main form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
              <?php echo Form::label('detail', 'Description*'); ?> - <p class="inline info">Please enter deal description</p>
              <?php echo Form::textarea('detail', null, ['id' => 'summernote-main', 'class' => 'form-control', 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('image', 'Deal Image'); ?> 
            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Coupon Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose a File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
          </div>          
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
          <div class="clear-both"></div>
        </div>  
        <div class="col-md-6">

          <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
              <?php echo Form::label('price', 'Price'); ?> - <p class="inline info">Please enter deal price</p>
              <?php echo Form::text('price', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('discount') ? ' has-error' : ''); ?>">
              <?php echo Form::label('discount', 'Discount'); ?> - <p class="inline info">Please enter discount on deal</p>
              <?php echo Form::text('discount', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('discount')); ?></small>
          </div>
          <div id="ccode" class="form-group<?php echo e($errors->has('code') ? ' has-error' : ''); ?>">
              <?php echo Form::label('code', 'Coupon Code*'); ?> - <p class="inline info">Please enter coupon code</p>
              <?php echo Form::text('code', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('code')); ?></small>
          </div> 
          <div class="form-group<?php echo e($errors->has('link') ? ' has-error' : ''); ?>">
              <?php echo Form::label('link', 'Deal URL/Link'); ?> - <p class="inline info">Please enter deal url</p>
              <?php echo Form::text('link', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('link')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('expiry') ? ' has-error' : ''); ?>">
              <?php echo Form::label('expiry', 'Expiry Date'); ?> - <p class="inline info">Please enter deal expiry date</p>
              <?php echo Form::text('expiry', null, ['class' => 'form-control date-picker']); ?>

              <small class="text-danger"><?php echo e($errors->first('expiry')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('is_featured') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_featured', 'Featured'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_featured', 1, 1, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_featured')); ?></small>
            </div>
          </div> 
          <div class="form-group<?php echo e($errors->has('is_exclusive') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_exclusive', 'Deal Exclusive'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_exclusive', 1, 1, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_exclusive')); ?></small>
            </div>
          </div> 
          
          <div class="form-group<?php echo e($errors->has('is_verified') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_verified', 'Verify'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_verified', 0, null, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_verified')); ?></small>
            </div>
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
        </div>
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(document).ready(function () {
    $('input[type="checkbox"]').change(function(){
        this.value = (Number(this.checked));
    });

    var loadstate = $('#CouponCheckBox').bootstrapSwitch('state');
    if(loadstate == false){                                   
      $("#ccode").hide();
    }
    else{ 
      $("#ccode").show();
    }
    $('#CouponCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {     
      var urlLike = '<?php echo e(url('dropdown')); ?>';   
      var up = $('#forum_category_id').empty();
      var state = state; 
          console.log(state);  
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:"GET",
        url: urlLike,
        data: {state: state},
        success:function(data){   
          console.log(data);
          $.each(data, function(id, title) {
            up.append($('<option>', {value:id, text:title}));
          });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
        }
      });
      if(state == false){                                   
        $("#ccode").hide();
      }
      else{ 
        $("#ccode").show();
      }
      });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>