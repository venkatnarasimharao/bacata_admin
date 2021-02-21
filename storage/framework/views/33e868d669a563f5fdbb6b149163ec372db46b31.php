<?php $__env->startSection('main-content'); ?>
	<!-- search -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading"><?php echo e($search_title); ?> Related Deals & Coupon</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
	          <li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
	          <li class="active">Search</li>
	        </ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<!-- forum -->
			<div class="container search-page">
				<div class="row">
					<div class="lg-offset-8 col-lg-4 md-offset-7 col-md-5 ml-lg-auto ml-md-auto">
						<div class="forum-search-block text-right">
							<?php echo Form::open(['method' => 'GET', 'action' => 'SearchController@homeSearch', 'class' => 'forum-search']); ?>

								<?php echo Form::text('search', null, ['class' => 'forum-search-input form-control', 'placeholder' => 'Search']); ?>

							  <button type="submit" class="search-button">
							    <svg class="submit-button">
							      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
							    </svg>
							  </button>
						  <?php echo Form::close(); ?>

							<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
							  <symbol id="search" viewBox="0 0 32 32">
							    <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
							  </symbol>
							</svg>
						</div>
					</div>
				</div>
			</div>
			<div class="coupon-page-block">
				<div class="coupon-dtl-outer">
					<div class="row">

						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
      					<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<?php if(isset($results) && count($results)>0): ?>
							  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($item->type == 'c'): ?>
										<div class="coupon-main-block">
											<div class="coupon-dtl-block">
												<div class="row">
													<div class="col-lg-2 col-4">
														<div class="coupon-disc-block text-center v-center">
															<h3 class="coupon-disc"><?php echo e($item->discount ? $item->discount : '0'); ?>%</h3>
															<h3 class="coupon-disc">Off</h3>
														</div>
													</div>
													<div class="col-lg-7 col-8 border-l">
														<div class="coupon-dtl">
															<h5 class="coupon-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title, 45)); ?></a></h5>
															<div class="coupon-short-disc"><p><?php echo substr(strip_tags($item->detail), 0, 100); ?>..</p></div>
															<div class="coupon-expiry">
																<?php if($item->expiry): ?>
																	Ends on <?php echo e(date('d F Y', strtotime($item->expiry))); ?>

																<?php endif; ?>
															</div>
														</div>
													</div>
													<div class="col-lg-3 text-center">
														<div class="grab-coupon-block">
															<?php if($item->is_exclusive == 1): ?>
																<div class="coupon-badge"><i class="far fa-star"></i>Coupon's Exclusive</div>
															<?php endif; ?>
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
																			<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></li>
																			<li><i class="fas fa-users clr-purple"></i><?php echo e($item->user_count); ?> People Used</li>
																			<li class="share-button sharer clr-blue"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
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
												<div class="coupon-footer-dtl">
													<ul>
														<li>
															<?php if($item->is_verified == 1): ?>
																<i class="fas fa-check clr-green"></i>Verified Coupon
															<?php else: ?>
																Unverified
															<?php endif; ?>
														</li>
														<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></li>
														<li><i class="fas fa-users clr-purple"></i><?php echo e($item->user_count); ?> People Used</li>
														<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
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
									<?php else: ?>
										<div class="coupon-main-block">
											<div class="coupon-dtl-block">
												<div class="row">
													<div class="col-lg-2 col-4">
														<div class="coupon-disc-block text-center v-center">
															<h3 class="coupon-disc"><?php echo e($item->discount ? $item->discount : '0'); ?>%</h3>
															<h3 class="coupon-disc">Off</h3>
														</div>
													</div>
													<div class="col-lg-7 col-8 border-l">
														<div class="coupon-dtl">
															<h5 class="coupon-title"><a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"><?php echo e(str_limit($item->title,45)); ?></a></h5>
															<div class="coupon-short-disc"><p><?php echo e(str_limit($item->detail,100)); ?></p></div>
															<div class="coupon-expiry">
																<?php if($item->expiry): ?>
																	Ends on <?php echo e(date('d F Y', strtotime($item->expiry))); ?>

																<?php endif; ?>
															</div>
														</div>
													</div>
													<div class="col-lg-3 text-center">
														<div class="grab-coupon-block">
															<?php if($item->is_exclusive == 1): ?>
																<div class="coupon-badge"><i class="far fa-star"></i>Deal's Exclusive</div>
															<?php endif; ?>
															<div class="grab-coupon-btn">
																<a href="#" class="btn btn-primary" title="Grab Deal" data-toggle="modal" data-target="#coupon-id-<?php echo e($key); ?>">Grab Deal</a>
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
												<div class="coupon-footer-dtl">
													<ul>
														<li>
															<?php if($item->is_verified == 1): ?>
																<i class="fas fa-check clr-green"></i>Verified Deal
															<?php else: ?>
																Unverified
															<?php endif; ?>
														</li>
														<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></li>
														<li><i class="fas fa-users clr-purple"></i><?php echo e($item->user_count); ?> People Used</li>
														<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Coupon">Share Deal</a>
															<div class="social top center networks-5 ">
														    <a class="fbtn share facebook" href="<?php echo e($facebook); ?>"><i class="fa fa-facebook"></i></a>
														    <a class="fbtn share gplus" href="<?php echo e($gplus); ?>"><i class="fa fa-google-plus"></i></a>
														    <a class="fbtn share twitter" href="<?php echo e($twitter); ?>"><i class="fa fa-twitter"></i></a>
														    <a class="fbtn share pinterest" href="<?php echo e($linkedin); ?>"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="<?php echo e($pinterest); ?>"><i class="fa fa-linkedin"></i></a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="forum-footer">
									<div class="row">
										<div class="col-lg-4 col-md-8">
											<nav aria-label="forum-pagination">
											  <ul class="pagination">
									        <?php echo e($results->appends(['search' => $search_title])->links()); ?>

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
							<?php else: ?>
								<h6>No Results Found</h6>
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