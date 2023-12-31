@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Slder List</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Slder Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($slider as $item)
                           <tr>
                            <td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;"> </td>
                              <td>
                                @if($item->title == null)
                                <span class="badge badge-pill badge-danger">No Title</span>
                                @else{{$item->title}}
                                @endif
                            </td>
                              <td>{{$item->description}}</td>
                              <td>@if($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else<span class="badge badge-pill badge-danger">InActive</span>
                                @endif
                                </td>
                              <td>
                         <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                         <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data">
                            <i class="fa fa-trash"></i></a>
                            @if($item->status == 1)
                            <a href="{{ route('inactive.slider',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive now"><i class="fa fa-arrow-down"></i> </a>
                                 @else
                                 <a href="{{ route('active.slider',$item->id) }}" class="btn btn-success btn-sm" title="Active now"><i class="fa fa-arrow-up"></i> </a>
                                 @endif
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->          
         </div>
         {{-- add brand --}}
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <h5>Slider Title<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="title">
                            
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Description<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="description">
                             
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Slider Image<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="file" class="form-control"  name="slider_img">
                              @error('slider_img')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Add Brand">
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