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
            <form action="{{url('bank_statement_details_post')}}" method="POST" enctype="multipart/form-data">
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
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Applicant</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_appli_name" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Bank</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_bank_name" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Branch Name</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_brance_name" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account Title</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_account_title" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account No:</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="number" name="sta_account_no" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Statement Verified By</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_verify" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Designation</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="sta_designation" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Contact Details</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <p>Land Ph:</p>
                                                    <input type="number" name="sta_land_no" class="form-control" />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p>Mobile No:</p>
                                                    <input type="number" name="sta_mobile_no" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Verification Date</p></div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2"><input type="date" name="verify_date" class="form-control"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Remarks</p></div>
                                        <!-- <div class="col-md-9 table-bordered pb-2 pt-2"><p style="font-weight: bold;">An Original Copy of bank statement has been withdrawn</p></div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 table-bordered pb-2 pt-2">
                                            <p style="margin-top: 9px; font-size:12px; text-transform: capitalize">If Statement Not Verified</p>
                                        </div>
                                        <div class="col-md-9 table-bordered pb-2 pt-2">
                                            <input type="checkbox" name="statement_check[]" id="" value="Insufficient Fund"><label
                                                    for="insufficient_fund">&nbsp;Insufficient Fund</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Original Statement required"><label
                                                    for="original_statement_required">&nbsp;Original Statement required</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Statemetn Required Will Seal & Sign"><label
                                                    for="Statemetn Required Will Seal & Sign">&nbsp;Statemetn Required Will Seal &amp;
                                                    Sign</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Authorization Letter Required"><label
                                                    for="auth_letter_req">&nbsp;Authorization Letter Required</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Statement Will
                                                    Be Sent By Mail"><label for="stmt_by_mail">&nbsp;Statement Will
                                                    Be Sent By Mail</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Not Agreed To Verify">
                                                <label for="Not Agreed To Verify">&nbsp;Not
                                                    Agreed To Verify</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Computer Generated Statement">
                                                <label for="gen_stmt">&nbsp;Computer Generated
                                                    Statement</label>
                                                <br>
                                                <input type="checkbox" name="ca_check_verify[]" id="" value="Others (plese Specify Below)">
                                                <label for="others">&nbsp;Others (plese Specify
                                                    Below)</label>
                                                <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
                                                <div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control"></div>
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
                                                <div class="col-md-3 col-12"><input type="text" name="signature" class="form-control"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Single Photo</p></div>
                                                <div class="col-md-3 col-12"><input type="file" name="cs_photo" class="form-control"></div>
                                                <div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Multiple Photo</p></div>
                                                <div class="col-md-3 col-12"><input type="file" name="cs_multiple_photo" class="form-control" multiple></div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                    
                                <!-- <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                        <th colspan="3">File Name</th>
                                        <td colspan="2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name"></td>
                                    </tr>
                                        <tr>
                                            <td class="v-form-c1">Name of Applicant</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_appli_name" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Name of Bank</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_bank_name" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Branch Name</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_brance_name" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Account Title</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_account_title" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Account No:</td>
                                            <td colspan="3">
                                                <input type="number" name="sta_account_no" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Statement Verified By</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_verify" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Designation</td>
                                            <td colspan="3">
                                                <input type="text" name="sta_designation" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Details</td>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-2">Land Ph:</div>
                                                    <div class="col-4"><input type="number" name="sta_land_no" class="form-control" /></div>
                                                    <div class="col-2">Mobile No:</div>
                                                    <div class="col-4"><input type="number" name="sta_mobile_no" class="form-control" /></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-form-c1">Verification Date</td>
                                            <td colspan="3">
                                                <input type="date" name="verify_date" class="form-control">
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
                                                <input type="checkbox" name="statement_check[]" value="Insufficient Fund" id=""><label>&nbsp;Insufficient Fund</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Original Statement required"><label>&nbsp;Original Statement required</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Statemetn Required Will Seal & Sign"><label>&nbsp;Statemetn Required Will Seal &amp; Sign</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id=""><label>&nbsp;Authorization Letter Required</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Statement Will Be Sent By Mail"><label>&nbsp;Statement Will Be Sent By Mail</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Not Agreed To Verify"><label>&nbsp;Not Agreed To Verify</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Computer Generated Statement"><label>&nbsp;Computer Generated Statement</label>
                                                <br>
                                                <input type="checkbox" name="statement_check[]" id="" value="Others (plese Specify Below)"><label>&nbsp;Others (plese Specify Below)</label>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Field Agent Name</td>
                                            <td><input type="text" name="field_agent" class="form-control"></td>
                                            <td>Signature</td>
                                            <td><input type="text" name="signature" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Single Photo</td>
                                            <td>
                                                <input type="file" name="cs_photo" class="form-control">
                                            </td>
                                            <td>Multiple Photo</td>
                                            <td>
                                                <input type="file" name="cs_multiple_photo" class="form-control" multiple>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->
                            </div>
                         
                    </div>
  
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                            <a href="{{url('/bank_cs_gurantor_details')}}" class="btn btn-dark">Previous</a>
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
