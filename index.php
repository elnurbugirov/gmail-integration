<?php


$clientId = '515548216138-e64ge2ud3tedjhgpcon0e2qnpqkehdlk.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/index.php';
$accessToken = 'your-access-token';
$fromEmail = 'elnuraugrec@gmail.com';
$toEmail = 'seniorshahmar@gmail.com';
$subject = 'Test Email';
$body = 'This is a test email sent using Gmail API.';

// Create the email message
$message = "From: $fromEmail\r\n";
$message .= "To: $toEmail\r\n";
$message .= "Subject: $subject\r\n";
$message .= "Content-Type: text/plain; charset=UTF-8\r\n";
$message .= "\r\n";
$message .= "$body";

// Create the cURL headers
$headers = [
    'Authorization: Bearer ' . $accessToken,
    'Content-Type: message/rfc822',
];

// Set the cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/upload/gmail/v1/users/me/messages/send');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Close cURL resource
curl_close($ch);

// Display the API response
echo 'API Response: ' . $response;
