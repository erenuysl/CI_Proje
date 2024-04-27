

<main class="main-wrapper">
    <div class="main-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">eCommerce</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
        <!-- ICERIKKKK -->
		
		<h6 class="mb-0 text-uppercase">Ürün Kategorileri</h6>
		
				<hr>
				<div class="pb-3 d-grid gap-2 d-md-flex justify-content-md-end">
				<a href="<?php echo base_url("Product_Category/new_form")?>" type="button" class="btn btn-success px-4 raised d-flex gap-2  text-right " >Kategori Ekle</a></div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									<th>ID</th>
                       			 <th>Ürün Kategorisi</th>
                    	    <th>Durum</th>
                     	   <th>Oluşturma Tarihi</th>
                  	      <th>İşlemler</th>
										</tr>
								</thead>
								<tbody>
								<?php foreach ($items as $item) {  ?>
                        <tr>
                          <td><?php echo $item->id; ?></td>
                          <td><?php echo $item->title; ?></td>
                          <td><?php echo $item->is_active == 0 ? "Pasif" : "Aktif"; ?></td>
                          <td><?php echo dateTimeFormat($item->created_at); ?></td>
                          <td>
                            <a href="<?php echo base_url("Product_Category/delete/$item->id") ?>" class="btn btn-danger"> Sil </a>
                            <a href="<?php echo base_url("Product_Category/update_form/$item->id"); ?>" class="btn btn-info text-light"> Güncelle </a>
                          </td>
                        </tr>
                      <?php } ?>
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
    </div>
  </main>
  