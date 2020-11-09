<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Catatan kelemahan untuk halaman ini yang belum diperbaiki:
 * belum mengenkripsi data yang digunakan untuk searching, dan belum memetakan siapa pengguna berhak dan siap yang men-search.
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="<?php echo base_url('/dashboard/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('/public/mamba/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/dashboard/css/sb-admin-2.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/asset_search/css/main.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('/public/vendor3.4.1/jquery/3.4.1/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/public/vendor3.4.1/bootstrap/3.4.1/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('/dashboard/js/sb-admin-2.min.js');?>"></script>
  </head>
  <body>
  <?php $user_tamu = $this->session->userdata('user_frontoffice_pegawai'); ?>
    <div id=penampil_tabel_header align="center" style='padding:15px;width:100%;overflow:none;height:50px;min-height:80px;background-image:none;background-color:#79787A;'></div>
    <div class="s131">
    <center>
      <div id='pra_tabel' style='width:40%;display:none;' align='center' >
        <i class='fa-3x fas fa-spinner fa-pulse' <?php echo $this->config->item('style_progres_bulat_admin');?>></i>
      </div>
    </center>
    <div id=penampil_tabel align="center" style='width:100%;overflow:auto;'>
      <form>
        <div class="inner-form" style="opacity:0.6;">
          <div class="input-field first-wrap" >
            <input id="nilai_kolom_cari_search" type="text" placeholder="Masukkan kata kunci..." />
          </div>
          <div class="input-field first-wrap">
            <div class="input-select" id="penampung_select">
              <select class="form-control" id="kolom_cari_search" style="height:68px; width:100%; border:1px solid #e5e5e5;border-radius:0;">
                <option placeholder=""><i class='fa-3x fas fa-spinner fa-pulse' <?php echo $this->config->item('style_progres_bulat_admin');?>></i></option>
              </select>
            </div>
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="button" id="btn_search">SEARCH</button>
          </div >
          <div class="input-field third-wrap">
            <a href="<?php echo site_url('login_search/Logintamupegawai_search/logout_pegawai') ?>" ><button id="button_back" class="btn btn-search" type="button" style="padding-left:30px; padding-right:30px; white-space:nowrap;font-size:20px;color:#fff;font-weight:300;transition:all .2s ease-out, color .2s ease-out;cursor:pointer;height:68px;background-color:#2D62D3; width:100%; border:1px solid #2D62D3;border-radius:0;">LOGOUT</button></a>
          </div>
          <style>
          #penampil_tabel_header{
            display:none;
          }
          @media screen and (max-width: 480px) {
            #button_back{
              margin-top:15px;
            }
          }
          </style>
        </div>
      </form>
      </div><!--penampil_tabel-->
    </div>
    <?php //alert("OK INI BARU: ".$user_tamu['username']);?>
    <script>        
      $(document).ready(function(){
        var tampilkan_select = $("#penampung_select");
        $.post('<?php echo $this->config->item('bank_data')."/index.php/Frontoffice/penarik_nama_field_tabel_log_surat_masuk_pegawai_internal/".$user_tamu['username'];?>',{ data:"okbro"},
        function(data,status){
          tampilkan_select.html(data);
          tampilkan_select.fadeIn(2000);
        });
      });

      $(document).ready(function(){
        $("#btn_search").click(function(){
          var loading = $("#pra_tabel");
          var tampilkan = $("#penampil_tabel");
          var tampilkan_header = $("#penampil_tabel_header");
          var limit=100;
          var page=1;
          var page_awal=1;
          var jumlah_page_tampil=4;
          var nilai_kolom_cari = $("#nilai_kolom_cari_search").val();
          var kolom_cari = $("#kolom_cari_search").val();
          var nip=idtamu_search;
          //alert(nip);
          //alert('nilai kolom cari: '+nilai_kolom_cari+'  kolom_cari: '+kolom_cari+' limit: '+limit+' page: '+page+' page_awal: '+page_awal+' jumlah_page_tampil: '+jumlah_page_tampil);
          tampilkan.hide();
          tampilkan_header.hide();
          loading.fadeIn(); 
          $.post('<?php echo site_url('/Frontoffice/tombol_kembali_dan_logout_internal');?>',{ data:"okbro"},
          function(data,status){
            tampilkan_header.html(data);
            tampilkan_header.fadeIn(2000);
          });

          if(kolom_cari=="nip"){                                                                                                                                                              
              $.post('<?php echo $this->config->item('bank_data')."/index.php/Frontoffice/tampil_tabel_cruid_new_verifikasi_untuk_log_surat_masuk_tamu_pegawai_khusus/log_surat_masuk/idlog_masuk/desc/";?>'+limit+'/'+page+'/'+page_awal+'/'+jumlah_page_tampil+'/TRUE/'+kolom_cari+'/<?php echo $user_tamu['username'];?>/<?php echo $user_tamu['username'];?>',{ data:"okbro"},
              function(data,status){
                loading.fadeOut();
                tampilkan.html(data);
                tampilkan.fadeIn(2000);
              });
            }else {                                                                                                                                                              
              $.post('<?php echo $this->config->item('bank_data')."/index.php/Frontoffice/tampil_tabel_cruid_new_verifikasi_untuk_log_surat_masuk_tamu_pegawai_khusus/log_surat_masuk/idlog_masuk/desc/";?>'+limit+'/'+page+'/'+page_awal+'/'+jumlah_page_tampil+'/TRUE/'+kolom_cari+'/'+nilai_kolom_cari+'/<?php echo $user_tamu['username'];?>',{ data:"okbro"},
              function(data,status){
                loading.fadeOut();
                tampilkan.html(data);
                tampilkan.fadeIn(2000);
              });
            }
                
          
        });
      });

    </script> 

    <script src="<?php echo base_url('/dashboard/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('/dashboard/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?php echo base_url('/public/asset_search/js/extention/choices.js');?>"></script>
    <!--
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false
      });

    </script>
    -->
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
