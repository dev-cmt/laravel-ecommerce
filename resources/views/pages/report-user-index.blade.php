<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Reports List </h4>
                </div>
            </div>
        </div>
        
        <!-- Item 1-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Complete Health Profile </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a> --}}
                        <a href="{{route('complete-profile.report', $userId)}}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 2-->
        {{-- <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Disease Specific Report </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Item 3-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Physicians/Doctors visited </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-visit.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 4-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Medicines Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('medicine-list.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 5-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Antibiotics Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('antibiotic-cost.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 6-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tests Done </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('test-done.report', $userId) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 7-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Doctor Consultation Cost</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-cost.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 8-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pathological Examinations Cost</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pathological.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 9-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Medicines Consumed Cost </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-medicines-consumed.report', $userId) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 10-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Surgical Interventions Cost </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-surgical-medicine.report', $userId) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <!-- Item 11-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost Per Year</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-per-year.report', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 12-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost Per Month </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-per-month.report', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 14, 15, 16-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Years Record</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 2 years
                        </a>
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 3 years
                        </a>
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 5 years
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 17-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Vaccination Record </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('vaccination-record.report', Auth::user()->id) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>