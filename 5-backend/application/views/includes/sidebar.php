<aside class="sidebar-wrapper">
    <div class="sidebar-header">
    <div class="logo-icon" onclick="window.location.href='<?php echo base_url() ?>'">
    <img src="<?php echo base_url() ?>assets/images/logo-icon.png" class="logo-img" alt="">
</div>
<div class="logo-name flex-grow-1" onclick="window.location.href='<?php echo base_url() ?>'">
    <h5 class="mb-0">Admin</h5>
</div>

      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">
      
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Kontrol Paneli</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url("Product_Category") ?>"><i class="material-icons-outlined">arrow_right</i>Ürün Kategorileri</a>
              </li>
              <li><a href="<?php echo base_url("Brands") ?>"><i class="material-icons-outlined">arrow_right</i>Markalar</a>
              </li>
            </ul>
          </li>
          
         </ul>
        <!--end navigation-->
    </div>
    <div class="sidebar-bottom gap-4">
        <div class="dark-mode">
          <a href="javascript:;" class="footer-icon dark-mode-icon">
            <i class="material-icons-outlined">dark_mode</i>  
          </a>
        </div>
       
          

    </div>
</aside>