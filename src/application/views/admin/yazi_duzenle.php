<?php $admin = $this->session->userdata("admin"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url("assets/a/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/css/sb-admin.css"); ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("yonetim/anasayfa"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Yazı Düzenle</li>
</ol>
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-sticky-note"></i> Yazı Düzenle</div>
<div class="card-body">
<form action="<?php echo base_url("admin/yazilar/duzenle/update/$yazilar->id"); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="yazar_id" value="<?php $user = $this->session->userdata("user"); echo $user["id"]; ?>">
<div class="form-group">
<label for="yazi_baslik">Başlık</label>
<input type="text" class="form-control" id="yazi_baslik" name="yazi_baslik" value="<?php echo $yazilar->yazi_baslik; ?>">
</div>
<div class="form-group">
<label for="yazi_baslik">Kısa URL (Boş bırakırsanız, otomatik olarak oluşturulur)</label>
<input type="text" class="form-control" id="yazi_url" name="yazi_url" value="<?php echo $yazilar->yazi_url; ?>">
</div>
<div class="form-group">
<label for="yazi_kategori">Kategori Seçiniz</label>
<select class="form-control" id="yazi_kategori" name="yazi_kategori">
<?php foreach ($list as $row) {
($row->id == $yazilar->kategori_id) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->kategori_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="etiket">Etiketler (Etiketi giriniz ve virgüle basınız)</label>
<input type="text" class="form-control" id="etiket" name="etiket" value="<?php echo html_escape($etikets); ?>">
</div>
<div class="form-group">
<label for="yazi_resim">Öne çıkan görsel</label>
<input type="file" class="form-control-file" id="yazi_resim" name="yazi_resim">
</div>
<div class="form-group">
<label for="yazi_icerik">Yazı İçeriği</label>
<textarea rows="5" class="form-control" id="yazi_icerik" name="yazi_icerik"><?php echo html_escape($yazilar->yazi_icerik); ?></textarea>
</div>
<div class="form-group">
<label for="yazi_durum">Onaylı mı?</label>
<select class="form-control" id="yazi_durum" name="yazi_durum">
<option value="1" <?php if($yazilar->yazi_durum=="1"){echo "selected";}; ?>>Onaylı</option>
<option value="0" <?php if($yazilar->yazi_durum=="0"){echo "selected";}; ?>>Onaysız</option>
</select>
</div>
<input type="hidden" name="id" value="<?php echo $yazilar->id; ?>">
<div class="form-group">
<button type="submit" class="btn btn-primary">Kaydet</button>
</div>
</form>
</div>
</div>
</div>
<footer class="sticky-footer">
<div class="container">
<div class="text-center">
<small>Copyright © Burak Dündar 2018</small>
</div>
</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view("admin/cikis_yap");?>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
<script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
<script>
CKEDITOR.replace('yazi_icerik', {
extraPlugins: 'syntaxhighlight'
});
</script>
</div>
</body>
</html>