<style>
    .card-title-big {
        font-size: 2em;
    }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title card-title-big">Yeni Kullanıcı Ekle</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url("Users/save") ?>" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="email" class="form-label">Kullanıcı Adı:</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($formError) ? set_value("email") : ""; ?>" placeholder="Kullanıcı Adını Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("email"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">İsim:</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($formError) ? set_value("name") : ""; ?>" placeholder="Adınızı Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("name"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <label for="surname" class="form-label">Soyisim:</label>
                  <input type="text" class="form-control" name="surname" id="surname" value="<?php echo isset($formError) ? set_value("surname") : ""; ?>" placeholder="Soyadınızı Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("surname"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Şifre:</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Şifrenizi Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("password"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <label for="re-password" class="form-label">Şifre Tekrarı:</label>
                  <input type="password" class="form-control" name="re-password" id="re-password" placeholder="Şifrenizi Tekrar Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("re-password"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Ekle</button>
                  <a href="<?php echo base_url("Users") ?>" type="button" class="btn btn-light">İptal</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
