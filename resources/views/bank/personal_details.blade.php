@extends('layout.master')
@section('title')
All Order
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
        <div class="col-md-10">
            <form action="#" method="POST">
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
                            <table class="table table-bordered">
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
                            <label><input type="checkbox" name="applicants_name" class="applicants_name" value="1"/> YES</label>
                            <label><input type="checkbox" name="applicants_name" class="applicants_name" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Current Residence -->
                              <tr>
                                <th colspan="1">Current Residence</th>
                                <td colspan="3">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" id="current_residence" name="current_residence" placeholder="Current Residence" />
                                        @error('current_residence')
                                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>{{$message}}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        @enderror
                                    </div>
                                </td>
                                <td style="text-align: center;width: 30%">
                            <label><input type="checkbox" name="current_residence" class="current_residence" value="1"/> YES</label>
                            <label><input type="checkbox" name="current_residence" class="current_residence" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Residential Land Phone -->
                              <tr>
                                <th colspan="4">Residential Land Phone</th>
                                <td style="text-align: center;">
                            <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1"/> YES</label>
                            <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Mobile Number -->
                              <tr>
                                <th colspan="4">Mobile No</th>
                                <td style="text-align: center;">
                            <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1"/> YES</label>
                            <label><input type="checkbox" name="mobile_no" class="mobile_no" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Spouse's Name -->
                              <tr>
                                <th colspan="4">Spouse's Name</th>
                                <td style="text-align: center;">
                            <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1"/> YES</label>
                            <label><input type="checkbox" name="spouses_name" class="spouses_name" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Work Address of Spouse -->
                              <tr>
                                <th colspan="4">Work Address of Spouse ( If Any )</th>
                                <td style="text-align: center;">
                            <label><input type="checkbox" name="work_address" class="work_address" value="1"/> YES</label>
                            <label><input type="checkbox" name="work_address" class="work_address" value="0"/> NO</label>
                                </td>
                              </tr>
                              <!-- Residential Size -->
                              <tr>
                                <th>Residential Status</th>
                                <td>
                            <label><input type="checkbox" name="residential_status" class="residential_status" value="0"/> Family Owned</label>
                                </td>
                                <td>
                            <label><input type="checkbox" name="residential_status" class="residential_status" value="1"/> Owned</label>
                                </td>
                                <td>
                            <label><input type="checkbox" name="residential_status" class="residential_status" value="2"/> Rented</label>
                                </td>
                                <td>
                            <label><input type="checkbox" name="residential_status" class="residential_status" value="3"/> Others</label>
                                </td>
                              </tr>
                            </table>
                         
                    </div>
  
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
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
  $(".applicants_name").change(function()
  {
      $(".applicants_name").prop('checked',false);
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
@endsection
