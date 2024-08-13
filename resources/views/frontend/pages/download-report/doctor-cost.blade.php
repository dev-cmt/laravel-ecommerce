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
    <h2>Doctor Cost Report</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="row mb-2">
                <label class="form-label col-5"><strong>Patient ID</strong></label>
                <label class="form-label col-1"><strong>:</strong></label>
                <label class="form-label col-6">{{$user->unique_patient_id ?? ''}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-2">
                <label class="form-label col-5"><strong>Full Name</strong></label>
                <label class="form-label col-1"><strong>:</strong></label>
                <label class="form-label col-6">{{$user->name ?? ''}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-2">
                <label class="form-label col-5"><strong>Contact</strong></label>
                <label class="form-label col-1"><strong>:</strong></label>
                <label class="form-label col-6">{{$generalProfile->emergency_contact ?? ''}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-2">
                <label class="form-label col-5"><strong>Email</strong></label>
                <label class="form-label col-1"><strong>:</strong></label>
                <label class="form-label col-6">{{$user->email ?? ''}}</label>
            </div>
        </div>
    </div>

    @foreach ($doctorAppointmentList as $doctorAppointment)
        <br><br><hr>
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-2">
                    <label class="form-label col-5"><strong>Doctor Full Name</strong></label>
                    <label class="form-label col-1"><strong>:</strong></label>
                    <label class="form-label col-6">{{$doctorAppointment->full_name ?? ''}}</label>
                </div>
            </div>
            <br>
            <div class="col-12">
                <table id="items-table" class="table table-nowrap table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Appointment(s)</th>
                            <th scope="col">Date</th>
                            <th scope="col">Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctorAppointment->appointmentDetails as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->appointment}}</td>
                                <td>{{$row->time_date_tool}}</td>
                                <td class="right-align">{{$row->fee}}</td> <!-- Applied right-align class -->
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="align"><strong>Total:</strong></td>
                            <td class="total"><strong>{{ $totalFee }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    <div class="footer">
        <p>Printed on: {{ date('Y-m-d') }}</p>
    </div>
</body>
</html>
