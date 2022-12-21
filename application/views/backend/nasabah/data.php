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
    <?php if ($this->fungsi->user_login()->role == 2){ ?>
      <div class="col-xl-7 mx-auto">
      <?php } ?>
      <div class="card">
        <div class="card-title m-3 ms-auto">
          <?php if ($this->fungsi->user_login()->role == 0){ ?>
            <a href="<?=site_url('nasabah/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->role == 2){ ?>
            <a href="<?=site_url('nasabah/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
            <a href="<?=site_url('nasabah/edituser/'.$this->fungsi->user_login()->id)?>" class="btn btn-sm btn-success"><span class="bx bx-edit"></span> Edit</a>
          <?php } ?>
        </div>
        <div class="card-body">
          <?php if ($this->fungsi->user_login()->role != 2){?>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Pend. Akhir</th>
                    <th>Status</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;
                  foreach ($row->result() as $key => $data) { ?>
                    <tr>
                      <td width="1%"><?=$no?></td>
                      <td><?=$data->nama_lengkap?></td>
                      <td><?=$data->tmpt_lahir.','.mediumdate_indo($data->tgl_lhr)?></td>
                      <td><?=$data->alamat?></td>
                      <td><?=$data->pend_terakhir?></td>
                      <td><?=$data->status_perkawinan?><br>
                        <?php if ($data->status_perkawinan == "Menikah"){ ?>
                          Pasangan : <?=$data->istri_suami?>
                        <?php } ?>
                      </td>
                      <td><?php if($data->foto_kk != null) { ?>
                        <a href="<?=base_url('upload/foto/'.$data->foto_kk)?>" data-lightbox="<?=$data->foto_kk?>" class="badge bg-primary" title="Foto KK <?=ucfirst($data->nama_lengkap)?>">
                          KK </a>
                        <?php } else { ?>
                          <i class="bx bx-hide"></i>
                        <?php } ?>
                        <?php if($data->foto_ktp != null) { ?>
                          <a href="<?=base_url('upload/foto/'.$data->foto_ktp)?>" data-lightbox="<?=$data->foto_ktp?>" class="badge bg-primary" title="Foto KTP <?=ucfirst($data->nama_lengkap)?>">
                            KTP </a>
                          <?php } else { ?>
                            <i class="bx bx-hide"></i>
                          <?php } ?>
                          <?php if($data->akta_nikah != null) { ?>
                            <a href="<?=base_url('upload/foto/'.$data->akta_nikah)?>" data-lightbox="<?=$data->akta_nikah?>" class="badge bg-primary" title="Akta Nikah <?=ucfirst($data->nama_lengkap)?>">
                              Akta Nikah </a>
                            <?php } else { ?>
                              <i class="bx bx-hide"></i>
                            <?php } ?></td>
                            <td width="1%">
                              <a href="<?=site_url('nasabah/detail/'.$data->id_nasabah)?>" title="Detail" class="btn btn-sm btn-primary"><i class="bx bx-detail me-0"></i> Detail</a>
                              <a href="<?=site_url('nasabah/edit/'.$data->id_nasabah)?>" title="Detail" class="btn btn-sm btn-success"><i class="bx bx-edit me-0"></i> Edit</a>
                              <a href="<?=site_url('nasabah/del/'.$data->id_nasabah)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash me-0"></i> Hapus</a>
                            </td>
                          </tr>
                          <?php $no++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                <?php }else{ ?>
                  <div class="table-responsive">
                    <table class="table table-sm table-borderless table-hover table-striped">
                      <?php $no=1;
                      foreach ($row->result() as $key => $row) {
                        if ($row->nama_lengkap == $this->fungsi->user_login()->nama_lengkap) { ?>
                          <tr>
                            <th colspan="3" class="mb-0"><h4>Data Nasabah</h4></th>
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
                                <?php $no++;
                              }
                            } ?>
                          </table>

                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <?php if ($this->fungsi->user_login()->role == 2){ ?>
                  </div>
                <?php } ?>
              </div>
            </div>
            <!--end page wrapper -->
