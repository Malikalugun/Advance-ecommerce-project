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
                  <h3 class="box-title">Edit Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                        <div class="form-group">
                           <h5>Brand Name English<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="brand_name_en" value="{{$brand->brand_name_en}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="brand_name_hin" value="{{$brand->brand_name_hin}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Brand Image<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="file" class="form-control"  name="brand_image">
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update Brand">
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