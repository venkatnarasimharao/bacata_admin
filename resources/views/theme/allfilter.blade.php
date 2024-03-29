@if(isset($results) && count($results)>0)
	<div class="row">
  	@foreach($results as $key => $item)
  		@if($item->type == 'd')
				<div class="col-lg-4 col-md-6">
					<div class="coupon-main-block coupon-single">
						<div class="coupon-dtl-block text-center">
							<div class="row">
								<div class="coupon-dtl">
									<div class="coupon-img">
										<a href="{{url('post/'.$item->uni_id.'/'.$item->slug)}}" title="{{$item->title}}"><img src="{{$item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)}}" class="img-fluid" alt="{{$item->title}}"></a>
									</div>
									<h6 class="coupon-title"><a href="{{url('post/'.$item->uni_id.'/'.$item->slug)}}" title="{{$item->title}}">{{str_limit($item->title, 60)}}</a></h6>
									<div class="coupon-expiry">
										@if($item->expiry)
											Expires on {{date('d F Y', strtotime($item->expiry))}}
										@endif
									</div>
									{{-- <div class="grab-coupon-block">
										<div class="grab-coupon-btn coupon-btn-outer">
											<a href="#" class="btn btn-primary cpn-btn" title="Grab Deal" data-toggle="modal" data-target="#coupon-id-{{$key}}"></a>
											<a href="#" data-toggle="modal" data-target="#coupon-id-{{$key}}">
												<div class="cpn-btn-shape"></div>
												<div class="s1">
													<div class="t1"></div>
													<div class="t1">
														<div class="t2"></div>
													</div>
												</div>
											</a>
											<span><a href="#" data-toggle="modal" data-target="#coupon-id-{{$key}}">Grab Deal</a></span>
										</div>
									</div> --}}
									<div class="grab-coupon-btn">
										<a href="#" class="btn btn-primary" title="Get Deal" data-toggle="modal" data-target="#coupon-id-{{$key}}">Grab Deal</a>
									</div>
								</div>
							</div>
						</div>
						<div class="coupon-popup">
							<div class="modal fade login-form-main" id="coupon-id-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="CouponTitle{{$key}}" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content text-center">
							      <div class="login-header">
							        <h5 class="coupon-disc-title" id="CouponTitle{{$key}}">Deal Detail</h5>
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
						      				<a href="{{$item->link != Null ? $item->link : $item->store->link}}" title="{{$item->store->title}}" target="_blank" data-id="{{$item->id}}" class="grab-now btn btn-primary">Grab Deal</a>
							      		</div>
							      	</div>
						      		<div class="coupon-footer coupon-modal-footer">
												<div class="coupon-footer-dtl">
													<ul>
											  		@php														
															$facebook = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->facebook();
															$twitter = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->twitter();
															$gplus = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->gplus();
															$linkedin = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->linkedin();
															$pinterest = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->pinterest();
														@endphp
														<li>
															@if($item->is_verified == 1)
																<i class="fas fa-check clr-green"></i>Verified Deal
															@else
																Unverified
															@endif
														</li>
														<li><i class="fas fa-shopping-cart clr-orange"></i><a href="{{url('store-dtl/'.$item->store->slug)}}" title="{{$item->store->title}}">{{$item->store->title}}</a></li>
														<li><i class="fas fa-users clr-purple"></i>{{$item->user_count}} People Used</li>
														<li class="share-button sharer"><i class="fas fa-share-alt clr-blue"></i><a class="share-btn" title="Share Deal">Share Deal</a>
															<div class="social top center networks-5 ">
														    <a class="fbtn share facebook" href="{{$facebook}}"><i class="fa fa-facebook"></i></a> 
														    <a class="fbtn share gplus" href="{{$gplus}}"><i class="fa fa-google-plus"></i></a> 
														    <a class="fbtn share twitter" href="{{$twitter}}"><i class="fa fa-twitter"></i></a> 
														    <a class="fbtn share pinterest" href="{{$pinterest}}"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="{{$linkedin}}"><i class="fa fa-linkedin"></i></a>
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
									    <a class="fbtn share facebook" href="{{$facebook}}"><i class="fa fa-facebook"></i></a> 
									    <a class="fbtn share gplus" href="{{$gplus}}"><i class="fa fa-google-plus"></i></a> 
									    <a class="fbtn share twitter" href="{{$twitter}}"><i class="fa fa-twitter"></i></a> 
									    <a class="fbtn share pinterest" href="{{$pinterest}}"><i class="fa fa-pinterest"></i></a>
									    <a class="fbtn share linkedin" href="{{$linkedin}}"><i class="fa fa-linkedin"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			@elseif($item->type == 'c')
				<div class="col-lg-4 col-md-6">
					<div class="coupon-main-block coupon-single">
						<div class="coupon-dtl-block text-center">
							<div class="row">
								<div class="coupon-dtl">
									<div class="coupon-img">
										<a href="{{url('post/'.$item->uni_id.'/'.$item->slug)}}" title="{{$item->title}}">
											<img src="{{$item->image != null ? asset('images/coupon/'.$item->image) : asset('images/store/'.$item->store->image)}}" class="img-fluid" alt="{{$item->title}}">
										</a>
									</div>
									<h6 class="coupon-title"><a href="{{url('post/'.$item->uni_id.'/'.$item->slug)}}" title="{{$item->title}}">{{str_limit($item->title, 60)}}</a></h6>
									<div class="coupon-expiry">
										@if($item->expiry)
											Expires on {{date('d F Y', strtotime($item->expiry))}}
										@endif
									</div>
									<div class="grab-coupon-block">
										<div class="grab-coupon-btn coupon-btn-outer">
											<a href="#" class="btn btn-primary cpn-btn" title="Get Coupon" data-toggle="modal" data-target="#coupon-id-{{$key}}"></a>
											<a href="#" data-toggle="modal" data-target="#coupon-id-{{$key}}">
												<div class="cpn-btn-shape"></div>
												<div class="s1">
													<div class="t1"></div>
													<div class="t1">
														<div class="t2"></div>
													</div>
												</div>
											</a>
											<span><a href="#" data-toggle="modal" data-target="#coupon-id-{{$key}}">Get Coupon</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="coupon-popup">
							<div class="modal fade login-form-main" id="coupon-id-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="CouponTitle{{$key}}" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content text-center">
										<div class="login-header">
											<h5 class="login-title" id="CouponTitle{{$key}}">Coupon Detail</h5>
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
																<h4 id="cpn-{{$key}}" class="coupon-txt">{{$item->code}}</h4>
															</div>
														</div>
														<div class="col-md-4">
															<div class="coupon-cpy-btn">
																<button class="btn btn-primary" title="Copy Coupon Code" data-clipboard-target="#cpn-{{$key}}">Copy Code</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="coupon-popup-btn">
					      				<a href="{{$item->link != Null ? $item->link : $item->store->link}}" title="{{$item->store->title}}" target="_blank" data-id="{{$item->id}}" class="grab-now btn btn-primary">Visit Store</a>
											</div>
											<div class="coupon-footer">
												<div class="coupon-footer-dtl">
													<ul>
														@php														
															$facebook = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->facebook();
															$twitter = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->twitter();
															$gplus = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->gplus();
															$linkedin = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->linkedin();
															$pinterest = Share::load(url('post/'.$item->uni_id.'/'.$item->slug), 'Sharing')->pinterest();
														@endphp
														<li>
															@if($item->is_verified == 1)
																<i class="fas fa-check clr-green"></i>Verified Coupon
															@else
																Unverified
															@endif
														</li>
														<li><i class="fas fa-users clr-orange"></i>{{$item->user_count}} People Used</li>
														<li class="share-button sharer clr-blue"><i class="fas fa-share-alt"></i><a class="share-btn" title="Share Coupon">Share Coupon</a>
															<div class="social top center networks-5 ">
														    <a class="fbtn share facebook" href="{{$facebook}}"><i class="fa fa-facebook"></i></a> 
														    <a class="fbtn share gplus" href="{{$gplus}}"><i class="fa fa-google-plus"></i></a> 
														    <a class="fbtn share twitter" href="{{$twitter}}"><i class="fa fa-twitter"></i></a> 
														    <a class="fbtn share pinterest" href="{{$pinterest}}"><i class="fa fa-pinterest"></i></a>
														    <a class="fbtn share linkedin" href="{{$linkedin}}"><i class="fa fa-linkedin"></i></a>
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
									    <a class="fbtn share facebook" href="{{$facebook}}"><i class="fa fa-facebook"></i></a> 
									    <a class="fbtn share gplus" href="{{$gplus}}"><i class="fa fa-google-plus"></i></a> 
									    <a class="fbtn share twitter" href="{{$twitter}}"><i class="fa fa-twitter"></i></a> 
									    <a class="fbtn share pinterest" href="{{$pinterest}}"><i class="fa fa-pinterest"></i></a>
									    <a class="fbtn share linkedin" href="{{$linkedin}}"><i class="fa fa-linkedin"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			@endif
		@endforeach
	</div>
	<div class="forum-footer">
		<div class="row">
			<div class="col-lg-4 col-md-8">
				<nav aria-label="forum-pagination">
				  <ul class="pagination filter-pagination">
			        {{ $results->links() }}                    
			    </ul>
				</nav>
			</div>
			<div class="col-lg-4 ml-lg-auto col-md-4 d-none d-lg-block">
				<div class="new-topic-btn">
					<a href="{{url('submit')}}" title="Post New Topic" class="btn btn-primary">Submit New Coupon</a>
				</div>
			</div>
		</div>
	</div>
@endif
<script>
	$(document).ready(function(){
		$('.pagination li a').addClass('page-link');
		$('.pagination li span').addClass('page-link');
		$('.pagination li').addClass('page-item');
	});
</script>