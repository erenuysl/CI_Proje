<style>
    .card-title-big {
        font-size: 2em;
    }
    .form-label {
        font-weight: bold;
    }
    .btn-group {
        margin-top: 10px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
               
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title card-title-big">Kullanıcı Güncelleme Formu</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?php echo base_url("Users/update/$item->id") ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label form-label">Kullanıcı Adı:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($formError) ? set_value("email") : $item->email; ?>" placeholder="Kullanıcı Adını Giriniz">
                                        <?php if (isset($formError)) { ?>
                                            <small class="text-danger"><?php echo form_error("email"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label form-label">İsim:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>" placeholder="Adınızı Giriniz">
                                        <?php if (isset($formError)) { ?>
                                            <small class="text-danger"><?php echo form_error("name"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="surname" class="col-sm-3 col-form-label form-label">Soyisim:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="surname" id="surname" value="<?php echo isset($formError) ? set_value("surname") : $item->surname; ?>" placeholder="Soyadınızı Giriniz">
                                        <?php if (isset($formError)) { ?>
                                            <small class="text-danger"><?php echo form_error("surname"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 d-flex justify-content-between align-items-center mb-3">
                <div class="d-md-flex d-grid align-items-center gap-3">
                  <button type="submit" class="btn btn-primary px-4">Kaydet</button>
                  <a href="<?php echo base_url("Users") ?>" type="button" class="btn btn-danger px-4">İptal</a>
                </div>
                <a href="<?php echo base_url("Users/update_pass/{$item->id}") ?>" class="btn btn-secondary px-4">Şifre Değiştir</a>
              </div>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
