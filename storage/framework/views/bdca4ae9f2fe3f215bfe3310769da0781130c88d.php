<?php $__env->startSection('main-content'); ?>
	<!-- Login -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">Login</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
	          <li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
	          <li class="active">Login</li>
	        </ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="forum-page-header">
				<div class="row">
					<div class="offset-md-2 col-md-8">
						<div class="login-page-form">
							<div class="forum-page-heading-block">
								<h5 class="forum-page-heading">Login</h5>
							</div>
							<form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
								<?php echo e(csrf_field()); ?>


								<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
									
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address" required autofocus>

									<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
									<?php endif; ?>
								</div>

								<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
									

									<input id="password" type="password" class="form-control" name="password"  placeholder="Password" required>

									<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
									<?php endif; ?>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											
										</div>							
					      		<div class="col-md-6 text-right">
											<a href="<?php echo e(route('password.request')); ?>" title="Forgot Password?">
											Forgot Your Password?
											</a>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</div>

								<div class="or-text text-center">Or</div>
				      		<div class="form-group">
					      		<div class="row">
					      			<div class="col-md-6">
					      				<div class="form-group">
							      			<a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-primary fb-btn" title="Login With Facebook"><i class="fab fa-facebook-f"></i>Login With Facebook</a>
							      		</div>
					      			</div>
					      			<div class="col-md-6">
					      				<div class="form-group">
							      			<a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-primary gplus-btn" title="Login With Google"><i class="fab fa-google"></i>Login With Google</a>
							      		</div>
					      			</div>
					      		</div>
					      	</div>
				      		<div class="form-group text-right">
				      			<a href="<?php echo e(route('register')); ?>">Don't have an account? Register Now</a>
				      		</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>