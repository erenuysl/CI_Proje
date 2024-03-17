<!doctype html>
<html lang="tr" data-bs-theme="dark">

<head>
  <?php $this->load->view("includes/head");?>
</head>

<body>

  <!--start header-->
  <?php $this->load->view("includes/header");?>

  <!--end top header-->


  <!--start sidebar-->
  <?php $this->load->view("includes/sidebar");?>

<!--end sidebar-->


  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="row">
					<div class="col-xl-12">
						<h6 class="mb-0 text-uppercase">Ürünler Tablosu</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
                    <th>ID</th>
                    <th>Resim URL</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Rank</th>
                    <th>Durum</th>
                    <th>Oluşturma Tarihi</th>
                    <th>İşlemler</th>
										</tr>
									</thead>
									<tbody>
                  <?php foreach ($items as $items) { ?>
                      <tr>
                        <td><?php echo $items->id; ?> </td>
                        <td><?php echo $items->img_url; ?></td>
                        <td><?php echo $items->title; ?></td>
                        <td><?php echo $items->description; ?></td>
                        <td><?php echo $items->rank; ?></td>
                        <td><?php echo $items->is_active == 0 ? "Pasif" : "Aktif"; ?></td>
                        <td><?php echo $items->created_at; ?></td>
                        <td>Sil - Düzenle </td>
                      </tr>

                    <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
				<!--end breadcrumb-->


      <!--end row-->

    </div>
  </main>
  <!--end main wrapper-->

  <!--start overlay-->
    <div class="overlay btn-toggle"></div>
  <!--end overlay-->

 <!--start footer-->
 <footer class="page-footer">
  <p class="mb-0">Copyright © 2023. All right reserved.</p>
</footer>
<!--top footer-->

  <!--start cart-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart">
    <div class="offcanvas-header border-bottom h-70">
      <h5 class="mb-0" id="offcanvasRightLabel">8 New Orders</h5>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body p-0">
      <div class="order-list">
        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/01.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">White Men Shoes</h5>
            <p class="mb-0 order-price">$289</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/02.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Red Airpods</h5>
            <p class="mb-0 order-price">$149</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/03.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Men Polo Tshirt</h5>
            <p class="mb-0 order-price">$139</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/04.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Blue Jeans Casual</h5>
            <p class="mb-0 order-price">$485</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/05.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Fancy Shirts</h5>
            <p class="mb-0 order-price">$758</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/06.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Home Sofa Set </h5>
            <p class="mb-0 order-price">$546</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/07.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Black iPhone</h5>
            <p class="mb-0 order-price">$1049</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="<?php echo base_url() ?>uploads/images/orders/08.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Goldan Watch</h5>
            <p class="mb-0 order-price">$689</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas-footer h-70 p-3 border-top">
      <div class="d-grid">
        <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas">View Products</button>
      </div>
    </div>
  </div>
  <!--end cart-->

  <!--start switcher-->
 
  <!--start switcher-->


  <!--bootstrap js-->
  <script src="<?php echo base_url() ?>uploads/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="<?php echo base_url() ?>uploads/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?php echo base_url() ?>uploads/js/index.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/peity/jquery.peity.min.js"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="<?php echo base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?php echo base_url() ?>uploads/js/main.js"></script>


</body>

</html>