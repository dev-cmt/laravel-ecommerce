<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" id="" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step2') || Session::has('step3') ? '' : 'active' }} " id="section1" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab" aria-selected="false">
                                <i class="ri-home-5-line align-middle me-1"></i> Section 01 (EPI)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step2') ? 'active' : '' }}" id="section2" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab" aria-selected="false">
                                <i class="ri-user-line me-1 align-middle"></i> Section 02 (Covid-19)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step3') ? 'active' : '' }}" id="section3" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Section 03 (Paid Ones)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane {{ Session::has('step2') || Session::has('step3') ? '' : 'active show' }}" id="nav-border-justified-home" role="tabpanel">
                            <!--Grid Data-->
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Section-01-EPI  VPD (Vaccination for Preventable Diseases)</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ri-add-line align-middle me-1"></i> Add Vaccination
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
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
                                            @foreach($vaccinationRecords as $row)
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
                                                            <a href="{{ route('vaccination.download', $row->id) }}" class="btn btn-soft-info btn-sm {{$row->upload_tool ?? 'd-none'}}">
                                                                <i class="ri-file-list-3-line align-middle"></i> Download File
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane {{ Session::has('step2') ? 'active show' : '' }}" id="nav-border-justified-profile" role="tabpanel">
                            <!--Grid Data-->
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Section-02 (Covid-19)</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalcovid">
                                        <i class="ri-add-line align-middle me-1"></i> Add Vaccination
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="table-responsive table-card">
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
                                                    @foreach($coviddata as $row)
                                                        <tr>
                                                            <td>{{$row->dose_type}}</td>
                                                            <td>{{$row->manufacturer}}</td>
                                                            <td>{{$row->location}}</td>
                                                            <td>{{$row->date}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            <table class="table table-nowrap table-striped mt-4">
                                                @if ($covidcirtificate && $covidcirtificate->patient_id == Auth::user()->id)
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Certificate No</th>
                                                        <th scope="col">Document</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $covidcirtificate->certificate_number }}</td>
                                                        <td>
                                                            @php
                                                                $filePath = $covidcirtificate->upload_tool;
                                                                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                                                $fileType = '';

                                                                switch(strtolower($extension)) {
                                                                    case 'pdf':
                                                                        $fileType = 'PDF File';
                                                                        break;
                                                                    case 'doc':
                                                                    case 'docx':
                                                                        $fileType = 'Word File';
                                                                        break;
                                                                    case 'jpg':
                                                                    case 'jpeg':
                                                                    case 'png':
                                                                        $fileType = 'JPG File';
                                                                        break;
                                                                    default:
                                                                        $fileType = 'Unknown File Type';
                                                                }
                                                            @endphp

                                                            <span>{{ $fileType }}</span>
                                                            {{-- <img src="{{ asset('public/' . $covidcirtificate->upload_tool) }}" width="60"> --}}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('covid_file_download') }}" class="btn btn-success">
                                                                <i class="ri-download-2-line align-bottom me-1"></i> Download
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">
                                        <form action="{{route('covid-certificate.upload')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if (empty($covidcirtificate) || empty($covidcirtificate->certificate_number))
                                                <div class="row mb-2" id="certificateDiv">
                                                    <label class="form-label mb-2">Certificate No :</label>
                                                    <input type="text" name="certificateNo" id="certificateNo" value="" class="form-control mb-2">
                                                </div>
                                            @endif
                                            <div>
                                                <input type="file" name="upload_tool" id="upload_tool" class="form-control mb-2"  accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" >
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">File Upload</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane {{ Session::has('step3') ? 'active show' : '' }}" id="nav-border-justified-messages" role="tabpanel">

                            <!--Grid Data-->
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Section-03 (Paid Ones)</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ri-add-line align-middle me-1"></i> Add Vaccination
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
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
                                            @foreach($vaccinationsectionthree as $row)
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
                                                    <td>
                                                        <a href="{{route('vaccination.download',$row->id)}}" class="btn btn-soft-info btn-sm">
                                                            <i class="ri-file-list-3-line align-middle"></i> Download File
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- Modal open Section 1, 3 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Vaccine Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('vaccinations.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="hiddenid" name="hidden_section" style="display:none">
                        <div class="row mt-2" id="vaccinefield">
                            <label for="" class="col-md-6">Vaccine Name</label>
                            <div class="col-md-6">
                                <select name="vaccine_name" id="vaccine_name" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="BCG">BCG</option>
                                    <option value="Pentavalent">Pentavalent</option>
                                    <option value="HepB">HepB</option>
                                    <option value="HiB">HiB</option>
                                    <option value="MR">MR</option>
                                    <option value="PCV">PCV</option>
                                    <option value="IPV">IPV</option>
                                    <option value="fiPV">fiPV</option>
                                    <option value="T-d">T-d</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2" id="marketName" style="display: none">
                            <label for="" class="col-md-6">Market Name</label>
                            <div class="col-md-6">
                                <select name="market_name" id="market_name" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="InfluVax Tetra">InfluVax Tetra</option>
                                    <option value="Rabix-Vc">Rabix-Vc</option>
                                    <option value="IngoVax ACWY">IngoVax ACWY</option>
                                    <option value="Hepa B">Hepa B</option>
                                    <option value="Vaxphoid">Vaxphoid</option>
                                    <option value="Vaxitet">Vaxitet</option>
                                    <option value="PrevaHav">PrevaHav</option>
                                    <option value="ChloVax">ChloVax</option>
                                    <option value="PapiloVax">PapiloVax</option>
                                    <option value="Varizost">Varizost</option>
                                    <option value="PrenoVax 23">PrenoVax 23</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2" id="applicablefor" style="display: none">
                            <label for="" class="col-md-6">Applicable for</label>
                            <div class="col-md-6">
                                <select name="applicable_name" id="applicable_name" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Flu/Influenza">Flu/Influenza</option>
                                    <option value="Rabies">Rabies</option>
                                    <option value="Meningitis">Meningitis</option>
                                    <option value="Hepatitis B">Hepatitis B</option>
                                    <option value="Typhoid">Typhoid</option>
                                    <option value="Tetanus">Tetanus</option>
                                    <option value="Hepatitis A">Hepatitis A</option>
                                    <option value="Cholera">Cholera</option>
                                    <option value="Cervical Cancer">Cervical Cancer</option>
                                    <option value="Chicken Pox">Chicken Pox</option>
                                    <option value="Pneumonia">Pneumonia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose01" class="col-md-6">Dose 01</label>
                            <div class="col-md-6">
                                <input type="date" name="doseone" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose02" class="col-md-6">Dose 02</label>
                            <div class="col-md-6">
                                <input type="date" name="dosetwo" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose03" class="col-md-6">Dose 03</label>
                            <div class="col-md-6">
                                <input type="date" name="dosethree" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose03" class="col-md-6">Dose 04</label>
                            <div class="col-md-6">
                                <input type="date" name="dosetfour" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose03" class="col-md-6">Dose 05</label>
                            <div class="col-md-6">
                                <input type="date" name="dosefive" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="booster" class="col-md-6">Booster</label>
                            <div class="col-md-6">
                                <input type="date" name="booster" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="file" class="col-md-6">Upload file</label>
                            <div class="col-md-6">
                                <input type="file" name="upload_tool" id="upload_tool" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal open Section 2-->
    <div class="modal fade" id="exampleModalcovid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Covid-19 Vaccination Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('covid-vaccine.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Dose Name</label>
                            <div class="col-md-8">
                                <select name="vaccine_name" id="dose_name" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="Dose 01">Dose 01</option>
                                    <option value="Dose 02">Dose 02</option>
                                    <option value="Dose 03">Dose 03</option>
                                    <option value="Dose 04">Dose 04</option>
                                    <option value="Dose 05">Dose 05</option>
                                    <option value="Booster">Booster</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="manufacturer" class="col-md-4">Manufacturer</label>
                            <div class="col-md-8">
                                <select name="manufacturer" id="manufacturer" class="form-control" required>
                                    <option value="">-- Select Vaccine --</option>
                                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                                    <option value="Moderna">Moderna</option>
                                    <option value="Janssen">Janssen</option>
                                    <option value="AstraZeneca/Covishield">AstraZeneca/Covishield</option>
                                    <option value="SinoFarm/Verocel">SinoFarm/Verocel</option>
                                    <option value="Sputnik V">Sputnik V</option>
                                    <option value="Covaxin">Covaxin</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="location" class="col-md-4">Location</label>
                            <div class="col-md-8">
                                <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="location" class="col-md-4">Date</label>
                            <div class="col-md-8">
                                <input type="date" name="date" id="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
<script>
      window.onload = function() {
        document.getElementById('hiddenid').value = 'section one';
        document.getElementById('tableone').value = 'section one';
    };

    document.getElementById('section1').addEventListener('click', function () {
        document.getElementById('vaccinefield').style.display = 'flex';
        document.getElementById('marketName').style.display = 'none';
        document.getElementById('applicablefor').style.display = 'none';
        document.getElementById('hiddenid').value = 'section one';
        document.getElementById('tableone').value = 'section one';
    });

    document.getElementById('section3').addEventListener('click', function () {
        document.getElementById('vaccinefield').style.display = 'none';
        document.getElementById('marketName').style.display = 'flex';
        document.getElementById('applicablefor').style.display = 'flex';
        document.getElementById('hiddenid').value = 'section three';
        document.getElementById('tableone').value = 'section three';

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const savedVaccines = @json($savedVaccines);
        const selectElement = document.getElementById('vaccine_name');

        savedVaccines.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const validdataforcovid = @json($validdataforcovid);
        const selectElement = document.getElementById('dose_name');

        validdataforcovid.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const marketName = @json($marketName);
        const selectElement = document.getElementById('market_name');

        marketName.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const applicableFor = @json($applicableFor);
        const selectElement = document.getElementById('applicable_name');

        applicableFor.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });
</script>




