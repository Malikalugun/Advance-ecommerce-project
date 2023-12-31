@php
     $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        {{-- foreachend --}}
        @foreach ($categories as $item)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $item->category_icon }}" aria-hidden="true"></i>
          @if (session()->get('language')=='hindi'){{$item->category_name_hin}} @else     {{$item->category_name_en}} @endif
          </a>
          <ul class="dropdown-menu mega-menu">                   
            <li class="yamm-content">
              <div class="row">
                     {{-- subcategory menu --}}
                     @php
                     $subcategories = App\Models\SubCategory::where('category_id',$item->id)->orderBy('subcategory_name_en','ASC')->get(); 
                     @endphp
                     @foreach ($subcategories as $item)
                <div class="col-sm-12 col-md-3">
                  <a href="{{ url('subcategory/product/'.$item->id.'/'.$item->subcategory_slug_en )}}">

                  <h2 class="title">
                    @if (session()->get('language')=='hindi') {{$item->subcategory_name_hin}} @else  {{$item->subcategory_name_en}} @endif
                   </h2>
                   </a>
                   @php
                   $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$item->id)->orderBy('subsubcategory_name_en','ASC')->get();
                       
                   @endphp
                   @foreach ($subsubcategories as $item)
                  <ul class="links list-unstyled">

                    <li><a href="{{url('subsubcategory/product/'.$item->id.'/'.$item->subsubcategory_slug_en)}}">  @if (session()->get('language')=='hindi'){{$item->subsubcategory_name_hin}}@else  {{$item->subsubcategory_name_en}} @endif</a></li>

                  </ul>
                  @endforeach
                </div>

                @endforeach
               

              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        @endforeach
        {{-- endforeach --}}
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu -->