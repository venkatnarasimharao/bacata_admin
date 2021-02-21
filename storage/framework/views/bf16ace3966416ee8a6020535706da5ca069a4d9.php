<?php $__env->startSection('title',"$pages->title"); ?>
<?php $__env->startSection('custom-meta'); ?>
<meta name="description" content="<?php echo e($pages->title ? $pages->title : ''); ?>" />
<?php $__env->startSection('main-content'); ?>
<!-- Page -->
	<section id="about" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading"><?php echo e($pages->title); ?></h5>
				</div>
				<!-- breadcrumb -->
				<div id="breadcrumb" class="breadcrumb-main-block">
					<div class="breadcrumb-block">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
							<li class="active"><?php echo e($pages->title); ?></li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb end -->
			</div>
			<div class="about-us-page">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
      					<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="about-us-main-block page-block">
								<div class="about-section">
									<?php echo $pages->body; ?>

								</div>
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