@extends('layout.master')
@section('title')
Employment Information
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
            <form action="{{url('update_employment_ca_post')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3>Step 2: Employment or Business Details</h3>
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
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1" {{$ac_employee_info->city_type == 1 ? 'checked' : ''}}/> AMEX CARD</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2" {{$ac_employee_info->city_type == 2 ? 'checked' : ''}}/> VISA CARD</label></td>
                                </tr>
                              </table>
                            </div>
                            <!-- cs Head End -->
                             {{-- <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
                              <table class="table table-bordered">
                                <tr>
                                  <th>RECEIVING DATE: </th>
                                  <td><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$ac_employee_info->receiving_date}}"></td>
                                  <td></td>
                                  <th>SUBMISSION DATE</th>
                                  <td><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$ac_employee_info->submission_date}}"></td>
                                </tr>
                              </table>
							</div> --}}
							
							<div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
								<div class="container">
									<div class="row table-bordered">
									  <div class="col-md-6 col-12 pt-2 pb-2">
										  <div class="row">
											  <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">RECEIVING DATE:</p></div>
											  <div class="col-7"><input type="date" name="receiving_date" id="receiving_date" class="form-control" value="{{$ac_employee_info->receiving_date}}"></div>
										  </div>
									  </div>
									  <div class="col-md-6 col-12 pt-2 pb-2">
										  <div class="row">
											  <div class="col-5"><p style="margin-top: 9px; font-weight: bold; font-size:12px">SUBMISSION DATE:</p></div>
											  <div class="col-7"><input type="date" name="submission_date" id="submission_date" class="form-control" value="{{$ac_employee_info->submission_date}}"></div>
										  </div>
									  </div>
									</div>
								</div>
							</div>
							
							<!--  Date -->  
							<div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
								<div class="container">
									<div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name" value="{{$ac_employee_info->file_name}}"></div>
									</div>
									<div class="row">
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
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$ac_employee_info->ebd_profession == 1 ? 'checked' : ''}} />
																	Service Holder</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" {{$ac_employee_info->ebd_profession == 2 ? 'checked' : ''}} />
																	Businessman </label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$ac_employee_info->ebd_profession == 3 ? 'checked' : ''}} />
																	Self Employed</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$ac_employee_info->ebd_profession == 4 ? 'checked' : ''}} />
																	Other (Landlord, Doctor )</label>
														</div> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" {{$ac_employee_info->prof_valid == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$ac_employee_info->prof_valid == 2 ? 'checked' : ''}} />
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
													<input type="text" name="ca_company_name" class="form-control" value="{{$ac_employee_info->ca_company_name}}" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$ac_employee_info->ebd_company == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" {{$ac_employee_info->ebd_company == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_office_address" class="form-control" value="{{$ac_employee_info->ca_office_address}}" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$ac_employee_info->ebd_office_address == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$ac_employee_info->ebd_office_address == 2 ? 'checked' : ''}} />
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
																	<input type="text" name="ca_land_phn" class="form-control" value="{{$ac_employee_info->ca_land_phn}}">
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="row">
																<div class="col-12">Mobile No:</div>
																<div class="col-12">
																	<input type="text" name="ca_mobile_no" class="form-control" value="{{$ac_employee_info->ca_mobile_no}}">
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
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ac_employee_info->ebd_office_phone == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$ac_employee_info->ebd_office_phone == 2 ? 'checked' : ''}} />
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
																	<input type="number" name="ca_year" class="form-control" value="{{$ac_employee_info->ca_year}}">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">Month (s)</div>
																<div class="col-12">
																	<input type="number" name="ca_month" class="form-control" value="{{$ac_employee_info->ca_month}}">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">No. of Employee</div>
																<div class="col-12">
																	<input type="number" name="num_of_employee" class="form-control" value="{{$ac_employee_info->num_of_employee}}">
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
													<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" {{$ac_employee_info->ebd_serv_len == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" {{$ac_employee_info->ebd_serv_len == 2 ? 'checked' : ''}} />
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
													<input type="text" name="ca_nature_busi" class="form-control" value="{{$ac_employee_info->ca_nature_busi}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" {{$ac_employee_info->ebd_nat_bus == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$ac_employee_info->ebd_nat_bus == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_designation" class="form-control" value="{{$ac_employee_info->ca_designation}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$ac_employee_info->ebd_designation == 1 ? 'checked' : ''}} />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$ac_employee_info->ebd_designation == 2 ? 'checked' : ''}} />
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
												<!-- 	Verified &amp; Found  -->
												<div class="row">
                                          <div class="col-6">
                                            <p style="margin-top: 9px; font-size:14px;">Verified &amp; Found
												<!--<input type="text" name="salary_rem" list="salary_rem" class="form-control" placeholder="-- Choose Salary Remarks --" value="{{$ac_employee_info->salary_rem}}">-->
            <!--                                  <datalist id="salary_rem">-->
            <!--                                    <option value="">-- Choose Salary Remarks --</option>-->
            <!--                                    <option value="given office is entry restricted. So LOI has been authenticated at absence of our executive by cooperation of the applicant/ front desk executive/office security guard.">given office is entry restricted. So LOI has been authenticated at absence of our executive by cooperation of the applicant/ front desk executive/office security guard.</option>-->
            <!--                                    <option value="given LOI has been authenticated by cooperation of the applicant at absence of our executive as per his will.">given LOI has been authenticated by cooperation of the applicant at absence of our executive as per his will.</option>-->
            <!--                                    <option value="given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help.">given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help.</option>-->
            <!--                                    <option value="given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help & he said that if need to verify his LOI again, he is not interested to take loan">given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help & he said that if need to verify his LOI again, he is not interested to take loan</option>-->
            <!--                                    <option value="LOI issued person was not available on visiting period. So given LOI has been authenticated by contacted person."></option>-->
            <!--                                    <option value="">LOI issued person was not available on visiting period. So given LOI has been authenticated by contacted person.</option>-->
            <!--                                    <option value=" LOI issued person now on leave. So given LOI has been authenticated by contacted person."> LOI issued person now on leave. So given LOI has been authenticated by contacted person.</option>-->
            <!--                                    <option value="LOI issued person works at another address. So given LOI has been authenticated by contacted person.">LOI issued person works at another address. So given LOI has been authenticated by contacted person.</option>-->
            <!--                                    <option value="LOI verified person could not provide his visiting card/mobile number.">LOI verified person could not provide his visiting card/mobile number.</option>-->
            <!--                                    <option value="LOI verified has denied providing his visiting card/mobile number.">LOI verified has denied providing his visiting card/mobile number.</option>-->
            <!--                                    <option value="concerned officer has demanded forwarding letter from The City Bank Ltd. to verify given LOI.-->
            <!--                                    Applicant & Office">concerned officer has demanded forwarding letter from The City Bank Ltd. to verify given LOI.-->
            <!--                                    Applicant & Office</option>-->
            <!--                                    <option value="Others">Others</option>-->
                                                
            <!--                                  </datalist>-->
											</p>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="verify" class="verify" value="1" {{$ac_employee_info->verify == 1 ? 'checked':''}}/> OK</label>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="verify" class="verify" value="2" {{$ac_employee_info->verify == 2 ? 'checked':''}}/> NO</label>
                                          </div>
                                        </div>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$ac_employee_info->ebd_sal_serv == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$ac_employee_info->ebd_sal_serv == 2 ? 'checked' : ''}} /> NO</label>
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
													<input type="text" name="ca_salary_verify" class="form-control" value="{{$ac_employee_info->ca_salary_verify}}">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$ac_employee_info->ebd_salVname == 1 ? 'checked' : ''}} /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$ac_employee_info->ebd_salVname == 2 ? 'checked' : ''}} /> NO</label>
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
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$ac_employee_info->ebd_bpstatus == 1 ? 'checked' : ''}} />
															Rented
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$ac_employee_info->ebd_bpstatus == 2 ? 'checked' : ''}} />
															Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$ac_employee_info->ebd_bpstatus == 3 ? 'checked' : ''}} />
															Family Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$ac_employee_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
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
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$ac_employee_info->ebd_bplace == 1 ? 'checked' : ''}}/>
															Very Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$ac_employee_info->ebd_bplace == 2 ? 'checked' : ''}}/>
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$ac_employee_info->ebd_bplace == 3 ? 'checked' : ''}}/>
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$ac_employee_info->ebd_bplace == 4 ? 'checked' : ''}}/>
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
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$ac_employee_info->ebd_bus_off == 1 ? 'checked' : ''}} />
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$ac_employee_info->ebd_bus_off == 2 ? 'checked' : ''}} />
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$ac_employee_info->ebd_bus_off == 3 ? 'checked' : ''}} />
															Large
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$ac_employee_info->ebd_bus_off == 4 ? 'checked' : ''}} />
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
													<!-- <p style="margin-top: 9px; font-size:14px;">Please note that provided all information is found OK</p> -->
										<div class="row">
                                          <div class="col-6">
                                            <p style="margin-top: 9px; font-size:14px;">Please note that
												<input type="text" name="employee_rem" list="employee_rem" class="form-control" placeholder="-- Choose Office Remarks --" value="{{$ac_employee_info->employee_rem}}">
                                              <datalist id="employee_rem">
                                                <option value="applicant’s office has been visited two days but he was not available. So his signature could not be collected. ">applicant’s office has been visited two days but he was not available. So his signature could not be collected. </option>
                                                <option value="the applicant was out of office on visiting period. So his signature has been collected from residence.">the applicant was out of office on visiting period. So his signature has been collected from residence.</option>
                                                <option value="provided photo of the applicant does not match fully with his current look.">provided photo of the applicant does not match fully with his current look.</option>
                                                <option value="provided photo of the applicant is his old photo about 00 years ago.">provided photo of the applicant is his old photo about 00 years ago.</option>
                                                <option value="provided photo of the applicant is his old photo as new he has beard.">provided photo of the applicant is his old photo as new he has beard.</option>
                                                <option value="given office is entry restricted. So LOI has been authenticated at absence of our executive by cooperation of the applicant/ front desk executive/office security guard.">given office is entry restricted. So LOI has been authenticated at absence of our executive by cooperation of the applicant/ front desk executive/office security guard.</option>
                                                <option value="given LOI has been authenticated by cooperation of the applicant at absence of our executive as per his will.">given LOI has been authenticated by cooperation of the applicant at absence of our executive as per his will.</option>
                                                <option value="given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help.">given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help.</option>
                                                <option value="given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help & he said that if need to verify his LOI again, he is not interested to take loan">given area is entry restricted. So given LOI could not possible to verify without the applicant help but he has denied to provide any help & he said that if need to verify his LOI again, he is not interested to take loan</option>
                                                <option value="LOI issued person was not available on visiting period. So given LOI has been authenticated by contacted person."></option>
                                                <option value="">LOI issued person was not available on visiting period. So given LOI has been authenticated by contacted person.</option>
                                                <option value=" LOI issued person now on leave. So given LOI has been authenticated by contacted person."> LOI issued person now on leave. So given LOI has been authenticated by contacted person.</option>
                                                <option value="LOI issued person works at another address. So given LOI has been authenticated by contacted person.">LOI issued person works at another address. So given LOI has been authenticated by contacted person.</option>
                                                <option value="LOI verified person could not provide his visiting card/mobile number.">LOI verified person could not provide his visiting card/mobile number.</option>
                                                <option value="LOI verified has denied providing his visiting card/mobile number.">LOI verified has denied providing his visiting card/mobile number.</option>
                                                <option value="concerned officer has demanded forwarding letter from The City Bank Ltd. to verify given LOI.
                                                Applicant & Office">concerned officer has demanded forwarding letter from The City Bank Ltd. to verify given LOI.
                                                Applicant & Office</option>
                                                <option value="Others">Others</option>
                                              </datalist>
											</p>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="1" {{$ac_employee_info->gen_remarks == 1 ? 'checked':''}}/> Complete</label>
                                          </div>
                                          <div class="col-3">
                                            <label><input type="checkbox" name="gen_remarks" class="gen_remarks" value="2" {{$ac_employee_info->gen_remarks == 2 ? 'checked':''}}/> Incomplete</label>
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
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control" value="{{$ac_employee_info->field_agent}}"></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control" value="{{$ac_employee_info->signature}}"></div>
											</div>
										</div>
									</div>
								</div>
                        	</div>
							
                            {{-- <div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
                      			<table class="table table-bordered">
									<thead class="text-center">
										<tr>
											<th colspan="5">File Name</th>
											<td colspan="3"><input type="text" name="file_name" class="form-control" id="file_name" value="{{$ac_employee_info->file_name}}"></td>
										</tr>
										<tr>
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
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" {{$ac_employee_info->ebd_profession == 1 ? 'checked' : ''}}/> Service
															Holder</label>
													</div>
													<div class="col-6"><label><input type="checkbox" name="ebd_profession" class="ebd_profession"
																value="2" {{$ac_employee_info->ebd_profession == 2 ? 'checked' : ''}}/> Businessman</label></div>
												</div>
												<div class="row">
													<div class="col-6">
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" {{$ac_employee_info->ebd_profession == 3 ? 'checked' : ''}}/> Self
															Employed</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" {{$ac_employee_info->ebd_profession == 4 ? 'checked' : ''}}/> Other
															(Landlord, Doctor )</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="prof_valid" class="prof_valid" value="1"  {{$ac_employee_info->prof_valid == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" {{$ac_employee_info->prof_valid == 2 ? 'checked' : ''}}/>
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Company Name</td>
											<td colspan="4"><input type="text" name="ca_company_name" class="form-control" value="{{$ac_employee_info->ca_company_name}}" /></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" {{$ac_employee_info->ebd_company == 1 ? 'checked' : ''}} /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" {{$ac_employee_info->ebd_company == 2 ? 'checked' : ''}} /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Office Address</td>
											<td colspan="4"><input type="text" name="ca_office_address" class="form-control" value="{{$ac_employee_info->ca_office_address}}"/></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$ac_employee_info->ebd_office_address == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$ac_employee_info->ebd_office_address == 2 ? 'checked' : ''}}/>
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
														<input type="number" name="ca_land_phn" class="form-control" value="{{$ac_employee_info->ca_land_phn}}">
													</div>
												</div>
											</td>
											<td colspan="2">
												<div class="row">
													<div class="col-4">Mobile No:</div>
													<div class="col-8">
														<input type="number" name="ca_mobile_no" class="form-control" value="{{$ac_employee_info->ca_mobile_no}}">
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ac_employee_info->ebd_office_phone == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" {{$ac_employee_info->ebd_office_phone == 2 ? 'checked' : ''}}/>
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
													<div class="col-6"><input type="number" name="ca_year" class="form-control" value="{{$ac_employee_info->ca_year}}"></div>
												</div>
											</td>
											<td>
												<div class="row">
													<div class="col-6 border-right">Month (s)</div>
													<div class="col-6"><input type="number" name="ca_month" class="form-control" value="{{$ac_employee_info->ca_month}}"></div>
												</div>
											</td>
											<td colspan="2">
												<div class="row">
													<div class="col-6 border-right">No. of Employee</div>
													<div class="col-6"><input type="number" name="num_of_employee" class="form-control" value="{{$ac_employee_info->num_of_employee}}"></div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" {{$ac_employee_info->ebd_serv_len == 1 ? 'checked' : ''}} /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" {{$ac_employee_info->ebd_serv_len == 2 ? 'checked' : ''}} /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Nature of Business</td>
											<td colspan="4"><input type="text" name="ca_nature_busi" class="form-control" value="{{$ac_employee_info->ca_nature_busi}}"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1"  {{$ac_employee_info->ebd_nat_bus == 1 ? 'checked' : ''}} /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" {{$ac_employee_info->ebd_nat_bus == 2 ? 'checked' : ''}} /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Designation</td>
											<td colspan="4"><input type="text" name="ca_designation" class="form-control" value="{{$ac_employee_info->ca_designation}}"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$ac_employee_info->ebd_designation == 1 ? 'checked' : ''}}/>
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" {{$ac_employee_info->ebd_designation == 2 ? 'checked' : ''}}/>
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
														<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" {{$ac_employee_info->ebd_sal_serv == 1 ? 'checked' : ''}} /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" {{$ac_employee_info->ebd_sal_serv == 2 ? 'checked' : ''}} /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Salary Verified by (Name)</td>
											<td colspan="4"><input type="text" name="ca_salary_verify" class="form-control" value="{{$ac_employee_info->ca_salary_verify}}"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" {{$ac_employee_info->ebd_salVname == 1 ? 'checked' : ''}} /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" {{$ac_employee_info->ebd_salVname == 2 ? 'checked' : ''}} /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Business Place Status</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" {{$ac_employee_info->ebd_bpstatus == 1 ? 'checked' : ''}}/>
															Rented
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" {{$ac_employee_info->ebd_bpstatus == 2 ? 'checked' : ''}} />
															Owned
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" {{$ac_employee_info->ebd_bpstatus == 3 ? 'checked' : ''}} />
															Family Owned
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" {{$ac_employee_info->ebd_bpstatus == 4 ? 'checked' : ''}}/>
													Company Owned
												</label>
											</td>
										</tr>
										<tr>
											<td>Business Place Size</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1" {{$ac_employee_info->ebd_bplace == 1 ? 'checked' : ''}}/>
															Very Small
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2" {{$ac_employee_info->ebd_bplace == 2 ? 'checked' : ''}}/>
															Small
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3" {{$ac_employee_info->ebd_bplace == 3 ? 'checked' : ''}}/>
															Medium
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4" {{$ac_employee_info->ebd_bplace == 4 ? 'checked' : ''}}/>
													Large
												</label>
											</td>
										</tr>
										<tr>
											<td>Business/Office Signboard</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" {{$ac_employee_info->ebd_bus_off == 1 ? 'checked' : ''}} />
															Small
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" {{$ac_employee_info->ebd_bus_off == 2 ? 'checked' : ''}}  />
															Medium
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" {{$ac_employee_info->ebd_bus_off == 3 ? 'checked' : ''}} />
															Large
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" {{$ac_employee_info->ebd_bus_off == 4 ? 'checked' : ''}}/>
													No Signboard
												</label>
											</td>
										</tr>
										<tr>
											<td>General Remarks</td>
											<td colspan="5">Please note that provided all information is found OK</td>
										</tr>
										<tr>
											<td>Field Agent Name</td>
											<td colspan="2"><input type="text" name="field_agent" class="form-control" value="{{$ac_employee_info->field_agent}}"></td>
											<td colspan="2">Signature</td>
											<td><input type="text" name="signature" class="form-control" value="{{$ac_employee_info->signature}}"></td>
										</tr>
									</tbody>
								</table>
                        	</div> --}}
                         
                    </div>
  
                    <div class="card-footer text-right">
                         <div class="row">
                            <div class="col-lg-6" style="text-align: left;">
                           <!--  <a href="{{url('/bank_ca_personal_details')}}" class="btn btn-dark">Previous</a> -->
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- <a href="{{url('/ca_bank_statement')}}" class="btn btn-dark">Next</a> -->
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
  $(".verify").change(function()
  {
      $(".verify").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<!-- Current Residence -->
<!-- Applicants Name -->
<script type="text/javascript">
        $(".ebd_profession").change(function () {
            $(".ebd_profession").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".prof_valid").change(function () {
            $(".prof_valid").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_company").change(function () {
            $(".ebd_company").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ca_office_address").change(function () {
            $(".ca_office_address").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_office_phone").change(function () {
            $(".ebd_office_phone").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_serv_len").change(function () {
            $(".ebd_serv_len").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_nat_bus").change(function () {
            $(".ebd_nat_bus").prop('checked', false);
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
        $(".ebd_sal_serv").change(function () {
            $(".ebd_sal_serv").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_salVname").change(function () {
            $(".ebd_salVname").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_bpstatus").change(function () {
            $(".ebd_bpstatus").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_bplace").change(function () {
            $(".ebd_bplace").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
    <script type="text/javascript">
        $(".ebd_bplace").change(function () {
            $(".ebd_bplace").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
     <script type="text/javascript">
        $(".ebd_bus_off").change(function () {
            $(".ebd_bus_off").prop('checked', false);
            $(this).prop('checked', true);
        });
    </script>
@endsection

