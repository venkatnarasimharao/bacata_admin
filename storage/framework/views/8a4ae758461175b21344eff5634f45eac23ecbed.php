<?php $__env->startSection('main-content'); ?>
	<!-- coupons -->
	<section id="forum" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">Coupons</h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
						<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
						<li class="active">Coupons</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="coupon-page-block">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
								<div id="filter-list" data-type="coupon">
									<?php if(isset($store_list) && count($store_list)>0): ?>
										<div class="page-sidebar-widget categories-widget">
											<h6 class="widget-heading">Stores</h6>
											<form class="categories-form">
							      		<div class="form-group">
							      			<input type="text" id="storeInput" class="form-control" placeholder="Search Stores">
							      		</div>
							      		<div class="checkbox-main-group">
								      		<ul id="storeList" class="form-group">
								      			<?php $__currentLoopData = $store_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      					<li class="custom-control custom-checkbox">
														    <input type="checkbox" name="storeBox" class="custom-control-input" id="<?php echo e($item->title); ?>" data-uid="<?php echo e($item->id); ?>">
														    <label class="custom-control-label" for="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></label>
														  </li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								      		</ul>
								      	</div>
							      	</form>
										</div>
									<?php endif; ?>
									<?php if(isset($category_list) && count($category_list)>0): ?>
										<div class="page-sidebar-widget categories-widget">
											<h6 class="widget-heading">Categories</h6>
											<form class="categories-form">
							      		<div class="form-group">
							      			<input type="text" class="form-control" id="catInput" placeholder="Search Categories">
							      		</div>
							      		<div class="checkbox-main-group">
								      		<ul id="catList" class="form-group">
								      			<?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								      				<li class="custom-control custom-checkbox">
														    <input type="checkbox" name="catBox" class="custom-control-input" id="<?php echo e($item->title); ?>" data-uid="<?php echo e($item->id); ?>">
														    <label class="custom-control-label" for="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></label>
													  	</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								      		</ul>
								      	</div>
							      	</form>
										</div>
									<?php endif; ?>
								</div>
      					<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div id="filterdata">
								<?php if(isset($coupon_dtl) && count($coupon_dtl)>0): ?>
									<div class="row">
								  	<?php $__currentLoopData = $coupon_dtl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-lg-4 col-sm-6">
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
																					<li class="share-button sharer clr-blue"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
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
																</div>
															</div>
														</div>
													</div>
													<div class="coupon-footer">
														<div class="coupon-footer-dtl text-center">
															<ul>
																<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
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
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
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
									<h6>No Data Found</h6>
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
$(document).ready(function(){var e,a,n=null;function o(t,e,a,n){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"GET",url:"<?php echo e(url('allfilter')); ?>?page="+t,data:{c_array:e,s_array:a,type:n},success:function(t){console.log(t),$("#filterdata").html(t)},error:function(t,e,a){console.log(t)}}).fail(function(){alert("We are facing some issues currenlty. Please try again later.")})}$("#filter-list li").change(function(){e=$("input:checkbox[name=catBox]:checked").map(function(){return $(this).data("uid")}).get(),a=$("input:checkbox[name=storeBox]:checked").map(function(){return $(this).data("uid")}).get(),n=$("#filter-list").data("type");o(1,e,a,n),console.log(n)}),$("body").on("click",".filter-pagination a",function(t){t.preventDefault(),console.log(a),o($(this).attr("href").split("page=")[1],e,a,n)})});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>