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
                  <h3 class="box-title">Edit SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('subcategory.update',$subcategory->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$subcategory->id}}">
                        <div class="form-group">
                            <h5>Category Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled>Select Your Category</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}"{{$item->id == $subcategory->category_id ? 'selected':''}}>{{$item->category_name_en}}</option>
                                    @endforeach
                                </select>
                            <div class="help-block"></div></div>
                        </div>
                        <div class="form-group">
                           <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>SubCategory Name Hindi<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subcategory_name_hin" value="{{$subcategory->subcategory_name_hin}}">
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update SubCategory">
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