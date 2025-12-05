# 🚀 Laravel Projesi Deploy Rehberi

Bu proje bir **Laravel** uygulamasıdır ve **Vercel PHP desteklemediği için** Vercel'de çalışmaz.

## ✅ Önerilen Deploy Platformları

### 1. **Railway.app** (En Kolay - Önerilen) ⭐
- ✅ Ücretsiz tier mevcut ($5 kredi/ay)
- ✅ Otomatik deploy (GitHub bağlantısı)
- ✅ PHP 8.2+ desteği
- ✅ MySQL/PostgreSQL desteği
- ✅ Kolay kurulum

**Kurulum:**
1. [railway.app](https://railway.app) hesabı oluştur
2. "New Project" → "Deploy from GitHub repo"
3. Repo'yu seç
4. Otomatik olarak Laravel algılar ve deploy eder

---

### 2. **Fly.io** (Ücretsiz Tier)
- ✅ Ücretsiz tier (3 shared-cpu-1x VMs)
- ✅ Global CDN
- ✅ PHP 8.2+ desteği

**Kurulum:**
```bash
# Fly.io CLI kurulumu
curl -L https://fly.io/install.sh | sh

# Projeye giriş yap
fly auth login

# Laravel projesini deploy et
fly launch
```

---

### 3. **DigitalOcean App Platform**
- ✅ Otomatik deploy
- ✅ $5/ay başlangıç
- ✅ Kolay yönetim

---

### 4. **Mevcut FTP Hosting** (Zaten Var)
Eğer `fizetmedya.com` hosting'iniz varsa, oraya deploy edebilirsiniz:

**Deploy Adımları:**
1. `.env` dosyasını production için ayarla
2. `composer install --optimize-autoloader --no-dev`
3. `php artisan config:cache`
4. `php artisan route:cache`
5. `php artisan view:cache`
6. FTP ile dosyaları yükle

---

## 📋 Production Hazırlık Checklist

### 1. Environment Ayarları
```bash
# .env dosyasını production için düzenle
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

### 2. Optimizasyon
```bash
# Composer optimize
composer install --optimize-autoloader --no-dev

# Laravel optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

### 3. Database
- Production database bilgilerini `.env`'e ekle
- Migration'ları çalıştır: `php artisan migrate --force`

### 4. Storage Link
```bash
php artisan storage:link
```

---

## 🎯 Hızlı Deploy: Railway.app

### Adım 1: GitHub'a Push
```bash
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/username/integralkurs.git
git push -u origin main
```

### Adım 2: Railway'de Deploy
1. [railway.app](https://railway.app) → Sign up with GitHub
2. "New Project" → "Deploy from GitHub repo"
3. Repo'yu seç
4. Railway otomatik olarak:
   - PHP 8.2+ algılar
   - `composer install` çalıştırır
   - `php artisan migrate` çalıştırır
   - Public URL verir

### Adım 3: Environment Variables
Railway dashboard'da `.env` değişkenlerini ekle:
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... (php artisan key:generate)
DB_CONNECTION=mysql
DB_HOST=...
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

### Adım 4: Database Ekle
Railway'de "New" → "Database" → "MySQL" seç
Otomatik olarak connection string verir.

---

## 🔧 Railway için Özel Ayarlar

Railway otomatik algılar, ama manuel ayar için `railway.json` oluştur:

```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "php artisan serve --host=0.0.0.0 --port=$PORT",
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

---

## 📝 Notlar

- **Vercel PHP desteklemez** - Laravel için uygun değil
- **Railway.app** en kolay ve hızlı seçenek
- Production'da mutlaka `APP_DEBUG=false` yapın
- Database backup'ları düzenli alın
- SSL sertifikası Railway/Fly.io otomatik sağlar

---

## 🆘 Sorun Giderme

### Database Connection Hatası
- `.env` dosyasında database bilgilerini kontrol et
- Railway'de database service'inin çalıştığından emin ol

### Storage Link Hatası
```bash
php artisan storage:link
```

### Permission Hatası
```bash
chmod -R 775 storage bootstrap/cache
```

---

**En Hızlı Çözüm:** Railway.app kullanın - 5 dakikada deploy! 🚀

