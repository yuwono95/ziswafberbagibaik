<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'team'                      => 'Team',
            'team_helper'               => ' ',
            'team_admin'                => 'Team Admin',
            'team_admin_helper'         => ' ',
            'kecamatan'                 => 'Kecamatan',
            'kecamatan_helper'          => ' ',
            'phone'                     => 'Phone',
            'phone_helper'              => ' ',
        ],
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
    ],
    'perolehanUpa' => [
        'title'          => 'Perolehan UPA',
        'title_singular' => 'Perolehan UPA',
    ],
    'perolehanSendiri' => [
        'title'          => 'Perolehan Sendiri',
        'title_singular' => 'Perolehan Sendiri',
    ],
    'perolehanDpc' => [
        'title'          => 'Perolehan DPC',
        'title_singular' => 'Perolehan DPC',
    ],
    'topTenUpa' => [
        'title'          => 'Top 10 UPA',
        'title_singular' => 'Top 10 UPA',
    ],
    'perolehanSemuaDpc' => [
        'title'          => 'Perolehan Semua DPC',
        'title_singular' => 'Perolehan Semua DPC',
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'inputPerolehan' => [
        'title'          => 'Input Perolehan',
        'title_singular' => 'Input Perolehan',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'zakatprofesi'           => 'Zakat Profesi',
            'zakatprofesi_helper'    => ' ',
            'zakatmaal'              => 'Zakat Maal',
            'zakatmaal_helper'       => ' ',
            'zakatfitrah'            => 'Zakat Fitrah',
            'zakatfitrah_helper'     => ' ',
            'infaq'                  => 'Infaq',
            'infaq_helper'           => ' ',
            'sedekah'                => 'Sedekah',
            'sedekah_helper'         => ' ',
            'wakafpendidikan'        => 'Wakaf Pendidikan',
            'wakafpendidikan_helper' => ' ',
            'wakafproduktif'         => 'Wakaf Produktif',
            'wakafproduktif_helper'  => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'infaqkesehatan'         => 'Taawun Sihi',
            'infaqkesehatan_helper'  => ' ',
            'namadonatur'            => 'Nama Donatur',
            'namadonatur_helper'     => ' ',
            'nomorhp'                => 'Nomor HP',
            'nomorhp_helper'         => ' ',
            'buktitransfer'          => 'Bukti Transfer',
            'buktitransfer_helper'   => ' ',
            'namabank'               => 'Nama Bank',
            'namabank_helper'        => ' ',
            'verifiedstatus'         => 'Verified Status',
            'verifiedstatus_helper'  => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
        ],
    ],
    'bank' => [
        'title'          => 'Bank',
        'title_singular' => 'Bank',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'namabank'          => 'Nama Bank',
            'namabank_helper'   => ' ',
        ],
    ],
    'verifiedStatus' => [
        'title'          => 'Verified Status',
        'title_singular' => 'Verified Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'topTenAnggota' => [
        'title'          => 'Top 10 Anggota',
        'title_singular' => 'Top 10 Anggota',
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
            'kecamatan'         => 'Kecamatan',
            'kecamatan_helper'  => ' ',
        ],
    ],
    'kecamatan' => [
        'title'          => 'Kecamatan',
        'title_singular' => 'Kecamatan',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'namakecamatan'        => 'Nama Kecamatan',
            'namakecamatan_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
];
