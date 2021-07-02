@extends('layout.master')
@section('title')
Personal Information
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
            <form action="{{url('personal_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Step 1: Personal Details</h3>
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
                            <div class="col-lg-8 m-auto" style="margin-bottom: 40px;">
                              <div class="container">
                                <div class="row table-bordered">
                                  <div class="col-md-4 col-12 pt-2 pb-2">
                                    <label><input type="checkbox" name="city_type" class="city_type" value="1"/> CITY SOLUTION</label>
                                  </div>
                                  <div class="col-md-4 col-12 pt-2 pb-2">
                                    <label><input type="checkbox" name="city_type" class="city_type" value="2"/> CITY DRIVE</label>
                                  </div>
                                                    <div class="col-md-4 col-12 pt-2 pb-2">
                                    <label><input type="checkbox" name="city_type" class="city_type" value="3"/> CITY MANARAH</label>
                                  </div>
                                </div>
                              </div>




                              {{-- <table class="table table-bordered">
                                <tr>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1"/> CITY SOLUTION</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2"/> CITY DRIVE</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="3"/> CITY MANARAH</label></td>
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
                                      <div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-12 pt-2 pb-2">
                                    <div class="row">
                                      <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
                                      <div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>




                              {{-- <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control"></td>
                                </tr>
                              </table> --}}
                            </div>
                            <!--  End Date -->
                            <div class="col-lg-12 mt-5">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
                                  <div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name"></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Applicant's Name</p></div>
                                      <div class="col-md-8">
                                         <input type="text"  class="form-control" id="applicants_name" name="applicants_name"  placeholder="Applicant's Name"/>
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
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="2"/> NO</label>
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
                                            <input type="text"  class="form-control" id="house_of" name="house_of" placeholder="House of"/>
                                          </div>
                                          <div class="col-12">
                                            <input type="text"  class="form-control" id="address" name="address" placeholder="Address"/>
                                          </div>
                                          <div class="col-12">
                                            <input type="text"  class="form-control" id="road_no" name="road_no" placeholder="Road no"/>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-6">
                                        <label><input type="checkbox" name="current_residence" class="current_residence" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="current_residence" class="current_residence" value="2"/> NO</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Residential Land Phone</p></div>
                                      <div class="col-md-8"><input type="text" name="land_phone" id="land_phone" class="form-control" placeholder="N/A"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-6">
                                        <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="2"/> NO</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Mobile No</p></div>
                                      <div class="col-md-8"><input type="text" name="per_mobile_no" class="form-control" id="per_mobile_no" placeholder="Mobile Number"></td></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-6">
                                        <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="mobile_no" class="mobile_no" value="0"/> NO</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Spouse's Name</p></div>
                                      <div class="col-md-8"><input type="text" name="spouse" class="form-control" id="spouse" placeholder="Spouse Name"></td></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-6">
                                        <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="spouses_name" class="spouses_name" value="2"/> NO</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Work Address <br> of Spouse ( If Any )</p></div>
                                      <div class="col-md-8"><input type="text" name="work" class="form-control" id="work" placeholder="Work Address"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-6">
                                        <label><input type="checkbox" name="work_address" class="work_address" value="1"/> YES</label>
                                      </div>
                                      <div class="col-6">
                                        <label><input type="checkbox" name="work_address" class="work_address" value="2"/> NO</label>
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
                                            <label><input type="checkbox" name="residential_status" class="residential_status" value="1"/> Family Owned</label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label><input type="checkbox" name="residential_status" class="residential_status" value="2"/> Owned</label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label><input type="checkbox" name="residential_status" class="residential_status" value="3"/> Rented</label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label><input type="checkbox" name="residential_status" class="residential_status" value="4"/> Others</label>
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
                                              <input type="checkbox" name="residential_size" class="residential_size" value="1" />
                                              Very Small
                                            </label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label>
                                              <input type="checkbox" name="residential_size" class="residential_size" value="2" />
                                              Small
                                            </label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label>
                                              <input type="checkbox" name="residential_size" class="residential_size" value="3" />
                                              Medium
                                            </label>
                                          </div>
                                          <div class="col-md-3 col-6">
                                            <label>
                                              <input type="checkbox" name="residential_size" class="residential_size" value="4" />
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
                                            <input type="number" name="year" id="year" class="form-control"/>
                                          </div>
                                          <div class="col-md-2 col-4">
                                            <p style="margin-top: 9px; font-size:14px;">Month (s)</p>
                                          </div>
                                          <div class="col-md-4 col-8">
                                            <input type="number" name="month" id="month" class="form-control"/>
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
                                            <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Name">
                                          </div>
                                          <div class="col-12">
                                            <input type="text" name="relation" class="form-control" id="relation" placeholder="Relation">
                                          </div>
                                          <div class="col-12">
                                            <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3 col-12">
                                        <input type="date" name="contact_date" id="contact_date" class="form-control" placeholder="Conatct Date">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">General Remarks</p>
                                      </div>
                                      <div class="col-md-9 col-12">
                                        <!-- <p style="margin-top: 9px; font-size:14px;">Please note that provided all information is found OK</p>-->
                                        <div class="row">
                                          <div class="col-6">
                                            <p style="margin-top: 9px; font-size:14px;">Please note that provided all information is found</p>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="1"/> Complete</label>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="2"/> Incomplete</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 table-bordered pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                                      <div class="col-md-3 col-12"><input type="text" name="field_name" class="form-control" id="field_name" placeholder="Field Name"></div>
                                      <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                                      <div class="col-md-3 col-12"><input type="text" name="signature" id="signature" class="form-control" placeholder="Signature"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                                {{-- <table class="table table-bordered">
                                  <tr>
                                      <th colspan="3">File Name</th>
                                      <td colspan="2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name"></td>
                                  </tr>
                                  <tr>
                                    <th colspan="1">Applicants' Name</th>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <input type="text"  class="form-control" id="applicants_name" name="applicants_name"  placeholder="Applicant's Name"/>
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
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="1"/> YES</label>
                                        <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="2"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Current Residence -->
                                  <tr>
                                    <th>Current Residence</th>
                                    <td colspan="3">
                                      <input type="text"  class="form-control" id="house_of" name="house_of" placeholder="House of"/>
                                      <input type="text"  class="form-control" id="address" name="address" placeholder="Address"/>
                                      <input type="text"  class="form-control" id="road_no" name="road_no" placeholder="Road no"/>
                                    </td>
                                    <td style="text-align: center;">
                                      <label><input type="checkbox" name="current_residence" class="current_residence" value="1"/> YES</label>
                                      <label><input type="checkbox" name="current_residence" class="current_residence" value="2"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Residential Land Phone -->
                                  <tr>
                                    <th colspan="1">Residential Land Phone</th>
                                    <td colspan="3"><input type="text" name="land_phone" id="land_phone" class="form-control" placeholder="N/A"></td>
                                    <td style="text-align: center;">
                                      <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1"/> YES</label>
                                      <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="2"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Mobile Number -->
                                  <tr>
                                    <th colspan="1">Mobile No</th>
                                    <td colspan="3"><input type="text" name="per_mobile_no" class="form-control" id="per_mobile_no" placeholder="Mobile Number"></td>
                                    <td style="text-align: center;">
                                      <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1"/> YES</label>
                                      <label><input type="checkbox" name="mobile_no" class="mobile_no" value="0"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Spouse's Name -->
                                  <tr>
                                    <th colspan="1">Spouse's Name</th>
                                    <td colspan="3"><input type="text" name="spouse" class="form-control" id="spouse" placeholder="Spouse Name"></td>
                                    <td style="text-align: center;">
                                      <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1"/> YES</label>
                                      <label><input type="checkbox" name="spouses_name" class="spouses_name" value="2"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Work Address of Spouse -->
                                  <tr>
                                    <th colspan="1">Work Address <br> of Spouse ( If Any )</th>
                                    <td colspan="3">
                                      <input type="text" name="work" class="form-control" id="work" placeholder="Work Address">
                                    </td>
                                    <td style="text-align: center;">
                                      <label><input type="checkbox" name="work_address" class="work_address" value="1"/> YES</label>
                                      <label><input type="checkbox" name="work_address" class="work_address" value="2"/> NO</label>
                                    </td>
                                  </tr>
                                  <!-- Residential Status -->
                                  <tr>
                                    <th>Residential Status</th>
                                    <td>
                                      <label><input type="checkbox" name="residential_status" class="residential_status" value="1"/> Family Owned</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residential_status" class="residential_status" value="2"/> Owned</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residential_status" class="residential_status" value="3"/> Rented</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residential_status" class="residential_status" value="4"/> Others</label>
                                    </td>
                                  </tr>
                                  <!-- Residence  Size -->
                                  <tr>
                                    <th>Residence Size</th>
                                    <td>
                                      <label><input type="checkbox" name="residence_size" class="residence_size" value="1"/> Very Small</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residence_size" class="residence_size" value="2"/> Small</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residence_size" class="residence_size" value="3"/> Medium</label>
                                    </td>
                                    <td>
                                      <label><input type="checkbox" name="residence_size" class="residence_size" value="4"/> Large</label>
                                    </td>
                                  </tr>
                                  <!-- Number of years in current location -->
                                  <tr>
                                    <th>Number of Years<br> In Current Location</th>
                                    <td>
                                      <label>Year (s): </label>
                                    </td>
                                    <td>
                                      <label><input type="number" name="year" id="year" class="form-control"/></label>
                                    </td>
                                    <td>
                                      <label>Month (s): </label>
                                    </td>
                                    <td>
                                      <label><input type="number" name="month" id="month" class="form-control"/></label>
                                    </td>
                                  </tr>
                                  <!-- Contact person -->
                                  <tr>
                                    <th colspan="1">Contact Person <br> Name & Relation</th>
                                    <td colspan="2">
                                      <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Name">
                                      <input type="text" name="relation" class="form-control" id="relation" placeholder="Relation">
                                      <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Conatct Number">
                                    </td>
                                    <td colspan="2">
                                      <input type="date" name="contact_date" id="contact_date" class="form-control" placeholder="Conatct Date">
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
                                    <td colspan="2"><input type="text" name="field_name" class="form-control" id="field_name" placeholder="Field Name"></td>
                                    <td>Signature</td>
                                    <td>
                                      <input type="text" name="signature" id="signature" class="form-control" placeholder="Signature">
                                    </td>
                                  </tr>
                                </table> --}}
                            </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <a href="{{url('/cs_employee_details')}}" class="btn btn-dark">Next</a>
                    </div>
                </div>
            </form>
        </div>
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
<script type="text/javascript">
  $(".gen_remarks").change(function()
  {
      $(".gen_remarks").prop('checked',false);
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
