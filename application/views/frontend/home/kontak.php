<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?=site_url('home')?>">Home</a></li>
        <li><?=$page?></li>
      </ol>
      <h2><?=$page?></h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4 rounded">
            <i class="bx bx-map text-success"></i>

            <h3>Alamat Kami</h3>
            <p>Jl. HOS Cokroaminoto No.45, RT.003/RW.001, Sudimara Barat, <br />
            Kec. Ciledug, Kota Tangerang, Banten 15151</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4 rounded">
            <i class="bx bx-envelope text-success"></i>
            <h3>Email Kami</h3>
            <p>kospinjasacileduk@gmail.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4 rounded">
            <i class="bx bx-phone-call text-success"></i>
            <h3>Hubungi Kami</h3>
            <p>02173454859</p>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-6">
          <iframe class="mb-4 mb-lg-0 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15865.175305279841!2d106.69722854178146!3d-6.224935200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fa1c92e68bed%3A0x609f98d20868821c!2sKospin%20Jasa%20Ciledug!5e0!3m2!1sid!2sid!4v1671634654289!5m2!1sid!2sidd" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form rounded">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="nama_lengkap" class="form-control" id="name" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap anda')" oninput="setCustomValidity('')"  placeholder="Nama Lengkap Anda">
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required oninvalid="this.setCustomValidity('Masukkan Email anda')" oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required oninvalid="this.setCustomValidity('Masukkan Subjek anda')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Masukkan Pesan Anda" required oninvalid="this.setCustomValidity('Masukkan Pesan anda')" oninput="setCustomValidity('')"></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->
