@extends('layouts.back-pages')
@section('content')
    @include('layouts.partial.sidebar')

    <div class="main-panel">

        @include('layouts.partial.topbar')

        <div class="main-content anchor-styling">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                            <h4 class="title">Document Declined</h4>
                    </div>
                    
                   
                </div>

                    <div class="row "> 
     
                        
                        <div class="col-md-12 ">

                            <div class="card card-inner-spacer card-inner-bottom-2">
                             
                                  

                                <div class="row">


                                            <div class="col-md-6 text-left"> 
                                                
                                                    <h5 class="sub-title-2">{{ $declinedCount }} - Available Documents</h5>
                    
                                            </div>

                                            

                                </div>



                                <div class="content">
                                    
                                    <div class="fresh-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Document ID</th>
                                                    <th>Document Type</th>
                                                    <th>Status</th>
                                                    <th>Owners Name</th>
                                                    <th class="text-right">Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                           
                                            <tbody>
                                            @foreach($documents as $document)
                                                <tr>

                                                    <td>{{ $document->document_id }}</td>
                                                    <td>{{ $document->documentable_type }}</td>
                                                    <td>{{ $document->status }}</td>
                                                    <td>{{ $document->owner->full_name }}</td>


                                                    <td class="text-right">
                                                             <a class="btn btn-default btn-fill small-btn" href="{{ route('declined-show', $document->document_id) }}" > View </a>

                                                        </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->


                    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"> Bio Data </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ">
            <div class="col-md-8">
                    <p>afffa</p>
            </div>
            <div class="col-md-4">
                <p>afffa</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>

@endsection