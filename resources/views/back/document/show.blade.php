@extends('layouts.back-pages')
@section('content')
    @include('layouts.partial.sidebar')

    <div class="main-panel">

        @include('layouts.partial.topbar')
        <div class="main-content">
            <div class="container-fluid">
                <div class="status-check">
                    <p> Status</p>
                    <h5 class="title pending"> {{ $document->status }}</h5>
                </div>
                <div class="row modal-modifier doc-view">
                    <!-- Left Panel Starts here-->
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-inner-spacer bottom-buffer">
                               <!-- ********first row******** -->
                                <div class="row border-bottom">
                                    <h2> Bio-Data </h2>
                                        <div class="col-md-8">
                                            <h5>First Name</h5>
                                            <h3>{{ $document->owner->full_name }}</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Unique id #</h5>
                                            <h3>{{ $document->owner->owner_id }}</h3>
                                        </div>
                                </div>
                                    <!-- ********first row******** -->

                                    <!-- ********Second row******** -->

                                    <div class="row border-bottom">
                                            <div class="col-md-4">
                                                <h5>Date of Birth</h5>
                                                <h3>{{ $document->owner->date_of_birth }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Marital Status</h5>
                                                <h3>{{ $document->owner->marital_status }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Occupation</h5>
                                                <h3>{{ $document->owner->occupation }}</h3>
                                            </div>
                                    </div>

                                    <!-- ********Second row******** -->

                                    <!-- ********Thirdrow******** -->

                                    <div class="row border-bottom">
                                            <div class="col-md-12">
                                                <h5>Street Address</h5>
                                                <h3>{{ $document->owner->address }}</h3>
                                            </div>
                                    </div>
                                    <!-- ********Thirdrow******** -->

                                    <!-- ********Fourthrow******** -->
                                    <div class="row border-bottom">
                                            <div class="col-md-4">
                                                <h5>City</h5>
                                                <h3>{{ $document->owner->city }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>LGA/LCDA</h5>
                                                <h3>{{ $document->owner->lga_lcda }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Nearest Bust-Stop</h5>
                                                <h3>{{ $document->owner->nearest_bus_stop }}</h3>
                                            </div>
                                    </div>
                                    <!-- ********Fourthrow******** -->

                                    <!-- ********Fifthrow******** -->
                                    <div class="row border-bottom">
                                            <div class="col-md-4">
                                                <h5>Telephone</h5>
                                                <h3>{{ $document->owner->telephone }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Mobile</h5>
                                                <h3>{{ $document->owner->mobile }}</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Email</h5>
                                                <h3>{{ $document->owner->email_address }}</h3>
                                            </div>
                                    </div>

                                    <!-- ********Fifthrow******** -->
                                </div>
<!--*****************************************************************************************************************-->
                                <!-- Profile picture and signature starts here-->
                            <div class="doc-view-footer card-inner-spacer">
                                <div class="col-md-2">
                                    @if($document->owner->photo)
                                        <div class="avata">

                                            <img class="img border-gray " src="{{ asset($document->owner->photo->passport_one) }}" alt="{{ $document->owner->full_name . " photo" }}">
                                        </div>
                                    @else
                                        <a href="{{ route('photo-signature', $document->owner->owner_id) }}" class="btn small-screens-mg btn-default btn-fill btn-wd"> <i class="fa fa-pencil"></i>   Add Photo </a>
                                    @endif
                                </div>

                                <div class="col-md-10 ">

                                    <div class="row no-gutter">

                                        <div class="col-md-8 col-md-offset-2 ">
                                            @if($document->owner->signature)
                                                <div class="signature data-cap-white">
                                                    <img src="{{ asset($document->owner->signature->file) }}" alt="{{ $document->owner->full_name . " signature" }}">

                                                </div>
                                            @else
                                                <div class="pull-right">
                                                    <a href="{{ route('photo-signature', $document->owner->owner_id) }}" class="btn small-screens-mg btn-default btn-fill btn-wd> <i class="fa fa-pencil"></i>   Add Signature </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div> <!-- Profile picture and signature ends here-->
                            </div>

                        </div>
<!-- ************************************************Approval button starts Here******************************************************************** -->
                           
                        <div class="row no-gutter comm-approval">

                               
                                <div class="col-md-3 comm-status">

                                    <h4>Status</h4>
                                   
                                </div>
                                
                                <div class="col-md-9
                                @if ($document->approved_status == $document::APPROVED[1])
                                {{'approved'}}
                                @elseif ($document->approved_status == $document::AWAITING[1] )
                                {{'awaiting-approval'}}
                                @elseif ($document->approved_status == $document::DECLINED[1] )
                                {{ 'declined'  }}
                                @else
                                {{'pending-approval'}}
                                @endif
                                        ">
                                    <h4>{{ $document->status }}</h4>
                                </div>
                        </div>

                        <div class="row top-buffer bottom-buffer">
                            @if($document->set_for_approval_status == 0)
                                <div class="col-md-6">
                                        @if($document->status = 'Pending Approval')
                                        <a class="btn small-screens-mg btn-success btn-fill btn-wd btn-block" href="{{ route('set.for.approval', $document->document_id) }}">Set for Approval</a>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <a class="btn  btn-danger btn-fill btn-wd btn-block" href="#">Decline</a>
                                </div>
                            @endif

                        </div>

                </div><!-- Left Panel ends here-->
          
                
                    
                    <div class="col-md-6 "> <!-- right Panel Starts here-->
                        <div class="card card-inner-spacer">
                                    <h2> Documents </h2>

                            <div class="row border-bottom">
                                <div class="col-md-8 col-sm-6 col-xs-6">
                                    <p>Document Type</p>
                                    <h3>{{ $document->documentable_type }}</h3>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                        <p>Document ID</p>
                                        <h3>#{{ $document->document_id }}</h3>
                                </div>
                        </div>

                        <!--***************************************************-->

                        <div class="row border-bottom">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Document Category</h5>
                                <h3>{{ $document->documentable->category }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                    <h5>File Number</h5>
                                    <h3>{{ $document->documentable->file_number }}</h3>
                            </div>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <h5> FEE </h5>
                                    <h3>{{ $document->documentFee->amount }}</h3>
                                </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>House Number / Plot Number</h5>
                                <h3>{{ $document->documentable->house_plot_number }}</h3>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>City</h5>
                                <h3>{{ $document->documentable->city }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Purpose of Use</h5>
                                <h3>{{ $document->documentable->purpose_of_use }}</h3>
                            </div>
                        </div>
                            <div class="row border-bottom">
                                <div class="col-md-12 col-sm-6 col-xs-6">
                                    <h5>Street Name</h5>
                                    <h3>{{ $document->documentable->street_name }}</h3>
                                </div>
                            </div>

                        <div class="row border-bottom">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Dimension Area (SQM)</h5>
                                <h3>{{ $document->documentable->area }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5> Term</h5>
                                <h3>{{ $document->documentable->term }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Survey Plan Number</h5>
                                <h3>{{ $document->documentable->survey_plan_number }}</h3>
                            </div>
                        </div>

                        <div class="row border-bottom">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Development Period</h5>
                                <h3>{{ $document->documentable->development_period }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5> Building Value </h5>
                                <h3>{{ $document->documentable->building_value }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5>Yearly Rent Payable</h5>
                                <h3>{{ $document->documentable->yearly_rent_payable }}</h3>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5> revision period </h5>
                                <h3>{{ $document->documentable->revision_period }}</h3>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <h5> Commencement Year </h5>
                                <h3>{{ $document->documentable->commencement_year }}</h3>
                            </div>
                        </div>
                    </div>

                </div><!-- right Panel endshere-->

                            
        </div> <!-- row ends here ---->



                <div class="col-md-6 ">
                    <div class="card-inner-spacer card doc-file-footer">
                        <h2> Attached Documents </h2>
                        <div class="row">
                            @foreach( $document->files as $file)
                                <div class="col-xs-6 col-md-6">

                                    <a class="thumbnail" href="{{asset($file->filename) }}" data-fancybox data-caption="&lt;b&gt;Document - {{$document->document_id }} &lt;/b&gt;">
                                        <img src="{{ asset($file->filename) }}">
                                        <h5>View</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="card-inner-spacer card doc-file-footer">
                        <h2> Survey Plan </h2>

                        <div class="row">
                            @if( $document->surveyPlan)
                                <div class="col-xs-12 col-md-4 col-md-12 ">

                                    <a class="thumbnail" href="{{asset($document->surveyPlan->file) }}" data-fancybox data-caption="&lt;b&gt;Survey Plan - {{$document->documentable->file_number }} &lt;/b&gt;">
                                        <img src="{{ asset($document->surveyPlan->file) }}">
                                        <h5>View</h5>
                                    </a>
                                </div>
                            @endif
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
</div>

@endsection