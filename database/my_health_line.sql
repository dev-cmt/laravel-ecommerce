-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 09:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_health_line`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure_profilings`
--

CREATE TABLE `blood_pressure_profilings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `time` time DEFAULT NULL,
  `systolic` int(11) DEFAULT NULL,
  `diastolic` int(11) DEFAULT NULL,
  `heart_rate_bpm` int(11) DEFAULT NULL,
  `additional_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_sugar_profilings`
--

CREATE TABLE `blood_sugar_profilings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `time` time DEFAULT NULL,
  `reading` decimal(5,2) DEFAULT NULL,
  `dietary_information` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `additional_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_complaints`
--

CREATE TABLE `case_complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `mast_complaint_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_registries`
--

CREATE TABLE `case_registries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_primary_identification` date DEFAULT NULL,
  `date_of_first_visit` date DEFAULT NULL,
  `recurrence` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `duration_unit` varchar(255) DEFAULT NULL,
  `area_of_problem` varchar(255) DEFAULT NULL,
  `type_of_ailment` varchar(255) DEFAULT NULL,
  `additional_complaints` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `covid_certificates`
--

CREATE TABLE `covid_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_number` varchar(255) DEFAULT NULL,
  `upload_tool` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `chamber_address` varchar(255) DEFAULT NULL,
  `availability_hours` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment_details`
--

CREATE TABLE `doctor_appointment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `appointment` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `time_date_tool` varchar(255) DEFAULT NULL,
  `fee` decimal(8,2) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_profiles`
--

CREATE TABLE `general_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `height_feet` decimal(3,1) DEFAULT NULL,
  `height_inches` decimal(3,1) DEFAULT NULL,
  `weight_kg` decimal(6,2) DEFAULT NULL,
  `weight_pounds` decimal(6,2) DEFAULT NULL,
  `bmi` decimal(5,2) DEFAULT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `mast_nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genetic_disease_profiles`
--

CREATE TABLE `genetic_disease_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `disease_diabetes` tinyint(1) NOT NULL DEFAULT 0,
  `disease_stroke` tinyint(1) NOT NULL DEFAULT 0,
  `disease_heart` tinyint(1) NOT NULL DEFAULT 0,
  `disease_hyper` tinyint(1) NOT NULL DEFAULT 0,
  `disease_pressure` tinyint(1) NOT NULL DEFAULT 0,
  `disease_balding` tinyint(1) NOT NULL DEFAULT 0,
  `disease_vitiligo` tinyint(1) NOT NULL DEFAULT 0,
  `disease_disability` tinyint(1) NOT NULL DEFAULT 0,
  `disease_psoriasis` tinyint(1) NOT NULL DEFAULT 0,
  `disease_eczema` tinyint(1) NOT NULL DEFAULT 0,
  `additional_comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests`
--

CREATE TABLE `lab_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mast_test_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `mast_organ_id` bigint(20) UNSIGNED NOT NULL,
  `comments` text DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `lab` varchar(255) DEFAULT NULL,
  `upload_tool` varchar(255) DEFAULT NULL,
  `treatment_profile_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mast_complaints`
--

CREATE TABLE `mast_complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_complaints`
--

INSERT INTO `mast_complaints` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fever', NULL, NULL),
(2, 1, 'Shortness of Breath', NULL, NULL),
(3, 1, 'Vomiting', NULL, NULL),
(4, 1, 'Nausea', NULL, NULL),
(5, 1, 'Fatigue', NULL, NULL),
(6, 1, 'Headache', NULL, NULL),
(7, 1, 'Chest Burn', NULL, NULL),
(8, 1, 'Nerve Pain', NULL, NULL),
(9, 1, 'Lymph Nodes', NULL, NULL),
(10, 1, 'Blurry Vision', NULL, NULL),
(11, 1, 'Eye Pain', NULL, NULL),
(12, 1, 'Watery Eyes', NULL, NULL),
(13, 1, 'Excessive Sweating', NULL, NULL),
(14, 1, 'Joint Pain', NULL, NULL),
(15, 1, 'Anxiety', NULL, NULL),
(16, 1, 'Yellowish', NULL, NULL),
(17, 1, 'Anguish', NULL, NULL),
(18, 1, 'Constipation', NULL, NULL),
(19, 1, 'Loose Motion', NULL, NULL),
(20, 1, 'Excess Bleeding', NULL, NULL),
(21, 1, 'Blocked Nose', NULL, NULL),
(22, 1, 'Bloody Cough', NULL, NULL),
(23, 1, 'Secretion', NULL, NULL),
(24, 1, 'Excessive Thirst', NULL, NULL),
(25, 1, 'Swelling', NULL, NULL),
(26, 1, 'Numbness', NULL, NULL),
(27, 1, 'Dizziness', NULL, NULL),
(28, 1, 'High Blood Pressure', NULL, NULL),
(29, 1, 'Low Blood Pressure', NULL, NULL),
(30, 1, 'High Blood Sugar', NULL, NULL),
(31, 1, 'Low Blood Sugar', NULL, NULL),
(32, 1, 'Sleeplessness', NULL, NULL),
(33, 1, 'Anemia', NULL, NULL),
(34, 1, 'Difficulty to Stand', NULL, NULL),
(35, 1, 'Difficulty to Sit/Lay', NULL, NULL),
(36, 1, 'Difficulty to Talk', NULL, NULL),
(37, 1, 'Depression', NULL, NULL),
(38, 1, 'Suicidal', NULL, NULL),
(39, 1, 'Imaginary Entity', NULL, NULL),
(40, 1, 'Urinary Difficulty', NULL, NULL),
(41, 1, 'Dry Cough', NULL, NULL),
(42, 1, 'Mucas Cough', NULL, NULL),
(43, 1, 'Cyst', NULL, NULL),
(44, 1, 'Bloody Urine', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mast_equipment`
--

CREATE TABLE `mast_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_equipment`
--

INSERT INTO `mast_equipment` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Capsule', NULL, NULL),
(2, 1, 'Tablet', NULL, NULL),
(3, 1, 'Ointment', NULL, NULL),
(4, 1, 'Droplet', NULL, NULL),
(5, 1, 'Saline (Oral)', NULL, NULL),
(6, 1, 'Saline (IV)', NULL, NULL),
(7, 1, 'Injection (IV)', NULL, NULL),
(8, 1, 'Injection (IM)', NULL, NULL),
(9, 1, 'Vaccination', NULL, NULL),
(10, 1, 'Powder', NULL, NULL),
(11, 1, 'Physiotherapy', NULL, NULL),
(12, 1, 'Audiotherapy', NULL, NULL),
(13, 1, 'Aromatherapy', NULL, NULL),
(14, 1, 'Speech & Language Therapy', NULL, NULL),
(15, 1, 'Occupational Therapy', NULL, NULL),
(16, 1, 'Radiotherapy', NULL, NULL),
(17, 1, 'Psychotherapy', NULL, NULL),
(18, 1, 'Psycho Social Counselling', NULL, NULL),
(19, 1, 'Couple Counselling', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mast_nationalities`
--

CREATE TABLE `mast_nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_nationalities`
--

INSERT INTO `mast_nationalities` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Afghan', NULL, NULL),
(2, 1, 'Albanian', NULL, NULL),
(3, 1, 'Algerian', NULL, NULL),
(4, 1, 'American', NULL, NULL),
(5, 1, 'Andorran', NULL, NULL),
(6, 1, 'Angolan', NULL, NULL),
(7, 1, 'Antiguans', NULL, NULL),
(8, 1, 'Argentinean', NULL, NULL),
(9, 1, 'Armenian', NULL, NULL),
(10, 1, 'Australian', NULL, NULL),
(11, 1, 'Austrian', NULL, NULL),
(12, 1, 'Azerbaijani', NULL, NULL),
(13, 1, 'Bahamian', NULL, NULL),
(14, 1, 'Bahraini', NULL, NULL),
(15, 1, 'Bangladeshi', NULL, NULL),
(16, 1, 'Barbadian', NULL, NULL),
(17, 1, 'Barbudans', NULL, NULL),
(18, 1, 'Batswana', NULL, NULL),
(19, 1, 'Belarusian', NULL, NULL),
(20, 1, 'Belgian', NULL, NULL),
(21, 1, 'Belizean', NULL, NULL),
(22, 1, 'Beninese', NULL, NULL),
(23, 1, 'Bhutanese', NULL, NULL),
(24, 1, 'Bolivian', NULL, NULL),
(25, 1, 'Bosnian', NULL, NULL),
(26, 1, 'Brazilian', NULL, NULL),
(27, 1, 'British', NULL, NULL),
(28, 1, 'Bruneian', NULL, NULL),
(29, 1, 'Bulgarian', NULL, NULL),
(30, 1, 'Burkinabe', NULL, NULL),
(31, 1, 'Burmese', NULL, NULL),
(32, 1, 'Burundian', NULL, NULL),
(33, 1, 'Cambodian', NULL, NULL),
(34, 1, 'Cameroonian', NULL, NULL),
(35, 1, 'Canadian', NULL, NULL),
(36, 1, 'Cape Verdean', NULL, NULL),
(37, 1, 'Central African', NULL, NULL),
(38, 1, 'Chadian', NULL, NULL),
(39, 1, 'Chilean', NULL, NULL),
(40, 1, 'Chinese', NULL, NULL),
(41, 1, 'Colombian', NULL, NULL),
(42, 1, 'Comoran', NULL, NULL),
(43, 1, 'Congolese', NULL, NULL),
(44, 1, 'Costa Rican', NULL, NULL),
(45, 1, 'Croatian', NULL, NULL),
(46, 1, 'Cuban', NULL, NULL),
(47, 1, 'Cypriot', NULL, NULL),
(48, 1, 'Czech', NULL, NULL),
(49, 1, 'Danish', NULL, NULL),
(50, 1, 'Djibouti', NULL, NULL),
(51, 1, 'Dominican', NULL, NULL),
(52, 1, 'Dutch', NULL, NULL),
(53, 1, 'East Timorese', NULL, NULL),
(54, 1, 'Ecuadorean', NULL, NULL),
(55, 1, 'Egyptian', NULL, NULL),
(56, 1, 'Emirian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mast_organs`
--

CREATE TABLE `mast_organs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organ_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_organs`
--

INSERT INTO `mast_organs` (`id`, `user_id`, `organ_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Scalp', NULL, NULL),
(2, 1, 'Brain', NULL, NULL),
(3, 1, 'Forehead', NULL, NULL),
(4, 1, 'Eye (right)', NULL, NULL),
(5, 1, 'Eye (left)', NULL, NULL),
(6, 1, 'Nostril', NULL, NULL),
(7, 1, 'Ear (Right)', NULL, NULL),
(8, 1, 'Ear (Left)', NULL, NULL),
(9, 1, 'Lip (Upper)', NULL, NULL),
(10, 1, 'Lip (Lower)', NULL, NULL),
(11, 1, 'Tongue', NULL, NULL),
(12, 1, 'Tonsils', NULL, NULL),
(13, 1, 'Trachea/Airway', NULL, NULL),
(14, 1, 'Heart', NULL, NULL),
(15, 1, 'Lung (Right)', NULL, NULL),
(16, 1, 'Lung (Left)', NULL, NULL),
(17, 1, 'Intestine (Large)', NULL, NULL),
(18, 1, 'Intestine (Small)', NULL, NULL),
(19, 1, 'Kidney (Right)', NULL, NULL),
(20, 1, 'Kidney (Left)', NULL, NULL),
(21, 1, 'Thyroid Gland', NULL, NULL),
(22, 1, 'Appendix', NULL, NULL),
(23, 1, 'Bladder', NULL, NULL),
(24, 1, 'Pancreas', NULL, NULL),
(25, 1, 'Endocrine Systems', NULL, NULL),
(26, 1, 'Lymphatic', NULL, NULL),
(27, 1, 'Nerve/Nervous System', NULL, NULL),
(28, 1, 'Skeletal', NULL, NULL),
(29, 1, 'Anal', NULL, NULL),
(30, 1, 'Esophagus', NULL, NULL),
(31, 1, 'Penis', NULL, NULL),
(32, 1, 'Navel', NULL, NULL),
(33, 1, 'Vagina', NULL, NULL),
(34, 1, 'Hip Joint', NULL, NULL),
(35, 1, 'Anus', NULL, NULL),
(36, 1, 'Nails', NULL, NULL),
(37, 1, 'Skin', NULL, NULL),
(38, 1, 'Bone', NULL, NULL),
(39, 1, 'Hair', NULL, NULL),
(40, 1, 'Thigh (Upper)', NULL, NULL),
(41, 1, 'Thigh (Lower)', NULL, NULL),
(42, 1, 'Knee', NULL, NULL),
(43, 1, 'Buttocks', NULL, NULL),
(44, 1, 'Toe', NULL, NULL),
(45, 1, 'Finger(s) (Right Hand)', NULL, NULL),
(46, 1, 'Finger(s) (Left Hand)', NULL, NULL),
(47, 1, 'Finger(s) (Right Toe)', NULL, NULL),
(48, 1, 'Finger(s) (Left Toe)', NULL, NULL),
(49, 1, 'Ovary (Right)', NULL, NULL),
(50, 1, 'Ovary (Left)', NULL, NULL),
(51, 1, 'Breast (Right)', NULL, NULL),
(52, 1, 'Breast (Left)', NULL, NULL),
(53, 1, 'Testicle (Right)', NULL, NULL),
(54, 1, 'Testicle (Left)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mast_powers`
--

CREATE TABLE `mast_powers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_powers`
--

INSERT INTO `mast_powers` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'None', NULL, NULL),
(2, 1, '5 mg', NULL, NULL),
(3, 1, '10 mg', NULL, NULL),
(4, 1, '20 mg', NULL, NULL),
(5, 1, '25 mg', NULL, NULL),
(6, 1, '40 mg', NULL, NULL),
(7, 1, '50 mg', NULL, NULL),
(8, 1, '60 mg', NULL, NULL),
(9, 1, '70 mg', NULL, NULL),
(10, 1, '75 mg', NULL, NULL),
(11, 1, '80 mg', NULL, NULL),
(12, 1, '100 mg', NULL, NULL),
(13, 1, '120 mg', NULL, NULL),
(14, 1, '150 mg', NULL, NULL),
(15, 1, '180 mg', NULL, NULL),
(16, 1, '200 mg', NULL, NULL),
(17, 1, '250 mg', NULL, NULL),
(18, 1, '300 mg', NULL, NULL),
(19, 1, '350 mg', NULL, NULL),
(20, 1, '400 mg', NULL, NULL),
(21, 1, '450 mg', NULL, NULL),
(22, 1, '500 mg', NULL, NULL),
(23, 1, '600 mg', NULL, NULL),
(24, 1, '700 mg', NULL, NULL),
(25, 1, '800 mg', NULL, NULL),
(26, 1, '1000 mg', NULL, NULL),
(27, 1, '1200 mg', NULL, NULL),
(28, 1, '1500 mg', NULL, NULL),
(29, 1, '2000 mg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mast_tests`
--

CREATE TABLE `mast_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_tests`
--

INSERT INTO `mast_tests` (`id`, `user_id`, `test_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'CBC  (Complete Blood Count)', NULL, NULL),
(2, 1, 'LP (Lipid Panel/Profile)', NULL, NULL),
(3, 1, 'RBS (Random Blood Sugar - Fasting)', NULL, NULL),
(4, 1, 'TFT/ (Thyroid Function Test)', NULL, NULL),
(5, 1, 'S-Cretanine (Kidney/Renal Function Test)', NULL, NULL),
(6, 1, 'Urine Examination', NULL, NULL),
(7, 1, 'X-Ray (Radiology)', NULL, NULL),
(8, 1, 'MRI (Magnetic Resonance Imaging)', NULL, NULL),
(9, 1, 'CT (Computed Tomography)', NULL, NULL),
(10, 1, 'Genetic Testing', NULL, NULL),
(11, 1, 'Stool Examination', NULL, NULL),
(12, 1, 'Dermatology', NULL, NULL),
(13, 1, 'Sperm Count Test (Potency Test)', NULL, NULL),
(14, 1, 'ECG (Eco Cardiogram)', NULL, NULL),
(15, 1, 'EGG (ElectroGastrogram)', NULL, NULL),
(16, 1, 'Functionality Test', NULL, NULL),
(17, 1, 'Physiotherapy', NULL, NULL),
(18, 1, 'Audiotherapy', NULL, NULL),
(19, 1, 'Covid-19 (Antigen)', NULL, NULL),
(20, 1, 'Covid-19 (RT-PCR)', NULL, NULL),
(21, 1, 'HIV Screening', NULL, NULL),
(22, 1, 'HPV Screening', NULL, NULL),
(23, 1, 'HbA', NULL, NULL),
(24, 1, 'HbAg+', NULL, NULL),
(25, 1, 'HbC', NULL, NULL),
(26, 1, 'USG-A', NULL, NULL),
(27, 1, 'USG-C', NULL, NULL),
(28, 1, 'H1N1', NULL, NULL),
(29, 1, 'ETT (Exercise Tolerance Test)', NULL, NULL),
(30, 1, 'Angiogram', NULL, NULL),
(31, 1, 'Mammography', NULL, NULL),
(32, 1, 'Urography', NULL, NULL),
(33, 1, 'PFT (Pulmonary Function Test)', NULL, NULL),
(34, 1, 'MRS (Magnetic Resonance Spectography)', NULL, NULL),
(35, 1, 'Prenatal/Pregnancy Test', NULL, NULL),
(36, 1, 'Endoscopy', NULL, NULL),
(37, 1, 'Cerebral Angiography', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medication_schedules`
--

CREATE TABLE `medication_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `mast_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mast_power_id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `frequency` varchar(255) DEFAULT NULL,
  `morning` time DEFAULT NULL,
  `noon` time DEFAULT NULL,
  `night` time DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `timing` varchar(255) DEFAULT NULL,
  `antibiotic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_05_064157_create_permission_tables', 1),
(6, '2024_06_26_045343_create_mast_nationalities_table', 1),
(7, '2024_06_26_045344_create_mast_complaints_table', 1),
(8, '2024_06_26_063324_create_mast_powers_table', 1),
(9, '2024_06_26_074622_create_mast_equipment_table', 1),
(10, '2024_06_26_105548_create_mast_tests_table', 1),
(11, '2024_06_26_105604_create_mast_organs_table', 1),
(12, '2024_06_27_044849_create_general_profiles_table', 1),
(13, '2024_06_27_044850_create_sensitive_information_table', 1),
(14, '2024_06_27_044950_create_genetic_disease_profiles_table', 1),
(15, '2024_06_27_045026_create_other_personal_information_table', 1),
(16, '2024_06_27_045311_create_case_registries_table', 1),
(17, '2024_06_27_045345_create_case_complaints_table', 1),
(18, '2024_06_27_045433_create_treatment_profiles_table', 1),
(19, '2024_06_27_045542_create_lab_tests_table', 1),
(20, '2024_06_27_045629_create_medication_schedules_table', 1),
(21, '2024_06_27_045724_create_surgical_interventions_table', 1),
(22, '2024_06_27_045829_create_optionsal_questions_table', 1),
(23, '2024_06_27_045905_create_restrictions_table', 1),
(24, '2024_06_27_050120_create_blood_sugar_profilings_table', 1),
(25, '2024_06_27_050214_create_blood_pressure_profilings_table', 1),
(26, '2024_06_27_050428_create_random_uploader_tools_table', 1),
(27, '2024_06_27_050621_create_doctor_appointments_table', 1),
(28, '2024_06_27_050630_create_doctor_appointment_details_table', 1),
(29, '2024_06_27_105229_create_vaccinations_table', 1),
(30, '2024_07_01_094855_create_vaccination_covids_table', 1),
(31, '2024_07_01_094856_create_covid_certificates_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `optionsal_questions`
--

CREATE TABLE `optionsal_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `admitted_following_diagnosis` varchar(255) DEFAULT NULL,
  `hospitalization_duration` varchar(255) DEFAULT NULL,
  `total_cost_incurred` decimal(10,2) DEFAULT NULL,
  `medication_effectiveness` varchar(255) DEFAULT NULL,
  `satisfied_with_treatment` varchar(255) DEFAULT NULL,
  `recommend_physician` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_personal_information`
--

CREATE TABLE `other_personal_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `marital_status` enum('Single','Married','Married with Kids','Divorced','Widowed','Unwilling to Disclose') DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `last_blood_donated` date DEFAULT NULL,
  `health_insurance_number` varchar(255) DEFAULT NULL,
  `family_physician` varchar(255) DEFAULT NULL,
  `physician_contact` varchar(255) DEFAULT NULL,
  `pregnancy_status` enum('Yes','No') DEFAULT NULL,
  `menstrual_cycle` enum('Regular','Irregular','Menopaused') DEFAULT NULL,
  `activity_status` enum('Immobile/Paralyzed','Disabled','Not Very Active','Moderately Active','Highly Active') DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(2, 'user-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(3, 'user-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(4, 'user-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(5, 'user-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(6, 'role-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(7, 'role-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(8, 'role-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(9, 'role-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(10, 'role-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(11, 'category-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(12, 'category-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(13, 'category-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(14, 'category-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(15, 'category-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(16, 'subcategory-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(17, 'subcategory-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(18, 'subcategory-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(19, 'subcategory-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(20, 'subcategory-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(21, 'product-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(22, 'product-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(23, 'product-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(24, 'product-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(25, 'product-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(26, 'order-list', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(27, 'order-create', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(28, 'order-edit', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(29, 'order-delete', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(30, 'order-show', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `random_uploader_tools`
--

CREATE TABLE `random_uploader_tools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `additional_note` text DEFAULT NULL,
  `upload_tool` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restrictions`
--

CREATE TABLE `restrictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(2, 'Administrator', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32'),
(3, 'Member', 'web', '2024-07-16 01:12:32', '2024-07-16 01:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sensitive_information`
--

CREATE TABLE `sensitive_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `sexually_active` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `diabetic` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `allergies` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `allergy_details` text DEFAULT NULL,
  `thyroid` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `thyroid_details` text DEFAULT NULL,
  `hypertension` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `cholesterol` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `cholesterol_details` text DEFAULT NULL,
  `s_creatinine` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `s_creatinine_details` text DEFAULT NULL,
  `smoking` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `smoking_details` text DEFAULT NULL,
  `alcohol_intake` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `alcohol_intake_details` varchar(255) DEFAULT NULL,
  `drug_abuse_history` enum('Yes','No','Do Not Know','Unwilling to Disclose') NOT NULL,
  `drug_abuse_details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgical_interventions`
--

CREATE TABLE `surgical_interventions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `intervention` varchar(255) DEFAULT NULL,
  `due_time` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `date_line` date DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_profiles`
--

CREATE TABLE `treatment_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_registry_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `chamber_address` varchar(255) DEFAULT NULL,
  `last_visit_date` date DEFAULT NULL,
  `fees` decimal(8,2) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `disease_diagnosis` varchar(255) DEFAULT NULL,
  `prescription` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `unique_patient_id` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_images` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `unique_patient_id`, `gender`, `blood_group`, `marital_status`, `phone`, `profile_images`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@gmail.com', NULL, '$2y$10$AOOfqrtOyy2X3AeBZPIWNOpKssgIETinFPD2suNP3EiJU3Yd5EEzK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-16 01:12:32', '2024-07-16 01:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `vaccine_name` varchar(255) DEFAULT NULL,
  `dose_01` varchar(255) DEFAULT NULL,
  `dose_02` varchar(255) DEFAULT NULL,
  `dose_03` varchar(255) DEFAULT NULL,
  `dose_04` varchar(255) DEFAULT NULL,
  `dose_05` varchar(255) DEFAULT NULL,
  `booster` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `applicable_for` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `certificate_number` varchar(255) DEFAULT NULL,
  `side_effects` text DEFAULT NULL,
  `upload_tool` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_covids`
--

CREATE TABLE `vaccination_covids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dose_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_pressure_profilings`
--
ALTER TABLE `blood_pressure_profilings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_pressure_profilings_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `blood_sugar_profilings`
--
ALTER TABLE `blood_sugar_profilings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_sugar_profilings_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `case_complaints`
--
ALTER TABLE `case_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_complaints_case_registry_id_foreign` (`case_registry_id`),
  ADD KEY `case_complaints_mast_complaint_id_foreign` (`mast_complaint_id`);

--
-- Indexes for table `case_registries`
--
ALTER TABLE `case_registries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_registries_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `covid_certificates`
--
ALTER TABLE `covid_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `covid_certificates_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_appointments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `doctor_appointment_details`
--
ALTER TABLE `doctor_appointment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_appointment_details_doctor_appointment_id_foreign` (`doctor_appointment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_profiles`
--
ALTER TABLE `general_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_profiles_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `genetic_disease_profiles`
--
ALTER TABLE `genetic_disease_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genetic_disease_profiles_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_tests_mast_test_id_foreign` (`mast_test_id`),
  ADD KEY `lab_tests_mast_organ_id_foreign` (`mast_organ_id`),
  ADD KEY `lab_tests_treatment_profile_id_foreign` (`treatment_profile_id`);

--
-- Indexes for table `mast_complaints`
--
ALTER TABLE `mast_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_complaints_user_id_foreign` (`user_id`);

--
-- Indexes for table `mast_equipment`
--
ALTER TABLE `mast_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_equipment_user_id_foreign` (`user_id`);

--
-- Indexes for table `mast_nationalities`
--
ALTER TABLE `mast_nationalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_nationalities_user_id_foreign` (`user_id`);

--
-- Indexes for table `mast_organs`
--
ALTER TABLE `mast_organs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_organs_user_id_foreign` (`user_id`);

--
-- Indexes for table `mast_powers`
--
ALTER TABLE `mast_powers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_powers_user_id_foreign` (`user_id`);

--
-- Indexes for table `mast_tests`
--
ALTER TABLE `mast_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `medication_schedules`
--
ALTER TABLE `medication_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medication_schedules_case_registry_id_foreign` (`case_registry_id`),
  ADD KEY `medication_schedules_mast_equipment_id_foreign` (`mast_equipment_id`),
  ADD KEY `medication_schedules_mast_power_id_foreign` (`mast_power_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `optionsal_questions`
--
ALTER TABLE `optionsal_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `optionsal_questions_case_registry_id_foreign` (`case_registry_id`);

--
-- Indexes for table `other_personal_information`
--
ALTER TABLE `other_personal_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_personal_information_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `random_uploader_tools`
--
ALTER TABLE `random_uploader_tools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `random_uploader_tools_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `restrictions`
--
ALTER TABLE `restrictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restrictions_case_registry_id_foreign` (`case_registry_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sensitive_information`
--
ALTER TABLE `sensitive_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensitive_information_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `surgical_interventions`
--
ALTER TABLE `surgical_interventions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgical_interventions_case_registry_id_foreign` (`case_registry_id`);

--
-- Indexes for table `treatment_profiles`
--
ALTER TABLE `treatment_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_profiles_case_registry_id_foreign` (`case_registry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_unique_patient_id_unique` (`unique_patient_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccinations_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `vaccination_covids`
--
ALTER TABLE `vaccination_covids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccination_covids_patient_id_foreign` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_pressure_profilings`
--
ALTER TABLE `blood_pressure_profilings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_sugar_profilings`
--
ALTER TABLE `blood_sugar_profilings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_complaints`
--
ALTER TABLE `case_complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_registries`
--
ALTER TABLE `case_registries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `covid_certificates`
--
ALTER TABLE `covid_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_appointment_details`
--
ALTER TABLE `doctor_appointment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_profiles`
--
ALTER TABLE `general_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genetic_disease_profiles`
--
ALTER TABLE `genetic_disease_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mast_complaints`
--
ALTER TABLE `mast_complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mast_equipment`
--
ALTER TABLE `mast_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mast_nationalities`
--
ALTER TABLE `mast_nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `mast_organs`
--
ALTER TABLE `mast_organs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `mast_powers`
--
ALTER TABLE `mast_powers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mast_tests`
--
ALTER TABLE `mast_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `medication_schedules`
--
ALTER TABLE `medication_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `optionsal_questions`
--
ALTER TABLE `optionsal_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_personal_information`
--
ALTER TABLE `other_personal_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `random_uploader_tools`
--
ALTER TABLE `random_uploader_tools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restrictions`
--
ALTER TABLE `restrictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sensitive_information`
--
ALTER TABLE `sensitive_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgical_interventions`
--
ALTER TABLE `surgical_interventions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment_profiles`
--
ALTER TABLE `treatment_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_covids`
--
ALTER TABLE `vaccination_covids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_pressure_profilings`
--
ALTER TABLE `blood_pressure_profilings`
  ADD CONSTRAINT `blood_pressure_profilings_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blood_sugar_profilings`
--
ALTER TABLE `blood_sugar_profilings`
  ADD CONSTRAINT `blood_sugar_profilings_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_complaints`
--
ALTER TABLE `case_complaints`
  ADD CONSTRAINT `case_complaints_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `case_complaints_mast_complaint_id_foreign` FOREIGN KEY (`mast_complaint_id`) REFERENCES `mast_complaints` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_registries`
--
ALTER TABLE `case_registries`
  ADD CONSTRAINT `case_registries_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `covid_certificates`
--
ALTER TABLE `covid_certificates`
  ADD CONSTRAINT `covid_certificates_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD CONSTRAINT `doctor_appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_appointment_details`
--
ALTER TABLE `doctor_appointment_details`
  ADD CONSTRAINT `doctor_appointment_details_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_profiles`
--
ALTER TABLE `general_profiles`
  ADD CONSTRAINT `general_profiles_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `genetic_disease_profiles`
--
ALTER TABLE `genetic_disease_profiles`
  ADD CONSTRAINT `genetic_disease_profiles_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD CONSTRAINT `lab_tests_mast_organ_id_foreign` FOREIGN KEY (`mast_organ_id`) REFERENCES `mast_organs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_tests_mast_test_id_foreign` FOREIGN KEY (`mast_test_id`) REFERENCES `mast_tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_tests_treatment_profile_id_foreign` FOREIGN KEY (`treatment_profile_id`) REFERENCES `treatment_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_complaints`
--
ALTER TABLE `mast_complaints`
  ADD CONSTRAINT `mast_complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_equipment`
--
ALTER TABLE `mast_equipment`
  ADD CONSTRAINT `mast_equipment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_nationalities`
--
ALTER TABLE `mast_nationalities`
  ADD CONSTRAINT `mast_nationalities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_organs`
--
ALTER TABLE `mast_organs`
  ADD CONSTRAINT `mast_organs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_powers`
--
ALTER TABLE `mast_powers`
  ADD CONSTRAINT `mast_powers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_tests`
--
ALTER TABLE `mast_tests`
  ADD CONSTRAINT `mast_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medication_schedules`
--
ALTER TABLE `medication_schedules`
  ADD CONSTRAINT `medication_schedules_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medication_schedules_mast_equipment_id_foreign` FOREIGN KEY (`mast_equipment_id`) REFERENCES `mast_equipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medication_schedules_mast_power_id_foreign` FOREIGN KEY (`mast_power_id`) REFERENCES `mast_powers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `optionsal_questions`
--
ALTER TABLE `optionsal_questions`
  ADD CONSTRAINT `optionsal_questions_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_personal_information`
--
ALTER TABLE `other_personal_information`
  ADD CONSTRAINT `other_personal_information_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `random_uploader_tools`
--
ALTER TABLE `random_uploader_tools`
  ADD CONSTRAINT `random_uploader_tools_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restrictions`
--
ALTER TABLE `restrictions`
  ADD CONSTRAINT `restrictions_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sensitive_information`
--
ALTER TABLE `sensitive_information`
  ADD CONSTRAINT `sensitive_information_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surgical_interventions`
--
ALTER TABLE `surgical_interventions`
  ADD CONSTRAINT `surgical_interventions_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `treatment_profiles`
--
ALTER TABLE `treatment_profiles`
  ADD CONSTRAINT `treatment_profiles_case_registry_id_foreign` FOREIGN KEY (`case_registry_id`) REFERENCES `case_registries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vaccination_covids`
--
ALTER TABLE `vaccination_covids`
  ADD CONSTRAINT `vaccination_covids_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
