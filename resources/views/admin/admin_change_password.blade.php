
@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-full">
   <section class="content">
      <!-- Basic Forms -->
      <div class="box">
         <div class="box-header with-border">
            <h4 class="box-title">Admin Change Password</h4>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <div class="col">
                  <form method="post" action="{{route('update.change.password')}}">
                    @csrf
                     <div class="row">
                        <div class="col-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Current Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input id="current_password" type="password" class="form-control" required="" name="oldpassword">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <h5>New Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input id="password" type="password" class="form-control" required="" name="password">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <h5>Confirm Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input id="password_confirmation" type="password" class="form-control" required="" name="password_confirmation">
                                    </div>
                                 </div>
                              </div>
                            
                           </div>
                          
                        </div>
                     </div>
                     <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Update</button>
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

@endsection