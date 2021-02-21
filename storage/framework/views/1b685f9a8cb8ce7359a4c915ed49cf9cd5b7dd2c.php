<?php if(isset($results) && count($results)>0): ?>
	<div class="row">
  	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  		<?php if($item->type == 'd'): ?>
				<div class="col-lg-4 col-md-6">
					<div class="coupon-main-block coupon-single">
						<div class="coupon-dtl-block text-center">
							<div class="row">
								<div class="coupon-dtl">
									<div class="coupon-img">
										<a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><img src="<?php echo e($item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>"></a>
									</div>
									<h6 class="coupon-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title, 60)); ?></a></h6>
									<div class="coupon-expiry">
										<?php if($item->expiry): ?>
											Expires on <?php echo e(date('d F Y', strtotime($item->expiry))); ?>

										<?php endif; ?>
									</div>
									
									<div class="grab-coupon-btn">
										<a href="#" class="btn btn-primary" title="Get Deal" data-toggle="modal" data-target="#coupon-id-<?php echo e($key); ?>">Grab Deal</a>
									</div>
								</div>
							</div>
						</div>
						<div class="coupon-popup">
							<div class="modal fade login-form-main" id="coupon-id-<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="CouponTitle<?php echo e($key); ?>" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content text-center">
							      <div class="login-header">
							        <h5 class="coupon-disc-title" id="CouponTitle<?php echo e($key); ?>">Deal Detail</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true" class="close-btn">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<div class="coupon-popup-dtl">
							      		<div class="coupon-popup-header">
							      			<h6 class="coupon-popup-title">Click here to activate the deal</h6>
							      		</div>
							      		<div class="coupon-popup-btn">
						      				<a href="<?php echo e($item->link != Null ? $item->link : $item->store->link); ?>" title="<?php echo e($item->store->title); ?>" target="_blank" data-id="<?php echo e($item->id); ?>" class="grab-now btn btn-primary">Grab Deal</a>
							      		</div>
							      	</div>
						      		<div class="coupon-footer coupon-modal-footer">
												<div class="coupon-footer-dtl">
													<ul>
											  		<?php														
															$facebook = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->facebook();
															$twitter = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->twitter();
															$gplus = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->gplus();
															$linkedin = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->linkedin();
															$pinterest = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->pinterest();
														?>
														<li>
															<?php if($item->is_verified == 1): ?>
																<i class="fas fa-check clr-green"></i>Verified Deal
															<?php else: ?>
																Unverified
															<?php endif; ?>
														</li>
														<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></li>
														<li><i class="fas fa-users clr-purple"></i><?php echo e($item->user_count); ?> People Used</li>
														<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Deal">Share Deal</a>
															<div class="social top center networks-5 ">
														    <a class="fbtn share facebook" href="<?php echo e($facebook); ?>"><i class="fa fa-facebook"></i></a> 
														    <a class="fbtn share gplus" href="<?php echo e($gplus); ?>"><i class="fa fa-google-plus"></i></a> 
														    <a class="fbtn share twitter" href="<?php echo e($twitter); ?>"><i class="fa fa-twitter"></i></a> 
														    <a class="fbtn share pinterest" href="<?php echo e($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="<?php echo e($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
															</div>
														</li>
													</ul>
												</div>
											</div>
							      </div>
							    </div>
							  </div>
							</div>
						</div>
						<div class="coupon-footer">
							<div class="coupon-footer-dtl text-center">
								<ul>
									<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Deal"> Share Deal</a>
										<div class="social top center networks-5 ">
									    <a class="fbtn share facebook" href="<?php echo e($facebook); ?>"><i class="fa fa-facebook"></i></a> 
									    <a class="fbtn share gplus" href="<?php echo e($gplus); ?>"><i class="fa fa-google-plus"></i></a> 
									    <a class="fbtn share twitter" href="<?php echo e($twitter); ?>"><i class="fa fa-twitter"></i></a> 
									    <a class="fbtn share pinterest" href="<?php echo e($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
									    <a class="fbtn share linkedin" href="<?php echo e($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php elseif($item->type == 'c'): ?>
				<div class="col-lg-4 col-md-6">
					<div class="coupon-main-block coupon-single">
						<div class="coupon-dtl-block text-center">
							<div class="row">
								<div class="coupon-dtl">
									<div class="coupon-img">
										<a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
											<img src="<?php echo e($item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
										</a>
									</div>
									<h6 class="coupon-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title, 60)); ?></a></h6>
									<div class="coupon-expiry">
										<?php if($item->expiry): ?>
											Expires on <?php echo e(date('d F Y', strtotime($item->expiry))); ?>

										<?php endif; ?>
									</div>
									<div class="grab-coupon-block">
										<div class="grab-coupon-btn coupon-btn-outer">
											<a href="#" class="btn btn-primary cpn-btn" title="Get Coupon" data-toggle="modal" data-target="#coupon-id-<?php echo e($key); ?>"></a>
											<a href="#" data-toggle="modal" data-target="#coupon-id-<?php echo e($key); ?>">
												<div class="cpn-btn-shape"></div>
												<div class="s1">
													<div class="t1"></div>
													<div class="t1">
														<div class="t2"></div>
													</div>
												</div>
											</a>
											<span><a href="#" data-toggle="modal" data-target="#coupon-id-<?php echo e($key); ?>">Get Coupon</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="coupon-popup">
							<div class="modal fade login-form-main" id="coupon-id-<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="CouponTitle<?php echo e($key); ?>" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content text-center">
										<div class="login-header">
											<h5 class="login-title" id="CouponTitle<?php echo e($key); ?>">Coupon Detail</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true" class="close-btn">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="coupon-popup-dtl">
												<div class="coupon-popup-header">
													<h6 class="coupon-popup-title">Copy below code and visit store</h6>
												</div>
												<div class="coupon-code">
													<div class="row no-gutters">
														<div class="col-md-8">
															<div class="coupon-code-outer">
																<h4 id="cpn-<?php echo e($key); ?>" class="coupon-txt"><?php echo e($item->code); ?></h4>
															</div>
														</div>
														<div class="col-md-4">
															<div class="coupon-cpy-btn">
																<button class="btn btn-primary" title="Copy Coupon Code" data-clipboard-target="#cpn-<?php echo e($key); ?>">Copy Code</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="coupon-popup-btn">
					      				<a href="<?php echo e($item->link != Null ? $item->link : $item->store->link); ?>" title="<?php echo e($item->store->title); ?>" target="_blank" data-id="<?php echo e($item->id); ?>" class="grab-now btn btn-primary">Visit Store</a>
											</div>
											<div class="coupon-footer">
												<div class="coupon-footer-dtl">
													<ul>
														<?php														
															$facebook = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->facebook();
															$twitter = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->twitter();
															$gplus = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->gplus();
															$linkedin = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->linkedin();
															$pinterest = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->pinterest();
														?>
														<li>
															<?php if($item->is_verified == 1): ?>
																<i class="fas fa-check clr-green"></i>Verified Coupon
															<?php else: ?>
																Unverified
															<?php endif; ?>
														</li>
														<li><i class="fas fa-users clr-orange"></i><?php echo e($item->user_count); ?> People Used</li>
														<li class="share-button sharer clr-blue"><i class="fas fa-share-alt"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
															<div class="social top center networks-5 ">
														    <a class="fbtn share facebook" href="<?php echo e($facebook); ?>"><i class="fa fa-facebook"></i></a> 
														    <a class="fbtn share gplus" href="<?php echo e($gplus); ?>"><i class="fa fa-google-plus"></i></a> 
														    <a class="fbtn share twitter" href="<?php echo e($twitter); ?>"><i class="fa fa-twitter"></i></a> 
														    <a class="fbtn share pinterest" href="<?php echo e($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="<?php echo e($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="coupon-footer">
							<div class="coupon-footer-dtl text-center">
								<ul>
									<li class="share-button sharer"><i class="fas fa-share-alt"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
										<div class="social top center networks-5 ">
									    <a class="fbtn share facebook" href="<?php echo e($facebook); ?>"><i class="fa fa-facebook"></i></a> 
									    <a class="fbtn share gplus" href="<?php echo e($gplus); ?>"><i class="fa fa-google-plus"></i></a> 
									    <a class="fbtn share twitter" href="<?php echo e($twitter); ?>"><i class="fa fa-twitter"></i></a> 
									    <a class="fbtn share pinterest" href="<?php echo e($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
									    <a class="fbtn share linkedin" href="<?php echo e($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="forum-footer">
		<div class="row">
			<div class="col-lg-4 col-md-8">
				<nav aria-label="forum-pagination">
				  <ul class="pagination filter-pagination">
			        <?php echo e($results->links()); ?>                    
			    </ul>
				</nav>
			</div>
			<div class="col-lg-4 ml-lg-auto col-md-4 d-none d-lg-block">
				<div class="new-topic-btn">
					<a href="<?php echo e(url('submit')); ?>" title="Post New Topic" class="btn btn-primary">Submit New Coupon</a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<script>
	$(document).ready(function(){
		$('.pagination li a').addClass('page-link');
		$('.pagination li span').addClass('page-link');
		$('.pagination li').addClass('page-item');
	});
</script>