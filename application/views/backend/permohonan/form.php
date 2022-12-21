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
            <li class="breadcrumb-item"><a href="<?=site_url('nasabah')?>"><i class="bx bx-home-alt"></i></a>
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
              <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
              </div>
              <h5 class="mb-0 text-primary"><?=$subpage.' '.$page?></h5>
            </div>
            <hr>
            <?php $attributes = array('onsubmit' => 'return tambah(this)');
            echo form_open_multipart('permohonan/process',$attributes); ?>
            <input type="hidden" name="id_nasabah" value="<?=$row->id_nasabah?>" readonly>
            <div class="row g-3">
              <div class="col-md-8">
                <label for="user_id" class="form-label">Nasabah *</label>
                <select class="single-select" id="user_id" name="user_id" required >
                  <?php $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $row->user_id ?>
                  <option value="">- Daftar Nasabah -</option>
                  <?php foreach ($nasabah->result() as $key => $data) { ?>
                    <option value="<?=$data->id?>" <?=$data->id == $user_id ? 'selected' : null?>> <?=$data->nama_lengkap?> </option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-4">
                <label for="jk" class="form-label">Jenis Kelamin *</label>
                <select class="single-select" id="jk" name="jk" required>
                  <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                  <option value="">- Pilih -</option>
                  <option value="Laki-laki" <?=$jk == 'Laki-laki' ? 'selected' : null?>> Laki-laki </option>
                  <option value="Perempuan" <?=$jk == 'Perempuan' ? 'selected' : null?>> Perempuan </option>
                </select>
              </div>

              <?php if ($this->fungsi->user_login()->role != 2){ ?>
                <div class="col-md-12">
                <?php }else{ ?>
                  <div class="col-md-6">
                  <?php } ?>
                  <label for="no_ktp" class="form-label">Nomor KTP *</label>
                  <input type="text" name="no_ktp" class="form-control" id="no_ktp" value="<?=$row->no_ktp?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="3328xxxxxxxxxxxx" required>
                </div>
                <div class="col-md-6">
                  <label for="tmpt_lahir" class="form-label">Tempat Lahir *</label>
                  <input type="text" name="tmpt_lahir" class="form-control" id="tmpt_lahir"
                  value="<?=$row->tmpt_lahir?>" required oninvalid="this.setCustomValidity('Masukkan Tempat Lahir anda')" oninput="setCustomValidity('')"  placeholder="Masukan tempat lahir">
                </div>
                <div class="col-md-6">
                  <label for="tgl_lhr" class="form-label">Tanggal Lahir *</label>
                  <input type="date" name="tgl_lhr" class="form-control" id="tgl_lhr"
                  value="<?=$row->tgl_lhr?>" required oninvalid="this.setCustomValidity('Masukkan Tanggal Lahir anda')" oninput="setCustomValidity('')">
                </div>
                <div class="col-md-8">
                  <label for="alamat" class="form-label">Alamat *</label>
                  <textarea name="alamat" class="form-control" id="alamat" rows="3" required oninvalid="this.setCustomValidity('Masukkan Alamat anda')" oninput="setCustomValidity('')"><?=$row->alamat?></textarea>
                </div>
                <div class="col-md-4">
                  <label for="pend_terakhir" class="form-label">Pendidikan Terakhir *</label>
                  <select class="single-select" id="pend_terakhir" name="pend_terakhir" required>
                    <?php $pend_terakhir = $this->input->post('pend_terakhir') ? $this->input->post('pend_terakhir') : $row->pend_terakhir ?>
                    <option value="">- Pilih -</option>
                    <option value="SD" <?=$pend_terakhir == 'SD' ? 'selected' : null?>> SD </option>
                    <option value="SMP" <?=$pend_terakhir == 'SMP' ? 'selected' : null?>> SMP </option>
                    <option value="SMA/SMK" <?=$pend_terakhir == 'SMA/SMK' ? 'selected' : null?>> SMA/SMK </option>
                    <option value="D3" <?=$pend_terakhir == 'D3' ? 'selected' : null?>> D3 </option>
                    <option value="D4/S1" <?=$pend_terakhir == 'D4/S1' ? 'selected' : null?>> D4/S1 </option>
                    <option value="S2" <?=$pend_terakhir == 'S2' ? 'selected' : null?>> S2 </option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="ibu_kandung" class="form-label">Nama Ibu Kandung *</label>
                  <input type="text" name="ibu_kandung" class="form-control" id="ibu_kandung"
                  value="<?=$row->ibu_kandung?>" required oninvalid="this.setCustomValidity('Masukkan Nama Ibu Kandung anda')" oninput="setCustomValidity('')"  placeholder="Masukan nama ibu kandung">
                </div>
                <div class="col-md-6">
                  <label for="status_perkawinan" class="form-label">Status Perkawinan *</label>
                  <select class="single-select" id="status_perkawinan" name="status_perkawinan" required>
                    <?php $status_perkawinan = $this->input->post('status_perkawinan') ? $this->input->post('status_perkawinan') : $row->status_perkawinan ?>
                    <option value="">- Pilih -</option>
                    <option value="Menikah" <?=$status_perkawinan == 'Menikah' ? 'selected' : null?>> Menikah </option>
                    <option value="Belum Menikah" <?=$status_perkawinan == 'Belum Menikah' ? 'selected' : null?>> Belum Menikah </option>
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="jml_tanggungan" class="form-label">Jumlah Tanggungan *</label>
                  <input type="text" name="jml_tanggungan" class="form-control" id="jml_tanggungan" value="<?=$row->jml_tanggungan?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="berapa org" required>
                </div>
                <div class="col-md-6">
                  <label for="istri_suami" class="form-label">Nama Suami/Istri</label>
                  <input type="text" name="istri_suami" class="form-control" id="istri_suami"
                  value="<?=$row->istri_suami?>" oninvalid="this.setCustomValidity('Masukkan Nama Suami/Istri Anda')" oninput="setCustomValidity('')"  placeholder="Masukan nama suami/istri">
                </div>
                <div class="col-md-6">
                  <label for="pekerjaan_istri_suami" class="form-label">Pekerjaan Suami/Istri </label>
                  <input type="text" name="pekerjaan_istri_suami" class="form-control" id="pekerjaan_istri_suami"
                  value="<?=$row->pekerjaan_istri_suami?>" oninvalid="this.setCustomValidity('Masukkan Pekerjaan Suami/Istri Anda')" oninput="setCustomValidity('')"  placeholder="Masukan pekerjaan suami/istri">
                </div>
                <div class="col-md-12">
                  <label for="foto_kk" class="form-label">Foto KK</label><br>
                  <?php if ($row->foto_kk != null){ ?>
                    <a href="<?=base_url('upload/foto/'.$row->foto_kk)?>" data-lightbox="<?=$row->foto_kk?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                      <img src="<?=base_url('upload/foto/'.$row->foto_kk)?>" alt="Foto" style="width:110px" class="rounded ml-3 shadow p-1 mb-3"> </a>
                    <?php } ?>
                    <div class="col-md-12">
                      <div class="custom-file">
                        <input type="file" value="<?=$row->foto_kk?>" name="foto_kk" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFilekk(event)">
                      </div>
                    </div>
                    <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
                    <br>
                    <input type="hidden" name="old_foto_kk" value="<?=$row->foto_kk?>" readonly>
                    <small>Pratinjau Foto:</small><br>
                    <img src="" id="outputkk" width="100px" class="rounded ml-3 shadow p-1"/>
                    <script>
                      var loadFilekk = function(event) {
                        var outputkk = document.getElementById('outputkk');
                        outputkk.src = URL.createObjectURL(event.target.files[0]);
                        outputkk.onload = function() {
                          URL.revokeObjectURL(outputkk.src) // free memory
                        }
                      };
                    </script>
                  </div>
                  <div class="col-md-12">
                    <label for="foto_ktp" class="form-label">Foto KTP</label><br>
                    <?php if ($row->foto_ktp != null){ ?>
                      <a href="<?=base_url('upload/foto/'.$row->foto_ktp)?>" data-lightbox="<?=$row->foto_ktp?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                        <img src="<?=base_url('upload/foto/'.$row->foto_ktp)?>" alt="Foto" style="width:110px" class="rounded ml-3 shadow p-1 mb-3"> </a>
                      <?php } ?>
                      <div class="col-md-12">
                        <div class="custom-file">
                          <input type="file" value="<?=$row->foto_ktp?>" name="foto_ktp" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFilektp(event)">
                        </div>
                      </div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
                      <br>
                      <input type="hidden" name="old_foto_ktp" value="<?=$row->foto_ktp?>" readonly>
                      <small>Pratinjau Foto:</small><br>
                      <img src="" id="outputktp" width="100px" class="rounded ml-3 shadow p-1"/>
                      <script>
                        var loadFilektp = function(event) {
                          var outputktp = document.getElementById('outputktp');
                          outputktp.src = URL.createObjectURL(event.target.files[0]);
                          outputktp.onload = function() {
                            URL.revokeObjectURL(outputktp.src) // free memory
                          }
                        };
                      </script>
                    </div>

                    <div class="col-md-12">
                      <label for="akta_nikah" class="form-label">Foto Akta Nikah</label><br>
                      <?php if ($row->akta_nikah != null){ ?>
                        <a href="<?=base_url('upload/foto/'.$row->akta_nikah)?>" data-lightbox="<?=$row->akta_nikah?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                          <img src="<?=base_url('upload/foto/'.$row->akta_nikah)?>" alt="Foto" style="width:110px" class="rounded ml-3 shadow p-1 mb-3"> </a>
                        <?php } ?>
                        <div class="col-md-12">
                          <div class="custom-file">
                            <input type="file" value="<?=$row->akta_nikah?>" name="akta_nikah" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFileakta(event)">
                          </div>
                        </div>
                        <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
                        <br>
                        <input type="hidden" name="old_foto_akta_nikah" value="<?=$row->akta_nikah?>" readonly>
                        <small>Pratinjau Foto:</small><br>
                        <img src="" id="outputakta" width="100px" class="rounded ml-3 shadow p-1"/>
                        <script>
                          var loadFileakta = function(event) {
                            var outputakta = document.getElementById('outputakta');
                            outputakta.src = URL.createObjectURL(event.target.files[0]);
                            outputakta.onload = function() {
                              URL.revokeObjectURL(outputakta.src) // free memory
                            }
                          };
                        </script>
                      </div>
                      <div class="col-12 text-center">
                        <a href="javascript:history.back()" class="btn btn-outline-secondary"><span class="bx bx-left-arrow-circle"></span> Kembali</a>
                        <button type="submit" name="Edit" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
                      </div>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <!--end page wrapper -->
