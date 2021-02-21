<?php $__env->startSection('main-content'); ?>
<!-- faq -->
	<section id="faq" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">FAQ</h5>
				</div>
				<!-- breadcrumb -->
				<div id="breadcrumb" class="breadcrumb-main-block">
					<div class="breadcrumb-block">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
							<li class="active">FAQ</li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb end -->
			</div>
			<div class="faq-page">
				<div class="coupon-dtl-outer">
					<div class="faq-main-block">
						<?php if(isset($faq_cat) && count($faq_cat) > 0): ?>
							<div class="row">
								<div class="col-lg-4">
							    <div class="faq-info d-none d-lg-block">
							    	<div class="card">
										  <h5 class="card-header">Need some help?</h5>
										  <div class="card-body">
												<ol>
													<li><a href="#tab0" class="">Contact US</a></li>
													<li><a href="#tab0" class="">How CouponDunia Works</a></li>
												</ol>
											 </div>
										</div>
							    </div>
							  </div>
							  <div class="col-lg-8">
									<ul class="faq-list list-group" >
							      	<?php $__currentLoopData = $faq_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      		<?php if(count($item->faq) > 0): ?>
							       			<li class="list-group-item d-flex justify-content-between align-items-center"><a href="#tab<?php echo e($key); ?>"><?php echo e($item->title); ?></a><span class="badge badge-primary badge-pill"><?php echo e(count($item->faq)); ?></span></li>
							       		<?php endif; ?>
							       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							      </ul>
							    <div class="tab-content panels-faq">
							    	<?php $__currentLoopData = $faq_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    		<?php if(count($item->faq) > 0): ?>
												<h5 class="p-4"><?php echo e($item->title); ?></h5>
									      <div class="tab-pane active" id="tab<?php echo e($key); ?>">
									        <div class="faq-block">
								            <div class="panel-group faq-panel" id="accordion" role="tablist" aria-multiselectable="true">
								            	<?php $__currentLoopData = $item->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $faq_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									              <div class="panel panel-default">
									              	<div class="card">
										                <div class="card-header" role="tab" id="headingWeb<?php echo e($key1); ?>">
										                  <h6 class="panel-title question-heading">
										                    <a role="button" data-toggle="collapse" data-target="#collapseWeb<?php echo e($key1); ?>" aria-expanded="<?php echo e($key1 == 0 ? 'true' : 'false'); ?>" aria-controls="collapseWeb<?php echo e($key1); ?>">
										                      <?php echo e($faq_item->question); ?>

										                      <span class="btn btn-primary faq-btn faq-btn-minus hidden-xs"><i class="fa fa-minus"></i></span>
										                      <span class="btn btn-primary faq-btn faq-btn-plus hidden-xs"><i class="fa fa-plus"></i></span>
										                    </a>
										                  </h6>
										                </div>
										              </div>
									                <div id="collapseWeb<?php echo e($key1); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingWeb<?php echo e($key1); ?>" data-parent="#accordion">
									                  <div class="card-body">
									                    <?php echo $faq_item->answer; ?>

									                  </div>
									                </div>
									              </div>
									            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								            </div>
								          </div>
									      </div>
								    	<?php endif; ?>
								    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							    </div>
							  </div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end forum -->
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>