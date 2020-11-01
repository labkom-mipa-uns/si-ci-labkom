        <!-- About-->
<section class="page-section mt-3" id="contact" >
    <div class="container mt-4">    
    <div class="card card-responsive mx-auto" style="width: auto;">
              <div class="card-body">
              <h3 class="mb-5" align="center"> Details Peminjaman Ruang Lab </h3>
              <div class="table-responsive">
              <table class="table table-striped mx-auto "  >     

                    <tr>
                            <td>ID Peminjaman  </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->id_pinjam_ruang ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>NIM </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->nim ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->nama_lengkap ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Program Studi</td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->prodi ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>E-Mail </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->email ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Nomor WhatsApp</td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->no_wa ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                    <tr>
                            <td>ID Laboratorium </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->id_lab ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Laboratorium </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->nama_lab ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Tanggal Pinjam </td>
                            <?php 
                            setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');

                            foreach ($p_lab as $row) { ?>
                            <td> : <?php echo strftime( " %A %d %B %Y " , strtotime($row->tanggal));?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Pinjam </td>
                            <?php foreach ($p_lab as $row) { ?>
                                <td> : <?php echo date("H.i", strtotime($row->jam_pinjam))?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Kembali </td>
                            <?php foreach ($p_lab as $row) { ?>
                                <td> : <?php echo date("H.i", strtotime($row->jam_kembali))?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Keperluan </td>
                            <?php foreach ($p_lab as $row) { ?>
                            <td> : <?php echo $row->keperluan ?></td>
                            <?php } ?>
                    </tr>
              </table>
                            <div align="center" class="mt-5 ">     
                              <?php echo anchor('C_PinjamRuang/word/'.$row->id_pinjam_ruang,'<div class="btn btn-primary btn-sm">DOWNLOAD DOKUMEN</div>') ?>
                            </div>
                    
              </div>
              </div>
            </div>
    </div>
</section>
