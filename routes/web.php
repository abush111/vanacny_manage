<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Structure\OrganizationsController;
use App\Http\Controllers\Setting\SettingsController;
use App\Http\Controllers\Setting\OrganizationLocationsController;
use App\Http\Controllers\Setting\JobCategoriesController;
use App\Http\Controllers\Setting\JobTitleCategoriesController;
use App\Http\Controllers\Setting\JobTypesController;
use App\Http\Controllers\Setting\LanguagesController;
use App\Http\Controllers\Setting\LanguageLevelsController;
use App\Http\Controllers\Setting\MaritalStatusesController;
use App\Http\Controllers\Setting\NationalitiesController;
use App\Http\Controllers\Setting\ReligionsController;
use App\Http\Controllers\Setting\RegionsController;
use App\Http\Controllers\Setting\ZonesController;
use App\Http\Controllers\Setting\WoredasController;
use App\Http\Controllers\Setting\SkillCategoriesController;
use App\Http\Controllers\Setting\RelationshipsController;
use App\Http\Controllers\Setting\EmployeeStatusesController;
use App\Http\Controllers\Setting\AddressTypesController;
use App\Http\Controllers\Setting\ExperienceTypesController;
use App\Http\Controllers\Setting\LicenseTypesController;
use App\Http\Controllers\Setting\EducationLevelsController;
use App\Http\Controllers\Setting\EducationalInstitutesController;
use App\Http\Controllers\Setting\EducationalFieldsController;
use App\Http\Controllers\Setting\DisasterCausesController;
use App\Http\Controllers\Setting\SexesController;
use App\Http\Controllers\Setting\TemplateTypesController;
use App\Http\Controllers\Setting\TemplatesController;
use App\Http\Controllers\Setting\TitlesController;
use App\Http\Controllers\Setting\BanksController;
use App\Http\Controllers\Setting\BankAccountTypesController;
use App\Http\Controllers\Setting\DisabilityTypesController;
use App\Http\Controllers\Setting\GPAScalesController;
use App\Http\Controllers\Setting\AwardTypesController;
use App\Http\Controllers\Setting\CommitmentForsController;
use App\Http\Controllers\Setting\LeftReasonsController;
use App\Http\Controllers\Setting\DisasterSeveritiesController;
use App\Http\Controllers\Setting\CertificationVendorsController;
use App\Http\Controllers\Structure\OrganizationUnitsController;
use App\Http\Controllers\Help\HelpsController;
use App\Http\Controllers\Payment\SalaryScalesController;
use App\Http\Controllers\Payment\SalaryHeightsController;
use App\Http\Controllers\Job\JobPositionsController;
use App\Http\Controllers\Employee\EmployeesController;
use App\Http\Controllers\Employee\EmployeeAdditionalInfosController;
use App\Http\Controllers\Employee\EmployeeAddressesController;
use App\Http\Controllers\Employee\EmployeeAdministrativePunishmentsController;
use App\Http\Controllers\Employee\EmployeeBankAccountsController;
use App\Http\Controllers\Employee\EmployeeDisabilitiesController;
use App\Http\Controllers\Employee\EmployeeEducationsController;
use App\Http\Controllers\Employee\EmployeeEmergenciesController;
use App\Http\Controllers\Employee\EmployeeFamiliesController;
use App\Http\Controllers\Employee\EmployeeJudiciaryPunishmentsController;
use App\Http\Controllers\Employee\EmployeeLanguagesController;
use App\Http\Controllers\Employee\EmployeeLicensesController;
use App\Http\Controllers\Employee\EmployeeExperiencesController;
use App\Http\Controllers\Employee\EmployeeDisastersController;
use App\Http\Controllers\Employee\EmployeeCertificationsController;
use App\Http\Controllers\Employee\EmployeeAwardsController;
use App\Http\Controllers\Employee\EmployeeStudyTrainingsController;
use App\Http\Controllers\Employee\EmployeeFilesController;
use App\Http\Controllers\Report\ReportsController;
use App\Http\Controllers\SystemExceptionsController;
use App\Http\Controllers\User\PermissionsController;
use App\Http\Controllers\User\RolesController;
use App\Http\Controllers\Leave\LeaveTypesController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartController2;
use App\Http\Controllers\ChartController3;
use App\Http\Controllers\ChartController4;
use App\Http\Controllers\Graph\EmployeeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\LeadershipSummaryFormController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BiographiesController;
use App\Http\Controllers\CompetencylistsController;
use App\Http\Controllers\CompetencyWeightsController;
use App\Http\Controllers\CompetencyWeightCompetencylistsController;
use App\Http\Controllers\YearsettingsController;
use App\Http\Controllers\ExpertevaluationsController;
use App\Http\Controllers\PeersevaluationsController;
use App\Http\Controllers\ImmediateevaluationsController;
use App\Http\Controllers\AveragesController;
use App\Http\Controllers\PerformancesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\AdminsController;
//show the login view
Route::get('/', [AuthController::class, 'index'])->name('login');
//Authenticate a user
Route::post('/', [AuthController::class, 'authenticate'])->name('auth.authenticate');
//logout the user
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
//show user details
Route::get('/admin', [AuthController::class, 'show'])->name('auth.show');
Route::resource('/users', AdminsController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
use App\Http\Controllers\EmployeecompetenciesController;
use App\Http\Controllers\LeaderevaluationstatusesController;

Route::middleware(['auth'])->group(function () {
    Route::get('/role_register', 'App\Http\Controllers\Jobs\JobsController@registered');
    Route::get('/jobppost', 'App\Http\Controllers\Jobs\PostjobbackController@postman');
    Route::get('/postEdit/{art_objs_id}', 'App\Http\Controllers\Jobs\PostjobbackController@edit');
    Route::post('jobppost', 'App\Http\Controllers\Jobs\PostjobbackController@store');
    Route::get('postview', 'App\Http\Controllers\Jobs\PostjobbackController@postsview');
    Route::get('viewpost', 'App\Http\Controllers\Jobs\ViewjobbackController@views');
    Route::get('/deletepost/{id}', 'App\Http\Controllers\Jobs\PostjobbackController@delete');
    Route::get('/work', 'App\Http\Controllers\Jobs\JobbacknkController@worked');
    Route::put('/update_post/{art_objs_id}', 'App\Http\Controllers\Jobs\PostjobbackController@update');
    
    Route::get('/delete/{id}', 'App\Http\Controllers\Jobs\JobsController@delete');
    Route::get('/download/{Attachement}', 'App\Http\Controllers\Jobs\JobsController@download');
    Route::get('/view/{Attachement}', 'App\Http\Controllers\Jobs\JobsController@view');
    Route::get('/viewman/{Education}', 'App\Http\Controllers\Jobs\JobsController@viewman');
    
    Route::get('get/{filename}', [JobsController::class, 'getFile'])->name('getfile');
    Route::get('/personal', 'App\Http\Controllers\Jobs\JobpersonkController@registered');
    Route::get('/destory/{id}', 'App\Http\Controllers\Jobs\JobpersonkController@destory');
    Route::get('/remove/{id}', 'App\Http\Controllers\Jobs\JobbacknkController@destory');
    Route::view('/registers','registers')->name('registers');
    Route::view('/registration-success','registration-success')->name('registration.success');

   
    Route::group([
        'prefix' => 'organizations',
    ], function () {
        Route::get('/', [OrganizationsController::class, 'index'])->name('organizations.organization.index');
        Route::get('/create', [OrganizationsController::class, 'create'])->name('organizations.organization.create');
        Route::get('/structure', [OrganizationsController::class, 'structure'])->name('organizations.organization.structure');
        Route::get('/show/{organization}', [OrganizationsController::class, 'show'])->name('organizations.organization.show')->whereNumber('id');
        Route::get('/{organization}/edit', [OrganizationsController::class, 'edit'])->name('organizations.organization.edit')->whereNumber('id');
        Route::post('/', [OrganizationsController::class, 'store'])->name('organizations.organization.store');
        Route::put('organization/{organization}', [OrganizationsController::class, 'update'])->name('organizations.organization.update')->whereNumber('id');
        Route::delete('/organization/{organization}', [OrganizationsController::class, 'destroy'])->name('organizations.organization.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings',
    ], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.setting.index');
    });

    Route::group([
        'prefix' => 'settings/organization_locations',
    ], function () {
        Route::get('/', [OrganizationLocationsController::class, 'index'])->name('organization_locations.organization_location.index');
        Route::get('/create', [OrganizationLocationsController::class, 'create'])->name('organization_locations.organization_location.create');
        Route::get('/{organizationLocation}/edit', [OrganizationLocationsController::class, 'edit'])->name('organization_locations.organization_location.edit')->whereNumber('id');
        Route::post('/', [OrganizationLocationsController::class, 'store'])->name('organization_locations.organization_location.store');
        Route::put('organization_location/{organizationLocation}', [OrganizationLocationsController::class, 'update'])->name('organization_locations.organization_location.update')->whereNumber('id');
        Route::post('/delete/{organizationLocation}', [OrganizationLocationsController::class, 'destroy'])->name('organization_locations.organization_location.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/job_category',
    ], function () {
        Route::get('/', [JobCategoriesController::class, 'index'])->name('job_categories.job_category.index');
        Route::get('/create', [JobCategoriesController::class, 'create'])->name('job_categories.job_category.create');
        Route::get('/{jobCategory}/edit', [JobCategoriesController::class, 'edit'])->name('job_categories.job_category.edit')->whereNumber('id');
        Route::post('/', [JobCategoriesController::class, 'store'])->name('job_categories.job_category.store');
        Route::put('job_category/{jobCategory}', [JobCategoriesController::class, 'update'])->name('job_categories.job_category.update')->whereNumber('id');
        Route::post('/delete/{jobCategory}', [JobCategoriesController::class, 'destroy'])->name('job_categories.job_category.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/job_title_categories',
    ], function () {
        Route::get('/', [JobTitleCategoriesController::class, 'index'])->name('job_title_categories.job_title_category.index');
        Route::get('/create', [JobTitleCategoriesController::class, 'create'])->name('job_title_categories.job_title_category.create');
        Route::get('/{jobTitleCategory}/edit', [JobTitleCategoriesController::class, 'edit'])->name('job_title_categories.job_title_category.edit')->whereNumber('id');
        Route::post('/', [JobTitleCategoriesController::class, 'store'])->name('job_title_categories.job_title_category.store');
        Route::put('job_title_category/{jobTitleCategory}', [JobTitleCategoriesController::class, 'update'])->name('job_title_categories.job_title_category.update')->whereNumber('id');
        Route::post('/delete/{jobTitleCategory}', [JobTitleCategoriesController::class, 'destroy'])->name('job_title_categories.job_title_category.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/job_types',
    ], function () {
        Route::get('/', [JobTypesController::class, 'index'])->name('job_types.job_type.index');
        Route::get('/create', [JobTypesController::class, 'create'])->name('job_types.job_type.create');
        Route::get('/{jobType}/edit', [JobTypesController::class, 'edit'])->name('job_types.job_type.edit')->whereNumber('id');
        Route::post('/', [JobTypesController::class, 'store'])->name('job_types.job_type.store');
        Route::put('job_type/{jobType}', [JobTypesController::class, 'update'])->name('job_types.job_type.update')->whereNumber('id');
        Route::post('/delete/{jobType}', [JobTypesController::class, 'destroy'])->name('job_types.job_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/languages',
    ], function () {
        Route::get('/', [LanguagesController::class, 'index'])->name('languages.language.index');
        Route::get('/create', [LanguagesController::class, 'create'])->name('languages.language.create');
        Route::get('/{language}/edit', [LanguagesController::class, 'edit'])->name('languages.language.edit')->whereNumber('id');
        Route::post('/', [LanguagesController::class, 'store'])->name('languages.language.store');
        Route::put('language/{language}', [LanguagesController::class, 'update'])->name('languages.language.update')->whereNumber('id');
        Route::post('/delete/{language}', [LanguagesController::class, 'destroy'])->name('languages.language.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/language_levels',
    ], function () {
        Route::get('/', [LanguageLevelsController::class, 'index'])->name('language_levels.language_level.index');
        Route::get('/create', [LanguageLevelsController::class, 'create'])->name('language_levels.language_level.create');
        Route::get('/{languageLevel}/edit', [LanguageLevelsController::class, 'edit'])->name('language_levels.language_level.edit')->whereNumber('id');
        Route::post('/', [LanguageLevelsController::class, 'store'])->name('language_levels.language_level.store');
        Route::put('language_level/{languageLevel}', [LanguageLevelsController::class, 'update'])->name('language_levels.language_level.update')->whereNumber('id');
        Route::post('/delete/{languageLevel}', [LanguageLevelsController::class, 'destroy'])->name('language_levels.language_level.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/marital_statuses',
    ], function () {
        Route::get('/', [MaritalStatusesController::class, 'index'])->name('marital_statuses.marital_status.index');
        Route::get('/create', [MaritalStatusesController::class, 'create'])->name('marital_statuses.marital_status.create');
        Route::get('/{maritalStatus}/edit', [MaritalStatusesController::class, 'edit'])->name('marital_statuses.marital_status.edit')->whereNumber('id');
        Route::post('/', [MaritalStatusesController::class, 'store'])->name('marital_statuses.marital_status.store');
        Route::put('marital_status/{maritalStatus}', [MaritalStatusesController::class, 'update'])->name('marital_statuses.marital_status.update')->whereNumber('id');
        Route::post('/delete/{maritalStatus}', [MaritalStatusesController::class, 'destroy'])->name('marital_statuses.marital_status.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/nationalities',
    ], function () {
        Route::get('/', [NationalitiesController::class, 'index'])->name('nationalities.nationality.index');
        Route::get('/create', [NationalitiesController::class, 'create'])->name('nationalities.nationality.create');
        Route::get('/{nationality}/edit', [NationalitiesController::class, 'edit'])->name('nationalities.nationality.edit')->whereNumber('id');
        Route::post('/', [NationalitiesController::class, 'store'])->name('nationalities.nationality.store');
        Route::put('nationality/{nationality}', [NationalitiesController::class, 'update'])->name('nationalities.nationality.update')->whereNumber('id');
        Route::post('/delete/{nationality}', [NationalitiesController::class, 'destroy'])->name('nationalities.nationality.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/religions',
    ], function () {
        Route::get('/', [ReligionsController::class, 'index'])->name('religions.religion.index');
        Route::get('/create', [ReligionsController::class, 'create'])->name('religions.religion.create');
        Route::get('/{religion}/edit', [ReligionsController::class, 'edit'])->name('religions.religion.edit')->whereNumber('id');
        Route::post('/', [ReligionsController::class, 'store'])->name('religions.religion.store');
        Route::put('religion/{religion}', [ReligionsController::class, 'update'])->name('religions.religion.update')->whereNumber('id');
        Route::post('/delete/{religion}', [ReligionsController::class, 'destroy'])->name('religions.religion.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/regions',
    ], function () {
        Route::get('/', [RegionsController::class, 'index'])->name('regions.region.index');
        Route::get('/create', [RegionsController::class, 'create'])->name('regions.region.create');
        Route::get('/{region}/edit', [RegionsController::class, 'edit'])->name('regions.region.edit')->whereNumber('id');
        Route::post('/', [RegionsController::class, 'store'])->name('regions.region.store');
        Route::put('region/{region}', [RegionsController::class, 'update'])->name('regions.region.update')->whereNumber('id');
        Route::post('/delete/{region}', [RegionsController::class, 'destroy'])->name('regions.region.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/zones',
    ], function () {
        Route::get('/', [ZonesController::class, 'index'])->name('zones.zone.index');
        Route::get('/create', [ZonesController::class, 'create'])->name('zones.zone.create');
        Route::get('/{zone}/edit', [ZonesController::class, 'edit'])->name('zones.zone.edit')->whereNumber('id');
        Route::post('/', [ZonesController::class, 'store'])->name('zones.zone.store');
        Route::put('zone/{zone}', [ZonesController::class, 'update'])->name('zones.zone.update')->whereNumber('id');
        Route::post('/delete/{zone}', [ZonesController::class, 'destroy'])->name('zones.zone.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/woredas',
    ], function () {
        Route::get('/', [WoredasController::class, 'index'])->name('woredas.woreda.index');
        Route::get('/create', [WoredasController::class, 'create'])->name('woredas.woreda.create');
        Route::get('/{woreda}/edit', [WoredasController::class, 'edit'])->name('woredas.woreda.edit')->whereNumber('id');
        Route::post('/', [WoredasController::class, 'store'])->name('woredas.woreda.store');
        Route::put('woreda/{woreda}', [WoredasController::class, 'update'])->name('woredas.woreda.update')->whereNumber('id');
        Route::post('/delete/{woreda}', [WoredasController::class, 'destroy'])->name('woredas.woreda.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/skill_categories',
    ], function () {
        Route::get('/', [SkillCategoriesController::class, 'index'])->name('skill_categories.skill_category.index');
        Route::get('/create', [SkillCategoriesController::class, 'create'])->name('skill_categories.skill_category.create');
        Route::get('/{skillCategory}/edit', [SkillCategoriesController::class, 'edit'])->name('skill_categories.skill_category.edit')->whereNumber('id');
        Route::post('/', [SkillCategoriesController::class, 'store'])->name('skill_categories.skill_category.store');
        Route::put('skill_category/{skillCategory}', [SkillCategoriesController::class, 'update'])->name('skill_categories.skill_category.update')->whereNumber('id');
        Route::post('/delete/{skillCategory}', [SkillCategoriesController::class, 'destroy'])->name('skill_categories.skill_category.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/relationships',
    ], function () {
        Route::get('/', [RelationshipsController::class, 'index'])->name('relationships.relationship.index');
        Route::get('/create', [RelationshipsController::class, 'create'])->name('relationships.relationship.create');
        Route::get('/{relationship}/edit', [RelationshipsController::class, 'edit'])->name('relationships.relationship.edit')->whereNumber('id');
        Route::post('/', [RelationshipsController::class, 'store'])->name('relationships.relationship.store');
        Route::put('relationship/{relationship}', [RelationshipsController::class, 'update'])->name('relationships.relationship.update')->whereNumber('id');
        Route::post('/delete/{relationship}', [RelationshipsController::class, 'destroy'])->name('relationships.relationship.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/employee_statuses',
    ], function () {
        Route::get('/', [EmployeeStatusesController::class, 'index'])->name('employee_statuses.employee_status.index');
        Route::get('/create', [EmployeeStatusesController::class, 'create'])->name('employee_statuses.employee_status.create');
        Route::get('/{employeeStatus}/edit', [EmployeeStatusesController::class, 'edit'])->name('employee_statuses.employee_status.edit')->whereNumber('id');
        Route::post('/', [EmployeeStatusesController::class, 'store'])->name('employee_statuses.employee_status.store');
        Route::put('employee_status/{employeeStatus}', [EmployeeStatusesController::class, 'update'])->name('employee_statuses.employee_status.update')->whereNumber('id');
        Route::post('/delete/{employeeStatus}', [EmployeeStatusesController::class, 'destroy'])->name('employee_statuses.employee_status.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/address_types',
    ], function () {
        Route::get('/', [AddressTypesController::class, 'index'])->name('address_types.address_type.index');
        Route::get('/create', [AddressTypesController::class, 'create'])->name('address_types.address_type.create');
        Route::get('/{addressType}/edit', [AddressTypesController::class, 'edit'])->name('address_types.address_type.edit')->whereNumber('id');
        Route::post('/', [AddressTypesController::class, 'store'])->name('address_types.address_type.store');
        Route::put('address_type/{addressType}', [AddressTypesController::class, 'update'])->name('address_types.address_type.update')->whereNumber('id');
        Route::post('/delete/{addressType}', [AddressTypesController::class, 'destroy'])->name('address_types.address_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/experience_types',
    ], function () {
        Route::get('/', [ExperienceTypesController::class, 'index'])->name('experience_types.experience_type.index');
        Route::get('/create', [ExperienceTypesController::class, 'create'])->name('experience_types.experience_type.create');
        Route::get('/{experienceType}/edit', [ExperienceTypesController::class, 'edit'])->name('experience_types.experience_type.edit')->whereNumber('id');
        Route::post('/', [ExperienceTypesController::class, 'store'])->name('experience_types.experience_type.store');
        Route::put('experience_type/{experienceType}', [ExperienceTypesController::class, 'update'])->name('experience_types.experience_type.update')->whereNumber('id');
        Route::post('/delete/{experienceType}', [ExperienceTypesController::class, 'destroy'])->name('experience_types.experience_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/license_types',
    ], function () {
        Route::get('/', [LicenseTypesController::class, 'index'])->name('license_types.license_type.index');
        Route::get('/create', [LicenseTypesController::class, 'create'])->name('license_types.license_type.create');
        Route::get('/{licenseType}/edit', [LicenseTypesController::class, 'edit'])->name('license_types.license_type.edit')->whereNumber('id');
        Route::post('/', [LicenseTypesController::class, 'store'])->name('license_types.license_type.store');
        Route::put('license_type/{licenseType}', [LicenseTypesController::class, 'update'])->name('license_types.license_type.update')->whereNumber('id');
        Route::post('/delete/{licenseType}', [LicenseTypesController::class, 'destroy'])->name('license_types.license_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/education_levels',
    ], function () {
        Route::get('/', [EducationLevelsController::class, 'index'])->name('education_levels.education_level.index');
        Route::get('/create', [EducationLevelsController::class, 'create'])->name('education_levels.education_level.create');
        Route::get('/{educationLevel}/edit', [EducationLevelsController::class, 'edit'])->name('education_levels.education_level.edit')->whereNumber('id');
        Route::post('/', [EducationLevelsController::class, 'store'])->name('education_levels.education_level.store');
        Route::put('education_level/{educationLevel}', [EducationLevelsController::class, 'update'])->name('education_levels.education_level.update')->whereNumber('id');
        Route::post('/delete/{educationLevel}', [EducationLevelsController::class, 'destroy'])->name('education_levels.education_level.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/educational_institutes',
    ], function () {
        Route::get('/', [EducationalInstitutesController::class, 'index'])->name('educational_institutes.educational_institute.index');
        Route::get('/create', [EducationalInstitutesController::class, 'create'])->name('educational_institutes.educational_institute.create');
        Route::get('/{educationalInstitute}/edit', [EducationalInstitutesController::class, 'edit'])->name('educational_institutes.educational_institute.edit')->whereNumber('id');
        Route::post('/', [EducationalInstitutesController::class, 'store'])->name('educational_institutes.educational_institute.store');
        Route::put('educational_institute/{educationalInstitute}', [EducationalInstitutesController::class, 'update'])->name('educational_institutes.educational_institute.update')->whereNumber('id');
        Route::post('/delete/{educationalInstitute}', [EducationalInstitutesController::class, 'destroy'])->name('educational_institutes.educational_institute.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/educational_fields',
    ], function () {
        Route::get('/', [EducationalFieldsController::class, 'index'])->name('educational_fields.educational_field.index');
        Route::get('/create', [EducationalFieldsController::class, 'create'])->name('educational_fields.educational_field.create');
        Route::get('/{educationalField}/edit', [EducationalFieldsController::class, 'edit'])->name('educational_fields.educational_field.edit')->whereNumber('id');
        Route::post('/', [EducationalFieldsController::class, 'store'])->name('educational_fields.educational_field.store');
        Route::put('educational_field/{educationalField}', [EducationalFieldsController::class, 'update'])->name('educational_fields.educational_field.update')->whereNumber('id');
        Route::post('/delete/{educationalField}', [EducationalFieldsController::class, 'destroy'])->name('educational_fields.educational_field.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/disaster_causes',
    ], function () {
        Route::get('/', [DisasterCausesController::class, 'index'])->name('disaster_causes.disaster_cause.index');
        Route::get('/create', [DisasterCausesController::class, 'create'])->name('disaster_causes.disaster_cause.create');
        Route::get('/{disasterCause}/edit', [DisasterCausesController::class, 'edit'])->name('disaster_causes.disaster_cause.edit')->whereNumber('id');
        Route::post('/', [DisasterCausesController::class, 'store'])->name('disaster_causes.disaster_cause.store');
        Route::put('disaster_cause/{disasterCause}', [DisasterCausesController::class, 'update'])->name('disaster_causes.disaster_cause.update')->whereNumber('id');
        Route::post('/delete/{disasterCause}', [DisasterCausesController::class, 'destroy'])->name('disaster_causes.disaster_cause.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/sexes',
    ], function () {
        Route::get('/', [SexesController::class, 'index'])->name('sexes.sex.index');
        Route::get('/create', [SexesController::class, 'create'])->name('sexes.sex.create');
        Route::get('/{sex}/edit', [SexesController::class, 'edit'])->name('sexes.sex.edit')->whereNumber('id');
        Route::post('/', [SexesController::class, 'store'])->name('sexes.sex.store');
        Route::put('sex/{sex}', [SexesController::class, 'update'])->name('sexes.sex.update')->whereNumber('id');
        Route::post('/delete/{sex}', [SexesController::class, 'destroy'])->name('sexes.sex.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/template_types',
    ], function () {
        Route::get('/', [TemplateTypesController::class, 'index'])->name('template_types.template_type.index');
        Route::get('/create', [TemplateTypesController::class, 'create'])->name('template_types.template_type.create');
        Route::get('/{templateType}/edit', [TemplateTypesController::class, 'edit'])->name('template_types.template_type.edit')->whereNumber('id');
        Route::post('/', [TemplateTypesController::class, 'store'])->name('template_types.template_type.store');
        Route::put('template_type/{templateType}', [TemplateTypesController::class, 'update'])->name('template_types.template_type.update')->whereNumber('id');
        Route::post('/delete/{templateType}', [TemplateTypesController::class, 'destroy'])->name('template_types.template_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/templates',
    ], function () {
        Route::get('/', [TemplatesController::class, 'index'])->name('templates.template.index');
        Route::get('/create', [TemplatesController::class, 'create'])->name('templates.template.create');
        Route::get('/show/{template}', [TemplatesController::class, 'show'])->name('templates.template.show')->whereNumber('id');
        Route::get('/{template}/edit', [TemplatesController::class, 'edit'])->name('templates.template.edit')->whereNumber('id');
        Route::post('/', [TemplatesController::class, 'store'])->name('templates.template.store');
        Route::put('template/{template}', [TemplatesController::class, 'update'])->name('templates.template.update')->whereNumber('id');
        Route::post('/delete/{template}', [TemplatesController::class, 'destroy'])->name('templates.template.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/titles',
    ], function () {
        Route::get('/', [TitlesController::class, 'index'])->name('titles.title.index');
        Route::get('/create', [TitlesController::class, 'create'])->name('titles.title.create');
        Route::get('/{title}/edit', [TitlesController::class, 'edit'])->name('titles.title.edit')->whereNumber('id');
        Route::post('/', [TitlesController::class, 'store'])->name('titles.title.store');
        Route::put('title/{title}', [TitlesController::class, 'update'])->name('titles.title.update')->whereNumber('id');
        Route::post('/delete/{title}', [TitlesController::class, 'destroy'])->name('titles.title.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/banks',
    ], function () {
        Route::get('/', [BanksController::class, 'index'])->name('banks.bank.index');
        Route::get('/create', [BanksController::class, 'create'])->name('banks.bank.create');
        Route::get('/{bank}/edit', [BanksController::class, 'edit'])->name('banks.bank.edit')->whereNumber('id');
        Route::post('/', [BanksController::class, 'store'])->name('banks.bank.store');
        Route::put('bank/{bank}', [BanksController::class, 'update'])->name('banks.bank.update')->whereNumber('id');
        Route::post('/delete/{bank}', [BanksController::class, 'destroy'])->name('banks.bank.destroy')->whereNumber('id');
    });


    Route::group([
        'prefix' => 'settings/bank_account_types',
    ], function () {
        Route::get('/', [BankAccountTypesController::class, 'index'])->name('bank_account_types.bank_account_type.index');
        Route::get('/create', [BankAccountTypesController::class, 'create'])->name('bank_account_types.bank_account_type.create');
        Route::get('/{bankAccountType}/edit', [BankAccountTypesController::class, 'edit'])->name('bank_account_types.bank_account_type.edit')->whereNumber('id');
        Route::post('/', [BankAccountTypesController::class, 'store'])->name('bank_account_types.bank_account_type.store');
        Route::put('bank_account_type/{bankAccountType}', [BankAccountTypesController::class, 'update'])->name('bank_account_types.bank_account_type.update')->whereNumber('id');
        Route::post('/delete/{bankAccountType}', [BankAccountTypesController::class, 'destroy'])->name('bank_account_types.bank_account_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/disability_types',
    ], function () {
        Route::get('/', [DisabilityTypesController::class, 'index'])->name('disability_types.disability_type.index');
        Route::get('/create', [DisabilityTypesController::class, 'create'])->name('disability_types.disability_type.create');
        Route::get('/{disabilityType}/edit', [DisabilityTypesController::class, 'edit'])->name('disability_types.disability_type.edit')->whereNumber('id');
        Route::post('/', [DisabilityTypesController::class, 'store'])->name('disability_types.disability_type.store');
        Route::put('disability_type/{disabilityType}', [DisabilityTypesController::class, 'update'])->name('disability_types.disability_type.update')->whereNumber('id');
        Route::post('/delete/{disabilityType}', [DisabilityTypesController::class, 'destroy'])->name('disability_types.disability_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/gpa_scales',
    ], function () {
        Route::get('/', [GPAScalesController::class, 'index'])->name('gpa_scales.gpa_scale.index');
        Route::get('/create', [GPAScalesController::class, 'create'])->name('gpa_scales.gpa_scale.create');
        Route::get('/{gPAScale}/edit', [GPAScalesController::class, 'edit'])->name('gpa_scales.gpa_scale.edit')->whereNumber('id');
        Route::post('/', [GPAScalesController::class, 'store'])->name('gpa_scales.gpa_scale.store');
        Route::put('gpa_scale/{gPAScale}', [GPAScalesController::class, 'update'])->name('gpa_scales.gpa_scale.update')->whereNumber('id');
        Route::post('/delete/{gPAScale}', [GPAScalesController::class, 'destroy'])->name('gpa_scales.gpa_scale.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/award_types',
    ], function () {
        Route::get('/', [AwardTypesController::class, 'index'])->name('award_types.award_type.index');
        Route::get('/create', [AwardTypesController::class, 'create'])->name('award_types.award_type.create');
        Route::get('/{awardType}/edit', [AwardTypesController::class, 'edit'])->name('award_types.award_type.edit')->whereNumber('id');
        Route::post('/', [AwardTypesController::class, 'store'])->name('award_types.award_type.store');
        Route::put('award_type/{awardType}', [AwardTypesController::class, 'update'])->name('award_types.award_type.update')->whereNumber('id');
        Route::post('/delete/{awardType}', [AwardTypesController::class, 'destroy'])->name('award_types.award_type.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/commitment_fors',
    ], function () {
        Route::get('/', [CommitmentForsController::class, 'index'])->name('commitment_fors.commitment_for.index');
        Route::get('/create', [CommitmentForsController::class, 'create'])->name('commitment_fors.commitment_for.create');
        Route::get('/{commitmentFor}/edit', [CommitmentForsController::class, 'edit'])->name('commitment_fors.commitment_for.edit')->whereNumber('id');
        Route::post('/', [CommitmentForsController::class, 'store'])->name('commitment_fors.commitment_for.store');
        Route::put('commitment_for/{commitmentFor}', [CommitmentForsController::class, 'update'])->name('commitment_fors.commitment_for.update')->whereNumber('id');
        Route::post('/delete/{commitmentFor}', [CommitmentForsController::class, 'destroy'])->name('commitment_fors.commitment_for.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/left_reasons',
    ], function () {
        Route::get('/', [LeftReasonsController::class, 'index'])->name('left_reasons.left_reason.index');
        Route::get('/create', [LeftReasonsController::class, 'create'])->name('left_reasons.left_reason.create');
        Route::get('/{leftReason}/edit', [LeftReasonsController::class, 'edit'])->name('left_reasons.left_reason.edit')->whereNumber('id');
        Route::post('/', [LeftReasonsController::class, 'store'])->name('left_reasons.left_reason.store');
        Route::put('left_reason/{leftReason}', [LeftReasonsController::class, 'update'])->name('left_reasons.left_reason.update')->whereNumber('id');
        Route::post('/delete/{leftReason}', [LeftReasonsController::class, 'destroy'])->name('left_reasons.left_reason.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/disaster_severities',
    ], function () {
        Route::get('/', [DisasterSeveritiesController::class, 'index'])->name('disaster_severities.disaster_severity.index');
        Route::get('/create', [DisasterSeveritiesController::class, 'create'])->name('disaster_severities.disaster_severity.create');
        Route::get('/{disasterSeverity}/edit', [DisasterSeveritiesController::class, 'edit'])->name('disaster_severities.disaster_severity.edit')->whereNumber('id');
        Route::post('/', [DisasterSeveritiesController::class, 'store'])->name('disaster_severities.disaster_severity.store');
        Route::put('disaster_severity/{disasterSeverity}', [DisasterSeveritiesController::class, 'update'])->name('disaster_severities.disaster_severity.update')->whereNumber('id');
        Route::post('/delete/{disasterSeverity}', [DisasterSeveritiesController::class, 'destroy'])->name('disaster_severities.disaster_severity.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'settings/certification_vendors',
    ], function () {
        Route::get('/', [CertificationVendorsController::class, 'index'])->name('certification_vendors.certification_vendor.index');
        Route::get('/create', [CertificationVendorsController::class, 'create'])->name('certification_vendors.certification_vendor.create');
        Route::get('/{certificationVendor}/edit', [CertificationVendorsController::class, 'edit'])->name('certification_vendors.certification_vendor.edit')->whereNumber('id');
        Route::post('/', [CertificationVendorsController::class, 'store'])->name('certification_vendors.certification_vendor.store');
        Route::put('certification_vendor/{certificationVendor}', [CertificationVendorsController::class, 'update'])->name('certification_vendors.certification_vendor.update')->whereNumber('id');
        Route::post('/delete/{certificationVendor}', [CertificationVendorsController::class, 'destroy'])->name('certification_vendors.certification_vendor.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'organization_units',
    ], function () {
        Route::get('/', [OrganizationUnitsController::class, 'index'])->name('organization_units.organization_unit.index');
        Route::get('/create', [OrganizationUnitsController::class, 'create'])->name('organization_units.organization_unit.create');
        Route::get('/show/{organizationUnit}', [OrganizationUnitsController::class, 'show'])->name('organization_units.organization_unit.show')->whereNumber('id');
        Route::get('/{organization_id}/offices', [OrganizationUnitsController::class, 'offices'])->name('organization_units.organization_unit.offices')->whereNumber('id');
        Route::get('/{organization_id}/employees', [OrganizationUnitsController::class, 'employees'])->name('organization_units.organization_unit.employee')->whereNumber('id');
        Route::get('/{organization_id}/jobs', [OrganizationUnitsController::class, 'jobs'])->name('organization_units.organization_unit.jobs')->whereNumber('id');
        Route::get('/{organizationUnit}/edit', [OrganizationUnitsController::class, 'edit'])->name('organization_units.organization_unit.edit')->whereNumber('id');
        Route::post('/', [OrganizationUnitsController::class, 'store'])->name('organization_units.organization_unit.store');
        Route::post('/filter', [OrganizationUnitsController::class, 'filter'])->name('organization_units.organization_unit.filter');
        Route::put('organization_unit/{organizationUnit}', [OrganizationUnitsController::class, 'update'])->name('organization_units.organization_unit.update')->whereNumber('id');
        Route::delete('/organization_unit/{organizationUnit}', [OrganizationUnitsController::class, 'destroy'])->name('organization_units.organization_unit.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'help',
    ], function () {
        Route::get('/', [HelpsController::class, 'index'])->name('helps.help.index');
        Route::get('/create', [HelpsController::class, 'create'])->name('helps.help.create');
        Route::get('/show/{help}', [HelpsController::class, 'show'])->name('helps.help.show')->whereNumber('id');
        Route::get('/{help}/edit', [HelpsController::class, 'edit'])->name('helps.help.edit')->whereNumber('id');
        Route::post('/', [HelpsController::class, 'store'])->name('helps.help.store');
        Route::post('/filter', [HelpsController::class, 'filter'])->name('helps.help.filter');
        Route::post('/upload', [HelpsController::class, 'upload'])->name('helps.help.upload');
        Route::put('help/{help}', [HelpsController::class, 'update'])->name('helps.help.update')->whereNumber('id');
        Route::delete('/help/{help}', [HelpsController::class, 'destroy'])->name('helps.help.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'salary_scales',
    ], function () {
        Route::get('/', [SalaryScalesController::class, 'index'])->name('salary_scales.salary_scale.index');
        Route::get('/create', [SalaryScalesController::class, 'create'])->name('salary_scales.salary_scale.create');
        Route::get('/show/{salaryScale}', [SalaryScalesController::class, 'show'])->name('salary_scales.salary_scale.show')->whereNumber('id');
        Route::get('/{salaryScale}/edit', [SalaryScalesController::class, 'edit'])->name('salary_scales.salary_scale.edit')->whereNumber('id');
        Route::post('/', [SalaryScalesController::class, 'store'])->name('salary_scales.salary_scale.store');
        Route::put('/edit/{salaryScale}', [SalaryScalesController::class, 'update'])->name('salary_scales.salary_scale.update')->whereNumber('id');
        Route::delete('/delete/{salaryScale}', [SalaryScalesController::class, 'destroy'])->name('salary_scales.salary_scale.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'salary_heights',
    ], function () {
        Route::get('/', [SalaryHeightsController::class, 'index'])->name('salary_heights.salary_height.index');
        Route::get('/create', [SalaryHeightsController::class, 'create'])->name('salary_heights.salary_height.create');
        Route::get('/show/{salaryHeight}', [SalaryHeightsController::class, 'show'])->name('salary_heights.salary_height.show')->whereNumber('id');
        Route::get('/{salaryHeight}/edit', [SalaryHeightsController::class, 'edit'])->name('salary_heights.salary_height.edit')->whereNumber('id');
        Route::post('/', [SalaryHeightsController::class, 'store'])->name('salary_heights.salary_height.store');
        Route::put('/edit/{salaryHeight}', [SalaryHeightsController::class, 'update'])->name('salary_heights.salary_height.update')->whereNumber('id');
        Route::delete('/delete/{salaryHeight}', [SalaryHeightsController::class, 'destroy'])->name('salary_heights.salary_height.destroy')->whereNumber('id');
        Route::post('/salary', [SalaryHeightsController::class, 'addsalary'])->name('salary_heights.salary_height.addsalary');
        Route::post('/salary/update', [SalaryHeightsController::class, 'updatesalary'])->name('salary_heights.salary_height.updatesalary');
        Route::delete('/remove/{salaryHeight}', [SalaryHeightsController::class, 'deletesalary'])->name('salary_heights.salary_height.deletesalary')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'job_positions',
    ], function () {
        Route::get('/', [JobPositionsController::class, 'index'])->name('job_positions.job_position.index');
        Route::get('/benefits', [JobPositionsController::class, 'benefits'])->name('job_positions.job_position.benefits');
        Route::get('/create', [JobPositionsController::class, 'create'])->name('job_positions.job_position.create');
        Route::get('/show/{jobPosition}', [JobPositionsController::class, 'show'])->name('job_positions.job_position.show')->whereNumber('id');
        Route::get('/{jobPosition}/edit', [JobPositionsController::class, 'edit'])->name('job_positions.job_position.edit')->whereNumber('id');
        Route::post('/', [JobPositionsController::class, 'store'])->name('job_positions.job_position.store');
        Route::put('job_position/{jobPosition}', [JobPositionsController::class, 'update'])->name('job_positions.job_position.update')->whereNumber('id');
        Route::delete('/job_position/{jobPosition}', [JobPositionsController::class, 'destroy'])->name('job_positions.job_position.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees',
    ], function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('employees.employee.index');
        Route::get('/filter', [EmployeesController::class, 'filter'])->name('employees.employee.filter');
        Route::get('/{employee}/success', [EmployeesController::class, 'success'])->name('employees.employee.success');
        Route::get('/{employee}/printall', [EmployeesController::class, 'printall'])->name('employees.employee.printall');
        Route::get('/create', [EmployeesController::class, 'create'])->name('employees.employee.create');
        Route::get('/{employee}', [EmployeesController::class, 'show'])->name('employees.employee.show')->whereNumber('id');
        Route::get('/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.employee.edit')->whereNumber('id');
        Route::post('/', [EmployeesController::class, 'store'])->name('employees.employee.store');
        Route::put('employee/{employee}', [EmployeesController::class, 'update'])->name('employees.employee.update')->whereNumber('id');
        Route::delete('/employee/{employee}', [EmployeesController::class, 'destroy'])->name('employees.employee.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/address',
    ], function () {
        Route::get('/', [EmployeeAddressesController::class, 'index'])->name('employee_addresses.employee_address.index');
        Route::get('/create', [EmployeeAddressesController::class, 'create'])->name('employee_addresses.employee_address.create');
        Route::get('/approve/{employeeAddress}', [EmployeeAddressesController::class, 'approve'])->name('employee_addresses.employee_address.approve')->whereNumber('id');
        Route::post('/reject/{employeeAddress}', [EmployeeAddressesController::class, 'reject'])->name('employee_addresses.employee_address.reject')->whereNumber('id');
        Route::get('/edit/{employeeAddress}', [EmployeeAddressesController::class, 'edit'])->name('employee_addresses.employee_address.edit')->whereNumber('id');
        Route::get('/print', [EmployeeAddressesController::class, 'print'])->name('employee_addresses.employee_address.print');
        Route::post('/', [EmployeeAddressesController::class, 'store'])->name('employee_addresses.employee_address.store');
        Route::put('/update/{employeeAddress}', [EmployeeAddressesController::class, 'update'])->name('employee_addresses.employee_address.update')->whereNumber('id');
        Route::delete('/delete/{employeeAddress}', [EmployeeAddressesController::class, 'destroy'])->name('employee_addresses.employee_address.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/bank_account',
    ], function () {
        Route::get('/', [EmployeeBankAccountsController::class, 'index'])->name('employee_bank_accounts.employee_bank_account.index');
        Route::get('/create', [EmployeeBankAccountsController::class, 'create'])->name('employee_bank_accounts.employee_bank_account.create');
        Route::get('/approve/{employeeBankAccount}', [EmployeeBankAccountsController::class, 'approve'])->name('employee_bank_accounts.employee_bank_account.approve')->whereNumber('id');
        Route::post('/reject/{employeeBankAccount}', [EmployeeBankAccountsController::class, 'reject'])->name('employee_bank_accounts.employee_bank_account.reject')->whereNumber('id');
        Route::get('/edit/{employeeBankAccount}', [EmployeeBankAccountsController::class, 'edit'])->name('employee_bank_accounts.employee_bank_account.edit')->whereNumber('id');
        Route::get('/print', [EmployeeBankAccountsController::class, 'print'])->name('employee_bank_accounts.employee_bank_account.print');
        Route::post('/', [EmployeeBankAccountsController::class, 'store'])->name('employee_bank_accounts.employee_bank_account.store');
        Route::put('/update/{employeeBankAccount}', [EmployeeBankAccountsController::class, 'update'])->name('employee_bank_accounts.employee_bank_account.update')->whereNumber('id');
        Route::delete('/delete/{employeeBankAccount}', [EmployeeBankAccountsController::class, 'destroy'])->name('employee_bank_accounts.employee_bank_account.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/disability',
    ], function () {
        Route::get('/', [EmployeeDisabilitiesController::class, 'index'])->name('employee_disabilities.employee_disability.index');
        Route::get('/create', [EmployeeDisabilitiesController::class, 'create'])->name('employee_disabilities.employee_disability.create');
        Route::get('/approve/{employeeDisability}', [EmployeeDisabilitiesController::class, 'approve'])->name('employee_disabilities.employee_disability.approve')->whereNumber('id');
        Route::post('/reject/{employeeDisability}', [EmployeeDisabilitiesController::class, 'reject'])->name('employee_disabilities.employee_disability.reject')->whereNumber('id');
        Route::get('/edit/{employeeDisability}', [EmployeeDisabilitiesController::class, 'edit'])->name('employee_disabilities.employee_disability.edit')->whereNumber('id');
        Route::get('/print', [EmployeeDisabilitiesController::class, 'print'])->name('employee_disabilities.employee_disability.print');
        Route::post('/', [EmployeeDisabilitiesController::class, 'store'])->name('employee_disabilities.employee_disability.store');
        Route::put('/update/{employeeDisability}', [EmployeeDisabilitiesController::class, 'update'])->name('employee_disabilities.employee_disability.update')->whereNumber('id');
        Route::delete('/delete/{employeeDisability}', [EmployeeDisabilitiesController::class, 'destroy'])->name('employee_disabilities.employee_disability.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/education',
    ], function () {
        Route::get('/', [EmployeeEducationsController::class, 'index'])->name('employee_educations.employee_education.index');
        Route::get('/create', [EmployeeEducationsController::class, 'create'])->name('employee_educations.employee_education.create');
        Route::get('/show/{employeeEducation}', [EmployeeEducationsController::class, 'show'])->name('employee_educations.employee_education.show')->whereNumber('id');
        Route::get('/approve/{employeeEducation}', [EmployeeEducationsController::class, 'approve'])->name('employee_educations.employee_education.approve')->whereNumber('id');
        Route::post('/reject/{employeeEducation}', [EmployeeEducationsController::class, 'reject'])->name('employee_educations.employee_education.reject')->whereNumber('id');
        Route::get('/edit/{employeeEducation}', [EmployeeEducationsController::class, 'edit'])->name('employee_educations.employee_education.edit')->whereNumber('id');
        Route::get('/print', [EmployeeEducationsController::class, 'print'])->name('employee_educations.employee_education.print');
        Route::post('/', [EmployeeEducationsController::class, 'store'])->name('employee_educations.employee_education.store');
        Route::put('/update/{employeeEducation}', [EmployeeEducationsController::class, 'update'])->name('employee_educations.employee_education.update')->whereNumber('id');
        Route::delete('/delete/{employeeEducation}', [EmployeeEducationsController::class, 'destroy'])->name('employee_educations.employee_education.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/emergency',
    ], function () {
        Route::get('/', [EmployeeEmergenciesController::class, 'index'])->name('employee_emergencies.employee_emergency.index');
        Route::get('/create', [EmployeeEmergenciesController::class, 'create'])->name('employee_emergencies.employee_emergency.create');
        Route::get('/approve/{employeeEmergency}', [EmployeeEmergenciesController::class, 'approve'])->name('employee_emergencies.employee_emergency.approve')->whereNumber('id');
        Route::post('/reject/{employeeEmergency}', [EmployeeEmergenciesController::class, 'reject'])->name('employee_emergencies.employee_emergency.reject')->whereNumber('id');
        Route::get('/edit/{employeeEmergency}', [EmployeeEmergenciesController::class, 'edit'])->name('employee_emergencies.employee_emergency.edit')->whereNumber('id');
        Route::get('/print', [EmployeeEmergenciesController::class, 'print'])->name('employee_emergencies.employee_emergency.print');
        Route::post('/', [EmployeeEmergenciesController::class, 'store'])->name('employee_emergencies.employee_emergency.store');
        Route::put('/update/{employeeEmergency}', [EmployeeEmergenciesController::class, 'update'])->name('employee_emergencies.employee_emergency.update')->whereNumber('id');
        Route::delete('/delete/{employeeEmergency}', [EmployeeEmergenciesController::class, 'destroy'])->name('employee_emergencies.employee_emergency.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/family',
    ], function () {
        Route::get('/', [EmployeeFamiliesController::class, 'index'])->name('employee_families.employee_family.index');
        Route::get('/create', [EmployeeFamiliesController::class, 'create'])->name('employee_families.employee_family.create');
        Route::get('/approve/{employeeFamily}', [EmployeeFamiliesController::class, 'approve'])->name('employee_families.employee_family.approve')->whereNumber('id');
        Route::post('/reject/{employeeFamily}', [EmployeeFamiliesController::class, 'reject'])->name('employee_families.employee_family.reject')->whereNumber('id');
        Route::get('/edit/{employeeFamily}', [EmployeeFamiliesController::class, 'edit'])->name('employee_families.employee_family.edit')->whereNumber('id');
        Route::get('/print', [EmployeeFamiliesController::class, 'print'])->name('employee_families.employee_family.print');
        Route::post('/', [EmployeeFamiliesController::class, 'store'])->name('employee_families.employee_family.store');
        Route::put('/update/{employeeFamily}', [EmployeeFamiliesController::class, 'update'])->name('employee_families.employee_family.update')->whereNumber('id');
        Route::delete('/delete/{employeeFamily}', [EmployeeFamiliesController::class, 'destroy'])->name('employee_families.employee_family.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/language',
    ], function () {
        Route::get('/', [EmployeeLanguagesController::class, 'index'])->name('employee_languages.employee_language.index');
        Route::get('/create', [EmployeeLanguagesController::class, 'create'])->name('employee_languages.employee_language.create');
        Route::get('/edit/{employeeLanguage}', [EmployeeLanguagesController::class, 'edit'])->name('employee_languages.employee_language.edit')->whereNumber('id');
        Route::get('/print', [EmployeeLanguagesController::class, 'print'])->name('employee_languages.employee_language.print');
        Route::post('/', [EmployeeLanguagesController::class, 'store'])->name('employee_languages.employee_language.store');
        Route::put('/update/{employeeLanguage}', [EmployeeLanguagesController::class, 'update'])->name('employee_languages.employee_language.update')->whereNumber('id');
        Route::delete('/delete/{employeeLanguage}', [EmployeeLanguagesController::class, 'destroy'])->name('employee_languages.employee_language.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/license',
    ], function () {
        Route::get('/', [EmployeeLicensesController::class, 'index'])->name('employee_licenses.employee_license.index');
        Route::get('/create', [EmployeeLicensesController::class, 'create'])->name('employee_licenses.employee_license.create');
        Route::get('/approve/{employeeLicense}', [EmployeeLicensesController::class, 'approve'])->name('employee_licenses.employee_license.approve')->whereNumber('id');
        Route::post('/reject/{employeeLicense}', [EmployeeLicensesController::class, 'reject'])->name('employee_licenses.employee_license.reject')->whereNumber('id');
        Route::get('/edit/{employeeLicense}', [EmployeeLicensesController::class, 'edit'])->name('employee_licenses.employee_license.edit')->whereNumber('id');
        Route::get('/print', [EmployeeLicensesController::class, 'print'])->name('employee_licenses.employee_license.print');
        Route::post('/', [EmployeeLicensesController::class, 'store'])->name('employee_licenses.employee_license.store');
        Route::put('/update/{employeeLicense}', [EmployeeLicensesController::class, 'update'])->name('employee_licenses.employee_license.update')->whereNumber('id');
        Route::delete('/delete/{employeeLicense}', [EmployeeLicensesController::class, 'destroy'])->name('employee_licenses.employee_license.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/experience',
    ], function () {
        Route::get('/', [EmployeeExperiencesController::class, 'index'])->name('employee_experiences.employee_experience.index');
        Route::get('/create', [EmployeeExperiencesController::class, 'create'])->name('employee_experiences.employee_experience.create');
        Route::get('/show/{employeeExperience}', [EmployeeExperiencesController::class, 'show'])->name('employee_experiences.employee_experience.show')->whereNumber('id');
        Route::get('/approve/{employeeExperience}', [EmployeeExperiencesController::class, 'approve'])->name('employee_experiences.employee_experience.approve')->whereNumber('id');
        Route::post('/reject/{employeeExperience}', [EmployeeExperiencesController::class, 'reject'])->name('employee_experiences.employee_experience.reject')->whereNumber('id');
        Route::get('/edit/{employeeExperience}', [EmployeeExperiencesController::class, 'edit'])->name('employee_experiences.employee_experience.edit')->whereNumber('id');
        Route::get('/print', [EmployeeExperiencesController::class, 'print'])->name('employee_experiences.employee_experience.print');
        Route::post('/', [EmployeeExperiencesController::class, 'store'])->name('employee_experiences.employee_experience.store');
        Route::put('/update/{employeeExperience}', [EmployeeExperiencesController::class, 'update'])->name('employee_experiences.employee_experience.update')->whereNumber('id');
        Route::delete('/delete/{employeeExperience}', [EmployeeExperiencesController::class, 'destroy'])->name('employee_experiences.employee_experience.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/disaster',
    ], function () {
        Route::get('/', [EmployeeDisastersController::class, 'index'])->name('employee_disasters.employee_disaster.index');
        Route::get('/create', [EmployeeDisastersController::class, 'create'])->name('employee_disasters.employee_disaster.create');
        Route::get('/show/{employeeDisaster}', [EmployeeDisastersController::class, 'show'])->name('employee_disasters.employee_disaster.show')->whereNumber('id');
        Route::get('/edit/{employeeDisaster}', [EmployeeDisastersController::class, 'edit'])->name('employee_disasters.employee_disaster.edit')->whereNumber('id');
        Route::get('/print', [EmployeeDisastersController::class, 'print'])->name('employee_disasters.employee_disaster.print');
        Route::post('/store', [EmployeeDisastersController::class, 'store'])->name('employee_disasters.employee_disaster.store');
        Route::put('/update/{employeeDisaster}', [EmployeeDisastersController::class, 'update'])->name('employee_disasters.employee_disaster.update')->whereNumber('id');
        Route::delete('/delete/{employeeDisaster}', [EmployeeDisastersController::class, 'destroy'])->name('employee_disasters.employee_disaster.destroy')->whereNumber('id');
        Route::post('/show/{employeeDisaster}', [EmployeeDisastersController::class, 'storewitness'])->name('employee_disaster_witnesses.employee_disaster_witness.store');
        Route::post('/witness/{employeeDisasterWitness}/update', [EmployeeDisastersController::class, 'updatewitness'])->name('employee_disaster_witnesses.employee_disaster_witness.update')->whereNumber('id');
        Route::delete('/witness/{employeeDisasterWitness}/delete', [EmployeeDisastersController::class, 'destroywitness'])->name('employee_disaster_witnesses.employee_disaster_witness.destroy')->whereNumber('id');
        Route::post('/', [EmployeeDisastersController::class, 'storeindeminity'])->name('employee_disaster_indeminities.employee_disaster_indeminity.store');
        Route::put('/indeminity/{employeeDisasterIndeminity}', [EmployeeDisastersController::class, 'updateindeminity'])->name('employee_disaster_indeminities.employee_disaster_indeminity.update')->whereNumber('id');
        Route::delete('/indeminity/{employeeDisasterIndeminity}', [EmployeeDisastersController::class, 'destroyindeminity'])->name('employee_disaster_indeminities.employee_disaster_indeminity.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/certification',
    ], function () {
        Route::get('/', [EmployeeCertificationsController::class, 'index'])->name('employee_certifications.employee_certification.index');
        Route::get('/create', [EmployeeCertificationsController::class, 'create'])->name('employee_certifications.employee_certification.create');
        Route::get('/show/{employeeCertification}', [EmployeeCertificationsController::class, 'show'])->name('employee_certifications.employee_certification.show')->whereNumber('id');
        Route::get('/approve/{employeeCertification}', [EmployeeCertificationsController::class, 'approve'])->name('employee_certifications.employee_certification.approve')->whereNumber('id');
        Route::get('/reject/{employeeCertification}', [EmployeeCertificationsController::class, 'reject'])->name('employee_certifications.employee_certification.reject')->whereNumber('id');
        Route::get('/edit/{employeeCertification}', [EmployeeCertificationsController::class, 'edit'])->name('employee_certifications.employee_certification.edit')->whereNumber('id');
        Route::get('/print', [EmployeeCertificationsController::class, 'print'])->name('employee_certifications.employee_certification.print');
        Route::post('/', [EmployeeCertificationsController::class, 'store'])->name('employee_certifications.employee_certification.store');
        Route::put('/update/{employeeCertification}', [EmployeeCertificationsController::class, 'update'])->name('employee_certifications.employee_certification.update')->whereNumber('id');
        Route::delete('/delete/{employeeCertification}', [EmployeeCertificationsController::class, 'destroy'])->name('employee_certifications.employee_certification.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/award',
    ], function () {
        Route::get('/', [EmployeeAwardsController::class, 'index'])->name('employee_awards.employee_award.index');
        Route::get('/create', [EmployeeAwardsController::class, 'create'])->name('employee_awards.employee_award.create');
        Route::get('/show/{employeeAward}', [EmployeeAwardsController::class, 'show'])->name('employee_awards.employee_award.show')->whereNumber('id');
        Route::get('/approve/{employeeAward}', [EmployeeAwardsController::class, 'approve'])->name('employee_awards.employee_award.approve')->whereNumber('id');
        Route::get('/reject/{employeeAward}', [EmployeeAwardsController::class, 'reject'])->name('employee_awards.employee_award.reject')->whereNumber('id');
        Route::get('/edit/{employeeAward}', [EmployeeAwardsController::class, 'edit'])->name('employee_awards.employee_award.edit')->whereNumber('id');
        Route::get('/print', [EmployeeAwardsController::class, 'print'])->name('employee_awards.employee_award.print');
        Route::post('/', [EmployeeAwardsController::class, 'store'])->name('employee_awards.employee_award.store');
        Route::put('/update/{employeeAward}', [EmployeeAwardsController::class, 'update'])->name('employee_awards.employee_award.update')->whereNumber('id');
        Route::delete('/delete/{employeeAward}', [EmployeeAwardsController::class, 'destroy'])->name('employee_awards.employee_award.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/studytraining',
    ], function () {
        Route::get('/', [EmployeeStudyTrainingsController::class, 'index'])->name('employee_study_trainings.employee_study_training.index');
        Route::get('/create', [EmployeeStudyTrainingsController::class, 'create'])->name('employee_study_trainings.employee_study_training.create');
        Route::get('/show/{employeeStudyTraining}', [EmployeeStudyTrainingsController::class, 'show'])->name('employee_study_trainings.employee_study_training.show')->whereNumber('id');
        Route::get('/edit/{employeeStudyTraining}', [EmployeeStudyTrainingsController::class, 'edit'])->name('employee_study_trainings.employee_study_training.edit')->whereNumber('id');
        Route::get('/print', [EmployeeStudyTrainingsController::class, 'print'])->name('employee_study_trainings.employee_study_training.print');
        Route::post('/', [EmployeeStudyTrainingsController::class, 'store'])->name('employee_study_trainings.employee_study_training.store');
        Route::put('/update/{employeeStudyTraining}', [EmployeeStudyTrainingsController::class, 'update'])->name('employee_study_trainings.employee_study_training.update')->whereNumber('id');
        Route::delete('/delete/{employeeStudyTraining}', [EmployeeStudyTrainingsController::class, 'destroy'])->name('employee_study_trainings.employee_study_training.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/file',
    ], function () {
        Route::get('/', [EmployeeFilesController::class, 'index'])->name('employee_files.employee_file.index');
        Route::get('/create', [EmployeeFilesController::class, 'create'])->name('employee_files.employee_file.create');
        Route::get('/edit/{employeeFile}', [EmployeeFilesController::class, 'edit'])->name('employee_files.employee_file.edit')->whereNumber('id');
        Route::get('/print', [EmployeeFilesController::class, 'print'])->name('employee_files.employee_file.print');
        Route::post('/', [EmployeeFilesController::class, 'store'])->name('employee_files.employee_file.store');
        Route::put('/update/{employeeFile}', [EmployeeFilesController::class, 'update'])->name('employee_files.employee_file.update')->whereNumber('id');
        Route::delete('/delete/{employeeFile}', [EmployeeFilesController::class, 'destroy'])->name('employee_files.employee_file.destroy')->whereNumber('id');
    });


    Route::group([
        'prefix' => 'employees/{employee}/administrative',
    ], function () {
        Route::get('/', [EmployeeAdministrativePunishmentsController::class, 'index'])->name('employee_administrative_punishments.employee_administrative_punishment.index');
        Route::get('/create', [EmployeeAdministrativePunishmentsController::class, 'create'])->name('employee_administrative_punishments.employee_administrative_punishment.create');
        Route::get('/edit/{employeeAdministrativePunishment}', [EmployeeAdministrativePunishmentsController::class, 'edit'])->name('employee_administrative_punishments.employee_administrative_punishment.edit')->whereNumber('id');
        Route::get('/print', [EmployeeAdministrativePunishmentsController::class, 'print'])->name('employee_administrative_punishments.employee_administrative_punishment.print');
        Route::post('/', [EmployeeAdministrativePunishmentsController::class, 'store'])->name('employee_administrative_punishments.employee_administrative_punishment.store');
        Route::put('/update/{employeeAdministrativePunishment}', [EmployeeAdministrativePunishmentsController::class, 'update'])->name('employee_administrative_punishments.employee_administrative_punishment.update')->whereNumber('id');
        Route::delete('/delete/{employeeAdministrativePunishment}', [EmployeeAdministrativePunishmentsController::class, 'destroy'])->name('employee_administrative_punishments.employee_administrative_punishment.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/judiciary',
    ], function () {
        Route::get('/', [EmployeeJudiciaryPunishmentsController::class, 'index'])->name('employee_judiciary_punishments.employee_judiciary_punishment.index');
        Route::get('/create', [EmployeeJudiciaryPunishmentsController::class, 'create'])->name('employee_judiciary_punishments.employee_judiciary_punishment.create');
        Route::get('/edit/{employeeJudiciaryPunishment}', [EmployeeJudiciaryPunishmentsController::class, 'edit'])->name('employee_judiciary_punishments.employee_judiciary_punishment.edit')->whereNumber('id');
        Route::get('/print', [EmployeeJudiciaryPunishmentsController::class, 'print'])->name('employee_judiciary_punishments.employee_judiciary_punishment.print');
        Route::post('/', [EmployeeJudiciaryPunishmentsController::class, 'store'])->name('employee_judiciary_punishments.employee_judiciary_punishment.store');
        Route::put('/update/{employeeJudiciaryPunishment}', [EmployeeJudiciaryPunishmentsController::class, 'update'])->name('employee_judiciary_punishments.employee_judiciary_punishment.update')->whereNumber('id');
        Route::delete('/delete/{employeeJudiciaryPunishment}', [EmployeeJudiciaryPunishmentsController::class, 'destroy'])->name('employee_judiciary_punishments.employee_judiciary_punishment.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'employees/{employee}/additional_info',
    ], function () {
        Route::get('/', [EmployeeAdditionalInfosController::class, 'index'])->name('employee_additional_infos.employee_additional_info.index');
        Route::get('/create', [EmployeeAdditionalInfosController::class, 'create'])->name('employee_additional_infos.employee_additional_info.create');
        Route::get('/edit/{employeeAdditionalInfo}', [EmployeeAdditionalInfosController::class, 'edit'])->name('employee_additional_infos.employee_additional_info.edit')->whereNumber('id');
        Route::get('/print', [EmployeeAdditionalInfosController::class, 'print'])->name('employee_additional_infos.employee_additional_info.print');
        Route::post('/', [EmployeeAdditionalInfosController::class, 'store'])->name('employee_additional_infos.employee_additional_info.store');
        Route::put('/update/{employeeAdditionalInfo}', [EmployeeAdditionalInfosController::class, 'update'])->name('employee_additional_infos.employee_additional_info.update')->whereNumber('id');
        Route::delete('/delete/{employeeAdditionalInfo}', [EmployeeAdditionalInfosController::class, 'destroy'])->name('employee_additional_infos.employee_additional_info.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'reports',
    ], function () {
        Route::get('/', [ReportsController::class, 'index'])->name('reports.report.index');
        Route::get('/create', [ReportsController::class, 'create'])->name('reports.report.create');
        Route::get('/show/{report}', [ReportsController::class, 'show'])->name('reports.report.show')->whereNumber('id');
        Route::get('/{report}/edit', [ReportsController::class, 'edit'])->name('reports.report.edit')->whereNumber('id');
        Route::post('/', [ReportsController::class, 'store'])->name('reports.report.store');
        Route::put('/update/{report}', [ReportsController::class, 'update'])->name('reports.report.update')->whereNumber('id');
        Route::delete('/delete/{report}', [ReportsController::class, 'destroy'])->name('reports.report.destroy')->whereNumber('id');
    });

    Route::group([
        'prefix' => 'system_exceptions',
    ], function () {
        Route::get('/', [SystemExceptionsController::class, 'index'])->name('system_exceptions.system_exception.index');
        Route::get('/show/{systemException}', [SystemExceptionsController::class, 'show'])->name('system_exceptions.system_exception.show')->whereNumber('id');
        Route::get('/{systemException}/edit', [SystemExceptionsController::class, 'edit'])->name('system_exceptions.system_exception.edit')->whereNumber('id');
        Route::post('/', [SystemExceptionsController::class, 'store'])->name('system_exceptions.system_exception.store');
        Route::put('/update/{systemException}', [SystemExceptionsController::class, 'update'])->name('system_exceptions.system_exception.update')->whereNumber('id');
        Route::delete('/delete/{systemException}', [SystemExceptionsController::class, 'destroy'])->name('system_exceptions.system_exception.destroy')->whereNumber('id');
    });

    Route::get('/locale/{locale}', [LanguagesController::class, 'switch'])->name('languages.language.switch');



    Route::group([
        'prefix' => 'permissions',
    ], function () {
        Route::get('/', [PermissionsController::class, 'index'])->name('permissions.permission.index');
        Route::get('/create', [PermissionsController::class, 'create'])->name('permissions.permission.create');
        Route::get('/show/{permissions}', [PermissionsController::class, 'show'])->name('permissions.permission.show')->whereNumber('id');
        Route::get('/{permissions}/edit', [PermissionsController::class, 'edit'])->name('permissions.permission.edit')->whereNumber('id');
        Route::post('/', [PermissionsController::class, 'store'])->name('permissions.permission.store');
        Route::put('/update/{permissions}', [PermissionsController::class, 'update'])->name('permissions.permission.update')->whereNumber('id');
        Route::delete('/delete/{permissions}', [PermissionsController::class, 'destroy'])->name('permissions.permission.destroy')->whereNumber('id');
    });


    Route::group([
        'prefix' => 'roles',
    ], function () {
        Route::get('/', 'App\Http\Controllers\User\RolesController@index')
            ->name('roles.role.index');
        Route::get('/create', 'App\Http\Controllers\User\RolesController@create')
            ->name('roles.role.create');
        Route::get('/show/{roles}', 'App\Http\Controllers\User\RolesController@show')
            ->name('roles.role.show')->where('id', '[0-9]+');
        Route::get('/{roles}/edit', 'App\Http\Controllers\User\RolesController@edit')
            ->name('roles.role.edit')->where('id', '[0-9]+');
        Route::post('/', 'App\Http\Controllers\User\RolesController@store')
            ->name('roles.role.store');
        Route::put('roles/{roles}', 'App\Http\Controllers\User\RolesController@update')
            ->name('roles.role.update')->where('id', '[0-9]+');
        Route::delete('/roles/{roles}', 'App\Http\Controllers\User\RolesController@destroy')
            ->name('roles.role.destroy')->where('id', '[0-9]+');
    });


    // Route::group([
    //     'prefix' => 'roles',
    // ], function () {
    //     Route::get('/', [RolesController::class, 'index'])->name('roles.role.index');
    //     Route::get('/create', [RolesController::class, 'create'])->name('roles.role.create');
    //     Route::get('/show/{roles}', [RolesController::class, 'show'])->name('roles.role.show')->whereNumber('id');
    //     Route::get('/{roles}/edit', [RolesController::class, 'edit'])->name('roles.role.edit')->whereNumber('id');
    //     Route::post('/', [RolesController::class, 'store'])->name('roles.role.store');
    //     Route::put('/update/{roles}', [RolesController::class, 'update'])->name('roles.role.update')->whereNumber('id');
    //     Route::delete('/delete/{roles}', [RolesController::class, 'destroy'])->name('roles.role.destroy')->whereNumber('id');
    // });


    //  Route::get('graph', function () {
    //     return view('graph/employee');
    // });
    //   Route::get('graph', function () {
    //     return view('graph/organization_unit');
    // });
    Route::get('/pie', [ChartController::class, 'pieChart'])->name('pie.pie.index');
    Route::get('/pie2', [ChartController2::class, 'pieChart'])->name('pie2.pie2.index');
    Route::get('/pie3', [ChartController3::class, 'pieChart'])->name('pie3.pie3.index');
    Route::get('/pie4', [ChartController4::class, 'pieChart'])->name('pie4.pie4.index');
    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome.welcome.index');
    // for the user manage profile
    Route::view('/profile/edit', 'profile.edit')->middleware('auth');
    Route::view('/profile/password', 'profile.password')->middleware('auth');


    Route::group([
        'prefix' => 'leave_types',
    ], function () {
        Route::get('/', [LeaveTypesController::class, 'index'])->name('leave_types.leave_type.index');
        Route::get('/create', [LeaveTypesController::class, 'create'])->name('leave_types.leave_type.create');
        Route::get('/show/{leaveType}', [LeaveTypesController::class, 'show'])->name('leave_types.leave_type.show')->whereNumber('id');
        Route::get('/{leaveType}/edit', [LeaveTypesController::class, 'edit'])->name('leave_types.leave_type.edit')->whereNumber('id');
        Route::post('/', [LeaveTypesController::class, 'store'])->name('leave_types.leave_type.store');
        Route::put('/update/{leaveType}', [LeaveTypesController::class, 'update'])->name('leave_types.leave_type.update')->whereNumber('id');
        Route::delete('/delete/{leaveType}', [LeaveTypesController::class, 'destroy'])->name('leave_types.leave_type.destroy')->whereNumber('id');
    });
});
Route::resource('/level', LevelController::class);
Route::resource('/weight', WeightController::class);
Route::resource('/competency', CompetencyController::class);
Route::resource('/leadership_summary_form', LeadershipSummaryFormController::class);



Route::group([
    'prefix' => 'biographies',
], function () {
    Route::get('/', [BiographiesController::class, 'index'])
        ->name('biographies.biography.index');
    Route::get('/create', [BiographiesController::class, 'create'])
        ->name('biographies.biography.create');
    Route::get('/show/{biography}', [BiographiesController::class, 'show'])
        ->name('biographies.biography.show')->where('id', '[0-9]+');
    Route::get('/{biography}/edit', [BiographiesController::class, 'edit'])
        ->name('biographies.biography.edit')->where('id', '[0-9]+');
    Route::post('/', [BiographiesController::class, 'store'])
        ->name('biographies.biography.store');
    Route::put('biography/{biography}', [BiographiesController::class, 'update'])
        ->name('biographies.biography.update')->where('id', '[0-9]+');
    Route::delete('/biography/{biography}', [BiographiesController::class, 'destroy'])
        ->name('biographies.biography.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'competencylists',
], function () {
    Route::get('/', [CompetencylistsController::class, 'index'])
        ->name('competencylists.competencylist.index');
    Route::get('/create', [CompetencylistsController::class, 'create'])
        ->name('competencylists.competencylist.create');
    Route::get('/show/{competencylist}', [CompetencylistsController::class, 'show'])
        ->name('competencylists.competencylist.show')->where('id', '[0-9]+');
    Route::get('/{competencylist}/edit', [CompetencylistsController::class, 'edit'])
        ->name('competencylists.competencylist.edit')->where('id', '[0-9]+');
    Route::post('/', [CompetencylistsController::class, 'store'])
        ->name('competencylists.competencylist.store');
    Route::put('competencylist/{competencylist}', [CompetencylistsController::class, 'update'])
        ->name('competencylists.competencylist.update')->where('id', '[0-9]+');
    Route::delete('/competencylist/{competencylist}', [CompetencylistsController::class, 'destroy'])
        ->name('competencylists.competencylist.destroy')->where('id', '[0-9]+');

        Route::get('/performance_form/{employee}', [CompetencylistsController::class, 'performance_form'])
        ->name('competencylists.competencylist.performance_form')->where('id', '[0-9]+');
        Route::get('/individual_performance_form/{employee}', [CompetencylistsController::class, 'individual_performance_form'])
        ->name('competencylists.competencylist.individual_performance_form')->where('id', '[0-9]+');
        Route::get('/hrperformance_form', [CompetencylistsController::class, 'hrperformance_form'])
        ->name('competencylists.competencylist.hrperformance_form');

        Route::get('/performance_form_create/{employee}/{year}', [CompetencylistsController::class, 'performance_form_create'])
        ->name('competencylists.competencylist.performance_form_create')->where('id', '[0-9]+');
        Route::get('/equivalentperformance_form_create/{employee}/{year}', [CompetencylistsController::class, 'equivalentperformance_form_create'])
        ->name('competencylists.competencylist.equivalentperformance_form_create')->where('id', '[0-9]+');
        Route::get('/immediateperformance_form_create/{employee}/{year}', [CompetencylistsController::class, 'immediateperformance_form_create'])
        ->name('competencylists.competencylist.immediateperformance_form_create')->where('id', '[0-9]+');

        Route::get('/hrperformance_form_list/{employee}/{year}', [CompetencylistsController::class, 'hrperformance_form_list'])
        ->name('competencylists.competencylist.hrperformance_form_list')->where('id', '[0-9]+');
        Route::get('/hrperformance_form_list_detail/{employee}/{year}', [CompetencylistsController::class, 'hrperformance_form_list_detail'])
        ->name('competencylists.competencylist.hrperformance_form_list_detail')->where('id', '[0-9]+');

        Route::get('/equiperformance_form_list/{employee}', [CompetencylistsController::class, 'equiperformance_form_list'])
        ->name('competencylists.competencylist.equiperformance_form_list')->where('id', '[0-9]+');
        Route::get('/immediateperformance_form_list/{employee}', [CompetencylistsController::class, 'immediateperformance_form_list'])
        ->name('competencylists.competencylist.immediateperformance_form_list')->where('id', '[0-9]+');
        Route::get('/performance_form_list/{employee}', [CompetencylistsController::class, 'performance_form_list'])
        ->name('competencylists.competencylist.performance_form_list')->where('id', '[0-9]+');
        // Route::get('/hrperformance_form_list', [CompetencylistsController::class, 'hrperformance_form_list'])
        // ->name('competencylists.competencylist.hrperformance_form_list');
        // Route::get('/hrequiperformance_form_list', [CompetencylistsController::class, 'hrequiperformance_form_list'])
        // ->name('competencylists.competencylist.hrequiperformance_form_list');
        // Route::get('/hrimmediateperformance_form_list', [CompetencylistsController::class, 'hrimmediateperformance_form_list'])
        // ->name('competencylists.competencylist.hrimmediateperformance_form_list');
       // Route::get('/performance_form_list/{employee}', [CompetencylistsController::class, 'performance_form_list'])

        Route::post('/performance_form_store', [CompetencylistsController::class, 'performance_form_store'])
        ->name('competencylists.competencylist.performance_form_store');
        Route::post('/equivalentperformance_form_store', [CompetencylistsController::class, 'equivalentperformance_form_store'])
        ->name('competencylists.competencylist.equivalentperformance_form_store');
        Route::post('/immediateperformance_form_store', [CompetencylistsController::class, 'immediateperformance_form_store'])
        ->name('competencylists.competencylist.immediateperformance_form_store');


        Route::post('/final_performance', [CompetencylistsController::class, 'final_performance'])
        ->name('competencylists.competencylist.final_performance');
        Route::get('/performance_show/{employee}/{year}', [CompetencylistsController::class, 'performance_show'])
        ->name('competencylists.competencylist.performance_show')->where('id', '[0-9]+');
        Route::get('/equivalentperformance_form_show/{employee}/{year}', [CompetencylistsController::class, 'equivalentperformance_form_show'])
        ->name('competencylists.competencylist.equivalentperformance_form_show')->where('id', '[0-9]+');
        Route::get('/immediateperformance_form_show/{employee}/{year}', [CompetencylistsController::class, 'immediateperformance_form_show'])
        ->name('competencylists.competencylist.immediateperformance_form_show')->where('id', '[0-9]+');

       // Route::get('/{organization_id}/offices', [OrganizationUnitsController::class, 'offices'])->name('organization_units.organization_unit.offices')->whereNumber('id');
});

Route::group([
    'prefix' => 'competency_weights',
], function () {
    Route::get('/', [CompetencyWeightsController::class, 'index'])
        ->name('competency_weights.competency_weight.index');
    Route::get('/create', [CompetencyWeightsController::class, 'create'])
        ->name('competency_weights.competency_weight.create');
    Route::get('/show/{competencyWeight}', [CompetencyWeightsController::class, 'show'])
        ->name('competency_weights.competency_weight.show')->where('id', '[0-9]+');
    Route::get('/{competencyWeight}/edit', [CompetencyWeightsController::class, 'edit'])
        ->name('competency_weights.competency_weight.edit')->where('id', '[0-9]+');
    Route::post('/', [CompetencyWeightsController::class, 'store'])
        ->name('competency_weights.competency_weight.store');
    Route::put('competency_weight/{competencyWeight}', [CompetencyWeightsController::class, 'update'])
        ->name('competency_weights.competency_weight.update')->where('id', '[0-9]+');
    Route::delete('/competency_weight/{competencyWeight}', [CompetencyWeightsController::class, 'destroy'])
        ->name('competency_weights.competency_weight.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'competency_weight_competencylists',
], function () {
    Route::get('/', [CompetencyWeightCompetencylistsController::class, 'index'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.index');
    Route::get('/create', [CompetencyWeightCompetencylistsController::class, 'create'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.create');
    Route::get('/show/{competencyWeightCompetencylist}', [CompetencyWeightCompetencylistsController::class, 'show'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.show')->where('id', '[0-9]+');
    Route::get('/{competencyWeightCompetencylist}/edit', [CompetencyWeightCompetencylistsController::class, 'edit'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.edit')->where('id', '[0-9]+');
    Route::post('/', [CompetencyWeightCompetencylistsController::class, 'store'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.store');
    Route::put('competency_weight_competencylist/{competencyWeightCompetencylist}', [CompetencyWeightCompetencylistsController::class, 'update'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.update')->where('id', '[0-9]+');
    Route::delete('/competency_weight_competencylist/{competencyWeightCompetencylist}', [CompetencyWeightCompetencylistsController::class, 'destroy'])
        ->name('competency_weight_competencylists.competency_weight_competencylist.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'yearsettings',
], function () {
    Route::get('/', [YearsettingsController::class, 'index'])
        ->name('yearsettings.yearsetting.index');
    Route::get('/create', [YearsettingsController::class, 'create'])
        ->name('yearsettings.yearsetting.create');
    Route::get('/show/{yearsetting}', [YearsettingsController::class, 'show'])
        ->name('yearsettings.yearsetting.show')->where('id', '[0-9]+');
    Route::get('/{yearsetting}/edit', [YearsettingsController::class, 'edit'])
        ->name('yearsettings.yearsetting.edit')->where('id', '[0-9]+');
    Route::post('/', [YearsettingsController::class, 'store'])
        ->name('yearsettings.yearsetting.store');
    Route::put('yearsetting/{yearsetting}', [YearsettingsController::class, 'update'])
        ->name('yearsettings.yearsetting.update')->where('id', '[0-9]+');
    Route::delete('/yearsetting/{yearsetting}', [YearsettingsController::class, 'destroy'])
        ->name('yearsettings.yearsetting.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'expertevaluations',
], function () {
    Route::get('/', [ExpertevaluationsController::class, 'index'])
        ->name('expertevaluations.expertevaluation.index');
    Route::get('/create', [ExpertevaluationsController::class, 'create'])
        ->name('expertevaluations.expertevaluation.create');
    Route::get('/show/{expertevaluation}', [ExpertevaluationsController::class, 'show'])
        ->name('expertevaluations.expertevaluation.show')->where('id', '[0-9]+');
    Route::get('/{expertevaluation}/edit', [ExpertevaluationsController::class, 'edit'])
        ->name('expertevaluations.expertevaluation.edit')->where('id', '[0-9]+');
    Route::post('/', [ExpertevaluationsController::class, 'store'])
        ->name('expertevaluations.expertevaluation.store');
    Route::put('expertevaluation/{expertevaluation}', [ExpertevaluationsController::class, 'update'])
        ->name('expertevaluations.expertevaluation.update')->where('id', '[0-9]+');
    Route::delete('/expertevaluation/{expertevaluation}', [ExpertevaluationsController::class, 'destroy'])
        ->name('expertevaluations.expertevaluation.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'peersevaluations',
], function () {
    Route::get('/', [PeersevaluationsController::class, 'index'])
        ->name('peersevaluations.peersevaluation.index');
    Route::get('/create', [PeersevaluationsController::class, 'create'])
        ->name('peersevaluations.peersevaluation.create');
    Route::get('/show/{peersevaluation}', [PeersevaluationsController::class, 'show'])
        ->name('peersevaluations.peersevaluation.show')->where('id', '[0-9]+');
    Route::get('/{peersevaluation}/edit', [PeersevaluationsController::class, 'edit'])
        ->name('peersevaluations.peersevaluation.edit')->where('id', '[0-9]+');
    Route::post('/', [PeersevaluationsController::class, 'store'])
        ->name('peersevaluations.peersevaluation.store');
    Route::put('peersevaluation/{peersevaluation}', [PeersevaluationsController::class, 'update'])
        ->name('peersevaluations.peersevaluation.update')->where('id', '[0-9]+');
    Route::delete('/peersevaluation/{peersevaluation}', [PeersevaluationsController::class, 'destroy'])
        ->name('peersevaluations.peersevaluation.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'immediateevaluations',
], function () {
    Route::get('/', [ImmediateevaluationsController::class, 'index'])
        ->name('immediateevaluations.immediateevaluation.index');
    Route::get('/create', [ImmediateevaluationsController::class, 'create'])
        ->name('immediateevaluations.immediateevaluation.create');
    Route::get('/show/{immediateevaluation}', [ImmediateevaluationsController::class, 'show'])
        ->name('immediateevaluations.immediateevaluation.show')->where('id', '[0-9]+');
    Route::get('/{immediateevaluation}/edit', [ImmediateevaluationsController::class, 'edit'])
        ->name('immediateevaluations.immediateevaluation.edit')->where('id', '[0-9]+');
    Route::post('/', [ImmediateevaluationsController::class, 'store'])
        ->name('immediateevaluations.immediateevaluation.store');
    Route::put('immediateevaluation/{immediateevaluation}', [ImmediateevaluationsController::class, 'update'])
        ->name('immediateevaluations.immediateevaluation.update')->where('id', '[0-9]+');
    Route::delete('/immediateevaluation/{immediateevaluation}', [ImmediateevaluationsController::class, 'destroy'])
        ->name('immediateevaluations.immediateevaluation.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'averages',
], function () {
    Route::get('/', [AveragesController::class, 'index'])
        ->name('averages.average.index');
    Route::get('/create', [AveragesController::class, 'create'])
        ->name('averages.average.create');
    Route::get('/show/{average}', [AveragesController::class, 'show'])
        ->name('averages.average.show')->where('id', '[0-9]+');
    Route::get('/{average}/edit', [AveragesController::class, 'edit'])
        ->name('averages.average.edit')->where('id', '[0-9]+');
    Route::post('/', [AveragesController::class, 'store'])
        ->name('averages.average.store');
    Route::put('average/{average}', [AveragesController::class, 'update'])
        ->name('averages.average.update')->where('id', '[0-9]+');
    Route::delete('/average/{average}', [AveragesController::class, 'destroy'])
        ->name('averages.average.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'performances',
], function () {
    Route::get('/', [PerformancesController::class, 'index'])
        ->name('performances.performance.index');
    Route::get('/create', [PerformancesController::class, 'create'])
        ->name('performances.performance.create');
    Route::get('/show/{performance}', [PerformancesController::class, 'show'])
        ->name('performances.performance.show')->where('id', '[0-9]+');
    Route::get('/{performance}/edit', [PerformancesController::class, 'edit'])
        ->name('performances.performance.edit')->where('id', '[0-9]+');
    Route::post('/', [PerformancesController::class, 'store'])
        ->name('performances.performance.store');
    Route::put('performance/{performance}', [PerformancesController::class, 'update'])
        ->name('performances.performance.update')->where('id', '[0-9]+');
    Route::delete('/performance/{performance}', [PerformancesController::class, 'destroy'])
        ->name('performances.performance.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'employeecompetencies',
], function () {
    Route::get('/', [EmployeecompetenciesController::class, 'index'])
         ->name('employeecompetencies.employeecompetency.index');
    Route::get('/create', [EmployeecompetenciesController::class, 'create'])
         ->name('employeecompetencies.employeecompetency.create');
    Route::get('/show/{employeecompetency}',[EmployeecompetenciesController::class, 'show'])
         ->name('employeecompetencies.employeecompetency.show')->where('id', '[0-9]+');
    Route::get('/{employeecompetency}/edit',[EmployeecompetenciesController::class, 'edit'])
         ->name('employeecompetencies.employeecompetency.edit')->where('id', '[0-9]+');
    Route::post('/', [EmployeecompetenciesController::class, 'store'])
         ->name('employeecompetencies.employeecompetency.store');
    Route::put('employeecompetency/{employeecompetency}', [EmployeecompetenciesController::class, 'update'])
         ->name('employeecompetencies.employeecompetency.update')->where('id', '[0-9]+');
    Route::delete('/employeecompetency/{employeecompetency}',[EmployeecompetenciesController::class, 'destroy'])
         ->name('employeecompetencies.employeecompetency.destroy')->where('id', '[0-9]+');
});

// rihana performance
Route::get('/performance_form', [CompetencylistsController::class, 'performance_form'])->name('managementperformance.index');
//Route::get('/performance_form_list', [CompetencylistsController::class, 'performance_form_list'])->name('managementperformance.list');


Route::group([
    'prefix' => 'leaderevaluationstatuses',
], function () {
    Route::get('/', [LeaderevaluationstatusesController::class, 'index'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.index');
    Route::get('/create', [LeaderevaluationstatusesController::class, 'create'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.create');
    Route::get('/show/{leaderevaluationstatus}',[LeaderevaluationstatusesController::class, 'show'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.show')->where('id', '[0-9]+');
    Route::get('/{leaderevaluationstatus}/edit',[LeaderevaluationstatusesController::class, 'edit'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.edit')->where('id', '[0-9]+');
    Route::post('/', [LeaderevaluationstatusesController::class, 'store'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.store');
    Route::put('leaderevaluationstatus/{leaderevaluationstatus}', [LeaderevaluationstatusesController::class, 'update'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.update')->where('id', '[0-9]+');
    Route::delete('/leaderevaluationstatus/{leaderevaluationstatus}',[LeaderevaluationstatusesController::class, 'destroy'])
         ->name('leaderevaluationstatuses.leaderevaluationstatus.destroy')->where('id', '[0-9]+');
});
