<x-app-layout>
    <div class="row">
        <div class="col-lg-12 text-end mb-2">
            <a href="{{route('info-cases-list')}}" class="btn btn-sm btn-dark">
                <!--<i class="ri-add-line align-middle me-1"></i>--> Back
            </a>
        </div>
        <div class="col-lg-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success bg-white" id="" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ Session::has('step2') || Session::has('step3') || Session::has('step4') || Session::has('step5') ? '' : 'active' }} " id="section1" data-bs-toggle="tab" href="#nav-border-step1" role="tab" aria-selected="false">
                        <i class="ri-home-5-line align-middle me-1"></i> Case Resitation
                    </a>
                </li>
                
                @if (isset($caseRegistry) && $caseRegistry->id)
                <li class="nav-item">
                    <a class="nav-link {{ Session::has('step2') ? 'active' : '' }}" id="section2" data-bs-toggle="tab" href="#nav-border-step2" role="tab" aria-selected="false">
                        <i class="ri-question-answer-line align-middle me-1"></i> Examination & Treatment
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Session::has('step3') ? 'active' : '' }}" id="section3" data-bs-toggle="tab" href="#nav-border-step3" role="tab" aria-selected="false">
                        <i class="ri-question-answer-line align-middle me-1"></i>Medication & Remedy
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Session::has('step4') ? 'active' : '' }}" id="section4" data-bs-toggle="tab" href="#nav-border-step4" role="tab" aria-selected="false">
                        <i class="ri-question-answer-line align-middle me-1"></i>Surgical Intervention(Optional)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Session::has('step5') ? 'active' : '' }}" id="section5" data-bs-toggle="tab" href="#nav-border-step5" role="tab" aria-selected="false">
                        <i class="ri-question-answer-line align-middle me-1"></i> Question & Restriction
                    </a>
                </li>
                @endif

            </ul>
                
            <!--Case Data Entry From-->
            <div class="tab-content text-muted">
                <div class="tab-pane {{ Session::has('step2') || Session::has('step3') || Session::has('step4') || Session::has('step5') ? '' : 'active' }}" id="nav-border-step1" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('case_registry.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}" id="caseRegistryId">
        
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="date_of_primary_identification" class="form-label">Date of Primary Identification of Issue</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="date" name="date_of_primary_identification" id="date_of_primary_identification" class="form-control" value="{{$caseRegistry->date_of_primary_identification ?? ''}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="date_of_first_visit" class="form-label">Date of First Visit to Physician</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="date" name="date_of_first_visit" id="date_of_first_visit" class="form-control"  value="{{$caseRegistry->date_of_first_visit ?? ''}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="recurrence" class="form-label">Recurrence</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="recurrence" class="form-select" id="recurrence">
                                            <option value="Genetic" {{ $caseRegistry && $caseRegistry->recurrence == 'Genetic' ? 'selected' : '' }}>Genetic</option>
                                            <option value="First Time" {{ $caseRegistry && $caseRegistry->recurrence == 'First Time' ? 'selected' : '' }}>First Time</option>
                                            <option value="Repetition" {{ $caseRegistry && $caseRegistry->recurrence == 'Repetition' ? 'selected' : '' }}>Repetition</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="duration" class="form-label">Duration of Suffering (Prior to Physician Visit)</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="form-select" name="duration" id="duration">
                                            @foreach (range(1, 29) as $value)
                                                <option value="{{ $value }}" {{ $caseRegistry && $caseRegistry->duration == $value ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="duration_unit" class="form-select" id="duration_unit">
                                            <option value="Hour(s)" {{ $caseRegistry && $caseRegistry->duration_unit == 'Hour(s)' ? 'selected' : '' }}>Hour(s)</option>
                                            <option value="Day(s)" {{ $caseRegistry && $caseRegistry->duration_unit == 'Day(s)' ? 'selected' : '' }}>Day(s)</option>
                                            <option value="Week(s)" {{ $caseRegistry && $caseRegistry->duration_unit == 'Week(s)' ? 'selected' : '' }}>Week(s)</option>
                                            <option value="Month(s)" {{ $caseRegistry && $caseRegistry->duration_unit == 'Month(s)' ? 'selected' : '' }}>Month(s)</option>
                                            <option value="Year(s)" {{ $caseRegistry && $caseRegistry->duration_unit == 'Year(s)' ? 'selected' : '' }}>Year(s)</option>
                                        </select>                                
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="area_of_problem" class="form-label">Area of Problem Identified</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="area_of_problem" id="area_of_problem" class="form-control"  value="{{$caseRegistry->area_of_problem ?? ''}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <label for="type_of_ailment" class="form-label">Type of Ailment</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="type_of_ailment" class="form-select" id="type_of_ailment">
                                            <option value="Neurological" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Neurological' ? 'selected' : '' }}>Neurological</option>
                                            <option value="Eye/Visual" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Eye/Visual' ? 'selected' : '' }}>Eye/Visual</option>
                                            <option value="Orthopedic" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Orthopedic' ? 'selected' : '' }}>Orthopedic</option>
                                            <option value="Abdomen" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Abdomen' ? 'selected' : '' }}>Abdomen</option>
                                            <option value="Gastrology" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Gastrology' ? 'selected' : '' }}>Gastrology</option>
                                            <option value="Dermatology" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
                                            <option value="Oncology" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Oncology' ? 'selected' : '' }}>Oncology</option>
                                            <option value="Reproductive" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Reproductive' ? 'selected' : '' }}>Reproductive</option>
                                            <option value="Other" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Other' ? 'selected' : '' }}>Other</option>
                                            <option value="Hand" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Hand' ? 'selected' : '' }}>Hand</option>
                                            <option value="Nail" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Nail' ? 'selected' : '' }}>Nail</option>
                                            <option value="Knee" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Knee' ? 'selected' : '' }}>Knee</option>
                                            <option value="Joints/Muscle" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Joints/Muscle' ? 'selected' : '' }}>Joints/Muscle</option>
                                            <option value="Psychometric" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Psychometric' ? 'selected' : '' }}>Psychometric</option>
                                            <option value="Functional Rehabilitation" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Functional Rehabilitation' ? 'selected' : '' }}>Functional Rehabilitation</option>
                                            <option value="Drug Abuse/Rehabilitation" {{ $caseRegistry && $caseRegistry->type_of_ailment == 'Drug Abuse/Rehabilitation' ? 'selected' : '' }}>Drug Abuse/Rehabilitation</option>
                                        </select>                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title my-4 flex-grow-1">Complaint(s) - Click all that applies</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            @foreach($complaints as $complaint)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="mast_complaints[]" value="{{ $complaint->id }}" class="form-check-input mast_complaints" {{$complaint->chk == 1 ? 'checked': ''}}>
                                                        <label for="complaint_{{ $complaint->id }}" class="form-check-label">{{ $complaint->name }} </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control" name="additional_complaints" id="additional_complaints" rows="12" placeholder="Enter your message">{{$caseRegistry->additional_complaints ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-1"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                        <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-1"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Examination & Treatment Profile || Lab Test-->
            <div class="tab-content text-muted">
                <div class="tab-pane {{ Session::has('step2') ? 'active show' : '' }}" id="nav-border-step2" role="tabpanel">
                    
                    <form action="{{ route('treatment-lab-test.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $treatmentProfile->id ?? '' }}" id="treatmentProfileId">
                        <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}">
        
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Examination & Treatment Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Doctor's Information -->
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="doctorName" class="form-label col-lg-5">Name of Doctor</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" name="doctor_name" id="doctorName" value="{{ $treatmentProfile->doctor_name ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="designation" class="form-label col-lg-5">Designation</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" name="designation" id="designation" value="{{ $treatmentProfile->designation ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="chamberAddress" class="form-label col-lg-5">Chamber Address</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" name="chamber_address" id="chamberAddress" value="{{ $treatmentProfile->chamber_address ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="lastVisitDate" class="form-label col-lg-5">Date of Last Visit</label>
                                            <div class="col-lg-7">
                                                <input type="date" class="form-control" name="last_visit_date" id="lastVisitDate" value="{{ $treatmentProfile->last_visit_date ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="fees" class="form-label col-lg-5">Fees (Optional)</label>
                                            <div class="col-lg-7">
                                                <input type="number" class="form-control" name="fees" id="fees"  value="{{ $treatmentProfile->fees ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="comments" class="form-label col-lg-5">Doctor's Comment</label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control" name="comments" id="comments" rows="1" placeholder="Enter final comments from the last visit">{{ $treatmentProfile->comments ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="diseaseDiagnosis" class="form-label col-lg-5">Disease/Diagnosis</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" name="disease_diagnosis" id="diseaseDiagnosis" value="{{ $treatmentProfile->disease_diagnosis ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="prescription" class="form-label col-lg-5">Prescription</label>
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                    <input type="file" class="form-control" name="prescription" id="prescription" value="{{ $treatmentProfile->prescription ?? '' }}">
                                                    @if (isset($treatmentProfile->prescription))
                                                        <a href="{{route('treatment-prescription.dwonload', $treatmentProfile->id)}}" class="text-white bg-success p-2 border-rounded"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Recommended Pathological/Lab Test(s)</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
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
                                            @if(isset($treatmentProfile->labTests) && count($treatmentProfile->labTests) > 0)
                                                @foreach ($treatmentProfile->labTests as $key => $row)
                                                    <tr>
                                                        <th scope="row">{{ ++$key }}</th>
                                                        <input type="hidden" name="data[{{ $key }}][id]" value="{{$row->id}}">
                                                        <td>
                                                            <select class="form-select mast_test_id" name="data[{{ $key }}][mast_test_id]" disabled>
                                                                <option value="">-- Select Test --</option>
                                                                @foreach ($tests as $item)
                                                                    <option value="{{ $item->id }}" {{ $row->mast_test_id == $item->id ? 'selected' : '' }}>{{ $item->test_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select type" name="data[{{ $key }}][type]" disabled>
                                                                <option value="">-- Select Test --</option>
                                                                <option value="1" {{ $row->type == 1 ? 'selected' : '' }}>Blood sample</option>
                                                                <option value="2" {{ $row->type == 2 ? 'selected' : '' }}>Urine Sample</option>
                                                                <option value="3" {{ $row->type == 3 ? 'selected' : '' }}>Stool Sample</option>
                                                                <option value="4" {{ $row->type == 4 ? 'selected' : '' }}>Imaging</option>
                                                                <option value="5" {{ $row->type == 5 ? 'selected' : '' }}>Genetic</option>
                                                                <option value="6" {{ $row->type == 6 ? 'selected' : '' }}>Biopsy</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select mast_organ_id" name="data[{{ $key }}][mast_organ_id]" disabled>
                                                                <option value="">-- Select Test --</option>
                                                                @foreach ($organs as $item)
                                                                    <option value="{{ $item->id }}" {{ $row->mast_organ_id == $item->id ? 'selected' : '' }}>{{ $item->organ_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><textarea rows="1" name="data[{{ $key }}][comments]" class="form-control comments" disabled>{{ $row->comments }}</textarea></td>
                                                        <td><input type="number" name="data[{{ $key }}][cost]" class="form-control cost" value="{{ $row->cost }}" disabled></td>
                                                        <td><input type="text" name="data[{{ $key }}][lab]" class="form-control lab" value="{{ $row->lab }}" disabled></td>
                                                        <td><input type="file" name="data[{{ $key }}][upload_tool]" class="form-control upload_tool" value="{{ $row->upload_tool }}" disabled></td>
                                                        <td class="pt-3">
                                                            <a href="{{route('treatment-labtest.dwonload', $row->id)}}" class="text-white bg-success p-2 border-rounded {{ empty($row->upload_tool) ? 'd-none' : '' }}"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i> Download</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @endif
                                        </tbody>
                                        <tfoot class="table-light">
                                            <tr>
                                                <td colspan="8">
                                                    <button type="button" id="addRowLabTest" class="btn btn-secondary btn-label waves-effect waves-light">
                                                        <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-2"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-2"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
        
                        </div>
                    </form>

                    @push('scripts')
                    <script>
                        $(document).ready(function() {

                            var index = $('#dataTableLabTests tbody tr').length + 1;
                            if(index == 1){
                                addRowLabTest(index);
                            }

                            // Add new row
                            $('#addRowLabTest').click(function() {
                                var index = $('#dataTableLabTests tbody tr').length + 1;
                                addRowLabTest(index);
                            });

                            function addRowLabTest(index){
                                var newRow = `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td><select class="form-select" name="data[${index}][mast_test_id]">
                                        <option value="">-- Select Test --</option>
                                        @foreach ($tests as $item)
                                            <option value="{{ $item->id }}">{{ $item->test_name }}</option>
                                        @endforeach
                                    </select></td>
                                    <td><select class="form-select" name="data[${index}][type]">
                                        <option value="">-- Select Type --</option>
                                        <option value="1">Blood sample</option>
                                        <option value="2">Urine Sample</option>
                                        <option value="3">Stool Sample</option>
                                        <option value="4">Imaging</option>
                                        <option value="5">Genetic</option>
                                        <option value="6">Biopsy</option>
                                    </select></td>
                                    <td><select class="form-select" name="data[${index}][mast_organ_id]">
                                        <option value="">-- Select Organ --</option>
                                        @foreach ($organs as $item)
                                            <option value="{{ $item->id }}">{{ $item->organ_name }}</option>
                                        @endforeach
                                    </select></td>
                                    <td><textarea name="data[${index}][comments]" rows="1" class="form-control"></textarea></td>
                                    <td><input type="number" name="data[${index}][cost]" class="form-control"></td>
                                    <td><input type="text" name="data[${index}][lab]" class="form-control"></td>
                                    <td><input type="file" name="data[${index}][upload_tool]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                </tr>`;

                                $('#dataTableLabTests tbody').append(newRow);
                                updateRowIndices();
                            }
                    
                            // Remove row
                            $(document).on('click', '.remove-row', function() {
                                $(this).closest('tr').remove();
                                updateRowIndices();
                            });

                            // Update row indices after adding/removing rows
                            function updateRowIndices() {
                                $('#dataTableLabTests tbody tr').each(function(index, tr) {
                                    $(tr).find('th').text(index + 1);
                                    $(tr).find('select, textarea, input').each(function() {
                                        var name = $(this).attr('name');
                                        if (name) {
                                            var newName = name.replace(/\d+/, index);
                                            $(this).attr('name', newName);
                                        }
                                    });
                                });
                            }
                        });
                    </script>
                    @endpush

                </div>
            </div>

            <!-- Medication/Remedy List & Schedule -->
            <div class="tab-content text-muted">
                <div class="tab-pane {{ Session::has('step3') ? 'active show' : '' }}" id="nav-border-step3" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('medication-schedule.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}">
                                <input type="hidden" value="{{ count($medicationSchedule ?? []) > 0 ? '1' : '' }}" id="hasMedicationSchedule">

                                <div class="table-responsive table-card">
                                    <table id="medicationTable" class="table table-nowrap table-striped mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Power</th>
                                                <th scope="col">Duration</th>
                                                <th scope="col">Frequency</th>
                                                <th scope="col">Total Cost (Full course)</th>
                                                <th scope="col">Timing</th>
                                                <th scope="col">Anti-Biotic</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($medicationSchedule) && count($medicationSchedule) > 0)
                                                @foreach ($medicationSchedule as $key => $row)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <input type="hidden" name="data[{{ $key }}][id]" value="{{$row->id}}">
                                                    <td>
                                                        <select class="form-select mast_equipment_id" name="data[{{ $key }}][mast_equipment_id]">
                                                            @foreach($equipments as $equipment)
                                                                <option value="{{ $equipment->id }}" {{ isset($row->mast_equipment_id) && $row->mast_equipment_id == $equipment->id ? 'selected' : '' }}>{{ $equipment->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="data[{{ $key }}][full_name]" class="form-control full_name" value="{{ $row['full_name'] ?? '' }}"></td>
                                                    <td>
                                                        <select class="form-select mast_power_id" name="data[{{ $key }}][mast_power_id]">
                                                            @foreach($powers as $power)
                                                                <option value="{{ $power->id }}" {{ isset($row['mast_power_id']) && $row['mast_power_id'] == $power->id ? 'selected' : '' }}>{{ $power->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select duration" name="data[{{ $key }}][duration]">
                                                            @foreach(['3 Days', '7 Days', '10 Days', '14 Days', '21 Days', '28 Days', '1 Month', '2 Months', '3 Months', '6 Months', 'Extensive (Undecided)'] as $duration)
                                                                <option value="{{ $duration }}" {{ isset($row['duration']) && $row['duration'] == $duration ? 'selected' : '' }}>{{ $duration }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select frequency" name="data[{{ $key }}][frequency]">
                                                            <option value="">-- Select --</option>
                                                            <option value="0+0+1" {{ isset($row['frequency']) && $row['frequency'] == '0+0+1' ? 'selected' : '' }}>0+0+1</option>
                                                            <option value="0+1+0" {{ isset($row['frequency']) && $row['frequency'] == '0+1+0' ? 'selected' : '' }}>0+1+0</option>
                                                            <option value="1+0+0" {{ isset($row['frequency']) && $row['frequency'] == '1+0+0' ? 'selected' : '' }}>1+0+0</option>
                                                            <option value="1+0+1" {{ isset($row['frequency']) && $row['frequency'] == '1+0+1' ? 'selected' : '' }}>1+0+1</option>
                                                            <option value="0+1+1" {{ isset($row['frequency']) && $row['frequency'] == '0+1+1' ? 'selected' : '' }}>0+1+1</option>
                                                            <option value="1+1+0" {{ isset($row['frequency']) && $row['frequency'] == '1+1+0' ? 'selected' : '' }}>1+1+0</option>
                                                            <option value="1+1+1" {{ isset($row['frequency']) && $row['frequency'] == '1+1+1' ? 'selected' : '' }}>1+1+1</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" name="data[{{ $key }}][cost]" class="form-control cost" value="{{ $row['cost'] ?? '' }}"></td>
                                                    <td>
                                                        <select class="form-select timing" name="data[{{ $key }}][timing]">
                                                            @foreach(['Before meal', 'After meal', 'On Empty Stomach'] as $timing)
                                                                <option value="{{ $timing }}" {{ isset($row['timing']) && $row['timing'] == $timing ? 'selected' : '' }}>{{ $timing }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select antibiotic" name="data[{{ $key }}][antibiotic]">
                                                            @foreach(['Yes', 'No', 'Not Sure'] as $antibiotic)
                                                                <option value="{{ $antibiotic }}" {{ isset($row['antibiotic']) && $row['antibiotic'] == $antibiotic ? 'selected' : '' }}>{{ $antibiotic }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        
                                        </tbody>
                                        <tfoot class="table-light">
                                            <tr>
                                                <td colspan="9">
                                                    <button type="button" id="addRowMedicationSchedule" class="btn btn-secondary btn-label waves-effect waves-light">
                                                        <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-3"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-3"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>

                            @push('scripts')
                            <script>
                                $(document).ready(function() {
                                    var index = $('#medicationTable tbody tr').length + 1;
                                    if (index == 1) {
                                        addRowMedicationSchedule(index);
                                    }

                                    // Add Row button click event
                                    $('#addRowMedicationSchedule').click(function() {
                                        var index = $('#medicationTable tbody tr').length + 1;
                                        addRowMedicationSchedule(index);
                                    });

                                    function addRowMedicationSchedule(index) {
                                        var newRow = `<tr>
                                            <th scope="row">${index}</th>
                                            <td>
                                                <select class="form-select" name="data[${index}][mast_equipment_id]">
                                                    <option value="">--Select--</option>
                                                    @foreach($equipments as $equipment)
                                                    <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="data[${index}][full_name]" class="form-control"></td>
                                            <td>
                                                <select class="form-select" name="data[${index}][mast_power_id]">
                                                    @foreach($powers as $power)
                                                    <option value="{{ $power->id }}">{{ $power->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[${index}][duration]">
                                                    <option value="">--Select--</option>
                                                    @foreach(['3 Days', '7 Days', '10 Days', '14 Days', '21 Days', '28 Days', '1 Month', '2 Months', '3 Months', '6 Months', 'Extensive (Undecided)'] as $duration)
                                                        <option value="{{ $duration }}">{{ $duration }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[${index}][frequency]">
                                                    <option value="">-- Select --</option>
                                                    <option value="0+0+1">0+0+1</option>
                                                    <option value="0+1+0">0+1+0</option>
                                                    <option value="1+0+0">1+0+0</option>
                                                    <option value="1+0+1">1+0+1</option>
                                                    <option value="0+1+1">0+1+1</option>
                                                    <option value="1+1+0">1+1+0</option>
                                                    <option value="1+1+1">1+1+1</option>
                                                </select>
                                                <!-- Bootstrap Modal for Data Input -->
                                                <div class="modal fade" id="dataModal${index}" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="dataModalLabel">Enter intended medication intake time</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3 morningInput${index}">
                                                                    <label for="morning${index}" class="form-label">Morning:</label>
                                                                    <input type="time" class="form-control" id="morning${index}" name="data[${index}][morning]">
                                                                </div>
                                                                <div class="mb-3 noonInput${index}">
                                                                    <label for="noon${index}" class="form-label">After Noon:</label>
                                                                    <input type="time" class="form-control" id="noon${index}" name="data[${index}][noon]">
                                                                </div>
                                                                <div class="mb-3 nightInput${index}">
                                                                    <label for="night${index}" class="form-label">Night:</label>
                                                                    <input type="time" class="form-control" id="night${index}" name="data[${index}][night]">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Save and Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><input type="number" name="data[${index}][cost]" class="form-control"></td>
                                            <td>
                                                <select class="form-select" name="data[${index}][timing]">
                                                    <option value="">--Select--</option>
                                                    @foreach(['Before meal', 'After meal', 'On Empty Stomach'] as $timing)
                                                        <option value="{{ $timing }}">{{ $timing }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[${index}][antibiotic]">
                                                    @foreach(['Yes', 'No', 'Not Sure'] as $antibiotic)
                                                        <option value="{{ $antibiotic }}">{{ $antibiotic }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                        </tr>`;

                                        $('#medicationTable tbody').append(newRow);

                                        handleFrequencyChange(index);
                                    }

                                    function handleFrequencyChange(index) {
                                        $('body').on('change', `select[name="data[${index}][frequency]"]`, function () {
                                            var selectedValue = $(this).val();
                                            var modalId = `#dataModal${index}`;
                                            if (selectedValue !== "") {
                                                $(modalId).modal('show');
                                                if (selectedValue == "0+0+1") {
                                                    $(`.morningInput${index}`).hide();
                                                    $(`.noonInput${index}`).hide();
                                                    $(`.nightInput${index}`).show();
                                                } else if (selectedValue == "0+1+0") {
                                                    $(`.morningInput${index}`).hide();
                                                    $(`.noonInput${index}`).show();
                                                    $(`.nightInput${index}`).hide();
                                                } else if (selectedValue == "1+0+0") {
                                                    $(`.morningInput${index}`).show();
                                                    $(`.noonInput${index}`).hide();
                                                    $(`.nightInput${index}`).hide();
                                                } else if (selectedValue == "1+0+1") {
                                                    $(`.morningInput${index}`).show();
                                                    $(`.noonInput${index}`).hide();
                                                    $(`.nightInput${index}`).show();
                                                } else if (selectedValue == "0+1+1") {
                                                    $(`.morningInput${index}`).hide();
                                                    $(`.noonInput${index}`).show();
                                                    $(`.nightInput${index}`).show();
                                                } else if (selectedValue == "1+1+0") {
                                                    $(`.morningInput${index}`).show();
                                                    $(`.noonInput${index}`).show();
                                                    $(`.nightInput${index}`).hide();
                                                } else if (selectedValue == "1+1+1") {
                                                    $(`.morningInput${index}`).show();
                                                    $(`.noonInput${index}`).show();
                                                    $(`.nightInput${index}`).show();
                                                }
                                            } else {
                                                $(modalId).modal('hide');
                                            }
                                        });

                                        $('body').on('click', '.saveDataModal', function () {
                                            var index = $(this).data('index');
                                            var modalId = `#dataModal${index}`;
                                            $(modalId).modal('hide');
                                        });
                                    }

                                    $('body').on('click', '.remove-row', function () {
                                        $(this).closest('tr').remove();
                                    });
                                });
                            </script>
                            @endpush
                        </div>
                    </div>
                </div>
            </div>

            <!--Surgical/Fixed Intervention(s)-->
            <div class="tab-content text-muted">
                <div class="tab-pane {{ Session::has('step4') ? 'active show' : '' }}" id="nav-border-step4" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                    
                            <form action="{{ route('surgical-intervention.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}">
                                <input type="hidden" value="{{ count($surgicalIntervention ?? []) > 0 ? '1' : '' }}" id="hasSurgicalIntervention">

                                <div class="table-responsive table-card">
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
                                            @if(isset($surgicalIntervention) && count($surgicalIntervention) > 0)
                                                @foreach ($surgicalIntervention as $key => $row)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <input type="hidden" name="data[{{ $key }}][id]" value="{{$row->id}}">
                                                        <td> 
                                                            <select class="form-select intervention" name="data[{{ $key }}][intervention]" disabled>
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
                                                            <select class="form-select due_time" name="data[{{ $key }}][due_time]" disabled>
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
                                                        <td><textarea name="data[{{ $key }}][details]" class="form-control details" rows="1" disabled>{{ $row->details }}</textarea></td>
                                                        <td><input type="date" name="data[{{ $key }}][date_line]" class="form-control date_line" value="{{ $row->date_line }}" disabled></td>
                                                        <td><input type="number" name="data[{{ $key }}][cost]" class="form-control cost" value="{{ $row->cost }}" disabled></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot class="table-light">
                                            <tr>
                                                <td colspan="6">
                                                    <button type="button" id="addRowSurgical" class="btn btn-secondary btn-label waves-effect waves-light">
                                                        <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                                    </button>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-4"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-4"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>

                            @push('scripts')
                            <script>
                                $(document).ready(function() {
                                    var index = $('#surgicalTable tbody tr').length + 1;
                                    if(index == 1){
                                        addRowSurgical(index);
                                    }

                                    // Add Row button click event
                                    $('#addRowSurgical').click(function() {
                                        var index = $('#surgicalTable tbody tr').length + 1;
                                        addRowSurgical(index);
                                    });

                                    // Function to add a new row
                                    function addRowSurgical(index) {
                                        var newRow = `<tr>
                                            <td>${index}</td>
                                            <td> 
                                                <select class="form-select" name="data[${index}][intervention]">
                                                    <option value="Prosthesis">Prosthesis</option>
                                                    <option value="Orthosis">Orthosis</option>
                                                    <option value="Surgery (Minor)">Surgery (Minor)</option>
                                                    <option value="Surgery (Major)">Surgery (Major)</option>
                                                    <option value="Stiches">Stiches</option>
                                                    <option value="Amputation">Amputation</option>
                                                    <option value="Dismembering">Dismembering</option>
                                                    <option value="Hearing Aid">Hearing Aid</option>
                                                    <option value="Plaster (Short Term)">Plaster (Short Term)</option>
                                                    <option value="Plaster (Long Term)">Plaster (Long Term)</option>
                                                    <option value="Nebulization">Nebulization</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[${index}][due_time]">
                                                    <option value="ASAP">ASAP</option>
                                                    <option value="Within 24 Hours">Within 24 Hours</option>
                                                    <option value="Within 2 Days">Within 2 Days</option>
                                                    <option value="Within 3 Days">Within 3 Days</option>
                                                    <option value="Within 4 Days">Within 4 Days</option>
                                                    <option value="Within 1 Week">Within 1 Week</option>
                                                    <option value="Within 10 Days">Within 10 Days</option>
                                                    <option value="Within 2 Weeks">Within 2 Weeks</option>
                                                    <option value="Within 3 Weeks">Within 3 Weeks</option>
                                                    <option value="Within 1 Month">Within 1 Month</option>
                                                    <option value="Within 2 Months">Within 2 Months</option>
                                                    <option value="Within 3 Months">Within 3 Months</option>
                                                    <option value="Within 4 Months">Within 4 Months</option>
                                                    <option value="Within 6 Months">Within 6 Months</option>
                                                    <option value="No time limit">No time limit</option>
                                                </select>
                                            </td>
                                            <td><textarea name="data[${index}][details]" class="form-control" rows="1"></textarea></td>
                                            <td><input type="date" name="data[${index}][date_line]" class="form-control"></td>
                                            <td><input type="number" name="data[${index}][cost]" class="form-control"></td>
                                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                        </tr>`;
                                        $('#surgicalTable tbody').append(newRow);
                                    }

                                    // Remove Row button click event
                                    $(document).on('click', '.remove-row', function() {
                                        $(this).closest('tr').remove();
                                        updateRowNumbers();
                                    });

                                    // Update row numbers function
                                    function updateRowNumbers() {
                                        $('#surgicalTable tbody tr').each(function(index) {
                                            $(this).find('td:first').text(index + 1);
                                        });
                                    }
                                });
                            </script>
                            @endpush

                        </div>
                    </div>
                </div>
            </div>

            <!--Optional Question(s) && Restriction(s)-->
            <div class="tab-content text-muted">
                <div class="tab-pane {{ Session::has('step5') ? 'active show' : '' }}" id="nav-border-step5" role="tabpanel">
                    
                    <div class="row">
                        <!-- Other Optional Question(s) -->
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Other Optional Question(s)</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('optional-questions.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $optionsalQuestion->id ?? '' }}" id="optionsalQuestionId">
                                        <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}">
                
                                        <div class="row mb-3">
                                            <div class="col-lg-9">
                                                <label for="admitted_following_diagnosis" class="form-label"><strong>1.</strong> Were you admitted in hospital/Clinic following the diagnosis?</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <select class="form-select" id="admitted_following_diagnosis" name="admitted_following_diagnosis">
                                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "No" ? 'selected' : '' }}>No</option>
                                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'selected' : '' }}>Yes</option>
                                                </select>                                
                                            </div>
                                        </div>
                
                                        <div class="row mb-3 admitted-following-diagnosis {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'd-flex' : '' }}">
                                            <div class="col-lg-9">
                                                <label for="hospitalization_duration" class="form-label"><strong>A.</strong> If the answer is yes for Q1, how long?</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <select class="form-select" id="hospitalization_duration" name="hospitalization_duration">
                                                    <option value="3 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "3 Days" ? 'selected' : '' }}>3 Days</option>
                                                    <option value="7 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "7 Days" ? 'selected' : '' }}>7 Days</option>
                                                    <option value="10 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "10 Days" ? 'selected' : '' }}>10 Days</option>
                                                    <option value="14 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "14 Days" ? 'selected' : '' }}>14 Days</option>
                                                    <option value="21 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "21 Days" ? 'selected' : '' }}>21 Days</option>
                                                    <option value="28 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "28 Days" ? 'selected' : '' }}>28 Days</option>
                                                    <option value="1 Month" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "1 Month" ? 'selected' : '' }}>1 Month</option>
                                                    <option value="2 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "2 Months" ? 'selected' : '' }}>2 Months</option>
                                                    <option value="3 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "3 Months" ? 'selected' : '' }}>3 Months</option>
                                                    <option value="6 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "6 Months" ? 'selected' : '' }}>6 Months</option>
                                                    <option value="Extensive (Undecided)" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "Extensive (Undecided)" ? 'selected' : '' }}>Extensive (Undecided)</option>
                                                </select>                                
                                            </div>
                                        </div>
                
                                        <div class="row mb-3 admitted-following-diagnosis {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'd-flex' : '' }}">
                                            <div class="col-lg-9">
                                                <label for="total_cost_incurred" class="form-label"><strong>B.</strong> Total Costs incurred during hospitalization</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="number" class="form-control" id="total_cost_incurred" name="total_cost_incurred" value="{{ isset($optionsalQuestion) ? $optionsalQuestion->total_cost_incurred : '' }}">
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-lg-9">
                                                <label for="medication_effectiveness" class="form-label"><strong>2.</strong> Did the medication and/or interventions cure the problem completely?</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <select class="form-select" id="medication_effectiveness" name="medication_effectiveness">
                                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'No' ? 'selected' : '' }}>No</option>
                                                    <option value="Not Sure" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Not Sure' ? 'selected' : '' }}>Not Sure</option>
                                                    <option value="Not Curable" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Not Curable' ? 'selected' : '' }}>Not Curable</option>
                                                    <option value="Long Term Intervention Required" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Long Term Intervention Required' ? 'selected' : '' }}>Long Term Intervention Required</option>
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-lg-9">
                                                <label for="satisfied_with_treatment" class="form-label"><strong>3.</strong> Are you satisfied with how you were treated (overall)?</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <select class="form-select" id="satisfied_with_treatment" name="satisfied_with_treatment">
                                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->satisfied_with_treatment == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->satisfied_with_treatment == 'No' ? 'selected' : '' }}>No</option>
                                                </select>                                
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-lg-9">
                                                <label for="recommend_physician" class="form-label"><strong>4.</strong> Would you recommend your physician/doctor to others?</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <select class="form-select" id="recommend_physician" name="recommend_physician">
                                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->recommend_physician == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->recommend_physician == 'No' ? 'selected' : '' }}>No</option>
                                                </select>                                
                                            </div>
                                        </div>
                
                                        <div class="card-footer d-flex justify-content-end">
                                            <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-5"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-5"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                
                        @push('scripts')
                        <script>
                            $(document).ready(function() {
                                // Function to update visibility and disable/enabled state based on admittedFollowing value
                                function updateFields(admittedFollowing) {
                                    if (admittedFollowing === 'No') {
                                        $('.admitted-following-diagnosis').removeClass('d-flex').hide();
                                        $('#hospitalization_duration, #total_cost_incurred').prop('disabled', true);
                                    } else {
                                        $('.admitted-following-diagnosis').addClass('d-flex').show();
                                        $('#hospitalization_duration, #total_cost_incurred').prop('disabled', false);
                                    }
                                }
                
                                // Initial check on document ready
                                var admittedFollowing = $('#admitted_following_diagnosis').val();
                                updateFields(admittedFollowing);
                
                                // Event handler for change on #admitted_following_diagnosis
                                $('#admitted_following_diagnosis').change(function() {
                                    var admittedFollowing = $(this).val();
                                    updateFields(admittedFollowing);
                                });
                            });
                
                        </script>
                        @endpush
                
                        <!-- Restriction(s) if any -->
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Restriction(s) if any</h4>
                                </div>
                                <div class="card-body">
                                    <form id="restrictionForm" action="{{ route('restriction.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="case_registry_id" value="{{ $caseRegistry->id ?? '' }}">
                                        <input type="hidden" value="{{ count($restriction ?? []) > 0 ? '1' : '' }}" id="hasRestriction">

                                        <div class="table-responsive table-card">
                                            <table id="restrictionTable" class="table table-nowrap table-striped mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="width: 5%;">SL</th>
                                                        <th scope="col" style="width: 25%;">Type</th>
                                                        <th scope="col" style="width: 60%;">Details</th>
                                                        <th scope="col" style="width: 10%;">Action</th>
                                                    </tr>
                                                </thead>                                                
                                                <tbody>
                                                    @if(isset($restriction) && count($restriction) > 0)
                                                        @foreach ($restriction as $key => $row)
                                                            <tr>
                                                                <td>{{++$key }}</td>
                                                                <input type="hidden" name="data[{{ $key }}][id]" value="{{$row->id}}">
                                                                <td>
                                                                    <select name="data[{{$key}}][type]" id="restriction" class="form-control types" disabled>
                                                                        <option value="">-- Select --</option>
                                                                        <option value="Dietary" {{ isset($row) && $row->type == 'Dietary' ? 'selected' : '' }}>Dietary</option>
                                                                        <option value="Mobility" {{ isset($row) && $row->type == 'Mobility' ? 'selected' : '' }}>Mobility</option>
                                                                        <option value="Other(s)" {{ isset($row) && $row->type == 'Other(s)' ? 'selected' : '' }}>Other(s)</option>
                                                                        <option value="Cognitive" {{ isset($row) && $row->type == 'Cognitive' ? 'selected' : '' }}>Cognitive</option>
                                                                    </select>                                                                    
                                                                </td>
                                                                <td><textarea name="data[{{$key}}][details]" class="form-control details" rows="1" disabled>{{$row->details}}</textarea></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                                <tfoot class="table-light">
                                                    <tr>
                                                        <td colspan="3">
                                                            <button type="button" id="addRowRestriction" class="btn btn-secondary btn-label waves-effect waves-light">
                                                                <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                                            </button>
                                                        </td>
                                                        <td class="text-end">
                                                            <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-6"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-6"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                
                                    </form>
                                </div>
                            </div>
                        </div>
                
                        @push('scripts')
                        <script>
                            $(document).ready(function() {
                
                                var index = $('#restrictionTable tbody tr').length + 1;
                                if(index == 1){
                                    addRowRestriction(index);
                                }
                
                                // Add Row button click event
                                $('#addRowRestriction').click(function() {
                                    var index = $('#restrictionTable tbody tr').length + 1;
                                    addRowRestriction(index);
                                });
                
                                function addRowRestriction(index){
                                    var newRow = `<tr>
                                        <td>${index}</td>
                                        <td>
                                            <select name="data[${index}][type]" id="restriction" class="form-control" required>
                                                <option value="">-- Select --</option>
                                                <option value="Dietary">Dietary</option>
                                                <option value="Mobility">Mobility</option>
                                                <option value="Other(s)">Other(s)</option>
                                                <option value="Cognitive">Cognitive</option>
                                            </select>
                                        </td>
                                        <td><textarea name="data[${index}][details]" class="form-control" rows="1"></textarea></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>`;
                                    $('#restrictionTable tbody').append(newRow);
                                }
                
                                // Remove Row button click event
                                $(document).on('click', '.remove-row', function() {
                                    $(this).closest('tr').remove();
                                    updateRowNumbers();
                                });
                
                                // Update row numbers function
                                function updateRowNumbers() {
                                    $('#restrictionTable tbody tr').each(function(index) {
                                        $(this).find('td:first').text(index + 1);
                                    });
                                }
                            });
                        </script>
                        @endpush
                
                
                    </div>

                    
                </div>
            </div>

        </div>
    </div>



    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            function setupEditAndSave(step, idSelector, fields) {
                var id = $(idSelector).val();
                if (id === null || id === '') {
                    $('#save-btn-' + step).show();
                    $('#edit-btn-' + step).hide();
                } else {
                    $('#edit-btn-' + step).show();
                    $('#save-btn-' + step).hide();
                    fields.forEach(function(field) {
                        $(field).prop('disabled', true);
                    });
                }

                $('#edit-btn-' + step).on('click', function() {
                    $('#save-btn-' + step).show();
                    $('#edit-btn-' + step).hide();
                    fields.forEach(function(field) {
                        $(field).prop('disabled', false);
                    });
                });
            }
            setupEditAndSave(1, "#caseRegistryId", [
                '#date_of_primary_identification',
                '#date_of_first_visit',
                '#recurrence',
                '#duration',
                '#duration_unit',
                '#area_of_problem',
                '#type_of_ailment',
                '.mast_complaints',
                '#additional_complaints',
            ]);
            setupEditAndSave(2, "#treatmentProfileId", [
                '#treatmentProfileId',
                '#doctorName',
                '#designation',
                '#chamberAddress',
                '#lastVisitDate',
                '#fees',
                '#comments',
                '#diseaseDiagnosis',
                '#prescription',

                '.mast_test_id',
                '.type',
                '.mast_organ_id',
                '.comments',
                '.cost',
                '.lab',
                '.upload_tool',
            ]);
            setupEditAndSave(3, "#hasMedicationSchedule", [
                '.mast_equipment_id',
                '.full_name',
                '.mast_power_id',
                '.duration',
                '.frequency',
                '.cost',
                '.timing',
                '.antibiotic',
            ]);
            setupEditAndSave(4, "#hasSurgicalIntervention", [
                '.intervention',
                '.due_time',
                '.details',
                '.cost',
                '.date_line',
            ]);
            setupEditAndSave(5, "#optionsalQuestionId", [
                '#admitted_following_diagnosis',
                '#hospitalization_duration',
                '#total_cost_incurred',
                '#medication_effectiveness',
                '#satisfied_with_treatment',
                '#recommend_physician',
            ]);
            setupEditAndSave(6, "#hasRestriction", [
                '.types',
                '.details',
            ]);
        });
    </script>
    @endpush

</x-app-layout>