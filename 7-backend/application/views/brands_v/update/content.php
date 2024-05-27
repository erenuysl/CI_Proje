<style>
    .section-title {
        color: black;
    }

    .form-label {
        color: black;
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
            <div class="col-sm-6">
          <h3 class="m-0 text-dark">Ürün Kategorisi Güncelleme İşlemi</h3>
        </div>
            </div>
            <form method="POST" action="<?php echo base_url("Brands/update/$item->id") ?>" enctype="multipart/form-data">
              <div class="card-body">
               
                <div class="form-group row">
                  <label for="formFile" class="col-sm-3 col-form-label form-label">Marka Logosu:</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="img_url" type="file" id="formFile">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input35" class="col-sm-3 col-form-label form-label">Marka Adı:</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo isset($formError) ? set_value("title") : $item->title; ?>" placeholder="Marka Adını Giriniz">
                    <?php if (isset($formError)) { ?>
                      <small class="text-danger"><?php echo form_error("title"); ?></small>
                    <?php } ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input35" class="col-sm-3 col-form-label form-label">Marka Sıralaması:</label>
                  <div class="col-sm-9">
                    <input type="number" name="rank" class="form-control" id="rank" value="<?php echo isset($formError) ? set_value("rank") : $item->rank; ?>" placeholder="Marka Sıralamasını Giriniz">
                    <?php if (isset($formError)) { ?>
                      <small class="text-danger"><?php echo form_error("rank"); ?></small>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary px-4">Kaydet</button>
                <a href="<?php echo base_url("Brands") ?>" class="btn btn-secondary px-4">Vazgeç</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
