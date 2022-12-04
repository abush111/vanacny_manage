

<a href="#" class="brand-link text-center">
    @php
        $logo = DB::table('organizations')
            ->whereNotNull('logo')
            ->pluck('logo')
            ->first();
    @endphp
    @if (is_null($logo))
        <h2>No Logo</h2>
    @else
        <img src="{{ asset('logo/organization/' . $logo) }}" width="50vw;" height="50vw;" alt="AII Logo">
    @endif

</a>


<div class="sidebar">
    @role('superadministrator')
        @if (Auth::check())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('uploads/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                @if (isset(Auth::user()->name))
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                @endif
            </div>
        @endif
    @endrole

    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if (isset($employee->photo))
        <div class="image">
            <img src="{{ asset('uploads/photo/' . $employee->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        @else
        <div class="image">
            <img src="{{ asset('uploads/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>

        @endif
        @if (isset($employee->en_name))
        <div class="info">
            <a href="#" class="d-block">{{ $employee->en_name }}</a>
        </div>
        @endif
    </div> --}}




    <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            @permission('lebel_List')
            <li class="nav-item">
                <a href="/level" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Level
                    </p>
                </a>
            </li>
            @endpermission

            {{-- @permission('competency_weights-List')
            <li class="nav-item">
                <a href="/weight" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Weight
                    </p>
                </a>
            </li>
            @endpermission

            @permission('competency_weight_list-List')
            <li class="nav-item">
                <a href="/competency" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Competency
                    </p>
                </a>
            </li>
            @endpermission --}}
            <li class="nav-item">
                <a href="{{ route('competencylists.competencylist.performance_form', ['employee' => $employee]) }}" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Leadership Form
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('competencylists.competencylist.hrperformance_form') }}" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        HR Leadership Form
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('competencylists.competencylist.individual_performance_form', ['employee' => $employee]) }}" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        {{ __('setting.individual_leadershipform') }}
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="/leadership_summary_form" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Leadership Summary Form
                    </p>
                </a>
            </li> --}}


            @permission('structure-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['organizations*', 'organization_units*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            {{ __('setting.Structure') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('organization-List')
                            <li class="nav-item">
                                <a href="{{ route('organizations.organization.index') }}"
                                    class="nav-link {{ request()->is('organizations*') ? 'active' : ' ' }}">
                                    <i class="fas fa-building nav-icon"></i>
                                    <p>{{ __('setting.Organization') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('organization_units-List')
                            <li class="nav-item">
                                <a href="{{ route('organization_units.organization_unit.index') }}"
                                    class="nav-link {{ request()->is('organization_units*') ? 'active' : ' ' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>{{ __('setting.OrganizationUnit') }}</p>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            
            <li
                class="nav-item has-treeview {{ request()->is(['organizations*', 'organization_units*','Work_experience*','post*','editpost*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>
                        {{ __('Job Applicants') }}
                        
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                   
                        <li class="nav-item">
                          
                            <a href="{{ url("/role_register") }}"
                                class="nav-link {{ request()->is('organizations*') ? 'active' : ' ' }}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>{{ __('Background_education') }}</p>
                            </a>
                        </li>
                   
                   
                        <li class="nav-item">
                            <a href="{{ url("/personal") }}"
                                class="nav-link {{ request()->is('organization_units*') ? 'active' : ' ' }}">
                                <i class="fas fa-laptop-house nav-icon"></i>
                                <p>{{ __('Personal_detail') }}</p>
                            </a>
                        </li>
                   
                        
                        <li class="nav-item">
                            <a href="{{ url("/work") }}"
                                class="nav-link {{ request()->is('Work experience*') ? 'active' : ' ' }}">
                                <i class="fas fa-laptop-house nav-icon"></i>
                                <p>{{ __('Work_experience') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("/jobppost") }}"
                                class="nav-link {{ request()->is('post*') ? 'active' : ' ' }}">
                                <i class="fas fa-laptop-house nav-icon"></i>
                                <p>{{ __('Post job') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{"/postview"}}"
                                class="nav-link {{ request()->is('editpost*') ? 'active' : ' ' }}">
                                <i class="fas fa-laptop-house nav-icon"></i>
                                <p>{{ __('Post View') }}</p>
                            </a>
                        </li>
                </ul>
            </li>
     


           
       
            
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Evaluation
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>
                        ID Card
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link ">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Template Manager</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Print</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>RFID Inventory</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>RFID Mapping</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Log</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-business-time"></i>
                    <p>
                        Shift
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Shift Manager</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Recruitment
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link ">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Vacancy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Applicants</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-award"></i>
                    <p>
                        Promotion
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link ">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Leave
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('#') }}" class="nav-link ">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Home</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            @permission('payment-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['salaries*', 'salary_scales*', 'salary_heights*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon  fas fa-money-check-alt"></i>
                        <p>
                            {{ __('setting.payement') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('salaryScales-List')
                            <li class="nav-item">
                                <a href="{{ route('salary_scales.salary_scale.index') }}"
                                    class="nav-link {{ request()->is('salary_scales*') ? 'active' : ' ' }}">
                                    <i class="fas fa-balance-scale nav-icon"></i>
                                    <p>{{ __('setting.SalaryScale') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('salaryHeights-List')
                            <li class="nav-item">
                                <a href="{{ route('salary_heights.salary_height.index') }}"
                                    class="nav-link {{ request()->is('salary_heights*') ? 'active' : ' ' }}">
                                    <i class="fas fa-sort nav-icon"></i>
                                    <p>{{ __('setting.SalaryHeight') }}</p>
                                </a>
                            </li>
                        @endpermission
                        {{-- <li class="nav-item">
                            <a href="{{ url('#') }}" class="nav-link">
                                <i class="fas fa-receipt nav-icon"></i>
                                <p>{{ __('setting.Payroll') }}</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            @endpermission

            @permission('setting_Reports-List')
                <li class="nav-item">
                    <a href="{{ route('reports.report.index') }}"
                        class="nav-link {{ request()->is(['reports', 'reports/show/*', 'reports/*/edit']) ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>{{ __('setting.Report') }}</p>
                    </a>
                </li>
            @endpermission



            @permission('competency-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['competency*', 'competencylists*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            {{ __('setting.competency') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('competency-List')
                            <li class="nav-item">
                                <a href="{{ route('competency.index') }}"
                                    class="nav-link {{ request()->is('competency*') ? 'active' : ' ' }}">
                                    <i class="fas fa-building nav-icon"></i>
                                    <p>{{ __('setting.competency') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('competencylists-List')
                            <li class="nav-item">
                                <a href="{{ route('competencylists.competencylist.index') }}"
                                    class="nav-link {{ request()->is('competencylists*') ? 'active' : ' ' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>{{ __('setting.competency_list') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('empcompetency-List')
                        <li class="nav-item">
                            <a href="{{ route('employeecompetencies.employeecompetency.index') }}"
                                class="nav-link {{ request()->is('employeecompetencies.employeecompetency*') ? 'active' : ' ' }}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>{{ __('setting.empcompetency') }}</p>
                            </a>
                        </li>
                    @endpermission
                    </ul>
                </li>
            @endpermission

            @permission('competency_weights-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['competency_weights*', 'competency_weight_list*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            {{ __('setting.competency_weight') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('competency_weights-List')
                            <li class="nav-item">
                                <a href="{{ route('competency_weights.competency_weight.index') }}"
                                    class="nav-link {{ request()->is('competency_weights*') ? 'active' : ' ' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>{{ __('setting.competency_weight') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('competency_weight_list-List')
                            <li class="nav-item">
                                <a href="{{ route('competency_weight_competencylists.competency_weight_competencylist.index') }}"
                                    class="nav-link {{ request()->is('competency_weight_competencylists*') ? 'active' : ' ' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>{{ __('setting.competency_weight_list') }}</p>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
                @endpermission
                @permission('yearsettings-List')
                    <li class="nav-item">
                        <a href="{{ route('yearsettings.yearsetting.index') }}"
                            class="nav-link {{ request()->is('yearsettings*') ? 'active' : ' ' }}">
                            <i class="fas fa-laptop-house nav-icon"></i>
                            <p>{{ __('setting.year_setting') }}</p>
                        </a>
                    </li>
                @endpermission




            @permission('users-List')
                <li class="nav-item">
                    <a href="{{ url('#') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            {{ __('setting.user_management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('employee-List')
                            <li class="nav-item">
                                <a href="{{ route('employees.employee.index') }}"
                                    class="nav-link {{ request()->is('employees') ? 'active' : ' ' }}">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>{{ __('setting.Employees') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('permission-List')
                            <li class="nav-item">
                                <a href="{{ route('permissions.permission.index') }}" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>{{ __('setting.permission') }}</p>
                                </a>
                            </li>
                        @endpermission

                        @permission('role-List')
                            <li class="nav-item">
                                <a href="{{ route('roles.role.index') }}" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>{{ __('setting.role') }}</p>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            @permission('setting-List')
                <li class="nav-item">
                    <a href="{{ route('settings.setting.index') }}"
                        class="nav-link {{ request()->is('settings*') ? 'active' : ' ' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            {{ __('setting.Setting') }}
                        </p>
                    </a>
                </li>
            @endpermission
       {{-- @role('employee') --}}
            <li class="nav-header">Employee</li>
            @permission('address-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['employees/*/address*', 'employees/*/bank_account*', 'employees/*/disability*', 'employees/*/education*', 'employees/*/emergency*', 'employees/*/family*', 'employees/*/language*', 'employees/*/license*', 'employees/*/additional_info*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            {{ __('employee.Personal Information') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('address-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_addresses.employee_address.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/address*') ? 'active' : ' ' }}">
                                    <i class="fas fa-address-card nav-icon"></i>
                                    <p>{{ __('employee.Address') }}</p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('bankAccount-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_bank_accounts.employee_bank_account.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/bank_account*') ? 'active' : ' ' }}">
                                    <i class="fas fa-piggy-bank nav-icon"></i>
                                    <p>{{ __('employee.Bank Accounts') }}</p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('disabilities-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_disabilities.employee_disability.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/disability*') ? 'active' : ' ' }}">
                                    <i class="fas fa-blind nav-icon"></i>
                                    <p>{{ __('employee.Disability') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('disabilities-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_educations.employee_education.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/education*') ? 'active' : ' ' }}">
                                    <i class="fas fa-school nav-icon"></i>
                                    <p>{{ __('employee.Education') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('educations-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_emergencies.employee_emergency.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/emergency*') ? 'active' : ' ' }}">
                                    <i class="fas fa-ambulance nav-icon"></i>
                                    <p>{{ __('employee.Emeregency') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('families-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_families.employee_family.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/family*') ? 'active' : ' ' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>{{ __('employee.Family') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('languages-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_languages.employee_language.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/language*') ? 'active' : ' ' }}">
                                    <i class="fas fa-language nav-icon"></i>
                                    <p>{{ __('employee.Language') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission

                        @permission('licenses-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_licenses.employee_license.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/license*') ? 'active' : ' ' }}">
                                    <i class="fas fa-certificate nav-icon"></i>
                                    <p>{{ __('employee.License') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission
                        @permission('additionalInfo-List')
                            <li class="nav-item">
                                <a href="{{ route('employee_additional_infos.employee_additional_info.index', ['employee' => $employee]) }}"
                                    class="nav-link {{ request()->is('employees/*/additional_info*') ? 'active' : ' ' }}">
                                    <i class="fas fa-certificate nav-icon"></i>
                                    <p>{{ __('employee.Other Info') }} </p>
                                    <span class="badge badge-pill badge-primary"></span>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
            @permission('experience-List')
                <li class="nav-item">
                    <a href="{{ route('employee_experiences.employee_experience.index', ['employee' => $employee]) }}"
                        class="nav-link {{ request()->is('employees/*/experience', 'employees/*/experience/show*', 'employees/*/experience/edit*') ? 'active' : ' ' }}">
                        <i class="fas fa-list-alt nav-icon"></i>
                        <p>{{ __('employee.Experience') }}</p>
                    </a>
                </li>
            @endpermission

            @permission('judiciaryPunishments-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['employees/*/administrative*', 'employees/*/judiciary*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gavel"></i>
                        <p>
                            {{ __('employee.Punishment') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee_administrative_punishments.employee_administrative_punishment.index', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/administrative*') ? 'active' : ' ' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>{{ __('employee.Administrative Punishments') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee_judiciary_punishments.employee_judiciary_punishment.index', ['employee' => $employee]) }}"
                                class="nav-link  {{ request()->is('employees/*/judiciary*') ? 'active' : ' ' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>{{ __('employee.Judiciary Punishments') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endpermission

            @permission('disasters-List')
                <li class="nav-item">
                    <a href="{{ route('employee_disasters.employee_disaster.index', ['employee' => $employee]) }}"
                        class="nav-link {{ request()->is('employees/*/disaster', 'employees/*/disaster/show*', 'employees/*/disaster/edit*') ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-car-crash"></i>
                        <p>{{ __('employee.Disaster') }}</p>
                    </a>
                </li>
            @endpermission

            @permission('certifications-List')
                <li
                    class="nav-item has-treeview  {{ request()->is(['employees/*/certification*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                            {{ __('employee.Certification') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee_certifications.employee_certification.create', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/certification/create') ? 'active' : ' ' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>{{ __('setting.New') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee_certifications.employee_certification.index', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/certification', 'employees/*/certification/show*', 'employees/*/certification/edit*') ? 'active' : ' ' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>{{ __('employee.List') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endpermission

            @permission('awards-List')
                <li class="nav-item has-treeview {{ request()->is(['employees/*/award*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-award"></i>
                        <p>
                            {{ __('employee.Awards') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee_awards.employee_award.create', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/award/create') ? 'active' : ' ' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>{{ __('setting.New') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee_awards.employee_award.index', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/award', 'employees/*/award/show*', 'employees/*/award/edit*') ? 'active' : ' ' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>{{ __('employee.List') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endpermission

            @permission('studyTrainings-List')
                <li
                    class="nav-item has-treeview {{ request()->is(['employees/*/studytraining*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            {{ __('employee.Study and Training') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee_study_trainings.employee_study_training.create', ['employee' => $employee]) }}"
                                class="nav-link  {{ request()->is('employees/*/studytraining/create') ? 'active' : ' ' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>{{ __('setting.New') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee_study_trainings.employee_study_training.index', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/studytraining', 'employees/*/studytraining/show*', 'employees/*/studytraining/edit*') ? 'active' : ' ' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>{{ __('employee.List') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endpermission

            @permission('files-List')
                <li class="nav-item has-treeview {{ request()->is(['employees/*/file*']) ? 'menu-open' : ' ' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            {{ __('employee.Files') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee_files.employee_file.create', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/file/create') ? 'active' : ' ' }}">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>{{ __('setting.New') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee_files.employee_file.index', ['employee' => $employee]) }}"
                                class="nav-link {{ request()->is('employees/*/file') ? 'active' : ' ' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>{{ __('employee.List') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endpermission
{{-- @endrole --}}
            @permission('lebel-List')
                <li class="nav-item">
                    <a href="/level" class="nav-link">
                        <i class="nav-icon fas fa-times-circle"></i>
                        <p>
                            Level
                        </p>
                    </a>
                </li>
            @endpermission

            @permission('leader-List')
                <li class="nav-item">
                    <a href="/leadership_summary_form" class="nav-link">
                        <i class="nav-icon fas fa-times-circle"></i>
                        <p>
                            Leadership Summary Form
                        </p>
                    </a>
                </li>
            @endpermission

            <!-- @permission('Help')
    -->
                <li class="nav-item">
                    <a href="{{ route('helps.help.index') }}"
                        class="nav-link {{ request()->is('help*') ? 'active' : ' ' }}">
                        <i class="nav-icon fa fa-question"></i>
                        <p>
                            {{ __('setting.help') }}
                        </p>
                    </a>
                </li>
                <!--
@endpermission -->
            {{-- <li class="nav-item">
                <a href="{{ route('helps.help.index') }}"
                    class="nav-link {{ request()->is('help*') ? 'active' : ' ' }}">
                    <i class="nav-icon fa fa-question"></i>
                    <p>
                        About Us
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ route('helps.help.index') }}"
                    class="nav-link {{ request()->is('help*') ? 'active' : ' ' }}">
                    <i class="fas fa-certificate nav-icon"></i>
                    <p>
                        Other Info
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ route('helps.help.index') }}"
                    class="nav-link {{ request()->is('help*') ? 'active' : ' ' }}">
                    <i class="fas fa-certificate nav-icon"></i>
                    <p>
                        Manage Profile
                    </p>
                </a>
            </li> --}}

    </nav>
</div>
