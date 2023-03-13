<div id="blog-section" class="blog-section">
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <article>
                    @foreach($chitiettin as $c)
                    <div class="blog-box">
                        <div class="entry-cover">
                            <a href="#"><img src="/asm1/upload/Files/{{$c->urlHinh}}" alt="single-post" /></a>
                            
                        </div>
                        <div class="blog-content">
                            <h2 class="entry-title text-center">{{$c->tieuDe}} </h2>
                            
                            <p ><i class="fa fa-clock-o"></i> {{$c->ngayDang}}</p>
                            <h4>Tóm tắt:</h4>
                            <p class="list-group-item list-group-item-secondary" >{{$c->tomTat}}</p>

                            <h4>Nội dung:</h4>
                            <p class="list-group-item list-group-item-dark" > {{$c->noiDung}}</p>
                          
                            @endforeach
                        </div>
                </article>
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