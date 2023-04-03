@extends('layouts.admin')

@section('content')
<div class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Register') }}</h5>                               
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{ route('admin.adminmanage.register') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="profile-img-wrap edit-img">
                                    <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">Upload</span>
                                        <input class="upload" type="file" name="image">
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                                <input class="form-control datetimepicker" type="text" value="01/01/1999" name="dob">
                                            </div>
                                        </div>
                                    </div>                                           
                                       <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date </label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_join"></div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control" name="gender">
                                                <option disabled>Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ __('Contact Number') }} <span class="text-danger">*</span></label>
                                             <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

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
                                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                     </div>
                                    </div>                                    

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role <span class="text-danger">*</span></label>
                                        <select name="role" id="role" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
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
                                                <option value="0">Select Department</option>
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
                                                <option value="0">Select Designation</option>
                                                <option value="Laravel Developer">Laravel Developer</option>
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                                <option value="Sales Executive">Sales Executive</option>
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