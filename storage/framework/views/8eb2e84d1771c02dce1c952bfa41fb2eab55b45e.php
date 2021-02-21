<?php $__env->startSection('main-content'); ?>
	<!-- blog -->
	<section id="blog-post" class="coupon-page-main-block blog-post-page">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading"><?php echo e($blog->title); ?></h5>
				</div>
			</div>
			<!-- breadcrumb -->
			<div id="breadcrumb" class="breadcrumb-main-block">
				<div class="breadcrumb-block">
					<ol class="breadcrumb">
						<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
						<li><a href="<?php echo e(url('blog')); ?>" title="Blog">Blog</a></li>
						<li class="active"><?php echo e($blog->title); ?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			<div class="account-page blog-single">
				<div class="blog-page-outer">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="coupon-sidebar">
								<div class="page-sidebar-widget search-widget">
									<div class="forum-search-block text-right">
										<?php echo Form::open(['method' => 'GET', 'action' => 'SearchController@blogSearch', 'class' => 'forum-search']); ?>

											<?php echo Form::text('search', null, ['class' => 'forum-search-input form-control', 'placeholder' => 'Search Blog']); ?>

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
								<?php if(isset($blog->tags)): ?>
									<div class="page-sidebar-widget tags-widget">
										<h5 class="widget-heading">Tags</h5>
										<ul>
											<?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li><a href="<?php echo e(url('tag/'.$tag->slug)); ?>" title="<?php echo e($tag->title); ?>"><?php echo e($tag->title); ?></a></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="blog-page-main-block">
								<div class="blog-post-main">
									<div class="blog-img">
										<img src="<?php echo e(asset('images/blog/'.$blog->image)); ?>" class="img-fluid" alt="Blog Post">
									</div>
									<div class="blog-post-dtl">
										<div class="blog-post-tags">
											<ul>
												<li><i class="far fa-clock"></i><?php echo e(date('d F Y', strtotime($blog->created_at))); ?></li>
												<!-- <li><i class="far fa-user"></i><a href="<?php echo e(url('profile/'.$blog->users->id)); ?>" title="<?php echo e($blog->users->name); ?>"><?php echo e($blog->users->name); ?></a></li> -->
												<li><i class="far fa-user"></i><?php echo e($blog->users->name); ?></li>

												<!-- <li><i class="far fa-comments"></i><?php echo e($blog->comments()->count()); ?></li> -->
											</ul>
										</div>
										<div class="blog-post-text">
											<?php echo $blog->desc; ?>

										</div>
										<div class="blog-post-footer">
											<div class="row">
												<div class="col-lg-6">
										  		<?php
														$facebook = Share::load(url()->current(), 'Sharing')->facebook();
														$twitter = Share::load(url()->current(), 'Sharing')->twitter();
														$gplus = Share::load(url()->current(), 'Sharing')->gplus();
														$linkedin = Share::load(url()->current(), 'Sharing')->linkedin();
														$pinterest = Share::load(url()->current(), 'Sharing')->pinterest();
													?>
													<div class="social-icon blog-page">
														<ul>
															<li><a class="facebook-icon" href="<?php echo e($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
													    <li><a class="google-icon" href="<?php echo e($gplus); ?>"><i class="fab fa-google-plus"></i></a></li>
													    <li><a class="twitter-icon" href="<?php echo e($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
													    <li><a class="pinterest-icon" href="<?php echo e($pinterest); ?>"><i class="fab fa-pinterest"></i></a></li>
													    <li><a class="linkedin-icon" href="<?php echo e($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="blog-single-post-tags">
														<ul>
															<li><a href="<?php echo e(url('deal')); ?>" class="btn btn-primary" title="Deals">Deals</a></li>
															<li><a href="<?php echo e(url('coupon')); ?>" class="btn btn-primary" title="Coupons">Coupons</a></li>
															<!-- <li><a href="<?php echo e('discussion'); ?>" class="btn btn-primary" title="discussion">Discussion</a></li> -->
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="blog-post-author">
								<div class="row">
									<div class="col-lg-2">
										<div class="blog-post-author-img">
											<img src="<?php echo e(asset('images/user/'.$blog->users->image)); ?>" class="img-fluid" alt="Author">
										</div>
									</div>
									<div class="col-lg-10">
										<h6 class="author-name"><?php echo e($blog->users->name); ?></h6>
										<div class="author-dtl"><?php echo e(str_limit($blog->users->brief, 280)); ?></div>
									</div>
								</div>
							</div>
							<?php if(isset($prev) || isset($next)): ?>
								<div class="blog-next-pre">
									<div class="row">
										<div class="col-6">
											<?php if($prev != Null): ?>
												<div class="next-pre-link"><a href="<?php echo e(url('blog/'.$prev->uni_id.'/'.$prev->slug)); ?>" title="Amazing Deals Sale"><i class="fas fa-long-arrow-alt-left"></i><?php echo e(str_limit($prev->title,50)); ?></a></div>
												</div>
											<?php endif; ?>
										</div>
										<div class="col-6">
											<?php if($next != Null): ?>
												<div class="next-link text-right">
													<div class="next-pre-link"><a href="<?php echo e(url('blog/'.$next->uni_id.'/'.$next->slug)); ?>" title="Black Friday Sale"><?php echo e(str_limit($next->title,50)); ?> <i class="fas fa-long-arrow-alt-right"></i></a></div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($comments) && count($comments)>0): ?>
								<div class="blog-comment">
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
							<?php endif; ?>
							<div class="blog-comment-send">
								<h6 class="comments-heading">Leave A Comment</h6>
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

														<input type="hidden" value="<?php echo e($blog->id); ?>" name="postid">
														<input type="hidden" value="blog" name="posttype">
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

															<input type="hidden" value="<?php echo e($blog->id); ?>" name="postid">
															<input type="hidden" value="blog" name="posttype">
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
							<?php echo e($comments->links()); ?>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end blog -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
$("body").on("click",".submitComment",function(){$(this).val();if(""==$("#summernote-main").val())alert("Please write a Comment First!");});
$("body").on("click",".submit-comment",function(){$(this).val();if(""==$("#summernote").val())alert("Please write a Comment First!");});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>