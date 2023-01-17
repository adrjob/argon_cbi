@extends('layouts.app')

@section('content')

@include('layouts.navbars.auth.topnav')
    
    <div class="container-fluid my-5 py-2">
        <div class="d-flex justify-content-center mb-5">
            <div class="col-lg-9 mt-lg-0 mt-4">

                <!-- Card Basic Info -->
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('user-edit.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input id="firstname" name="firstname" value="{{ old('firstname') ?? $user->firstname }}" class="form-control" type="text" placeholder="Firstname" >
                                    </div>
                                    @error('firstname')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input id="lastname" name="lastname" value="{{ old('lastname') ?? $user->lastname }}" class="form-control" type="text" placeholder="Lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input id="password" name="password" class="form-control" type="password" placeholder="Password">
                                    </div>
                                    @error('password')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input id="confirm-password" name="confirm-password" class="form-control" type="password" placeholder="Confirm Password">
                                    </div>
                                    @error('confirm-password')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="form-label">Role</label>
                                <select name="role" id="choices-role" class="form-control">
                                    <option value="">Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == old('role', $user->role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <label class="form-label mt-4">Gender</label>
                                    <select class="form-control" name="gender" id="choices-gender">
                                        <option value="">Choose</option>
                                        <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
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
                                        <input id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" type="email" placeholder="example@email.com">
                                    </div>
                                    @error('email')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Confirmation Email</label>
                                    <div class="input-group">
                                        <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="example@email.com"
                                        value="{{ old('confirmation') }}">
                                    </div>
                                    @error('confirmation')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Location</label>
                                    <div class="input-group">
                                        <input id="location" name="location" value="{{ old('location', $user->location) }}" class="form-control" type="text" placeholder="Sydney, A">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Phone Number</label>
                                    <div class="input-group">
                                        <input id="phone" name="phone" value="{{ $user->phone }}" class="form-control" type="number" placeholder="+40 735 631 620">
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
                                        <option value="English" {{ old('language', $user->language) == 'English' ? 'selected' : '' }}>English</option>
                                        <option value="French" {{ old('language', $user->language) == 'French' ? 'selected' : '' }}>French</option>
                                        <option value="Spanish" {{ old('language', $user->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                        <label class="form-label mt-4">Skills</label>
                                        <input class="form-control" id="skills" name="skills" value="{{ old('skills', $user->skills) }}" type="text" placeholder="Enter your skills" />
                                </div>

                                <div class="d-flex flex-column">
                                    <label class="mt-4 form-label" for="avatar">Add Image</label>
                                    <input type="file" name="avatar" accept="image/*" id="avatar" class="form-control">
                                    @error('avatar')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('user-management') }}" class="btn btn-light m-0">Back</a>
                                <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('css')
    <style>
        .choices {
            margin-bottom: 0;
        }

    </style>
@endpush

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

        if (document.getElementById('choices-role')) {
            var role = document.getElementById('choices-role');
            const example = new Choices(role);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                removeItemButton: true,
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
