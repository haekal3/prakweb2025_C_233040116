<section class="py-5" style="background: linear-gradient(135deg, #28a745 0%, #40E0D0 100%); color: white;">
    <div class="container text-center">
        <!-- Foto Profil -->
        <img src="<?= BASEURL; ?>/img/profil.jpg" alt="Foto Profil" class="rounded-circle mb-4" 
             style="width:120px; height:120px; object-fit:cover; border:3px solid white;">
        
        <h1 class="display-5 fw-bold">Selamat Datang di Website Saya!</h1>
        <p class="col-md-8 fs-4 mx-auto">Halo, nama saya <?= $data['nama']; ?>.</p>
        <p class="col-md-8 fs-4 mx-auto">NPM saya <?= $data['npm']; ?>.</p>

        <a href="#" class="btn btn-light btn-lg mt-3" 
            style="transition: transform 0.2s, box-shadow 0.2s;"
            onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 0 15px rgba(0,0,0,0.3)';"
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
            Klik Saya
        </a>
    </div>
</section>
