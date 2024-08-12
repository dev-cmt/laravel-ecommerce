<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * KEY : MULTIPERMISSION
     */
    public function run(): void
    {
        $nationalities = [
            'Afghan',
            'Albanian',
            'Algerian',
            'American',
            'Andorran',
            'Angolan',
            'Antiguans',
            'Argentinean',
            'Armenian',
            'Australian',
            'Austrian',
            'Azerbaijani',
            'Bahamian',
            'Bahraini',
            'Bangladeshi',
            'Barbadian',
            'Barbudans',
            'Batswana',
            'Belarusian',
            'Belgian',
            'Belizean',
            'Beninese',
            'Bhutanese',
            'Bolivian',
            'Bosnian',
            'Brazilian',
            'British',
            'Bruneian',
            'Bulgarian',
            'Burkinabe',
            'Burmese',
            'Burundian',
            'Cambodian',
            'Cameroonian',
            'Canadian',
            'Cape Verdean',
            'Central African',
            'Chadian',
            'Chilean',
            'Chinese',
            'Colombian',
            'Comoran',
            'Congolese',
            'Costa Rican',
            'Croatian',
            'Cuban',
            'Cypriot',
            'Czech',
            'Danish',
            'Djibouti',
            'Dominican',
            'Dutch',
            'East Timorese',
            'Ecuadorean',
            'Egyptian',
            'Emirian'
            // Add other nationalities as needed
        ];

        foreach ($nationalities as $nationality) {
            DB::table('mast_nationalities')->insert(['name' => $nationality, 'user_id' => 1]);
        }
        /**
         * 
         * 
         * 
         */
        $complaints = [
            ['name' => 'Fever', 'user_id' => '1'],
            ['name' => 'Shortness of Breath', 'user_id' => '1'],
            ['name' => 'Vomiting', 'user_id' => '1'],
            ['name' => 'Nausea', 'user_id' => '1'],
            ['name' => 'Fatigue', 'user_id' => '1'],
            ['name' => 'Headache', 'user_id' => '1'],
            ['name' => 'Chest Burn', 'user_id' => '1'],
            ['name' => 'Nerve Pain', 'user_id' => '1'],
            ['name' => 'Lymph Nodes', 'user_id' => '1'],
            ['name' => 'Blurry Vision', 'user_id' => '1'],
            ['name' => 'Eye Pain', 'user_id' => '1'],
            ['name' => 'Watery Eyes', 'user_id' => '1'],
            ['name' => 'Excessive Sweating', 'user_id' => '1'],
            ['name' => 'Joint Pain', 'user_id' => '1'],
            ['name' => 'Anxiety', 'user_id' => '1'],
            ['name' => 'Yellowish', 'user_id' => '1'],
            ['name' => 'Anguish', 'user_id' => '1'],
            ['name' => 'Constipation', 'user_id' => '1'],
            ['name' => 'Loose Motion', 'user_id' => '1'],
            ['name' => 'Excess Bleeding', 'user_id' => '1'],
            ['name' => 'Blocked Nose', 'user_id' => '1'],
            ['name' => 'Bloody Cough', 'user_id' => '1'],
            ['name' => 'Secretion', 'user_id' => '1'],
            ['name' => 'Excessive Thirst', 'user_id' => '1'],
            ['name' => 'Swelling', 'user_id' => '1'],
            ['name' => 'Numbness', 'user_id' => '1'],
            ['name' => 'Dizziness', 'user_id' => '1'],
            ['name' => 'High Blood Pressure', 'user_id' => '1'],
            ['name' => 'Low Blood Pressure', 'user_id' => '1'],
            ['name' => 'High Blood Sugar', 'user_id' => '1'],
            ['name' => 'Low Blood Sugar', 'user_id' => '1'],
            ['name' => 'Sleeplessness', 'user_id' => '1'],
            ['name' => 'Anemia', 'user_id' => '1'],
            ['name' => 'Difficulty to Stand', 'user_id' => '1'],
            ['name' => 'Difficulty to Sit/Lay', 'user_id' => '1'],
            ['name' => 'Difficulty to Talk', 'user_id' => '1'],
            ['name' => 'Depression', 'user_id' => '1'],
            ['name' => 'Suicidal', 'user_id' => '1'],
            ['name' => 'Imaginary Entity', 'user_id' => '1'],
            ['name' => 'Urinary Difficulty', 'user_id' => '1'],
            ['name' => 'Dry Cough', 'user_id' => '1'],
            ['name' => 'Mucas Cough', 'user_id' => '1'],
            ['name' => 'Cyst', 'user_id' => '1'],
            ['name' => 'Bloody Urine', 'user_id' => 1]
        ];
        
        // Insert into database
        DB::table('mast_complaints')->insert($complaints);

        /**
         * 
         * 
         * 
         */

         $tests = [
            ['test_name' => 'CBC  (Complete Blood Count)', 'user_id' => '1'],
            ['test_name' => 'LP (Lipid Panel/Profile)', 'user_id' => '1'],
            ['test_name' => 'RBS (Random Blood Sugar - Fasting)', 'user_id' => '1'],
            ['test_name' => 'TFT/ (Thyroid Function Test)', 'user_id' => '1'],
            ['test_name' => 'S-Cretanine (Kidney/Renal Function Test)', 'user_id' => '1'],
            ['test_name' => 'Urine Examination', 'user_id' => '1'],
            ['test_name' => 'X-Ray (Radiology)', 'user_id' => '1'],
            ['test_name' => 'MRI (Magnetic Resonance Imaging)', 'user_id' => '1'],
            ['test_name' => 'CT (Computed Tomography)', 'user_id' => '1'],
            ['test_name' => 'Genetic Testing', 'user_id' => '1'],
            ['test_name' => 'Stool Examination', 'user_id' => '1'],
            ['test_name' => 'Dermatology', 'user_id' => '1'],
            ['test_name' => 'Sperm Count Test (Potency Test)', 'user_id' => '1'],
            ['test_name' => 'ECG (Eco Cardiogram)', 'user_id' => '1'],
            ['test_name' => 'EGG (ElectroGastrogram)', 'user_id' => '1'],
            ['test_name' => 'Functionality Test', 'user_id' => '1'],
            ['test_name' => 'Physiotherapy', 'user_id' => '1'],
            ['test_name' => 'Audiotherapy', 'user_id' => '1'],
            ['test_name' => 'Covid-19 (Antigen)', 'user_id' => '1'],
            ['test_name' => 'Covid-19 (RT-PCR)', 'user_id' => '1'],
            ['test_name' => 'HIV Screening', 'user_id' => '1'],
            ['test_name' => 'HPV Screening', 'user_id' => '1'],
            ['test_name' => 'HbA', 'user_id' => '1'],
            ['test_name' => 'HbAg+', 'user_id' => '1'],
            ['test_name' => 'HbC', 'user_id' => '1'],
            ['test_name' => 'USG-A', 'user_id' => '1'],
            ['test_name' => 'USG-C', 'user_id' => '1'],
            ['test_name' => 'H1N1', 'user_id' => '1'],
            ['test_name' => 'ETT (Exercise Tolerance Test)', 'user_id' => '1'],
            ['test_name' => 'Angiogram', 'user_id' => '1'],
            ['test_name' => 'Mammography', 'user_id' => '1'],
            ['test_name' => 'Urography', 'user_id' => '1'],
            ['test_name' => 'PFT (Pulmonary Function Test)', 'user_id' => '1'],
            ['test_name' => 'MRS (Magnetic Resonance Spectography)', 'user_id' => '1'],
            ['test_name' => 'Prenatal/Pregnancy Test', 'user_id' => '1'],
            ['test_name' => 'Endoscopy', 'user_id' => '1'],
            ['test_name' => 'Cerebral Angiography', 'user_id' => '1'],
        ];

        DB::table('mast_tests')->insert($tests);


        /**
         * 
         * 
         * 
         */

         $organs = [
            ['organ_name' => 'Scalp', 'user_id' => '1'],
            ['organ_name' => 'Brain', 'user_id' => '1'],
            ['organ_name' => 'Forehead', 'user_id' => '1'],
            ['organ_name' => 'Eye (right)', 'user_id' => '1'],
            ['organ_name' => 'Eye (left)', 'user_id' => '1'],
            ['organ_name' => 'Nostril', 'user_id' => '1'],
            ['organ_name' => 'Ear (Right)', 'user_id' => '1'],
            ['organ_name' => 'Ear (Left)', 'user_id' => '1'],
            ['organ_name' => 'Lip (Upper)', 'user_id' => '1'],
            ['organ_name' => 'Lip (Lower)', 'user_id' => '1'],
            ['organ_name' => 'Tongue', 'user_id' => '1'],
            ['organ_name' => 'Tonsils', 'user_id' => '1'],
            ['organ_name' => 'Trachea/Airway', 'user_id' => '1'],
            ['organ_name' => 'Heart', 'user_id' => '1'],
            ['organ_name' => 'Lung (Right)', 'user_id' => '1'],
            ['organ_name' => 'Lung (Left)', 'user_id' => '1'],
            ['organ_name' => 'Intestine (Large)', 'user_id' => '1'],
            ['organ_name' => 'Intestine (Small)', 'user_id' => '1'],
            ['organ_name' => 'Kidney (Right)', 'user_id' => '1'],
            ['organ_name' => 'Kidney (Left)', 'user_id' => '1'],
            ['organ_name' => 'Thyroid Gland', 'user_id' => '1'],
            ['organ_name' => 'Appendix', 'user_id' => '1'],
            ['organ_name' => 'Bladder', 'user_id' => '1'],
            ['organ_name' => 'Pancreas', 'user_id' => '1'],
            ['organ_name' => 'Endocrine Systems', 'user_id' => '1'],
            ['organ_name' => 'Lymphatic', 'user_id' => '1'],
            ['organ_name' => 'Nerve/Nervous System', 'user_id' => '1'],
            ['organ_name' => 'Skeletal', 'user_id' => '1'],
            ['organ_name' => 'Anal', 'user_id' => '1'],
            ['organ_name' => 'Esophagus', 'user_id' => '1'],
            ['organ_name' => 'Penis', 'user_id' => '1'],
            ['organ_name' => 'Navel', 'user_id' => '1'],
            ['organ_name' => 'Vagina', 'user_id' => '1'],
            ['organ_name' => 'Hip Joint', 'user_id' => '1'],
            ['organ_name' => 'Anus', 'user_id' => '1'],
            ['organ_name' => 'Nails', 'user_id' => '1'],
            ['organ_name' => 'Skin', 'user_id' => '1'],
            ['organ_name' => 'Bone', 'user_id' => '1'],
            ['organ_name' => 'Hair', 'user_id' => '1'],
            ['organ_name' => 'Thigh (Upper)', 'user_id' => '1'],
            ['organ_name' => 'Thigh (Lower)', 'user_id' => '1'],
            ['organ_name' => 'Knee', 'user_id' => '1'],
            ['organ_name' => 'Buttocks', 'user_id' => '1'],
            ['organ_name' => 'Toe', 'user_id' => '1'],
            ['organ_name' => 'Finger(s) (Right Hand)', 'user_id' => '1'],
            ['organ_name' => 'Finger(s) (Left Hand)', 'user_id' => '1'],
            ['organ_name' => 'Finger(s) (Right Toe)', 'user_id' => '1'],
            ['organ_name' => 'Finger(s) (Left Toe)', 'user_id' => '1'],
            ['organ_name' => 'Ovary (Right)', 'user_id' => '1'],
            ['organ_name' => 'Ovary (Left)', 'user_id' => '1'],
            ['organ_name' => 'Breast (Right)', 'user_id' => '1'],
            ['organ_name' => 'Breast (Left)', 'user_id' => '1'],
            ['organ_name' => 'Testicle (Right)', 'user_id' => '1'],
            ['organ_name' => 'Testicle (Left)', 'user_id' => '1'],
        ];
        DB::table('mast_organs')->insert($organs);
        


        /**
         * 
         * 
         * 
         */
        $powers = [
            ['name' => 'None', 'user_id' => '1'],
            ['name' => '5 mg', 'user_id' => '1'],
            ['name' => '10 mg', 'user_id' => '1'],
            ['name' => '20 mg', 'user_id' => '1'],
            ['name' => '25 mg', 'user_id' => '1'],
            ['name' => '40 mg', 'user_id' => '1'],
            ['name' => '50 mg', 'user_id' => '1'],
            ['name' => '60 mg', 'user_id' => '1'],
            ['name' => '70 mg', 'user_id' => '1'],
            ['name' => '75 mg', 'user_id' => '1'],
            ['name' => '80 mg', 'user_id' => '1'],
            ['name' => '100 mg', 'user_id' => '1'],
            ['name' => '120 mg', 'user_id' => '1'],
            ['name' => '150 mg', 'user_id' => '1'],
            ['name' => '180 mg', 'user_id' => '1'],
            ['name' => '200 mg', 'user_id' => '1'],
            ['name' => '250 mg', 'user_id' => '1'],
            ['name' => '300 mg', 'user_id' => '1'],
            ['name' => '350 mg', 'user_id' => '1'],
            ['name' => '400 mg', 'user_id' => '1'],
            ['name' => '450 mg', 'user_id' => '1'],
            ['name' => '500 mg', 'user_id' => '1'],
            ['name' => '600 mg', 'user_id' => '1'],
            ['name' => '700 mg', 'user_id' => '1'],
            ['name' => '800 mg', 'user_id' => '1'],
            ['name' => '1000 mg', 'user_id' => '1'],
            ['name' => '1200 mg', 'user_id' => '1'],
            ['name' => '1500 mg', 'user_id' => '1'],
            ['name' => '2000 mg', 'user_id' => '1'],
        ];
        DB::table('mast_powers')->insert($powers);



        /***
         * 
         * 
         * 
         */

         $equipment = [
            ['name' => 'Capsule', 'user_id' => '1'],
            ['name' => 'Tablet', 'user_id' => '1'],
            ['name' => 'Ointment', 'user_id' => '1'],
            ['name' => 'Droplet', 'user_id' => '1'],
            ['name' => 'Saline (Oral)', 'user_id' => '1'],
            ['name' => 'Saline (IV)', 'user_id' => '1'],
            ['name' => 'Injection (IV)', 'user_id' => '1'],
            ['name' => 'Injection (IM)', 'user_id' => '1'],
            ['name' => 'Vaccination', 'user_id' => '1'],
            ['name' => 'Powder', 'user_id' => '1'],
            ['name' => 'Physiotherapy', 'user_id' => '1'],
            ['name' => 'Audiotherapy', 'user_id' => '1'],
            ['name' => 'Aromatherapy', 'user_id' => '1'],
            ['name' => 'Speech & Language Therapy', 'user_id' => '1'],
            ['name' => 'Occupational Therapy', 'user_id' => '1'],
            ['name' => 'Radiotherapy', 'user_id' => '1'],
            ['name' => 'Psychotherapy', 'user_id' => '1'],
            ['name' => 'Psycho Social Counselling', 'user_id' => '1'],
            ['name' => 'Couple Counselling', 'user_id' => '1'],
        ];
        DB::table('mast_equipment')->insert($equipment);
    }
}
