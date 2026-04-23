<?php
// Database configuration
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = ''; // Set your password if any
const DB_NAME = 'mini_erp';

// Base URL
const BASE_URL = 'http://localhost/mini-erp-inventory-management/';

// Session settings
const SESSION_TIMEOUT = 30; // in minutes

// Upload settings
const UPLOAD_PATH = __DIR__ . '/uploads/';

// Other constants
const APP_NAME = 'Mini ERP';
const APP_VERSION = '1.0.0';

// Initialize session
session_start();

// Set session timeout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT * 60)) {
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>