<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

use App\Models\Master\MastComplaint;
use App\Models\Master\MastTest;
use App\Models\Master\MastOrgan;
use App\Models\Master\MastEquipment;
use App\Models\Master\MastPower;
use App\Models\Master\MastNationality;
use App\Models\User;

use App\Models\Information\GeneralProfile;
use App\Models\Information\SensitiveInformation;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\OtherPersonalInformation;

use App\Models\Information\CaseRegistry;

use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\BloodPressureProfiling;
use App\Models\Information\Vaccination;
use App\Models\Information\VaccinationCovid;
use App\Models\Information\CovidCertificate;
use App\Models\Information\RandomUploaderTool;
use App\Models\Information\TreatmentProfile;
use App\Models\Information\LabTest;
use App\Models\Information\MedicationSchedule;
use App\Models\Information\SurgicalIntervention;
use App\Models\Information\OptionsalQuestion;
use App\Models\Information\Restriction;

use App\Models\Information\DoctorAppointment;
use App\Models\Information\DoctorAppointmentDetails;
use Exception;
use Carbon\Carbon;

class PatientController extends Controller
{
    public static $file, $fileName, $subfolder, $fileUrl, $directory, $update;

    public static function uploadImage($file, $subfolder, $update = null)
    {
        if ($file) {
            // Delete existing file if $update is provided and has a file path
            if ($update && $update->file) {
                $oldFilePath = public_path($update->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Move the uploaded file to the desired directory
            $fileName = $file->getClientOriginalName();
            $userId = auth()->user()->id;
            $directory = public_path("document/{$userId}/{$subfolder}/");

            // Ensure the directory exists; create if it doesn't
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $file->move($directory, $fileName);
            $fileUrl = "document/{$userId}/{$subfolder}/{$fileName}";
        } else {
            $fileUrl = $update ? $update->file : null;
        }

        return $fileUrl;
    }


    public function generalProfile()
    {
        $nationalities = MastNationality::all();

        $user = Auth::user();
        $generalProfile = null;
        $sensitiveInformation = null;
        $geneticDiseaseProfile = null;
        $otherPersonalInformation = null;

        if ($user) {
            $generalProfile = GeneralProfile::where('patient_id', $user->id)->first();
            $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
            $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
            $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
        }
        return view('pages.info-general', compact('nationalities', 'user', 'generalProfile', 'sensitiveInformation', 'geneticDiseaseProfile', 'otherPersonalInformation'));
    }
    /**-----------------------
     * Store Patient Registry
     */
    public function patientRegistry(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'age' => 'required|integer|min:0',
            'dob' => 'required|date_format:d-m-Y',
            'religion' => 'required|string|max:255',
            'height_feet' => 'required|numeric|min:0',
            'height_inches' => 'nullable|numeric|min:0',
            'weight_kg' => 'required|numeric|min:0',
            'weight_pounds' => 'nullable|numeric|min:0',
            'bmi' => 'nullable|numeric|min:0',
            'emergency_contact' => 'required|string|max:255',
            'mast_nationality_id' => 'required',
            'address' => 'nullable|string',
        ]);

        // Convert dob to Y-m-d format before saving
        $validatedData['dob'] = Carbon::createFromFormat('d-m-Y', $validatedData['dob'])->format('Y-m-d');


        // Add the authenticated user's ID as patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            GeneralProfile::where('id', $request->id)->update($validatedData);
        } else {
            // Create new record
            GeneralProfile::create($validatedData);
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'General Profile created successfully.', 'step1' => '1']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save General Profile. Please try again.', 'step1' => '1'])->withInput();
        }
    }
    

    /**------------------------------
     * Store => sensitive_information
     */
    public function sensitiveInformation(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'sexually_active' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'diabetic' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'allergies' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'allergy_details' => 'nullable|string',
            'thyroid' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'thyroid_details' => 'nullable|string',
            'hypertension' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'cholesterol' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'cholesterol_details' => 'nullable|string',
            's_creatinine' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            's_creatinine_details' => 'nullable|string',
            'smoking' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'smoking_details' => 'nullable|string',
            'alcohol_intake' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'alcohol_intake_details' => 'nullable|string',
            'drug_abuse_history' => 'required|in:Yes,No,Do Not Know,Unwilling to Disclose',
            'drug_abuse_details' => 'nullable|string',
        ]);

        // Add the authenticated user's ID as patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            SensitiveInformation::where('id', $request->id)->update($validatedData);
        } else {
            // Create new record
            SensitiveInformation::create($validatedData);
        }
        
        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Sensitive information saved successfully.', 'step2' => '2']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Sensitive information. Please try again.', 'step2' => '2'])->withInput();
        }
    }
    /**---------------------------------
     * Store => genetic_disease_profiles
     */
    public function geneticDiseaseProfile(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'disease_diabetes' => 'boolean',
            'disease_stroke' => 'boolean',
            'disease_heart' => 'boolean',
            'disease_hyper' => 'boolean',
            'disease_pressure' => 'boolean',
            'disease_balding' => 'boolean',
            'disease_vitiligo' => 'boolean',
            'disease_disability' => 'boolean',
            'disease_psoriasis' => 'boolean',
            'disease_eczema' => 'boolean',
            'additional_comments' => 'nullable|string',
        ]);

        // Assuming you have authenticated user and patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            GeneticDiseaseProfile::where('id', $request->id)->update($validatedData);
        } else {
            // Create new record
            GeneticDiseaseProfile::create($validatedData);
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Genetic disease profile saved successfully.', 'step3' => '3']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Genetic disease. Please try again.', 'step3' => '3'])->withInput();
        }
    }
    /**------------------------
     * Store => other_personal_information
     */
    public function otherPersonalInformation(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'marital_status' => 'nullable|in:Single,Married,Married with Kids,Divorced,Widowed,Unwilling to Disclose',
            'home_address' => 'nullable|string',
            'office_address' => 'nullable|string',
            'email_address' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'last_blood_donated' => 'nullable|date',
            'health_insurance_number' => 'nullable|string',
            'family_physician' => 'nullable|string',
            'physician_contact' => 'nullable|string',
            'pregnancy_status' => 'nullable|in:Yes,No',
            'menstrual_cycle' => 'nullable|in:Regular,Irregular,Menopaused',
            'activity_status' => 'nullable|in:Immobile/Paralyzed,Disabled,Not Very Active,Moderately Active,Highly Active',
            'remark' => 'nullable|string',
        ]);

        // Assuming you have authenticated user and patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Create and save the other personal information record
        OtherPersonalInformation::create($validatedData);

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Other personal information saved successfully.', 'step4' => '4']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Personal information. Please try again.', 'step4' => '4'])->withInput();
        }
    }


    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * CASES
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function casesList(){
        $data = CaseRegistry::where('patient_id', Auth::user()->id)->get();

        return view('pages.info-cases-list', compact('data'));
    }
    public function casesFrom()
    {
        //---Master
        $complaints = MastComplaint::all();
        $tests = MastTest::all();
        $organs = MastOrgan::all();
        $equipments = MastEquipment::all();
        $powers = MastPower::all();

       //---GET Data
        $caseRegistry = null;
        $treatmentProfile = null;
        $medicationSchedule = null;
        $surgicalIntervention = null;
        $optionsalQuestion = null;
        $restriction = null;

        return view('pages.info-cases-from', compact(
            'complaints', 
            'tests', 
            'organs', 
            'equipments', 
            'powers',

            'caseRegistry',
            'treatmentProfile',
            'medicationSchedule',
            'surgicalIntervention',
            'optionsalQuestion',
            'restriction',
        ));
    }
    public function casesEdit($id)
    {
        //---Master (casesEdit)
        // $complaints = MastComplaint::all();
        $tests = MastTest::all();
        $organs = MastOrgan::all();
        $equipments = MastEquipment::all();
        $powers = MastPower::all();

        //---GET Data (casesEdit)
        $caseRegistry = CaseRegistry::find($id);
        $treatmentProfile = $caseRegistry->treatmentProfile;
        $medicationSchedule = $caseRegistry->medicationSchedule;
        $surgicalIntervention = $caseRegistry->surgicalIntervention;
        $optionsalQuestion = $caseRegistry->optionsalQuestion;
        $restriction = $caseRegistry->restriction;

        $complaints = DB::select("
            SELECT m.id, m.name, 
                CASE WHEN c.mast_complaint_id IS NOT NULL THEN 1 ELSE 0 END AS chk 
            FROM mast_complaints m 
            LEFT JOIN case_complaints c 
                ON c.mast_complaint_id = m.id 
                AND c.case_registry_id = $id
        ");

        return view('pages.info-cases-from', compact(
            'complaints', 
            'tests', 
            'organs', 
            'equipments', 
            'powers',

            'caseRegistry',
            'treatmentProfile',
            'medicationSchedule',
            'surgicalIntervention',
            'restriction',
            'optionsalQuestion',
        ));
    }

    /**------------------------
     * Store => case_registries
     */
    public function caseRegistry(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_primary_identification' => 'nullable|date',
            'date_of_first_visit' => 'nullable|date',
            'recurrence' => 'nullable|string|max:255',
            'duration' => 'nullable|integer',
            'duration_unit' => 'nullable|string|max:10',
            'area_of_problem' => 'nullable|string|max:255',
            'type_of_ailment' => 'nullable|string|max:255',
            'additional_complaints' => 'nullable|string',
            'mast_complaints' => 'array',
            'mast_complaints.*' => 'integer|exists:mast_complaints,id',
        ]);

        if ($request->case_registry_id) {
            // Update existing record
            $caseRegistry = CaseRegistry::find($request->case_registry_id);
        } else {
            // Create new record
            $caseRegistry = new CaseRegistry();
        }

        $caseRegistry->patient_id = Auth::user()->id;
        $caseRegistry->date_of_primary_identification = $request->date_of_primary_identification;
        $caseRegistry->date_of_first_visit = $request->date_of_first_visit;
        $caseRegistry->recurrence = $request->recurrence;
        $caseRegistry->duration = $request->duration;
        $caseRegistry->duration_unit = $request->duration_unit;
        $caseRegistry->area_of_problem = $request->area_of_problem;
        $caseRegistry->type_of_ailment = $request->type_of_ailment;
        $caseRegistry->additional_complaints = $request->additional_complaints;
        $caseRegistry->save();

        if (isset($validatedData['mast_complaints'])) {
            $caseRegistry->complaints()->sync($validatedData['mast_complaints']);
        }

        // Save the user
        try {
            return redirect()->route('info-cases.edit', $caseRegistry->id)->with(['success' => 'Case registry successfully.', 'step1' => '1']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Case registry. Please try again.', 'step1' => '1'])->withInput();
        }
    }

    /**-----------------------------------------
     * Store => treatment_profiles OR lab_tests
     */
    public function treatmentLabTest(Request $request)
    {
        // Validate the request data
        $request->validate([
            'doctor_name' => 'nullable|string',
            'designation' => 'nullable|string',
            'chamber_address' => 'nullable|string',
            'last_visit_date' => 'nullable|date',
            'fees' => 'nullable|numeric',
            'comments' => 'nullable|string',
            'disease_diagnosis' => 'nullable|string',
            'prescription' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        if ($request->id) {
            // Update existing record
            $treatmentProfile = TreatmentProfile::find($request->id);
        } else {
            // Create new record
            $treatmentProfile = new TreatmentProfile();
        }

        $treatmentProfile->case_registry_id = $request->case_registry_id;
        $treatmentProfile->doctor_name = $request->doctor_name;
        $treatmentProfile->designation = $request->designation;
        $treatmentProfile->chamber_address = $request->chamber_address;
        $treatmentProfile->last_visit_date = $request->last_visit_date;
        $treatmentProfile->fees = $request->fees;
        $treatmentProfile->comments = $request->comments;
        $treatmentProfile->disease_diagnosis = $request->disease_diagnosis;

        if ($request->hasFile('prescription')) {
            $treatmentProfile->prescription = self::uploadImage($request->prescription, 'Prescription Uploader');
        } elseif ($treatmentProfile->exists) {
            $treatmentProfile->prescription = $treatmentProfile->getOriginal('prescription');
        } else {
            $treatmentProfile->prescription = null;
        }
        $treatmentProfile->save();
        
        if (!empty($request->data)) {
            foreach ($request->data as $item) {
                $labTestData = [
                    'mast_test_id' => $item['mast_test_id'],
                    'type' => $item['type'],
                    'mast_organ_id' => $item['mast_organ_id'],
                    'comments' => $item['comments'],
                    'cost' => $item['cost'],
                    'lab' => $item['lab'],
                    'treatment_profile_id' => $treatmentProfile->id,
                    'upload_tool' => !empty($item['upload_tool']) 
                                        ? self::uploadImage($item['upload_tool'], 'Lab Test Report') 
                                        : (isset($item['id']) ? optional(LabTest::find($item['id']))->getOriginal('upload_tool') : null),
                ];
        
                LabTest::updateOrCreate(['id' => $item['id'] ?? null], $labTestData);
            }
        }        

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Treatment profile and lab tests saved successfully!', 'step2' => '2']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Treatment profile. Please try again.', 'step2' => '2'])->withInput();
        }
    }



    public function downloadPrescription($id)
    {
        $data = TreatmentProfile::find($id);
        $file = public_path($data->prescription); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
    public function downloadLabtest($id)
    {
        $data = LabTest::find($id);
        $file = public_path($data->upload_tool); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }


    /**-----------------------------
     * Store => medication_schedules
     */
    public function medicationSchedule(Request $request)
    {
        if (!empty($request->data)) {
            foreach ($request->data as $item) {
                $medicationData = [
                    'case_registry_id' => $request->case_registry_id,
                    'mast_equipment_id' => $item['mast_equipment_id'],
                    'full_name' => $item['full_name'],
                    'mast_power_id' => $item['mast_power_id'],
                    'duration' => $item['duration'],
                    'frequency' => $item['frequency'],
                    'morning' => $item['morning'] ?? null,
                    'noon' => $item['noon'] ?? null,
                    'night' => $item['night'] ?? null,
                    'cost' => $item['cost'],
                    'timing' => $item['timing'],
                    'antibiotic' => $item['antibiotic'],
                ];

                MedicationSchedule::updateOrCreate(['id' => $item['id'] ?? null], $medicationData );
            }

            return redirect()->back()->with(['success' => 'Medication schedules saved successfully', 'step3' => '3']);
        } else {
            return redirect()->back()->with(['error' => 'No data received for medication schedules', 'step3' => '3'])->withInput();
        }
    }
    /**-----------------------------
     * Store => surgical_interventions
     */
    public function surgicalIntervention(Request $request)
    {
        foreach ($request->data as $item) {
            $surgicalInterventionData = [
                'case_registry_id' => $request->case_registry_id,
                'intervention' => $item['intervention'],
                'due_time' => $item['due_time'],
                'details' => $item['details'],
                'date_line' => $item['date_line'],
                'cost' => $item['cost'],
            ];
            SurgicalIntervention::updateOrCreate(['id' => $item['id'] ?? null], $surgicalInterventionData );
        }

        try {
            return redirect()->back()->with(['success' => 'Surgical interventions saved successfully', 'step4' => '4']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Surgical interventions. Please try again.', 'step4' => '4'])->withInput();
        }
    }

    /**-----------------------------
     * Store => surgical_interventions
     */
    public function optionsalQuestion(Request $request)
    {
        $data = [
            'case_registry_id' => $request->case_registry_id,
            'admitted_following_diagnosis' => $request->input('admitted_following_diagnosis'),
            'hospitalization_duration' => $request->input('hospitalization_duration'),
            'total_cost_incurred' => $request->input('total_cost_incurred'),
            'medication_effectiveness' => $request->input('medication_effectiveness'),
            'satisfied_with_treatment' => $request->input('satisfied_with_treatment'),
            'recommend_physician' => $request->input('recommend_physician'),
        ];
    
        if ($request->id) {
            // Update existing record
            $question = OptionsalQuestion::find($request->id);
            if (!$question) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            $question->update($data);
        } else {
            // Create new record
            OptionsalQuestion::create($data);
        }

        // Save
        try {
            return redirect()->back()->with(['success' => 'Optional questions saved successfully', 'step5' => '5']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Optional questions. Please try again.', 'step5' => '5'])->withInput();
        }
    }
    /**-----------------------------
     * Store => surgical_interventions
     */
    public function restriction(Request $request)
    {
        // Validate incoming requests
        $request->validate([
            'type.*' => 'nullable|string',
            'details.*' => 'nullable|string',
        ]);

        // Loop through submitted data and store in database
        foreach ($request->data as $item) {
            $restrictionData = [
                'case_registry_id' => $request->case_registry_id,
                'type' => $item['type'],
                'details' => $item['details'] ?? null,
            ];
            restriction::updateOrCreate(['id' => $item['id'] ?? null], $restrictionData );
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Restrictions saved successfully', 'step5' => '5']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Restrictions. Please try again.', 'step5' => '5'])->withInput();
        }
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * READING PROFILLING TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function profilingTool()
    {
        $sugarData = BloodSugarProfiling::where('patient_id', Auth::user()->id)->get();
        $pressureData = BloodPressureProfiling::where('patient_id', Auth::user()->id)->get();
        return view('pages.info-profiling-tool', compact('sugarData', 'pressureData'));
    }

    /**------------------------
     * Store => blood_sugar_profilings
     */
    public function bloodSugarProfiling(Request $request)
    {
        $validatedData = $request->validate([
            'time.*' => 'nullable|date_format:H:i',
            'reading.*' => 'nullable|numeric',
            'dietary_information.*' => 'nullable|string',
            'remark.*' => 'nullable|string',
            'additional_note.*' => 'nullable|string',
        ]);
        // dd($request->data);
        foreach ($request->data as $item) {
            $bloodSugarProfilingData = [
                'time' => $item['time'],
                'reading' => $item['reading'],
                'dietary_information' => $item['dietary_information'],
                'remark' => $item['remark'],
                'additional_note' => $item['additional_note'] ?? null,
                'patient_id' => Auth::user()->id,
            ];
            BloodSugarProfiling::updateOrCreate(['id' => $item['id'] ?? null], $bloodSugarProfilingData );
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Blood sugar data saved successfully', 'step1' => '1']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Blood sugar. Please try again.', 'step1' => '1'])->withInput();
        }
    }
    /**------------------------
     * Store => blood_pressure_profilings
     */
    public function bloodPressureProfiling(Request $request)
    {
        // Validate the incoming request data for blood pressure
        $validatedData = $request->validate([
            'time.*' => 'nullable',
            'systolic.*' => 'nullable|integer',
            'diastolic.*' => 'nullable|integer',
            'heart_rate_bpm.*' => 'nullable|integer',
            'additional_note.*' => 'nullable',
        ]);

        // Process each blood pressure reading and store in the database
        foreach ($request->data as $item) {
            $bloodPressureProfilingData = [
                'time' => $item['time'],
                'systolic' => $item['systolic'],
                'diastolic' => $item['diastolic'],
                'heart_rate_bpm' => $item['heart_rate_bpm'],
                'additional_note' => $item['additional_note'] ?? null,
                'patient_id' => Auth::user()->id,
            ];
            BloodPressureProfiling::updateOrCreate(['id' => $item['id'] ?? null], $bloodPressureProfilingData );
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Blood pressure data saved successfully', 'step2' => '2']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Blood pressure. Please try again.', 'step2' => '2'])->withInput();
        }
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * VACCINATION RECORD
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
    */
    public function vaccinationRecord(Request $request)
    {
        $vaccinationRecords = Vaccination::where('type','section one')->get();
        $vaccinationsectionthree = Vaccination::where('type','section three')->get();
        $user = Auth::user();
        $savedVaccines = Vaccination::where('patient_id', $user->id)->pluck('vaccine_name')->toArray();
        $marketName = Vaccination::where('patient_id', $user->id)->pluck('market_name')->toArray();
        $applicableFor = Vaccination::where('patient_id', $user->id)->pluck('applicable_for')->toArray();
        $coviddata = VaccinationCovid::where('patient_id', $user->id)->get();
        $validdataforcovid = VaccinationCovid::where('patient_id', $user->id)->pluck('dose_type')->toArray();
        $covidcirtificate = CovidCertificate::where('patient_id', $user->id)->first();
        return view('pages.info-vaccination-record', compact('vaccinationRecords', 'savedVaccines', 'marketName', 'applicableFor', 'coviddata','validdataforcovid','vaccinationsectionthree','covidcirtificate'));
    }

    public function vaccinationStore(Request $request)
    {
        if($request->hidden_section == 'section one')
        {
            $vaccinestore = new Vaccination;
            $vaccinestore->type = $request->hidden_section;
            $vaccinestore->vaccine_name = $request->vaccine_name;
            $vaccinestore->dose_01 = $request->doseone;
            $vaccinestore->dose_02 = $request->dosetwo;
            $vaccinestore->dose_03 = $request->dosethree;
            $vaccinestore->dose_04 = $request->dosetfour;
            $vaccinestore->dose_05 = $request->dosefive;
            $vaccinestore->booster = $request->booster;
            $vaccinestore->upload_tool = self::uploadImage($request->upload_tool, 'Vaccination');
            $vaccinestore->patient_id = Auth::user()->id;
            $vaccinestore->save();

            // Save the user
            try {
                return redirect()->back()->with(['success' => 'Vaccination data saved successfully', 'step1' => '1']);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => 'Failed to save Vaccination. Please try again.', 'step1' => '1'])->withInput();
            }
        }else{
            $vaccinestore = new Vaccination;
            $vaccinestore->type = $request->hidden_section;
            $vaccinestore->market_name = $request->market_name;
            $vaccinestore->applicable_for = $request->applicable_name;
            $vaccinestore->dose_01 = $request->doseone;
            $vaccinestore->dose_02 = $request->dosetwo;
            $vaccinestore->dose_03 = $request->dosethree;
            $vaccinestore->dose_04 = $request->dosetfour;
            $vaccinestore->dose_05 = $request->dosefive;
            $vaccinestore->booster = $request->booster;
            $vaccinestore->upload_tool = self::uploadImage($request->upload_tool, 'Vaccination');
            $vaccinestore->patient_id = Auth::user()->id;
            $vaccinestore->save();

            // Save the user
            try {
                return redirect()->back()->with(['success' => 'Vaccination data saved successfully', 'step3' => '3']);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => 'Failed to save Vaccination. Please try again.', 'step3' => '3'])->withInput();
            }
        }
    }

    public function vaccinationCovid(Request $request)
    {
        $storecoviddata = new VaccinationCovid;
        $storecoviddata->dose_type = $request->vaccine_name;
        $storecoviddata->location = $request->location;
        $storecoviddata->date = $request->date;
        $storecoviddata->manufacturer = $request->manufacturer;
        $storecoviddata->patient_id = Auth::user()->id;
        $storecoviddata->save();

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Vaccination data saved successfully', 'step2' => '2']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Vaccination. Please try again.', 'step2' => '2'])->withInput();
        }
    }

    public function covidCertificate(Request $request)
    {
        $userId = Auth::user()->id;
        $data = CovidCertificate::where('patient_id', $userId)->first();
        CovidCertificate::updateOrCreate(
            ['patient_id' => $userId],
            [
                'certificate_number' => $request->certificateNo ?? $data->certificate_number,
                'upload_tool' => self::uploadImage($request->upload_tool, 'Vaccination Covid'),
            ]
        );

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Covid Certificate data saved successfully', 'step2' => '2']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Covid Certificate. Please try again.', 'step2' => '2'])->withInput();
        }
    }
    public function vaccinationDownload($id)
    {
        $data = Vaccination::find($id);
        $file = public_path($data->upload_tool); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

    public function covidFileDownload()
    {
        $data = CovidCertificate::where('patient_id', Auth::user()->id)->first();
        $file = public_path($data->upload_tool); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }


    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * RANDOM UPLOADER TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function randomUploaderTool()
    {
        $data = RandomUploaderTool::where('patient_id', Auth::user()->id)->get();
        return view('pages.info-random-uploader', compact('data'));
    }
    /**------------------------
     * Store => random_uploader_tools
     */
    public function saveRandomUploaderTool(Request $request)
    {
        // Validate incoming requests if needed
        $validatedData = $request->validate([
            'document_name.*' => 'nullable|string|max:255',
            'date.*' => 'nullable|date',
            'upload_tool.*' => 'nullable|file',
        ]);

        // Loop through each row submitted in the form
        foreach ($request->data as $item) {
            $randomUploaderToolData = [
                'document_name' => $item['document_name'],
                'sub_type' => $item['sub_type'],
                'date' => $item['date'],
                'additional_note' => $item['additional_note'],
                'upload_tool' => !empty($item['upload_tool']) 
                                    ? self::uploadImage($item['upload_tool'], 'Random Uploader') 
                                    : (isset($item['id']) ? optional(RandomUploaderTool::find($item['id']))->getOriginal('upload_tool') : null),
                'patient_id' => auth()->user()->id,
            ];
            RandomUploaderTool::updateOrCreate(['id' => $item['id'] ?? null], $randomUploaderToolData );
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Documents uploaded successfully', 'step1' => '1']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to Documents uploaded. Please try again.', 'step1' => '1'])->withInput();
        }
    } 

    public function downloadRandomUploaderTool($id)
    {
        $data = RandomUploaderTool::find($id);
        $file = public_path($data->upload_tool); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * Doctor's Appointment Setup Tool
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */

     public function doctorAppointment()
    {
        $info = DoctorAppointment::where('patient_id', auth()->id())->get();
        return view('pages.info-doctor-appointment', compact('info'));
    }
    /**-----------------------------
     * Store => random_uploader_tools
     */
    public function saveDoctorAppointment(Request $request)
    {
        // Save or update DoctorAppointment record
        if ($request->appointment_id) {
            $doctorAppointment = DoctorAppointment::find($request->appointment_id);
        } else {
            $doctorAppointment = new DoctorAppointment();
        }

        // Populate DoctorAppointment fields
        $doctorAppointment->full_name = $request->full_name;
        $doctorAppointment->designation = $request->designation;
        $doctorAppointment->specialization = $request->specialization;
        $doctorAppointment->chamber_address = $request->chamber_address;
        $doctorAppointment->availability_hours = $request->availability_hours;
        $doctorAppointment->contact_number = $request->contact_number;
        $doctorAppointment->patient_id = auth()->id();
        $doctorAppointment->save();

        // Process each appointment detail
        if ($request->has('moreFile')) {
            foreach ($request->moreFile as $appointmentData) {
                $doctorAppointmentDetail = new DoctorAppointmentDetails();
                $doctorAppointmentDetail->doctor_appointment_id = $doctorAppointment->id;
                // Populate DoctorAppointmentDetails fields
                $doctorAppointmentDetail->appointment = $appointmentData['appointment'];
                $doctorAppointmentDetail->day = $appointmentData['day'];
                $doctorAppointmentDetail->time_date_tool = $appointmentData['time_date_tool'];
                $doctorAppointmentDetail->fee = $appointmentData['fee'];
                $doctorAppointmentDetail->note = $appointmentData['note'];
                $doctorAppointmentDetail->save();
            }
        }

        // Save the user
        try {
            return redirect()->back()->with(['success' => 'Appointment data saved successfully', 'step1' => '1']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Failed to save Appointment. Please try again.', 'step1' => '1'])->withInput();
        }
    }
    /**--------------------------
     * GET => doctor_appointments
     */
    public function editDoctorAppointment(Request $request)
    {
        $data = DoctorAppointment::with('appointmentDetails')->find($request->id)->toArray();
        return response()->json($data);
    }
}
