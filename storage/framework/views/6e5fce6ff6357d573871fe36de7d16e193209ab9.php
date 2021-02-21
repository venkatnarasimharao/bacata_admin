<?php $__env->startSection('main-content'); ?>
<!-- blog -->
	<section id="account" class="coupon-page-main-block account-page-main">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading"><?php echo e($tag->title); ?> Blogs</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
						<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
						<li class="active">Blogs</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="account-page">
				<div class="blog-page-outer blog-page-two">
					<div class="blog-page-main-block">
						<div class="row">
							<?php if(isset($blogs) && count($blogs)>0): ?>
								<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-4 col-md-6">
										<div class="blog-post-main">
											<div class="blog-img">
												<a href="<?php echo e(url('blog-dtl/'.$blog->uni_id.'/'.$blog->slug)); ?>" title="Blog Post"><img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid" alt="Blog Post"></a>
											</div>
											<div class="blog-post-dtl">
												<h6 class="blog-post-heading"><a href="<?php echo e(url('blog-dtl/'.$blog->uni_id.'/'.$blog->slug)); ?>" title="Blog Post"><?php echo e($blog->title); ?></a></h6>
												<div class="blog-post-tags">
													<ul>
														<li><i class="far fa-clock"></i><?php echo e(date('d F Y', strtotime($blog->created_at))); ?></li>
														<li><i class="far fa-user"></i><a href="<?php echo e(url('profile/'.$blog->users->id)); ?>" title="<?php echo e($blog->users->name); ?>"><?php echo e($blog->users->name); ?></a></li>
														<li><i class="far fa-comments"></i>119</li>
													</ul>
												</div>
												<div class="blog-post-text">
													<p><?php echo \Illuminate\Support\Str::words($blog->desc,170,'...'); ?></p>
												</div>
												<div class="blog-post-link">
													<a href="<?php echo e(url('blog-dtl/'.$blog->uni_id.'/'.$blog->slug)); ?>" title="Read More">Read More</a>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<nav aria-label="blog-post-pagination">
						  <ul class="pagination">
				        <?php echo e($blogs->links()); ?>                    
				      </ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end blog -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>