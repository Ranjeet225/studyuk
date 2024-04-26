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
        'leads_dashboard' => [
            'leads_dashboard.create',
            'leads_dashboard.view',
            'leads_dashboard.update',
            'leads_dashboard.delete',
        ],
        'add_leads' => [
            'add_leads.create',
            'add_leads.view',
            'add_leads.update',
            'add_leads.delete',
        ],
        'bulk_upload' => [
            'bulk_upload.create',
            'bulk_upload.view',
            'bulk_upload.update',
            'bulk_upload.delete',
        ],
        'pending_lead' => [
            'pending_lead.create',
            'pending_lead.view',
            'pending_lead.update',
            'pending_lead.delete',
        ],
        'assigned_lead' => [
            'assigned_lead.create',
            'assigned_lead.view',
            'assigned_lead.update',
            'assigned_lead.delete',
        ],
        'latest_updated_leads' => [
            'latest_updated_leads.create',
            'latest_updated_leads.view',
            'latest_updated_leads.update',
            'latest_updated_leads.delete',
        ],
        'oel_360' => [
            'oel_360.create',
            'oel_360.view',
            'oel_360.update',
            'oel_360.delete',
        ],
      ],
];
