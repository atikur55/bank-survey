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
        <div class="col-md-12">
            <form action="{{url('cs_personal_photo_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="container">
                        <h3>Step 1: PHOTO UPLOAD</h3>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <p>File Name</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="text" name="file_name" class="form-control" id="file_name" value="{{$file_name_user->file_name}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <p>Multiple Photo</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="file" name="cs_personal_photo[]" class="form-control" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    




                    {{-- <div class="card-header">
                      <h3>Step 5: PHOTO UPLOAD</h3>
                    </div>
  
                    <div class="card-body">                    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                <th colspan="3">File Name</th>
                                <td colspan="2"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$file->file_name}}"></td>
                            </tr>
                                <tr>
                                <!--   <td>Single Photo</td>
                                    <td>
                                        <input type="file" name="cs_photo" class="form-control">
                                    </td> -->
                                    <td>Multiple Photo</td>
                                    <td>
                                        <input type="file" name="cs_multiple_photo[]" class="form-control" multiple>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
 
                    </div> --}}
                    
  
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
