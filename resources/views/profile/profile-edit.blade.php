<x-app-layout>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{asset('public/backend')}}/images/profile-bg.jpg" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file"
                            class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input"
                            class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ asset('public/' . Auth::user()->profile_images) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{Auth::user()->name}}</h5>
                        <p class="text-muted mb-0">Joining Data: {{date("j F, Y", strtotime(Auth::user()->created_at))}}</p>
                    </div>
                </div>
            </div>
            <!--end card-->

        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-body active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body {{ session('status') == 'Password-updated' ? 'active' : '' }}" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Patient ID</label>
                                            <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your patient id" value="{{$user->unique_patient_id ?? ''}}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Patient Email</label>
                                            <input type="text" name="email" class="form-control" id="lastnameInput" placeholder="Enter your email" value="{{$user->email ?? ''}}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Patient Name</label>
                                            <input type="text" name="name" class="form-control" id="phonenumberInput" placeholder="Enter your name" value="{{$user->name ?? ''}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{$user->phone ?? ''}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="">-- Select --</option>
                                                <option value="Male" {{ ($user->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ ($user->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ ($user->gender ?? old('gender')) == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="bloodGroup" class="form-label">Blood Group</label>
                                            <select class="form-select" id="bloodGroup" name="blood_group">
                                                <option value="">-- Select --</option>
                                                <option value="A+" {{ $user->blood_group ?? old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ ($user->blood_group ?? old('blood_group')) == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ ($user->blood_group ?? old('blood_group')) == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ ($user->blood_group ?? old('blood_group')) == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="O+" {{ ($user->blood_group ?? old('blood_group')) == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option value="O-" {{ ($user->blood_group ?? old('blood_group')) == 'O-' ? 'selected' : '' }}>O-</option>
                                                <option value="K+" {{ ($user->blood_group ?? old('blood_group')) == 'K+' ? 'selected' : '' }}>K+</option>
                                                <option value="K-" {{ ($user->blood_group ?? old('blood_group')) == 'K-' ? 'selected' : '' }}>K-</option>
                                                <option value="AB+" {{ ($user->blood_group ?? old('blood_group')) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option value="AB-" {{ ($user->blood_group ?? old('blood_group')) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option value="Unknown" {{ ($user->blood_group ?? old('blood_group')) == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="maritalStatus" class="form-label">Marital Status</label>
                                            <select class="form-select" id="maritalStatus" name="marital_status">
                                                <option value="">-- Select --</option>
                                                <option value="Single" {{ ($user->marital_status ?? old('marital_status')) == "Single" ? 'selected': ''}}>Single</option>
                                                <option value="Married" {{ ($user->marital_status ?? old('marital_status')) == "Married" ? 'selected': ''}}>Married</option>
                                                <option value="Married with Kids" {{ ($user->marital_status ?? old('marital_status')) == "Married with Kids" ? 'selected': ''}}>Married with Kids</option>
                                                <option value="Divorced" {{ ($user->marital_status ?? old('marital_status')) == "Divorced" ? 'selected': ''}}>Divorced</option>
                                                <option value="Widowed" {{ ($user->marital_status ?? old('marital_status')) == "Widowed" ? 'selected': ''}}>Widowed</option>
                                                <option value="Unwilling to Disclose" {{ ($user->marital_status ?? old('marital_status')) == "Unwilling to Disclose" ? 'selected': ''}}>Unwilling to Disclose</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="Status" class="form-label">Account Status</label>
                                            <select class="form-select" id="Status" name="status">
                                                <option value="1" {{ ($user->status ?? old('status')) == "1" ? 'selected': ''}}>Active</option>
                                                <option value="0" {{ ($user->status ?? old('status')) == "0" ? 'selected': ''}}>Inactive</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Updates</button>
                                            <button type="button" class="btn btn-soft-success">Cancel</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane {{ session('status') == 'Password-updated' ? 'active show' : '' }}" id="changePassword" role="tabpanel">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                            <input type="password" id="oldpasswordInput" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password"  placeholder="Enter old password">
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New Password*</label>
                                            <input type="password" id="newpasswordInput" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter new password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                            <input type="password" id="confirmpasswordInput" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="{{ route('password.request') }}" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                            
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->


    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#profile-img-file-input').on('change', function() {
                alert('hi');
                var formData = new FormData();
                formData.append('profile_images', $('#profile-img-file-input')[0].files[0]);
        
                $.ajax({
                    url: '{{ route("profile.updateImage") }}', // Adjust the route as needed
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#profile-img').attr('src', response.profile_image_url);
                        } else {
                            alert('Failed to update profile image.');
                        }
                    },
                    error: function(response) {
                        alert('An error occurred.');
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>