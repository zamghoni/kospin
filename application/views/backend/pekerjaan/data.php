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
        <a href="<?=site_url('pekerjaan/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->role == 2){ ?>
          <a href="<?=site_url('pekerjaan/form')?>" class="btn btn-sm btn-primary"><span class="bx bx-plus"></span> Tambah</a>
          <a href="<?=site_url('pekerjaan/edituser/'.$this->fungsi->user_login()->id)?>" class="btn btn-sm btn-success"><span class="bx bx-edit"></span> Edit</a>
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
                <th>Pekerjaan</th>
                <th>Nama Perusahaan</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach ($row->result() as $key => $data) { ?>
                <tr>
                  <td width="1%"><?=$no?></td>
                  <td><?=$data->nama_lengkap?></td>
                  <td><?=$data->pekerjaan?></td>
                  <td><?=$data->nama_perush?><br>
                    Alamat : <?=$data->alamat_perush?></td>
                  <td><?=$data->jabatan?><br>
                    Penghasilan : <?=rupiah($data->jml_penghasilan)?></td>
                  <td width="1%">
                    <a href="<?=site_url('pekerjaan/edit/'.$data->id_pekerjaan)?>" title="Edit" class="btn btn-sm btn-success"><i class="bx bx-edit me-0"></i></a>
                    <a href="<?=site_url('pekerjaan/del/'.$data->id_pekerjaan)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash me-0"></i></a>
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
                <th colspan="3" class="mb-0"><h5>Data Pekerjaan</h5></th>
              </tr>
              <tr>
                <th width="100px">Pekerjaan</th>
                <td width="1px">:</td>
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
