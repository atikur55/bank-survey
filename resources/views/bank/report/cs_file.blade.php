 @extends('layout.master')
@section('title')
CS Report
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('style_script')
<style type="text/css">
label {
  display: inline;
  margin-left: 5px;
}

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="#" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3 style="text-align: center;text-decoration: underline;">VERIFICATION REPORT</h3>
                    </div>
  
                    <div class="card-body">
  
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- cs head --> 
                            <?php echo DNS1D::getBarcodeHTML($personal_info->file_name, 'C39'); ?>
                            <div class="col-lg-8 m-auto" style="margin-bottom: 40px;">
                                <div class="container">
                                    <div class="row table-bordered">
                                        <div class="col-md-4 col-12 pt-2 pb-2">
                                            <label><input type="checkbox" name="city_type" class="city_type" value="1" {{$personal_info->city_type == 1 ? 'checked' : ''}}/> CITY SOLUTION</label>
                                        </div>
                                        <div class="col-md-4 col-12 pt-2 pb-2">
                                            <label><input type="checkbox" name="city_type" class="city_type" value="2" {{$personal_info->city_type == 2 ? 'checked' : ''}}/> CITY DRIVE</label>
                                        </div>
                                        <div class="col-md-4 col-12 pt-2 pb-2">
                                            <label><input type="checkbox" name="city_type" class="city_type" value="3" {{$personal_info->city_type == 3 ? 'checked' : ''}}/> CITY MANARAH</label>
                                        </div>
                                        </div>
                                    </div>




                              {{-- <table class="table table-bordered">
                                <tr>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1" {{$personal_info->city_type == 1 ? 'checked' : ''}}/> CITY SOLUTION</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2" {{$personal_info->city_type == 2 ? 'checked' : ''}}/> CITY DRIVE</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="3" {{$personal_info->city_type == 3 ? 'checked' : ''}}/> CITY MANARAH</label></td>
                                </tr>
                              </table> --}}
                            </div>
                            <!-- cs Head End -->
                            <!--  Date -->  
                            <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
                                <div class="container">
                                    <div class="row table-bordered">
                                    <div class="col-md-6 col-12 pt-2 pb-2">
                                        <div class="row">
                                        <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">RECEIVING DATE:</p></div>
                                        <div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$personal_info->receiving_date}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 pt-2 pb-2">
                                        <div class="row">
                                        <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
                                        <div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$personal_info->submission_date}}"></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>




                              {{-- <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$personal_info->receiving_date}}"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$personal_info->submission_date}}"></td>
                                </tr>
                              </table> --}}
                            </div>
                            <!--  End Date -->  
                            <div class="col-lg-12 mt-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$personal_info->file_name??''}}"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Applicant's Name</p></div>
                                        <div class="col-md-8">
                                            <input type="text"  class="form-control" id="applicants_name" name="applicants_name"  placeholder="Applicant's Name" value="{{$personal_info->applicants_name}}"/>
                                                @error('applicants_name')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>{{$message}}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="1" {{$personal_info->applicants_answer == 1 ? 'checked' : ''}}/> YES</label>
                                            </div>
                                            <div class="col-6">
                                                <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="2" {{$personal_info->applicants_answer == 2 ? 'checked' : ''}}/> NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                            <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Current Residence</p></div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                    <div class="col-12">
                                                        <input type="text"  class="form-control" id="house_of" name="house_of" placeholder="House of" value="{{$personal_info->house_of}}"/>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text"  class="form-control" id="address" name="address" placeholder="Address" value="{{$personal_info->address}}"/>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text"  class="form-control" id="road_no" name="road_no" placeholder="Road no" value="{{$personal_info->road_no}}"/>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="1" {{$personal_info->current_residence == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="2" {{$personal_info->current_residence == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                            <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Residential Land Phone</p></div>
                                            <div class="col-md-8"><input type="text" name="land_phone" id="land_phone" class="form-control" placeholder="N/A" value="{{$personal_info->land_phone}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-6">
                                            <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1" {{$personal_info->residential_land_phn == 1 ? 'checked' : ''}}/> YES</label>
                                        </div>
                                        <div class="col-6">
                                            <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="2" {{$personal_info->residential_land_phn == 2 ? 'checked' : ''}}/> NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Mobile No</p></div>
                                        <div class="col-md-8"><input type="text" name="per_mobile_no" class="form-control" id="per_mobile_no" placeholder="Mobile Number" value="{{$personal_info->per_mobile_no}}"></td></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-6">
                                            <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1" {{$personal_info->mobile_no == 1 ? 'checked' : ''}}/> YES</label>
                                        </div>
                                        <div class="col-6">
                                            <label><input type="checkbox" name="mobile_no" class="mobile_no" value="0" {{$personal_info->mobile_no == 2 ? 'checked' : ''}}/> NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Spouse's Name</p></div>
                                        <div class="col-md-8"><input type="text" name="spouse" class="form-control" id="spouse" placeholder="Spouse Name" value="{{$personal_info->spouse}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-6">
                                            <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1" {{$personal_info->spouses_name == 1 ? 'checked' : ''}}/> YES</label>
                                        </div>
                                        <div class="col-6">
                                            <label><input type="checkbox" name="spouses_name" class="spouses_name" value="2" {{$personal_info->spouses_name == 2 ? 'checked' : ''}}/> NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Work Address <br> of Spouse ( If Any )</p></div>
                                        <div class="col-md-8"><input type="text" name="work" class="form-control" id="work" placeholder="Work Address" value="{{$personal_info->work}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-6">
                                            <label><input type="checkbox" name="work_address" class="work_address" value="1" {{$personal_info->work_address == 1 ? 'checked' : ''}}/> YES</label>
                                        </div>
                                        <div class="col-6">
                                            <label><input type="checkbox" name="work_address" class="work_address" value="2" {{$personal_info->work_address == 2 ? 'checked' : ''}}/> NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3"><p style="margin-top: 9px; font-size:14px;">Residential Status</p></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                            <div class="col-md-3 col-6">
                                                <label><input type="checkbox" name="residential_status" class="residential_status" value="1" {{$personal_info->residential_status == 1 ? 'checked' : ''}}/> Family Owned</label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label><input type="checkbox" name="residential_status" class="residential_status" value="2" {{$personal_info->residential_status == 2 ? 'checked' : ''}}/> Owned</label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label><input type="checkbox" name="residential_status" class="residential_status" value="3" {{$personal_info->residential_status == 3 ? 'checked' : ''}}/> Rented</label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label><input type="checkbox" name="residential_status" class="residential_status" value="4" {{$personal_info->residential_status == 4 ? 'checked' : ''}}/> Others</label>
                                            </div> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3"><p style="margin-top: 9px; font-size:14px;">Residential Size</p></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                            <div class="col-md-3 col-6">
                                                <label>
                                                <input type="checkbox" name="residence_size" class="residence_size" value="1" {{$personal_info->residence_size == 1 ? 'checked' : ''}}/>
                                                Very Small
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label>
                                                <input type="checkbox" name="residence_size" class="residence_size" value="2" {{$personal_info->residence_size == 2 ? 'checked' : ''}}/>
                                                Small
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label>
                                                <input type="checkbox" name="residence_size" class="residence_size" value="3" {{$personal_info->residence_size == 3 ? 'checked' : ''}}/>
                                                Medium
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label>
                                                <input type="checkbox" name="residence_size" class="residence_size" value="4" {{$personal_info->residence_size == 4 ? 'checked' : ''}}/>
                                                Large
                                                </label>
                                            </div> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Number of Years in Current Location</p></div>
                                        <div class="col-md-9 col-12">
                                            <div class="row">
                                            <div class="col-md-2 col-4">
                                                <p style="margin-top: 9px; font-size:14px;">Year (s)</p>
                                            </div>
                                            <div class="col-md-4 col-8">
                                                <input type="number" name="year" id="year" class="form-control" value="{{$personal_info->year}}"/>
                                            </div>
                                            <div class="col-md-2 col-4">
                                                <p style="margin-top: 9px; font-size:14px;">Month (s)</p>
                                            </div>
                                            <div class="col-md-4 col-8">
                                                <input type="number" name="month" id="month" class="form-control" value="{{$personal_info->month}}"/>
                                            </div> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Contact Person Name &amp; Relation</p></div>
                                        <div class="col-md-6 col-12">
                                            <div class="row">
                                            <div class="col-12">
                                                <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Name" value="{{$personal_info->contact_name}}">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="relation" class="form-control" id="relation" placeholder="Relation" value="{{$personal_info->relation}}">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number" value="{{$personal_info->contact_no}}">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <input type="date" name="contact_date" id="contact_date" class="form-control" placeholder="Conatct Date" value="{{$personal_info->contact_date}}">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">General Remarks</p></div>
                                        <div class="col-md-9 col-12">
                                            <p style="margin-top: 9px; font-size:14px;">Please note that {{$personal_info->personal_rem}} &nbsp;  
                                                @if($personal_info->gen_remarks == 1)
                                                <span class="badge badge-pill badge-secondary">Completed</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Incompleted</span>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12 table-bordered pb-2 pt-2">
                                        <div class="row">
                                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                                        <div class="col-md-3 col-12"><input type="text" name="field_name" class="form-control" id="field_name" placeholder="Field Name" value="{{$personal_info->field_name}}"></div>
                                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                                        <div class="col-md-3 col-12"><input type="text" name="signature" id="signature" class="form-control" placeholder="Signature" value="{{$personal_info->field_name}}"></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                                {{-- <table class="table table-bordered">
                                        <tr style="background: #c8cac8;">
                                                <th colspan="4" style="text-align: center;">PERSONAL DETAILS</th>
                                                <th colspan="1">Verified and Found Authentic</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">File Name</th>
                                            <td colspan="2"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$personal_info->file_name}}"></td>
                                        </tr>
                                    <tr>
                                        <th colspan="1">Applicants' Name</th>
                                        <td colspan="3">
                                            <div class="form-group">
                                                <input type="text"  class="form-control" id="applicants_name" name="applicants_name"  value="{{$personal_info->applicants_name}}"/>
                                                @error('applicants_name')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>{{$message}}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="1" {{$personal_info->applicants_answer == 1 ? 'checked' : ''}}/> YES</label>
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="2" {{$personal_info->applicants_answer == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Current Residence -->
                                    <tr>
                                        <th>Current Residence</th>
                                        <td colspan="3">
                                        <input style="font-weight: bold" type="text"  class="form-control" id="house_of" name="house_of" value="{{$personal_info->house_of}}" />
                                        <input type="text"  class="form-control" id="address" name="address" value="{{$personal_info->address}}"/>
                                        <input type="text"  class="form-control" id="road_no" name="road_no" value="{{$personal_info->road_no}}"/>
                                        </td>
                                        <td style="text-align: center;">
                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="1" {{$personal_info->current_residence == 1 ? 'checked' : ''}}/> YES</label>
                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="2" {{$personal_info->current_residence == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Residential Land Phone -->
                                    <tr>
                                        <th colspan="1">Residential Land Phone</th>
                                        <td colspan="3"><input type="text" name="land_phone" id="land_phone" class="form-control" value="{{$personal_info->land_phone}}"></td>
                                        <td style="text-align: center;">
                                    <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1" {{$personal_info->residential_land_phn == 1 ? 'checked' : ''}}/> YES</label>
                                    <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="2" {{$personal_info->residential_land_phn == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Mobile Number -->
                                    <tr>
                                        <th colspan="1">Mobile No</th>
                                        <td colspan="3"><input type="text" name="per_mobile_no" class="form-control" id="per_mobile_no" value="{{$personal_info->per_mobile_no}}"></td>
                                        <td style="text-align: center;">
                                    <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1" {{$personal_info->mobile_no == 1 ? 'checked' : ''}}/> YES</label>
                                    <label><input type="checkbox" name="mobile_no" class="mobile_no" value="2" {{$personal_info->mobile_no == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Spouse's Name -->
                                    <tr>
                                        <th colspan="1">Spouse's Name</th>
                                        <td colspan="3"><input type="text" name="spouse" class="form-control" id="spouse" value="{{$personal_info->spouse}}"></td>
                                        <td style="text-align: center;">
                                    <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1" {{$personal_info->spouses_name == 1 ? 'checked' : ''}}/> YES</label>
                                    <label><input type="checkbox" name="spouses_name" class="spouses_name" value="2" {{$personal_info->spouses_name == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Work Address of Spouse -->
                                    <tr>
                                        <th colspan="1">Work Address <br> of Spouse ( If Any )</th>
                                        <td colspan="3">
                                        <input type="text" name="work" class="form-control" id="work" value="{{$personal_info->work}}">
                                        </td>
                                        <td style="text-align: center;">
                                    <label><input type="checkbox" name="work_address" class="work_address" value="1" {{$personal_info->work_address == 1 ? 'checked' : ''}}/> YES</label>
                                    <label><input type="checkbox" name="work_address" class="work_address" value="2" {{$personal_info->work_address == 2 ? 'checked' : ''}}/> NO</label>
                                        </td>
                                    </tr>
                                    <!-- Residential Status -->
                                    <tr>
                                        <th>Residential Status</th>
                                        <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="1" {{$personal_info->residential_status == 1 ? 'checked' : ''}}/> Family Owned</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="2" {{$personal_info->residential_status == 2 ? 'checked' : ''}}/> Owned</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="3" {{$personal_info->residential_status == 3 ? 'checked' : ''}}/> Rented</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="4" {{$personal_info->residential_status == 4 ? 'checked' : ''}}/> Others</label>
                                        </td>
                                    </tr>
                                    <!-- Residence  Size -->
                                    <tr>
                                        <th>Residence Size</th>
                                        <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="1" {{$personal_info->residence_size == 1 ? 'checked' : ''}}/> Very Small</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="2" {{$personal_info->residence_size == 2 ? 'checked' : ''}}/> Small</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="3" {{$personal_info->residence_size == 3 ? 'checked' : ''}}/> Medium</label>
                                        </td>
                                        <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="4" {{$personal_info->residence_size == 4 ? 'checked' : ''}}/> Large</label>
                                        </td>
                                    </tr>
                                    <!-- Number of years in current location -->
                                    <tr>
                                        <th>Number of Years<br> In Current Location</th>
                                        <td>
                                        <label>Year (s): </label>
                                        </td>
                                        <td>
                                    <label><input type="number" name="year" id="year" class="form-control" value="{{$personal_info->year}}" /></label>
                                        </td>
                                        <td>
                                    <label>Month (s): </label>
                                        </td>
                                        <td>
                                    <label><input type="number" name="month" id="month" class="form-control" value="{{$personal_info->month}}"/></label>
                                        </td>
                                    </tr>
                                    <!-- Contact person -->
                                    <tr>
                                        <th colspan="1">Contact Person <br> Name & Relation</th>
                                        <td colspan="2">
                                        <input type="text" name="contact_name" class="form-control" id="contact_name" value="{{$personal_info->contact_name}}">
                                        <input type="text" name="relation" class="form-control" id="relation" value="{{$personal_info->relation}}">
                                        <input type="text" name="contact_no" class="form-control" id="contact_no" value="{{$personal_info->contact_no}}">
                                        </td>
                                        <td colspan="2">
                                        <input type="date" name="contact_date" id="contact_date" class="form-control" value="{{$personal_info->contact_date}}">
                                        </td>
                                    </tr>
                                    <!-- Contact person -->
                                    <tr>
                                        <th colspan="1">General Remark</th>
                                        <td colspan="4">
                                        <p style="font-weight: bold;">Please note that current residence address is OK but holding number<br> plate was not located at given address.</p>
                                        </td>
                                    </tr>
                                    <!-- field -->
                                    <tr>
                                        <th colspan="1">Field Agent Name: </th>
                                        <td colspan="2"><input type="text" name="field_name" class="form-control" id="field_name" value="{{$personal_info->field_name}}"></td>
                                        <td>Signature</td>
                                        <td>
                                        <input type="text" name="signature" id="signature" class="form-control" value="{{$personal_info->signature}}">
                                        </td>
                                    </tr>

                                </table> --}}


                                <hr>

                              <!-- CS Employment -->
                                <div class="container">

                  <div class="row" style="background: ">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Employee or Business Details</p><?php echo DNS1D::getBarcodeHTML($employment_info->file_name, 'C39'); ?></div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Verified and Found Authentic</p></div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
                    <div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$employment_info->file_name??''}}"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Type of Profession</p>
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-3 col-12">
                              <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$employment_info->ebd_profession == 1 ? 'checked':''}}/> Service
                                                            Holder</label>
                            </div>
                            <div class="col-md-3 col-12">
                              <label><input type="checkbox" name="ebd_profession" class="ebd_profession"
                                                                value="2" {{$employment_info->ebd_profession == 2 ? 'checked':''}}/> Businessman</label>
                            </div>
                            <div class="col-md-3 col-12">
                              <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$employment_info->ebd_profession == 3 ? 'checked':''}}/> Self
                                                            Employed</label>
                            </div>
                            <div class="col-md-3 col-12">
                              <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$employment_info->ebd_profession == 4 ? 'checked':''}}/> Other
                                                            (Landlord, Doctor )</label>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" {{$employment_info->prof_valid == 1 ? 'checked':''}}/>
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$employment_info->prof_valid == 2 ? 'checked':''}}/>
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Company Name</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="company_name" class="form-control" value="{{$employment_info->company_name}}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$employment_info->ebd_company == 1 ? 'checked':''}}/> YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" {{$employment_info->ebd_company == 2 ? 'checked':''}}/> NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Office Address</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="office_address" class="form-control" value="{{$employment_info->office_address}}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$employment_info->ebd_office_address == 1 ? 'checked':''}}/>
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$employment_info->ebd_office_address == 2 ? 'checked':''}}/>
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Office Phone Number</p>
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-6 col-12">
                              <div class="row">
                                <div class="col-12">
                                  Land Ph:
                                </div>
                                <div class="col-12">
                                  <input type="number" name="land_phone" class="form-control" value="{{$employment_info->land_phone}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="row">
                                <div class="col-12">Mobile No:</div>
                                <div class="col-12">
                                  <input type="number" name="mobile_number" class="form-control" value="{{$employment_info->mobile_number}}">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$employment_info->ebd_office_phone == 1 ? 'checked':''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$employment_info->ebd_office_phone == 2 ? 'checked':''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Business / Service Length</p>
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-4 col-12">
                              <div class="row">
                                <div class="col-12">
                                  Year (s)
                                </div>
                                <div class="col-12">
                                  <input type="number" name="year" class="form-control" value="{{$employment_info->year}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4 col-12">
                              <div class="row">
                                <div class="col-12">Month (s)</div>
                                <div class="col-12">
                                  <input type="number" name="month" class="form-control" value="{{$employment_info->month}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4 col-12">
                              <div class="row">
                                <div class="col-12">No. of Employee</div>
                                <div class="col-12">
                                  <input type="number" name="employee" class="form-control" value="{{$employment_info->employee}}">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" {{$employment_info->ebd_serv_len == 1 ? 'checked':''}} /> YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" {{$employment_info->ebd_serv_len == 2 ? 'checked':''}} /> NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Nature of Business</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="business" class="form-control" value="{{$employment_info->business}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" {{$employment_info->ebd_nat_bus == 1 ? 'checked':''}} /> YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$employment_info->ebd_nat_bus == 2 ? 'checked':''}} /> NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Designation</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="designation" class="form-control" value="{{$employment_info->designation}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$employment_info->ebd_designation == 1 ? 'checked':''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$employment_info->ebd_designation == 2 ? 'checked':''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Salary (Service Holder)</p>
                        </div>
                        <div class="col-md-9">
                          Verified &amp; Found {{$employment_info->salary_rem}} &nbsp;  OK
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                           <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$employment_info->ebd_sal_serv == 1 ? 'checked':''}} /> YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$employment_info->ebd_sal_serv == 2 ? 'checked':''}} /> NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Salary Verified by (Name)</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="salary_verify" class="form-control" value="{{$employment_info->salary_verify}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$employment_info->ebd_salVname == 1 ? 'checked':''}} /> YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$employment_info->ebd_salVname == 2 ? 'checked':''}} /> NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3"><p style="margin-top: 9px; font-size:14px;">Business Place Status</p></div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$employment_info->ebd_bpstatus == 1 ? 'checked':''}} />
                                                                Rented
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$employment_info->ebd_bpstatus == 2 ? 'checked':''}} />
                                                                Owned
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$employment_info->ebd_bpstatus == 3 ? 'checked':''}} />
                                                                Family Owned
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$employment_info->ebd_bpstatus == 4 ? 'checked':''}} />
                                                                Company Owned
                                                            </label>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3"><p style="margin-top: 9px; font-size:14px;">Business Place Size</p></div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$employment_info->ebd_bplace == 1 ? 'checked':''}} />
                                                                Very Small
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$employment_info->ebd_bplace == 2 ? 'checked':''}} />
                                                                Small
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$employment_info->ebd_bplace == 3 ? 'checked':''}} />
                                                                Medium
                                                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$employment_info->ebd_bplace == 4 ? 'checked':''}} />
                                                                Large
                                                            </label>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3"><p style="margin-top: 9px; font-size:14px;">Business/Office Signboard</p></div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$employment_info->ebd_bus_off == 1 ? 'checked':''}} />
                              Small
                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$employment_info->ebd_bus_off == 2 ? 'checked':''}} />
                              Medium
                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$employment_info->ebd_bus_off == 3 ? 'checked':''}} />
                              Large
                            </label>
                            </div>
                            <div class="col-md-3 col-6">
                              <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$employment_info->ebd_bus_off == 4 ? 'checked':''}} />
                          No Signboard
                        </label>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">General Remarks</p></div>
                        <div class="col-md-9 col-12"><p style="margin-top: 9px; font-size:14px;">Please note that {{$employment_info->employee_rem}} &nbsp; 
                            @if($personal_info->gen_remarks == 1)
                            <span class="badge badge-pill badge-secondary">Completed</span>
                            @else
                            <span class="badge badge-pill badge-danger">Incompleted</span>
                            @endif
                        </p></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="field_name" id="field_name" class="form-control" value="{{$employment_info->field_name}}"></div>
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$employment_info->signature}}"></div>
                      </div>
                    </div>
                  </div>
                </div>



                            {{-- <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr style="background: #c8cac8;">
                                        <th colspan="5">Employee or Business Details</th>
                                        <th colspan="3">Verified and Found Authentic</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Type of Profession</td>
                                        <td colspan="4" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$employment_info->ebd_profession == 1 ? 'checked' : ''}}/> Service
                                                        Holder</label>
                                                </div>
                                                <div class="col-6"><label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" {{$employment_info->ebd_profession == 2 ? 'checked' : ''}}/> Businessman</label></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$employment_info->ebd_profession == 3 ? 'checked' : ''}}/> Self
                                                        Employed</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$employment_info->ebd_profession == 4 ? 'checked' : ''}}/> Other
                                                        (Landlord, Doctor )</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" {{$employment_info->prof_valid == 1 ? 'checked' : ''}}/>
                                                        YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$employment_info->prof_valid == 2 ? 'checked' : ''}}/>
                                                        NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Company Name</td>
                                        <td colspan="4"><input type="text" name="company_name" class="form-control" value="{{$employment_info->company_name}}" /></td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$employment_info->ebd_company == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_company" class="ebd_company" value="2"  {{$employment_info->ebd_company == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Office Address</td>
                                        <td colspan="4"><input type="text" name="office_address" class="form-control" value="{{$employment_info->office_address}}"/></td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$employment_info->ebd_office_address == 1 ? 'checked' : ''}}/>
                                                        YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$employment_info->ebd_office_address == 2 ? 'checked' : ''}}/>
                                                        NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Office Phone Number</td>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-3">
                                                    Land Ph:
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" name="land_phone" class="form-control" value="{{$employment_info->land_phone}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-4">Mobile No:</div>
                                                <div class="col-8">
                                                    <input type="number" name="mobile_number" class="form-control" value="{{$employment_info->mobile_number}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$employment_info->ebd_office_phone == 1 ? 'checked' : ''}}/>
                                                        YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$employment_info->ebd_office_phone == 2 ? 'checked' : ''}}/>
                                                        NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Business / Service Length</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-4 border-right">Year</div>
                                                <div class="col-8"><input type="number" name="year" class="form-control" value="{{$employment_info->year}}"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 border-right">Month (s)</div>
                                                <div class="col-6"><input type="number" name="month" class="form-control" value="{{$employment_info->month}}"></div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-6 border-right">No. of Employee</div>
                                                <div class="col-6"><input type="number" name="employee" class="form-control"  value="{{$employment_info->employee}}"></div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" {{$employment_info->ebd_serv_len == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" {{$employment_info->ebd_serv_len == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nature of Business</td>
                                        <td colspan="4"><input type="text" name="business" class="form-control" value="{{$employment_info->business}}"></td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" {{$employment_info->ebd_nat_bus == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$employment_info->ebd_nat_bus == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td colspan="4"><input type="text" name="designation" class="form-control" value="{{$employment_info->designation}}"></td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$employment_info->ebd_designation == 1 ? 'checked' : ''}}/>
                                                        YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$employment_info->ebd_designation == 2 ? 'checked' : ''}}/>
                                                        NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Salary (Service Holder)</td>
                                        <td colspan="4">Verified &amp; Found OK</td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$employment_info->ebd_sal_serv == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$employment_info->ebd_sal_serv == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Salary Verified by (Name)</td>
                                        <td colspan="4"><input type="text" name="salary_verify" class="form-control" value="{{$employment_info->salary_verify}}"></td>
                                        <td colspan="3" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-6 border-right">
                                                    <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$employment_info->ebd_salVname == 1 ? 'checked' : ''}}/> YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$employment_info->ebd_salVname == 2 ? 'checked' : ''}}/> NO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Business Place Status</td>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$employment_info->ebd_bpstatus == 1 ? 'checked' : ''}}/>
                                                        Rented
                                                    </label>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$employment_info->ebd_bpstatus == 2 ? 'checked' : ''}}/>
                                                        Owned
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$employment_info->ebd_bpstatus == 3 ? 'checked' : ''}}/>
                                                        Family Owned
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$employment_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
                                                Company Owned
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Business Place Size</td>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$employment_info->ebd_bplace == 1 ? 'checked' : ''}}/>
                                                        Very Small
                                                    </label>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$employment_info->ebd_bplace == 2 ? 'checked' : ''}}/>
                                                        Small
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$employment_info->ebd_bplace == 3 ? 'checked' : ''}}/>
                                                        Medium
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$employment_info->ebd_bplace == 4 ? 'checked' : ''}}/>
                                                Large
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Business/Office Signboard</td>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$employment_info->ebd_bus_off == 1 ? 'checked' : ''}}/>
                                                        Small
                                                    </label>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$employment_info->ebd_bus_off == 2 ? 'checked' : ''}}/>
                                                        Medium
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$employment_info->ebd_bus_off == 3 ? 'checked' : ''}}/>
                                                        Large
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" style="text-align: left;">
                                            <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$employment_info->ebd_bus_off == 4 ? 'checked' : ''}}/>
                                                No Signboard
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>General Remarks</td>
                                        <td colspan="5" style="font-weight: bold;">Please note that provided all information is found OK</td>
                                    </tr>
                                    <tr>
                                        <td>Field Agent Name</td>
                                        <td colspan="2"><input type="text" name="field_name" id="field_name" class="form-control" value="{{$employment_info->field_name}}"></td>
                                        <td colspan="2">Signature</td>
                                        <td><input type="text" name="signature" id="signature" class="form-control" value="{{$employment_info->signature}}"></td>
                                    </tr>
                                </tbody>
                            </table> --}}

                                <hr>
                                {{-- CS Guarantor --}}

                                <div class="container">
                  <div class="row">
                    <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p>
                        <?php echo DNS1D::getBarcodeHTML($guarantor_info->file_name, 'C39'); ?>
                    </div>
                    <div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$guarantor_info->file_name ?? ''}}"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">1<sup>st</sup> Guarantor Details</p></div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Verified and Found Authentic</p></div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Type of Profession</p>
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-4 col-12">
                              <label><input type="checkbox" name="fgd_profession"
                                                                class="fgd_profession" value="1" {{$guarantor_info->fgd_profession == 1 ? 'checked' : ''}} />
                                                            Service Holder
                                                        </label>
                            </div>
                            <div class="col-md-4 col-12">
                              <label><input type="checkbox" name="fgd_profession"
                                                                class="fgd_profession" value="2" {{$guarantor_info->fgd_profession == 2 ? 'checked' : ''}} />
                                                            Businessman
                                                        </label>
                            </div>
                            <div class="col-md-4 col-12">
                              <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="3" {{$guarantor_info->fgd_profession == 3 ? 'checked' : ''}} />
                                                            Others (Housewife)</label>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_profession_val" class="fgd_profession_val"
                                                                value="1" {{$guarantor_info->fgd_profession_val == 1 ? 'checked' : ''}} />YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_profession_val" class="fgd_profession_val"
                                                                value="2" {{$guarantor_info->fgd_profession_val == 2 ? 'checked' : ''}} />NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Guarantor's Name</p>
                        </div>
                        <div class="col-md-9">
                          <input class="form-control" name="guarantor_name" type="text" value="{{$guarantor_info->guarantor_name}}"  />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="1" {{$guarantor_info->fgd_guarantor == 1 ? 'checked' : ''}}  />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="2" {{$guarantor_info->fgd_guarantor == 2 ? 'checked' : ''}}  />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Relationship</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="gurantor_relation" class="form-control" value="{{$guarantor_info->gurantor_relation}}"  />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="1" {{$guarantor_info->fgd_relationship == 1 ? 'checked' : ''}}  />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="2" {{$guarantor_info->fgd_relationship == 2 ? 'checked' : ''}}  />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Company Name</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="gur_company_name" class="form-control" value="{{$guarantor_info->gur_company_name}}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="1" {{$guarantor_info->fgd_company_name == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="2" {{$guarantor_info->fgd_company_name == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Designation</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="guarantor_degignation" class="form-control" value="{{$guarantor_info->guarantor_degignation}}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="1" {{$guarantor_info->fgd_designation == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="2" {{$guarantor_info->fgd_designation == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Residence Address</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="guarantor_res_address" class="form-control" value="{{$guarantor_info->guarantor_res_address}}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="1" {{$guarantor_info->fgd_r_address == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="2" {{$guarantor_info->fgd_r_address == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Office Address</p>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="office_address" class="form-control" value="{{$guarantor_info->office_address}}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="1" {{$guarantor_info->fgd_o_address == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="2" {{$guarantor_info->fgd_o_address == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Contact Details</p>
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-6 col-12">
                              <div class="row">
                                <div class="col-12">
                                  Land Ph:
                                </div>
                                <div class="col-12">
                                  <input type="number" name="gur_land_phn" class="form-control" value="{{$guarantor_info->gur_land_phn}}" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="row">
                                <div class="col-12">Mobile No:</div>
                                <div class="col-12">
                                  <input type="number" name="gur_mobile" class="form-control" value="{{$guarantor_info->gur_mobile}}" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="1" {{$guarantor_info->fgd_contact == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="2" {{$guarantor_info->fgd_contact == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">
                    <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3">
                          <p style="margin-top: 9px; font-size:14px;">Agreed Amount of Guarantee</p>
                        </div>
                        <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                        <p style="margin-top: 9px; font-size:14px;">Guarantee Amount:</p></div>
                                                        <div class="col-12"><input type="number" name="gur_amount" class="form-control" value="{{$guarantor_info->gur_amount}}" /></div>
                                                    </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="1" {{$guarantor_info->fgd_agree == 1 ? 'checked' : ''}} />
                                                            YES</label>
                        </div>
                        <div class="col-6">
                          <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="2" {{$guarantor_info->fgd_agree == 2 ? 'checked' : ''}} />
                                                            NO</label>
                        </div>
                      </div>
                    </div>
                  </div>  
                                    
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">General Remarks</p></div>
                        <div class="col-md-9 col-12"><p style="margin-top: 9px; font-size:14px;">Please note that {{$guarantor_info->guarantor_rem}} &nbsp; 
                            @if($personal_info->gen_remarks == 1)
                            <span class="badge badge-pill badge-secondary">Completed</span>
                            @else
                            <span class="badge badge-pill badge-danger">Incompleted</span>
                            @endif
                        </p></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="field_name" class="form-control" placeholder="Field Name" value="{{$guarantor_info->field_name}}"></div>
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" placeholder="Signature" value="{{$guarantor_info->signature}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
                                <hr>
                                {{-- CS Banbk Statement --}}
                                <div class="container">
                                    <div class="row">
                    <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p>
                      <?php echo DNS1D::getBarcodeHTML($bank_statement_info->file_name, 'C39'); ?>  
                    </div>
                    <div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$bank_statement_info->file_name}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Applicant</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_appli_name" class="form-control" value="{{$bank_statement_info->sta_appli_name}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Bank</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_bank_name" class="form-control" value="{{$bank_statement_info->sta_bank_name}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Branch Name</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_brance_name" class="form-control" value="{{$bank_statement_info->sta_brance_name}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account Title</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_account_title" class="form-control" value="{{$bank_statement_info->sta_account_title}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account No:</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="number" name="sta_account_no" class="form-control" value="{{$bank_statement_info->sta_account_no}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Statement Verified By</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_verify" class="form-control" value="{{$bank_statement_info->sta_verify}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Designation</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_designation" class="form-control" value="{{$bank_statement_info->sta_designation}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Contact Details</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <p>Land Ph:</p>
                                                    <input type="number" name="sta_land_no" class="form-control" value="{{$bank_statement_info->sta_land_no}}" />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p>Mobile No:</p>
                                                    <input type="number" name="sta_mobile_no" class="form-control" value="{{$bank_statement_info->sta_mobile_no}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Verification Date</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><input type="date" name="verify_date" class="form-control" value="{{$bank_statement_info->verify_date}}"></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Remarks</p></div>
                    <div class="col-md-9 table-bordered pb-2 pt-2"><p style="font-weight: bold;"><!-- An Original Copy of bank statement has been withdrawn  -->{{$bank_statement_info->statement_check}}</p><p>{{$bank_statement_info->bank_remarks}} &nbsp; </p></div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3 table-bordered pb-2 pt-2">
                                            <p style="margin-top: 9px; font-size:12px; text-transform: capitalize">If Statement Not Verified</p>
                                        </div>
                    <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <input type="checkbox" name="statement_check" value="Insufficient Fund" id="" {{$bank_statement_info->statement_check == 'Insufficient Fund' ? 'checked' : ''}}><label>&nbsp;Insufficient Fund</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Original Statement required" {{$bank_statement_info->statement_check == 'Original Statement required' ? 'checked' : ''}}><label>&nbsp;Original Statement required</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Statemetn Required Will Seal & Sign" {{$bank_statement_info->statement_check == 'Statemetn Required Will Seal & Sign' ? 'checked' : ''}}><label>&nbsp;Statemetn Required Will Seal &amp; Sign</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Authorization Letter Required" {{$bank_statement_info->statement_check == 'Authorization Letter Required' ? 'checked' : ''}}><label>&nbsp;Authorization Letter Required</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Statement Will Be Sent By Mail" {{$bank_statement_info->statement_check == 'Statement Will Be Sent By Mail' ? 'checked' : ''}}><label>&nbsp;Statement Will Be Sent By Mail</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Not Agreed To Verify" {{$bank_statement_info->statement_check == 'Not Agreed To Verify' ? 'checked' : ''}}><label>&nbsp;Not Agreed To Verify</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Computer Generated Statement" {{$bank_statement_info->statement_check == 'Computer Generated Statement' ? 'checked' : ''}}><label>&nbsp;Computer Generated Statement</label>
                                                <br>
                                            <input type="checkbox" name="statement_check" id="" value="Others (plese Specify Below)" {{$bank_statement_info->statement_check == 'Others (plese Specify Below)' ? 'checked' : ''}}><label>&nbsp;Others (plese Specify Below)</label>
                                            <!-- <div>
                                                <span class="badge badge-secondary">Selected: {{$bank_statement_info->statement_check}}</span>
                                            </div>
                                            <input type="text" class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-12 table-bordered pb-2 pt-2">
                      <div class="row">
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$bank_statement_info->field_agent}}"></div>
                        <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                        <div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$bank_statement_info->signature}}"></div>
                      </div>
                    </div>
                  </div>
                                </div>

                        </div>
                         
                    </div>
  
                    <!-- <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <a href="{{url('/cs_employee_details')}}" class="btn btn-dark">Next</a>
                    </div> -->
                </div>
            </form>
        </div>
    </div>

    <h4>CS : Personal Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_personal_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/personal/')}}/{{$photo->cs_personal_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Employment Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_employment_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/employment/')}}/{{$photo->cs_employment_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Guarantor Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_guarantor_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/guarantor/')}}/{{$photo->cs_guarantor_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Bank Statement Details Photo</h4><br>
    <div class="row">
      @foreach($get_photo as $photo)
      <div class="col-lg-4">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/cs_photo/multiple/')}}/{{$photo->cs_multiple_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush

@section('js_script')
<!-- Applicants Name -->
<script type="text/javascript">
  $(".city_type").change(function()
  {
      $(".city_type").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!-- Current Residence -->
<!-- Applicants Name -->
<script type="text/javascript">
  $(".applicants_answer").change(function()
  {
      $(".applicants_answer").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!-- Current Residence -->
<script type="text/javascript">
  $(".current_residence").change(function()
  {
      $(".current_residence").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Residencial Land Phone -->
<script type="text/javascript">
  $(".residential_land_phn").change(function()
  {
      $(".residential_land_phn").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Phone -->
<script type="text/javascript">
  $(".mobile_no").change(function()
  {
      $(".mobile_no").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Spouses Name -->
<script type="text/javascript">
  $(".spouses_name").change(function()
  {
      $(".spouses_name").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Work Address Of Spouse -->
<script type="text/javascript">
  $(".work_address").change(function()
  {
      $(".work_address").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Residential Status -->
<script type="text/javascript">
  $(".residential_status").change(function()
  {
      $(".residential_status").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!--  Residence Sizes -->
<script type="text/javascript">
  $(".residence_size").change(function()
  {
      $(".residence_size").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>

@endsection
