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
    <h6 class="mb-0 text-uppercase"><?=$subpage.' '.$page?></h6>
    <hr/>
    <div class="card">
      <div class="card-title m-3 ms-auto">
        <?php if ($this->fungsi->user_login()->role == 0){ ?>
          <a href="<?=site_url('nasabah/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
        <?php } ?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Tanggal Permohonan</th>
                <th>Jumlah Permohonan</th>
                <th>Jangka Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php if ($this->fungsi->user_login()->role != 2){?>
              <tbody>
                <?php $no=1;
                foreach ($row->result() as $key => $data) {
                  if ($data->tgl_pinjaman != null) { ?>
                  <tr>
                    <td width="1%"><?=$no?></td>
                    <td><?=$data->nama_lengkap?></td>
                    <td> <?php if ($data->tgl_pinjaman != null){ ?>
                      <?=date_indo($data->tgl_pinjaman)?>
                    <?php }else{
                      echo "Data Belum Lengkap";
                    } ?>

                  </td>
                  <td><?=rupiah($data->jml_permohonan)?></td>
                  <td><?=$data->jangka_waktu.' '.$data->jenis_pinjaman?></td>
                  <?php if ($data->tgl_pinjaman == null){ ?>
                    <td>Data Belum Lengkap</td>
                  <?php }else{ ?>
                  <td>
                    <!-- Button trigger modal -->
                    <span type="button" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal<?=$data->id_nasabah?>" title="Klik untuk Merubah">
                      <?php if ($data->status == 1){ ?>
                        <span class="badge bg-danger">Data Kurang Lengkap</span>
                      <?php }else if ($data->status == 2) { ?>
                        <span class="badge bg-warning text-dark">Proses Verifikasi</span>
                      <?php }else if ($data->status == 3) { ?>
                        <span class="badge bg-success">Data Terverifikasi</span>
                      <?php }else if ($data->status == 4) { ?>
                        <span class="badge bg-warning text-dark">Menunggu Approval</span>
                      <?php }else if ($data->status == 5) { ?>
                        <span class="badge bg-success">Approved</span><br/>
                        Oleh : <?php foreach ($user->result() as $key => $userdata) {
                          if ($userdata->id == $data->user_approved) {
                            echo "$userdata->nama_lengkap";
                          }
                        } ?>
                      <?php }else{ ?>
                        <span class="badge bg-primary">Pengajuan Baru</span>
                      <?php } ?>
                    </span>
                    <!-- Modal -->
                    <?php if ($this->fungsi->user_login()->role == 1){ ?>
                    <div class="modal fade" id="exampleVerticallycenteredModal<?=$data->id_nasabah?>" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?php
                            $attributes = array('onsubmit' => 'return tambah(this)');
                            echo form_open_multipart('pinjaman/status',$attributes); ?>
                            <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                            <div class="col-md-12">
                              <label for="status" class="form-label">Status *</label>
                              <select class="form-select" id="status" name="status" required>
                                <?php $status = $this->input->post('status') ? $this->input->post('status') : $data->status ?>
                                <option value="">- Pilih -</option>
                                <option value="0" <?=$status == '0' ? 'selected' : null?>> Pengajuan Baru </option>
                                <option value="1" <?=$status == '1' ? 'selected' : null?>> Data Kurang Lengkap </option>
                                <option value="2" <?=$status == '2' ? 'selected' : null?>> Proses Verifikasi </option>
                                <option value="3" <?=$status == '3' ? 'selected' : null?>> Data Terverifikasi </option>
                                <option value="4" <?=$status == '4' ? 'selected' : null?>> Menunggu Approval </option>
                                <option value="5" <?=$status == '5' ? 'selected' : null?>> Approved </option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="Tambah" class="btn btn-primary"><span class="bx bx-save"></span> Simpan</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </td>
                <?php } ?>
                  <td width="1%">
                    <a href="<?=site_url('permohonan/detail/'.$data->id_nasabah)?>" title="Detail" class="btn btn-sm btn-primary"><i class="bx bx-detail me-0"></i> Detail</a>
                    <a href="<?=site_url('permohonan/cetak/'.$data->id_nasabah)?>" title="Cetak" class="btn btn-sm btn-warning"><i class="bx bx-printer me-0"></i> Cetak</a>
                    <?php if ($this->fungsi->user_login()->role == 0){ ?>
                      <a href="<?=site_url('permohonan/del/'.$data->id_nasabah)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash me-0"></i> Hapus</a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $no++;
              }
              } ?>
            </tbody>
          <?php }else{ ?>
            <tbody>
              <?php $no=1;
              foreach ($row->result() as $key => $data) {
                if ($data->nama_lengkap == $this->fungsi->user_login()->nama_lengkap ) {  ?>
                  <tr>
                    <td width="1%"><?=$no?></td>
                    <td><?=$data->nama_lengkap?></td>
                    <td><?=date_indo($data->tgl_pinjaman)?></td>
                    <td><?=rupiah($data->jml_permohonan)?></td>
                    <td><?=$data->jangka_waktu.' '.$data->jenis_pinjaman?></td>
                    <td><?php if ($data->status == 1){ ?>
                      <span class="badge bg-danger">Data Kurang Lengkap</span>
                    <?php }else if ($data->status == 2) { ?>
                      <span class="badge bg-warning text-dark">Proses Verifikasi</span>
                    <?php }else if ($data->status == 3) { ?>
                      <span class="badge bg-success">Data Terverifikasi</span>
                    <?php }else if ($data->status == 4) { ?>
                      <span class="badge bg-warning text-dark">Menunggu Approval</span>
                    <?php }else if ($data->status == 5) { ?>
                      <span class="badge bg-success">Approved</span>
                    <?php }else{ ?>
                      <span class="badge bg-primary">Pengajuan Baru</span>
                    <?php } ?>
                  </td>
                  <td width="1%">
                    <a href="<?=site_url('permohonan/detail/'.$data->id_nasabah)?>" title="Detail" class="btn btn-sm btn-primary"><i class="bx bx-detail me-0"></i> Detail</a>
                    <a href="<?=site_url('permohonan/cetak/'.$data->id_nasabah)?>" title="Cetak" class="btn btn-sm btn-warning"><i class="bx bx-printer me-0"></i> Cetak</a>
                    <?php if ($this->fungsi->user_login()->role != 2) { ?>
                      <a href="<?=site_url('permohonan/del/'.$data->id_nasabah)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash me-0"></i> Hapus</a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $no++;
              }
            } ?>
          </tbody>
        <?php } ?>

      </table>
    </div>
  </div>
</div>
</div>
</div>
<!--end page wrapper -->
