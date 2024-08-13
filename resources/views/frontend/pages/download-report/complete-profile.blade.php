<!DOCTYPE html>
<html>
<head>
    <title>Doctor Cost Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .header { margin-bottom: 20px; }
        .total { font-weight: bold; text-align: right; }
        .align { text-align: right; }
        .right-align { text-align: right; } /* Add this class */
        h1 {
            text-align: center;
            font-weight: bold;
        }
        .health {
            color: #139713; /* Change this to your desired color */
        }
        .footer {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 10px;
            font-size: 0.9em;
            color: #000000;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1><u>my<span class="health">Health</span>Line</u></h1>
    <h2>Complete Profile</h2>

    <div class="card col-8 pl-4">
        <!--GENAREL PROFILE--->
        <div class="row">
            <div class="col-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Unique Patient ID</strong></label>
                    <label class="form-label col-6">{{$user->unique_patient_id ?? ''}}</label>
                </div>
            </div>
            <div class="col-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Email</strong></label>
                    <label class="form-label col-6">{{$user->email ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Full Name</strong></label>
                    <label class="form-label col-6">{{$user->name ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Date Of Birth</strong></label>
                    <label class="form-label col-6">{{$generalProfile->dob ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Age</strong></label>
                    <label class="form-label col-6">{{$generalProfile->age ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Gender</strong></label>
                    <label class="form-label col-6">{{$user->gender ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Blood Group</strong></label>
                    <label class="form-label col-6">{{$user->blood_group ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Marital Status</strong></label>
                    <label class="form-label col-6">{{$user->marital_status ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Nationality</strong></label>
                    <label class="form-label col-6">{{$generalProfile->mastNationality->name ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Height</strong></label>
                    <label class="form-label col-6">{{$generalProfile->height_feet ?? ''}}Feet {{$generalProfile->height_inches ?? ''}}Inches</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Weight</strong></label>
                    <label class="form-label col-6">{{$generalProfile->weight_kg ?? ''}}KGs {{$generalProfile->weight_pounds ?? ''}}Pounds</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>BMI</strong></label>
                    <label class="form-label col-6">{{$generalProfile->bmi ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Religion</strong></label>
                    <label class="form-label col-6">{{$generalProfile->religion ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Emergency Contact</strong></label>
                    <label class="form-label col-6">{{$generalProfile->emergency_contact ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Address</strong></label>
                    <label class="form-label col-6">{{$generalProfile->address ?? ''}}</label>
                </div>
            </div>

        </div>

        <hr>
        <h3>Sensitive/Confidential Information</h3>
        <!--GENAREL PROFILE--->
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Sexually Active</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->sexually_active ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Diabetic</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->diabetic ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Allergies</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->allergies ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->allergy_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Thyroid</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->thyroid ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->thyroid_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Hypertension</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->hypertension ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Cholesterol</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->cholesterol ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->cholesterol_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>S Creatinine</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->s_creatinine ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->s_creatinine_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Smoking</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->smoking ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->smoking_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Alcohol Intake</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->alcohol_intake ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->alcohol_intake_details ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Drug Abuse History</strong></label>
                    <label class="form-label col-6">{{$sensitiveInformation->drug_abuse_history ?? ''}}</label>
                    <label class="form-label col-6">{{$sensitiveInformation->drug_abuse_details ?? ''}}</label>
                </div>
            </div>

        </div>


        <hr>
        <h3>Genetic Disease Profile</h3>
        <!--GENAREL PROFILE--->
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Sexually Active</strong></label>
                    <label class="form-label col-6">{{$geneticDiseaseProfile->sexually_active ?? ''}}</label>
                </div>
            </div>
        </div>


        <hr>
        <h3>Other Personal Information</h3>
        <!--GENAREL PROFILE--->
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Home Address</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->home_address ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Office Address</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->office_address ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Email Address</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->email_address ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Phone Number</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->phone_number ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Last Blood Donated</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->last_blood_donated ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Health Insurance #</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->health_insurance_number ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Family Physician</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->family_physician ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Physician's Contact</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->physician_contact ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Menstrual Cycle</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->menstrual_cycle ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Pregnancy Status</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->pregnancy_status ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Activity Status</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->activity_status ?? ''}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-6"><strong>Hereditary Disease Note:</strong></label>
                    <label class="form-label col-6">{{$otherPersonalInformation->hereditary_disease ?? ''}}</label>
                </div>
            </div>
        </div>

        <!--CASE--->
        @foreach ($caseRegistryList as $key => $caseRegistry)
            <hr>
            <h3>Case Data {{++$key}}</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Date of Primary Identification of Issue</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->date_of_primary_identification ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Date of First Visit to Physician</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->date_of_first_visit ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Recurrence</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->recurrence ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Duration of Suffering (Prior to Physician Visit)</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->duration ?? ''}} {{$caseRegistry->duration_unit ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Area of Problem Identified</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->area_of_problem ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Type of Ailment</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->type_of_ailment ?? ''}}</label>
                    </div>
                </div>
            </div>
            @php
                $complaints = DB::select("
                    SELECT m.id, m.name
                    FROM mast_complaints m  JOIN case_complaints c
                    ON c.mast_complaint_id = m.id  AND c.case_registry_id = $caseRegistry->id
                ");
            @endphp


            <hr>
            <h3>Complaint(s) - Click all that applies</h3>
            <!--CASE--->
            <div class="row">
                @foreach ($complaints as $complaint)
                    <div class="form-check">
                        <label for="complaint_{{ $complaint->id }}" class="form-check-label">{{ $complaint->name }} </label>
                    </div>
                @endforeach
            </div>

            <hr>
            <h3>Examination & Treatment Profile</h3>
            <!--CASE--->
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Name of Doctor</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->doctor_name ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Designation</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->designation ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Chamber Address</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->chamber_address ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Date of Last Visit</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->last_visit_date ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Fees (Optional)</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->fees ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Doctor's Comment</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->comments ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Disease/Diagnosis</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->disease_diagnosis ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Prescription</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->treatmentProfile->prescription ?? ''}}</label>
                    </div>
                </div>
            </div>

            <hr>
            <h3>Recommended Pathological/Lab Test(s)</h3>
            <!--CASE--->
            <div class="row">
                <table id="dataTableLabTests" class="table table-nowrap table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name of Test</th>
                            <th scope="col">Type</th>
                            <th scope="col">Organ</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Lab</th>
                            <th scope="col">Upload File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($caseRegistry->treatmentProfile->labTests) && count($caseRegistry->treatmentProfile->labTests) > 0)
                            @foreach ($caseRegistry->treatmentProfile->labTests as $key => $row)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{$row->mastTest->test_name}}</td>
                                    <td>
                                        @if ($row->type == 1) Blood sample
                                        @elseif ($row->type == 2 ) Urine Sample
                                        @elseif ($row->type == 3 ) Stool Sample
                                        @elseif ($row->type == 4 ) Imaging
                                        @elseif ($row->type == 5 ) Genetic
                                        @elseif ($row->type == 6 ) Biopsy
                                        @endif
                                    </td>
                                    <td>{{$row->mastTest->organ_name}}</td>
                                    <td><textarea name="data[{{ $key }}][comments]" rows="1" class="form-control" disabled>{{ $row->comments }}</textarea></td>
                                    <td><input type="number" name="data[{{ $key }}][cost]" class="form-control" value="{{ $row->cost }}" disabled></td>
                                    <td><input type="text" name="data[{{ $key }}][lab]" class="form-control" value="{{ $row->lab }}" disabled></td>
                                    <td class="pt-3">
                                        <a href="{{route('treatment-labtest.dwonload', $row->id)}}" class="text-white bg-success p-2 border-rounded"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i> Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <hr>
            <h3>Medication/Remedy List & Schedule</h3>
            <!--CASE--->
            <div class="row">
                <table id="medicationTable" class="table table-nowrap table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Type</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Power</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Cost (Total)</th>
                            <th scope="col">Timing</th>
                            <th scope="col">Anti-Biotic</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($caseRegistry->medicationSchedule) && count($caseRegistry->medicationSchedule) > 0)
                            @foreach ($caseRegistry->medicationSchedule as $key => $row)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{$row->equipment->name}}</td>
                                    <td><input type="text" name="data[{{ $key }}][full_name]" class="form-control" value="{{ $row->full_name }}" disabled></td>
                                    <td>{{$row->power->name}}</td>
                                    <td>
                                        <select class="form-select" name="data[{{ $key }}][duration]" disabled>
                                            @foreach(['3 Days', '7 Days', '10 Days', '14 Days', '21 Days', '28 Days', '1 Month', '2 Months', '3 Months', '6 Months', 'Extensive (Undecided)'] as $duration)
                                                <option value="{{ $duration }}" {{ $row->duration == $duration ? 'selected' : '' }}>{{ $duration }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="data[{{ $key }}][frequency]" class="form-control" value="{{ $row->frequency }}" disabled></td>
                                    <td><input type="number" name="data[{{ $key }}][cost]" class="form-control" value="{{ $row->cost }}" disabled></td>
                                    <td>
                                        <select class="form-select" name="data[{{ $key }}][timing]" disabled>
                                            @foreach(['Before meal', 'After meal', 'On Empty Stomach'] as $timing)
                                                <option value="{{ $timing }}" {{ $row->timing == $timing ? 'selected' : '' }}>{{ $timing }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" name="data[{{ $key }}][antibiotic]" disabled>
                                            @foreach(['Yes', 'No', 'Not Sure'] as $antibiotic)
                                                <option value="{{ $antibiotic }}" {{ $row->antibiotic == $antibiotic ? 'selected' : '' }}>{{ $antibiotic }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <hr>
            <h3>Surgical/Fixed Intervention(s)</h3>
            <!--CASE--->
            <div class="row">
                <table id="surgicalTable" class="table table-nowrap table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Intervention</th>
                            <th scope="col">Due Time</th>
                            <th scope="col">Other Important Details</th>
                            <th scope="col">Date Line</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($caseRegistry->surgicalIntervention) && count($caseRegistry->surgicalIntervention) > 0)
                            @foreach ($caseRegistry->surgicalIntervention as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <select class="form-select" name="data[{{ $key }}][intervention]" disabled>
                                            <option value="Prosthesis" {{ $row->intervention == "Prosthesis" ? 'selected' : '' }}>Prosthesis</option>
                                            <option value="Orthosis" {{ $row->intervention == "Orthosis" ? 'selected' : '' }}>Orthosis</option>
                                            <option value="Surgery (Minor)" {{ $row->intervention == "Surgery (Minor)" ? 'selected' : '' }}>Surgery (Minor)</option>
                                            <option value="Surgery (Major)" {{ $row->intervention == "Surgery (Major)" ? 'selected' : '' }}>Surgery (Major)</option>
                                            <option value="Stiches" {{ $row->intervention == "Stiches" ? 'selected' : '' }}>Stiches</option>
                                            <option value="Amputation" {{ $row->intervention == "Amputation" ? 'selected' : '' }}>Amputation</option>
                                            <option value="Dismembering" {{ $row->intervention == "Dismembering" ? 'selected' : '' }}>Dismembering</option>
                                            <option value="Hearing Aid" {{ $row->intervention == "Hearing Aid" ? 'selected' : '' }}>Hearing Aid</option>
                                            <option value="Plaster (Short Term)" {{ $row->intervention == "Plaster (Short Term)" ? 'selected' : '' }}>Plaster (Short Term)</option>
                                            <option value="Plaster (Long Term)" {{ $row->intervention == "Plaster (Long Term)" ? 'selected' : '' }}>Plaster (Long Term)</option>
                                            <option value="Nebulization" {{ $row->intervention == "Nebulization" ? 'selected' : '' }}>Nebulization</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" name="data[{{ $key }}][due_time]" disabled>
                                            <option value="ASAP" {{ $row->due_time == "ASAP" ? 'selected' : '' }}>ASAP</option>
                                            <option value="Within 24 Hours" {{ $row->due_time == "Within 24 Hours" ? 'selected' : '' }}>Within 24 Hours</option>
                                            <option value="Within 2 Days" {{ $row->due_time == "Within 2 Days" ? 'selected' : '' }}>Within 2 Days</option>
                                            <option value="Within 3 Days" {{ $row->due_time == "Within 3 Days" ? 'selected' : '' }}>Within 3 Days</option>
                                            <option value="Within 4 Days" {{ $row->due_time == "Within 4 Days" ? 'selected' : '' }}>Within 4 Days</option>
                                            <option value="Within 1 Week" {{ $row->due_time == "Within 1 Week" ? 'selected' : '' }}>Within 1 Week</option>
                                            <option value="Within 10 Days" {{ $row->due_time == "Within 10 Days" ? 'selected' : '' }}>Within 10 Days</option>
                                            <option value="Within 2 Weeks" {{ $row->due_time == "Within 2 Weeks" ? 'selected' : '' }}>Within 2 Weeks</option>
                                            <option value="Within 3 Weeks" {{ $row->due_time == "Within 3 Weeks" ? 'selected' : '' }}>Within 3 Weeks</option>
                                            <option value="Within 1 Month" {{ $row->due_time == "Within 1 Month" ? 'selected' : '' }}>Within 1 Month</option>
                                            <option value="Within 2 Months" {{ $row->due_time == "Within 2 Months" ? 'selected' : '' }}>Within 2 Months</option>
                                            <option value="Within 3 Months" {{ $row->due_time == "Within 3 Months" ? 'selected' : '' }}>Within 3 Months</option>
                                            <option value="Within 4 Months" {{ $row->due_time == "Within 4 Months" ? 'selected' : '' }}>Within 4 Months</option>
                                            <option value="Within 6 Months" {{ $row->due_time == "Within 6 Months" ? 'selected' : '' }}>Within 6 Months</option>
                                            <option value="No time limit" {{ $row->due_time == "No time limit" ? 'selected' : '' }}>No time limit</option>
                                        </select>
                                    </td>
                                    <td><textarea name="data[{{ $key }}][details]" class="form-control" rows="1" disabled>{{ $row->details }}</textarea></td>
                                    <td><input type="number" name="data[{{ $key }}][cost]" class="form-control" value="{{ $row->cost }}" disabled></td>
                                    <td><input type="number" name="data[{{ $key }}][date_line]" class="form-control" value="{{ $row->date_line }}" disabled></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <hr>
            <h3>Other Optionsal Question(s)</h3>
            <!--CASE--->
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>1. Were you admitted in hospital/Clinic following the diagnosis?</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->admitted_following_diagnosis ?? ''}}</label>
                        @if (($caseRegistry->optionsalQuestion->admitted_following_diagnosis ?? '') == 'Yes')
                        <label class="form-label col-6"><strong>A. If the answer is yes for Q1, how long?</strong></label>
                            <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->hospitalization_duration ?? ''}}</label>

                            <label class="form-label col-6"><strong>B. Total Costs incurred during hospitalization</strong></label>
                            <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->total_cost_incurred ?? ''}}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>2. Did the medication and/or interventions cure the problem completely?</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->medication_effectiveness ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>3. Are you satisfied with how you were treated (overall)?</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->satisfied_with_treatment ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>4. Would you recommend your physician/doctor to others?</strong></label>
                        <label class="form-label col-6">{{$caseRegistry->optionsalQuestion->recommend_physician ?? ''}}</label>
                    </div>
                </div>
            </div>

            <hr>
            <h3>Restriction(s) if any</h3>
            <!--CASE--->
            <div class="row">
                <table id="restrictionTable" class="table table-nowrap table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Type</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($caseRegistry->restriction) && count($caseRegistry->restriction) > 0)
                            @foreach ($caseRegistry->restriction as $key => $row)
                                <tr>
                                    <td>{{++$key }}</td>
                                    <td><input type="text" name="types[]" class="form-control" value="{{$row->type}}" disabled></td>
                                    <td><textarea name="details[]" class="form-control" rows="1" disabled>{{$row->details}}</textarea></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        @endforeach

        <hr>
        <h3>Blood Sugar Profiling</h3>
        <!--PROFILING TOOL--->
        <div class="row">
            <table id="dataTableSugar" class="table table-nowrap table-striped mb-0">
                <!-- Blood Sugar Profiling Table -->
                <thead class="table-light">
                    <tr>
                        <th scope="col">Count</th>
                        <th scope="col">Time</th>
                        <th scope="col">Reading</th>
                        <th scope="col">Dietary Information</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Additional Note</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sugarData as $key => $row)
                        <tr>
                            <td><h6 class="mt-2">{{ $key + 1 }}st</h6></td>
                            <td><input type="time" class="form-control" name="time[]" value="{{ $row->time }}" disabled></td>
                            <td>
                                @php
                                    $readings = range(0.1, 35, 0.1);
                                @endphp

                                <select class="form-select" name="reading[]" disabled>
                                    @foreach ($readings as $reading)
                                        <option value="{{ $reading }}" {{ $row->reading == $reading ? 'selected' : '' }}>{{ $reading }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="dietary_information[]" disabled>
                                    <option value="Fasting (Eaten before 6 or more hours)" {{ $row->dietary_information == 'Fasting (Eaten before 6 or more hours)' ? 'selected': '' }}>Fasting (Eaten before 6 or more hours)</option>
                                    <option value="Semi Fasting (Eaten 4 hours before)" {{ $row->dietary_information == 'Semi Fasting (Eaten 4 hours before)' ? 'selected': '' }}>Semi Fasting (Eaten 4 hours before)</option>
                                    <option value="Digestive (Eaten 2 hours ago)" {{ $row->dietary_information == 'Digestive (Eaten 2 hours ago)' ? 'selected': '' }}>Digestive (Eaten 2 hours ago)</option>
                                    <option value="2 Hours After meal" {{ $row->dietary_information == '2 Hours After meal' ? 'selected': '' }}>2 Hours After meal</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="remark[]" disabled>
                                    <option value="Hypo (Dangerously Low)" {{ $row->remark == 'Hypo (Dangerously Low)' ? 'selected': '' }}>Hypo (Dangerously Low)</option>
                                    <option value="Low" {{ $row->remark == 'Low' ? 'selected': '' }}>Low</option>
                                    <option value="Normal" {{ $row->remark == 'Normal' ? 'selected': '' }}>Normal</option>
                                    <option value="High" {{ $row->remark == 'High' ? 'selected': '' }}>High</option>
                                    <option value="Hyper (Dangerously High)" {{ $row->remark == 'Hyper (Dangerously High)' ? 'selected': '' }}>Hyper (Dangerously High)</option>
                                </select>
                            </td>
                            <td><textarea class="form-control" name="additional_note[]" rows="1" disabled>{{ $row->additional_note }}</textarea></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>
        <h3>Blood Pressure Profiling</h3>
        <!--PROFILING TOOL--->
        <div class="row">
            <table id="dataTablePressure" class="table table-nowrap table-striped mb-0">
                <!-- Blood Pressure Profiling Table -->
                <thead class="table-light">
                    <tr>
                        <th scope="col">Count</th>
                        <th scope="col">Time</th>
                        <th scope="col">Systolic</th>
                        <th scope="col">Diastolic</th>
                        <th scope="col">Heart Rate (BPM)</th>
                        <th scope="col">Additional Note</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        function ordinal($number) {
                            $suffixes = ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"];
                            $index = $number % 100;
                            if ($index >= 11 && $index <= 13) {
                                return $number . 'th';
                            } else {
                                return $number . $suffixes[$number % 10];
                            }
                        }
                    @endphp --}}
                    @foreach($pressureData as $key =>  $row)

                        <tr>
                            {{-- <td><h6 class="mt-2">{{ ordinal($key + 1) }}</h6></td> --}}
                            <td><input type="time" class="form-control" name="time[]" value="{{$row->time}}" disabled></td>
                            <td>
                                <select class="form-select" name="systolic[]" disabled>
                                    @foreach (range(50, 200) as $value)
                                        <option value="{{ $value }}" {{$row->systolic ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="diastolic[]" disabled>
                                    @foreach (range(30, 125) as $value)
                                        <option value="{{ $value }}" {{$row->diastolic ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="heart_rate_bpm[]" disabled>
                                    @foreach (range(30, 130) as $value)
                                        <option value="{{ $value }}" {{$row->heart_rate_bpm ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><textarea class="form-control" name="additional_note[]" rows="1" disabled>{{$row->additional_note}}</textarea></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>
        <h3>Section 01 - EPI</h3>
        <!--VACCINATION RECORD--->
        <div class="row">
            <table class="table table-nowrap table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Vaccine Name</th>
                        <th scope="col">Dose 1</th>
                        <th scope="col">Dose 2</th>
                        <th scope="col">Dose 3</th>
                        <th scope="col">Dose 4</th>
                        <th scope="col">Dose 5</th>
                        <th scope="col">Booster</th>
                        <th scope="col">Document</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vaccination as $row)
                        @if($row->type == 'section one')
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->vaccine_name}}</td>
                                <td>{{$row->dose_01}}</td>
                                <td>{{$row->dose_02}}</td>
                                <td>{{$row->dose_03}}</td>
                                <td>{{$row->dose_04}}</td>
                                <td>{{$row->dose_05}}</td>
                                <td>{{$row->booster}}</td>
                                <td>
                                    <a href="{{ route('vaccination.download', $row->id) }}" class="btn btn-soft-info btn-sm">
                                        <i class="ri-file-list-3-line align-middle"></i> Download File
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>
        <h3>Section 02 - Covid-19</h3>
        <!--VACCINATION RECORD--->
        <div class="row">
            <table class="table table-nowrap table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Vaccine</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($covidData as $row)
                        <tr>
                            <td>{{$row->dose_type}}</td>
                            <td>{{$row->manufacturer}}</td>
                            <td>{{$row->location}}</td>
                            <td>{{$row->date}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <hr>
        <h3>Section -3 (Paid Ones)</h3>
        <!--VACCINATION RECORD--->
        <div class="row">
            <table class="table table-nowrap table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Market Name</th>
                        <th scope="col">Applicable For</th>
                        <th scope="col">Dose 1</th>
                        <th scope="col">Dose 2</th>
                        <th scope="col">Dose 3</th>
                        <th scope="col">Dose 4</th>
                        <th scope="col">Dose 5</th>
                        <th scope="col">Booster</th>
                        <th scope="col">Document</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vaccination as $row)
                        @if ($row->type == 'section three')
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->market_name}}</td>
                                <td>{{$row->applicable_for}}</td>
                                <td>{{$row->dose_01}}</td>
                                <td>{{$row->dose_02}}</td>
                                <td>{{$row->dose_03}}</td>
                                <td>{{$row->dose_04}}</td>
                                <td>{{$row->dose_05}}</td>
                                <td>{{$row->booster}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--DOCTOR APPOINTMENT--->
        @foreach ($doctorAppointmentList as $key => $doctorAppointment)
            <br><br><hr>
            <h3>Doctor's Appointment {{++$key}}</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Doctor Full Name</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->full_name ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Designation</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->designation ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Contact Number</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->contact_number ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Specialization</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->specialization ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Availability Hours</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->availability_hours ?? ''}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-2">
                        <label class="form-label col-6"><strong>Chamber Address</strong></label>
                        <label class="form-label col-6">{{$doctorAppointment->chamber_address ?? ''}}</label>
                    </div>
                </div>
                <div class="col-12">
                    <table id="items-table" class="table table-nowrap table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Appointment(s)</th>
                                <th scope="col">Date</th>
                                <th scope="col">Day</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Note</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctorAppointment->appointmentDetails as $row)
                                <tr>
                                    <td>{{$row->appointment}}</td>
                                    <td>{{$row->time_date_tool}}</td>
                                    <td>{{$row->day}}</td>
                                    <td>{{$row->fee}}</td>
                                    <td>{{$row->note}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </div>
    <!--end card-->
</body>
</html>
    