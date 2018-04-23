# foodzilla
1. if you used wamp than please got to foodzilla/media/header/header.php file and remove comment of define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']."/foodzilla/"); and comment code define('BASE_PATH', "http://localhost/foodzilla/");
2. import dabase from foodzilla/foodzilla.sql file.
3. change database credential as per your systemin foodzilla/media/databse/path_config.php
4. if you are going to execute this project on your localhost than you have to execute the following command on cmd to load api data on browser
    chrome.exe --user-data-dir="C://Chrome dev session" --disable-web-security
