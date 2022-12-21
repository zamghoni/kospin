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
            <li class="breadcrumb-item"><a href="<?=site_url('jaminan')?>"><i class="bx bx-home-alt"></i></a>
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
            echo form_open_multipart('jaminan/process',$attributes); ?>
            <input type="hidden" name="id_jaminan" value="<?=$row->id_jaminan?>" readonly>
            <div class="row g-3">
              <?php if ($this->fungsi->user_login()->role == 0){ ?>
                <div class="col-md-8">
                  <label for="user_id" class="form-label">Nasabah *</label>
                  <select class="single-select" id="user_id" name="user_id" required>
                    <?php $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $row->user_id ?>
                    <option value="">- Daftar Nasabah -</option>
                    <?php foreach ($nasabah->result() as $key => $data) { ?>
                    <option value="<?=$data->id?>" <?=$data->id == $user_id ? 'selected' : null?>> <?=$data->nama_lengkap?> </option>
                  <?php } ?>
                  </select>
                </div>
              <?php }else{ ?>
                <input type="hidden" name="user_id" value="<?=$this->fungsi->user_login()->id?>" readonly>
              <?php } ?>
              <div class="col-md-6">
                <label for="nama_jaminan" class="form-label">Nama Jaminan *</label>
                <select class="single-select" id="nama_jaminan" name="nama_jaminan" required>
                  <?php $nama_jaminan = $this->input->post('nama_jaminan') ? $this->input->post('nama_jaminan') : $row->nama_jaminan ?>
                  <option value="">- Pilih -</option>
                  <option value="BPKB Motor" <?=$nama_jaminan == 'BPKB Motor' ? 'selected' : null?>> BPKB Motor </option>
                  <option value="BPKB Mobil" <?=$nama_jaminan == 'BPKB Mobil' ? 'selected' : null?>> BPKB Mobil </option>
                  <option value="Sertifikat Tanah" <?=$nama_jaminan == 'Sertifikat Tanah' ? 'selected' : null?>> Sertifikat Tanah </option>
                  <option value="Logam Mulias" <?=$nama_jaminan == 'Logam Mulias' ? 'selected' : null?>> Logam Mulias </option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="taksiran" class="form-label">Taksiran *</label>
                <input type="text" name="taksiran" class="form-control" id="taksiran" value="<?=$row->taksiran?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="8.000.xxx" required>
              </div>
              <div class="col-md-12">
                <label for="foto_jaminan" class="form-label">Foto Jaminan</label><br>
                <?php if ($row->foto_jaminan != null){ ?>
                  <a href="<?=base_url('upload/foto/'.$row->foto_jaminan)?>" data-lightbox="<?=$row->foto_jaminan?>" title="Foto <?=ucfirst($row->nama_lengkap)?>">
                    <img src="<?=base_url('upload/foto/'.$row->foto_jaminan)?>" alt="Foto" style="width:110px" class="rounded ml-3 shadow p-1 mb-3"> </a>

                <?php } ?>
                <div class="col-md-12">
                  <div class="custom-file">
                    <input type="file" value="<?=$row->foto_jaminan?>" name="foto_jaminan" class="form-control" id="inputGroupFile01 formFile" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFile(event)">
                  </div>
                </div>
                <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
                <br>
                <input type="hidden" name="old_foto" value="<?=$row->foto_jaminan?>" readonly>
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
                <a href="<?=site_url('jaminan')?>" class="btn btn-outline-secondary"><span class="bx bx-left-arrow-circle"></span> Kembali</a>
                <button type="submit" name="<?=$subpage?>" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
