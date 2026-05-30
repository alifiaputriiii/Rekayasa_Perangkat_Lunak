<?php
// proses/proses_chatbot.php
header('Content-Type: application/json');
session_start();

$GEMINI_API_KEY = 'INI NYAKK GANTI'; // Ganti ini dengan API key Gemini kamu

$input = json_decode(file_get_contents('php://input'), true);
$pesan = trim($input['pesan'] ?? '');

if (!$pesan) {
    echo json_encode(['status' => 'error', 'reply' => 'Pesan tidak boleh kosong.']);
    exit;
}

$system_prompt = "Kamu adalah asisten kesehatan bernama D-Care yang khusus membantu informasi seputar diabetes melitus. Jawab pertanyaan dengan ramah, informatif, dan gunakan bahasa Indonesia yang mudah dipahami. Jika pertanyaan di luar topik diabetes atau kesehatan, arahkan user untuk bertanya seputar diabetes. Jawaban maksimal 3-4 kalimat atau dalam poin singkat.";

$payload = json_encode([
    'contents' => [
        [
            'parts' => [
                ['text' => $system_prompt . "\n\nUser: " . $pesan]
            ]
        ]
    ],
]);
$url ="https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $GEMINI_API_KEY;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (!$response || $httpCode !== 200) {
    $curl_error = curl_error($ch);
    file_put_contents(__DIR__ . '/debug.txt', "HTTP: $httpCode | cURL error: $curl_error | Response: $response");
    echo json_encode(['status' => 'error', 'reply' => 'Error ' . $httpCode . ': ' . $curl_error]);
    exit;
}

$data = json_decode($response, true);
$reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak bisa menjawab saat ini.';

echo json_encode(['status' => 'success', 'reply' => $reply]);
exit;
?>