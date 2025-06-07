<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

if (!$input || !isset($input['unit'], $input['arrival'], $input['departure'], $input['ages'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON or missing fields']);
    exit;
}

// Map unit string to remote API ID (replace these with actual IDs from the remote API docs)
$unitMapping = [
    'Standard Room' => -2147483637, // example ID
    'Deluxe Room' => -2147483456,
];

if (!isset($unitMapping[$input['unit']])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid unit type']);
    exit;
}

$unitId = $unitMapping[$input['unit']];

// Prepare payload for remote API
$transformedPayload = [
    'Unit Type ID' => $unitId,
    'Arrival' => $input['arrival'],
    'Departure' => $input['departure'],
    'Guests' => []
];

// Build Guests array by age group
foreach ($input['ages'] as $age) {
    $age = (int)$age;
    $transformedPayload['Guests'][] = [
        'Age Group' => $age < 13 ? 'Child' : 'Adult'
    ];
}

$remoteUrl = 'https://dev.gondwana-collection.com/Web-Store/Rates/Rates.php';

$ch = curl_init($remoteUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($transformedPayload));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(['error' => 'cURL error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

if ($httpCode !== 200) {
    http_response_code($httpCode);
    echo json_encode([
        'error' => 'Remote API responded with HTTP ' . $httpCode,
        'response' => $response
    ]);
    exit;
}

$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Invalid JSON from remote API',
        'raw_response' => $response
    ]);
    exit;
}

echo json_encode($data);
