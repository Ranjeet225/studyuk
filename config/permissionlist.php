<?php

return [
    'permissions' => [
        'dashboard' => [
            'dashboard.view'
        ],
        'admin_user' => [
            'admin_user.create',
            'admin_user.view',
            'admin_user.update',
            'admin_user.delete',
        ],
        'role_permissions' => [
            'role_permissions.create',
            'role_permissions.view',
            'role_permissions.update',
            'role_permissions.delete',
        ],
        'profile' => [
            'profile.view',
            'profile.update',
        ],
        'student' => [
            'student.view',
            'student.create',
            'student.edit',
            'student.update',
        ],
      ],
];
