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
  <section class="content ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title card-title-big">Ürün Kategorisi Bilgileri</h3>
            </div>
            <form class="form-horizontal " method="POST" action="<?php echo base_url("Product_Category/update/$item->id") ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Ürün Kategorisi Adı:</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo isset($formError) ? set_value("title") : $item->title; ?>" placeholder="Ürün Kategorisinin Adını Giriniz">
                    <br>
                    <?php if (isset($formError)) { ?>
                      <small class="text-danger"><?php echo form_error("title"); ?></small>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <a href="<?php echo base_url("Product_Category") ?>" class="btn btn-secondary ">Vazgeç</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
