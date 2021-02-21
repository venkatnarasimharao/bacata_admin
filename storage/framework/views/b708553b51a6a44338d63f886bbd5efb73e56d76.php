<?php $__env->startSection('main-content'); ?>
<!-- forum -->
	<section id="forum" class="forum-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="row">
					<div class="col-md-6">
						<div class="forum-page-heading-block">
							<h5 class="forum-page-heading"><?php echo e($forumcategory->title); ?> Forum</h5>
						</div>
						<!-- breadcrumb -->
						<div id="breadcrumb" class="breadcrumb-main-block">
							<div class="breadcrumb-block">
								<ol class="breadcrumb">
				          <li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
				          <li><a href="<?php echo e(url('forum')); ?>" title="Forums">Forums</a></li>
				          <li class="active"><?php echo e($forumcategory->title); ?></li>
								</ol>
							</div>
						</div>
						<!-- breadcrumb end -->
					</div>
					<div class="col-lg-4 col-md-5 ml-lg-auto ml-md-auto">
						<div class="forum-search-block text-right">
							<form class="forum-search" action="#" method="GET">
								<input id="forum-searchbox" type="search" value="" placeholder="Search" class="forum-search-input form-control" autocomplete="off">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="forum-block">
				<?php if(isset($forum_dtl) && count($forum_dtl)>0): ?>
					<table id="forum-table" class="nowrap forum-table table table-bordered display">
						<thead class="thead-dark">
					    <tr>
					      <th class="post-cl-width" scope="col">Posts</th>
					      <th scope="col">Rating</th>
						    <?php if($forumcategory->category != 'g'): ?>
					      	<th scope="col">Category</th>
						      <th scope="col">Merchant</th>
						    <?php endif; ?>
						    <th scope="col">Views</th>
					      <th scope="col">By</th>
					    </tr>
					  </thead>
					  <tbody>
						  <?php $__currentLoopData = $forum_dtl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr>
						      <th scope="row">
						      	<div class="row">
											<div class="col-lg-1 col-md-2 d-none d-lg-block d-md-block">
						      			<div class="forum-user-img">
						      				<a href="<?php echo e(url('profile/'.$item->user_id)); ?>" title="<?php echo e($item->user->name); ?>"><img src="<?php echo e(asset('images/user/'.$item->user->image)); ?>" alt="User"></a>
						      			</div>
						      		</div>
						      		<div class="col-lg-9 col-md-10">
						      			<a href="<?php echo e(url('post/'.$item->uni_id.'/'.$item->slug)); ?>" class="post-title" title="Post Title"><?php echo e(str_limit($item->title,50)); ?></a>
						      			<div class="post-date"><?php echo e($item->created_at->diffForHumans()); ?></div>
						      		</div>
						      		<div class="col-md-2 d-none d-lg-block pad-0">
						      			<?php if($item->is_featured): ?>
						      				<div class="post-tag"><span>Featured</span></div>
						      			<?php endif; ?>
						      		</div>
						      	</div>
						      </th>
						      <td>
						      	<div class="rating">
	                    <div class="set-rating" data-rateyo-rating="<?php echo e($item->rating); ?>"></div>
	                  </div>
						      </td>
						      <?php if($forumcategory->category != 'g'): ?>
							      <td><a href="<?php echo e(url('category-dtl/'.$item->category->slug)); ?>" title="<?php echo e($item->category->title); ?>"><?php echo e($item->category->title); ?></a></td>
							      <td><a href="<?php echo e(url('store-dtl/'.$item->store->slug)); ?>" title="<?php echo e($item->store->title); ?>"><?php echo e($item->store->title); ?></a></td>
							    <?php endif; ?>
						      <td><div class="post-views"><?php echo e($item->views()->count()); ?></div></td>
						      <td><a href="<?php echo e(url('profile/'.$item->user_id)); ?>" class="post-by" title="<?php echo e($item->user->name); ?>"><?php echo e(strtok($item->user->name,' ')); ?></a></td>
						    </tr>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>
			<div class="forum-footer">
				<div class="row">
					
					<div class="col-lg-2 ml-lg-auto col-md-4">
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
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>