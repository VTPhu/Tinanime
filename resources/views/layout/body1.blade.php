<div id="blog-section" class="blog-section">
	<!-- container -->
	<div class="container">
		
		<div class="row">
			<div class="col-md-8 col-sm-6">
				<article>
					
					@foreach($tintrongloai as $t)
					<div class="col-md-4">
						
						<div class="post-box">
							<div class="image-box">
								<img src="/asm1/upload/Files/{{$t->urlHinh}}" alt="post" />
							</div>
							
							<!-- <ul class="comments-social">
								<li><a href="#"><img src="/images/icon/like-icon.png" alt="like" /></a></li>
								<li class="dropdown">
									<a href="#"><img src="/images/icon/more-icon.png" alt="more-icon" /></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Facebook</a></li>
										<li><a href="#">Twitter</a></li>
										<li><a href="#">Google</a></li>
										<li><a href="#">Linkedin</a></li>
									</ul>
								</li>
							</ul> -->

							<div class="post-box-inner">
								<a href="/chitiet/{{$t->id}}" class="box-read-more"><img src="/images/icon/arrow.png" alt="arrow" /> Chi tiết</a>
								<div class="box-content">
									<a href="/chitiet/{{$t->id}}" class="block-title">{{$t->tieuDe}} </a>
									<p class="time"><i class="fa fa-clock-o"></i> {{$t->ngayDang}}</p>
									<a href="#"><i class="fa fa-heart"></i>{{$t->xem}}</a>
									<p>{{$t->tomTat}} </p>

									<a href="#"><img src="/images/icon/comment-icon.png" alt="comment" /> 13</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
			</div>
			<div class="col-md-4 col-sm-6 widget-sidebar">
				<!-- Latest Post -->
				<aside class="widget widget_latest_post">
					<h3 class="widget-title">Bài viết mới nhất</h3>
					<div class="widget-inner">
						<ul class="post">
							@foreach($trending as $t)
							<li>
								<div class="col-md-5 col-sm-5 col-xs-4">
									<a href="#"><img src="/asm1/upload/Files/{{$t->urlHinh}}" alt="popular-post" /></a>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-8">
									<a href="/chitiet/{{$t->id}}" class="post-title">{{$t->tieuDe}}</a>
									<p>
										<a href="#"><i class="fa fa-heart"></i> {{$t->xem}}</a>
										<span><i class="fa fa-clock-o"></i> {{$t->ngayDang}}</span>
									</p>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</aside>
				<aside class="widget widget_categories">
					<h3 class="widget-title">Danh mục</h3>
					<div class="widget-inner">
						<ul>
							@foreach ($loaitin as $l)
							<li id="tin" class="cat-item">
								<a title="design" href="/tintrongloai/{{$l->id}}">{{$l->ten}}<span>{{$l->sotin}}</span></a>
							</li>
							@endforeach
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
</div>