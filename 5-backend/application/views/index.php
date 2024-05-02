<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<?php $this->load->view("includes/head"); ?>

<body>
  <?php $this->load->view("includes/header"); ?>
  <?php $this->load->view("includes/sidebar"); ?>

  <main class="main-wrapper">
    <div class="main-content">
         <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0 py-1">Kontrol Paneli</h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-2">
                <a href="<?php echo base_url('Product_Category')?>" class="btn btn-primary btn-lg">Ürün Kategorileri<span class="badge bg-dark"></span></a>
              </div> 
              <div class="col-2">
                <a href="<?php echo base_url('Brands')?>" class="btn btn-danger btn-lg">Markalar<span class="badge bg-dark"></span></a>
              </div>
          </div>
         </div>
        </div>
    </div>
  </main>

   
   <div class="overlay btn-toggle"></div>
  
 <?php $this->load->view("includes/footer"); ?>