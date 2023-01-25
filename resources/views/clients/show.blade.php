@extends('layouts.app')

@section('content')
    
<style>
    .accordion-body {
    padding: 0 !important;
    }
    .text-right {
        text-align: right;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
            
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card" >
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">{{ $clients->name }} Documents</h5>                        
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>                                                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-right">
                                        Action
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $document)
                                                              
                                
                                    <tr>
                                        <td class="text-sm font-weight-normal">                                                                                                                                
                                          {{ $document->name }}                                                                                      
                                        </td>
                                        <td class="text-sm text-right" width='10%'>                                          
                                          @if($document->images and $document->images['doc_id'] == $document->id)
                                          <a href="{{ asset('/client/',).'/'.$clients->id.'/'. $document->images['name'] }}" target="_blank">
                                          <i class="fas fa-eye text-secondary"></i> 
                                          </a>                                           
                                          @else
                                          <form method="POST" class="doc{{ $document->id }}" action="{{ route('image.store', $clients->id) }}" id="image{{$document->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <span class="d-flex"> 
                                            <label for="file-input">                                            
                                              <i class="fas fa-upload text-secondary"></i>                                            
                                            </label>
                                            
                                            <input type="hidden" id="name{{ $document->id }}" name="name" value="{{ $document->name }}">
                                            <input type="hidden" name="type" value="{{ $document->type }}">
                                            <input type="hidden" name="doc_id" value="{{ $document->id }}">
                                            <input type="hidden" name="program_id" value="{{ $document->program_id }}">
                                            <input id="file-input" name="document" type="file" style="display: none" onchange="form.submit()"/>                                               
                                                                                                                                                                                                        
                                            </span>
                                          </form>  
                                          @endif 
                                        </td>
                                        
                                    </tr>
                                
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  
                <br>

          @if($clients->spouse != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingOne">
              <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                {{ $clients->spouse }} / Spouse
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
              <div class="accordion-body text-sm opacity-10">
                @include('dependents.spouse')
              </div>
            </div>
          </div>
          @endif

          @if($clients->child1 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingTwo">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                {{ $clients->child1 }} / Child 1
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
                @include('dependents.child1')
              </div>
            </div>
          </div>
          @endif

          @if($clients->child2 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingThree">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                {{ $clients->child2 }} / Child 2
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
              @include('dependents.child2')
              </div>
            </div>
          </div>
          @endif

          @if($clients->child3 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingFour">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                {{ $clients->child3 }} / Child 3
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
              @include('dependents.child3')
              </div>
            </div>
          </div>
          @endif  

          @if($clients->child4 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingFifth">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                {{ $clients->child4 }} / Child 4
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
                @include('dependents.child4')
              </div>
            </div>
          </div>
          @endif  

          @if($clients->child5 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingFifth">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#child55" aria-expanded="false" aria-controls="child55">
                {{ $clients->child5 }} / Child 5
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="child55" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
                @include('dependents.child5')
              </div>
            </div>
          </div>
          @endif  

          @if($clients->child6 != NULL)
          <div class="accordion-item mb-3">
            <h5 class="accordion-header" id="headingFifth">
              <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#child66" aria-expanded="false" aria-controls="child66">
                {{ $clients->child6 }} / Child 6
                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
              </button>
            </h5>
            <div id="child66" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
                @include('dependents.child6')
              </div>
            </div>
          </div>
          @endif 
                
</div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/datatables.js"></script>
    
    <script>        
        const main = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            pageLength : 5,
        });
        

        const spouse = new simpleDatatables.DataTable("#spouse", {
            searchable: true,
            pageLength : 5,
        });

        const child1 = new simpleDatatables.DataTable("#child1", {
            searchable: true,
           
        });

        const child2 = new simpleDatatables.DataTable("#child2", {
            searchable: true,
           
        });

        const child3 = new simpleDatatables.DataTable("#child3", {
            searchable: true,
           
        });

        const child4 = new simpleDatatables.DataTable("#child4", {
            searchable: true,
           
        });

        const child5 = new simpleDatatables.DataTable("#child5", {
            searchable: true,
           
        });

        const child6 = new simpleDatatables.DataTable("#child6", {
            searchable: true,
           
        });

    </script>
@endpush
