@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-full">
   <!-- Content Header (Page header) -->
   <section class="content">
      <!-- Basic Forms -->
      <div class="box">
         <div class="box-header with-border">
            <h4 class="box-title">Edit Products</h4>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <div class="col">
                  <form action="{{route('product.update')}}" method="post">
                     @csrf
                     <input type="hidden" name="id" value="{{$products->id}}">
                     <div class="row">
                        <div class="col-12">
                           {{-- start 1st row --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <select name="brand_id"  class="form-control" required="">
                                          <option value="" selected="" disabled>Select Your Brand</option>
                                          @foreach ($brand as $item)
                                          <option value="{{$item->id}}" {{$item->id == $products->brand_id ? 'selected':''}}>{{$item->brand_name_en}}</option>
                                          @endforeach
                                       </select>
                                       @error('brand_id')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>CategorySelect <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <select name="category_id"  class="form-control" required="">
                                          <option value="" selected="" disabled>Select Your Category</option>
                                          @foreach ($categories as $item)
                                          <option value="{{$item->id}}" {{$item->id == $products->category_id ? 'selected':''}}>{{$item->category_name_en}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <select name="subcategory_id"  class="form-control" required="">
                                          <option value="" selected="" disabled>Select Your SubCategory</option>
                                          @foreach ($subcategories as $item)
                                          <option value="{{$item->id}}" {{$item->id == $products->subcategory_id ? 'selected':''}}>{{$item->subcategory_name_en}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{-- end 1st row --}}
                           {{-- start 2nd row --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Sub Subcategory <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <select name="subsubcategory_id"  class="form-control" required="">
                                          <option value="" selected="" disabled>Select Sub Subcategory</option>
                                          @foreach ($subsubcategories as $item)
                                          <option value="{{$item->id}}" {{$item->id == $products->subsubcategory_id  ? 'selected':''}}>{{$item->subsubcategory_name_en}}</option>
                                          @endforeach
                                       </select>
                                       @error('subsubcategory_id')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product name En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_name_en" class="form-control" required="" value="{{$products->product_name_en}}"> 
                                    </div>
                                    @error('product_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_name_hin" class="form-control" required="" value="{{$products->product_name_hin}}"> 
                                    </div>
                                    @error('product_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           {{-- end 2 row --}}
                           {{-- start 3rd row --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_code" class="form-control" required="" value="{{$products->product_code}}"> 
                                    </div>
                                    @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Quntity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_qty" class="form-control" required="" value="{{$products->product_qty}}"> 
                                    </div>
                                    @error('product_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Tags English1<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_tags_en" class="form-control" required="" value="{{$products->product_tags_en}}" data-role="tagsinput"> 
                                    </div>
                                    @error('product_tags_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           {{-- end 3 row --}}
                           {{-- row 4 start --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Tags Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_tags_hin" class="form-control" required="" value="{{$products->product_tags_hin}}" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                    </div>
                                    @error('product_tags_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Size English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_size_en" class="form-control" value="{{$products->product_size_en}}" data-role="tagsinput"> 
                                    </div>
                                    @error('product_size_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_size_hin" class="form-control" value="{{$products->product_size_hin}}" data-role="tagsinput"> 
                                    </div>
                                    @error('product_size_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           {{-- row 4 end --}}
                           {{-- row 5 start --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Color English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_color_en" class="form-control" required="" value="{{$products->product_color_en}}" data-role="tagsinput"> 
                                    </div>
                                    @error('product_color_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Color Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="product_color_hin" class="form-control" required="" value="{{$products->product_color_hin}}" data-role="tagsinput"> 
                                    </div>
                                    @error('product_color_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="selling_price" class="form-control" required="" value="{{$products->selling_price}}"> 
                                    </div>
                                    @error('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           {{-- row 5 end --}}
                           {{-- row 6 start  --}}
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Discout Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="discount_price" class="form-control" value={{$products->discount_price}}> 
                                    </div>
                                 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumUrl(this)"> 
                                    </div>
                                    @error('product_thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThumb" alt="">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <h5>Product Multi image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                    </div>
                                    @error('multi_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                 </div>
                              </div>
                           </div>
                           {{-- end 6 row --}}
                           {{-- 7 --}}
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <textarea id="short_descp_en" name="short_descp_en" class="form-control" required=""placeholder="Textarea">{{$products->short_descp_en}}</textarea> 
                                       @error('short_descp_en')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <textarea id="short_descp_hin" name="short_descp_hin" class="form-control" required="" placeholder="Textarea">{{$products->short_descp_hin}}</textarea> 
                                       @error('short_descp_hin')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{-- 7 end --}}
                           {{-- row 8 start --}}
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Long Description En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <textarea id="editor1" name="long_descp_en" rows="10" cols="80" style="visibility: hidden; display: none;" required="">{{$products->long_descp_en}}
                                       </textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Long Description Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <textarea id="editor2" name="long_descp_hin" rows="10" cols="80" style="visibility: hidden; display: none;" required="">{{$products->long_descp_hin}}
                                       </textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{-- 8 row end --}}
                           {{-- 9 start --}}
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="controls">
                                       <fieldset>
                                          <input type="checkbox" id="checkbox_1" value="1" name="hot_deals">
                                          <label for="checkbox_1">Hot Deals</label>
                                       </fieldset>
                                       <fieldset>
                                          <input type="checkbox" id="checkbox_2" value="1" name="featured">
                                          <label for="checkbox_2">Featured</label>
                                       </fieldset>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="controls">
                                       <fieldset>
                                          <input type="checkbox" id="checkbox_3" value="1" name="special_offer">
                                          <label for="checkbox_3">Special Offer</label>
                                       </fieldset>
                                       <fieldset>
                                          <input type="checkbox" id="checkbox_4" value="1" name="special_deals">
                                          <label for="checkbox_4">Special Deals</label>
                                       </fieldset>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{-- 9 end --}}
                        </div>
                     </div>
                     <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
                     </div>
                  </form>
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </section>
   {{-- multi image start --}}
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box br-3 border-danger p-4">
               <div class="box-header">
                  <h4 class="box-title">Products Multiple Image <strong>Update</strong></h4>
               </div>
               <form action="{{route('update.product.image')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row row-sm">
                    @foreach ($multi_img as $item)
                     <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                           <img src="{{asset($item->photo_name)}}" class="card-img-top" alt="..." style="width: 18rem;height:18rem;">
                           <div class="card-body">
                              <h5 class="card-title"><a href="{{route('product.multiimg.delete',$item->id)}}" class="btn btn-danger btn-sm" title="Delete Data"><i class="fa fa-trash"></i></a></h5>
                              <p class="card-text"><div class="form-group">
                              <label class="form-control-lable">Change Image <span class="text-danger">*</span></label>  
                              <input type="file" class="form-control" name="multi_img[{{$item->id}}]"> 
                              </div></p>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="text-xs-right">
                     <input type="submit" class="btn btn-rounded btn-info" value="Update Images">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   {{-- multi  image end --}}
    {{-- thumbnail image start --}}
    <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box br-3 border-danger p-4">
               <div class="box-header">
                  <h4 class="box-title">Products Thumb Image <strong>Update</strong></h4>
               </div>
               <form action="{{route('update.product.thumbnail')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$products->id}}">
                  <input type="hidden" name="old_image" value="{{$products->product_thumbnail}}">
                  <div class="row row-sm">
               
                     <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                           <img src="{{asset($products->product_thumbnail)}}" class="card-img-top" alt="..." style="width: 18rem;height:18rem;">
                           <div class="card-body">
                              <p class="card-text"><div class="form-group">
                              <label class="form-control-lable">Change Image <span class="text-danger">*</span></label>  
                              <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumUrl(this)"> 
                              <img src="" id="mainThumb" alt="">
                           </div>
                              </div></p>
                           </div>
                        </div>
                     </div>
                     <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Update Images">
                     </div>
                  </div>
                  
               </form>
            </div>
         </div>
      </div>
   </section>
   {{-- thumbnail  image end --}}
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
                       $('select[name="subsubcategory_id"]').html('');
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
       $('select[name="subcategory_id"]').on('change',function(){
           var subcategory_id = $(this).val();
           if(subcategory_id){
               $.ajax({
                   url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data){
                       var d = $('select[name="subsubcategory_id"]').empty();
                       $.each(data,function(key,value){
                           $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">' + value.subsubcategory_name_en + '</option>');
                       });
                   },
               });
           }else{
               alert('danger');
           }
       });
   });
</script>
{{-- thumbnail --}}
<script type="text/javascript">
   function mainThumUrl(input){
       if(input.files && input.files[0]){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#mainThumb').attr('src',e.target.result).width(80).height(80);
           };
           reader.readAsDataURL(input.files[0])
       }
   }
</script>
{{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}
<script>
   $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
       if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
       {
           var data = $(this)[0].files; //this file data
            
           $.each(data, function(index, file){ //loop though each file
               if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                   var fRead = new FileReader(); //new filereader
                   fRead.onload = (function(file){ //trigger function on successful read
                   return function(e) {
                       var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                   .height(80); //create image element 
                       $('#preview_img').append(img); //append image to output element
                   };
                   })(file);
                   fRead.readAsDataURL(file); //URL representing the file's data.
               }
           });
            
       }else{
           alert("Your browser doesn't support File API!"); //if File API is absent
       }
    });
   });
    
</script>
{{-- ================================= End Show Multi Image JavaScript Code. ==================== --}}
@endsection