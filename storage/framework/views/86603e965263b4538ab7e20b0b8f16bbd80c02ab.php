<?php $__env->startSection('main-content'); ?>
<!-- forums -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">Forums</h5>
				</div>
				<!-- breadcrumb -->
				<div id="breadcrumb" class="breadcrumb-main-block">
					<div class="breadcrumb-block">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
							<li class="active">Forums</li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb end -->
			</div>
			<div class="forum-main-page">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<div class="forums-main-page-block">
								<div class="row">								
									<?php if(isset($forum_list) && count($forum_list) > 0): ?>
										<?php $__currentLoopData = $forum_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-lg-6">
												<div class="forum-box-block text-center">
													<div class="forum-box-header">
														<h3 class="forum-title"><?php echo e($item->title); ?></h3>
													</div>
													<div class="forum-info">
														<ul>
															<li><?php echo e($item->category == 'g' ? $item->discussion->count() : $item->coupon->where('is_active','1')->count()); ?> Posts</li>
															
														</ul>
													</div>
													<div class="forum-dtl">
                						<td><?php echo substr(strip_tags($item->detail), 0, 250); ?>..</td>
													</div>
													<div class="forum-box-footer">
														<div class="row">
															<div class="col-md-6">
																<div class="forum-box-btn">
																	<a href="<?php echo e(url('forum-dtl/'.$item->slug)); ?>" class="btn btn-primary" title="Visit Forum">Visit Forum</a>
																</div>
															</div>
															<div class="col-md-6">
																<div class="forum-box-btn">
																	<a href="<?php echo e(url('submit')); ?>" class="btn btn-primary" title="Add New Post">Add New Post</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
      					<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end forum -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>