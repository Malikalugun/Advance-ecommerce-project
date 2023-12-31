@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-full">
<!-- Content Header (Page header) -->
<section class="content">
   <!-- Basic Forms -->
   <div class="box">
   <div class="box-header with-border">
      <h4 class="box-title">Add Products</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div class="row">
         <div class="col">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
               @csrf
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
                                    <option value="{{$item->id}}">{{$item->brand_name_en}}</option>
                                    @endforeach
                                 </select>
                                 @error('brand_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                 <div class="help-block"></div>
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
                                    <option value="{{$item->id}}">{{$item->category_name_en}}</option>
                                    @endforeach
                                 </select>
                                 @error('category_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                 <div class="help-block"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <h5>Sub Category Select <span class="text-danger">*</span></h5>
                              <div class="controls">
                                 <select name="subcategory_id"  class="form-control" required="">
                                    <option value="" selected="" disabled>Select Your SubCategory</option>
                                    {{-- @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->category_name_en}}</option>
                                    @endforeach --}}
                                 </select>
                                 @error('subsubcategory_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                 <div class="help-block"></div>
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
                                    @foreach ($brand as $item)
                                    <option value="{{$item->id}}">{{$item->brand_name_en}}</option>
                                    @endforeach
                                 </select>
                                 @error('subsubcategory_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                 <div class="help-block"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <h5>Product name En <span class="text-danger">*</span></h5>
                              <div class="controls">
                                 <input type="text" name="product_name_en" class="form-control" required="" data-validation-required-message="This field is required"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_name_hin" class="form-control" required="" data-validation-required-message="This field is required"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_code" class="form-control" required="" data-validation-required-message="This field is required"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_qty" class="form-control" required="" data-validation-required-message="This field is required"> 
                                 <div class="help-block"></div>
                              </div>
                              @error('product_qty')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <h5>Product Tags English<span class="text-danger">*</span></h5>
                              <div class="controls">
                                 <input type="text" name="product_tags_en" class="form-control" required="" data-validation-required-message="This field is required" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_tags_hin" class="form-control" required="" data-validation-required-message="This field is required" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_size_en" class="form-control" required="" data-validation-required-message="This field is required" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_size_hin" class="form-control" required="" data-validation-required-message="This field is required" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_color_en" class="form-control" required="" data-validation-required-message="This field is required" value="Red,Black,Blue" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="product_color_hin" class="form-control" required="" data-validation-required-message="This field is required" value="Red,Black,Blue" data-role="tagsinput"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="selling_price" class="form-control" required="" data-validation-required-message="This field is required"> 
                                 <div class="help-block"></div>
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
                                 <input type="text" name="discount_price" class="form-control"> 
                                 <div class="help-block"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                              <div class="controls">
                                 <input type="file" name="product_thumbnail" class="form-control" required="" onChange="mainThumUrl(this)"> 
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
                                 <input type="file" name="multi_img[]" class="form-control" required=""multiple="" id="multiImg">
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
                                 <textarea id="short_descp_en" name="short_descp_en" class="form-control" required=""placeholder="Textarea"></textarea> 
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
                                 <textarea id="short_descp_hin" name="short_descp_hin" class="form-control" required="" placeholder="Textarea"></textarea> 
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
                                 <textarea id="editor1" name="long_descp_hin" rows="10" cols="80" style="visibility: hidden; display: none;" required="">
                                 </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <h5>Long Description Hin <span class="text-danger">*</span></h5>
                              <div class="controls">
                                 <textarea id="editor2" name="long_descp_hin" rows="10" cols="80" style="visibility: hidden; display: none;" required="">
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
                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                    <label for="checkbox_2">Hot Deals</label>
                                 </fieldset>
                                 <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                    <label for="checkbox_3">Featured</label>
                                 </fieldset>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                    <label for="checkbox_4">Special Offer</label>
                                 </fieldset>
                                 <fieldset>
                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                    <label for="checkbox_5">Special Deals</label>
                                 </fieldset>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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