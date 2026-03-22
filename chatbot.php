<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

// 🔑 Your Gemini API Key (keep private!)
$apiKey = "AIzaSyB7ILmE2wMz18FsZae7BstyzO_0kRwuAFM"; 

// Get user message
$input = json_decode(file_get_contents("php://input"), true);
$userMessage = $input["message"] ?? "";

// If user asks about fee/cost/price → redirect to consultant
if (preg_match('/\b(fee|fees|price|cost)\b/i', $userMessage)) {
    echo json_encode([
        "reply" => "💡 Please contact our consultant at +91-9211299855 for fee details. 📲  
You can also view all program brochures here: https://thevisaacademy.com/brochures.html"
    ]);
    exit;
}

// Gemini API endpoint
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$apiKey";

// Build request payload
$data = [
  "contents" => [
    [
      "parts" => [
        ["text" => "You are Ashish, an expert Visa Trainer at The Visa Academy. 
        Always answer clearly and politely about visa training, study abroad, tourist visas, PR, and work permits. 
        Use structured, step-by-step explanations where possible. 
        If user asks about program details, refer them to the brochures at https://thevisaacademy.com/brochures.html. 
        If user asks about fees, always tell them to contact +91-9211299855. 

        User asked: " . $userMessage]
      ]
    ]
  ]
];

// Send request to Gemini API
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["reply" => "⚠️ cURL Error: " . curl_error($ch)]);
    exit;
}
curl_close($ch);

// Decode Gemini response
$result = json_decode($response, true);

// Extract reply
$reply = $result["candidates"][0]["content"]["parts"][0]["text"] ?? "⚠️ Sorry, I couldn’t get a response.";

// Return JSON
echo json_encode(["reply" => $reply]);
