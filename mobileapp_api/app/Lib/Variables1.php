<?php
date_default_timezone_set('Asia/Karachi');
define('UPLOADS_FOLDER_URI', 'app/webroot/uploads');
define('VERIFICATION_DOCUMENTS', 'verification_documents');
define('RESET_PASSWORD_LINK', 'https://domain.com/mobileapp_api/resetPassword.php');
define('PREP_REGISTRATION_SUBJECT', 'Confirm your Foodies Registration');
define('VERIFICATION_PHONENO_MESSAGE', 'Your verification code is');
define('PATH_ROOT', '/home/ngon365/domains/ngon365.com');

//DATABASE
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'mysql');
define('DATABASE_NAME', 'bring_foodies');


//PostMark
define('POSTMARK_SERVER_API_TOKEN', '');
define('SUPPORT_EMAIL', 'example@example.com');

//Google Maps
define('GOOGLE_MAPS_KEY', 'AIzaSyBrsPuCTn9z39TFl-FYEyCDM02zvK4X394');


//Twilio
define('TWILIO_ACCOUNTSID', '');
define('TWILIO_AUTHTOKEN', '');
define('TWILIO_NUMBER', '');

//Firebase
define('FIREBASE_PUSH_NOTIFICATION_KEY', 'API KEY HERE');
define('FIREBASE_URL', 'url here');//https://foodies-abcd.firebaseio.com/


//STRIPE 
define('STRIPE_API_KEY', 'API KEY HERE');
define('STRIPE_CURRENCY', 'usd');



//Testing

define('TEST_EMAIL', 'here you will write your personal email so that you can test first wether emails are working or not');//hello@dinosoftlabs.com
define('TEST_NO', 'here you will write your personal phone no so that you can test first wether twilio is working or not');//'+923214751411
define('DEBUG_VALUE', 2); //0 means no errors will display on the screen. 2 means all the errors

?>


