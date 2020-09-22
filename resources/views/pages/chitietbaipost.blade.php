 @extends('layout.index')

 @section('content')
 
 <!-- Page Content -->
 <div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            {{-- <h3>{{$post->category->title}}</h3> --}}
            <h1>{{$post->title}}</h1>

            <p class="lead">{!!$post->content!!}</p>
            <table class="table table-striped table-bordered table-hover">
                <tr align="center">
                    <th>
                        {{$count_like}}
                        <a href="">like   </a>
                    </th>
                    <th>
                        {{$count_dislike}}
                        <a href="">dislike</a>
                    </th>
                    <th>
                        {{number_format($rate ,2)}}
                        <a href="">rate   </a>
                        <select name="theloai" id = "theloai">

                            <option value="1">{{1}}</option>
                            <option value="2">{{2}}</option>
                            <option value="3">{{3}}</option>
                            <option value="4">{{4}}</option>
                            <option value="5">{{5}}</option>
                            
                        </select>
                    </th>
                    
                </tr>
            </table>
            <!-- Post Content -->
            {{-- <p class="lead">{!!$tintuc->NoiDung!!}</p> --}}
            
            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if (Auth::check())

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
            @endif

            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="" method="post" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

            @endif

            <!-- Posted Comments -->

            <!-- Comment -->
            <?php $comments = $post->comments;
            ?>

            @foreach ($comments as $cm)
            
            <div class="media" >
                <a class="pull-left" href="#">
                    <img class="media-object" src="image/user/user_icon_153312.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">User
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    <div class="well">
                    {{$cm->body}}
                    <h6>
                        <a href="">like</a>
                        
                    </h6>

                    <?php
                        $cmparent = $cm->comments;
                    ?>

                    @foreach ($cmparent as $cmchil)
                    <div>
                        {{$cmchil->body}}
                        <h6>
                            <a href="">like</a>
                        </h6>
                    </div>
                    @endforeach
                    </div>
                    <div>
                        <label>nhập bình luận</label>
                        <form role="form" action="" method="post" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="text" class="form-control" name="password">
                            <button type="submit" >bình luận</button>
                        </form>
                    </div>
                    
                </div>
            </div>

            @endforeach

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    @foreach ($postLienquan as $plq)
                        
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="">
                                <img class="img-responsive" src="image/user/user_icon_153312.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href=""><b>{!!$plq->category->title!!}</b></a>
                        </div>
                        <p style="padding-left: 5px">{!!$plq->title!!}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->

                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin mới nhất</b></div>
                <div class="panel-body">

                    @foreach ($postMoinhat as $pmn)

                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="">
                                <img class="img-responsive" src="image/user/user_icon_153312.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="#"><b>{!!$pmn->category->title!!}</b></a>
                        </div>
                        <p style="padding-left: 5px">{!!$pmn->title!!}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach

                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection