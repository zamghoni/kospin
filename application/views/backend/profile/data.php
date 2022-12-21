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
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$subpage.' '.$page?></li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <?php if ($this->fungsi->user_login()->foto != null){ ?>
                  <a href="<?=base_url('upload/foto/'.$row->foto)?>" data-lightbox="<?=$row->foto?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                    <img src="<?=base_url('upload/foto/'.$row->foto)?>" alt="Admin" class="rounded-circle p-1 shadow" width="110" height="110">
                  </a>
                <?php } else { ?>
                  <a href="<?=base_url('')?>assets/images/favicon/apple-icon-60x60.png" data-lightbox="apple-icon-60x60.png" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                    <img src="<?=base_url('')?>assets/images/favicon/apple-icon-60x60.png" alt="Pasien" class="rounded-circle p-1 shadow" width="110" height="110">
                  </a>
                <?php } ?>
                  <div class="mt-3">
                    <?php if ($this->fungsi->user_login()->role != 0){ ?>
                    <h4><?=$row->nama_lengkap ?></h4>
                    <?php } else { ?>
                    <h4><?=$row->nama_lengkap ?></h4>
                  <?php } ?>
                    <p class="text-secondary mb-1"><?php if ($this->fungsi->user_login()->role == 0){ ?>
  									<span class="badge bg-primary">Admin</span>
  								<?php }else{ ?>
  									<span class="badge bg-warning text-dark">Pasien</span>
  								<?php } ?></p>
                  </div>
                </div>
                <hr class="my-4" />
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nama Lengkap</h6>
                    <?php if ($this->fungsi->user_login()->role != 0){ ?>
                    <span class="text-secondary"><?=$this->fungsi->user_login()->nama_lengkap?></span>
                  <?php } else { ?>
                    <span class="text-secondary"><?=$this->fungsi->user_login()->nama_lengkap?></span>
                  <?php } ?>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Email</h6>
                    <span class="text-secondary"><?=$this->fungsi->user_login()->email?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nomor HP.</h6>
                    <span class="text-secondary"><?=$this->fungsi->user_login()->no_hp?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Dibuat pada</h6>
                    <span class="text-secondary"><?=igDate($this->fungsi->user_login()->dibuat)?></span>
                  </li>
                  <?php if ($this->fungsi->user_login()->diubah != null){ ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Diubah pada</h6>
                      <span class="text-secondary"><?=igDate($this->fungsi->user_login()->diubah)?></span>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-center">
                  <div><i class="bx bx-user-circle me-1 font-22 text-primary"></i>
                  </div>
                  <h5 class="mb-0 text-primary"><?='Update '.$page?></h5>
                </div>
                <hr>
                <div class="form-group row">
                <?php
                $attributes = array('onsubmit' => 'return tambah(this)');
                echo form_open_multipart('profile/process',$attributes); ?>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nama Lengkap *</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="hidden" name="id" value="<?=$this->fungsi->user_login()->id?>">
                    <input type="text" name="nama_lengkap" class="form-control"
                    <?php if ($this->fungsi->user_login()->role != 0){ ?>
                    value="<?=$row->nama_lengkap?>" readonly
                  <?php } else{ ?>
                    value="<?=$row->nama_lengkap?>"
                  <?php } ?>required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap anda')" oninput="setCustomValidity('')"  placeholder="Masukan nama lengkap">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email *</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="email" name="email" class="form-control" value="<?=$row->email?>" required oninvalid="this.setCustomValidity('Masukkan Email anda')" oninput="setCustomValidity('')"  placeholder="Masukan email">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">No. HP *</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="hidden" name="role" value="<?=$this->fungsi->user_login()->role?>">
                    <input type="text" name="no_hp" class="form-control" value="<?=$row->no_hp?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="0891xxxxxx" maxlength="15" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Foto </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="file" value="<?=$row->foto?>" name="foto" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFile(event)">
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
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <button type="submit" name="update" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end page wrapper -->
