<!doctype html>
<html lang="tr">
<?php $this->load->view("includes/head"); ?>


<body>

  <?php $this->load->view("includes/header"); ?>
  


  <?php $this->load->view("includes/sidebar"); ?>

  <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
   
    <div class="overlay btn-toggle"></div>
 <?php $this->load->view("includes/footer"); ?>