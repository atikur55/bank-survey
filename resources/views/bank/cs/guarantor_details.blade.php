@extends('layout.master')
@section('title')
Guarantor Information
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
            <form action="{{url('guarantor_details_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Step 3: 1st GUARANTOR DETAILS</h3>
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
                                                                class="fgd_profession" value="1" />
                                                            Service Holder
                                                        </label>
                                                        </div>
                                                        <div class="col-md-4 col-12">
                                                            <label><input type="checkbox" name="fgd_profession"
                                                                class="fgd_profession" value="2" />
                                                            Businessman
                                                        </label>
                                                        </div>
                                                        <div class="col-md-4 col-12">
                                                            <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="3" />
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
                                                                value="1" />YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_profession_val" class="fgd_profession_val"
                                                                value="2" />NO</label>
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
                                                    <input class="form-control" name="guarantor_name" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="2" />
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
                                                    <input type="text" name="gurantor_relation" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="2" />
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
                                                    <input type="text" name="gur_company_name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="2" />
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
                                                    <input type="text" name="guarantor_degignation" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="2" />
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
                                                    <input type="text" name="guarantor_res_address" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="2" />
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
                                                    <input type="text" name="office_address" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="2" />
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
                                                                    <input type="number" name="gur_land_phn" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="row">
                                                                <div class="col-12">Mobile No:</div>
                                                                <div class="col-12">
                                                                    <input type="number" name="gur_mobile" class="form-control" />
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
                                                    <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="2" />
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
                                                        <div class="col-12"><input type="number" name="gur_amount" class="form-control" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="1" />
                                                            YES</label>
                                                </div>
                                                <div class="col-6">
                                                    <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="2" />
                                                            NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="row">
                                        <div class="col-md-12 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">General Remarks</p></div>
                                                <div class="col-md-9 col-12">
                                                    <!-- <p style="margin-top: 9px; font-size:14px;">Please note that provided all information is found OK</p> -->
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
                                                <div class="col-md-3 col-12"><input type="text" name="field_name" class="form-control" placeholder="Field Name"></div>
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                                                <div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" placeholder="Signature"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                


                                {{-- <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr>
                                        <th colspan="5">File Name</th>
                                        <td colspan="3"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name"></td>
                                    </tr>
                                        <tr>
                                            <th colspan="5">1<sup>st</sup> Guarantor Details</th>
                                            <th colspan="3">Verified and Found Authentic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Type of Profession</td>
                                            <td colspan="4" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-4"><label><input type="checkbox" name="fgd_profession"
                                                                class="fgd_profession" value="1" />
                                                            Service Holder
                                                        </label>
                                                    </div>
                                                    <div class="col-4"><label><input type="checkbox" name="fgd_profession"
                                                                class="fgd_profession" value="2" />
                                                            Businessman
                                                        </label></div>
                                                    <div class="col-4">
                                                        <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="3" />
                                                            Others (Housewife)</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_profession_val" class="fgd_profession_val"
                                                                value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_profession_val" class="fgd_profession_val"
                                                                value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Guarantor's Name</td>
                                            <td colspan="4"><input class="form-control" name="guarantor_name" type="text" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_guarantor" class="fgd_guarantor" value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Relationship</td>
                                            <td colspan="4"><input type="text" name="gurantor_relation" class="form-control" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_relationship" class="fgd_relationship"
                                                                value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td colspan="4"><input type="text" name="gur_company_name" class="form-control" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_company_name" class="fgd_company_name"
                                                                value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Designation</td>
                                            <td colspan="4"><input type="text" name="guarantor_degignation" class="form-control" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_designation" class="fgd_designation"
                                                                value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Residence Address</td>
                                            <td colspan="4"><input type="text" name="guarantor_res_address" class="form-control" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_r_address" class="fgd_r_address" value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Office Address</td>
                                            <td colspan="4"><input type="text" name="office_address" class="form-control" /></td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_o_address" class="fgd_o_address" value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Details</td>
                                            <td colspan="4">
                                                <div class="row">
                                                    <div class="col-2">Land Ph:</div>
                                                    <div class="col-4"><input type="number" name="gur_land_phn" class="form-control" /></div>
                                                    <div class="col-2">Mobile No:</div>
                                                    <div class="col-4"><input type="number" name="gur_mobile" class="form-control" /></div>
                                                </div>
                                            </td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_contact" class="fgd_contact" value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agreed Amount of Guarantee</td>
                                            <td colspan="4">
                                                Guarantee Amount:
                                                <input type="number" name="gur_amount" class="form-control" />
                                            </td>
                                            <td colspan="3" style="text-align: left;">
                                                <div class="row">
                                                    <div class="col-6 border-right">
                                                        <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="1" />
                                                            YES</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label><input type="checkbox" name="fgd_agree" class="fgd_agree" value="2" />
                                                            NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>General Remarks</td>
                                            <td colspan="5">Please note that current residence address OK but holding number plate was not
                                                located at given address.</td>
                                        </tr>
                                        <tr>
                                            <td>Field Agent Name</td>
                                            <td colspan="2"><input type="text" name="field_name" class="form-control" placeholder="Field Name"></td>
                                            <td colspan="2">Signature</td>
                                            <td><input type="text" name="signature" class="form-control" placeholder="Signature"></td>
                                        </tr>

                                    </tbody>
                                </table> --}}
                            </div>
                         
                    </div>
  
                    <div class="card-footer">
                         <div class="row">
                            <div class="col-lg-6">
                            <a href="{{url('/cs_employee_details')}}" class="btn btn-dark">Previous</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{url('/bank_cs_statement_withdrawal')}}" class="btn btn-dark">Next</a>
                            </div>
                        </div>
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

    <div>
   <!-- For Type of Profession -->
        <script type="text/javascript">
            $(".fgd_profession").change(function () {
                $(".fgd_profession").prop('checked', false);
                $(this).prop('checked', true);
            });

            $(".fgd_profession_val").change(function () {
                $(".fgd_profession_val").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Guarantor's Name-->
        <script type="text/javascript">
            $(".fgd_guarantor").change(function () {
                $(".fgd_guarantor").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Relationship -->
        <script type="text/javascript">
            $(".fgd_relationship").change(function () {
                $(".fgd_relationship").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Company Name -->
        <script type="text/javascript">
            $(".fgd_company_name").change(function () {
                $(".fgd_company_name").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Designation -->
        <script type="text/javascript">
            $(".fgd_designation").change(function () {
                $(".fgd_designation").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Residence Address -->
        <script type="text/javascript">
            $(".fgd_r_address").change(function () {
                $(".fgd_r_address").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Office Address -->
        <script type="text/javascript">
            $(".fgd_o_address").change(function () {
                $(".fgd_o_address").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Contact Details -->
        <script type="text/javascript">
            $(".fgd_contact").change(function () {
                $(".fgd_contact").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
        <!-- For Agreed Amount -->
        <script type="text/javascript">
            $(".fgd_agreed").change(function () {
                $(".fgd_agreed").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
          <script type="text/javascript">
            $(".fgd_agree").change(function () {
                $(".fgd_agree").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
    </div>
@endsection
