@extends('layout.master')
@section('title')
CA Report
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
            <form action="{{url('personal_ca_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Report</h3>
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
                            <span><?php echo DNS1D::getBarcodeHTML($ca_personal_info->file_name,'C39'); ?></span>
                            <div class="col-lg-8 m-auto" style="margin-bottom: 40px;">
                              <table class="table table-bordered text-center">
                                <tr>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1" {{$ca_personal_info->city_type == 1 ? 'checked' : ''}}/> AMEX CARD</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2" {{$ca_personal_info->city_type == 2 ? 'checked' : ''}}/> VISA CARD</label></td>
                                </tr>
                              </table>
                            </div>
                            <!-- cs Head End -->
                             <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
							 	<div class="container">
									<div class="row table-bordered">
									<div class="col-md-6 col-12 pt-2 pb-2">
										<div class="row">
											<div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">RECEIVING DATE:</p></div>
											<div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$ca_personal_info->receiving_date}}"></div>
										</div>
									</div>
									<div class="col-md-6 col-12 pt-2 pb-2">
										<div class="row">
											<div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
											<div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$ca_personal_info->submission_date}}"></div>
										</div>
									</div>
									</div>
								</div>



                              {{-- <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$ca_personal_info->receiving_date}}"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$ca_personal_info->submission_date}}"></td>
                                </tr>
                              </table> --}}
                            </div>

                            <!--  Personal -->  
                            <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
								<div class="container">
									<div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$ca_personal_info->file_name}}"></div>
									</div>
									<div class="row" style="background: #c8cac8">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Personal Details</p></div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Verified and Found Authentic</p></div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Applicant's Name</p></div>
												<div class="col-md-8"><input type="text" name="ca_appli_name" class="form-control" value="{{$ca_personal_info->ca_appli_name}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name"  value="1" {{$ca_personal_info->ca_pd_name == 1 ? 'checked' : ''}} />
														YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name"  value="2" {{$ca_personal_info->ca_pd_name == 2 ? 'checked' : ''}} />
														NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Current Residence</p></div>
												<div class="col-md-8"><input type="text" name="ca_current_resi" class="form-control" value="{{$ca_personal_info->ca_current_resi}}" /></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence"  value="1" {{$ca_personal_info->ca_pd_cresidence == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence"  value="2" {{$ca_personal_info->ca_pd_cresidence == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Residence Land Phone</p></div>
												<div class="col-md-8"><input type="number" name="ca_land_phn" class="form-control" value="{{$ca_personal_info->ca_land_phn}}" /></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
					                                         value="1" {{$ca_personal_info->ca_pd_landP == 1 ? 'checked' : ''}}/>
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
					                                         value="2" {{$ca_personal_info->ca_pd_landP == 2 ? 'checked' : ''}}/>
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Mobile Phone</p></div>
												<div class="col-md-8"><input type="number" name="ca_mobile_no" class="form-control" value="{{$ca_personal_info->ca_mobile_no}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
					                                         value="1" {{$ca_personal_info->ca_pd_mp == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
					                                         value="2" {{$ca_personal_info->ca_pd_mp == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Spouse's Name</p></div>
												<div class="col-md-8"><input type="text" name="ca_spous_name" class="form-control"  value="{{$ca_personal_info->ca_spous_name}}"/></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname"  value="1" {{$ca_personal_info->ca_pd_sname == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname"  value="2" {{$ca_personal_info->ca_pd_sname == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Work Address of Spouse (if any)</p></div>
												<div class="col-md-8"><input type="text" name="ca_work_address" class="form-control" value="{{$ca_personal_info->ca_work_address}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa"  value="1" {{$ca_personal_info->ca_pd_swa == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa"  value="2" {{$ca_personal_info->ca_pd_swa == 2 ? 'checked' : ''}} />
					                                    NO</label>
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
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="1" {{$ca_personal_info->ebd_designation == 1 ? 'checked' : ''}} />
																Family Owned</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="2" {{$ca_personal_info->ebd_designation == 2 ? 'checked' : ''}} />
																Owned</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="3" {{$ca_personal_info->ebd_designation == 3 ? 'checked' : ''}} />
																Rented</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="4" {{$ca_personal_info->ebd_designation == 4 ? 'checked' : ''}} />
																Others</label>
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
																<input type="checkbox" name="residential_size" class="residential_size" value="1" {{$ca_personal_info->residential_size == 1 ? 'checked' : ''}} />
																Very Small
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="2" {{$ca_personal_info->residential_size == 2 ? 'checked' : ''}} />
																Small
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="3" {{$ca_personal_info->residential_size == 3 ? 'checked' : ''}} />
																Medium
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="4" {{$ca_personal_info->residential_size == 4 ? 'checked' : ''}} />
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
															<input type="number" name="ca_year" class="form-control" value="{{$ca_personal_info->ca_year}}" />
														</div>
														<div class="col-md-2 col-4">
															<p style="margin-top: 9px; font-size:14px;">Month (s)</p>
														</div>
														<div class="col-md-4 col-8">
															<input type="number" name="ca_month" class="form-control" value="{{$ca_personal_info->ca_month}}" />
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
												<div class="col-md-9 col-12">
													<div class="row">
														<div class="col-md-4 col-12">
															<input type="text" name="ca_con_name" class="form-control" value="{{$ca_personal_info->ca_con_name}}" />
														</div>
														<div class="col-md-4 col-6">
															<input type="date" name="ca_con_date" class="form-control" value="{{$ca_personal_info->ca_con_date}}" />
														</div>
														<div class="col-md-4 col-6">
															<input type="time" name="ca_con_time" class="form-control" value="{{$ca_personal_info->ca_con_time}}" />
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
												<div class="col-md-9 col-12">
													<p style="margin-top: 9px; font-size:14px;">Please note that {{$ca_personal_info->personal_rem}} &nbsp; </p>
												@if($ca_personal_info->gen_remarks == 1)
                                                <span class="badge badge-pill badge-secondary">Completed</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Incompleted</span>
                                                @endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$ca_personal_info->field_agent}}" /></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$ca_personal_info->signature}}"></div>
											</div>
										</div>
									</div>
							</div>

<hr>

								{{-- <table class="table table-bordered">
									<thead>
										<tr>
										<th colspan="5">File Name</th>
										<td colspan="3"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$ca_personal_info->file_name}}"></td>
									</tr>
										<tr>
											<th colspan="5" style="font-weight: bold;text-align: center;">Personal Details</th>
											<th colspan="3" style="font-weight: bold;" class="text-center">Verified and Found Authentic</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Applicant's Name</td>
											<td colspan="4">
												<input type="text" name="ca_appli_name" class="form-control" value="{{$ca_personal_info->ca_appli_name}}">
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name" value="1" {{$ca_personal_info->ca_pd_name == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name" value="2" {{$ca_personal_info->ca_pd_name == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Current Residence</td>
											<td colspan="4"><input type="text" name="ca_current_resi" class="form-control"  value="{{$ca_personal_info->ca_current_resi}}"/></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence" value="1" {{$ca_personal_info->ca_pd_cresidence == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence" value="2" {{$ca_personal_info->ca_pd_cresidence == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Residence Land Phone</td>
											<td colspan="4"><input type="number" name="ca_land_phn" class="form-control" value="{{$ca_personal_info->ca_land_phn}}"/></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
																value="1" {{$ca_personal_info->ca_pd_landP == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
																value="2" {{$ca_personal_info->ca_pd_landP == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Mobile Phone</td>
											<td colspan="4">
												<input type="number" name="ca_mobile_no" class="form-control" value="{{$ca_personal_info->ca_mobile_no}}">
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
																value="1" {{$ca_personal_info->ca_pd_mp == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
																value="2" {{$ca_personal_info->ca_pd_mp == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Spouse's Name</td>
											<td colspan="4">
												<input type="text" name="ca_spous_name" class="form-control" value="{{$ca_personal_info->ca_spous_name}}"/>
											</td>
											
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname" value="1" {{$ca_personal_info->ca_pd_sname == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname" value="2" {{$ca_personal_info->ca_pd_sname == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Work Address of Spouse (if any)</td>
											<td colspan="4"><input type="text" name="ca_work_address" class="form-control" value="{{$ca_personal_info->ca_work_address}}"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa" value="1" {{$ca_personal_info->ca_pd_swa == 1 ? 'checked' : ''}} />
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa" value="2" {{$ca_personal_info->ca_pd_swa == 2 ? 'checked' : ''}} />
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Residential Status</td>
											<td colspan="7">
												<div class="row">
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="1" {{$ca_personal_info->ebd_designation == 1 ? 'checked' : ''}}/>
															Family Owned</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="2" {{$ca_personal_info->ebd_designation == 2 ? 'checked' : ''}}/>
															Owned</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="3" {{$ca_personal_info->ebd_designation == 3 ? 'checked' : ''}}/>
															Rented</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="4" {{$ca_personal_info->ebd_designation == 4 ? 'checked' : ''}}/>
															Others</label>
													</div> 
												</div>
											</td>
										</tr>
										<tr>
											<td>Residential Size</td>
											<td colspan="7">
												<div class="row">
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size"
																value="1" {{$ca_personal_info->residential_size == 1 ? 'checked' : ''}}/>
															Very Small</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size"
																value="2" {{$ca_personal_info->residential_size == 2 ? 'checked' : ''}}/>
															Small</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size"
																value="3" {{$ca_personal_info->residential_size == 3 ? 'checked' : ''}}/>
															Medium</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size"
																value="4" {{$ca_personal_info->residential_size == 4 ? 'checked' : ''}}/>
															Large</label>
													</div> 
												</div>
											</td>
										</tr>
										<tr>
											<td>Number of Years in Current Location</td>
											<td colspan="3">
												<div class="row">
													<div class="col-4">Year (s)</div>
													<div class="col-8">
														<input type="number" name="ca_year" class="form-control" value="{{$ca_personal_info->ca_year}}" />
													</div>
												</div>
											</td>
											<td colspan="3">
												<div class="row">
													<div class="col-4">Month (s)</div>
													<div class="col-8">
														<input type="number" name="ca_month" class="form-control" value="{{$ca_personal_info->ca_month}}"/>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Contact Person Name &amp; Relation</td>
											<td colspan="2"><input type="text" name="ca_con_name" class="form-control" value="{{$ca_personal_info->ca_con_name}}"/></td>
											<td colspan="2"><input type="date" name="ca_con_date" class="form-control" value="{{$ca_personal_info->ca_con_date}}"/></td>
											<td colspan="2"><input type="time" name="ca_con_time" class="form-control" value="{{$ca_personal_info->ca_con_time}}"/></td>
										</tr>
										<tr>
											<td>General Remarks</td>
											<td colspan="5" style="font-weight: bold;">Please note that provided all information is found OK but holding number plate was not located at given address.</td>
										</tr>
										<tr>
											<td>Field Agent Name</td>
											<td colspan="3"><input type="text" name="field_agent" class="form-control" value="{{$ca_personal_info->field_agent}}"/></td>
											<td>Signature</td>
											<td colspan="3"><input type="text" name="signature" class="form-control" value="{{$ca_personal_info->signature}}"></td>
										</tr>
									</tbody>
								</table> --}}

					        <!-- Employment -->
							<div class="container">
									<div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p>
											<?php echo DNS1D::getBarcodeHTML($ca_employment_info->file_name, 'C39'); ?>
										</div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$ca_employment_info->file_name}}"></div>
									</div>
									<div class="row" style="background: #c8cac8">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Employee or Business Details</p></div>
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
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$ca_employment_info->ebd_profession == 1 ? 'checked' : ''}} />
																	Service Holder</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" {{$ca_employment_info->ebd_profession == 2 ? 'checked' : ''}} />
																	Businessman </label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$ca_employment_info->ebd_profession == 3 ? 'checked' : ''}} />
																	Self Employed</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$ca_employment_info->ebd_profession == 4 ? 'checked' : ''}} />
																	Other (Landlord, Doctor )</label>
														</div> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" {{$ca_employment_info->prof_valid == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$ca_employment_info->prof_valid == 2 ? 'checked' : ''}} />
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
													<input type="text" name="ca_company_name" class="form-control" value="{{$ca_employment_info->ca_company_name}}" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$ca_employment_info->ebd_company == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" {{$ca_employment_info->ebd_company == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_office_address" class="form-control" value="{{$ca_employment_info->ca_office_address}}" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$ca_employment_info->ebd_office_address == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$ca_employment_info->ebd_office_address == 2 ? 'checked' : ''}} />
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
																	<input type="number" name="ca_land_phn" class="form-control" value="{{$ca_employment_info->ca_land_phn}}">
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="row">
																<div class="col-12">Mobile No:</div>
																<div class="col-12">
																	<input type="number" name="ca_mobile_no" class="form-control" value="{{$ca_employment_info->ca_mobile_no}}">
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
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ca_employment_info->ebd_office_phone == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$ca_employment_info->ebd_office_phone == 2 ? 'checked' : ''}} />
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
																	<input type="number" name="ca_year" class="form-control" value="{{$ca_employment_info->ca_year}}">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">Month (s)</div>
																<div class="col-12">
																	<input type="number" name="ca_month" class="form-control" value="{{$ca_employment_info->ca_month}}">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">No. of Employee</div>
																<div class="col-12">
																	<input type="number" name="num_of_employee" class="form-control" value="{{$ca_employment_info->num_of_employee}}">
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
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ca_employment_info->ebd_serv_len == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$ca_employment_info->ebd_serv_len == 2 ? 'checked' : ''}} />
															NO</label>
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
													<input type="text" name="ca_nature_busi" class="form-control" value="{{$ca_employment_info->ca_nature_busi}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" {{$ca_employment_info->ebd_nat_bus == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$ca_employment_info->ebd_nat_bus == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_designation" class="form-control" value="{{$ca_employment_info->ca_designation}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$ca_employment_info->ebd_designation == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$ca_employment_info->ebd_designation == 2 ? 'checked' : ''}} />
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
													Verified &amp; Found {{$ca_employment_info->salary_rem}} &nbsp;OK
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$ca_employment_info->ebd_sal_serv == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$ca_employment_info->ebd_sal_serv == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_salary_verify" class="form-control" value="{{$ca_employment_info->ca_salary_verify}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$ca_employment_info->ebd_salVname == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$ca_employment_info->ebd_salVname == 2 ? 'checked' : ''}} /> NO</label>
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
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$ca_employment_info->ebd_bpstatus == 1 ? 'checked' : ''}} />
															Rented
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$ca_employment_info->ebd_bpstatus == 2 ? 'checked' : ''}} />
															Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$ca_employment_info->ebd_bpstatus == 3 ? 'checked' : ''}} />
															Family Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$ca_employment_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
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
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$ca_employment_info->ebd_bplace == 1 ? 'checked' : ''}}/>
															Very Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$ca_employment_info->ebd_bplace == 2 ? 'checked' : ''}}/>
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$ca_employment_info->ebd_bplace == 3 ? 'checked' : ''}}/>
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$ca_employment_info->ebd_bplace == 4 ? 'checked' : ''}}/>
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
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$ca_employment_info->ebd_bus_off == 1 ? 'checked' : ''}} />
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$ca_employment_info->ebd_bus_off == 2 ? 'checked' : ''}} />
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$ca_employment_info->ebd_bus_off == 3 ? 'checked' : ''}} />
															Large
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$ca_employment_info->ebd_bus_off == 4 ? 'checked' : ''}} />
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
												<div class="col-md-9 col-12">
													<p style="margin-top: 9px; font-size:14px;">Please note that {{$ca_employment_info->employee_rem}} &nbsp;</p>
												@if($ca_employment_info->gen_remarks == 1)
                                                <span class="badge badge-pill badge-secondary">Completed</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Incompleted</span>
                                                @endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$ca_employment_info->field_agent}}"></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$ca_employment_info->signature}}"></div>
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
					                                <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$ca_employment_info->ebd_profession == 1 ? 'checked' : ''}}/> Service
					                                    Holder</label>
					                            </div>
					                            <div class="col-6"><label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" {{$ca_employment_info->ebd_profession == 2 ? 'checked' : ''}}/> Businessman</label></div>
					                        </div>
					                        <div class="row">
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$ca_employment_info->ebd_profession == 3 ? 'checked' : ''}}/> Self
					                                    Employed</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$ca_employment_info->ebd_profession == 4 ? 'checked' : ''}}/> Other
					                                    (Landlord, Doctor )</label>
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" {{$ca_employment_info->prof_valid == 1 ? 'checked' : ''}}/>
					                                    YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$ca_employment_info->prof_valid == 2 ? 'checked' : ''}}/>
					                                    NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Company Name</td>
					                    <td colspan="4"><input type="text" name="ca_company_name" class="form-control" value="{{$ca_employment_info->ca_company_name}}" /></td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$ca_employment_info->ebd_company == 1 ? 'checked' : ''}}/> YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" {{$ca_employment_info->ebd_company == 2 ? 'checked' : ''}}/> NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Office Address</td>
					                    <td colspan="4"><input type="text" name="ca_office_address" class="form-control" value="{{$ca_employment_info->ca_office_address}}" /></td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$ca_employment_info->ebd_office_address == 1 ? 'checked' : ''}}/>
					                                    YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$ca_employment_info->ebd_office_address == 2 ? 'checked' : ''}}/>
					                                    NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Office Phone Number</td>
					                    <td colspan="2">
					                        <div class="row">
					                            <div class="col-4">
					                                Land Ph:
					                            </div>
					                            <div class="col-8">
					                                <input type="number" name="ca_land_phn" class="form-control" value="{{$ca_employment_info->ca_land_phn}}">
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="2">
					                        <div class="row">
					                            <div class="col-4">Mobile No:</div>
					                            <div class="col-8">
					                                <input type="number" name="ca_mobile_no" class="form-control" value="{{$ca_employment_info->ca_mobile_no}}">
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ca_employment_info->ebd_office_phone == 1 ? 'checked' : ''}}/>
					                                    YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$ca_employment_info->ebd_office_phone == 2 ? 'checked' : ''}}/>
					                                    NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Business / Service Length</td>
					                    <td>
					                        <div class="row">
					                            <div class="col-6 border-right">Year (s)</div>
					                            <div class="col-6"><input type="number" name="ca_year" class="form-control" value="{{$ca_employment_info->ca_year}}"></div>
					                        </div>
					                    </td>
					                    <td>
					                        <div class="row">
					                            <div class="col-6 border-right">Month (s)</div>
					                            <div class="col-6"><input type="number" name="ca_month" class="form-control" value="{{$ca_employment_info->ca_month}}"></div>
					                        </div>
					                    </td>
					                    <td colspan="2">
					                        <div class="row">
					                            <div class="col-6 border-right">No. of Employee</div>
					                            <div class="col-6"><input type="number" name="num_of_employee" class="form-control" value="{{$ca_employment_info->num_of_employee}}"></div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" {{$ca_employment_info->ebd_serv_len == 1 ? 'checked' : ''}}/> YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" {{$ca_employment_info->ebd_serv_len == 2 ? 'checked' : ''}}/> NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Nature of Business</td>
					                    <td colspan="4"><input type="text" name="ca_nature_busi" class="form-control" value="{{$ca_employment_info->ca_nature_busi}}"></td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" {{$ca_employment_info->ebd_nat_bus == 1 ? 'checked' : ''}}/> YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$ca_employment_info->ebd_nat_bus == 2 ? 'checked' : ''}}/> NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Designation</td>
					                    <td colspan="4"><input type="text" name="ca_designation" class="form-control" value="{{$ca_employment_info->ca_designation}}"></td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$ca_employment_info->ebd_designation == 1 ? 'checked' : ''}}/>
					                                    YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$ca_employment_info->ebd_designation == 2 ? 'checked' : ''}}/>
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
					                                <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$ca_employment_info->ebd_sal_serv == 1 ? 'checked' : ''}}/> YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$ca_employment_info->ebd_sal_serv == 2 ? 'checked' : ''}}/> NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Salary Verified by (Name)</td>
					                    <td colspan="4"><input type="text" name="ca_salary_verify" class="form-control" value="{{$ca_employment_info->ca_salary_verify}}"></td>
					                    <td colspan="3" style="text-align: left;">
					                        <div class="row">
					                            <div class="col-6 border-right">
					                                <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$ca_employment_info->ebd_salVname == 1 ? 'checked' : ''}}/> YES</label>
					                            </div>
					                            <div class="col-6">
					                                <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$ca_employment_info->ebd_salVname == 2 ? 'checked' : ''}}/> NO</label>
					                            </div>
					                        </div>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Business Place Status</td>
					                    <td colspan="4">
					                        <div class="row">
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$ca_employment_info->ebd_bpstatus == 1 ? 'checked' : ''}}/>
					                                    Rented
					                                </label>
					                            </div>
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$ca_employment_info->ebd_bpstatus == 2 ? 'checked' : ''}}/>
					                                    Owned
					                                </label>
					                            </div>
					                            <div class="col-4">
					                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$ca_employment_info->ebd_bpstatus == 3 ? 'checked' : ''}}/>
					                                    Family Owned
					                                </label>
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$ca_employment_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
					                            Company Owned
					                        </label>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Business Place Size</td>
					                    <td colspan="4">
					                        <div class="row">
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$ca_employment_info->ebd_bplace == 1 ? 'checked' : ''}}/>
					                                    Very Small
					                                </label>
					                            </div>
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$ca_employment_info->ebd_bplace == 2 ? 'checked' : ''}}/>
					                                    Small
					                                </label>
					                            </div>
					                            <div class="col-4">
					                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$ca_employment_info->ebd_bplace == 3 ? 'checked' : ''}}/>
					                                    Medium
					                                </label>
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$ca_employment_info->ebd_bplace == 4 ? 'checked' : ''}}/>
					                            Large
					                        </label>
					                    </td>
					                </tr>
					                <tr>
					                    <td>Business/Office Signboard</td>
					                    <td colspan="4">
					                        <div class="row">
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$ca_employment_info->ebd_bus_off == 1 ? 'checked' : ''}}/>
					                                    Small
					                                </label>
					                            </div>
					                            <div class="col-4 border-right">
					                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$ca_employment_info->ebd_bus_off == 2 ? 'checked' : ''}}/>
					                                    Medium
					                                </label>
					                            </div>
					                            <div class="col-4">
					                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$ca_employment_info->ebd_bus_off == 3 ? 'checked' : ''}}/>
					                                    Large
					                                </label>
					                            </div>
					                        </div>
					                    </td>
					                    <td colspan="3" style="text-align: left;">
					                        <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$ca_employment_info->ebd_bus_off == 4 ? 'checked' : ''}}/>
					                            No Signboard
					                        </label>
					                    </td>
					                </tr>
					                <tr>
					                    <td>General Remarks</td>
					                    <td colspan="5" style="font-weight: bold;">Please note that given company head office (Head Office: Rupayan Golden Age (5th & 6th fl.),<br> House #99, Gulshan Avenue, Gulshan-01, Dhaka) is entry restricted. So Lol has<br> been authenticated at absence of our executive by cooperation of the front desk executive.</td>
					                </tr>
					                <tr>
					                    <td>Field Agent Name</td>
					                    <td colspan="2"><input type="text" name="field_agent" class="form-control" value="{{$ca_employment_info->field_agent??''}}"></td>
					                    <td colspan="2">Signature</td>
					                    <td><input type="text" name="signature" class="form-control" value="{{$ca_employment_info->signature??''}}"></td>
					                </tr>
					            </tbody>
					        </table> --}}
                        	</div>

							<!-- Bank -->
							<div class="container">
                                    <div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p>
											<?php echo DNS1D::getBarcodeHTML($ca_bank_info->file_name, 'C39'); ?>
										</div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$ca_bank_info->file_name??''}}"></div>
                                    </div>
									<div class="row" style="background: #c8cac8">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Bank Statement</p></div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Verified and Found Authentic</p></div>
									</div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Applicant</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_app_name" class="form-control" value="{{$ca_bank_info->ca_app_name??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Name of Bank</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_bank_name" class="form-control" value="{{$ca_bank_info->ca_bank_name??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Branch Name</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_branch_name" class="form-control" value="{{$ca_bank_info->ca_branch_name??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account Title</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_account_title" class="form-control" value="{{$ca_bank_info->ca_account_title??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Account No:</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="number" name="ca_account_no" class="form-control" value="{{$ca_bank_info->ca_account_no??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Statement Verified By</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_verify_name" class="form-control" value="{{$ca_bank_info->ca_verify_name??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Designation</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="text" name="ca_designation" class="form-control" value="{{$ca_bank_info->ca_designation??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Contact Details</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <p>Land Ph:</p>
                                                    <input type="number" name="ca_land" class="form-control" value="{{$ca_bank_info->ca_land??''}}" />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p>Mobile No:</p>
                                                    <input type="number" name="ca_mobile" class="form-control" value="{{$ca_bank_info->ca_mobile??''}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Verification Date</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2"><input type="date" name="ca_varify_date" class="form-control" value="{{$ca_bank_info->ca_varify_date??''}}"></div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-size:12px; text-transform: capitalize">Remarks</p></div>
										<div class="col-md-9 table-bordered pb-2 pt-2">
											<p style="font-weight: bold;">{{$ca_bank_info->ca_check_verify}}</p>
											<p> {{$ca_bank_info->bank_remarks}} &nbsp;</p>
											@if($ca_bank_info->gen_remarks == 1)
                                            <span class="badge badge-pill badge-secondary">Completed</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Incompleted</span>
                                            @endif
										</div>
                                    </div>
                                    <div class="row">
										<div class="col-md-3 table-bordered pb-2 pt-2">
                                            <p style="margin-top: 9px; font-size:12px; text-transform: capitalize">If Statement Not Verified</p>
                                        </div>
										<div class="col-md-9 table-bordered pb-2 pt-2">
<input type="checkbox" name="ca_check_verify" id="" value="Insufficient Fund" {{$ca_bank_info->ca_check_verify == 'Insufficient Fund' ? 'checked':''}}><label
for="insufficient_fund">&nbsp;Insufficient Fund</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Original Statement required" {{$ca_bank_info->ca_check_verify == 'Original Statement required' ? 'checked':''}}><label
for="original_statement_required">&nbsp;Original Statement required</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Statemetn Required Will Seal &
Sign" {{$ca_bank_info->ca_check_verify == 'Statemetn Required Will Seal &
Sign' ? 'checked':''}}><label
for="statement_required_will_seal_sign">&nbsp;Statemetn Required Will Seal &amp;
Sign</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Authorization Letter Required" {{$ca_bank_info->ca_check_verify == 'Authorization Letter Required' ? 'checked':''}}><label
for="auth_letter_req">&nbsp;Authorization Letter Required</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Statement Will
Be Sent By Mail" {{$ca_bank_info->ca_check_verify == 'Statement Will
Be Sent By Mail' ? 'checked':''}}><label for="stmt_by_mail">&nbsp;Statement Will
Be Sent By Mail</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Statement 
Not Clear" {{$ca_bank_info->ca_check_verify == 'Statement 
Not Clear' ? 'checked':''}}><label for="stmt_by_mail">&nbsp;Statement 
Not Clear</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Agreed To Verify" {{$ca_bank_info->ca_check_verify == 'Agreed To Verify' ? 'checked':''}}><label for="not_agree_verify">&nbsp;Not
Agreed To Verify</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Computer Generated
Statement" {{$ca_bank_info->ca_check_verify == 'Computer Generated
Statement' ? 'checked':''}}><label for="gen_stmt">&nbsp;Computer Generated
Statement</label>
<br>
<input type="checkbox" name="ca_check_verify" id="" value="Others (plese Specify
Below)" {{$ca_bank_info->ca_check_verify == 'Others (plese Specify
Below)' ? 'checked':''}}><label for="others">&nbsp;Others (plese Specify
Below)</label>
                                                <!-- <div>
                                                	<span class="badge badge-secondary">Select : {{$ca_bank_info->ca_check_verify}}</span>
                                                </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
										<div class="col-md-12 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Field Agent Name</p></div>
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$ca_bank_info->field_agent??''}}"></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$ca_bank_info->signature??''}}"></div>
											</div>
										</div>
									</div>
                                </div>
                        	
                         
                    </div>
  
                    <!-- <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <a href="{{url('/ca_employee_details')}}" class="btn btn-dark">Next</a>
                    </div> -->
                </div>
            </form>
        </div>
    </div>.
    <h4>CA: Personal Details Photo</h4><br>
    <div class="row">
      @foreach($ca_personal_photo as $photo)
      <div class="col-lg-4">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/ca/personal/')}}/{{$photo->ca_personal_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CA: Employment Details Photo</h4><br>
    <div class="row">
      @foreach($ca_employment_photo as $photo)
      <div class="col-lg-4">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/ca/employment/')}}/{{$photo->ca_employment_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CA: Bank Statement Photo</h4><br>
    <div class="row">
      @foreach($get_photo as $photo)
      <div class="col-lg-4">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/ca_photo/multiple/')}}/{{$photo->ca_multiple_photo}}" width="200px;">
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
        $(".ca_pd_name").change(function () {
            $(".ca_pd_name").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_pd_cresidence").change(function () {
            $(".ca_pd_cresidence").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_pd_landP").change(function () {
            $(".ca_pd_landP").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_pd_mp").change(function () {
            $(".ca_pd_mp").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_pd_sname").change(function () {
            $(".ca_pd_sname").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_pd_swa").change(function () {
            $(".ca_pd_swa").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_designation").change(function () {
            $(".ebd_designation").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".residential_size").change(function () {
            $(".residential_size").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
@endsection

