@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->name}}</small>
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
            
            @if (session('suathanhcong'))
                <div class="alert alert-success">
                    {{session('suathanhcong')}}
                </div>
            @endif

                <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{$user->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email" value="{{$user->email}}"  readonly="" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name = "changePassword" id="changePassword">
                        <label>Đổi Password</label>
                        <input  type="password" class="form-control password" name="password" placeholder="Nhập password" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input  type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại password" disabled="" />
                    </div>

                    <?php
                        $kt = false;
                        if(count($model_has_roles->where('model_id','=',$user->id)->where('role_id','=',1)) >= 1){
                            $kt = true;
                        }                
                    ?>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="quyen" value="nguoidung"  type="radio"
                                @if ($kt == false)
                                {{'checked'}}
                                @endif
                            >
                            Thường
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="admin" type="radio"
                            @if ($kt == true)
                            {{'checked'}}
                            @endif
                            >
                            Admin
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

@section('script')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked")){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled','');
                }
            });
        });
    </script>
@endsection

