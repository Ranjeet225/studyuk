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
        'leads_list' => [
            'leads_lists.view',
        ],
        'universities' => [
            'universities.create',
            'universities.view',
            'universities.update',
            'universities.delete',
            'universities.show',
        ],
        'courses' => [
            'courses.create',
            'courses.view',
            'courses.update',
            'courses.delete',
            'courses.show',
        ],
        'application_status' => [
            'application_status.create',
            'application_status.view',
            'application_status.update',
            'application_status.delete',
            'application_status.show',
        ],
        'offer_details' => [
            'offer_details.create',
            'offer_details.view',
            'offer_details.update',
            'offer_details.delete',
            'offer_details.show',
        ],
        'visa_application' => [
            'visa_application.create',
            'visa_application.view',
            'visa_application.update',
            'visa_application.delete',
            'visa_application.show',
        ],
        'visa_status' => [
            'visa_status.create',
            'visa_status.view',
            'visa_status.update',
            'visa_status.delete',
            'visa_status.show',
        ],
        'fee_details' => [
            'fee_details.create',
            'fee_details.view',
            'fee_details.update',
            'fee_details.delete',
            'fee_details.show',
        ],
        'flight_details' => [
            'flight_details.create',
            'flight_details.view',
            'flight_details.update',
            'flight_details.delete',
            'flight_details.show',
        ],
        'take_off' => [
            'take_off.create',
            'take_off.view',
            'take_off.update',
            'take_off.delete',
            'take_off.show',
        ],
        'boarding' => [
            'boarding.create',
            'boarding.view',
            'boarding.update',
            'boarding.delete',
            'boarding.show',
        ],
        'done' => [
            'done.show',
        ],
      ],
];
