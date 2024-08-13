<x-app-layout>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!--Grid Data-->
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Case(s) Registration List</h4>
                    <div class="flex-shrink-0">
                        <a href="{{route('info-cases-from')}}" class="btn btn-sm btn-success">
                            <i class="ri-add-line align-middle me-1"></i> Add New Case
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Case Name</th>
                                    <th scope="col">Area Of Problem</th>
                                    <th scope="col">First Visit</th>
                                    <th scope="col">Duration of Suffering</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>Case {{$loop->iteration}}</td>
                                        <td>{{$row->area_of_problem}}</td>
                                        <td>{{$row->date_of_first_visit}}</td>
                                        <td>{{$row->duration}} {{$row->duration_unit}}</td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a href="{{route('info-cases.edit', $row->id)}}" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                                <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </div>
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

</x-app-layout>