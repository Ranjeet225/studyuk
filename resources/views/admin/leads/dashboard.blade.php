@extends('admin.include.app')
@section('main-content')
    <!-- Page Header -->
    <div class="page-header">
       <div class="row">
          <div class="card card-buttons">
             <div class="card-body">
                <div class="row">
                   <div class="col-md-9">
                      <ol class="breadcrumb text-muted mb-0">
                         <li class="breadcrumb-item">
                            <a href="#"> Welcome</a>
                         </li>
                         <li class="breadcrumb-item text-muted">Lead Admin</li>
                      </ol>
                   </div>
                   <div class="col-md-3">
                      <p class="subheader_left"> Overseas Education Lane</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Leads</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_leads']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Assigned Leads</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_assigned_leads']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Non Allocated Leads</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_non_allocated_leads']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Members</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_members']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Student</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_student']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total School Manager</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i>  {{$data['total_school_manager']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Frenchise</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i>  {{$data['total_frenchise']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Active Frenchise</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i>   {{$data['total_active_frenchise']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total InActive Frenchise</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_inactive_frenchise']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Approve Frenchise</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i>  {{$data['total_approve_frenchise']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                      <button type="button" class="btn btn-outline-primary">Read More</button>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total UnApprove Frenchise</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_unapprove_frnchise']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Agent</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_agent']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total University</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_university']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Program</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_program']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Application</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_application']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Unapprove Universties</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_unapprove_universties']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Unapprove Program</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_unapprove_program']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Unapprove Counceler</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_unapprove_counceler']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5> Total Approve Counceler</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i>  {{$data['total_approve_counceler']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <button type="button" class="btn btn-outline-primary">Read More</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
    <div class="table_heading">
       <h4 class="up"> Upcoming Call List</h4>
    </div>
    <div class="row px-3">
       <div class="col-md-12">
          <div class="table-responsive">
             <table class="table table-striped custom-table mb-0">
                <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Date</th>
                      <th> Pincode</th>
                      <th> Name</th>
                      <th> Phone</th>
                      <th> Email</th>
                      <th> Course</th>
                      <th> Intake</th>
                      <th> IntakeYear</th>
                      <th> AllocatedFranchise </th>
                      <th> Status </th>
                      <th></th>
                      <th></th>
                   </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($next_leads as $item)
                        <tr>
                        <td>
                            <a href="#">{{$i}}</a>
                        </td>
                        <td>
                            <a href="#">{{$item->next_calling_date}} </a>
                        </td>
                        <td> {{$item->zip}} </td>
                        <td> {{$item->name}}</td>
                        <td> {{$item->phone_number}}</td>
                        <td>  {{$item->email}} </td>
                        <td> {{ substr($item->course,0,16)}}</td>
                        <td> {{$item->intake}}</td>
                        <td> {{$item->intake_year}}</td>
                        <td>
                            <span>
                            <b>Franchise:</b> {{$item->parent_email}} <br>
                            <b>Agent:</b>  ade@ekonindia.com
                            </span>
                        </td>
                        <td> {{$item->status_name}}</td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas1" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Reallocated Franchise
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas2" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Create Profile
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas3" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Followup
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas4" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-pencil"></i> Edit
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas5" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> OEL Registration
                            </span>
                            </a>
                        </td>
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
             </table>
             <div class="row">
                <div class="col-sm-12 ">
                   <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                      {{$next_leads->links()}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- lead report -->
    <br>
    <div class="table_heading">
       <h4 class="up"> Lead Reports</h4>
    </div>
    <div class="row px-3">
       <div class="col-md-12">
          <div class="table-responsive">
             <table class="table table-striped custom-table mb-0">
                <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Date</th>
                      <th> Pincode</th>
                      <th> Name</th>
                      <th> Phone</th>
                      <th> Email</th>
                      <th> Intake</th>
                      <th> IntakeYear</th>
                      <th> AllocatedFranchise </th>
                      <th> Status </th>
                      <th></th>
                      <th></th>
                   </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($leads_report as $item)
                        <tr>
                        <td>
                            <a href="#">{{$i}}</a>
                        </td>
                        <td>
                            <a href="#">{{$item->created_at}} </a>
                        </td>
                        <td> {{$item->zip}}</td>
                        <td>  {{$item->name}}</td>
                        <td> {{$item->phone_number}}</td>
                        <td> {{$item->assign_email}} </td>
                        <td>  {{$item->course}}</td>
                        <td> {{$item->course}}</td>
                        <td> {{$item->intake_year}}</td>
                        <td>
                            <span>
                            <b>Franchise:</b>  {{$item->parent_email}}<br>
                            <b>Agent:</b> counselor@overseaseducationlane.com </span>
                        </td>
                        <td> {{$item->status_name}}</td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Reallocated Franchise </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Create Profile </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Followup </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-pencil"></i> Edit </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> OEL Registration </span>
                            </a>
                        </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
             </table>
             <div class="row">
                <div class="col-sm-12 ">
                   <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                     {{$leads_report->links()}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
@endsection


