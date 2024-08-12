<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information\Vaccination;
use App\Models\Information\VaccinationCovid;
use App\Models\Information\CovidCertificate;
use Illuminate\Support\Facades\Auth;
use Exception;

class vaccineController extends Controller
{
    public static $products, $product, $image, $imageName, $imageUrl, $directory;

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

    public static function uploadImage($request, $product = null)
    {
        self::$image = $request->file('image');
        if (self::$image) {
            if ($product) {
                if (file_exists($product->image)) {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'public/assets/images/upload-images/vaccine/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory . self::$imageName;
        } else {
            if ($product) {
                self::$imageUrl = $product->image;
            } else {
                self::$imageUrl = null;
            }
        }

        return self::$imageUrl;
    }
    public function vaccinationStore(Request $request)
    {

        try{


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
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
            }else if($request->hidden_section == 'section two'){
                $vaccinestore = new Vaccination;
                $vaccinestore->type = $request->hidden_section;
                $vaccinestore->manufacturer = $request->manufacturer;
                $vaccinestore->dose_01 = $request->doseone;
                $vaccinestore->dose_02 = $request->dosetwo;
                $vaccinestore->dose_03 = $request->dosethree;
                $vaccinestore->dose_04 = $request->dosetfour;
                $vaccinestore->dose_05 = $request->dosefive;
                $vaccinestore->booster = $request->booster;
                $vaccinestore->location = $request->location;
                $vaccinestore->certificate_number = $request->certificate;
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
                // $notification = ['message' => 'Vaccination record saved successfully.', 'alert-type' => 'success'];
                // return redirect()->route('info-vaccination-record', ['section' => 'section2'])->with($notification);
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
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
            }


            $notification = ['messege' => 'Data has been saved successfully', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }catch(Exception $e){
            $notification = ['messege' => 'Media Info save not successfull', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

    }

    public function getSectionOneData(Request $request)
    {
        $sectiononedata = Vaccination::where('type',$request->section_one)->get();
        return view('pages.info-vaccination-record.get_section_one_data', compact('sectiononedata'));
    }

    public function getSectionTwoData(Request $request)
    {
        $sectiontwodata = Vaccination::where('type',$request->section_two)->get();
        return view('pages.info-vaccination-record.get_section_two_data', compact('sectiontwodata'));
    }

    public function getSectionThreeData(Request $request)
    {
        $sectionthreedata = Vaccination::where('type',$request->section_three)->get();
        return view('pages.info-vaccination-record.get_section_three_data', compact('sectionthreedata'));
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
        return redirect()->back();
    }


    public function covidCertificate(Request $request)
    {
        $userId = Auth::user()->id;
        $data = CovidCertificate::where('patient_id', $userId)->first();
        CovidCertificate::updateOrCreate(
            ['patient_id' => $userId],
            [
                'certificate_number' => $request->certificateNo??$data->certificate_number,
                'uploader_tool' => self::uploadImage($request),
            ]
        );
        return redirect()->back();
    }

    public function covidFileDownload()
    {
        $file = CovidCertificate::where('patient_id', Auth::user()->id)->first();
        $path = $file->uploader_tool;
        return response()->download($path);
    }

    public function vaccinesectionthreedownload($id)
    {
        $file = Vaccination::where('id', $id)->first();
        $path = $file->upload_tool;
        return response()->download($path);

    }


    public function downloadSectiononeFile($id)
    {
        $file = Vaccination::where('id', $id)->first();
        $path = $file->upload_tool;
        return response()->download($path);
    }
}
