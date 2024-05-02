@extends('admin.include.app')
@section('main-content')
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-10">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                  <a href="index.php"> Home</a>
                </li>
                <li class="breadcrumb-item text-muted"> Lead List </li>
              </ol>
            </div>

            <div class="col-md-2">
              <a href="{{route('admin.create_new_lead')}}" class="btn add-btn">
                <i class="fa-solid fa-plus"></i> Add Lead </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form action="{{route('leads-filter')}}" method="GET">

            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control formmrgin" name="name" value="{{request()->get('name')}}"  placeholder="Student Name ">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control formmrgin" name="email" value="{{request()->get('email')}}" placeholder="Student Email">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control formmrgin" name="phone_number" value="{{request()->get('phone_number')}}"   placeholder="Student Phone Number">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control formmrgin" name="zip" value="{{request()->get('zip')}}" placeholder="Pincode">
              </div>
              <div class="col-md-4">
                <select class="form-control country formmrgin" name="country_id" id="lead-fm">
                    <option value="">-- Select Country --</option>
                    @foreach ($countries as $item)
                        <option value="{{$item->id}}" {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
             </div>

              <div class="col-md-4">
                <select  name="province_id" id="lead-fm" class="form-control province_id  formmrgin">
                    <option value="">-State/Provision -</option>
                </select>
              </div>
              <div class="col-md-4 col-sm-4">
                <select name="lead_status" class="form-control formmrgin">
                  <option value="">--Select Lead Status--</option>
                  @foreach ($lead_status as $item)
                   <option value="{{$item->id}}"  {{ request()->get('lead_status') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                  @endforeach
                </select>
                <span class="text-danger"></span>
              </div>
              <div class="col-md-4 col-sm-4">
                <input type="date" name="from_date" class="form-control formmrgin" value="{{request()->get('from_date')}}" placeholder="From Date" >
              </div>

              <div class="col-md-4 col-sm-4">
                <input type="date" name="to_date" class="form-control formmrgin" value="{{request()->get('to_date')}}"  placeholder="to Date" value="">
              </div>

              <div class="col-md-4 col-sm-4">
                <select name="assigned_status" class="form-control formmrgin">
                  <option value="">--Select Assigned Status--</option>
                  <option value="allocated" {{ request()->get('assigned_status') == 'allocated' ? 'selected' : '' }}>Allocated</option>
                  <option value="notallocated" {{ request()->get('assigned_status') == 'notallocated' ? 'selected' : '' }}>Not Allocated</option>
                </select>
              </div>

              <div class="col-md-4 col-sm-4 col-lg-4 col-sm-4">
                <select id="lead-fm" name="intakeMonth" class="form-control formmrgin"  >
                    <option value="">Select Month</option>
                    <option value="01" {{ request()->get('intakeMonth') == "01" ? 'selected' : '' }}>January</option>
                    <option value="02" {{ request()->get('intakeMonth') == "02" ? 'selected' : '' }}>February</option>
                    <option value="03" {{ request()->get('intakeMonth') == "03" ? 'selected' : '' }}>March</option>
                    <option value="04" {{ request()->get('intakeMonth') == "04" ? 'selected' : '' }}>April</option>
                    <option value="05" {{ request()->get('intakeMonth') == "05" ? 'selected' : '' }}>May</option>
                    <option value="06" {{ request()->get('intakeMonth') == "06" ? 'selected' : '' }}>June</option>
                    <option value="07" {{ request()->get('intakeMonth') == "07" ? 'selected' : '' }}>July</option>
                    <option value="08" {{ request()->get('intakeMonth') == "08" ? 'selected' : '' }}>August</option>
                    <option value="09" {{ request()->get('intakeMonth') == "09" ? 'selected' : '' }}>September</option>
                    <option value="10" {{ request()->get('intakeMonth') == "10" ? 'selected' : '' }}>October</option>
                    <option value="11" {{ request()->get('intakeMonth') == "11" ? 'selected' : '' }}>November</option>
                    <option value="12" {{ request()->get('intakeMonth') == "12" ? 'selected' : '' }}>December</option>
                </select>
                <span class="text-danger"></span>
              </div>

              <div class="col-md-4 col-sm-4 col-lg-4 col-sm-4">
                <select class="form-control formmrgin" name="intake_year" v-model="intake_year">
                  <option value="">Please select intake Yaer</option>
                  <option val="2024" {{ request()->get('intake_year') == "2024" ? 'selected' : '' }}>2024</option>
                  <option val="2025" {{ request()->get('intake_year') == "2025" ? 'selected' : '' }}>2025</option>
                  <option val="2026" {{ request()->get('intake_year') == "2026" ? 'selected' : '' }}>2026</option>
                  <option val="2027" {{ request()->get('intake_year') == "2027" ? 'selected' : '' }}>2027</option>
                  <option val="2028" {{ request()->get('intake_year') == "2028" ? 'selected' : '' }}>2028</option>
                  <option val="2029" {{ request()->get('intake_year') == "2029" ? 'selected' : '' }}>2029</option>
                  <option val="2030" {{ request()->get('intake_year') == "2030" ? 'selected' : '' }}>2030</option>
                  <option val="2031" {{ request()->get('intake_year') == "2031" ? 'selected' : '' }}>2031</option>
                  <option val="2032" {{ request()->get('intake_year') == "2033" ? 'selected' : '' }}>2032</option>
                  <option val="2033" {{ request()->get('intake_year') == "2033" ? 'selected' : '' }}>2033</option>
                  <option val="2034" {{ request()->get('intake_year') == "2034" ? 'selected' : '' }}>2034</option>
                </select>
                <span class="text-danger"></span>
              </div>
              <div class="col-md-1 ">
                <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin" name="submit" >Filter </button>
              </div>
              <div class="col-md-2 ">
                <a href="{{route('leads-filter')}}" class="btn btn-info d-lg-block  formmrgin">Reset
                </a>
              </div>
              <div class="col-md-2 ">
                    <button type="submit"  class="btn btn-info d-lg-block formmrgin" name="export" value="export">Export to Excel</button>
              </div>
            </div>
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped custom-table mb-0">
          <thead>
            <tr>
              <th>S.N</th>
              <th>Date</th>
              <th> Source </th>
              <th> PinCode</th>
              <th> Name </th>
              <th> Phone</th>
              <th> Email</th>
              <th> Comment </th>
              <th> Intereset</th>
              <th> Course </th>
              <th> Intake </th>
              <th> IntakeYear </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($lead_list as $data)
            <tr>
              <td>
                <a href="#">{{$i}}</a>
              </td>
              <td>
                <a href="#">{{$data->created_at}}</a>
              </td>
              <td> {{$data->source}}</td>
              <td>{{ $data->zip }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->phone_number }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->student_comment }}</td>
              @php
              $interest = App\Models\Intrested::where('is_deleted', '0')->where('id', $data->interested)->first();
             @endphp
               <td>{{ $interest->name ?? '' }}</td>
              <td>{{ $data->course }}</td>
              <td>{{ DateTime::createFromFormat('m', $data->intake)->format('F') }}</td>
              <td>{{ $data->intake_year }}</td>
              <td class="text-end">
                <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                      <i class="fa-solid fa-pencil m-r-5"></i> View Detail </a>

                    <a class="dropdown-item" href="#">
                      <i class="fa-solid fa-pencil m-r-5"></i> Allocate Franchise </a>

                    <a class="dropdown-item" href="#">
                      <i class="fa-solid fa-pencil m-r-5"></i> Create Profile </a>

                    <a class="dropdown-item" href="{{route('manage-lead',[$data->id])}}">
                      <i class="fa-solid fa-pencil m-r-5"></i> Manage Lead </a>

                    <a class="dropdown-item" href="{{route('edit-lead',[$data->id])}}">
                      <i class="fa-solid fa-pencil m-r-5"></i> Edit </a>

                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                {{ $lead_list->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('.province_id').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('.province_id').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('.country').val());
        $('.country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
    });
<script>
@endsection

