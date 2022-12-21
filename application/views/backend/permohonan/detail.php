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
            <div class="row g-3">
              <div class="table-responsive">
                <table class="table table-sm table-borderless table-hover table-striped">
                  <tr>
                    <th colspan="2" class="mb-0"><h5>A. Data Nasabah</h5></th>
                    <?php if ($this->fungsi->user_login()->role == 0){ ?>
                      <td>
                        <a href="<?=site_url('permohonan/edit/'.$row->id_nasabah)?>" title="Edit Data Nasabah" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Nasabah</a>
                      </td>
                    <?php }elseif ($this->fungsi->user_login()->role == 2) {?>
                      <td>
                        <a href="<?=site_url('nasabah/edituser/'.$this->fungsi->user_login()->id)?>" title="Edit Data Nasabah" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Nasabah</a>
                      </td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>
                  </tr>
                  <tr>
                    <th width="100px">Nama Lengkap</th>
                    <td width="1px">:</td>
                    <td><?=$row->nama_lengkap?></td>
                  </tr>
                  <tr>
                    <th>Nomor KTP</th>
                    <td>:</td>
                    <td><?=$row->no_ktp?></td>
                  </tr>
                  <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>:</td>
                    <td><?=$row->tmpt_lahir.', '.$row->tgl_lhr?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?=$row->alamat?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td><?=$row->jk?></td>
                  </tr>
                  <tr>
                    <th>Nama Ibu Kandung</th>
                    <td>:</td>
                    <td><?=$row->ibu_kandung?></td>
                  </tr>
                  <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>:</td>
                    <td><?=$row->pend_terakhir?></td>
                  </tr>
                  <tr>
                    <th>Nomor HP</th>
                    <td>:</td>
                    <td><?=$row->no_hp?></td>
                  </tr>
                  <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td><?=$row->status_perkawinan?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Tanggungan</th>
                    <td>:</td>
                    <td><?=$row->jml_tanggungan?></td>
                  </tr>
                  <tr>
                    <th>Nama Istri/Suami</th>
                    <td>:</td>
                    <td><?=$row->istri_suami?></td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Istri/Suami</th>
                    <td>:</td>
                    <td><?=$row->pekerjaan_istri_suami?></td>
                  </tr>
                  <tr>
                    <th>Foto KK</th>
                    <td>:</td>
                    <td><?php if($row->foto_kk != null) { ?>
                      <a href="<?=base_url('upload/foto/'.$row->foto_kk)?>" data-lightbox="<?=$row->foto_kk?>" class="btn btn-sm btn-outline-primary" title="Foto KK <?=ucfirst($row->nama_lengkap)?>">
                        <i class="bx bx-show-alt me-0"></i> </a>
                      <?php } else { ?>
                        <i class="bx bx-hide"></i>
                      <?php } ?></td>
                  </tr>
                  <tr>
                    <th>Foto KTP</th>
                    <td>:</td>
                    <td><?php if($row->foto_ktp != null) { ?>
                      <a href="<?=base_url('upload/foto/'.$row->foto_ktp)?>" data-lightbox="<?=$row->foto_ktp?>" class="btn btn-sm btn-outline-primary" title="Foto KTP <?=ucfirst($row->nama_lengkap)?>">
                        <i class="bx bx-show-alt me-0"></i> </a>
                      <?php } else { ?>
                        <i class="bx bx-hide"></i>
                      <?php } ?></td>
                  </tr>
                  <tr>
                    <th>Akta Nikah</th>
                    <td>:</td>
                    <td><?php if($row->akta_nikah != null) { ?>
                      <a href="<?=base_url('upload/foto/'.$row->akta_nikah)?>" data-lightbox="<?=$row->akta_nikah?>" class="btn btn-sm btn-outline-primary" title="Akta Nikah <?=ucfirst($row->nama_lengkap)?>">
                        <i class="bx bx-show-alt me-0"></i> </a>
                      <?php } else { ?>
                        <i class="bx bx-hide"></i>
                      <?php } ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" class="mb-0"><h5>B. Data Pekerjaan</h5></th>
                    <?php if ($this->fungsi->user_login()->role == 0){ ?>
                    <td>
                      <a href="<?=site_url('permohonan/edit_pekerjaan/'.$row->user_id)?>" title="Edit Data Pekerjaan" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Pekerjaan</a>
                    </td>
                  <?php }elseif ($this->fungsi->user_login()->role == 2) { ?>
                    <td>
                      <a href="<?=site_url('pekerjaan/edituser/'.$this->fungsi->user_login()->id)?>" title="Edit Data Pekerjaan" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Pekerjaan</a>
                    </td>
                  <?php }else{ ?>
                    <td></td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td><?=$row->pekerjaan?></td>
                  </tr>
                  <tr>
                    <th>Nama Perusahaan</th>
                    <td>:</td>
                    <td><?=$row->nama_perush?></td>
                  </tr>
                  <tr>
                    <th>Alamat Perusahaan</th>
                    <td>:</td>
                    <td><?=$row->alamat_perush?></td>
                  </tr>
                  <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td><?=$row->jabatan?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Penghasilan</th>
                    <td>:</td>
                    <td><?=$row->jml_penghasilan?></td>
                  </tr>
                  <tr>
                    <th colspan="2" class="mb-0"><h5>C. Data Pinjaman</h5></th>
                    <?php if ($this->fungsi->user_login()->role == 0){ ?>
                    <td>
                      <a href="<?=site_url('permohonan/edit_pinjaman/'.$row->user_id)?>" title="Edit Data Pinjaman" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Pinjaman</a>
                    </td>
                  <?php }elseif ($this->fungsi->user_login()->role == 2) { ?>
                    <td>
                      <a href="<?=site_url('pinjaman/edituser/'.$this->fungsi->user_login()->id)?>" title="Edit Data Pinjaman" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Pinjaman</a>
                    </td>
                  <?php }else{ ?>
                    <td></td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <th>Jenis Pinjaman</th>
                    <td>:</td>
                    <td><?=$row->jenis_pinjaman?></td>
                  </tr>
                  <tr>
                    <th>Jangka Waktu</th>
                    <td>:</td>
                    <td><?=$row->jangka_waktu.' '.$row->jenis_pinjaman?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Permohonan</th>
                    <td>:</td>
                    <td><?=rupiah($row->jml_permohonan)?></td>
                  </tr>
                  <tr>
                    <th>Tujuan Penggunaan</th>
                    <td>:</td>
                    <td><?=$row->tujuan_penggunaan?></td>
                  </tr>
                  <tr>
                    <th colspan="2" class="mb-0"><h5>D. Data Jaminan</h5></th>
                    <?php if ($this->fungsi->user_login()->role != 1){ ?>
                    <td>
                      <a href="<?=site_url('jaminan')?>" title="Edit Data Jaminan" class="badge bg-warning text-dark float-right"><i class="bx bx-edit me-0"></i> Edit Data Jaminan</a>
                    </td>
                  <?php }else{ ?>
                    <td></td>
                  <?php } ?>
                  </tr>
                </table>
                <div class="table-responsive">
                  <table class="table table-sm table-borderless table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Jaminan</th>
                        <th>Taksiran</th>
                        <th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;
                      foreach ($jaminan->result() as $key => $data) {
                        if ($data->user_id == $row->user_id) { ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$data->nama_jaminan?></td>
                          <td><?=rupiah($data->taksiran)?></td>
                          <td><?php if($data->foto_jaminan != null) { ?>
                            <a href="<?=base_url('upload/foto/'.$data->foto_jaminan)?>" data-lightbox="<?=$data->foto_jaminan?>" class="btn btn-sm btn-outline-primary" title="Foto <?=ucfirst($data->nama_lengkap)?>">
                              <i class="bx bx-show-alt me-0"></i> </a>
                            <?php } else { ?>
                              <i class="bx bx-hide"></i>
                            <?php } ?></td>
                        </tr>
                        <?php $no++;
                      }
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-12 text-center">
                  <a href="<?=site_url('permohonan')?>" class="btn btn-outline-secondary"><span class="bx bx-left-arrow-circle"></span> Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
