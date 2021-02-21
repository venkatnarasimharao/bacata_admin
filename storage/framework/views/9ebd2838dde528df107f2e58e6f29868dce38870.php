<?php if(isset($results) && count($results) > 0): ?>
	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($filter_page == '0'): ?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal-block recent-deals">
					<div class="deal-img">
						<a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><img src="<?php echo e($item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)); ?>" class="img-fluid" alt="Deal"></a>
					</div>
					<div class="deal-dtl">
						<?php if($item->is_featured == 1): ?>
							<div class="deal-badge red-badge">Featured</div>
						<?php elseif($item->is_exclusive == 1): ?>
							<div class="deal-badge green-badge">Exclusive</div>
						<?php endif; ?>
						<div class="deal-merchant"><?php echo e($item->store->title); ?>

						</div>
						<h6 class="deal-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title, 60)); ?></a></h6>
						<div class="deal-price-block">
							<div class="row">
								<div class="col-6">
									<div class="deal-price">
										<?php if($item->price): ?>
											<sup><i class="<?php echo e($settings->currency); ?>" aria-hidden="true"></i></sup> <?php echo e($item->price); ?>

										<?php else: ?>
											<?php echo e($item->discount ? $item->discount."% Off" : ''); ?>

										<?php endif; ?>
									</div>
									
								</div>
								<div class="col-6 text-right">
									<div class="rating">
	                  <div class="set-rating" data-rateyo-rating="<?php echo e($item->rating>0 ? $item->rating : '0'); ?>"></div>
	                </div>
								</div>
							</div>
						</div>
					</div>
					<div class="deal-footer">
						<div class="row">
							<div class="col-5">
								<div class="comments-icon">
									<i class="far fa-comments"></i><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="Comments"><?php echo e($item->comments()->count()); ?></a>
								</div>
								<div class="comments-icon">
									<i class="fa fa-eye"></i><?php echo e($item->views()->count()); ?>

								</div>
							</div>
							<div class="col-7">
								<div class="deal-user">
									<div class="row">
										<div class="col-4">
											<div class="user-img">
												<a href="<?php echo e(url('profile/'.$item->user_id)); ?>" title="User"><img src="<?php echo e(asset('images/user/'.$item->user->image)); ?>" class="img-fluid" alt="User"></a>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="user-name">
												<a href="<?php echo e(url('profile/'.$item->user_id)); ?>" title="User"><?php echo e(strtok($item->user->name,' ')); ?></a>
											</div>
											<div class="deal-time"><?php echo e($item->created_at->diffForHumans()); ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="coupon-main-block deal-list-block">
				<div class="coupon-dtl-block">
					<div class="row">
						<div class="col-lg-3">
							<div class="deal-img">
								<a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><img src="<?php echo e($item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)); ?>" class="img-fluid" alt="Deal"></a>
							</div>
						</div>
						<div class="col-lg-6 border-l">
							<div class="coupon-dtl">
								<h5 class="coupon-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title, 60)); ?></a></h5>
								<div class="coupon-short-disc">
									<p><?php echo substr(strip_tags($item->detail), 0, 100); ?>..</p>
								</div>
								<div class="coupon-expiry">
									<?php if($item->expiry): ?>
										Ends on <?php echo e(date('d F Y', strtotime($item->expiry))); ?>

									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 text-center">
							<div class="grab-coupon-block">
								<div class="deal-price">
									<?php if($item->price): ?>
										<sup><i class="<?php echo e($settings->currency); ?>" aria-hidden="true"></i></sup> <?php echo e($item->price); ?>

									<?php endif; ?>
								</div>
								<div class="deal-disc"><?php echo e($item->discount ? $item->discount."% Off" : ''); ?></div>
								<div class="grab-coupon-btn">
									<a href="<?php echo e($item->link != Null ? $item->link : $item->store->link); ?>" title="<?php echo e($item->store->title); ?>" target="_blank" data-id="<?php echo e($item->id); ?>" class="grab-now btn btn-primary">Grab Now</a>
								</div>
								<div class="deal-time"><i class="far fa-clock"></i><?php echo e($item->created_at->diffForHumans()); ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="coupon-footer">
					<div class="coupon-footer-dtl">
						<ul>
							<li><i class="fas fa-user clr-purple"></i><a href="<?php echo e(url('profile/'.$item->user_id)); ?>" title="User"><?php echo e(strtok($item->user->name,' ')); ?></a></li>
							<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></li>
							<li><i class="fas fa-comments clr-blue"></i><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="Comments"><?php echo e($item->comments()->count()); ?></a></li>
							<li>
								<?php if($item->is_featured == 1): ?>
									<i class="fas fa-star clr-green"></i> Featured
								<?php endif; ?>
							</li>
							<li>
								<i class="fa fa-eye"></i><?php echo e($item->views()->count()); ?>

							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script>
  $(".set-rating").rateYo({
    starWidth: "18px",
    spacing: "1px",
    normalFill: "#CCCCCC",
    ratedFill: "#E8511C",
    readOnly: true
  });
</script>