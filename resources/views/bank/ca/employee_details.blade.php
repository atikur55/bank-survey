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
            <form action="{{url('employment_ca_post')}}" method="POST">
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
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="1"/> AMEX CARD</label></td>
                                  <td><label><input type="checkbox" name="city_type" class="city_type" value="2"/> VISA CARD</label></td>
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
							</div>
                            <!--  Date -->  
							<div class="col-lg-12 mt-5" style="margin-bottom: 40px;">
								<div class="container">
									<div class="row">
										<div class="col-md-9 table-bordered pb-2 pt-2"><p style="margin-top: 9px; font-weight: bold; font-size:12px; text-transform: uppercase">File Name</p></div>
										<div class="col-md-3 table-bordered pb-2 pt-2"><input type="text" name="file_name" class="form-control" id="file_name" placeholder="File Name"></div>
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
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" />
																	Service Holder</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" />
																	Businessman </label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" />
																	Self Employed</label>
														</div>
														<div class="col-md-3 col-12">
															<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" />
																	Other (Landlord, Doctor )</label>
														</div> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" />
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
													<input type="text" name="ca_company_name" class="form-control" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" /> NO</label>
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
													<input type="text" name="ca_office_address" class="form-control" />
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" />
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
																	<input type="number" name="ca_land_phn" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="row">
																<div class="col-12">Mobile No:</div>
																<div class="col-12">
																	<input type="number" name="ca_mobile_no" class="form-control">
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
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" />
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
																	<input type="number" name="ca_year" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">Month (s)</div>
																<div class="col-12">
																	<input type="number" name="ca_month" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-4 col-12">
															<div class="row">
																<div class="col-12">No. of Employee</div>
																<div class="col-12">
																	<input type="number" name="num_of_employee" class="form-control">
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
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" />
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
													<input type="text" name="ca_nature_busi" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" /> NO</label>
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
													<input type="text" name="ca_designation" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" />
															YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" />
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
													Verified &amp; Found OK
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" /> NO</label>
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
													<input type="text" name="ca_salary_verify" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-3 col-6 table-bordered pb-2 pt-2">
											<div class="row">
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" /> YES</label>
												</div>
												<div class="col-6">
													<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" /> NO</label>
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
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" />
															Rented
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" />
															Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" />
															Family Owned
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" />
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
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1"/>
															Very Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2"/>
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3"/>
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4"/>
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
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" />
															Small
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" />
															Medium
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" />
															Large
														</label>
														</div>
														<div class="col-md-3 col-6">
															<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" />
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
												<div class="col-md-3 col-12"><input type="text" name="field_agent" class="form-control"></div>
												<div class="col-md-3 col-12"><p style="margin-top: 9px; font-size:14px;">Signature</p></div>
												<div class="col-md-3 col-12"><input type="text" name="signature" class="form-control"></div>
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
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1" />
															Service Holder</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2" />
															Businessman </label>
													</div>
												</div>
												<div class="row">
													<div class="col-6">
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3" />
															Self Employed</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4" />
															Other (Landlord, Doctor )</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="prof_valid" class="prof_valid" value="1" />
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="prof_valid" class="prof_valid" value="2" />
															NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Company Name</td>
											<td colspan="4"><input type="text" name="ca_company_name" class="form-control" /></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_company" class="ebd_company" value="1" /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_company" class="ebd_company" value="2" /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Office Address</td>
											<td colspan="4"><input type="text" name="ca_office_address" class="form-control" /></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" />
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" />
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
														<input type="number" name="ca_land_phn" class="form-control">
													</div>
												</div>
											</td>
											<td colspan="2">
												<div class="row">
													<div class="col-4">Mobile No:</div>
													<div class="col-8">
														<input type="number" name="ca_mobile_no" class="form-control">
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" />
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2" />
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
													<div class="col-6"><input type="number" name="ca_year" class="form-control"></div>
												</div>
											</td>
											<td>
												<div class="row">
													<div class="col-6 border-right">Month (s)</div>
													<div class="col-6"><input type="number" name="ca_month" class="form-control"></div>
												</div>
											</td>
											<td colspan="2">
												<div class="row">
													<div class="col-6 border-right">No. of Employee</div>
													<div class="col-6"><input type="number" name="num_of_employee" class="form-control"></div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1" /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2" /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Nature of Business</td>
											<td colspan="4"><input type="text" name="ca_nature_busi" class="form-control"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1" /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2" /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Designation</td>
											<td colspan="4"><input type="text" name="ca_designation" class="form-control"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" />
															YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2" />
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
														<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1" /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2" /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Salary Verified by (Name)</td>
											<td colspan="4"><input type="text" name="ca_salary_verify" class="form-control"></td>
											<td colspan="3" style="text-align: left;">
												<div class="row">
													<div class="col-6 border-right">
														<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1" /> YES</label>
													</div>
													<div class="col-6">
														<label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2" /> NO</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>Business Place Status</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1" />
															Rented
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2" />
															Owned
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3" />
															Family Owned
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4" />
													Company Owned
												</label>
											</td>
										</tr>
										<tr>
											<td>Business Place Size</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1"/>
															Very Small
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2"/>
															Small
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3"/>
															Medium
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4"/>
													Large
												</label>
											</td>
										</tr>
										<tr>
											<td>Business/Office Signboard</td>
											<td colspan="4">
												<div class="row">
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1" />
															Small
														</label>
													</div>
													<div class="col-4 border-right">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2" />
															Medium
														</label>
													</div>
													<div class="col-4">
														<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3" />
															Large
														</label>
													</div>
												</div>
											</td>
											<td colspan="3" style="text-align: left;">
												<label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4" />
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
											<td colspan="2"><input type="text" name="field_agent" class="form-control"></td>
											<td colspan="2">Signature</td>
											<td><input type="text" name="signature" class="form-control"></td>
										</tr>
									</tbody>
								</table> --}}
                        	</div>
                         
                    </div>
  
                    <div class="card-footer text-right">
                         <div class="row">
                            <div class="col-lg-6" style="text-align: left;">
                            <a href="{{url('/bank_ca_personal_details')}}" class="btn btn-dark">Previous</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{url('/ca_bank_statement')}}" class="btn btn-dark">Next</a>
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
        $(".ebd_office_address").change(function () {
            $(".ebd_office_address").prop('checked', false);
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

