

<main class="main-wrapper">
    <div class="main-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kontrol Paneli</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">	
						</div>
					</div>
				</div>
        <!-- ICERIKKKK -->
		<div class="row">
          <div class="col-12 col-lg-12">
						<div class="card">
							<div class="card-body p-4">
								<form method="POST" action="<?php echo base_url("Product_Category/save") ?>">
								<h5 class="mb-4">Ürün Kategorisi Ekleme İşlemi</h5>
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Ürün Kategorisi Adı:</label>
										<div class="col-sm-9">
										<input type="text" name="title" class="form-control" id="title" placeholder="Ürün Kategorisinin Adını Giriniz.">
                       						 <?php if (isset($formError)) { ?>
                         				 <small><?php echo form_error("title"); ?></small>
                       					 <?php } ?>
										</div>
									</div>
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Ekle</button>
												<a href="<?php echo base_url("product_category")?>" type="button" class="btn btn-light px-4">İptal</a>
											</div>
										</div>
									</div>
							
										</div>
									</form>
						</div>

					
					  </div>
         </div>
        <!-- ICERIKKKK SONUUU -->

    </div>
  </main>
  