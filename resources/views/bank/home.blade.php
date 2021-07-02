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
            <form action="{{url('file_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Please Select Your File CA OR CS</h3>
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
                            <table class="table">
                              <tr>
                                  <td colspan="">
                                    <div class="card">
                                      <div class="card-body" style="text-align: center;">
                                         <label style="font-size: 30px;"><input type="checkbox" name="file" class="file" value="1"/> CA</label>
                                      </div>
                                    </div>
                                  </td>
                                  <td colspan="">
                                    <div class="card">
                                      <div class="card-body" style="text-align: center;">
                                         <label style="font-size: 30px;"><input type="checkbox" name="file" class="file" value="0"/> CS</label>
                                      </div>
                                    </div>
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
  $(".file").change(function()
  {
      $(".file").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>

@endsection
