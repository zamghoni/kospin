<style>
#tabel1 {
  color: #000000;
  border-collapse: collapse;
  /* border: 1px solid #f2f5f7; */
}
#tabel1 tr th {
  background: #284063;
  color: white;
}
#tabel1, th, td {
  border: 0px solid #000000;
}
#tabel1 tr:nth-child(odd) {
  background-color: #f2f2f2;
}
img.logo{
  margin-left: 2cm;
  float: left;
  margin-right: 50px;
}
b{
  margin-top: -10px;
  text-align: center;
}
.left{
  text-align: right;
}
.right{
  text-align: left;
}
.noBorder {
  border:none !important;
  text-align: center;
}
.noBorder2 {
  border:none !important;
  text-align: left;
}
@page {
  margin: 0cm 0cm;
}
header {
  position: fixed;
  top: 0.8cm;
  left: 0cm;
  right: 0cm;
  height: 3cm;
}
body {
  margin-top: 3.5cm;
  margin-left: 2cm;
  margin-right: 2cm;
  margin-bottom: 2cm;
  font-size: 10.5px;
}
</style>
<body>
<header>
  <img class="logo" src="assets/images/favicon/apple-icon-180x180.png" width="72px" height="72px"><br>
  <b style="font-size:14px"><?=strtoupper($subpage.' '.$page)?> <br> Kospin Jasa Cabang Bendungan Hilir <br>
</header>
<p></p>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-borderless table-hover table-striped" id="tabel1" width="100%" cellspacing="0">
        <tr>
          <th colspan="3" style="text-align: left;"><b>A. Data Nasabah</b></th>
        </tr>
        <tr>
          <td width="100px">Nama Lengkap</td>
          <td width="1px">:</td>
          <td><?=$row->nama_lengkap?></td>
        </tr>
        <tr>
          <td>Nomor KTP</td>
          <td>:</td>
          <td><?=$row->no_ktp?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td>
          <td>:</td>
          <td><?=$row->tmpt_lahir.', '.$row->tgl_lhr?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?=$row->alamat?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?=$row->jk?></td>
        </tr>
        <tr>
          <td>Nama Ibu Kandung</td>
          <td>:</td>
          <td><?=$row->ibu_kandung?></td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>:</td>
          <td><?=$row->pend_terakhir?></td>
        </tr>
        <tr>
          <td>Nomor HP</td>
          <td>:</td>
          <td><?=$row->no_hp?></td>
        </tr>
        <tr>
          <td>Status Perkawinan</td>
          <td>:</td>
          <td><?=$row->status_perkawinan?></td>
        </tr>
        <tr>
          <td>Jumlah Tanggungan</td>
          <td>:</td>
          <td><?=$row->jml_tanggungan?></td>
        </tr>
        <tr>
          <td>Nama Istri/Suami</td>
          <td>:</td>
          <td><?=$row->istri_suami?></td>
        </tr>
        <tr>
          <td>Pekerjaan Istri/Suami</td>
          <td>:</td>
          <td><?=$row->pekerjaan_istri_suami?></td>
        </tr>
        <tr>
          <th colspan="3" style="text-align: left;"><b>B. Data Pekerjaan</b></th>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td><?=$row->pekerjaan?></td>
        </tr>
        <tr>
          <td>Nama Perusahaan</td>
          <td>:</td>
          <td><?=$row->nama_perush?></td>
        </tr>
        <tr>
          <td>Alamat Perusahaan</td>
          <td>:</td>
          <td><?=$row->alamat_perush?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td><?=$row->jabatan?></td>
        </tr>
        <tr>
          <td>Jumlah Penghasilan</td>
          <td>:</td>
          <td><?=rupiah($row->jml_penghasilan)?></td>
        </tr>
        <tr>
          <th colspan="3" style="text-align: left;"><b>C. Data Permohonan</b></th>
        </tr>
        <tr>
          <td>Jenis Pinjaman</td>
          <td>:</td>
          <td><?=$row->jenis_pinjaman?></td>
        </tr>
        <tr>
          <td>Jangka Waktu</td>
          <td>:</td>
          <td><?=$row->jangka_waktu.' '.$row->jenis_pinjaman?></td>
        </tr>
        <tr>
          <td>Jumlah Permohonan</td>
          <td>:</td>
          <td><?=rupiah($row->jml_permohonan)?></td>
        </tr>
        <tr>
          <td>Tujuan Penggunaan</td>
          <td>:</td>
          <td><?=$row->tujuan_penggunaan?></td>
        </tr>
        <tr>
          <th colspan="3" style="text-align: left;"><b>D. Data Jaminan</b></th>
        </tr>
      </table>
      <?php $no=1;
      foreach ($jaminan->result() as $key => $data) {
        if ($data->user_id == $row->user_id) { ?>
          <table>
            <tr>
              <td>No: <?=$no?></td>
            </tr>
            <tr>
              <td>Nama Jaminan : <?=$data->nama_jaminan?></td>
            </tr>
            <tr>
              <td>Taksiran : <?=rupiah($data->taksiran)?></td>
            </tr>
            <tr>
              <td>Foto : <br>
              <img src="upload/foto/<?=$data->foto_jaminan?>" width="50%"></td>
            </tr>
          </table>
          <?php $no++;
        }
      } ?>

        <br>
        <left>
          <strong>Dicetak pada :</strong> <?=longdate_indo(date('Y-m-d')); ?> <br> <strong>Pukul :</strong> <?=date('H:i:s') ?>
        </left>
      </body>
