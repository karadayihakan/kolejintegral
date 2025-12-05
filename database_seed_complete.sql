-- ============================================
-- KOLEJ INTEGRAL - COMPLETE DATABASE SEED SQL
-- ============================================
-- Bu script tüm başlangıç verilerini ekler
-- phpMyAdmin veya MySQL terminalinde çalıştırın
-- ============================================

-- 1. PAGES (Sayfalar)
INSERT INTO `pages` (`title`, `slug`, `description`, `template`, `is_active`, `created_at`, `updated_at`) VALUES
('Hakkımızda', 'hakkimizda', 'Kolej İntegral hakkında bilgiler', 'about', 1, NOW(), NOW()),
('Kayıt Ol', 'kayitol', 'Öğrenci kayıt sayfası', 'register', 1, NOW(), NOW()),
('KVKK Aydınlatma Metni', 'kvkk-aydinlatma-metni', 'Kişisel Verilerin Korunması Kanunu aydınlatma metni', 'legal', 1, NOW(), NOW()),
('Gizlilik Politikası', 'gizlilik-politikasi', 'Gizlilik politikası sayfası', 'legal', 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- 2. PAGE SECTIONS (Hakkımızda sayfası için bölümler)
SET @page_id = (SELECT id FROM pages WHERE slug = 'hakkimizda' LIMIT 1);

DELETE FROM `page_sections` WHERE `page_id` = @page_id;

INSERT INTO `page_sections` (`page_id`, `section_key`, `section_type`, `title`, `content`, `settings`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(@page_id, 'misyon', 'content', 'MİSYON', 'Önce kendine, sonra çevresine, akabinde ülkesine ve nihayetinde tüm insanlığa faydalı bireyler yetiştirmek.', NULL, 1, 1, NOW(), NOW()),
(@page_id, 'vizyon', 'content', 'VİZYON', 'Türkiye\'nin öncü eğitim kurumlarından biri olmak suretiyle geleceğe yön vermek.', NULL, 2, 1, NOW(), NOW()),
(@page_id, 'hakkimizda', 'content', 'HAKKIMIZDA', 'İntegral Eğitim Kurumları bünyesinde 2017-2018 eğitim öğretim yılında anadolu lisesi birimiyle başlayan okul yolculuğumuz, 2019-2020 eğitim öğretim yılında fen lisesi ve ortaokul birimlerinin, 2021-2022 eğitim öğretim yılında ise ilkokul ve okul öncesi birimlerinin faaliyete geçmesiyle k12 bütünlüğünü sağlamak suretiyle devam etmektedir.\n\nKolejintegral, bir öğretmenler kurulu kuruluşu olup Ulu Önder Mustafa Kemal Atatürk\'ün açtığı yolda ilerlemeyi şiar edinen, modern eğitimin gereklerini yerine getiren, akademik başarı ve disiplin anlayışından ödün vermeyen, dünyanın en geçerli uluslararası diploma programı Advanced Placement (AP) ile dünya vatandaşı yetiştirmeyi gaye edinen ve bu çerçevede eğitim öğretim kadrosunu hassasiyetle tertip eden bir okuldur.\n\nOkulumuz Malatya\'da iki ayrı yerleşkede hizmet vermekte olup ahlaki değerleri önceleyen ve insanlık bilinci yüksek bireyler yetiştirmeyi ilke edinmiştir.', NULL, 3, 1, NOW(), NOW()),
(@page_id, 'neden-kolejintegral', 'content', 'NEDEN KOLEJİNTEGRAL', '', NULL, 4, 1, NOW(), NOW()),
(@page_id, 'neden-kolejintegral-1', 'content', 'Sorumluluk ve Değer Sahibi Çocuklar ve Gençler', 'Sorumluluklarının bilincinde olan, neyi niçin yapması gerektiğini bilen, ahlaki ve insani değerleri özümsemiş bireyler yetiştirmek en önemli önceliklerimizdendir.', NULL, 5, 1, NOW(), NOW()),
(@page_id, 'neden-kolejintegral-2', 'content', 'Akademik ve Sosyal Başarı ile Kendini Gerçekleştirebilen Öğrenciler', 'Alanında yetkin yönetim ve öğretim personelleriyle öğrencilerimizin hem akademik hem sosyal bakımdan gelişimini sağlamak, bu suretle kendilerini gerçekleştirebilmelerine ve beceri kazandıkları alanda faydalı işler yapabilmelerine yönelik temeller atmak en önemli özelliklerimizdendir.', NULL, 6, 1, NOW(), NOW()),
(@page_id, 'neden-kolejintegral-3', 'content', 'Özgür, Yenilikçi ve Lider Bireyler', 'Değişen koşullara uyum sağlayabilecek, gerektiğinde koşulları kendisi değiştirebilecek potansiyele sahip, aldığı sorumlulukla çevresine öncülük edebilecek; fikri hür, vicdanı hür, irfanı hür bireyler yetiştirmek en önemli değerlerimizdendir.\n\nVe biz bunları başarabilen donanım, gayret ve tecrübeye sahibiz.', NULL, 7, 1, NOW(), NOW());

-- 3. MENUS (Menüler)
INSERT INTO `menus` (`branch_id`, `label`, `url`, `target`, `order`, `is_active`, `parent_id`, `created_at`, `updated_at`) VALUES
(NULL, 'Hakkımızda', '/hakkimizda', '_self', 1, 1, NULL, NOW(), NOW()),
(NULL, 'Keşfet', '#explore', '_self', 2, 1, NULL, NOW(), NOW()),
(NULL, 'Birimler', '#classes', '_self', 3, 1, NULL, NOW(), NOW()),
(NULL, 'Haberler', '#haberler', '_self', 4, 1, NULL, NOW(), NOW()),
(NULL, 'İletişim', '#contact', '_self', 5, 1, NULL, NOW(), NOW()),
(NULL, 'İnsan Kaynakları', 'https://integral.eyotek.com/v1/Pages/human-resources-application', '_blank', 6, 1, NULL, NOW(), NOW()),
(NULL, 'Pikajintegral', '/pikaj-integral', '_self', 7, 1, NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- 4. SETTINGS (Ayarlar)
INSERT INTO `settings` (`key`, `value`, `type`, `group`, `created_at`, `updated_at`) VALUES
('phone', '0(212) 571 71 55', 'phone', 'contact', NOW(), NOW()),
('email', 'iletisim@integral.fizetmedya.com', 'email', 'contact', NOW(), NOW()),
('instagram', 'https://www.instagram.com/endeneyim', 'url', 'social', NOW(), NOW()),
('youtube', '', 'url', 'social', NOW(), NOW()),
('facebook', '', 'url', 'social', NOW(), NOW()),
('linkedin', '', 'url', 'social', NOW(), NOW()),
('twitter', '', 'url', 'social', NOW(), NOW()),
('embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.565332333537!2d28.868541275704423!3d40.99099792048925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabb5754304481%3A0xa58f5440b04a9581!2sKartaltepe%2C%20Yunus%20Nadi%20Sk.%20No%3A2%2C%2034145%20Bak%C4%B1rk%C3%B6y%2F%C4%B0stanbul!5e0!3m2!1str!2str!4v1733951338111!5m2!1str!2str', 'url', 'map', NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- 5. BRANCHES (Birimler) - Önce user'ları oluştur, sonra branches
-- Ana Sınıfı
INSERT INTO `users` (`branch_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 'Ana Sınıfı Admin', 'anasinifi@kolejintegral.com', '5551000001', NOW(), '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_admin', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

INSERT INTO `branches` (`user_id`, `name`, `slug`, `type`, `description`, `hero_image`, `order`, `created_at`, `updated_at`) 
SELECT id, 'Ana Sınıfı', 'ana-sinifi', 'okul-oncesi', 'Okul öncesi eğitim birimi', NULL, 0, NOW(), NOW()
FROM `users` WHERE email = 'anasinifi@kolejintegral.com'
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- İlkokul
INSERT INTO `users` (`branch_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 'İlkokul Admin', 'ilkokul@kolejintegral.com', '5551000002', NOW(), '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_admin', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

INSERT INTO `branches` (`user_id`, `name`, `slug`, `type`, `description`, `hero_image`, `order`, `created_at`, `updated_at`) 
SELECT id, 'İlkokul', 'ilkokul', 'ilkokul', 'İlkokul eğitim birimi', 'images/ilkokul-hero.jpg', 0, NOW(), NOW()
FROM `users` WHERE email = 'ilkokul@kolejintegral.com'
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- Ortaokul
INSERT INTO `users` (`branch_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 'Ortaokul Admin', 'ortaokul@kolejintegral.com', '5551000003', NOW(), '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_admin', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

INSERT INTO `branches` (`user_id`, `name`, `slug`, `type`, `description`, `hero_image`, `order`, `created_at`, `updated_at`) 
SELECT id, 'Ortaokul', 'ortaokul', 'ortaokul', 'Ortaokul eğitim birimi', 'images/ortaokul-hero.jpg', 0, NOW(), NOW()
FROM `users` WHERE email = 'ortaokul@kolejintegral.com'
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- Anadolu Lisesi
INSERT INTO `users` (`branch_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 'Anadolu Lisesi Admin', 'anadolulisesi@kolejintegral.com', '5551000004', NOW(), '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_admin', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

INSERT INTO `branches` (`user_id`, `name`, `slug`, `type`, `description`, `hero_image`, `order`, `created_at`, `updated_at`) 
SELECT id, 'Anadolu Lisesi', 'anadolu-lisesi', 'anadolu-lisesi', 'Anadolu Lisesi eğitim birimi', 'images/fen-anadolu-lisesi-hero.jpg', 0, NOW(), NOW()
FROM `users` WHERE email = 'anadolulisesi@kolejintegral.com'
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- Fen Lisesi
INSERT INTO `users` (`branch_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 'Fen Lisesi Admin', 'fenlisesi@kolejintegral.com', '5551000005', NOW(), '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_admin', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

INSERT INTO `branches` (`user_id`, `name`, `slug`, `type`, `description`, `hero_image`, `order`, `created_at`, `updated_at`) 
SELECT id, 'Fen Lisesi', 'fen-lisesi', 'fen-lisesi', 'Fen Lisesi eğitim birimi', 'images/fen-anadolu-lisesi-hero.jpg', 0, NOW(), NOW()
FROM `users` WHERE email = 'fenlisesi@kolejintegral.com'
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- Branch user_id'lerini güncelle
UPDATE `users` u
INNER JOIN `branches` b ON b.slug = 'ana-sinifi'
SET u.branch_id = b.id
WHERE u.email = 'anasinifi@kolejintegral.com';

UPDATE `users` u
INNER JOIN `branches` b ON b.slug = 'ilkokul'
SET u.branch_id = b.id
WHERE u.email = 'ilkokul@kolejintegral.com';

UPDATE `users` u
INNER JOIN `branches` b ON b.slug = 'ortaokul'
SET u.branch_id = b.id
WHERE u.email = 'ortaokul@kolejintegral.com';

UPDATE `users` u
INNER JOIN `branches` b ON b.slug = 'anadolu-lisesi'
SET u.branch_id = b.id
WHERE u.email = 'anadolulisesi@kolejintegral.com';

UPDATE `users` u
INNER JOIN `branches` b ON b.slug = 'fen-lisesi'
SET u.branch_id = b.id
WHERE u.email = 'fenlisesi@kolejintegral.com';

-- 6. GALLERIES (Galeri)
INSERT INTO `galleries` (`branch_id`, `title`, `image_path`, `type`, `video_url`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(NULL, 'Kolej İntegral Tanıtım Videosu', 'images/okul-foto-1.jpg', 'video', 'https://www.youtube.com/watch?v=DYLk228mSa4', 1, 1, NOW(), NOW()),
(NULL, 'Okul Fotoğrafı 1', 'images/okul-foto-1.jpg', 'photo', NULL, 2, 1, NOW(), NOW()),
(NULL, 'Okul Fotoğrafı 2', 'images/okul-foto-2.jpg', 'photo', NULL, 3, 1, NOW(), NOW()),
(NULL, 'Okul Fotoğrafı 3', 'images/okul-foto-3.jpg', 'photo', NULL, 4, 1, NOW(), NOW()),
(NULL, 'Kolej İntegral Eğitim Videosu', 'placeholder.jpg', 'video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 5, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- 7. NEWS (Haberler)
INSERT INTO `news` (`branch_id`, `title`, `slug`, `content`, `image_path`, `published_at`, `created_at`, `updated_at`) VALUES
(NULL, 'Kolej İntegral\'de Yeni Eğitim Dönemi Başladı', 'kolej-integralde-yeni-egitim-donemi-basladi', '<p>2024-2025 eğitim öğretim yılı Kolej İntegral\'de büyük bir coşkuyla başladı. Öğrencilerimiz modern sınıflarda, deneyimli öğretmen kadromuzla birlikte yeni bir eğitim yolculuğuna çıktılar. Bu yıl özellikle STEM eğitimi ve dijital okuryazarlık alanlarında önemli gelişmeler kaydedeceğiz.</p><p>Okulumuzda öğrencilerimizin akademik başarılarının yanı sıra sosyal, kültürel ve sportif gelişimlerine de önem veriyoruz. Yeni dönemde birçok etkinlik ve proje planlanmış durumda.</p>', 'images/okul-foto-1.jpg', DATE_SUB(NOW(), INTERVAL 5 DAY), NOW(), NOW()),
(NULL, 'Öğrencilerimiz Matematik Olimpiyatlarında Başarılı', 'ogrencilerimiz-matematik-olimpiyatlarinda-basarili', '<p>Kolej İntegral öğrencileri, bu yıl düzenlenen Ulusal Matematik Olimpiyatları\'nda büyük başarılar elde etti. 3 öğrencimiz altın madalya, 5 öğrencimiz gümüş madalya kazandı. Bu başarı, okulumuzun matematik eğitimindeki kalitesini bir kez daha gösterdi.</p><p>Öğrencilerimizi tebrik ediyor, başarılarının devamını diliyoruz. Matematik öğretmenlerimizin özverili çalışmaları sayesinde öğrencilerimiz bu başarıyı elde ettiler.</p>', 'images/okul-foto-2.jpg', DATE_SUB(NOW(), INTERVAL 10 DAY), NOW(), NOW()),
(NULL, 'Okulumuzda Bilim Fuarı Düzenlendi', 'okulumuzda-bilim-fuari-duzenlendi', '<p>Kolej İntegral\'de bu yıl 5. kez düzenlenen Bilim Fuarı büyük ilgi gördü. Öğrencilerimiz bir yıl boyunca hazırladıkları projeleri sergilediler. Robotik, kodlama, fen deneyleri ve mühendislik projeleri fuarda yer aldı.</p><p>Fuarımıza velilerimiz, öğretmenlerimiz ve çevre okullardan öğrenciler katıldı. Öğrencilerimizin yaratıcılığı ve bilimsel düşünme becerileri fuarda öne çıktı.</p>', 'images/okul-foto-3.jpg', DATE_SUB(NOW(), INTERVAL 15 DAY), NOW(), NOW()),
(NULL, 'Yeni Kütüphane ve Okuma Salonu Açıldı', 'yeni-kutuphane-ve-okuma-salonu-acildi', '<p>Okulumuzda öğrencilerimizin okuma alışkanlıklarını geliştirmek için modern bir kütüphane ve okuma salonu açıldı. Kütüphanemizde 10.000\'den fazla kitap bulunuyor. Dijital okuma platformları ve sessiz çalışma alanları da öğrencilerimizin hizmetinde.</p><p>Kütüphanemiz, öğrencilerimizin araştırma yapabileceği, kitap okuyabileceği ve ders çalışabileceği modern bir ortam sunuyor. Hafta içi ve hafta sonu açık olan kütüphanemiz öğrencilerimizin yoğun ilgisini görüyor.</p>', 'images/ilkokul-hero.jpg', DATE_SUB(NOW(), INTERVAL 20 DAY), NOW(), NOW()),
(NULL, 'Spor Takımlarımız İl Birinciliği Kazandı', 'spor-takimlarimiz-il-birinciligi-kazandi', '<p>Kolej İntegral spor takımlarımız bu sezon büyük başarılar elde etti. Basketbol, voleybol ve futbol takımlarımız il birinciliği kazandı. Öğrencilerimizin hem akademik hem de sportif başarıları bizleri gururlandırıyor.</p><p>Spor eğitimi okulumuzun önemli bir parçası. Öğrencilerimizin fiziksel gelişimlerinin yanı sıra takım çalışması, disiplin ve liderlik becerilerini de geliştirmelerine önem veriyoruz.</p>', 'images/ortaokul-hero.jpg', DATE_SUB(NOW(), INTERVAL 25 DAY), NOW(), NOW()),
(NULL, 'Mezunlarımız Üniversite Sınavlarında Başarılı', 'mezunlarimiz-universite-sinavlarinda-basarili', '<p>2024 mezunlarımız üniversite sınavlarında büyük başarılar elde etti. Öğrencilerimizin %95\'i istedikleri üniversite ve bölümlere yerleşti. Tıp, mühendislik, hukuk ve diğer alanlarda öğrencilerimiz tercih ettikleri bölümlere girmeyi başardı.</p><p>Bu başarı, okulumuzun eğitim kalitesinin ve öğrencilerimizin çalışkanlığının bir göstergesi. Mezunlarımızı tebrik ediyor, yeni eğitim hayatlarında başarılar diliyoruz.</p>', 'images/okul-oncesi-hero.jpg', DATE_SUB(NOW(), INTERVAL 30 DAY), NOW(), NOW())
ON DUPLICATE KEY UPDATE `updated_at` = NOW();

-- ============================================
-- SEED İŞLEMİ TAMAMLANDI
-- ============================================

