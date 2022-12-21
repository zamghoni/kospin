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
            <li class="breadcrumb-item"><a href="<?=site_url('pekerjaan')?>"><i class="bx bx-home-alt"></i></a>
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
            echo form_open_multipart('pekerjaan/process',$attributes); ?>
            <input type="hidden" name="id_pekerjaan" value="<?=$row->id_pekerjaan?>" readonly>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="user_id" class="form-label">Nasabah *</label>
                <select class="single-select" id="user_id" name="user_id" required>
                  <?php $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $row->user_id ?>
                  <option value="">- Daftar Nasabah -</option>
                  <?php foreach ($nasabah->result() as $key => $data) { ?>
                  <option value="<?=$data->id?>" <?=$data->id == $user_id ? 'selected' : null?>> <?=$data->nama_lengkap?> </option>
                <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="pekerjaan" class="form-label">Pekerjaan *</label>
                <select class="single-select" id="pekerjaan" name="pekerjaan" required>
                  <?php $pekerjaan = $this->input->post('pekerjaan') ? $this->input->post('pekerjaan') : $row->pekerjaan ?>
                  <option value="">- Pilih -</option>
                  <option value="Buruh" <?=$pekerjaan == 'Buruh' ? 'selected' : null?>> Buruh </option>
                  <option value="Pegawai Swasta" <?=$pekerjaan == 'Pegawai Swasta' ? 'selected' : null?>> Pegawai Swasta </option>
                  <option value="Pegawai Negeri" <?=$pekerjaan == 'Pegawai Negeri' ? 'selected' : null?>> Pegawai Negeri </option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="nama_perush" class="form-label">Nama Perusahaan *</label>
                <input type="text" name="nama_perush" class="form-control" id="nama_perush"
                value="<?=$row->nama_perush?>" required oninvalid="this.setCustomValidity('Masukkan Nama Perusahaan')" oninput="setCustomValidity('')"  placeholder="Masukan nama perusahaan">
              </div>
              <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan *</label>
                <input type="text" name="jabatan" class="form-control" id="jabatan"
                value="<?=$row->jabatan?>" required oninvalid="this.setCustomValidity('Masukkan Jabatan')" oninput="setCustomValidity('')"  placeholder="Masukan jabatan">
              </div>
              <div class="col-md-12">
                <label for="alamat_perush" class="form-label">Alamat Perusahaan *</label>
                <textarea name="alamat_perush" rows="3" class="form-control" required><?=$row->alamat_perush?></textarea>
              </div>
              <div class="col-md-12">
                <label for="jml_penghasilan" class="form-label">Jumlah Penghasilan *</label>
                <input type="text" name="jml_penghasilan" class="form-control" id="jml_penghasilan" value="<?=$row->jml_penghasilan?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="3.000.xxx" required>
              </div>
              <div class="col-12 text-center">
                <a href="javascript:history.back()" class="btn btn-outline-secondary"><span class="bx bx-left-arrow-circle"></span> Kembali</a>
                <button type="submit" name="<?=$subpage?>" class="btn btn-primary px-2"><span class="bx bx-save"></span> Simpan</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
