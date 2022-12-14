<div class="sidebar">
    <div class="text-center">
        <div class=" mt-3 pb-3 mb-3 d-flex">
            <div class="info ">
                @if (isset($employee->photo))
                <img src="{{ asset('uploads/photo/' . $employee->photo) }}" height="140px" width="140px"
                    class="profile-user-img img-fluid img-circle ml-5">
                @else
                <span class="fas fa-5x fa-user-circle m-2 ml-5 text-light"></span>
                @endif
            </div>
        </div>
        <span class="brand-text text-light">
            @if (isset($employee->en_name))
            <h5>{{ $employee->en_name }}</h5>
            @else
            Full Name
            @endif
        </span>
        <span class="brand-text text-light">
            @if (isset($employee->phone_number))
            <span class="fa fa-phone-alt"> </span> {{ $employee->phone_number }}
            @else
            Contacts
            @endif
        </span>
    </div>
    <hr class="text-light">

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li
                class="nav-item has-treeview {{ request()->is(['employees/*/address*', 'employees/*/bank_account*', 'employees/*/disability*', 'employees/*/education*', 'employees/*/emergency*', 'employees/*/family*', 'employees/*/language*', 'employees/*/license*', 'employees/*/additional_info*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>
                        {{(__('employee.Personal Information'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @permission('address_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_addresses.employee_address.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/address*') ? 'active' : ' ' }}">
                            <i class="fas fa-address-card nav-icon"></i>
                            <p>{{(__('employee.Address'))}}</p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('bankAccount_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_bank_accounts.employee_bank_account.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/bank_account*') ? 'active' : ' ' }}">
                            <i class="fas fa-piggy-bank nav-icon"></i>
                            <p>{{(__('employee.Bank Accounts'))}}</p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('disabilities_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_disabilities.employee_disability.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/disability*') ? 'active' : ' ' }}">
                            <i class="fas fa-blind nav-icon"></i>
                            <p>{{(__('employee.Disability'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('disabilities_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_educations.employee_education.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/education*') ? 'active' : ' ' }}">
                            <i class="fas fa-school nav-icon"></i>
                            <p>{{(__('employee.Education'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('educations_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_emergencies.employee_emergency.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/emergency*') ? 'active' : ' ' }}">
                            <i class="fas fa-ambulance nav-icon"></i>
                            <p>{{(__('employee.Emeregency'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('families_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_families.employee_family.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/family*') ? 'active' : ' ' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <p>{{(__('employee.Family'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('languages_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_languages.employee_language.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/language*') ? 'active' : ' ' }}">
                            <i class="fas fa-language nav-icon"></i>
                            <p>{{(__('employee.Language'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('licenses_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_licenses.employee_license.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/license*') ? 'active' : ' ' }}">
                            <i class="fas fa-certificate nav-icon"></i>
                            <p>{{(__('employee.License'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission

                    @permission('additionalInfo_List')
                    <li class="nav-item">
                        <a href="{{ route('employee_additional_infos.employee_additional_info.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/additional_info*') ? 'active' : ' ' }}">
                            <i class="fas fa-certificate nav-icon"></i>
                            <p>{{(__('employee.Other Info'))}} </p>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    @endpermission
                </ul>
            </li>

            @permission('experience_List')
            <li class="nav-item has-treeview {{ request()->is(['employees/*/experience*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        {{(__('employee.Experience'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_experiences.employee_experience.create', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/experience/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_experiences.employee_experience.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/experience','employees/*/experience/show*','employees/*/experience/edit*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission

            @permission('judiciaryPunishments_List')
            <li
                class="nav-item has-treeview {{ request()->is(['employees/*/administrative*', 'employees/*/judiciary*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-gavel"></i>
                    <p>
                        {{(__('employee.Punishment'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_administrative_punishments.employee_administrative_punishment.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/administrative*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.Administrative Punishments'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_judiciary_punishments.employee_judiciary_punishment.index', ['employee' => $employee]) }}"
                            class="nav-link  {{ request()->is('employees/*/judiciary*') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('employee.Judiciary Punishments'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission

            @permission('disasters_List')
            <li class="nav-item has-treeview {{ request()->is(['employees/*/disaster*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-car-crash"></i>
                    <p>
                        {{(__('employee.Disaster'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_disasters.employee_disaster.create', ['employee' => $employee]) }}"
                            class="nav-link  {{ request()->is('employees/*/disaster/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_disasters.employee_disaster.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/disaster','employees/*/disaster/show*','employees/*/disaster/edit*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission


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
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>New</p>
                        </a>
                    </li>
                </ul>
            </li> --}}

            @permission('certifications_List')
            <li class="nav-item has-treeview  {{ request()->is(['employees/*/certification*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-certificate"></i>
                    <p>
                        {{(__('employee.Certification'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_certifications.employee_certification.create', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/certification/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_certifications.employee_certification.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/certification', 'employees/*/certification/show*', 'employees/*/certification/edit*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Leave
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>New</p>
                        </a>
                    </li>
                </ul>
            </li> --}}

            @permission('awards_List')
            <li class="nav-item has-treeview {{ request()->is(['employees/*/award*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-award"></i>
                    <p>
                        {{(__('employee.Awards'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_awards.employee_award.create', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/award/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_awards.employee_award.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/award', 'employees/*/award/show*', 'employees/*/award/edit*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-signature"></i>
                    <p>
                        Attendance
                    </p>
                </a>
            </li> --}}
            @permission('studyTrainings_List')
            <li class="nav-item has-treeview {{ request()->is(['employees/*/studytraining*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        {{(__('employee.Study and Training'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_study_trainings.employee_study_training.create', ['employee' => $employee]) }}"
                            class="nav-link  {{ request()->is('employees/*/studytraining/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_study_trainings.employee_study_training.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/studytraining', 'employees/*/studytraining/show*', 'employees/*/studytraining/edit*') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission

            @permission('files_List')
            <li class="nav-item has-treeview {{ request()->is(['employees/*/file*']) ? 'menu-open' : ' ' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>
                        {{(__('employee.Files'))}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee_files.employee_file.index', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/file') ? 'active' : ' ' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>{{(__('setting.New'))}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee_files.employee_file.create', ['employee' => $employee]) }}"
                            class="nav-link {{ request()->is('employees/*/file/create') ? 'active' : ' ' }}">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>{{(__('employee.List'))}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission

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

            @permission('weight_List')
            <li class="nav-item">
                <a href="/weight" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Weight
                    </p>
                </a>
            </li>
            @endpermission

            @permission('competency_List')
            <li class="nav-item">
                <a href="/competency" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Competency
                    </p>
                </a>
            </li>
            @endpermission

            @permission('leader_List')
            <li class="nav-item">
                <a href="/leadership_summary_form" class="nav-link">
                    <i class="nav-icon fas fa-times-circle"></i>
                    <p>
                        Leadership Summary Form
                    </p>
                </a>
            </li>
            @endpermission
        </ul>
    </nav>
</div>
