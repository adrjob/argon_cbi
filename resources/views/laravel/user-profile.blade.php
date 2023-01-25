@extends('layouts.app')

@section('content')

@include('layouts.navbars.auth.topnav')
    
    <div class="container-fluid my-5 py-2">
        <div class="d-flex justify-content-center mb-5">
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->
                <div class="card card-body" id="profile">
                    <div class="row justify-content-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <div>
                                    <label for="file-input"
                                        class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                        <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            aria-hidden="true" data-bs-original-title="Edit Image"
                                            aria-label="Edit Image"></i>
                                        <span class="sr-only">Edit Image</span>
                                    </label>

                                    <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                        <img src="{{ auth()->user()->avatarUrl() }}" alt="bruce"
                                            class="w-100 border-radius-lg shadow-sm">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder">
                                    {{ auth()->user()->firstname ?? '' }}
                                    {{ auth()->user()->lastname ?? '' }}
                                </h5>                                
                            </div>
                        </div>
                        <!-- <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <label class="form-check-label mb-0">
                                <small id="profileVisibility">
                                    Switch to invisible
                                </small>
                            </label>
                            <div class="form-check form-switch ms-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked
                                    onchange="visible()">
                            </div>
                        </div> -->
                    </div>
                </div>

                <div id="alert" class="pt-4">
                    @include('components.alert')
                </div>

                <!-- Card Basic Info -->
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('user-profile.perform') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" id="file-input" accept="image/*" class="d-none">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input id="firstname" name="firstname" class="form-control" type="text"
                                            value="{{ auth()->user()->firstname }}" placeholder="Alec">
                                    </div>
                                    @error('firstname')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input id="lastname" name="lastname" class="form-control" type="text"
                                            value="{{ auth()->user()->lastname }}" placeholder="Thompson">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <label class="form-label mt-4">I'm</label>
                                    <select class="form-control" name="gender" id="choices-gender">
                                        <option value="">Choose</option>
                                        <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-5 col-5">
                                            <label class="form-label mt-4">Birth Date</label>
                                            <select class="form-control" name="choices-month" id="choices-month">
                                                <option value="">Month</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 col-3">
                                            <label class="form-label mt-4">&nbsp;</label>
                                            <select class="form-control" name="choices-day" id="choices-day">
                                                <option value="">Day</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-4">
                                            <label class="form-label mt-4">&nbsp;</label>
                                            <select class="form-control" name="choices-year" id="choices-year">
                                                <option value="">Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Email</label>
                                    <div class="input-group">
                                        <input id="email" name="email" class="form-control" type="email"
                                            {{ config('app.is_demo') && (auth()->user()->id == 1 || auth()->user()->id == 2 || auth()->user()->id == 3)? 'disabled': '' }}
                                            value="{{ old('email', auth()->user()->email) }}"
                                            placeholder="example@email.com">
                                    </div>
                                    @error('email')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Confirmation Email</label>
                                    <div class="input-group">
                                        <input id="confirmation" name="confirmation" class="form-control" type="email"
                                            {{ config('app.is_demo') && (auth()->user()->id == 1 || auth()->user()->id == 2 || auth()->user()->id == 3)? 'disabled': '' }}
                                            value="{{ old('email', auth()->user()->email) }}"
                                            placeholder="example@email.com">
                                    </div>
                                    @error('confirmation')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                @if (config('app.is_demo'))
                                    <p class="text-xs pt-1">You cannot change the email in the demo version</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Your location</label>
                                    <div class="input-group">
                                        <input id="location" name="location" class="form-control" type="text"
                                            value="{{ auth()->user()->location }}" placeholder="Sydney, A">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Phone Number</label>
                                    <div class="input-group">
                                        <input id="phone" name="phone" class="form-control" type="number"
                                            value="{{ old('phone') ?? auth()->user()->phone }}" placeholder="+40 735 631 620">
                                    </div>
                                    @error('phone')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <label class="form-label mt-4">Language</label>
                                    <select class="form-control" name="language" id="choices-language">
                                        <option value="">Choose</option>
                                        <option value="English"
                                            {{ auth()->user()->language == 'English' ? 'selected' : '' }}>English
                                        </option>
                                        <option value="French"
                                            {{ auth()->user()->language == 'French' ? 'selected' : '' }}>French</option>
                                        <option value="Spanish"
                                            {{ auth()->user()->language == 'Spanish' ? 'selected' : '' }}>Spanish
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-4">Skills</label>
                                    <input class="form-control" id="skills" name="skills" type="text"
                                        value="{{ auth()->user()->skills }}" placeholder="Enter your skills" />
                                </div>
                            </div>
                            <button type="submit" class="btn gold_bg btn-sm float-end mt-6 mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script>
        var birthdayArray = <?php echo !empty($birthdayArray) ? json_encode($birthdayArray) : '"0"'; ?>;
        var selectedYear = birthdayArray["year"];
        var selectedMonth = Math.floor(birthdayArray["month"]);
        var selectedDay = birthdayArray["day"];

        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
            });
        }

        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;
                if (selectedYear > 0) {
                    if (y == selectedYear) {
                        optn.selected = true;
                    }
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-day')) {
            var day = document.getElementById('choices-day');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (selectedDay > 0) {
                    if (y == selectedDay) {
                        optn.selected = true;
                    }
                }

                day.options.add(optn);
            }

        }

        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (selectedMonth > 0) {
                    if (optn.value == selectedMonth) {
                        optn.selected = true;
                    }
                }
                month.options.add(optn);
            }
        }

        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Switch to visible") {
                    elem.innerHTML = "Switch to invisible"
                } else {
                    elem.innerHTML = "Switch to visible"
                }
            }
        }

        var openFile = function(event) {
            var input = event.target;

            // Instantiate FileReader
            var reader = new FileReader();
            reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile +
                    '" class="rounded-circle w-100 shadow" />';
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
@endpush
