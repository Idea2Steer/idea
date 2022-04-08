<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::login');
$routes->add('logout', 'Home::logout');
$routes->add('Home/checkDetails', 'Home::checkDetails');
$routes->add('Home/checkEmail', 'Home::checkEmail');
$routes->add('Home/getStateBycountryID', 'Home::getStateBycountryID');
$routes->add('Home/getCityListByStateID', 'Home::getCityListByStateID');
$routes->add('register', 'Home::register');

$routes->group("", ["filter" => "AdminFilter"] , function($routes){
    $routes->add("Admin", "Admin::index");
    $routes->add("Admin/viewProfile", "Admin::viewProfile");
    $routes->add("Admin/updateProfile", "Admin::updateProfile");
    $routes->add("Admin/billing", "Admin::billing");
    $routes->add("Admin/editProfile", "Admin::editProfile");
    $routes->add("Admin/changePassword", "Admin::changePassword");
    $routes->add("Admin/updatePassword", "Admin::updatePassword");
    $routes->add("Admin/saveBankDetails", "Admin::saveBankDetails");
    $routes->add("Admin/saveUserCardDetails", "Admin::saveUserCardDetails");
    $routes->add("Admin/getCardInformation", "Admin::getCardInformation");
    $routes->add('Admin/deleteCardInformation/(:any)', 'Admin::deleteCardInformation/$1');
    //company
    $routes->add("Admin/companyDetails", "Admin::companyDetails");
    $routes->add("Admin/updateCompanyDetails", "Admin::updateCompanyDetails");
    $routes->add("Admin/editCompanyDetails", "Admin::editCompanyDetails");
    
    // Contact List
    $routes->add("Admin/addContact", "Admin::addContact");
    $routes->add("Admin/saveContactDetails", "Admin::saveContactDetails");
    $routes->add("Admin/employeeContactList", "Admin::employeeContactList");
    $routes->add('Admin/deleteEmployeeContactInfo/(:any)', 'Admin::deleteEmployeeContactInfo/$1'); 
    $routes->add('Admin/editContact/(:any)', 'Admin::editContact/$1'); 
    $routes->add("Admin/updateContactDetails", "Admin::updateContactDetails");
    $routes->add("Admin/contractorContactList", "Admin::contractorContactList");
    $routes->add("Admin/clientContactList", "Admin::clientContactList");
    // Project 
    $routes->add("Admin/projectList", "Admin::projectList");
    $routes->add("Admin/addProject", "Admin::addProject");
    $routes->add("Admin/saveProjectInfo", "Admin::saveProjectInfo");
    $routes->add('Admin/editProject/(:any)', 'Admin::editProject/$1');  
    $routes->add("Admin/updateProjectInfo", "Admin::updateProjectInfo");
    $routes->add('Admin/deleteProjectInformation/(:any)', 'Admin::deleteProjectInformation/$1'); 
    $routes->add('Admin/assignedProject', 'Admin::assignedProject'); 
    $routes->add("Admin/assignedProjectList", "Admin::assignedProjectList");
    $routes->add("Admin/getAssignedDevelopers", "Admin::getAssignedDevelopers");
    $routes->add('Admin/projectDetails/(:any)', 'Admin::projectDetails/$1'); 
    $routes->add("Admin/getUserListByUserType", "Admin::getUserListByUserType");
    $routes->add('Admin/deleteAttachedFiles/(:any)/(:any)', 'Admin::deleteAttachedFiles/$1/$2'); 
    $routes->add("Admin/viewReceivedAmount", "Admin::viewReceivedAmount");
    $routes->add('Admin/projectInfo/(:any)', 'Admin::projectInfo/$1'); 
    $routes->add('Admin/assignedDevelopersList/(:any)', 'Admin::assignedDevelopersList/$1'); 
    //Accounts
    $routes->add("Admin/projectFinancialDetails", "Admin::projectFinancialDetails"); 
    $routes->add('Admin/viewProjectFinancialDetails/(:any)', 'Admin::viewProjectFinancialDetails/$1'); 
    //Client 
    $routes->add("Admin/clientFinancialDetails", "Admin::clientFinancialDetails"); 
    $routes->add('Admin/viewClientFinancialDetails/(:any)', 'Admin::viewClientFinancialDetails/$1'); 
    //Contractor
    $routes->add("Admin/contractorFinancialDetails", "Admin::contractorFinancialDetails"); 
    $routes->add('Admin/viewContractorFinancialDetails/(:any)', 'Admin::viewContractorFinancialDetails/$1');
    //Employee
    $routes->add("Admin/employeeFinancialDetails", "Admin::employeeFinancialDetails"); 
    $routes->add('Admin/viewEmployeeFinancialDetails/(:any)', 'Admin::viewEmployeeFinancialDetails/$1'); 
    // Invoices
    $routes->add('Admin/invoiceDetails', 'Admin::invoiceDetails');
    $routes->add('Admin/generateInvoice', 'Admin::generateInvoice'); 
    $routes->add("Admin/saveInvoiceDetails", "Admin::saveInvoiceDetails");  
    $routes->add("Admin/getUserByProjectID", "Admin::getUserByProjectID"); 
    $routes->add("Admin/viewAllInvoices", "Admin::viewAllInvoices");   
    $routes->add('Admin/viewInvoices/(:any)', 'Admin::viewInvoices/$1');
    $routes->add("Admin/viewAllCustomInvoices", "Admin::viewAllCustomInvoices");  
    $routes->add("Admin/saveCustomInvoiceDetails", "Admin::saveCustomInvoiceDetails");  
    //Employee Invoices
    $routes->add('Admin/generateEmployeeInvoice', 'Admin::generateEmployeeInvoice'); 
    $routes->add('Admin/getEmployeeByProjectID', 'Admin::getEmployeeByProjectID'); 
    $routes->add('Admin/getEmployeeHireInfo', 'Admin::getEmployeeHireInfo'); 

    $routes->add("Admin/viewAllEmployeeInvoices", "Admin::viewAllEmployeeInvoices");   
    $routes->add("Admin/viewAllCustomEmployeeInvoices", "Admin::viewAllCustomEmployeeInvoices");
});
// Developer
$routes->group("", ["filter" => "DeveloperFilter"] , function($routes){
    $routes->add("Developer", "Developer::index");
    
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


