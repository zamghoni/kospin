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
            <li class="breadcrumb-item"><a href="<?=site_url('pinjaman')?>"><i class="bx bx-home-alt"></i></a>
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
            echo form_open_multipart('pinjaman/process',$attributes); ?>
            <input type="hidden" name="id_pinjaman" value="<?=$row->id_pinjaman?>" readonly>
            <div class="row g-3">
              <div class="col-md-12">
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
                <label for="jenis_pinjaman" class="form-label">Jenis Pinjaman *</label>
                <select class="single-select" id="jenis_pinjaman" name="jenis_pinjaman" required>
                  <?php $jenis_pinjaman = $this->input->post('jenis_pinjaman') ? $this->input->post('jenis_pinjaman') : $row->jenis_pinjaman ?>
                  <option value="">- Pilih -</option>
                  <option value="Mingguan" <?=$jenis_pinjaman == 'Mingguan' ? 'selected' : null?>> Mingguan </option>
                  <option value="Bulanan" <?=$jenis_pinjaman == 'Bulanan' ? 'selected' : null?>> Bulanan </option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="jangka_waktu" class="form-label">Jangka Waktu *</label>
                <input type="text" name="jangka_waktu" class="form-control" id="jangka_waktu" value="<?=$row->jangka_waktu?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="2x" required>
                <small>Mingguan (12,16,20,24) Bulanan (9,12,24,36)</small>
              </div>
              <div class="col-md-6">
                <label for="jml_permohonan" class="form-label">Jumlah Permohonan *</label>
                <input type="text" name="jml_permohonan" class="form-control" id="jml_permohonan" value="<?=$row->jml_permohonan?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="10.000.xxx" required>
              </div>
              <div class="col-md-6">
                <label for="tujuan_penggunaan" class="form-label">Tujuan Penggunaan *</label>
                <textarea name="tujuan_penggunaan" rows="3" class="form-control" required><?=$row->tujuan_penggunaan?></textarea>
              </div>
              <!-- <div class="col-md-6">
                <label for="status" class="form-label">Status *</label>
                <select class="single-select" id="status" name="status" required>
                  <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                  <option value="">- Pilih -</option>
                  <option value="1" <?=$status == '1' ? 'selected' : null?>> Data Kurang Lengkap </option>
                  <option value="2" <?=$status == '2' ? 'selected' : null?>> Proses Verifikasi </option>
                  <option value="3" <?=$status == '3' ? 'selected' : null?>> Data Terverifikasi </option>
                  <option value="4" <?=$status == '4' ? 'selected' : null?>> Menunggu Approval </option>
                  <option value="5" <?=$status == '5' ? 'selected' : null?>> Approved </option>
                </select>
              </div> -->
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
