<?php if ($this->session->has_userdata('success')) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Horay!</strong> <?=$this->session->flashdata('success');?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<p></p>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Waduch!</strong> <?=$this->session->flashdata('error');?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<p></p>
<?php } ?>
