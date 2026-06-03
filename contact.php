<?php
/* ========================================== BÖLÜM: FORM GÖNDERİM SİSTEMİ (PHPMailer) ========================================== */

// JSON cevabı için başlık
header('Content-Type: application/json; charset=utf-8');

// Konfigürasyon dosyasını çağırıyoruz (Şifrelerin burada duracak)
require 'config.php';

// PHPMailer sınıflarını çağırıyoruz
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Sadece POST istekleri
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Sadece POST istekleri kabul edilir.']);
    exit;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

// 1. GİZLİ KALKAN: Honeypot (Bot Tuzağı)
if (!empty($data['website'])) {
    echo json_encode(['ok' => true]);
    exit;
}

// 2. VERİ TEMİZLİĞİ
$fullName = htmlspecialchars(strip_tags(trim($data['fullName'] ?? '')));
$contactInfo = htmlspecialchars(strip_tags(trim($data['contactInfo'] ?? '')));
$messageText = htmlspecialchars(strip_tags(trim($data['message'] ?? '')));

if (strlen($fullName) < 2 || strlen($contactInfo) < 5 || strlen($messageText) < 3) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Lütfen form alanlarını doğru doldurun.']);
    exit;
}

// 3. PHPMAILER MOTORUNU ATEŞLEME
$mail = new PHPMailer(true);

try {
    // --- SUNUCU AYARLARI ---
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';            
    $mail->SMTPAuth   = true;
    
    // Şifreleri config.php dosyasından çekiyoruz:
    $mail->Username   = SMTP_USER; 
    $mail->Password   = SMTP_PASS;           
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                          

    $mail->CharSet = 'UTF-8';

    // --- GÖNDERİCİ VE ALICI AYARLARI ---
    $mail->setFrom(SMTP_USER, 'By Sound Website'); 
    $mail->addAddress(SMTP_USER); 
    
    if (filter_var($contactInfo, FILTER_VALIDATE_EMAIL)) {
        $mail->addReplyTo($contactInfo, $fullName); 
    }

    // --- MAİL İÇERİĞİ ---
    $mail->isHTML(true);
    $mail->Subject = 'Yeni Iletisim Talebi - ' . $fullName;
    $mail->Body    = "
    <div style='font-family:Arial,sans-serif;line-height:1.55;color:#111;'>
        <h2>By Sound Web Sitesi Iletisim Talebi</h2>
        <p><strong>Ad Soyad:</strong> {$fullName}</p>
        <p><strong>Telefon / E-posta:</strong> {$contactInfo}</p>
        <p><strong>Mesaj:</strong></p>
        <p>" . nl2br($messageText) . "</p>
    </div>";

    $mail->send();
    echo json_encode(['ok' => true]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Mail sunucu tarafindan gonderilemedi.']);
}
?>