@extends('admin.include.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Oel 360</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="College / Universities ">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1  </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Courses">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Application Status">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Offer Detail">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Visa Application">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Visa Status">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step6"
                                    aria-selected="false"> 6 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step7" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step7"
                                    aria-selected="false"> 7 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step8" id="step3-tab" data-bs-toggle="tab" role="tab"
                                    aria-controls="step8" aria-selected="false"> 8 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step9" id="step3-tab" data-bs-toggle="tab" role="tab"
                                    aria-controls="step9" aria-selected="false"> 9 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step10" id="step10-tab" data-bs-toggle="tab" role="tab"
                                    aria-controls="step10" aria-selected="false"> 10 </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Fees Details">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step11" id="step11-tab" data-bs-toggle="tab" role="tab"
                                    aria-controls="step11" aria-selected="false"> 11 </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @can('universities.create')
                                <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                    aria-labelledby="step1-tab">
                                    <form class="row g-4"  id ="tab1DataForm">
                                        @if(!empty($leadDetails->university))
                                         <div class="form-check">
                                           <label class="form-check-label">
                                             <input type="checkbox" class="form-check-input" name="colllege" id="college" value="{{$leadDetails->university}}" checked>
                                             Selected University
                                           </label>
                                         </div>
                                         @endif
                                         <input type="hidden" name="sba_id" value="{{$leadDetails->id}}">
                                         <br>
                                         <h4>Select College</h4>
                                         <div class="row">
                                            @foreach ($university as $item)
                                                <div class="col-md-4">
                                                    <input class="form-check-input college-checkbox" name="college[]" type="checkbox" value="{{$item->id}}" id="college{{$loop->iteration}}">
                                                    <label class="form-check-label" for="college{{$loop->iteration}}">{{$item->university_name}}</label>
                                                </div>
                                            @endforeach
                                         </div>
                                        <br>
                                        <div class="d-flex">
                                            <a class="btn btn btn-primary next" id="tab1datasubmit" >Next</a>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                            @can('courses.create')
                                <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                    <div class="mb-4">
                                        <h5> Select your Cource Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-pancard-input" class="form-label"
                                                        placeholder="Address 1"> Cource 1</label>
                                                    <input type="text" class="form-control" placeholder="Address 1"
                                                        id="basicpill-pancard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-vatno-input" class="form-label">Cource 2</label>
                                                    <input type="text" class="form-control" placeholder ="Cource 2"
                                                        id="basicpill-vatno-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cstno-input" class="form-label">Cource 3</label>
                                                    <input type="text" class="form-control" placeholder="Cource 3"
                                                        id="basicpill-cstno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Cource
                                                        4</label>
                                                    <input type="text" class="form-control" placeholder="Cource 4"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>
                            @endcan
                            @can('application_status.create')
                                <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5>Application Status </h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label"> Application
                                                        Status Name </label>
                                                    <input type="text" class="form-control" placeholder="Name on card "
                                                        id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label"> Select Your Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" placeholder="credit no "
                                                        id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('offer_details.create')
                                <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5>Offer Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Offer Detail Name
                                                    </label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Offer
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('visa_application.create')
                                <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> Visa Application Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Visa Application
                                                        Name</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Visa card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Visa
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('visa_status.create')
                                <div class="tab-pane fade" role="tabpanel" id="step6" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5>Visa statuss</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label"> visa card Name
                                                    </label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('fee_details.create')
                                <div class="tab-pane fade" role="tabpanel" id="step7" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> 5Payment Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Name on
                                                        Card</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('flight_details.create')
                                <div class="tab-pane fade" role="tabpanel" id="step8" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> 5Payment Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Name on
                                                        Card</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('take_off.create')
                                <div class="tab-pane fade" role="tabpanel" id="step9" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> 5Payment Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Name on
                                                        Card</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('boarding.create')
                                <div class="tab-pane fade" role="tabpanel" id="step10" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> 5Payment Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Name on
                                                        Card</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                            @can('done.show')
                                <div class="tab-pane fade" role="tabpanel" id="step11" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5> 5Payment Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-namecard-input" class="form-label">Name on
                                                        Card</label>
                                                    <input type="text" class="form-control" id="basicpill-namecard-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label class="form-label">Credit Card Type</label>
                                                    <select class="form-select">
                                                        <option selected>Select Card Type</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-cardno-input" class="form-label">Credit Card
                                                        Number</label>
                                                    <input type="text" class="form-control" id="basicpill-cardno-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-card-verification-input" class="form-label">Card
                                                        Verification Number</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-card-verification-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-block mb-3">
                                                    <label for="basicpill-expiration-input" class="form-label">Expiration
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-expiration-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal"
                                            data-bs-target="#save_modal">Save Changes</a>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        function handleNext() {
            const activeTab = $('.tab-pane.active');
            const nextTab = activeTab.next('.tab-pane');
            if (nextTab.length) {
                activeTab.removeClass('active');
                activeTab.removeClass('show');
                nextTab.addClass('active show');
                const nextTabLink = nextTab.attr('id') + '-tab';
                $('#' + nextTabLink).tab('show');
            }
        }
        function handlePrevious() {
            const activeTab = $('.tab-pane.active');
            const previousTab = activeTab.prev('.tab-pane');
            if (previousTab.length) {
                activeTab.removeClass('active');
                activeTab.removeClass('show');
                previousTab.addClass('active show');
                const previousTabLink = previousTab.attr('id') + '-tab';
                $('#' + previousTabLink).tab('show');
            }
        }
        $('.next').on('click', handleNext);
        $('.previous').on('click', handlePrevious);
    </script>
@endsection
