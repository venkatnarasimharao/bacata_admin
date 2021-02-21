@extends('layouts.theme')
@section('main-content')
<!-- faq -->
	<section id="faq" class="coupon-page-main-block">
		<div class="container">
			<div class="forum-page-header">
				<div class="forum-page-heading-block">
					<h5 class="forum-page-heading">FAQ</h5>
				</div>
				<!-- breadcrumb -->
				<div id="breadcrumb" class="breadcrumb-main-block">
					<div class="breadcrumb-block">
						<ol class="breadcrumb">
							<li><a href="{{url('/')}}" title="Home">Home</a></li>
							<li class="active">FAQ</li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb end -->
			</div>
			<div class="faq-page">
				<div class="coupon-dtl-outer">
					<div class="faq-main-block">
						@if(isset($faq_cat) && count($faq_cat) > 0)
							<div class="row">
								<div class="col-lg-4">
							    <div class="faq-info d-none d-lg-block">
							    	<div class="card">
										  <h5 class="card-header">Need some help?</h5>
										  <div class="card-body">
												<ol>
													<li><a href="#tab0" class="">Contact US</a></li>
													<li><a href="#tab0" class="">How CouponDunia Works</a></li>
												</ol>
											 </div>
										</div>
							    </div>
							  </div>
							  <div class="col-lg-8">
									<ul class="faq-list list-group" >
							      	@foreach($faq_cat as $key => $item)
							      		@if(count($item->faq) > 0)
							       			<li class="list-group-item d-flex justify-content-between align-items-center"><a href="#tab{{$key}}">{{$item->title}}</a><span class="badge badge-primary badge-pill">{{count($item->faq)}}</span></li>
							       		@endif
							       	@endforeach
							      </ul>
							    <div class="tab-content panels-faq">
							    	@foreach($faq_cat as $key => $item)
							    		@if(count($item->faq) > 0)
												<h5 class="p-4">{{$item->title}}</h5>
									      <div class="tab-pane active" id="tab{{$key}}">
									        <div class="faq-block">
								            <div class="panel-group faq-panel" id="accordion" role="tablist" aria-multiselectable="true">
								            	@foreach($item->faq as $key1 => $faq_item)
									              <div class="panel panel-default">
									              	<div class="card">
										                <div class="card-header" role="tab" id="headingWeb{{$key1}}">
										                  <h6 class="panel-title question-heading">
										                    <a role="button" data-toggle="collapse" data-target="#collapseWeb{{$key1}}" aria-expanded="{{$key1 == 0 ? 'true' : 'false'}}" aria-controls="collapseWeb{{$key1}}">
										                      {{$faq_item->question}}
										                      <span class="btn btn-primary faq-btn faq-btn-minus hidden-xs"><i class="fa fa-minus"></i></span>
										                      <span class="btn btn-primary faq-btn faq-btn-plus hidden-xs"><i class="fa fa-plus"></i></span>
										                    </a>
										                  </h6>
										                </div>
										              </div>
									                <div id="collapseWeb{{$key1}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingWeb{{$key1}}" data-parent="#accordion">
									                  <div class="card-body">
									                    {!! $faq_item->answer !!}
									                  </div>
									                </div>
									              </div>
									            @endforeach
								            </div>
								          </div>
									      </div>
								    	@endif
								    @endforeach
							    </div>
							  </div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end forum -->
	@endsection
