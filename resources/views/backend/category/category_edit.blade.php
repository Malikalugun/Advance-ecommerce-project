@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <div class="row">

         <div class="col-12">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="form-group">
                           <h5>Category Name English<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="category_name_en" value="{{$category->category_name_en}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Category Name Hindi<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="category_name_hin" value="{{$category->category_name_hin}}">
                           </div>
                        </div>
                        <div class="form-group">
                            <h5>Category Icon<span class="text-danger">*</span></h5>
                            <div class="controls">
                               <input type="text" class="form-control" name="category_icon" value="{{$category->category_icon}}">
                            </div>
                         </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update Category">
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->          
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection