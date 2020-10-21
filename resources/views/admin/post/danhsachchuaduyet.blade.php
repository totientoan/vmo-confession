@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Bài đăng 
                   <small>chưa duyệt</small>
               </h1>
           </div>
           <!-- /.col-lg-12 -->
           @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if (session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr >
                       <th>Thể loại</th>
                       <th>Tiêu đề</th>
                       <th>Nội dung</th>
                       <th>Ngày tạo</th>
                       <th>Điểm</th>
                       <th>Xóa</th>
                       <th>Duyệt bài</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($posts as $pt)
                        <tr class="even gradeC">
                            <td>{{$pt->category->title}}</td>
                            <td>{{$pt->title}}</td>
                            <td>{!!$pt->content!!}</td>
                            <td>{{$pt->created_at}}</td>
                            <td>{{$pt->diem}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/xoa/{{'danhsachchuaduyet'}}/{{$pt->id}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/publish/{{$pt->id}}">Duyệt</a></td>
                        </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
       <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->  
@endsection

