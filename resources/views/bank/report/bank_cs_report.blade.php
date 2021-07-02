@extends('layout.master')
@section('title')
CS Report
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('style_script')
<style>
    table,
    td,
    th {
        border: 1px solid black;
        border-style:dotted;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }
    .table1{
        margin: auto;
        padding: auto;
        width: 60%;
        position:relative;
    }
    .table3{
        text-align: center;
        margin: auto;
        width: 35%;
        margin-top: 15px;
        transform: translateX(92.5%);
    }
    h4{
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
    }
    h6{
        margin:0;
        padding: 0;
    }
    .table1 td{
        /*height:26px;*/
        vertical-align: center;
    }
    .table1 input{
        margin:0;
        padding: 0;
        transform: translateY(-3px);
    }
    .table1 span{
        margin:auto;
        font-size:12px;
        vertical-align: center;
        transform: translateY(3px);
        margin-left:3px;
    }
    .work_address, .residential_land_phn, .mobile_no, .spouses_name, .current_residence, .applicants_answer{
        transform: translate(350%,20%);
    }
    .residential_status, .residence_size{
        transform: translateY(10%);
    }
    .formContent{
        padding-left:4px;
        text-transform: capitalize;
        font-size: 12px;
    }
    .table5{
        margin-top:-2px;
    }
    .prof_valid{
        /*transform: translate(86px, 6px);*/
        transform: translate(50px, 3px);
       
    }
    .ebd_profession{
        transform: translateY(3px);
    }
    .ebd_salVname, .ebd_sal_serv, .ebd_designation, .ebd_nat_bus, .ebd_company, .ebd_office_address, .ebd_office_phone, .ebd_serv_len{
        /*transform: translate(86px, 6px);*/
        transform: translate(48px, 3px);
    }
    .ebd_bpstatus, .ebd_bplace, .ebd_bus_off{
        transform: translateY(3px);
    }
    .fgd_prof_valid{
        transform: translate(48px, 3px);
    }
    .fgd_profession{
        transform: translateY(3px);
    }
    .bsstmt{
        transform: translateY(3px);
    }
    td, th{
        margin: 0;
        padding: 0;
        min-height: 10px;
        max-height: 16px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pg1" style="margin-bottom:50px">

                <div style="position: absolute;">
                    <?php 
                        $url ="banksurvey.essential-infotech.com/show_report/".$file_info->id; 
                    ?> 
                    <?php echo DNS2D::getBarcodeHTML($url, 'QRCODE',2,2); ?>
                </div>
                <h4>VERIFICATION REPORT</h4>
                <div class="row">
                    <div class="col-lg-11 m-auto">
                        <table class="table table1 table-bordered">
                            <tr>
                                <td><input type="checkbox" name="city_type" class="city_type" value="1"
                                            {{$personal_info->city_type == 1 ? 'checked' : ''}}/><span>CITY SOLUTION</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="2"
                                            {{$personal_info->city_type == 2 ? 'checked' : ''}}/><span>CITY DRIVE</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="3"
                                            {{$personal_info->city_type == 3 ? 'checked' : ''}}/><span>CITY MANARAH</span></td>
                            </tr>
                        </table>
        
                        <table class="table2" style="margin-top:15px">
                            <tr>
                                <th style="background: #c8c8c8;">RECEIVING DATE: </th>
                                <td style="font-weight: bold">{{$personal_info->receiving_date??''}}</td>
                                <td style="color: white">asdrfawraw3taw346</td>
                                <th style="background: #c8c8c8;">SUBMISSION DATE</th>
                                <td style="font-weight: bold">{{$personal_info->submission_date??''}}</td>
                            </tr>
                        </table>
        
                        <table class="table3">
                            <tr>
                                <th style="background: #c8c8c8;">File No.</th>
                                <td>{{$personal_info->file_name}}</td>
                            </tr>
                        </table>
        
                        <p style="font-weight:bold;font-size:13px;margin:0;margin-top:15px">We confirm that we have verified the following information and our findings are as follows:</p>
        
                        <table class="table table-bordered table4">
                            <tr style="background: #c8c8c8;">
                                <th colspan="4" style="justify-content: center;">PERSONAL DETAILS</th>
                                <th colspan="2">Verified and Found Authentic</th>
                            </tr>
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Applicant's Name</td>
                                <td colspan="3">
                                    <span class="formContent">{{$personal_info->applicants_name??''}}</span>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="1" {{$personal_info->applicants_answer == 1 ? 'checked' : ''}}/>
                                        @if($personal_info->applicants_answer==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                        <span>YES</span>
                                        @endif
                                    </label>
                                </td>
                                <td style="text-align:center">
                                    <label><input type="checkbox" name="applicants_answer" class="applicants_answer" value="2" {{$personal_info->applicants_answer == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Current Residence -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Current Residence</td>
                                <td colspan="3" width="100%">
                                    <!--<b>House of</b>&nbsp;-->
                                    {{$personal_info->house_of??''}}&nbsp;{{$personal_info->address??''}}&nbsp;{{$personal_info->road_no??''}}
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="1"{{$personal_info->current_residence == 1 ? 'checked' : ''}}/>
                                        @if($personal_info->current_residence==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                        <span>YES</span>
                                        @endif
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="current_residence" class="current_residence" value="2" {{$personal_info->current_residence == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Residential Land Phone -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Residence Land Phone</td>
                                <!-- <td colspan="3">{{$personal_info->land_phone??'N/A'}}</td> -->
                                <td colspan="3">N/A</td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="1" {{$personal_info->residential_land_phn == 1 ? 'checked' : ''}}/> 
                                        @if($personal_info->residential_land_phn==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                        <span>YES</span>
                                        @endif 
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="residential_land_phn" class="residential_land_phn" value="2" {{$personal_info->residential_land_phn == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Mobile Number -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Mobile No</td>
                                <td colspan="3">{{$personal_info->per_mobile_no??''}}&nbsp; (Collected) </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="mobile_no" class="mobile_no" value="1" {{$personal_info->mobile_no == 1 ? 'checked' : ''}}/>
                                            @if($personal_info->mobile_no==1)
                                            <span style="color:#000;font-weight:bold;"> YES</span>
                                            @else
                                            <span>YES</span>
                                            @endif 
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="mobile_no" class="mobile_no" value="2"
                                            {{$personal_info->mobile_no == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Spouse's Name -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Spouse's Name</td>
                                <td colspan="3">{{$personal_info->spouse??'N/A'}}</td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="spouses_name" class="spouses_name" value="1"
                                            {{$personal_info->spouses_name == 1 ? 'checked' : ''}}/>
                                            @if($personal_info->spouses_name==1)
                                            <span style="color:#000;font-weight:bold;"> YES</span>
                                            @else
                                            <span>YES</span>
                                            @endif 
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="spouses_name" class="spouses_name" value="2"
                                            {{$personal_info->spouses_name == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Work Address of Spouse -->
                            <tr>
                                <td colspan="2" style="text-align: left;background:#f3f3f3">Work Address of Spouse ( If Any )</td>
                                <td colspan="2">
                                    {{$personal_info->work??'N/A'}}
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="work_address" class="work_address" value="1"
                                            {{$personal_info->work_address == 1 ? 'checked' : ''}}/>
                                            @if($personal_info->work_address==1)
                                            <span style="color:#000;font-weight:bold;"> YES</span>
                                            @else
                                            <span>YES</span>
                                            @endif 
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label><input type="checkbox" name="work_address" class="work_address" value="2"
                                            {{$personal_info->work_address == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label></td>
                            </tr>
                            <!-- Residential Status -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Residential Status</td>
                                <td colspan="2">
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="1"
                                            {{$personal_info->residential_status == 1 ? 'checked' : ''}}/> Family Owned</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="2"
                                            {{$personal_info->residential_status == 2 ? 'checked' : ''}}/> Owned</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="3"
                                            {{$personal_info->residential_status == 3 ? 'checked' : ''}}/> Rented</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residential_status" class="residential_status" value="4"
                                            {{$personal_info->residential_status == 4 ? 'checked' : ''}}/> Others</label>
                                </td>
                            </tr>
                            <!-- Residence  Size -->
                            <tr>
                                <td style="text-align: left;background:#f3f3f3">Residence Size</td>
                                <td colspan="2">
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="1"
                                            {{$personal_info->residence_size == 1 ? 'checked' : ''}}/> Very Small</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="2"
                                            {{$personal_info->residence_size == 2 ? 'checked' : ''}}/> Small</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="3"
                                            {{$personal_info->residence_size == 3 ? 'checked' : ''}}/> Medium</label>
                                </td>
                                <td>
                                    <label><input type="checkbox" name="residence_size" class="residence_size" value="4"
                                            {{$personal_info->residence_size == 4 ? 'checked' : ''}}/> Large</label>
                                </td>
                            </tr>
                            <!-- Number of years in current location -->
                            <tr>
                                <td colspan="2" style="text-align: left;background:#f3f3f3">Number of Years In Current Location</td>
                                <td>
                                    <label>Year (s): </label>
                                </td>
                                <td>
                                    <label>{{$personal_info->year??'N/A'}}</label>
                                </td>
                                <td>
                                    <label>Month (s): </label>
                                </td>
                                <td>
                                    <label>{{$personal_info->month??'N/A'}}</label>
                                </td>
                            </tr>
                            <!-- Contact person -->
                            <tr>
                                <td colspan="2" style="text-align: left;background:#f3f3f3">Contact Person  Name & Relation</td>
                                <td colspan="2">
                                    {{$personal_info->contact_name??''}},&nbsp;
                                    {{$personal_info->relation??''}},
                                    {{$personal_info->contact_no??''}}
                                </td>
                                <td colspan="2">
                                    Date: {{$personal_info->contact_date}}
                                </td>
                            </tr>
                            <!-- General Remarks -->
                            <tr>
                                <td colspan="2" style="text-align: left;background:#f3f3f3">General Remarks</td>
                                <td colspan="4">
                                    <span style="font-weight: bold;">Please note that {{$personal_info->personal_rem}}&nbsp; 
                                        {{-- @if($personal_info->gen_remarks == 1)
                                        OK
                                        @else
                                        NOT OK
                                        @endif --}}
                                    </span>
                                </td>
                            </tr>
                            <!-- field -->
                            <tr>
                                <td colspan="2" style="text-align: left;background:#f3f3f3">Field Agent Name: </td>
                                <td>{{$personal_info->field_name??' '}}</td>
                                <td>Signature</td>
                                <td colspan="2">
                                    {{$personal_info->signature??' '}}
                                </td>
                            </tr>
        
                        </table>
        
                        <table class="table table-borderless table5">
                            <thead class="text-center">
                                <tr style="background: #c8c8c8;">
                                    <th colspan="5">Employment or Business Details</th>
                                    <th colspan="3">Verified and Found Authentic</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background: #f3f3f3;">Type of Profession</td>
                                    <td colspan="4" style="text-align: left;">
                                        <div class="col-lg-10">
                                            <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1"
                                                    {{$employment_info->ebd_profession == 1 ? 'checked' : ''}}/> Service
                                                Holder</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2"
                                                    {{$employment_info->ebd_profession == 2 ? 'checked' : ''}}/> Businessman</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3"
                                                    {{$employment_info->ebd_profession == 3 ? 'checked' : ''}}/> Self-Employed</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4"
                                                    {{$employment_info->ebd_profession == 4 ? 'checked' : ''}}/> Others
                                                (Landlord, Doctor )</label>
                                        </div>
                                    </td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="prof_valid" class="prof_valid" value="1"
                                                {{$employment_info->prof_valid == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->prof_valid==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="prof_valid" class="prof_valid" value="2"
                                                {{$employment_info->prof_valid == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
        
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Company Name</td>
                                    <td colspan="4">{{$employment_info->company_name??'N/A'}}</td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_company" class="ebd_company" value="1"
                                                {{$employment_info->ebd_company == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_company==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_company" class="ebd_company" value="2"
                                                {{$employment_info->ebd_company == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Office Address</td>
                                    <td colspan="4">{{$employment_info->office_address??'N/A'}}</td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1"
                                                {{$employment_info->ebd_office_address == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_office_address==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2" {{$employment_info->ebd_office_address == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Office Phone Number</td>
                                    <td>Land Ph:</td>
                                    <td>{{$employment_info->land_phone??'N/A'}}</td>
                                    <td>Mobile:</td>
                                    <td>{{$employment_info->mobile_number??'N/A'}}</td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1"
                                                {{$employment_info->ebd_office_phone == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_office_phone==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2"
                                                {{$employment_info->ebd_office_phone == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Business / Service Length</td>
                                    <td>
                                        Year:{{$employment_info->year??'N/A'}}
                                        <!-- <div class="row"> -->
                                        <!--  <div class="col-4">Year</div>
                                                            <div class="col-7">{{$employment_info->year}}</div> -->
                                        <!--   </div> -->
                                    </td>
                                    <td>
                                        Month:{{$employment_info->month??'N/A'}}
                                        <!-- <div class="row"> -->
                                        <!--  <div class="col-5 ">Month (s)</div>
                                                            <div class="col-5">{{$employment_info->month}}</div> -->
                                        <!-- </div> -->
                                    </td>
                                    <td colspan="2">No. of Employee:{{$employment_info->employee??'N/A'}}
                                    </td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1"
                                                {{$employment_info->ebd_serv_len == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_serv_len==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2"
                                                {{$employment_info->ebd_serv_len == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Nature of Business</td>
                                    <td colspan="4">{{$employment_info->business??'N/A'}}</td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1"
                                                {{$employment_info->ebd_nat_bus == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_nat_bus==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2"
                                                {{$employment_info->ebd_nat_bus == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Designation</td>
                                    <td colspan="4">{{$employment_info->designation??'N/A'}}</td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1" {{$employment_info->ebd_designation == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_designation==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2"
                                                {{$employment_info->ebd_designation == 2 ? 'checked' : ''}}/> <span style="margin-left: 4px;">NO</span></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Salary (Service Holder)</td>
                                    <td colspan="4"><b>Verified &amp; Found </b>
                                    <!--{{$employment_info->salary_rem}} &nbsp;-->
                                        @if($employment_info->verify == 1)
                                        <b>OK</b>
                                        @else
                                        <b>NOT OK</b>
                                        @endif
                                    </td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1"
                                                {{$employment_info->ebd_sal_serv == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_sal_serv==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2"
                                                {{$employment_info->ebd_sal_serv == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Salary Verified by (Name)</td>
                                    <td colspan="4"><b>{{$employment_info->salary_verify??'N/A'}}</b></td>
                                    <td style="text-align: center;" colspan="3">
                                        <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1"
                                                {{$employment_info->ebd_salVname == 1 ? 'checked' : ''}}/> 
                                                @if($employment_info->ebd_salVname==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                        <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2"
                                                {{$employment_info->ebd_salVname == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Business Place Status</td>
                                    <td colspan="2">
                                        <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1"
                                                {{$employment_info->ebd_bpstatus == 1 ? 'checked' : ''}}/>
                                            Rented
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2"
                                                {{$employment_info->ebd_bpstatus == 2 ? 'checked' : ''}}/>
                                            Owned
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3"
                                                {{$employment_info->ebd_bpstatus == 3 ? 'checked' : ''}}/>
                                            Family Owned
                                        </label>
                                    </td>>
                                    <td colspan="3" style="text-align: left;">
                                        <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4"
                                                {{$employment_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
                                            Company Owned
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Business Place Size</td>
                                    <td colspan="2">
                                        <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1"
                                                {{$employment_info->ebd_bplace == 1 ? 'checked' : ''}}/>
                                            Very Small
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2"
                                                {{$employment_info->ebd_bplace == 2 ? 'checked' : ''}}/>
                                            Small
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3"
                                                {{$employment_info->ebd_bplace == 3 ? 'checked' : ''}}/>
                                            Medium
                                        </label>
                                    </td>
                                    <td colspan="3" style="text-align: left;">
                                        <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4"
                                                {{$employment_info->ebd_bplace == 4 ? 'checked' : ''}}/>
                                            Large
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Business/Office Signboard</td>
                                    <td colspan="2">
                                        <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1"
                                                {{$employment_info->ebd_bus_off == 1 ? 'checked' : ''}}/>
                                            Small
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2"
                                                {{$employment_info->ebd_bus_off == 2 ? 'checked' : ''}}/>
                                            Medium
                                        </label>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3"
                                                {{$employment_info->ebd_bus_off == 3 ? 'checked' : ''}}/>
                                            Large
                                        </label>
                                    </td>
                                    <td colspan="3" style="text-align: left;">
                                        <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4"
                                                {{$employment_info->ebd_bus_off == 4 ? 'checked' : ''}}/>
                                            No Signboard
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">General Remarks</td>
                                    <td colspan="7" style="font-weight: bold;">Please note that {{$employment_info->employee_rem}} &nbsp; 
                                        {{-- @if($employment_info->gen_remarks == 1)
                                        OK
                                        @else
                                        NOT OK
                                        @endif --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Field Agent Name</td>
                                    <td colspan="3">{{$employment_info->field_name??''}}</td>
                                    <td>Signature</td>
                                    <td colspan="3">{{$employment_info->signature??''}}</td>
                                </tr>
                            </tbody>
                        </table>
        
                    </div>
                </div>
                <div class="signature-and-shit">
                    <span style="font-size: 12px; border-top: 1px solid black;position: absolute;transform: translateY(60%)">Seal &amp; Sign of Authority</span>
                    <span style="font-size: 12px; border-top: 1px solid black;position: absolute;transform: translate(410%, 60%)">Seal &amp; Sign of Team Leader</span>
                </div>
            </div>
            <div class="pg2">
                <h4>VERIFICATION REPORT</h4>
        
                <div class="row">
                    <div class="col-lg-11 m-auto">
                        <table class="table table1 table-bordered">
                            <tr>
                                <td><input type="checkbox" name="city_type" class="city_type" value="1"
                                            {{$guarantor_info->city_type == 1 ? 'checked' : ''}}/><span>CITY SOLUTION</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="2"
                                            {{$guarantor_info->city_type == 2 ? 'checked' : ''}}/><span>CITY DRIVE</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="3"
                                            {{$guarantor_info->city_type == 3 ? 'checked' : ''}}/><span>CITY MANARAH</span></td>
                            </tr>
                        </table>
        
                        <table class="table2" style="margin-top:15px">
                            <tr>
                                <th style="background: #c8c8c8;">RECEIVING DATE: </th>
                                <td style="font-weight: bold">{{$guarantor_info->receiving_date??'N/A'}}</td>
                                <td style="color: white">asdrfawraw3taw346</td>
                                <th style="background: #c8c8c8;">SUBMISSION DATE</th>
                                <td style="font-weight: bold">{{$guarantor_info->submission_date??'N/A'}}</td>
                            </tr>
                        </table>
        
                        <table class="table3">
                            <tr>
                                <th style="background: #c8c8c8;">File No.</th>
                                <td>{{$guarantor_info->file_name}}</td>
                            </tr>
                        </table>
        
                        <p style="font-weight:bold;font-size:13px;margin:0;margin-top:15px">We confirm that we have verified the following information and our findings are as follows:</p>
        
                        <table class="table table-borderless table5">
                            <thead class="text-center">
                                <tr style="background: #c8c8c8;">
                                    <th colspan="4">1<sup>st</sup> GUARANTOR DETAILS</th>
                                    <th colspan="2">Verified and Found Authentic</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background: #f3f3f3;">Type of Profession</td>
                                    <td style="text-align: left;">
                                        <div class="col-lg-4">
                                            <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="1"
                                                    {{$guarantor_info->fgd_profession == 1 ? 'checked' : ''}}/> Service
                                                Holder</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-lg-4">
                                            <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="2"
                                                    {{$guarantor_info->fgd_profession == 2 ? 'checked' : ''}}/> Businessman</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-lg-4">
                                            <label><input type="checkbox" name="fgd_profession" class="fgd_profession" value="3"
                                                    {{$guarantor_info->fgd_profession == 3 ? 'checked' : ''}}/> Others (Housewife)</label>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_profession_val" class="fgd_prof_valid" value="1" {{$guarantor_info->fgd_profession_val == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_profession_val==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_profession_val" class="fgd_prof_valid" value="2" {{$guarantor_info->fgd_profession_val == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Guarantor's Name</td>
                                    <td colspan="3">{{$guarantor_info->guarantor_name??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_guarantor" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_guarantor == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_guarantor==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_guarantor" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_guarantor == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Relationship</td>
                                    <td colspan="3">{{$guarantor_info->gurantor_relation??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_relationship" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_relationship == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_relationship==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_relationship" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_relationship == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Company Name</td>
                                    <td colspan="3">{{$guarantor_info->gur_company_name??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_company_name" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_company_name == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_company_name==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_company_name" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_company_name == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Designation</td>
                                    <td colspan="3">{{$guarantor_info->guarantor_degignation??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_designation" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_designation == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_designation==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_designation" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_designation == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Residence Address</td>
                                    <td colspan="3">{{$guarantor_info->guarantor_res_address??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_r_address" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_r_address == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_r_address==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_r_address" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_r_address == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Office Address</td>
                                    <td colspan="3">{{$guarantor_info->office_address??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_o_address" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_o_address == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_o_address==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_o_address" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_o_address == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Contact Details</td>
                                    <td>land Ph: {{$guarantor_info->gur_land_phn??'N/A'}}</td>
                                    <td colspan="2">Mobile No: {{$guarantor_info->gur_mobile??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_contact" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_contact == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_contact==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_contact" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_contact == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Agreed Amount of Guarantee</td>
                                    <td colspan="3">Guarantee Amount: {{$guarantor_info->gur_amount??'N/A'}}</td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_agree" class="fgd_prof_valid" value="1"
                                                {{$guarantor_info->fgd_agree == 1 ? 'checked' : ''}}/> 
                                                @if($guarantor_info->fgd_agree==1)
                                                <span style="color:#000;font-weight:bold;"> YES</span>
                                                @else
                                                <span>YES</span>
                                                @endif
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label><input type="checkbox" name="fgd_agree" class="fgd_prof_valid" value="2"
                                                {{$guarantor_info->fgd_agree == 2 ? 'checked' : ''}}/> NO</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">General Remarks</td>
                                    <td colspan="5" style="font-weight: bold;">Please note that {{$guarantor_info->guarantor_rem??'N/A'}} &nbsp;  
                                        {{-- @if($guarantor_info->gen_remarks == 1)
                                        OK
                                        @else
                                        NOT OK
                                        @endif --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Field Agent Name</td>
                                    <td colspan="2">{{$guarantor_info->field_name??''}}</td>
                                    <td>Signature</td>
                                    <td colspan="2">{{$guarantor_info->signature??''}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="signature-and-shit">
                            <span style="font-size: 12px; border-top: 1px solid black;position:absolute;left:0;transform: translateY(700%)">Seal &amp; Sign of Authority</span>
                            <span style="font-size: 12px; border-top: 1px solid black;position:absolute;right:0;transform: translateY(700%)">Seal &amp; Sign of Team Leader</span>
                        </div>
                    </div>
        
                </div>
        
            </div>
            <div class="pg3" style="position:relative;margin-top:50%">
                <span style="font-size:1em;text-align:center;display:flex;margin-bottom:20px;font-weight: bold;text-decoration: underline;">VERIFICATION REPORT</span>
                <div class="row">
                    <div class="col-lg-11 m-auto">
                        <table class="table table1 table-bordered">
                            <tr>
                                <td><input type="checkbox" name="city_type" class="city_type" value="1"
                                            {{$bank_statement_info->city_type == 1 ? 'checked' : ''}}/><span>CITY SOLUTION</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="2"
                                            {{$bank_statement_info->city_type == 2 ? 'checked' : ''}}/><span>CITY DRIVE</span></td>
                                <td><input type="checkbox" name="city_type" class="city_type" value="3"
                                            {{$bank_statement_info->city_type == 3 ? 'checked' : ''}}/><span>CITY MANARAH</span></td>
                            </tr>
                        </table>
        
                        <table class="table2" style="margin-top:15px">
                            <tr>
                                <th style="background: #c8c8c8;">RECEIVING DATE: </th>
                                <td style="font-weight: bold">{{$bank_statement_info->receiving_date??'N/A'}}</td>
                                <td style="color: white">asdrfawraw3taw346</td>
                                <th style="background: #c8c8c8;">SUBMISSION DATE</th>
                                <td style="font-weight: bold">{{$bank_statement_info->submission_date??'N/A'}}</td>
                            </tr>
                        </table>
        
                        <table class="table3">
                            <tr>
                                <th style="background: #c8c8c8;">File No.</th>
                                <td>{{$bank_statement_info->file_name??'N/A'}}</td>
                            </tr>
                        </table>
        
                        <h4 style="text-decoration:underline">BANK STATEMENT WITHDRAWAL / VERIFICATION FORM</h4>
        
                        <p style="font-weight:bold;font-size:13px;margin:0;margin-top:15px">We confirm that we have verified the following information and our findings are as follows:</p>
        
                        <table class="table table-borderless table5">
                            <tbody>
                                <tr>
                                    <td style="background: #f3f3f3;">Name of Applicant</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->sta_appli_name??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Name of Bank</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->sta_bank_name??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Branch Name</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->sta_brance_name??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Account Title</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->sta_account_title??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Account No:</td>
                                    <td colspan="3" style="text-align: left;">
                                       {{$bank_statement_info->sta_account_no??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Statement Verified By</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->sta_verify??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Designation</td>
                                    <td colspan="3" style="text-align: left;">
                                         {{$bank_statement_info->sta_designation??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Contact Details</td>
                                    <td>Land Ph: {{$bank_statement_info->sta_land_no??'N/A'}} </td>
                                    <td colspan="2">Mobile No: {{$bank_statement_info->sta_mobile_no??'N/A'}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Verification Date</td>
                                    <td colspan="3" style="text-align: left;">
                                        {{$bank_statement_info->verify_date??'N/A'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Remarks</td>
                                    <td colspan="3" style="font-weight: bold;">Please note that {{$bank_statement_info->bank_remarks}} &nbsp; 
                                        {{-- @if($bank_statement_info->gen_remarks == 1)
                                        OK
                                        @else
                                        NOT OK
                                        @endif --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:top;background: #f3f3f3;">If Statement Not Verified</td>
                                    <td colspan="3">
                                        
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Insufficient Fund' ? 'checked':''}}/> Insufficient Fund</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Original Statement required' ? 'checked':''}}/> Original Statement required</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Statemetn Required Will Seal & Sign' ? 'checked':''}}/> Statemetn Required Will Seal & Sign</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Authorization Letter Required' ? 'checked':''}}/> Authorization Letter Required</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Statement Will Be Sent By Mail' ? 'checked':''}}/> Statement Will Be Sent By Mail</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" /> Statement Not Clear</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Not Agreed To Verify' ? 'checked':''}}/> Not Agreed To Verify</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Computer Generated Statement' ? 'checked':''}}/> Computer Generated Statement</label></div>
                                        <div><label><input type="checkbox" name="" class="bsstmt" {{$bank_statement_info->statement_check == 'Others (plese Specify Below)' ? 'checked':''}}/> Others (plese Specify Below)</label></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #f3f3f3;">Field Agent Name</td>
                                    <td>{{$bank_statement_info->field_agent??''}}</td>
                                    <td>Signature</td>
                                    <td>{{$bank_statement_info->signature??''}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="signature-and-shit">
                            <span style="font-size: 12px; border-top: 1px solid black;position:absolute;left:0;transform: translateY(70%)">Seal &amp; Sign of Authority</span>
                            <span style="font-size: 12px; border-top: 1px solid black;position:absolute;right:0;transform: translateY(70%)">Seal &amp; Sign of Team Leader</span>
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>
    </div>

    <h4>CS : Personal Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_personal_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/personal/')}}/{{$photo->cs_personal_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Employment Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_employment_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/employment/')}}/{{$photo->cs_employment_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Guarantor Details Photo</h4><br>
    <div class="row">  
      @foreach($cs_guarantor_photo as $photo)
      <div class="col-lg-4" style="margin: 5px 0">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/photo/cs/guarantor/')}}/{{$photo->cs_guarantor_photo}}" width="200px;">
      </div>
      @endforeach
    </div>
    <h4>CS : Bank Statement Details Photo</h4><br>
    <div class="row">
      @foreach($get_photo as $photo)
      <div class="col-lg-4">
        <img style="border: 1px solid #c5a3a3;" src="{{asset('uploads/cs_photo/multiple/')}}/{{$photo->cs_multiple_photo}}" width="200px;">
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
