@extends('layouts.admin')

@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.adminmanage.index')}}"><i class="la la-angle-left"></i> Back </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Register') }}</h5>                               
                            </div>
                            <div class="modal-body">

                              <form method="POST" action="{{ route('admin.adminmanage.update') }}" enctype="multipart/form-data">
                                @csrf
                                  <input type="hidden" name="id" value="{{$admin->id}}">
                                    <div class="profile-img-wrap edit-img">
                                        @if($admin->image)
                                    <img class="inline-block" src="{{url('uploads/admin-image/'.$admin->image)}}" alt="user">
                                    @else
                                    <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
                                    @endif
                                    <div class="fileupload btn">
                                        <span class="btn-text">Change</span>
                                        <input class="upload" type="file" name="image">
                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input id="name" type="text" value="{{$admin->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                        </div>
                                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text" value="{{$admin->dob}}" name="dob">
                                            </div>
                                        </div>
                                    </div>                                           
                                       <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date </label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_join" value="{{$admin->date_join}}"></div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control" name="gender">
                                                <option disabled>Select</option>
                                                <option @if ($admin->gender == 'male') selected @endif   value="male">Male</option>
                                                 <option @if ($admin->gender == 'female') selected @endif  value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ __('Contact Number') }} <span class="text-danger">*</span></label>
                                            <input id="mobile" value="{{$admin->mobile}}" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                            <input id="email" value="{{$admin->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                     
                                     <div class="form-group">
                                        <label class="col-form-label">{{ __('Password') }} <span class="text-danger">* </span></label>
                                        <div class="input-group mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     </div>
                                    </div> 
                                     <div class="col-sm-6">                                     
                                     <div class="form-group">
                                        <label class="col-form-label">{{ __('Confirm Password') }} <span class="text-danger">* </span></label>
                                        <div class="input-group mb-3">
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                        </div>
                                     </div>
                                    </div>                                    

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role <span class="text-danger">*</span></label>
                                         <select name="role" id="role" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}" @if($role->name==$admin->getRoleNames()[0]) selected @endif>{{$role->name}}</option>
                                        @endforeach
                                       </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>       
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="select" name="department">
                                                 @if($admin->department != 0)
                                                <option value="{{$admin->department}}" selected>{{$admin->department}}</option>
                                                @else
                                                <option value="0" disabled selected>Select Department</option>
                                                @endif
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Sales & Marketing</option>
                                                 <option value="Web Designing">Web Designing</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation </label>
                                            <select class="select" name="designation">
                                                @if($admin->designation != 0)
                                                <option value="{{$admin->designation}}" selected>{{$admin->designation}}</option>
                                                @else
                                                <option value="0" disabled selected>Select Designation</option>
                                                @endif
                                                <option value="Laravel Developer">Laravel Developer</option>
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                                <option value="Sales Executive">Sales Executive</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status </label>
                                            <select class="select" name="status">
                                            <option value="1" {{$admin->status == 1?'selected':''}}>Active</option> 
                                            <option value="0" {{$admin->status == 0?'selected':''}}>Inactive</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection