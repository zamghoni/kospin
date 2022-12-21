<!--start page wrapper -->
<?php $this->view('backend/message')?>
<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3"><?=$page?></div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="<?=site_url('user')?>"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$subpage.' '.$page?></li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col-xl-7 mx-auto">
        <div class="card border-top border-0 border-4 border-primary">
          <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
              <div><i class="bx bx-lock-open me-1 font-22 text-primary"></i>
              </div>
              <h5 class="mb-0 text-primary"><?=$subpage.' '.$page?></h5>
            </div>
            <hr>
            <?php $attributes = array('onsubmit' => 'return tambah(this)');
            echo form_open_multipart('profile/ubah_password',$attributes); ?>
            <input type="hidden" name="id" value="<?=$row->id?>">
            <div class="row g-3">
              <div class="col-md-12">
                <label for="old_password" class="form-label">Password Lama *</label>
                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Masukkan kata sandi lama anda" autofocus>
              </div>
              <div class="col-md-12">
                <label for="password" class="form-label">Password Baru *</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan kata sandi baru">
              </div>
              <div class="col-md-12">
                <label for="konf_password" class="form-label">Konfirmasi Password Baru *</label>
                <input type="password" name="konf_password" class="form-control" id="konf_password" placeholder="Masukkan konfirmasi kata sandi">
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="password_update" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
      <script>
        function tambah(form) {
          if (form.old_password.value=='') {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Password lama harus diisi!'
            });
            return false;
          } else if (form.password.value=='') {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Password baru harus diisi!'
            });
            return false;
          } else if (form.konf_password.value=='') {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Konfirmasi Password baru harus diisi!'
            });
            return false;
          } else if (form.konf_password.value!=form.password.value) {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Konfirmasi Password baru tidak sama dengan Password baru!'
            });
            return false;
          }else {
            return true;
          };
        }
      </script>
