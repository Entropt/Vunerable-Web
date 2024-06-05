<?php
include 'random_class.php';

$requestedFile = 'phar://test.jpeg';

$allowedDirectories = [
    '/var/www/vunerable-web'
];

// // Get the real path of the requested file
// $requestedFile = realpath($requestedFile);

// foreach ($allowedDirectories as $directory) {
//     // Check if the requested file is within the allowed directory
//     if (strpos($requestedFile, $directory) === 0) {
//         $filePath = $requestedFile;
//         break; // Exit the loop if a valid file path is found
//     }
// }

$filePath = $requestedFile;

if (file_exists($filePath)) {
    $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    // Set the appropriate content type header based on the file extension
    switch ($fileExtension) {
        case 'jpg':
        case 'jpeg':
            $contentType = 'image/jpeg';
            break;
        case 'png':
            $contentType = 'image/png';
            break;
        case 'gif':
            $contentType = 'image/gif';
            break;
            // Add more cases for other file types as needed
        default:
            $contentType = 'application/octet-stream';
            break;
    }

    // Read the file contents
    $fileContents = file_get_contents($filePath);

    // Output the file contents
    echo $fileContents;
} else {
    echo 'File not found.';
}
