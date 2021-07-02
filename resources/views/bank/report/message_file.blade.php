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
 <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>But You Don't Create File Name So You have not Seen Anything.</p>
  <hr>
  <p class="mb-0">Firstly You Have To Set your File Name On CS File. Your File Name {{$file_name}}</p>
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
