<!--begin::Content-->
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Form-->
    <form class="form" action="{{ url(route('updateProfile')) }}" method="POST">
        {{ csrf_field() }}
    <!--begin::Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
            </div>
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mb-6">Customer Info</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                            <div class="image-input-wrapper" style="background-image: url('{{ $profile->profile_picture }}')"></div>

                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="profile_avatar_remove"/>
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Title</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="title" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option> {{ $profile->title }} </option>
                            <option value="mr">Mr</option>
                            <option value="madam">Madam</option>
                            <option value="ms">Ms</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="first_name" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->first_name }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="last_name" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->last_name }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Middle Name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="middle_name" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->middle_name }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="gender" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option>{{ $profile->gender }}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="private">Prefer Not to say</option>
                        </select>
                    </div>
                </div>
                
                {{-- Contact Info Section --}}
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Prefix</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <input type="text" name="country_prefix" class="form-control form-control-lg form-control-solid" placeholder="prefix" value="{{ $profile->country_prefix }}"/>
                            <div class="input-group-append"><span class="input-group-text">(Nigeria)</span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                            <input type="text" name="phone_number" class="form-control form-control-lg form-control-solid" value="{{ "0".$profile->phone_number }}" placeholder="07058953712" />
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                            <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ $profile->email }}" placeholder="johndoe@example.com" />
                        </div>
                    </div>
                </div>
                {{-- Country --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Country</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="country" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option> {{ $profile->country->name }} </option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- State --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="state" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option value="">{{ $profile->state->name }}</option>
                        </select>
                    </div>
                </div>

                {{-- LGA --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">LGA</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="lga" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option value="">{{ $profile->lga->name }}</option>
                        </select>
                    </div>
                </div>

                {{-- Ward --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Ward</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="ward" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option value="">{{ $profile->ward->name }}</option>
                        </select>
                    </div>
                </div>

                {{-- SOO --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">State of Origin</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="state_of_origin" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->state_of_origin }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">House Address</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="house_address" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->house_address }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Nationality</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="nationality" class="form-control form-control-lg form-control-solid" type="text" value="{{ $profile->nationality }}"/>
                    </div>
                </div>

                {{-- Marital Status --}}
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Marital Status</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="marital_status" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option>{{ $profile->marital_status }}</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="complicated">Complicated</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Religion</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="religion" class="form-control form-control-solid" id="kt_datatable_search_type">
                            <option>{{ $profile->religion }}</option>
                            <option value="christian">Christian</option>
                            <option value="muslim">Muslim</option>
                            <option value="islam">Islam</option>
                            <option value="pegan">Pegan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">DOB</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group date">
                            <input type="text" name="dob" class="form-control" readonly="" value="{{ $profile->date_of_birth }}" id="kt_datepicker_3">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </form>
        <!--end::Form-->
    </div>
</div>
<!--end::Content-->

<!--Script to load State and LGA from Country-->
@includeif('modules.user.includes.js.fetch')