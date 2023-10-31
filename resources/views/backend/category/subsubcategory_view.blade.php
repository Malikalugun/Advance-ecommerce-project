@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-full">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">SubCategory List</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Category </th>
                              <th>Sub Category </th>
                              <th>Sub Category En</th>
                              <th>Sub Category Hin</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($subsubcategory as $item)
                           <tr>
                              {{-- method and name --}}
                            <td>{{$item['category']['category_name_en']}}</td>
                            <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                              <td>{{$item->subsubcategory_name_en}}</td>
                              <td>{{$item->subsubcategory_name_hin}}</td>
                              <td>
                         <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                         <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" title="Delete Data">
                            <i class="fa fa-trash"></i></a>
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
                  <h3 class="box-title">Add Sub Sub SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{ route('subsubcategory.store') }}">
                        @csrf
                        <div class="form-group">
                            <h5>Category Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled>Select Your Category</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="help-block"></div></div>
                        </div>
                        <div class="form-group">
                            <h5>Sub Category Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id"  class="form-control">
                                    <option value="" selected="" disabled>Select Your Sub Category</option>
                                    
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="help-block"></div></div>
                        </div>
                        <div class="form-group">
                           <h5>Sub SubCategory Name English<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subsubcategory_name_en">
                              @error('subsubcategory_name_en')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Sub SubCategory Name Hindi<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" class="form-control" name="subsubcategory_name_hin">
                              @error('subsubcategory_name_hin')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Add New">
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
<script type="text/javascript">
$(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if(category_id){
            $.ajax({
                url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('danger');
        }
    });
});
</script>
@endsection