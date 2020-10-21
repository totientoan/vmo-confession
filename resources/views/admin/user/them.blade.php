@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>thêm</small>
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
            
            @if (session('themthanhcong'))
                <div class="alert alert-success">
                    {{session('themthanhcong')}}
                </div>
            @endif

                <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> --}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên người dùng" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input  type="password" class="form-control" name="password" placeholder="Nhập password" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input  type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="quyen" value="nguoidung" checked="" type="radio">Thường
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="admin" type="radio">Admin
                        </label>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Thêm</button>
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