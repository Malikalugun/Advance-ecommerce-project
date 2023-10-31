@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-full">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <div class="row">
      
         <div class="col-12">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Sub Sub SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('subsubcategory.update') }}">
                        @csrf
                        <input type="hidden" name="id" id="" value="{{$subsubcategories->id}}">
                        <div class="form-group">
                            <h5>Category Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled>Select Your Category</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $subsubcategories->category_id ? 'selected':''}}>{{$item->category_name_en}}</option>
                                    @endforeach
                                </select>
                            <div class="help-block"></div></div>
                        </div>
                        <div class="form-group">
                            <h5>Sub Category Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id"  class="form-control">
                                    <option value="" selected="" disabled>Select Your Sub Category</option>
                                    @foreach ($subcategories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $subsubcategories->category_id ? 'selected':''}}>{{$item->subcategory_name_en}}</option>
                                    @endforeach
                                </select>
                            <div class="help-block"></div></div>
                        </div>
                        <div class="form-group">
                           <h5>Sub SubCategory Name English<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subsubcategory_name_en" value="{{$subsubcategories->subsubcategory_name_en}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Sub SubCategory Name Hindi<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subsubcategory_name_hin" value="{{$subsubcategories->subsubcategory_name_hin}}">
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update">
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