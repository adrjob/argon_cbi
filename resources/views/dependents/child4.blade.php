<div class="row mt-4">
            <div class="col-12">
                <div class="card" >
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">{{ $clients->child4 }} Documents</h5>                        
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="child4">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>                                                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                @if($document->type == 5)
                                    <tr>
                                        <td class="text-sm font-weight-normal">                                            
                                            {{ $document->name }}
                                        </td>
                                        <td class="text-sm">
                                            <span class="d-flex">                                                
                                                    <a href="" class="me-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Upload">
                                                        <i class="fas fa-upload text-secondary"></i>
                                                    </a>                                                                                                                                                        
                                            </span>
                                        </td>
                                        
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>