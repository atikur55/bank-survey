<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>File</title>
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
            transform: translate(220%,30%);
        }
        .residential_status, .residence_size{
            transform: translateY(30%);
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
            transform: translate(34px, 6px);
        }
        .ebd_profession{
            transform: translateY(6px);
        }
        .ebd_salVname, .ebd_sal_serv, .ebd_designation, .ebd_nat_bus, .ebd_company, .ebd_office_address, .ebd_office_phone, .ebd_serv_len{
            /*transform: translate(86px, 6px);*/
            transform: translate(34px, 6px);
        }
        .ebd_bpstatus, .ebd_bplace, .ebd_bus_off{
            transform: translateY(6px);
        }
        .bsstmt{
            transform: translateY(6px);
        }
        td, th{
            margin: 0;
            padding: 0;
            min-height: 10px;
            max-height: 16px;
        }
    </style>

</head>

<body>
    <div class="pg1" style="margin-bottom:50px">
        <div style="position: absolute;">
            <?php $url ="banksurvey.essential-infotech.com/show_report/".$file_info->id;?>
            <?php echo DNS2D::getBarcodeHTML($url, 'QRCODE',2,2); ?>

        </div>
        <h4>VERIFICATION REPORT</h4>
        <div class="row">
            <div class="col-lg-11 m-auto">
                <table class="table table1 table-bordered">
                    <tr>
                        <td><input type="checkbox" name="city_type" class="city_type" value="1"
                                    {{$ca_personal_info->city_type == 1 ? 'checked' : ''}}/><span>AMEX CARD</span></td>
                        <td><input type="checkbox" name="city_type" class="city_type" value="3"
                                    {{$ca_personal_info->city_type == 3 ? 'checked' : ''}}/><span>VISA CARD</span></td>
                    </tr>
                </table>
                
                <table class="table2" style="margin-top:15px">
                    <tr>
                        <th style="background: #c8cac8;">RECEIVING DATE: </th>
                        <td style="font-weight: bold">{{$ca_personal_info->receiving_date??'N/A'}}</td>
                        <td style="color: white">asdrfawraw3taw346</td>
                        <th style="background: #c8cac8;">SUBMISSION DATE</th>
                        <td style="font-weight: bold">{{$ca_personal_info->submission_date??'N/A'}}</td>
                    </tr>
                </table>
                
                <table class="table3">
                    <tr>
                        <th style="background: #c8cac8;">File No.</th>
                        <td>{{$ca_personal_info->file_name??'N/A'}}</td>
                    </tr>
                </table>
                
                <p style="font-weight:bold;font-size:13px;margin:0;margin-top:15px">We confirm that we have verified the following information and our findings are as follows:</p>
                
                <table class="table table-bordered table4">
                    <tr style="background: #c8cac8;">
                        <th colspan="4" style="justify-content: center;">PERSONAL DETAILS</th>
                        <th colspan="2">Verified and Found Authentic</th>
                    </tr>
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Applicant's Name</th>
                        <td colspan="3">
                            <span class="formContent">{{$ca_personal_info->ca_appli_name??'N/A'}}</span>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_name" class="applicants_answer" value="1"
                                    {{$ca_personal_info->ca_pd_name == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_name==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align:center">
                            <label><input type="checkbox" name="ca_pd_name" class="applicants_answer" value="2"
                                    {{$ca_personal_info->ca_pd_name == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Current Residence -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Current Residence</th>
                        <td colspan="3" width="100%">
                            {{$ca_personal_info->ca_current_resi??''}}<!-- &nbsp;{{$ca_personal_info->address}}&nbsp;{{$ca_personal_info->road_no}} -->
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_cresidence" class="current_residence" value="1"
                                    {{$ca_personal_info->ca_pd_cresidence == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_cresidence==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_cresidence" class="current_residence" value="2"
                                    {{$ca_personal_info->ca_pd_cresidence == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Residential Land Phone -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Residence Land Phone</th>
                        <!-- <td colspan="3">{{$ca_personal_info->ca_land_phn??'N/A'}}</td> -->
                        <td colspan="3">N/A</td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_landP" class="residential_land_phn" value="1"
                                    {{$ca_personal_info->ca_pd_landP == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_landP==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_landP" class="residential_land_phn" value="2"
                                    {{$ca_personal_info->ca_pd_landP == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Mobile Number -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Mobile No</th>
                        <td colspan="3">{{$ca_personal_info->ca_mobile_no??''}} (collected)</td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_mp" class="mobile_no" value="1"
                                    {{$ca_personal_info->ca_pd_mp == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_mp==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_mp" class="mobile_no" value="2"
                                    {{$ca_personal_info->ca_pd_mp == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Spouse's Name -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Spouse's Name</th>
                        <td colspan="3">{{$ca_personal_info->ca_spous_name??'N/A'}}</td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_sname" class="spouses_name" value="1"
                                    {{$ca_personal_info->ca_pd_sname == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_sname==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_sname" class="spouses_name" value="2"
                                    {{$ca_personal_info->ca_pd_sname == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Work Address of Spouse -->
                    <tr>
                        <th colspan="2" style="text-align: left;background:#f3f3f3">Work Address of Spouse ( If Any )</th>
                        <td colspan="2">
                            {{$ca_personal_info->ca_work_address??'N/A'}}
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_swa" class="work_address" value="1"
                                    {{$ca_personal_info->ca_pd_swa == 1 ? 'checked' : ''}}/> 
                                    @if($ca_personal_info->ca_pd_swa==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                    @else
                                        <span>YES</span>
                                    @endif
                            </label>
                        </td>
                        <td style="text-align: center;">
                            <label><input type="checkbox" name="ca_pd_swa" class="work_address" value="2"
                                    {{$ca_personal_info->ca_pd_swa == 2 ? 'checked' : ''}}/> NO</label></td>
                    </tr>
                    <!-- Residential Status -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Residential Status</th>
                        <td colspan="2">
                            <label><input type="checkbox" name="ebd_designation" class="residential_status" value="1"
                                    {{$ca_personal_info->ebd_designation == 1 ? 'checked' : ''}}/> Family Owned</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="residential_status" class="residential_status" value="2"
                                    {{$ca_personal_info->ebd_designation == 2 ? 'checked' : ''}}/> Owned</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="ebd_designation" class="residential_status" value="3"
                                    {{$ca_personal_info->ebd_designation == 3 ? 'checked' : ''}}/> Rented</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="ebd_designation" class="residential_status" value="4"
                                    {{$ca_personal_info->ebd_designation == 4 ? 'checked' : ''}}/> Others</label>
                        </td>
                    </tr>
                    <!-- Residence  Size -->
                    <tr>
                        <th style="text-align: left;background:#f3f3f3">Residence Size</th>
                        <td colspan="2">
                            <label><input type="checkbox" name="residential_size" class="residence_size" value="1"
                                    {{$ca_personal_info->residential_size == 1 ? 'checked' : ''}}/> Very Small</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="residential_size" class="residence_size" value="2"
                                    {{$ca_personal_info->residential_size == 2 ? 'checked' : ''}}/> Small</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="residential_size" class="residence_size" value="3"
                                    {{$ca_personal_info->residential_size == 3 ? 'checked' : ''}}/> Medium</label>
                        </td>
                        <td>
                            <label><input type="checkbox" name="residential_size" class="residence_size" value="4"
                                    {{$ca_personal_info->residential_size == 4 ? 'checked' : ''}}/> Large</label>
                        </td>
                    </tr>
                    <!-- Number of years in current location -->
                    <tr>
                        <th colspan="2" style="text-align: left;background:#f3f3f3">Number of Years In Current Location</th>
                        <td>
                            <label>Year (s): </label>
                        </td>
                        <td>
                            <label>{{$ca_personal_info->ca_year??'N/A'}}</label>
                        </td>
                        <td>
                            <label>Month (s): </label>
                        </td>
                        <td>
                            <label>{{$ca_personal_info->ca_month??'N/A'}}</label>
                        </td>
                    </tr>
                    <!-- Contact person -->
                    <tr>
                        <th colspan="2" style="text-align: left;background:#f3f3f3">Contact Person  Name & Relation</th>
                        <td colspan="2">
                            {{$ca_personal_info->ca_con_name??''}},&nbsp;
                            {{$ca_personal_info->ca_con_date??''}},
                            {{$ca_personal_info->contact_no??''}}
                        </td>
                        <td colspan="2">
                            Date: {{$ca_personal_info->ca_con_time??''}}
                        </td>
                    </tr>
                    <!-- General Remarks -->
                    <tr>
                        <th colspan="2" style="text-align: left;background:#f3f3f3">General Remarks</th>
                        <td colspan="4">
                            <span style="font-weight: bold;">Please note that  {{$ca_personal_info->personal_rem}} &nbsp;  
                                {{-- @if($ca_personal_info->gen_remarks == 1)
                                OK
                                @else
                                NOT OK
                                @endif --}}
                            </span>
                        </td>
                    </tr>
                    <!-- field -->
                    <tr>
                        <th colspan="2" style="text-align: left;background:#f3f3f3">Field Agent Name: </th>
                        <td>{{$ca_personal_info->field_agent??''}}</td>
                        <td>Signature</td>
                        <td colspan="2">
                            {{$ca_personal_info->signature??''}}
                        </td>
                    </tr>
    
                </table>
                
                <table class="table table-borderless table5">
                    <thead class="text-center">
                        <tr style="background: #c8cac8;">
                            <th colspan="5">Employment or Business Details</th>
                            <th colspan="3">Verified and Found Authentic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background:#f3f3f3">Type of Profession</td>
                            <td colspan="4" style="text-align: left;">
                                <div class="col-lg-10">
                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="1"
                                            {{$ca_employment_info->ebd_profession == 1 ? 'checked' : ''}}/> Service
                                        Holder</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="2"
                                            {{$ca_employment_info->ebd_profession == 2 ? 'checked' : ''}}/> Businessman</label>
                                </div>
                                <div class="col-lg-10">
                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="3"
                                            {{$ca_employment_info->ebd_profession == 3 ? 'checked' : ''}}/> Self-Employed</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="checkbox" name="ebd_profession" class="ebd_profession" value="4"
                                            {{$ca_employment_info->ebd_profession == 4 ? 'checked' : ''}}/> Others
                                        (Landlord, Doctor )</label>
                                </div>
                            </td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="prof_valid" class="prof_valid" value="1"
                                        {{$ca_employment_info->prof_valid == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->prof_valid==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="prof_valid" class="prof_valid" value="2"
                                        {{$ca_employment_info->prof_valid == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
    
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Company Name</td>
                            <td colspan="4">{{$ca_employment_info->ca_company_name??'N/A'}}</td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_company" class="ebd_company" value="1"
                                        {{$ca_employment_info->ebd_company == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_company==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_company" class="ebd_company" value="2"
                                        {{$ca_employment_info->ebd_company == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Office Address</td>
                            <td colspan="4">{{$ca_employment_info->ca_office_address??'N/A'}}</td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="1" {{$ca_employment_info->ebd_office_address == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_office_address==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_office_address" class="ebd_office_address" value="2"
                                        {{$ca_employment_info->ebd_office_address == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Office Phone Number</td>
                            <td>Land Ph:</td>
                            <td>{{$ca_employment_info->ca_land_phn??'N/A'}}</td>
                            <td>Mobile:</td>
                            <td>{{$ca_employment_info->ca_mobile_no}}</td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="1" {{$ca_employment_info->ebd_office_phone == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_office_phone==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_office_phone" class="ebd_office_phone" value="2"
                                        {{$ca_employment_info->ebd_office_phone == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Business / Service Length</td>
                            <td colspan="2">
                                Year:{{$ca_employment_info->ca_year??'N/A'}}
                                <!-- <div class="row"> -->
                                <!--  <div class="col-4">Year</div>
                                                    <div class="col-7">{{$ca_employment_info->year}}</div> -->
                                <!--   </div> -->
                            </td>
                            <td colspan="2">
                                Month:{{$ca_employment_info->ca_month??'N/A'}}
                                <!-- <div class="row"> -->
                                <!--  <div class="col-5 ">Month (s)</div>
                                                    <div class="col-5">{{$ca_employment_info->month}}</div> -->
                                <!-- </div> -->
                            </td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="1"
                                        {{$ca_employment_info->ebd_serv_len == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_serv_len==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_serv_len" class="ebd_serv_len" value="2"
                                        {{$ca_employment_info->ebd_serv_len == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Nature of Business</td>
                            <td colspan="4">{{$ca_employment_info->ca_nature_busi??'N/A'}}</td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="1"
                                        {{$ca_employment_info->ebd_nat_bus == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_nat_bus==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_nat_bus" class="ebd_nat_bus" value="2"
                                        {{$ca_employment_info->ebd_nat_bus == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Designation</td>
                            <td colspan="4">{{$ca_employment_info->ca_designation??'N/A'}}</td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="1"
                                        {{$ca_employment_info->ebd_designation == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_designation==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_designation" class="ebd_designation" value="2"
                                        {{$ca_employment_info->ebd_designation == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Salary (Service Holder)</td>
                            <td style="width:200px;" colspan="4">
                                <b>Verified &amp; Found </b>
                                <!--{{$ca_employment_info->salary_rem}}-->
                                @if($ca_employment_info->verify == 1)
                                <b>OK</b>
                                @else
                               <b> NOT OK</b>
                                @endif
                            </td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="1"
                                        {{$ca_employment_info->ebd_sal_serv == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_sal_serv==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_sal_serv" class="ebd_sal_serv" value="2"
                                        {{$ca_employment_info->ebd_sal_serv == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Salary Verified by (Name)</td>
                            <td colspan="4"><b>{{$ca_employment_info->ca_salary_verify??'N/A'}}</b></td>
                            <td style="text-align: center;" colspan="3">
                                <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="1"
                                        {{$ca_employment_info->ebd_salVname == 1 ? 'checked' : ''}}/> 
                                        @if($ca_employment_info->ebd_salVname==1)
                                        <span style="color:#000;font-weight:bold;"> YES</span>
                                        @else
                                            <span>YES</span>
                                        @endif
                                </label>
                                <label><input type="checkbox" name="ebd_salVname" class="ebd_salVname" value="2"
                                        {{$ca_employment_info->ebd_salVname == 2 ? 'checked' : ''}}/> NO</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Business Place Status</td>
                            <td colspan="2">
                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="1"
                                        {{$ca_employment_info->ebd_bpstatus == 1 ? 'checked' : ''}}/>
                                    Rented
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="2"
                                        {{$ca_employment_info->ebd_bpstatus == 2 ? 'checked' : ''}}/>
                                    Owned
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="3"
                                        {{$ca_employment_info->ebd_bpstatus == 3 ? 'checked' : ''}}/>
                                    Family Owned
                                </label>
                            </td>
                            <td colspan="3" style="text-align: left;">
                                <label><input type="checkbox" name="ebd_bpstatus" class="ebd_bpstatus" value="4"
                                        {{$ca_employment_info->ebd_bpstatus == 4 ? 'checked' : ''}} />
                                    Company Owned
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Business Place Size</td>
                            <td colspan="2">
                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="1"
                                        {{$ca_employment_info->ebd_bplace == 1 ? 'checked' : ''}}/>
                                    Very Small
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="2"
                                        {{$ca_employment_info->ebd_bplace == 2 ? 'checked' : ''}}/>
                                    Small
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="3"
                                        {{$ca_employment_info->ebd_bplace == 3 ? 'checked' : ''}}/>
                                    Medium
                                </label>
                            </td>
                            <td colspan="3" style="text-align: left;">
                                <label><input type="checkbox" name="ebd_bplace" class="ebd_bplace" value="4"
                                        {{$ca_employment_info->ebd_bplace == 4 ? 'checked' : ''}}/>
                                    Large
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Business/Office Signboard</td>
                            <td colspan="2">
                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="1"
                                        {{$ca_employment_info->ebd_bus_off == 1 ? 'checked' : ''}}/>
                                    Small
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="2"
                                        {{$ca_employment_info->ebd_bus_off == 2 ? 'checked' : ''}}/>
                                    Medium
                                </label>
                            </td>
                            <td>
                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="3"
                                        {{$ca_employment_info->ebd_bus_off == 3 ? 'checked' : ''}}/>
                                    Large
                                </label>
                            </td>
                            <td colspan="3" style="text-align: left;">
                                <label><input type="checkbox" name="ebd_bus_off" class="ebd_bus_off" value="4"
                                        {{$ca_employment_info->ebd_bus_off == 4 ? 'checked' : ''}}/>
                                    No Signboard
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">General Remarks</td>
                            <td colspan="7" style="font-weight: bold;">Please note that 
                                {{$ca_employment_info->employee_rem}} &nbsp;  
                                {{-- @if($ca_employment_info->gen_remarks == 1)
                                OK
                                @else
                                NOT OK
                                @endif --}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Field Agent Name</td>
                            <td colspan="3">{{$ca_employment_info->field_agent??''}}</td>
                            <td>Signature</td>
                            <td colspan="3">{{$ca_employment_info->signature??''}}</td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="signature-and-shit">
            <span style="font-size: 12px; border-top: 1px solid black;position: absolute;transform: translateY(600%)">Seal &amp; Sign of Authority</span>
            <span style="font-size: 12px; border-top: 1px solid black;position: absolute;transform: translate(410%, 600%)">Seal &amp; Sign of Team Leader</span>
        </div>
    </div>
    <div class="pg2">
        
    </div>
    <div class="pg3" style="position:relative;margin-top:50%">
        <span style="font-size:1em;text-align:center;display:flex;margin-bottom:20px;font-weight: bold;text-decoration: underline;">VERIFICATION REPORT</span>
        <div class="row">
            <div class="col-lg-11 m-auto">
                <table class="table table1 table-bordered">
                    <tr>
                        <td><input type="checkbox" name="city_type" class="city_type" value="1"
                                    {{$ca_bank_info->city_type == 1 ? 'checked' : ''}}/><span>CITY SOLUTION</span></td>
                        <td><input type="checkbox" name="city_type" class="city_type" value="2"
                                    {{$ca_bank_info->city_type == 2 ? 'checked' : ''}}/><span>CITY DRIVE</span></td>
                        <td><input type="checkbox" name="city_type" class="city_type" value="3"
                                    {{$ca_bank_info->city_type == 3 ? 'checked' : ''}}/><span>CITY MANARAH</span></td>
                    </tr>
                </table>
                
                <table class="table2" style="margin-top:15px">
                    <tr>
                        <th style="background: #c8cac8;">RECEIVING DATE: </th>
                        <td style="font-weight: bold">{{$ca_bank_info->receiving_date??'N/A'}}</td>
                        <td style="color: white">asdrfawraw3taw346</td>
                        <th style="background: #c8cac8;">SUBMISSION DATE</th>
                        <td style="font-weight: bold">{{$ca_bank_info->submission_date??'N/A'}}</td>
                    </tr>
                </table>
                
                <table class="table3">
                    <tr>
                        <th style="background: #c8cac8;">File No.</th>
                        <td>{{$ca_bank_info->file_name??'N/A'}}</td>
                    </tr>
                </table>
                
                <h4 style="text-decoration:underline">BANK STATEMENT WITHDRAWAL / VERIFICATION FORM</h4>
                
                <p style="font-weight:bold;font-size:13px;margin:0;margin-top:15px">We confirm that we have verified the following information and our findings are as follows:</p>
                
                <table class="table table-borderless table5">
                    <tbody>
                        <tr>
                            <td style="background:#f3f3f3">Name of Applicant</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_app_name??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Name of Bank</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_bank_name??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Branch Name</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_branch_name??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Account Title</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_account_title??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Account No:</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_account_no??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Statement Verified By</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_verify_name??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Designation</td>
                            <td colspan="3" style="text-align: left;">
                                 {{$ca_bank_info->ca_designation??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Contact Details</td>
                            <td>Land Ph: {{$ca_bank_info->ca_land??'N/A'}}</td>
                            <td colspan="2">Mobile No: {{$ca_bank_info->ca_mobile??'N/A'}}</td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Verification Date</td>
                            <td colspan="3" style="text-align: left;">
                                {{$ca_bank_info->ca_varify_date??'N/A'}}
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Remarks</td>
                            <td colspan="3" style="font-weight: bold;">Please note that {{$ca_bank_info->bank_remarks}} &nbsp; 
                                {{-- @if($ca_bank_info->gen_remarks == 1)
                                OK
                                @else
                                NOT OK
                                @endif --}}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;background:#f3f3f3;">If Statement Not Verified</td>
                            <td colspan="3">
                                {{$ca_bank_info->ca_check_verify}}
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Insufficient Fund' ? 'checked':''}}/> Insufficient Fund</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Original Statement required' ? 'checked':''}}/> Original Statement required</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Statemetn Required Will Seal & Sign' ? 'checked':''}}/> Statemetn Required Will Seal & Sign</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Authorization Letter Required' ? 'checked':''}}/> Authorization Letter Required</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Statement Will Be Sent By Mail' ? 'checked':''}}/> Statement Will Be Sent By Mail</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Statement Not Clear' ? 'checked':''}}/> Statement Not Clear</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Not Agreed To Verify' ? 'checked':''}}/> Not Agreed To Verify</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Computer Generated Statement' ? 'checked':''}}/> Computer Generated Statement</label></div>
                                <div><label><input type="checkbox" name="" class="bsstmt" {{$ca_bank_info->ca_check_verify == 'Others (plese Specify Below)' ? 'checked':''}}/> Others (plese Specify Below)</label></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="background:#f3f3f3">Field Agent Name</td>
                            <td>{{$ca_bank_info->field_agent??''}}</td>
                            <td>Signature</td>
                            <td>{{$ca_bank_info->signature??''}}</td>
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
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>