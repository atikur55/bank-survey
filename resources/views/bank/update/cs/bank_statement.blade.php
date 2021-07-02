@extends('layout.master')
@section('title')
Bank Statement Information
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
            <form action="{{url('update_bank_statement_details_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Step 4: BANK STATEMENT WITHDRAWAL</h3>
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
                                          <label><input type="checkbox" name="city_type" class="city_type" value="1" {{$bank_statement_info->city_type == 1 ? 'checked' : ''}}/> CITY SOLUTION</label>
                                      </div>
                                      <div class="col-md-4 col-12 pt-2 pb-2">
                                          <label><input type="checkbox" name="city_type" class="city_type" value="2" {{$bank_statement_info->city_type == 2 ? 'checked' : ''}}/> CITY DRIVE</label>
                                      </div>
                                      <div class="col-md-4 col-12 pt-2 pb-2">
                                          <label><input type="checkbox" name="city_type" class="city_type" value="3" {{$bank_statement_info->city_type == 3 ? 'checked' : ''}}/> CITY MANARAH</label>
                                      </div>
                                    </div>
                                </div>




                                {{-- <table class="table table-bordered">
                                        <tr>
                                        <td><label><input type="checkbox" name="city_type" class="city_type" value="1" {{$bank_statement_info->city_type == 1 ? 'checked' : ''}}/> CITY SOLUTION</label></td>
                                        <td><label><input type="checkbox" name="city_type" class="city_type" value="2" {{$bank_statement_info->city_type == 2 ? 'checked' : ''}}/> CITY DRIVE</label></td>
                                        <td><label><input type="checkbox" name="city_type" class="city_type" value="3" {{$bank_statement_info->city_type == 3 ? 'checked' : ''}}/> CITY MANARAH</label></td>
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
                                              <div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$bank_statement_info->receiving_date}}"></div>
                                          </div>
                                      </div>
                                      <div class="col-md-6 col-12 pt-2 pb-2">
                                          <div class="row">
                                              <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
                                              <div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$bank_statement_info->submission_date}}"></div>
                                          </div>
                                      </div>
                                    </div>
                                </div>





                              {{-- <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$bank_statement_info->receiving_date}}"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$bank_statement_info->submission_date}}"></td>
                                </tr>
                              </table> --}}

                            </div>
                            <!--  End Date -->  
                            <div class="col-lg-12 mt-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
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
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">General Remarks</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <!-- <p style="font-weight: bold;">An Original Copy of bank statement has been withdrawn</p> -->
                                        <div class="row">
                                          <div class="col-6">
                                            <p style="margin-top: 9px; font-size:14px;">Please note that 
                                            <input type="text" name="bank_remarks" list="bank_remarks" class="form-control" placeholder="-- Choose  Remarks --" value="{{$bank_statement_info->bank_remarks}}">
                                              <datalist id="bank_remarks">
                                                <option value="An authenticated original copy of bank statement has been withdrawn.">An authenticated original copy of bank statement has been withdrawn.</option>
                                                <option value="Declined to provide bank statement as signature on withdrawn letter does not match with system">Declined to provide bank statement as signature on withdrawn letter does not match with system.</option>
                                                <option value="Declined to provide bank statement as A/C number on withdrawn letter is incorrect">Declined to provide bank statement as A/C number on withdrawn letter is incorrect</option>
                                                <option value="Declined to provide bank statement due to insufficient balance.">Declined to provide bank statement due to insufficient balance.</option>
                                                <option value="Declined to provide bank statement as the applicant is not interested to give service charges">Declined to provide bank statement as the applicant is not interested to give service charges</option>
                                                <option value="Declined to provide bank statement as concerned officer could not contact with the applicant">Declined to provide bank statement as concerned officer could not contact with the applicant</option>
                                                <option value="Bank statement has been received and it will be collected from hand to hand.">Bank statement has been received and it will be collected from hand to hand.</option>
                                                <option value="Concerned officer has demanded company seal & sign on authorization letter from the applicant">Concerned officer has demanded company seal & sign on authorization letter from the applicant</option>
                                                <option value="Concerned officer has demanded authorization letter from the applicant">Concerned officer has demanded authorization letter from the applicant</option>
                                                <option value="Concerned officer has demanded mentioned authorized person.">Concerned officer has demanded mentioned authorized person.</option>
                                                <option value="Others">Others</option>
                                              </datalist>
                                            </p>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="1" {{$bank_statement_info->gen_remarks == 1 ? 'checked' : ''}}/> Complete</label>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="2" {{$bank_statement_info->gen_remarks == 2 ? 'checked' : ''}}/> Incomplete</label>
                                          </div>
                                        </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2">
                                            <p style="margin-top: 9px; font-size:12px; text-transform: capitalize">If Statement Not Verified</p>
                                        </div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <input type="checkbox" class="statement_check" name="statement_check" value="Insufficient Fund" id="" {{$bank_statement_info->statement_check == 'Insufficient Fund' ? 'checked' : ''}}><label>&nbsp;Insufficient Fund</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Original Statement required" {{$bank_statement_info->statement_check == 'Original Statement required' ? 'checked' : ''}}><label>&nbsp;Original Statement required</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Statemetn Required Will Seal & Sign" {{$bank_statement_info->statement_check == 'Statemetn Required Will Seal & Sign' ? 'checked' : ''}}><label>&nbsp;Statemetn Required Will Seal &amp; Sign</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" value="Authorization Letter Required" id="" {{$bank_statement_info->statement_check == 'Authorization Letter Required' ? 'checked' : ''}}><label>&nbsp;Authorization Letter Required</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Statement Will Be Sent By Mail" {{$bank_statement_info->statement_check == 'Statement Will Be Sent By Mail' ? 'checked' : ''}}><label>&nbsp;Statement Will Be Sent By Mail</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Not Agreed To Verify" {{$bank_statement_info->statement_check == 'Not Agreed To Verify' ? 'checked' : ''}}><label>&nbsp;Not Agreed To Verify</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Computer Generated Statement" {{$bank_statement_info->statement_check == 'Computer Generated Statement' ? 'checked' : ''}}><label>&nbsp;Computer Generated Statement</label>
                                                <br>
                                            <input type="checkbox" class="statement_check" name="statement_check" id="" value="Others (plese Specify Below)" {{$bank_statement_info->statement_check == 'Others (plese Specify Below)' ? 'checked' : ''}}><label>&nbsp;Others (plese Specify Below)</label>
                                           <!--  <div>
                                                <span class="badge badge-secondary">Select : {{$bank_statement_info->statement_check}}</span>
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





                                    
                                {{-- <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                        <th colspan="3">File Name</th>
                                        <td colspan="2"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$bank_statement_info->file_name}}"></td>
                                    </tr>
                                        <tr>
                                            <td class="v-form-c1">Name of Applicant</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_appli_name" class="form-control" value="{{$bank_statement_info->sta_appli_name}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Name of Bank</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_bank_name" class="form-control" value="{{$bank_statement_info->sta_bank_name}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Branch Name</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_brance_name" class="form-control" value="{{$bank_statement_info->sta_brance_name}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Account Title</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_account_title" class="form-control" value="{{$bank_statement_info->sta_account_title}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Account No:</td>
                                            <td colspan="3">
                                                <input type="number" name="sta_account_no" class="form-control" value="{{$bank_statement_info->sta_account_no}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Statement Verified By</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_verify" class="form-control" value="{{$bank_statement_info->sta_verify}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Designation</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_designation" class="form-control" value="{{$bank_statement_info->sta_designation}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Details</td>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-2">Land Ph:</div>
                                                    <div class="col-4"><input type="text" name="sta_land_no" class="form-control" value="{{$bank_statement_info->sta_land_no}}"/></div>
                                                    <div class="col-2">Mobile No:</div>
                                                    <div class="col-4"><input type="text" name="sta_mobile_no" class="form-control" value="{{$bank_statement_info->sta_mobile_no}}"/></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Verification Date</td>
                                            <td colspan="3">
                                                <input type="date" name="verify_date" class="form-control" value="{{$bank_statement_info->verify_date}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Remarks</td>
                                            <td colspan="3">
                                                <p>An Original Copy of bank statement has been withdrawn</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>If Statement Not Verified</td>
                                            <td colspan="3">
                                                <input type="checkbox" class="statement_check" name="statement_check" value="Insufficient Fund" id=""><label>&nbsp;Insufficient Fund</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Original Statement required"><label>&nbsp;Original Statement required</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Statemetn Required Will Seal & Sign"><label>&nbsp;Statemetn Required Will Seal &amp; Sign</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id=""><label>&nbsp;Authorization Letter Required</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Statement Will Be Sent By Mail"><label>&nbsp;Statement Will Be Sent By Mail</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Not Agreed To Verify"><label>&nbsp;Not Agreed To Verify</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Computer Generated Statement"><label>&nbsp;Computer Generated Statement</label>
                                                <br>
                                                <input type="checkbox" class="statement_check" name="statement_check" id="" value="Others (plese Specify Below)"><label>&nbsp;Others (plese Specify Below)</label>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Field Agent Name</td>
                                            <td><input type="text" name="field_agent" class="form-control" value="{{$bank_statement_info->field_agent}}"></td>
                                            <td>Signature</td>
                                            <td><input type="text" name="signature" class="form-control" value="{{$bank_statement_info->signature}}"></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Single Photo</td>
                                            <td>
                                                <input type="file" name="cs_photo" class="form-control">
                                            </td>
                                            <td>Multiple Photo</td>
                                            <td>
                                                <input type="file" name="cs_multiple_photo[]" class="form-control" multiple>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table> --}}
 
                            </div>
                         
                    </div>
  
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                           <!--  <a href="{{url('/bank_cs_gurantor_details')}}" class="btn btn-dark">Previous</a> -->
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                             
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
<script type="text/javascript">
  $(".statement_check").change(function()
  {
      $(".statement_check").prop('checked',false);
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
        <script type="text/javascript">
            $(".statement_check").change(function () {
                $(".statement_check").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
    </div>
@endsection
