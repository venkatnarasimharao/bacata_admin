<?php $__env->startSection('main-content'); ?>
<!-- store conternt start -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">Stores</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
						<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
						<li class="active">Stores</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="coupon-page-block categories-page">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
								<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<?php if(isset($store_list) && count($store_list) > 0): ?>
								<div class="categories-main-block">
									<div class="cat-block text-center">
										<div class="row">
											<?php $__currentLoopData = $store_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="col-lg-4 col-sm-6">
													<div class="category-block">
														<a href="<?php echo e(url('store-dtl/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
															<div class="cat">
																<div class="cat-icon">
																	<img src="<?php echo e(asset('images/store/'.$item->image)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
																</div>
																<h5 class="cat-title"><?php echo e($item->title); ?></h5>
															</div>
														</a>
													</div>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end forum -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>