<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<footer class="footer" style="position: relative;">
  <div class="footer-inner" style="display:flex;flex-direction:column;align-items:center;gap:18px;">
    <div>
      <img src="/images/integral-logo.png" alt="Kolej İntegral">
    </div>
    <p class="footer-slogan">Okul Ötesi</p>
    <div class="footer-social-icons">
      <a href="https://www.facebook.com/kolejintegral" target="_blank" aria-label="Facebook">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://x.com/KOLEJNTEGRAL1" target="_blank" aria-label="X (Twitter)">
        <i class="fab fa-x-twitter"></i>
      </a>
      <a href="https://www.instagram.com/kolej.integral/?hl=af" target="_blank" aria-label="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="footer-links" style="justify-content:center;">
      <a href="{{ route('about') }}">Hakkımızda</a>
      <a href="{{ route('home') }}#explore">Keşfet</a>
      <a href="{{ route('home') }}#classes">Birimler</a>
      <a href="{{ route('news.index') }}">Haberler</a>
      <a href="{{ route('kayitol') }}">Kayıt Ol</a>
      <a href="https://integral.eyotek.com/v1/Pages/human-resources-application" target="_blank">İnsan Kaynakları</a>
      <a href="{{ route('magazines.index') }}">Pikajintegral</a>
      <a href="{{ route('kvkk') }}">KVKK Aydınlatma Metni</a>
      <a href="{{ route('gizlilik') }}">Gizlilik Politikası</a>
    </div>
  </div>
  <!-- Back to top arrow -->
  <button id="backToTop" aria-label="Yukarı dön"></button>
</footer>

<script>
  (function() {
    const btn = document.getElementById('backToTop');
    if (!btn) return;

    window.addEventListener('scroll', function() {
      if (window.scrollY > 300) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    });

    btn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  })();
</script>
<div class="footer-copyright">
  © {{ date('Y') }} KOLEJ İNTEGRAL. Tüm Hakları Saklıdır. &nbsp;|&nbsp;
  Tasarım:
  <a href="https://fizetmedya.com" target="_blank" style="color: #f8931f; text-decoration: none; font-weight: 500;">
    FİZET MEDYA
  </a>
</div>


