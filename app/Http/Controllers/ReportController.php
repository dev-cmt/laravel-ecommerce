<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Information\GeneralProfile;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\SensitiveInformation;
use App\Models\Information\OtherPersonalInformation;
use App\Models\Information\CaseRegistry;
use App\Models\Information\MedicationSchedule;
use App\Models\Information\LabTest;
use App\Models\Information\SurgicalIntervention;
use App\Models\Information\BloodPressureProfiling;
use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\Vaccination;
use App\Models\Information\DoctorAppointment;
use App\Models\Information\DoctorAppointmentDetails;
use App\Models\Information\VaccinationCovid;
use PDF;

class ReportController extends Controller
{
    public function reportUserIndex()
    {
        $userId = Auth::user()->id;
        return view('pages.report-user-index', compact('userId'));
    }

    // Report => 1
    public function completeProfile()
    {
        $user = Auth::user();

        if ($user) {
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
            $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
            $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
            //---GET Data (casesEdit)
            $caseRegistryList = CaseRegistry::where('patient_id', $user->id)->get();

            $sugarData = BloodSugarProfiling::where('patient_id', Auth::user()->id)->get();
            $pressureData = BloodPressureProfiling::where('patient_id', Auth::user()->id)->get();

            $vaccination = Vaccination::where('patient_id', $user->id)->get();
            $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
            $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->get();
        }

        $pdf = PDF::loadView('pages.download-report.complete-profile', compact(
        // return view('pages.download-report.complete-profile', compact(
            'user',
            'generalProfile',
            'sensitiveInformation',
            'geneticDiseaseProfile',
            'otherPersonalInformation',

            'caseRegistryList',

            'sugarData',
            'pressureData',
            'vaccination',
            'covidData',
            'doctorAppointmentList'
        // ));
        ))->setPaper('a4', 'portrait');
        return $pdf->download('Complete-profile.pdf');
    }


    // Report => 3
    public function doctorVisit(){

        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->get();
            //    dd($doctorAppointmentList);

            $pdf = PDF::loadView('pages.download-report.doctor-visit', compact('doctorAppointmentList','user','generalProfile'))->setPaper('a4', 'portrait');
            return $pdf->download('Doctor-visit.pdf');
        }

    }

    // Report => 4
    public function medicineDownload() {

        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $medicine = MedicationSchedule::
                with('patient', 'power', 'equipment')
                ->orderBy('id', 'asc')
                ->get();
                // dd($medicine);

                $pdf = PDF::loadView('pages.download-report.medicine-details', compact('medicine', 'user','generalProfile'))
                ->setPaper('a4', 'portrait');

            return $pdf->download('Medicines-Used.pdf');
        }
    }


    // Report => 5
    public function antibioticDownload(Request $request) {
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $antibiotic = MedicationSchedule::where('id', $user->id)->with('patient', 'power', 'equipment')
                    ->where('antibiotic', 'Yes')
                    ->orderBy('id', 'asc')
                    ->get();

                    // dd($antibiotic);

        if ($antibiotic->isEmpty()) {
            return response()->json(['message' => 'No medicines found where antibiotic is Yes.'], 404);
        }
        $pdf = PDF::loadView('pages.download-report.antibiotic-details', compact('antibiotic','user','generalProfile'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
        }

    }

    // Report => 6
    public function testDownload(Request $request)
    {
        $user = Auth::user();
        if($user){

            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $testDone = LabTest::where('id', $user->id)->with('treatmentProfile', 'mastTest', 'mastOrgan')->get();

            // dd($testDone);
            $pdf = PDF::loadView('pages.download-report.test-done-details', compact('testDone','user','generalProfile'))->setPaper('a4', 'portrait');
            return $pdf->download('Tests-Done.pdf');
        }

    }

    // Report => 7
    public function doctorCost(Request $request){
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->with('appointmentDetails')->get();

            $totalFee = $doctorAppointmentList->sum(function ($appointment) {
                return $appointment->appointmentDetails->sum('fee');
            });

            $pdf = PDF::loadView('pages.download-report.doctor-cost', compact('doctorAppointmentList', 'totalFee','user','generalProfile'))->setPaper('a4', 'portrait');
            return $pdf->download('Doctor-Cost-Report.pdf');
        }
    }


    // Report => 8
    public function pathoLogical(Request $request){
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $pathologi = LabTest::where('id', $user->id)->with('treatmentProfile', 'mastTest', 'mastOrgan')->get();

            $totalFee = $pathologi->sum(function ($cost) {
                return $cost->cost;
            });
            $pdf = PDF::loadView('pages.download-report.pathologi-cost', compact('pathologi','totalFee','generalProfile','user'))->setPaper('a4', 'portrait');
            return $pdf->download('Medicines-Used.pdf');
        }

    }

    // Report => 9
    public function costMedicinesConsumed(Request $request){
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $consume = MedicationSchedule::where('id', $user->id)->with('equipment', 'power', 'patient')->orderBy('id','asc')->get();

            $totalFee = $consume->sum(function ($cost) {
                return $cost->cost;
            });
            $pdf = PDF::loadView('pages.download-report.consume-cost', compact('consume','totalFee','user','generalProfile'))->setPaper('a4', 'portrait');
            return $pdf->download('Medicines-Used.pdf');
        }

    }

    // Report => 10
    public function costSurgicalMedicine(Request $request){
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $surgical = SurgicalIntervention::where('id', $user->id)->orderBy('id','asc')->get();

            $totalFee = $surgical->sum(function ($cost) {
                return $cost->cost;
            });
            $pdf = PDF::loadView('pages.download-report.surgical-cost', compact('surgical','totalFee','generalProfile','user'))->setPaper('a4', 'portrait');
            return $pdf->download('Medicines-Used.pdf');
        }

    }

    // Report => 11
    public function totalCost() {

        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $totalCost = [
                'doctorCost' => DoctorAppointmentDetails::where('id', Auth::user()->id)->sum('fee'),
                'pathoLogical' => LabTest::where('id', Auth::user()->id)->sum('cost'),
                'consumeCost' => MedicationSchedule::where('id', Auth::user()->id)->sum('cost'),
                'surgicalCost' => SurgicalIntervention::where('id', Auth::user()->id)->sum('cost')
            ];
            $pdf = PDF::loadView('pages.download-report.total-cost', compact('totalCost','generalProfile','user'))->setPaper('a4', 'portrait');
            return $pdf->download('Medicines-Used.pdf');
        }

    }

    // Report => 12
    public function perMonth() {
        $user = Auth::user();
        if($user){
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();

            // Calculate monthly costs
            $monthlyCost = [
                'doctorCost' => number_format(DoctorAppointmentDetails::where('id', $user->id)->sum('fee') / 12, 2),
                'pathoLogical' => number_format(LabTest::where('id', $user->id)->sum('cost') / 12, 2),
                'consumeCost' => number_format(MedicationSchedule::where('id', $user->id)->sum('cost') / 12, 2),
                'surgicalCost' => number_format(SurgicalIntervention::where('id', $user->id)->sum('cost') / 12, 2)
            ];

            // Load view and generate PDF
            $pdf = PDF::loadView('pages.download-report.per-month-cost', compact('monthlyCost', 'user', 'generalProfile'))->setPaper('a4', 'portrait');
            return $pdf->download('Monthly-Cost-Report.pdf');
        }
    }


    // Report => 14, 15, 16
    public function yearsRecord()
    {
        $user = Auth::user();

        if ($user) {
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
            $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
            $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
            //---GET Data (casesEdit)
            $caseRegistryList = CaseRegistry::where('patient_id', $user->id)->get();

            $sugarData = BloodSugarProfiling::where('patient_id', Auth::user()->id)->get();
            $pressureData = BloodPressureProfiling::where('patient_id', Auth::user()->id)->get();

            $vaccination = Vaccination::where('patient_id', $user->id)->get();
            $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
            $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->get();
        }

        $pdf = PDF::loadView('pages.download-report.years-report', compact(
        // return view('pages.download-report.complete-profile', compact(
            'user',
            'generalProfile',
            'sensitiveInformation',
            'geneticDiseaseProfile',
            'otherPersonalInformation',

            'caseRegistryList',

            'sugarData',
            'pressureData',
            'vaccination',
            'covidData',
            'doctorAppointmentList'
        // ));
        ))->setPaper('a4', 'portrait');
        return $pdf->download('Years-record.pdf');
    }
    // Report => 17
    public function vaccinationRecord() {
        $user = Auth::user();

        if ($user) {
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $vaccination = Vaccination::where('patient_id', $user->id)->get();
            $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
        } else {
            return redirect()->back()->withErrors('User not authenticated.');
        }
        $pdf = PDF::loadView('pages.download-report.vaccination-record', compact('user', 'vaccination', 'covidData','generalProfile'))->setPaper('a4', 'portrait');
        return $pdf->download('Vaccination-Record.pdf');
    }



}
