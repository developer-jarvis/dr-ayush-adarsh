<?php
/**
 * Form Handler - Sends form data to WhatsApp
 * This file processes form submissions and redirects to WhatsApp
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
    $service = isset($_POST['service']) ? sanitize_input($_POST['service']) : '';
    $date = isset($_POST['date']) ? sanitize_input($_POST['date']) : '';
    $message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone)) {
        http_response_code(400);
        echo json_encode(['error' => 'Required fields are empty']);
        exit;
    }

    // Create WhatsApp message
    $whatsapp_message = "*Appointment Booking Request*\n\n";
    $whatsapp_message .= "*Name:* " . $name . "\n";
    $whatsapp_message .= "*Email:* " . $email . "\n";
    $whatsapp_message .= "*Phone:* " . $phone . "\n";
    
    if (!empty($service)) {
        $whatsapp_message .= "*Service:* " . $service . "\n";
    }
    
    if (!empty($date)) {
        $whatsapp_message .= "*Preferred Date:* " . $date . "\n";
    }
    
    if (!empty($message)) {
        $whatsapp_message .= "*Message:* " . $message . "\n";
    }

    // WhatsApp phone number (replace with your clinic's number)
    $whatsapp_phone = "919113300981"; // Country code + number without + sign
    
    // URL encode the message
    $encoded_message = urlencode($whatsapp_message);
    
    // WhatsApp URL
    $whatsapp_url = "https://wa.me/" . $whatsapp_phone . "?text=" . $encoded_message;

    // Return JSON response with WhatsApp URL
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'whatsapp_url' => $whatsapp_url,
        'message' => 'Redirecting to WhatsApp...'
    ]);
    exit;
}

/**
 * Sanitize input to prevent XSS
 */
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// If not a POST request, return error
http_response_code(405);
echo json_encode(['error' => 'Method not allowed']);
exit;
?>
