<?php

return [
    'userManagement' => [
        'title'          => 'Manajemen User',
        'title_singular' => 'Manajemen User',
    ],
    'permission' => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
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
        'title'          => 'Peranan',
        'title_singular' => 'Peranan',
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
        'title'          => 'Daftar Pengguna',
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
            'team'                      => 'Team',
            'team_helper'               => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
    ],
    'topTenAnggotum' => [
        'title'          => 'Top 10 Anggota',
        'title_singular' => 'Top 10 Anggotum',
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
        ],
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
            'team'              => 'Team',
            'team_helper'       => ' ',
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
            'team'                   => 'Team',
            'team_helper'            => ' ',
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
            'verified'               => 'Verified',
            'verified_helper'        => ' ',
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
];
