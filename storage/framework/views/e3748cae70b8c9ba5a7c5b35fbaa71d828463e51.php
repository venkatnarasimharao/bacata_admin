<?php $__env->startSection('main-content'); ?>
<!-- coupons -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">Exclusive Store Deals</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
						<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
						<li><a href="<?php echo e(url('deal')); ?>" title="Coupons">Deals</a></li>
						<li class="active"><?php echo e($store->title); ?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="coupon-page-block">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
								<div class="page-sidebar-widget brand-widget text-center">
									<div class="brand-logo">
										<a href="<?php echo e($store->link); ?>" title="<?php echo e($store->title); ?>" target="_blank"><img src="<?php echo e(asset('images/store/'.$store->image)); ?>" class="img-fluid" alt="store"></a>
									</div>
									<div class="brand-visit-btn">
										<a href="<?php echo e($store->link); ?>" title="<?php echo e($store->title); ?>" target="_blank" class="btn btn-primary">Visit Store</a>
									</div>
								</div>
								<?php if(isset($category_list) && count($category_list)>0): ?>
									<div class="page-sidebar-widget categories-widget">
										<h6 class="widget-heading">Categories</h6>
										<form class="categories-form">
						      		<div class="form-group">
						      			<input type="text" class="form-control" id="catInput" placeholder="Search Categories">
						      		</div>
						      		<div class="checkbox-main-group">
							      		<ul id="catList" class="form-group" data-store="<?php echo e($store->id); ?>" data-type="categorydeal">
							      			<?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      				<li class="custom-control custom-checkbox">
													    <input type="checkbox" name="catBox" class="custom-control-input" id="<?php echo e($item->id); ?>">
													    <label class="custom-control-label" for="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></label>
												  	</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							      		</ul>
							      	</div>
						      	</form>
									</div>
								<?php endif; ?>
      					<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div id="filterdata">
								<?php if(isset($coupon_dtl) && count($coupon_dtl)>0): ?>
								  <?php $__currentLoopData = $coupon_dtl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
														    <a class="fbtn share pinterest" href="<?php echo e($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="<?php echo e($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<div class="forum-footer">
										<div class="row">
											<div class="col-lg-4 col-md-8">
												<nav aria-label="forum-pagination">
												  <ul class="pagination">
										        <?php echo e($coupon_dtl->links()); ?>

										      </ul>
												</nav>
											</div>
											<div class="col-lg-4 ml-lg-auto col-md-4 d-none d-lg-block">
												<div class="new-topic-btn">
												
												</div>
											</div>
										</div>
									</div>
								<?php else: ?>
									<h6>No Deals Yet</h6>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end forum -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
$(document).ready(function(){var a,e,n=null;function c(t,a,e,n){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"GET",url:"<?php echo e(url('filtersearch')); ?>?page="+t,data:{f_array:a,type:n,f_id:e},success:function(t){console.log(t),$("#filterdata").html(t)},error:function(t,a,e){console.log(t)}}).fail(function(){alert("We are facing some issues currenlty. Please try again later.")})}$("#catList li").change(function(){a=$("input:checkbox[name=catBox]:checked").map(function(){return $(this).attr("id")}).get(),e=$("#catList").data("store"),n=$("#catList").data("type");c(1,a,e,n)}),$("body").on("click",".filter-pagination a",function(t){t.preventDefault(),c($(this).attr("href").split("page=")[1],a,e,n)})});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>