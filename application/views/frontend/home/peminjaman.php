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

  <!-- ======= Team Section ======= -->
  <section id="team" class="team" style="background: white url(<?=base_url()?>assets/frontend/img/footer-bg.png) no-repeat right top;">
    <div class="p-4">
      <div class="row">
        <?php $attributes = array('onsubmit' => 'return tambah(this)');
        echo form_open_multipart('home/process',$attributes); ?>
        <div class="container d-flex justify-content-center">
          <div class="card col-md-6">
            <div class="card-header">
              <h3>Registrasi Nasabah</h3>
            </div>
            <div class="card-body">
              <?php $this->view('frontend/message')?>
              <div class="info-box mb-4 rounded">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap anda')" oninput="setCustomValidity('')"  placeholder="Nama Lengkap Anda">
                <p></p>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required oninvalid="this.setCustomValidity('Masukkan Email anda')" oninput="setCustomValidity('')"  placeholder="example@mail.com">
                <p></p>
                <label for="no_hp" class="form-label">No. HP</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">+62</span>
                  <input type="number" name="no_hp" class="form-control" placeholder="8979xxxxxx" aria-label="hp_hp" aria-describedby="basic-addon1" required oninvalid="this.setCustomValidity('Masukkan No. HP anda')" oninput="setCustomValidity('')" >
                </div>
                <p></p>
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" required oninvalid="this.setCustomValidity('Masukkan Password anda')" oninput="setCustomValidity('')" placeholder="Password">
                </div>
                <p></p>
                <div class="text-center">
                  <button type="submit" name="SaveRegs" class="btn btn-lg btn-success"><i class='bx bx-save'></i> Daftar</button>
                </div>
                <?php echo form_close(); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
