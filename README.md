# By Sound Creative Technics - Kurumsal Web Sitesi

Bu proje, 35 yılı aşkın süredir ses, ışık, LED ekran ve truss sistemleri üzerine teknik prodüksiyon hizmeti veren **By Sound Creative Technics** firmasının resmi kurumsal web sitesidir. 

Proje, gereksiz framework yüklerinden arındırılarak (Node.js altyapısından çıkarılarak) standart hosting ortamlarında (cPanel, Plesk vb.) doğrudan çalışacak şekilde saf (vanilla) ve modüler bir mimariyle "Clean Code" prensiplerine uygun olarak kodlanmıştır.

## 🚀 Öne Çıkan Özellikler

*   **İnteraktif Sahne Işıkları:** Ana sayfada yer alan ve kullanıcının fare/dokunmatik hareketlerini takip eden dinamik ışık robotu animasyonu.
*   **Tam Entegre Çoklu Dil (TR/EN):** Sayfa yenilenmeden, anlık olarak çalışan ve LocalStorage ile kullanıcının tercihini hatırlayan JavaScript tabanlı çoklu dil sistemi.
*   **Dinamik Lightbox Galeri:** Fotoğrafların büyük hallerini ve dillere göre dinamik değişen açıklamalarını gösteren modüler galeri yapısı.
*   **Güvenli İletişim Formu (PHPMailer):** Gelişmiş veri doğrulama, Honeypot (bot tuzağı) ve PHPMailer SMTP altyapısı ile doğrudan şirketin kurumsal mail adresine düşen iletişim formu.
*   **Özel 404 Hata Sayfası:** Kullanıcıları kaybetmemek adına markanın ruhuna uygun (stadyum temalı), yönlendirici ve estetik bir 404 sinyal koptu sayfası.
*   **%100 Responsive & Temiz Kod:** Mobil ve tablet cihazlar için özel kayan menü (hamburger menü), parmak ucu standartlarına uygun butonlar ve geliştiricilerin aradığını anında bulabileceği haritalandırılmış temiz kod (Clean Code) yapısı.

## 🛠 Kullanılan Teknolojiler

*   **HTML5:** Anlamsal (Semantic) ve SEO uyumlu etiketleme.
*   **CSS3:** Özelleştirilmiş root değişkenleri, CSS Grid/Flexbox mimarisi ve medya sorguları ile tam uyumluluk. (Harici kütüphane kullanılmamıştır).
*   **JavaScript (ES6+):** Vanilla JS ile çoklu dil, DOM manipülasyonu, form AJAX (Fetch API) işlemleri ve pointer takip algoritmaları.
*   **PHP 8+ & PHPMailer:** İletişim formundan gelen verilerin güvenli bir şekilde SMTP üzerinden iletilmesi.

## 📁 Dosya ve Klasör Yapısı

```text
bysound-website/
├── index.html           # Ana sayfa ve tüm UI yapısı
├── 404.html             # Özelleştirilmiş "Sinyal Koptu" hata sayfası
├── style.css            # Tüm stil dosyaları (Mobil uyumluluk dahil)
├── script.js            # Çoklu dil sözlüğü, animasyonlar, form işlemleri
├── contact.php          # PHPMailer SMTP mail gönderim motoru
├── .htaccess            # Sunucu yönlendirmeleri, 404 ayarı ve SEO izinleri
├── assets/
│   ├── logo/            # Firma logoları ve favicon
│   └── photos/          # WebP ve optimize edilmiş galeri/arka plan görselleri
└── PHPMailer/           # E-posta gönderimi için gerekli çekirdek sınıflar