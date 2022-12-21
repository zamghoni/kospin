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
              <div><i class="bx bx-user-circle me-1 font-22 text-primary"></i>
              </div>
              <h5 class="mb-0 text-primary"><?=$subpage.' '.$page?></h5>
            </div>
            <hr>
            <?php $attributes = array('onsubmit' => 'return tambah(this)');
            echo form_open_multipart('user/process',$attributes); ?>
            <div class="row g-3">
              <div class="col-md-12">
                <input type="hidden" name="id" value="<?=$row->id?>">
                <label for="nama_lengkap" class="form-label">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                 value="<?=$row->nama_lengkap?>" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap anda')" oninput="setCustomValidity('')"  placeholder="Masukan nama lengkap" autofocus>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" id="email" value="<?=$row->email?>" required oninvalid="this.setCustomValidity('Masukkan Email anda')" oninput="setCustomValidity('')"  placeholder="Masukan email">
              </div>
              <div class="col-md-6">
                <label for="no_hp" class="form-label">Nomor HP *</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?=$row->no_hp?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="0891xxxxxx" required>
              </div>
              <div class="col-md-6">
                <label for="password" class="form-label">Password *</label>
                <input type="password" name="password" class="form-control" id="password">
                <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan password di isi'?>)</small>
              </div>
              <div class="col-md-6">
                <label for="konf_password" class="form-label">Konfirmasi Password *</label>
                <input type="password" name="konf_password" class="form-control" id="konf_password">
                <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan password di isi'?>)</small>
              </div>
              <div class="col-md-12">
                <label for="role" class="form-label">Role *</label>
                <select class="single-select" id="role" name="role" required>
                  <?php $role = $this->input->post('role') ? $this->input->post('role') : $row->role ?>
                  <option value="">- Pilih -</option>
                  <option value="0" <?=$role == '0' ? 'selected' : null?>> Admin </option>
                  <option value="1" <?=$role == '1' ? 'selected' : null?>> Pimpinan </option>
                  <option value="2" <?=$role == '2' ? 'selected' : null?>> Nasabah </option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="foto" class="form-label">Foto</label><br>
                <?php if ($row->foto != null){ ?>
                  <a href="<?=base_url('upload/foto/'.$row->foto)?>" data-lightbox="<?=$row->foto?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                    <img src="<?=base_url('upload/foto/'.$row->foto)?>" alt="Foto" style="width:110px" class="rounded ml-3 shadow p-1 mb-3"> </a>

                <?php } ?>
                <div class="col-md-12">
                  <div class="custom-file">
                    <input type="file" value="<?=$row->foto?>" name="foto" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFile(event)">
                  </div>
                </div>
                <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
                <br>
                <input type="hidden" name="old_foto" value="<?=$row->foto?>" readonly>
                <small>Pratinjau Foto:</small><br>
                <img src="" id="output" width="100px" class="rounded ml-3 shadow p-1"/>
                <script>
                  var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                      URL.revokeObjectURL(output.src) // free memory
                    }
                  };
                </script>
              </div>
              <div class="col-12 text-center">
                <a href="<?=site_url('user')?>" class="btn btn-outline-secondary"><span class="bx bx-arrow-back"></span> Kembali</a>
                <button type="submit" name="<?=$subpage?>" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
    <?php if ($subpage == "Tambah") {?>
      <script>
        function tambah(form) {
          if (form.password.value=='') {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Password harus diisi!'
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
              msg: 'Konfirmasi Password harus diisi!'
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
              msg: 'Konfirmasi Password tidak sesuai!'
            });
            return false;
          }else {
            return true;
          };
        }
      </script>
    <?php } ?>
    <?php if ($subpage == "Edit") {?>
      <script>
        function tambah(form) {
          if (form.konf_password.value!=form.password.value) {
            Lobibox.notify('warning', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delayIndicator: true,
              icon: 'bx bx-error',
              continueDelayOnInactiveTab: false,
              position: 'top right',
              msg: 'Konfirmasi Password tidak sesuai!'
            });
            return false;
          } else  {
            return true;
          };
        }
      </script>
    <?php } ?>
