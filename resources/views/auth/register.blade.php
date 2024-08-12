<x-guest-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <!-- Slider -->
                    <div class="col-lg-6">
                        <div class="p-lg-5 p-4 auth-one-bg h-100">
                            <div class="bg-overlay"></div>
                            <div class="position-relative h-100 d-flex flex-column">
                                <div class="mb-4">
                                    <a href="index.html" class="d-block">
                                        <img src="{{asset('public/backend')}}/images/logo-light.png" alt="" height="18">
                                    </a>
                                </div>
                                <div class="mt-auto">
                                    <div class="mb-3">
                                        <i class="ri-double-quotes-l display-4 text-success"></i>
                                    </div>

                                    <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner text-center text-white pb-5">
                                            <div class="carousel-item active">
                                                <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                            </div>
                                            <div class="carousel-item">
                                                <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>
                                            </div>
                                            <div class="carousel-item">
                                                <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <!-- From -->
                    <div class="col-lg-6">
                        <div class="p-lg-5 p-4">
                            <div>
                                <h5 class="text-primary">Register Account</h5>
                                <p class="text-muted">Get your Free myHealthLine account now.</p>
                            </div>

                            <div class="mt-4">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                            
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" class="form-control" id="name" placeholder="Enter name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email" class="form-control" id="email" placeholder="Enter email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                            
                            
                                    <div class="row mb-2">
                                        <!-- Gender -->
                                        <div class="col-lg-4">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                <option value="">-- Select --</option>
                                                <option value="Male" {{ ($user->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ ($user->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ ($user->gender ?? old('gender')) == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>
                                        <!-- Blood Group -->
                                        <div class="col-lg-4">
                                            <label for="bloodGroup" class="form-label">Blood Group</label>
                                            <select class="form-select" id="bloodGroup" name="blood_group" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                            <x-input-error :messages="$errors->get('blood_group')" class="mt-2" />
                                        </div>
                                        <!-- Marital Status -->
                                        <div class="col-lg-4">
                                            <label for="maritalStatus" class="form-label">Marital Status</label>
                                            <select class="form-select" id="maritalStatus" name="marital_status" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                <option value="">-- Select --</option>
                                                <option value="Single" {{ ($user->marital_status ?? old('marital_status')) == "Single" ? 'selected': ''}}>Single</option>
                                                <option value="Married" {{ ($user->marital_status ?? old('marital_status')) == "Married" ? 'selected': ''}}>Married</option>
                                                <option value="Married with Kids" {{ ($user->marital_status ?? old('marital_status')) == "Married with Kids" ? 'selected': ''}}>Married with Kids</option>
                                                <option value="Divorced" {{ ($user->marital_status ?? old('marital_status')) == "Divorced" ? 'selected': ''}}>Divorced</option>
                                                <option value="Widowed" {{ ($user->marital_status ?? old('marital_status')) == "Widowed" ? 'selected': ''}}>Widowed</option>
                                                <option value="Unwilling to Disclose" {{ ($user->marital_status ?? old('marital_status')) == "Unwilling to Disclose" ? 'selected': ''}}>Unwilling to Disclose</option>
                                            </select> 
                                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        <div id="passwordInput" class="form-text">Must be at least 8 characters.</div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label class="form-label" for="confirm-password-input">Confirm Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password_confirmation" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                        <h5 class="fs-13">Password must contain:</h5>
                                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                        <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                        <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                        <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>



                                    <div class="mt-4">
                                        <button class="btn btn-dark w-100" type="submit">Sign Up</button>
                                    </div>
                                </form>
                            </div>

                            <div class="mt-2 text-center">
                                <p class="mb-0">Already registered? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin</a> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

    </div>
</x-guest-layout>

