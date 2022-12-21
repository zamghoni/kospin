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
        <a href="<?=site_url('pinjaman/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->role == 2){ ?>
          <a href="<?=site_url('pinjaman/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
          <a href="<?=site_url('pinjaman/edituser/'.$this->fungsi->user_login()->id)?>" class="btn btn-sm btn-success"><span class="bx bx-edit"></span> Edit</a>
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
                <th>Tanggal Pinjaman</th>
                <th>Jenis Pinjaman</th>
                <th>Jangka Waktu</th>
                <th>Jumlah Permohonan</th>
                <th>Tujuan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach ($row->result() as $key => $data) { ?>
                <tr>
                  <td width="1%"><?=$no?></td>
                  <td><?=$data->nama_lengkap?></td>
                  <td><?=date_indo($data->tgl_pinjaman)?></td>
                  <td><?=$data->jenis_pinjaman?></td>
                  <td><?=$data->jangka_waktu.' '.$data->jenis_pinjaman?></td>
                  <td><?=rupiah($data->jml_permohonan)?></td>
                  <td><?=$data->tujuan_penggunaan?></td>
                  <td width="1%">
                    <a href="<?=site_url('pinjaman/edit/'.$data->id_pinjaman)?>" title="Edit" class="btn btn-sm btn-success"><i class="bx bx-edit me-0"></i></a>
                    <a href="<?=site_url('pinjaman/del/'.$data->id_pinjaman)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash me-0"></i></a>
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
                <th colspan="3" class="mb-0"><h5>Data Pinjaman</h5></th>
              </tr>
              <tr>
                <th width="100px">Jenis Pinjaman</th>
                <td width="1px">:</td>
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
