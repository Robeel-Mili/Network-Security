<?php
// Check if form is submitted

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get form data
//     $id = $_POST["id"];
//     $id_str = $_POST["id_str"];
//     $screen_name = $_POST["screen_name"];
//     $location = $_POST["location"];
//     $description = $_POST["description"];
//     $url = $_POST["url"];
//     $followers_count = $_POST["followers_count"];
//     $friends_count = $_POST["friends_count"];
//     $listed_count = $_POST["listed_count"];
//     $created_at = $_POST["created_at"];
//     $favourites_count = $_POST["favourites_count"];
//     $verified = $_POST["verified"];
//     $statuses_count = $_POST["statuses_count"];
//     $lang = $_POST["lang"];
//     $status = $_POST["status"];
//     $default_profile = $_POST["default_profile"];
//     $default_profile_image = $_POST["default_profile_image"];
//     $has_extended_profile = $_POST["has_extended_profile"];
//     $name = $_POST["name"];

//     // Open or create CSV file in append mode
//     $file = fopen("data.csv", "a");

//     // Check if file is empty
//     // if (filesize("data.csv") == 0) {
//     //     // Add field names as the first row
//     //     fputcsv($file, array("ID", "ID String", "Screen Name", "Location", "Description", "URL", "Followers Count", "Friends Count", "Listed Count", "Created At", "Favourites Count", "Verified", "Statuses Count", "Language", "Status", "Default Profile", "Default Profile Image", "Has Extended Profile", "Name"));
//     // }

//     // Write data to CSV file
//     fputcsv($file, array($id, $id_str, $screen_name, $location, $description, $url, $followers_count, $friends_count, $listed_count, $created_at, $favourites_count, $verified, $statuses_count, $lang, $status, $default_profile, $default_profile_image, $has_extended_profile, $name));

//     // Close file
//     fclose($file);

//     // Redirect back to the form page
//     header("Location: index.php");
//     exit(); // Make sure to exit after redirection
//    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filepath = "data.csv";
    $file = fopen($filepath, "a+"); 

    if ($file === false) {
        echo "Error opening the file $filepath";
        exit();
    }

    fseek($file, 0, SEEK_END);
    if (ftell($file) === 0) {
        // File is empty, write headers
        $headers = array("id", "id_str", "screen_name", "location", "description", "url", "followers_count", "friends_count", "listed_count", "created_at", "favorites_count", "verified", "statuses_count", "lang", "status", "default_profile", "default_profile_image", "has_extended_profile", "name", "bot");
        fputcsv($file, $headers);
    }

    $data = [
        $_POST["id"], $_POST["id_str"], $_POST["screen_name"], $_POST["location"], $_POST["description"],
        $_POST["url"], $_POST["followers_count"], $_POST["friends_count"], $_POST["listed_count"],
        $_POST["created_at"], $_POST["favourites_count"], $_POST["verified"], $_POST["statuses_count"],
        $_POST["lang"], $_POST["status"], $_POST["default_profile"], $_POST["default_profile_image"],
        $_POST["has_extended_profile"], $_POST["name"]
    ];

    // Write data to CSV file
    fputcsv($file, $data);

    // Close the file
    fclose($file);

    // Redirect back to the form page
    header("Location: index.php");
    exit();
}
