<style>
    .card-title-big {
        font-size: 2em;
    }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h1 class="card-title card-title-big">Marka Bilgileri</h1>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url("Brands/save") ?>" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Marka Logosu:</label>
                  <input class="form-control" name="img_url" type="file" id="formFile" required>
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Marka Adı:</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Marka Adını Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("title"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <label for="rank" class="form-label">Marka Sıralaması:</label>
                  <input type="number" name="rank" class="form-control" id="rank" placeholder="Marka Sıralamasını Giriniz">
                  <?php if (isset($formError)) { ?>
                    <small class="text-danger"><?php echo form_error("rank"); ?></small>
                  <?php } ?>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Ekle</button>
                  <a href="<?php echo base_url("Brands") ?>" type="button" class="btn btn-secondary">İptal</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
