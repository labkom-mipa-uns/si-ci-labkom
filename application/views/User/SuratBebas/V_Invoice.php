        <!-- About-->
<section class="page-section mt-3" id="contact" >
    <div class="container mt-4">    
            <div class="card card-responsive mx-auto" style="width: auto;">
              <div class="card-body">
              <h3 class="mb-5" align="center"> Details Pengajuan Surat Bebas Labkom</h3>
              <div class="table-responsive">
              <table align ="center" class="table table-striped mx-auto  "  >     
                
                    <tr>
                            <td>ID Surat  </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->id_surat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>NIM </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->nim ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->nama_lengkap ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Program Studi</td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->prodi ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>E-Mail </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->email ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Nomor WhatsApp</td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->no_wa ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Tanggal Pembuatan Surat </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->tanggal ?></td>
                            <?php } ?>
                    </tr>


                    
              </table>
                            <div align="center" class="mt-5 ">     
                              <?php echo anchor('https://wa.me/+6285331318280?text='.$row->nim.'_Konfirmasi_PengajuanSuratBebasLab_'.$row->prodi,'<div class="btn btn-success btn">Konfirmasi Pengajuan Surat</div>') ?>
                            </div>
                    
              </div>
              </div>
            </div>
    </div>
</section>
