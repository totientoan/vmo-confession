@extends('admin.layout.index')

@section('content')
    
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Từ khóa
                    <small>sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif

                <form action="admin/tukhoa/sua/{{$tukhoa->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Nội dung từ khóa</label>
                        <input class="form-control" name="title" placeholder="Please Enter Category Name" value="{{$tukhoa->body}}" />
                    </div>
                    <div class="form-group">
                        <label>trạng thái</label>
                        <label class="radio-inline">
                            <input name="quyen" value={{1}}  type="radio"
                                @if ($kt == false)
                                {{'checked'}}
                                @endif
                            >
                            Khảo sát
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value={{0}} type="radio"
                            @if ($kt == true)
                            {{'checked'}}
                            @endif
                            >
                            Dừng khảo sát
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection