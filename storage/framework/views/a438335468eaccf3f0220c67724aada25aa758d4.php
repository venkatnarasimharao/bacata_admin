<?php $__env->startSection('main-content'); ?>
<!-- breadcrumb -->
<section id="breadcrumb" class="breadcrumb-main-block">
	<div class="container">
		<div class="breadcrumb-block">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
        <li class="active">Reset Password</li>
      </ol>
    </div>
	</div>
</section>
<!-- breadcrumb end -->
<!-- forum -->
<section id="forum" class="coupon-page-main-block">
	<div class="container">
		<div class="forum-page-header">
			<div class="row">
				<div class="col-md-6">
					<div class="forum-page-heading-block">
						<h5 class="forum-page-heading">Reset Password</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="coupon-page-block categories-page">
			<div class="coupon-dtl-outer">
				<div class="row">
					<div class="offset-md-3 col-md-6">
						<?php if(session('status')): ?>
							<div class="alert alert-success">
								<?php echo e(session('status')); ?>

							</div>
						<?php endif; ?>

						<form class="login-form" method="POST" action="<?php echo e(route('password.email')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								<label for="email" class="control-label">E-Mail Address</label>
								<input placeholder="E-Mail Address" id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

								<?php if($errors->has('email')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
								<?php endif; ?>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>