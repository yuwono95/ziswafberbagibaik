<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/teams*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('input_perolehan_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.input-perolehans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/input-perolehans") || request()->is("admin/input-perolehans/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.inputPerolehan.title') }}
                </a>
            </li>
        @endcan
        @can('report_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/top-ten-upas*") ? "c-show" : "" }} {{ request()->is("admin/top-ten-anggota*") ? "c-show" : "" }} {{ request()->is("admin/perolehan-semua-dpcs*") ? "c-show" : "" }} {{ request()->is("admin/perolehan-dpcs*") ? "c-show" : "" }} {{ request()->is("admin/perolehan-upas*") ? "c-show" : "" }} {{ request()->is("admin/perolehan-sendiris*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.report.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('top_ten_upa_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.top-ten-upas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/top-ten-upas") || request()->is("admin/top-ten-upas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.topTenUpa.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('top_ten_anggotum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.top-ten-anggota.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/top-ten-anggota") || request()->is("admin/top-ten-anggota/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.topTenAnggotum.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('perolehan_semua_dpc_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.perolehan-semua-dpcs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/perolehan-semua-dpcs") || request()->is("admin/perolehan-semua-dpcs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.perolehanSemuaDpc.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('perolehan_dpc_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.perolehan-dpcs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/perolehan-dpcs") || request()->is("admin/perolehan-dpcs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.perolehanDpc.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('perolehan_upa_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.perolehan-upas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/perolehan-upas") || request()->is("admin/perolehan-upas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.perolehanUpa.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('perolehan_sendiri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.perolehan-sendiris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/perolehan-sendiris") || request()->is("admin/perolehan-sendiris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.perolehanSendiri.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('bank_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.banks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/banks") || request()->is("admin/banks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bank.title') }}
                </a>
            </li>
        @endcan
        @can('verified_status_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.verified-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/verified-statuses") || request()->is("admin/verified-statuses/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.verifiedStatus.title') }}
                </a>
            </li>
        @endcan
        @can('verifikasi_perolehan_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.verifikasi-perolehans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/verifikasi-perolehans") || request()->is("admin/verifikasi-perolehans/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.verifikasiPerolehan.title') }}
                </a>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                <li class="c-sidebar-nav-item">
                    <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "c-active" : "" }} c-sidebar-nav-link" href="{{ route("admin.team-members.index") }}">
                        <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                        </i>
                        <span>{{ trans("global.team-members") }}</span>
                    </a>
                </li>
            @endif
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>