<?php $__env->startSection('main-content'); ?>
<!-- slider start -->
	<section id="slider" class="home-slider" >
			<?php if(isset($slider) && count($slider) > 0): ?>
				<div id="home-slider" class="owl-carousel">
					<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="slider-img">
							<a href="<?php echo e(url('store-dtl/'.$item->title)); ?>" title="Store"><img src="<?php echo e(asset('images/slider/'.$item->image)); ?>" class="img-fluid" alt="Store"></a>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endif; ?>
	</section>
<!-- end slider -->
<!-- home categories -->
	<section id="home-cat" class="home-cat-main-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 d-none d-lg-block">
					<div class="home-filter cat-nav">
						<ul>
							<li id="all" class="cat-link active"><a href="javascript:void(0)" title="All">Recent</a></li>
							<li id="featured" class="cat-link"><a href="javascript:void(0)" title="New Deals">Featured</a></li>
							<li id="trending" class="cat-link"><a href="javascript:void(0)" title="Trending">Trending</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="home-filter cat-nav-two">
						<ul>
							<li>
								<div class="sort-dropdown">
									<?php if(isset($store_list) && count($store_list) > 0): ?>
									  <select class="form-control" name="store" id="store-list">
											<option value="all">By Merchant</option>
											<?php $__currentLoopData = $store_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($item->id); ?>"><?php echo e(strtok($item->title,' ')); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
										</select>
									<?php endif; ?>
								</div>
							</li>
							<li>
								<div class="sort-dropdown">
									<?php if(isset($category_list) && count($category_list) > 0): ?>
								  	<select class="form-control" name="store" id="cat-list">
											<option value="all">By Category</option>
											<?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($item->id); ?>"><?php echo e(strtok($item->title,' ')); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</select>
									<?php endif; ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-1">
					<div class="cat-nav-two">
						<ul>
							<li class="layout-icon"><a href="<?php echo e(url('/')); ?>" title="Grid"><i class="fas fa-th"></i></a></li>
							<li class="layout-icon"><a href="<?php echo e(url('home-list')); ?>" title="List"><i class="fas fa-list"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end home categories -->
<!-- deal -->
	<section id="deal" class="deal-main-block deal-list-page">
		<div class="container">
			<?php if(isset($settings) && $settings->is_recent_deals): ?>
				<h6 class="section-heading">Deals & Coupons</h6>
				<div id="home-filter-section">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<?php if(isset($results) && count($results) > 0): ?>
								<div class="deal-block-outer results">
									<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
															<div class="coupon-short-disc"><p><?php echo substr(strip_tags($item->detail), 0, 100); ?>..</p>
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
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							<?php else: ?>
								<p>No Results</p>
							<?php endif; ?>
							<div id="results"><!-- results appear here --></div>
							<?php if(count($results) > 35): ?>
								<div class="btn btn-primary load-more-btn">Load More</div>
							<?php endif; ?>
			    		<div class="ajax-loading text-center"><i class="fa fa-spinner fa-spin" style="font-size:40px"></i></div>
						</div>
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
    						<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    					</div>
    				</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<!-- end deal -->
<!-- categories -->
<?php if(isset($settings) && $settings->is_category_block): ?>
	<section id="categories" class="categories-main-block">
		<div class="container">
			<?php if(isset($category_list) && count($category_list) > 0): ?>
				<div class="section">
					<h4 class="section-heading">Categories</h4>
				</div>
				<div class="cat-block text-center">
					<div class="row">
						<?php $__currentLoopData = $category_list->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-2 col-md-4">
								<div class="category-block">
									<a href="<?php echo e(url('category-dtl/'.$item->slug)); ?>" title="Categories">
										<div class="cat">
											<div class="<?php echo e($item->icon ? 'cat-icon' : ''); ?>">
												<?php if($item->icon): ?>
													<i class="fa <?php echo e($item->icon); ?>"></i>
												<?php else: ?>
													<img src="<?php echo e(asset('images/category/'.$item->image)); ?>" class="img-fluid" alt="category">
												<?php endif; ?>
											</div>
											<h5 class="cat-title"><?php echo e(strtok($item->title,' ')); ?></h5>
										</div>
									</a>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- end categories -->
<!-- blogs -->
<?php if(isset($blogs)): ?>
	<section id="home-blog" class="home-blog-main-block">
		<div class="container">
			<div class="section">
				<h4 class="section-heading">Recent Blogs</h4>
			</div>
			<div class="blog-page-outer blog-page-two">
				<div class="blog-page-main-block">
					<div class="row">
						<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-4 col-md-6">
								<div class="blog-post-main">
									<div class="blog-img">
										<a href="<?php echo e(url('blog-dtl/'.$blog->uni_id.'/'.$blog->slug)); ?>" title="Blog Post"><img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid" alt="Blog Post"></a>
									</div>
									<div class="blog-post-dtl">
										<h6 class="blog-post-heading"><a href="blog-post.html" title="Blog Post"><?php echo e($blog->title); ?></a></h6>
										<div class="blog-post-tags">
											<ul>
												<li><i class="far fa-clock"></i><?php echo e(date('d F Y', strtotime($blog->created_at))); ?></li>
												<li><i class="far fa-user"></i><a href="<?php echo e(url('profile/'.$blog->users->id)); ?>" title="<?php echo e($blog->users->name); ?>"><?php echo e($blog->users->name); ?></a></li>
												<li><i class="far fa-comments"></i><?php echo e($blog->comments()->count()); ?></li>
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
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- end blogs -->
<!-- featured stores -->
<?php if(isset($settings) && $settings->is_store_slider): ?>
	<div id="featured-stores" class="featured-stores-main-block">
		<div class="container">
			<?php if(isset($store) && count($store) > 0): ?>
				<div id="featured-store-slider" class="featured-stores-slider owl-carousel">
					<?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="store-img">
							<a href="<?php echo e(url('store-dtl/'.$item->slug)); ?>" title="Store"><img src="<?php echo e(asset('images/store/'.$item->image)); ?>" class="img-fluid" alt="Store"></a>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<!-- end featured stores -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
	$(document).ready(function(){$(".cat-nav li").click(function(e){$(this).addClass("active"),$(this).parent().children("li").not(this).removeClass("active")});var e="all",t="all",a="all",l=1;function n(l){$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"GET",url:"<?php echo e(url('homefilter')); ?>?page="+l,data:{filter:t,s_filter:e,c_filter:a,main:"1"},datatype:"html",beforeSend:function(){$(".load-more-btn").hide(),$(".ajax-loading").show()},success:function(e){console.log(e)},error:function(e,t,a){console.log(e)}}).done(function(e){if(!e)return console.log("no"),$(".ajax-loading").hide(),1==l&&$(".results").html("No Results Found!"),0;$(".ajax-loading").hide(),1==l?$(".results").html(e):$(".results").append(e),$(e).find(".coupon-dtl-block").length>35&&$(".load-more-btn").show()}).fail(function(e,t,a){alert("We are facing some issues currenlty. Please try again later.")})}$(".home-filter li").on("change keyup",function(){t=$(".cat-nav li.active").attr("id"),e=$("#store-list").val(),a=$("#cat-list").val(),console.log(a),console.log(t),n(l=1)}),$(".load-more-btn").on("click",function(){n(++l)})});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>