<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'report_access',
            ],
            [
                'id'    => 18,
                'title' => 'perolehan_upa_create',
            ],
            [
                'id'    => 19,
                'title' => 'perolehan_upa_edit',
            ],
            [
                'id'    => 20,
                'title' => 'perolehan_upa_show',
            ],
            [
                'id'    => 21,
                'title' => 'perolehan_upa_delete',
            ],
            [
                'id'    => 22,
                'title' => 'perolehan_upa_access',
            ],
            [
                'id'    => 23,
                'title' => 'perolehan_sendiri_create',
            ],
            [
                'id'    => 24,
                'title' => 'perolehan_sendiri_edit',
            ],
            [
                'id'    => 25,
                'title' => 'perolehan_sendiri_show',
            ],
            [
                'id'    => 26,
                'title' => 'perolehan_sendiri_delete',
            ],
            [
                'id'    => 27,
                'title' => 'perolehan_sendiri_access',
            ],
            [
                'id'    => 28,
                'title' => 'perolehan_dpc_create',
            ],
            [
                'id'    => 29,
                'title' => 'perolehan_dpc_edit',
            ],
            [
                'id'    => 30,
                'title' => 'perolehan_dpc_show',
            ],
            [
                'id'    => 31,
                'title' => 'perolehan_dpc_delete',
            ],
            [
                'id'    => 32,
                'title' => 'perolehan_dpc_access',
            ],
            [
                'id'    => 33,
                'title' => 'top_ten_upa_create',
            ],
            [
                'id'    => 34,
                'title' => 'top_ten_upa_edit',
            ],
            [
                'id'    => 35,
                'title' => 'top_ten_upa_show',
            ],
            [
                'id'    => 36,
                'title' => 'top_ten_upa_delete',
            ],
            [
                'id'    => 37,
                'title' => 'top_ten_upa_access',
            ],
            [
                'id'    => 38,
                'title' => 'perolehan_semua_dpc_create',
            ],
            [
                'id'    => 39,
                'title' => 'perolehan_semua_dpc_edit',
            ],
            [
                'id'    => 40,
                'title' => 'perolehan_semua_dpc_show',
            ],
            [
                'id'    => 41,
                'title' => 'perolehan_semua_dpc_delete',
            ],
            [
                'id'    => 42,
                'title' => 'perolehan_semua_dpc_access',
            ],
            [
                'id'    => 43,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 44,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 45,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 46,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 47,
                'title' => 'input_perolehan_create',
            ],
            [
                'id'    => 48,
                'title' => 'input_perolehan_edit',
            ],
            [
                'id'    => 49,
                'title' => 'input_perolehan_show',
            ],
            [
                'id'    => 50,
                'title' => 'input_perolehan_delete',
            ],
            [
                'id'    => 51,
                'title' => 'input_perolehan_access',
            ],
            [
                'id'    => 52,
                'title' => 'bank_create',
            ],
            [
                'id'    => 53,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 54,
                'title' => 'bank_show',
            ],
            [
                'id'    => 55,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 56,
                'title' => 'bank_access',
            ],
            [
                'id'    => 57,
                'title' => 'verified_status_create',
            ],
            [
                'id'    => 58,
                'title' => 'verified_status_edit',
            ],
            [
                'id'    => 59,
                'title' => 'verified_status_show',
            ],
            [
                'id'    => 60,
                'title' => 'verified_status_delete',
            ],
            [
                'id'    => 61,
                'title' => 'verified_status_access',
            ],
            [
                'id'    => 62,
                'title' => 'top_ten_anggota_create',
            ],
            [
                'id'    => 63,
                'title' => 'top_ten_anggota_edit',
            ],
            [
                'id'    => 64,
                'title' => 'top_ten_anggota_show',
            ],
            [
                'id'    => 65,
                'title' => 'top_ten_anggota_delete',
            ],
            [
                'id'    => 66,
                'title' => 'top_ten_anggota_access',
            ],
            [
                'id'    => 67,
                'title' => 'team_create',
            ],
            [
                'id'    => 68,
                'title' => 'team_edit',
            ],
            [
                'id'    => 69,
                'title' => 'team_show',
            ],
            [
                'id'    => 70,
                'title' => 'team_delete',
            ],
            [
                'id'    => 71,
                'title' => 'team_access',
            ],
            [
                'id'    => 72,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
