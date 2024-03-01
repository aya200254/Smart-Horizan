<?php
// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set recipient email address
    $to = "info@smarthorizon.com.sa";

    // Set email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Build email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email sent successfully
        echo "success";
    } else {
        // Email sending failed
        echo "error";
    }
} else {
    // Form not submitted
    echo "Form submission error.";
}
?>
