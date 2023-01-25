@extends('layouts.app')

@section('content')

    <div class="container-fluid my-5 py-2">
        <div class="d-flex justify-content-center mb-5">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <!-- Card Basic Info -->
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>New Client</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                            @csrf           
                            <div class="row">
                                <div class="col-md-6">
                                <label for="program">Program</label>
                                <div class="form-group">
                                    <select class="form-control" id="program" name="program_id">
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->name }}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                </div>                                                             
                            </div>                     
                            <div class="row">
                                <div class="col-md-6">
                                <label for="name">Main Applicant</label>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" require/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label for="spouse">Spouse</label>
                                <div class="form-group">
                                    <input type="text" name="spouse" id="spouse" class="form-control"/>
                                </div>
                                </div>                                
                            </div>    
                            <div class="row">
                                <div class="col-md-6">
                                <label for="child1">Child 1</label>
                                <div class="form-group">
                                    <input type="text" name="child1" id="child1" class="form-control"/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label for="child2">Child 2</label>
                                <div class="form-group">
                                    <input type="text" name="spouse" id="child2" class="form-control"/>
                                </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <label for="child3">Child 3</label>
                                <div class="form-group">
                                    <input type="text" name="child3" id="child3" class="form-control"/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label for="child4">Child 4</label>
                                <div class="form-group">
                                    <input type="text" name="child4" id="child4" class="form-control"/>
                                </div>
                                </div>                                
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                <label for="child5">Child 5</label>
                                <div class="form-group">
                                    <input type="text" name="child3" id="child3" class="form-control"/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label for="child6">Child 6</label>
                                <div class="form-group">
                                    <input type="text" name="child6" id="child6" class="form-control"/>
                                </div>
                                </div>                                
                            </div> 
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('clients') }}" class="btn btn-light m-0">Back</a>
                                <button type="submit" class="btn gold_bg m-0 ms-2">Save</button>
                            </div>                                                                                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

