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
            <form action="{{url('update_personal_ca_post')}}" method="POST">
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
                              <table class="table table-bordered text-center">
                                <tr>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1" {{$file_personal_ca->city_type == 1 ? 'checked' : ''}}/> AMEX CARD</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2" {{$file_personal_ca->city_type == 2 ? 'checked' : ''}}/> VISA CARD</label></td>
                                </tr>
                              </table>
                            </div>
                            <!-- cs Head End -->
                             <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
                              {{-- <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$file_personal_ca->receiving_date}}"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$file_personal_ca->receiving_date}}"></td>
                                </tr>
							  </table> --}}
							  
							  <div class="container">
								<div class="row table-bordered">
								  <div class="col-md-6 col-12 pt-2 pb-2">
									  <div class="row">
										  <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">RECEIVING DATE:</p></div>
										  <div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$file_personal_ca->receiving_date}}"></div>
									  </div>
								  </div>
								  <div class="col-md-6 col-12 pt-2 pb-2">
									  <div class="row">
										  <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
										  <div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$file_personal_ca->submission_date}}"></div>
									  </div>
								  </div>
								</div>
							</div>
                            </div>
                            @if(session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>{{session('failed')}}</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
                            @endif
                            <!--  Date -->  
							<div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
								<div class="container">
									<div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$file_personal_ca->file_name}}"></div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Personal Details</p></div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">Verified and Found Authentic</p></div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Applicant's Name</p></div>
												<div class="col-md-8"><input type="text" name="ca_appli_name" class="form-control" value="{{$file_personal_ca->ca_appli_name}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name"  value="1" {{$file_personal_ca->ca_pd_name == 1 ? 'checked' : ''}} />
														YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name"  value="2" {{$file_personal_ca->ca_pd_name == 2 ? 'checked' : ''}} />
														NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Current Residence</p></div>
												<div class="col-md-8"><input type="text" name="ca_current_resi" class="form-control" value="{{$file_personal_ca->ca_current_resi}}" /></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence"  value="1" {{$file_personal_ca->ca_pd_cresidence == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence"  value="2" {{$file_personal_ca->ca_pd_cresidence == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Residence Land Phone</p></div>
												<div class="col-md-8"><input type="number" name="ca_land_phn" class="form-control" value="{{$file_personal_ca->ca_land_phn}}" /></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
					                                         value="1" {{$file_personal_ca->ca_pd_landP == 1 ? 'checked' : ''}}/>
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
					                                         value="2" {{$file_personal_ca->ca_pd_landP == 2 ? 'checked' : ''}}/>
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Mobile Phone</p></div>
												<div class="col-md-8"><input type="number" name="ca_mobile_no" class="form-control" value="{{$file_personal_ca->ca_mobile_no}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
					                                         value="1" {{$file_personal_ca->ca_pd_mp == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
					                                         value="2" {{$file_personal_ca->ca_pd_mp == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Spouse's Name</p></div>
												<div class="col-md-8"><input type="text" name="ca_spous_name" class="form-control"  value="{{$file_personal_ca->ca_spous_name}}"/></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname"  value="1" {{$file_personal_ca->ca_pd_sname == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname"  value="2" {{$file_personal_ca->ca_pd_sname == 2 ? 'checked' : ''}} />
					                                    NO</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-md-4"><p style="margin-top: 9px; font-size:14px;">Work Address of Spouse (if any)</p></div>
												<div class="col-md-8"><input type="text" name="ca_work_address" class="form-control" value="{{$file_personal_ca->ca_work_address}}"></div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa"  value="1" {{$file_personal_ca->ca_pd_swa == 1 ? 'checked' : ''}} />
					                                    YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa"  value="2" {{$file_personal_ca->ca_pd_swa == 2 ? 'checked' : ''}} />
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
																	value="1" {{$file_personal_ca->ebd_designation == 1 ? 'checked' : ''}} />
																Family Owned</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="2" {{$file_personal_ca->ebd_designation == 2 ? 'checked' : ''}} />
																Owned</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="3" {{$file_personal_ca->ebd_designation == 3 ? 'checked' : ''}} />
																Rented</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																	value="4" {{$file_personal_ca->ebd_designation == 4 ? 'checked' : ''}} />
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
																<input type="checkbox" name="residential_size" class="residential_size" value="1" {{$file_personal_ca->residential_size == 1 ? 'checked' : ''}} />
																Very Small
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="2" {{$file_personal_ca->residential_size == 2 ? 'checked' : ''}} />
																Small
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="3" {{$file_personal_ca->residential_size == 3 ? 'checked' : ''}} />
																Medium
															</label>
														</div>
														<div class="col-md-3 col-6">
															<label>
																<input type="checkbox" name="residential_size" class="residential_size" value="4" {{$file_personal_ca->residential_size == 4 ? 'checked' : ''}} />
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
															<input type="number" name="ca_year" class="form-control" value="{{$file_personal_ca->ca_year}}" />
														</div>
														<div class="col-md-2 col-4">
															<p style="margin-top: 9px; font-size:14px;">Month (s)</p>
														</div>
														<div class="col-md-4 col-8">
															<input type="number" name="ca_month" class="form-control" value="{{$file_personal_ca->ca_month}}" />
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
															<input type="text" name="ca_con_name" class="form-control" value="{{$file_personal_ca->ca_con_name}}" />
														</div>
														<div class="col-md-4 col-6">
															<input type="date" name="ca_con_date" class="form-control" value="{{$file_personal_ca->ca_con_date}}" />
														</div>
														<div class="col-md-4 col-6">
															<input type="time" name="ca_con_time" class="form-control" value="{{$file_personal_ca->ca_con_time}}" />
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
													<!-- <p style="margin-top: 9px; font-size:14px;">Please note that provided all information is found OK</p> -->
										<div class="row">
                                          <div class="col-6">
                                            <p style="margin-top: 9px; font-size:14px;">Please note that 
												<input type="text" name="personal_rem" list="personal_rem" class="form-control" placeholder="-- Choose Remarks --" value="{{$file_personal_ca->personal_rem}}">
                                              <datalist id="personal_rem">
                                                <option value="">-- Choose Remarks --</option>
                                                <option value="the applicant current residence is ……... that is physically verified.">the applicant current residence is ……...that is physically verified.</option>
                                                <option value="current residence address is OK but holding number plate was not located at given address.">current residence address is OK but holding number plate was not located at given address.</option>
                                                <option value="the applicant suggested visiting his office/residence on 00.00.0000">the applicant suggested visiting his office/residence on 00.00.0000</option>
                                                <option value="the applicant’s ------ is the owner of given current residence and he lives here.">the applicant’s ------ is the owner of given current residence and he lives here.</option>
                                                <option value="given current residence is govt. provided to the applicant.">given current residence is govt. provided to the applicant.</option>
                                                <option value="the applicant lives at given address as a bachelor person.">the applicant lives at given address as a bachelor person.</option>
                                                <option value="the applicant doesn't live given residence address.">the applicant doesn't live given residence address.</option>
                                                <option value="others">others</option>
                                              </datalist>
											</p>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="1" {{$file_personal_ca->gen_remarks == 1 ? 'checked' : ''}}/> Complete</label>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="2" {{$file_personal_ca->gen_remarks == 2 ? 'checked' : ''}}/> Incomplete</label>
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
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$file_personal_ca->field_agent}}" /></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$file_personal_ca->signature}}"></div>
											</div>
										</div>
									</div>
								</div>
                      			{{-- <table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="5">File Name</th>
											<td colspan="3"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$file_personal_ca->file_name}}"></td>
										</tr>
										<tr>
											<th colspan="5" style="font-weight: bold;">Personal Details</th>
											<th colspan="3" style="font-weight: bold;" class="text-center">Verified and Found Authentic</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Applicant's Name</td>
											<td colspan="4">
												<input type="text" name="ca_appli_name" class="form-control" value="{{$file_personal_ca->ca_appli_name}}">
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name" value="1" {{$file_personal_ca->ca_pd_name == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_name" class="ca_pd_name" value="2" {{$file_personal_ca->ca_pd_name == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Current Residence</td>
											<td colspan="4"><input type="text" name="ca_current_resi" class="form-control" value="{{$file_personal_ca->ca_current_resi}}" /></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence" value="1" {{$file_personal_ca->ca_pd_cresidence == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_cresidence" class="ca_pd_cresidence" value="2" {{$file_personal_ca->ca_pd_cresidence == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Residence Land Phone</td>
											<td colspan="4"><input type="number" name="ca_land_phn" class="form-control" value="{{$file_personal_ca->ca_land_phn}}" /></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
																value="1" {{$file_personal_ca->ca_pd_landP == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_landP" class="ca_pd_landP"
																value="2" {{$file_personal_ca->ca_pd_landP == 1 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Mobile Phone</td>
											<td colspan="4">
												<input type="number" name="ca_mobile_no" class="form-control" value="{{$file_personal_ca->ca_mobile_no}}">
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
																value="1" {{$file_personal_ca->ca_pd_mp == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_mp" class="ca_pd_mp"
																value="2" {{$file_personal_ca->ca_pd_mp == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Spouse's Name</td>
											<td colspan="4">
												<input type="text" name="ca_spous_name" class="form-control" value="{{$file_personal_ca->ca_spous_name}}" />
											</td>
											
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname" value="1" {{$file_personal_ca->ca_pd_sname == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_sname" class="ca_pd_sname" value="2" {{$file_personal_ca->ca_pd_sname == 2 ? 'checked' : ''}} />
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Work Address of Spouse (if any)</td>
											<td colspan="4"><input type="text" name="ca_work_address" class="form-control" value="{{$file_personal_ca->ca_work_address}}"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa" value="1" {{$file_personal_ca->ca_pd_swa == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ca_pd_swa" class="ca_pd_swa" value="2" {{$file_personal_ca->ca_pd_swa == 2 ? 'checked' : ''}}/>
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
																value="1" {{$file_personal_ca->ebd_designation == 1 ? 'checked' : ''}}/>
															Family Owned</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="2" {{$file_personal_ca->ebd_designation == 2 ? 'checked' : ''}}/>
															Owned</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="3" {{$file_personal_ca->ebd_designation == 3 ? 'checked' : ''}}/>
															Rented</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation"
																value="4" {{$file_personal_ca->ebd_designation == 4 ? 'checked' : ''}}/>
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
														<label><input type="checkbox" name="residential_size" class="residential_size" value="1" {{$file_personal_ca->residential_size == 1 ? 'checked' : ''}}/>
															Very Small</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size" value="2" {{$file_personal_ca->residential_size == 2 ? 'checked' : ''}}/>
															Small</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size" value="3" {{$file_personal_ca->residential_size == 3 ? 'checked' : ''}}/>
															Medium</label>
													</div>
													<div class="col-3">
														<label><input type="checkbox" name="residential_size" class="residential_size" value="4" {{$file_personal_ca->residential_size == 4 ? 'checked' : ''}}/>
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
														<input type="number" name="ca_year" class="form-control" value="{{$file_personal_ca->ca_year}}" />
													</div>
												</div>
											</td>
											<td colspan="3">
												<div class="row">
													<div class="col-4">Month (s)</div>
													<div class="col-8">
														<input type="number" name="ca_month" class="form-control" value="{{$file_personal_ca->ca_month}}"/>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Contact Person Name &amp; Relation</td>
											<td colspan="2"><input type="text" name="ca_con_name" class="form-control" value="{{$file_personal_ca->ca_con_name}}"/></td>
											<td colspan="2"><input type="date" name="ca_con_date" class="form-control" value="{{$file_personal_ca->ca_con_date}}"/></td>
											<td colspan="2"><input type="time" name="ca_con_time" class="form-control" value="{{$file_personal_ca->ca_con_time}}"/></td>
										</tr>
										<tr>
											<td>General Remarks</td>
											<td colspan="5">Please note that provided all information is found OK</td>
										</tr>
										<tr>
											<td>Field Agent Name</td>
											<td colspan="3"><input type="text" name="field_agent" class="form-control" value="{{$file_personal_ca->field_agent}}"/></td>
											<td>Signature</td>
											<td colspan="3"><input type="text" name="signature" class="form-control" value="{{$file_personal_ca->signature}}"></td>
										</tr>
									</tbody>
								</table> --}}
                        	</div>
                         
                    </div>
  
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">submit</button>
                       <!--  <a href="{{url('/ca_employee_details')}}" class="btn btn-dark">Next</a> -->
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

