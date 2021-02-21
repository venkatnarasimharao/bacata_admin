<?php $__env->startSection('title',"$post->title"); ?>
<?php $__env->startSection('custom-meta'); ?>
<meta name="description" content="<?php echo e($post->detail ? $post->detail : ''); ?>" />
<?php $__env->startSection('main-content'); ?>
	<!-- post -->
	<section id="forum-post" class="forum-post-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading"><?php echo e($post->title); ?></h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
	          <li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
	          <li><a href="<?php echo e(url('forum')); ?>" title="Forums">Forums</a></li>
	          <li><a href="<?php echo e(url('forum-dtl/'.$post->forumcategory->slug)); ?>" title="Forums"><?php echo e($post->forumcategory->title); ?></a></li>
	          <li class="active"><?php echo e($post->title); ?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="post-block">
				<div class="post-body-main">
					<div class="post-body-outer">
						<div class="post-body-block">
							<div class="row">
								<div class="col-md-4">
									<div class="post-body-block-logo">
										<?php if($post->type == 'c' || $post->type == 'd'): ?>
											<img src="<?php echo e($post->image != null ? asset('images/coupon/'.$post->image) : asset('images/store/'.$post->store->image)); ?>" class="img-fluid" alt="Deal">
										<?php else: ?>
											<img src="<?php echo e(asset('images/discussion/'.$post->image)); ?>" class="img-fluid" alt="Discussion">
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-8">
									<div class="post-body post-first">
										<?php														
											$facebook = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->facebook();
											$twitter = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->twitter();
											$gplus = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->gplus();
											$linkedin = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->linkedin();
											$pinterest = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->pinterest();
										?>
										<div class="post-body-content">
											<h5 class="page-block-heading"><?php echo e($post->title); ?></h5>
											<div class="post-dtl">
												<ul>
													<li><i class="far fa-user"></i><?php echo e($post->user->name); ?></li>
													<li><i class="far fa-clock"></i>Posted <?php echo e($post->created_at->diffforhumans()); ?></li>
												</ul>
											</div>
				      				<div class="rating">
		                    <div class="set-rating" data-rateyo-rating="<?php echo e($post->rating>0 ? $post->rating : '0'); ?>"></div>
		                  </div>
											<div class="social-icon">
												<ul>
													<li><a class="facebook-icon" href="<?php echo e($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
											    <li><a class="google-icon" href="<?php echo e($gplus); ?>"><i class="fab fa-google-plus"></i></a></li>
											    <li><a class="twitter-icon" href="<?php echo e($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
											    <li><a class="pinterest-icon" href="<?php echo e($pinterest); ?>"><i class="fab fa-pinterest"></i></a></li>
											    <li><a class="linkedin-icon" href="<?php echo e($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
												</ul>
											</div>
											<div class="row post-main-footer">
												<div class="col-lg-6">
				                 					<div id="like-btn" class="post-like-btn">
				                  						<?php if(auth()->guard()->check()): ?>
															<a href="#" class="<?php echo e($post->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($post->id); ?>" data-type="<?php echo e($post->type ? $post->type : 'g'); ?>" title="like"><i class="far fa-thumbs-up clr-green"></i></a>
															<a href="#" class="<?php echo e($post->isLiked == -1 ? 'active' : ''); ?>" data-like="<?php echo e($post->id); ?>" data-type="<?php echo e($post->type ? $post->type : 'g'); ?>" title="unlike"><i class="far fa-thumbs-down clr-orange"></i></a>
														<?php else: ?>	
															<a href="#" data-toggle="modal" data-target="#login" title="like"><i class="far fa-thumbs-up clr-green"></i></a>
															<a href="#" data-toggle="modal" data-target="#login" title="unlike"><i class="far fa-thumbs-down clr-orange"></i></a>
														<?php endif; ?>
													</div>
												</div>
												<?php if($post->type == 'd' || $post->type == 'c'): ?>
													<div class="col-lg-6">
														<div class="deal-price text-center">
															<?php if($post->price): ?>
																<sup><i class="<?php echo e($settings->currency); ?>" aria-hidden="true"></i></sup> <?php echo e($post->price); ?>

															<?php endif; ?>
														</div>
														
														<div class="grab-coupon-btn">
															<?php if($post->type == 'c'): ?>
																
																<?php if(auth()->guard()->check()): ?>
																<a href="#" class="btn btn-primary" title="Get Coupon" data-toggle="modal" data-target="#coupon-id-1">Grab Coupon</a>
																<?php else: ?>
																<a href="#" class="btn btn-primary" title="Get Coupon" data-toggle="modal" data-target="#login">Grab Coupon</a>
																<?php endif; ?>
															<?php else: ?>
																
																
																<?php if(auth()->guard()->check()): ?>
																<a href="#" class="btn btn-primary" title="Grab Deal" data-toggle="modal" data-target="#coupon-id">Grab Deal</a>
																<?php else: ?>
																<a href="#" class="btn btn-primary" title="Grab Deal" data-toggle="modal" data-target="#login">Grab Deal</a>
																<?php endif; ?>
															<?php endif; ?>
														</div>
													</div>


													<div class="coupon-popup">
												<div class="modal fade login-form-main" id="coupon-id" tabindex="-1" role="dialog" aria-labelledby="CouponTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered" role="document">
												    <div class="modal-content text-center">
												      <div class="login-header">
												        <h5 class="coupon-disc-title" id="CouponTitle">Deal Detail</h5>
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
											      				<a href="<?php echo e($post->link != Null ? $post->link : $post->store->link); ?>" title="<?php echo e($post->store->title); ?>" target="_blank" data-id="<?php echo e($post->id); ?>" class="grab-now btn btn-primary">Grab Deal</a>
												      		</div>
												      	</div>
											      		<div class="coupon-footer coupon-modal-footer">
																	<div class="coupon-footer-dtl">
																		<ul>
																  		<?php														
																				$facebook = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->facebook();
																				$twitter = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->twitter();
																				$gplus = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->gplus();
																				$linkedin = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->linkedin();
																				$pinterest = Share::load(url('post/'.$post->uni_id.'/'.$post->slug), 'Sharing')->pinterest();
																			?>
																			<li>
																				<?php if($post->is_verified == 1): ?>
																					<i class="fas fa-check clr-green"></i>Verified Deal
																				<?php else: ?>
																					Unverified
																				<?php endif; ?>
																			</li>
																			<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$post->store->slug)); ?>" title="<?php echo e($post->store->title); ?>"><?php echo e($post->store->title); ?></a></li>
																			<li><i class="fas fa-users clr-purple"></i><?php echo e($post->user_count); ?> People Used</li>
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


													<div class="coupon-popup">
														<div class="modal fade login-form-main" id="coupon-id-1" tabindex="-1" role="dialog" aria-labelledby="CouponTitle1" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content text-center">
																	<div class="login-header">
																		<h5 class="login-title" id="CouponTitle1">Coupon Detail</h5>
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
																							<h4 id="cpn-1" class="coupon-txt"><?php echo e($post->code); ?></h4>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="coupon-cpy-btn">
																							<button class="btn btn-primary" title="Copy Coupon Code" data-clipboard-target="#cpn-1">Copy Code</button>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="coupon-popup-btn">
												      				<a href="<?php echo e($post->link != Null ? $post->link : $post->store->link); ?>" title="<?php echo e($post->store->title); ?>" target="_blank" data-id="<?php echo e($post->id); ?>" class="grab-now btn btn-primary">Visit Store</a>
																		</div>
																		<div class="coupon-footer">
																			<div class="coupon-footer-dtl">
																				<ul>
																					<li>
																						<?php if($post->is_verified == 1): ?>
																							<i class="fas fa-check clr-green"></i>Verified Coupon
																						<?php else: ?>
																							Unverified
																						<?php endif; ?>
																					</li>
																					<li><i class="fas fa-shopping-cart clr-orange"></i><a href="<?php echo e(url('store-dtl/'.$post->store->slug)); ?>" title="<?php echo e($post->store->title); ?>"><?php echo e($post->store->title); ?></a></li>
																					<li><i class="fas fa-users clr-purple"></i><?php echo e($post->user_count); ?> People Used</li>
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
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="post-block">
				<div class="post-body-main">
					<div class="post-body-outer">
						<div class="post-body-block">
							<div class="row">
								<div class="col-lg-8">
									<div class="post-body">
										<div class="post-body-content">
											<h5 class="page-block-heading">About <?php echo e($post->type == 'c' ? 'Coupon' : 'Deal'); ?> Discussion</h5>
											<?php echo $post->detail; ?>

										</div>
									</div>
								</div>
								<?php if($post->type == 'c' || $post->type == 'd'): ?>
									<div class="col-lg-4 text-center">
										<div class="post-body-block-logo">
											<a href="#" title="<?php echo e($post->store->title); ?>" target="_blank"><img src="<?php echo e(asset('images/store/'.$post->store->image)); ?>" class="img-fluid" alt="Brand"></a>
										</div>                           
										<div class="post-brand-content">
											<h6 class="page-block-heading"><?php echo e($post->store->title); ?></h6>
											<a href="<?php echo e($post->store->link); ?>" title="<?php echo e($post->store->title); ?>" target="_blank" class="btn btn-primary">Visit Store</a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($comments) && count($comments) > 0): ?>
				<div class="post-block">
					<div class="post-body-main">
						<div class="post-body-outer">
							<div class="post-body-block">
								<div class="blog-comment coupon-comment">
									<h6 class="comments-heading">Comments</h6>
									<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="media">
											<div class="media-left mr-3">
												<a href="<?php echo e(url('profile/'.$comment->user_id)); ?>" title="<?php echo e($comment->users->is_admin ? 'Admin' : 'User'); ?>"><img src="<?php echo e(asset('images/user/'.$comment->users->image)); ?>" class="img-fluid media-object" alt="Admin"></a>
											</div>
											<div class="media-body">
												<h6 class="media-heading"><a href="<?php echo e(url('profile/'.$comment->user_id)); ?>" title="<?php echo e($comment->users->name); ?>"><?php echo e($comment->users->name); ?></a> - <span><?php echo e($comment->created_at->diffForHumans()); ?></span></h6>
												<p><?php echo $comment->body; ?></p>
												<?php if(auth()->guard()->check()): ?>
													<div class="media-reply"><a class="reply-btn" data-value="<?php echo e($comment->id); ?>" href="#" title="Reply"><i class="fa fa-reply"></i> Reply</a></div>
												<?php else: ?>
													<div class="media-reply"><a class="reply-btn1" data-toggle="modal" data-target="#login" href="#" title="Reply"><i class="fa fa-reply"></i> Reply</a></div>
												<?php endif; ?>
												<?php if($comment->replies()->count()>0): ?>
													<?php echo $__env->make('theme.childcomment', ['comments' => $comment->replies], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
												<?php endif; ?>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="post-block">
				<div class="post-body-main">
					<div class="post-body-outer">
						<h5 class="post-reply-heading">Leave A Comment</h5>
						<div class="row">
							<div class="col-lg-2">
								<div class="post-author-img">
									<?php if(auth()->guard()->check()): ?>
										<img src="<?php echo e(asset('images/user/'.$auth->image)); ?>" class="img-fluid" alt="<?php echo e($auth->title); ?>">
									<?php else: ?>
										<img src="<?php echo e(asset('images/user/user.png')); ?>" class="img-fluid" alt="user-img">
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-10">
								<div class="post-body-block">
									<div class="post-body">
										<div class="post-body-content">
											<?php echo Form::open(['method' => 'POST', 'action' => 'UserDashboardController@comment_store', 'class' => 'post-reply-form']); ?>

												<input type="hidden" value="<?php echo e($post->id); ?>" name="postid">
												<input type="hidden" value="<?php echo e($post->type ? $post->type : 'g'); ?>" name="posttype">
												<input type="hidden" value="main" name="replyid">
												<div class="form-group">
													<textarea id="summernote-main" name="commenttext" class="summernote-main form-control"></textarea>
												</div>
                        <?php if(auth()->guard()->check()): ?>
													<button type="submit" class="btn btn-primary submitComment">Leave Comment</button>
												<?php else: ?>
													<button type="button" data-toggle="modal" data-target="#login" class="btn btn-primary">Leave Comment</button>
												<?php endif; ?>
					            <?php echo Form::close(); ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="review">
				<div class="post-block post-reply post-reply-form-main">
					<div class="post-body-main">
						<div class="post-body-outer">
							<div class="post-body-block">
								<div class="post-body">
								<button class="close" onclick="document.getElementById('review').style.display='none'"><i class="fa fa-close"></i></button>
									<div class="post-body-content">
										<h6 class="post-reply-heading">Leave A Comment</h6>
										<?php echo Form::open(['method' => 'POST', 'action' => 'UserDashboardController@comment_store', 'class' => 'post-reply-form']); ?>

											<input type="hidden" value="<?php echo e($post->id); ?>" name="postid">
											<input type="hidden" value="<?php echo e($post->type ? $post->type : 'g'); ?>" name="posttype">
											<input type="hidden" value="" name="replyid">
											<div class="form-group">
												<textarea id="summernote" name="commenttext" class="form-control">
												</textarea>
											</div>
											<button type="submit" class="btn btn-primary submit-comment">Leave Comment</button>
				            <?php echo Form::close(); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="forum-footer">
				<div class="row">
					<div class="col-lg-4 col-md-7">
    				<?php echo e($comments->links()); ?> 
					</div>
					<div class="col-lg-3 ml-lg-auto col-md-5">
						<div class="new-topic-btn">
							<a href="<?php echo e(url('submit')); ?>" title="Post New Topic" class="btn btn-primary">Post New Topic</a>
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
var postId=null;
var btnType=null;
var btnValue=null;
var type=null;
var urlLike='<?php echo e(route('post.like')); ?>';
$("[data-like]").on("click",function(t){t.preventDefault();var a=$(this),e=a.data("like");btnType=a.attr("title"),btnValue=a.attr("class"),type=a.data("type"),$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"POST",url:urlLike,data:{postId:e,type:type,btnType:btnType,btnValue:btnValue}}).done(function(t){console.log(t),0<t?$(".set-rating").attr("data-rateyo-rating","2"):$(".set-rating").attr("data-rateyo-rating","0"),null==btnValue||""==btnValue?a.toggleClass("active").siblings().removeClass("active"):a.removeClass("active")}).fail(function(){alert("We are facing some issues currenlty. Please try again later.")})});
</script>
<script>
$("body").on("click",".submitComment",function(){$(this).val();if(""==$("#summernote-main").val())alert("Please write a Comment First!");});

$("body").on("click",".submit-comment",function(){$(this).val();if(""==$("#summernote").val())alert("Please write a Comment First!");});
</script>	
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>