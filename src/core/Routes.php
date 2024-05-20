<?php
namespace MyApp\Core;

class Routes
{
  public function run()
  {
    $router = new App();
    $router->setDefaultController('DefaultApp');
    $router->setDefaultMethod('index');
    $router->setNamespace('MyApp\Controllers');

    $router->get('/reporting', ['HomeController', 'report']);
    $router->post('/report', ['HomeController', 'saveReport']);
    $router->get('/search', ['HomeController', 'search']);
    $router->post('/search-report-result', ['HomeController', 'reportResult']);
    $router->get('/details/(:id)', ['HomeController', 'viewReportDetails']);
    // $router->get('/admin', ['LoginController', 'index']);
    $router->get('/login', ['AdminController', 'index']);
    $router->get('/admin/login', ['AdminController', 'index']);
    $router->get('/logout', ['AdminController', 'logout']);
    $router->post('/admin/login', ['AdminController', 'login']);
    $router->get('/admin', ['AdminController', 'show']);
    $router->get('/admin/dashboard', ['AdminController', 'show']);
    $router->get('/admin/profile', ['AdminController', 'profile']);
    $router->post('/admin/update-profile', ['AdminController', 'update_profile']);
    $router->get('/admin/add-team', ['AdminController', 'show_add_team']);
    $router->get('/admin/manage-teams', ['AdminController', 'show_manage_team']);
    $router->post('/admin/insert-team', ['TeamController', 'insert_team']);
    $router->get('/admin/edit-team/(:id)', ['TeamController', 'edit_team']);
    $router->post('/admin/edit-team', ['TeamController', 'update_team']);

    $router->get('/admin/delete-team/(:id)', ['TeamController', 'delete_team']);

    $router->get('/admin/manage-site', ['SiteController', 'index']);
    $router->post('/admin/update-site', ['SiteController', 'updateSite']);

    $router->get('/admin/change-password', ['AdminController', 'password_recovery']);
    $router->post('/admin/update-password', ['AdminController', 'update_password']);

    $router->get('/admin/new-requests', ['RequestController', 'show_new_requests']);

    $router->get('/admin/request-details/(:id)', ['RequestController', 'show_request_details']);
    $router->get('/admin/all-requests', ['RequestController', 'show_all_requests']);

    $router->get('/admin/assigned-requests', ['RequestController', 'show_assigned_requests']);
    $router->post('/admin/assign-request', ['RequestController', 'assign_request']);
    
    $router->post('/admin/take-action', ['RequestController', 'update_action']);
    $router->get('/admin/team-ontheway-requests', ['RequestController', 'show_team_ontheway_requests']);
    $router->get('/admin/workin-progress-requests', ['RequestController', 'show_workin_progress_requests']);
    $router->get('/admin/completed-requests', ['RequestController', 'show_completed_requests']);
    $router->get('/admin/bwdates-report-ds', ['ReportController', 'show_bwdates_report_ds']);
    $router->get('/admin/search-report', ['ReportController', 'show_search_report']);
    $router->post('/admin/search-report', ['ReportController', 'search_report']);
    $router->post('/admin/search-report-by-date', ['ReportController', 'search_report_by_date']);

    $router->run();
  }
}