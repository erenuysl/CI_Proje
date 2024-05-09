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

    /* Şifre göster/gizle butonu simge rengi */
    .btn-toggle i {
        color: #6c757d;
    }

    .btn-toggle.active i {
        color: #007bff;
    }

    /* Labellar ile formlar arasındaki boşluk */
    .form-group.row {
        margin-bottom: 1.5rem;
    }

    .col-form-label {
        padding-top: calc(0.375rem + 1px);
        padding-bottom: calc(0.375rem + 1px);
        margin-bottom: 0;
        font-size: 1rem;
        line-height: 1.5;
    }

    .input-group {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        width: 100%;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title card-title-big">Kullanıcı Güncelleme Formu</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url("Users/new_pass/{$item->id}") ?>">
                                <div class="form-group row">
                                    <label for="old-password" class="col-sm-3 col-form-label form-label">Mevcut Şifre:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="old-password" id="old-password" placeholder="Mevcut Şifrenizi Giriniz">
                                            <button class="btn btn-outline-secondary btn-toggle" type="button" id="toggleOldPassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <?php if (isset($formError)) { ?>
                                            <small><?php echo form_error("old-password"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new-password" class="col-sm-3 col-form-label form-label">Yeni Şifre:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="new-password" id="new-password" placeholder="Yeni Şifrenizi Giriniz">
                                            
                                        </div>
                                        <?php if (isset($formError)) { ?>
                                            <small><?php echo form_error("new-password"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm-password" class="col-sm-3 col-form-label form-label">Şifre Tekrarı:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Yeni Şifreyi Tekrar Giriniz">
                                            
                                        </div>
                                        <?php if (isset($formError)) { ?>
                                            <small><?php echo form_error("confirm-password"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Onayla</button>
                                            <a href="<?php echo base_url("Users") ?>" type="button" class="btn btn-secondary px-4">İptal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#toggleOldPassword, #toggleNewPassword, #toggleRepeatPassword').on('click', function() {
            const passwordInput = $(this).closest('.input-group').find('input');
            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
