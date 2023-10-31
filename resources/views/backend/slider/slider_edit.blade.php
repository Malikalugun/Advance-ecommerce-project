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
                  <h3 class="box-title">Edit Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <input type="hidden" name="old_image" value="{{$slider->slider_img}}">
                        <div class="form-group">
                           <h5>title<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Description<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="description" value="{{$slider->description}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Slider Image<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="file" class="form-control"  name="slider_img">
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update Slider">
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