<?php

/**
 * Database config variables
 * Change this according to your server settings
 */



// Definitely your Database Host name
define("DB_HOST", "localhost");

// change the user access, CPanel have user roles, when writing and reading files
// set it to allow the certain User to read/write
define("DB_USER", "cipluxc_mavis");

// change this according to your account credentials
define("DB_PASSWORD", "mavis");

// if you wish you create your own name for 
// Database then change the word "cipluxc_db_mavis"
define("DB_DATABASE", "cipluxc_db_mavis");



// If deployed in a web server, change this according to your configuration
// For Example. the domain name is www.someUrl.com, then if the php files are stored in
// a folder named as "responsive" then the complete url would be
// www.someUrl.com/responsive/
define("ROOT_URL", "http://localhost/workspace/my-project/mavis/");


// FOLDER DIRECTORY FOR XML DATA PHP FILE
// DONT CHANGE THIS
define("XML_FILE", "json/data_xml.php");

// FOLDER DIRECTORY FOR JSON DATA PHP FILE
// DONT CHANGE THIS
define("JSON_FILE", "json/data_json.php");



// DON NOT CHANGE THIS
// FOLDER DIRECTORY FOR IMAGES UPLOADED FROM
// THE DESKTOP
define("IMAGE_UPLOAD_DIR", "upload_pic");

?>