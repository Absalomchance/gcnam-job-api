<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get your form inputs (adapt keys to your form)
    $unit = $_POST['unit'];          // e.g. "Standard Room"
    $arrival = $_POST['arrival'];    // e.g. "2025-06-07"
    $departure = $_POST['departure'];
    $occupants = (int)$_POST['occupants'];
    $ages = isset($_POST['ages']) ? $_POST['ages'] : []; // Expecting array from your form, else empty array

    // Map your unit to Unit Type ID
    $unitTypeMap = [
        'Standard Room' => -2147483637,
        'Deluxe Room' => -2147483456,
    ];

    if (!isset($unitTypeMap[$unit])) {
        echo json_encode(['error' => 'Invalid unit name.']);
        exit;
    }
    $unitTypeId = $unitTypeMap[$unit];

    // Prepare Guests array with 'Age Group'
   $ages = $_POST['ages'] ?? '';

if (is_string($ages)) {
    // Convert comma separated string into array
    $ages = array_map('trim', explode(',', $ages));
}

$guests = [];
foreach ($ages as $age) {
    $ageInt = (int)$age;
    $guests[] = [
        'Age Group' => $ageInt >= 13 ? 'Adult' : 'Child',
        'Age' => $ageInt
    ];
}


    // Prepare payload as the Node.js example did
    $payload = [
        'Unit Type ID' => $unitTypeId,
        'Arrival' => $arrival,
        'Departure' => $departure,
        'Guests' => $guests
    ];

    // cURL POST JSON to remote API
    $ch = curl_init('https://dev.gondwana-collection.com/Web-Store/Rates/Rates.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        echo json_encode(['error' => 'Curl error: ' . curl_error($ch)]);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // Check response status code
    if ($httpcode === 200) {
        header('Content-Type: application/json');
        echo $response;  // Return remote API JSON response directly
    } else {
        echo json_encode([
            'error' => 'Failed to fetch rates.',
            'status_code' => $httpcode,
            'response' => $response
        ]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
