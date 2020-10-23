        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pembuatan Surat Bebas Lab</h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
            <form method="post"   action="<?php echo base_url().'User/C_SuratBebas/insert_entry'; ?>" >
                
                <div class="form-group">
                        <input type="text" name="nim" class="form-control" placeholder="Masukan NIM ">
                </div>

                <div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap ">
                </div>

                <div class="form-group">
                        <input type="text" name="angkatan" class="form-control" placeholder="Masukan Angkatan Anda ">
                </div>


                <div class="form-group">
                    <?php  
                      $option = array(

                            'D3-Kimia' => 'D3-Kimia',
                            'D3-Teknik Informatika' => 'D3-Teknik Informatika',
                            'S1-Matematika' => 'S1-Matematika',
                            'S1-Fisika' => 'S1-Fisika',
                            'S1-Informatika' => 'S1-Informatika',
                            'S1-Statistika' => 'S1-Statistika',
                            'S1-Informatika' => 'S1-Informatika',
                            'S1-Biologi' => 'S1-Biologi',
                            'S1-Farmasi' => 'S1-Farmasi',
                            'S1-Kimia' => 'S1-Kimia',
                            'S1-Ilmu Lingkungan' => 'S1-Ilmu Lingkungan',
                            'S2-Fisika' => 'S2-Fisika',
                            'S2-Biosains' => 'S2-Biosains',
                            'S2-Kimia' => 'S2-Kimia'

                      );
                      echo form_dropdown('prodi', $option, '', 'class="form-control"');
                    ?>
                </div>

                <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Masukan Alamat Email ">
                </div>

                <div class="form-group">
                        <input type="text" name="no_wa" class="form-control" placeholder="Masukan Nomor WhatsApp ">
                </div>




                
                <div class="form-group">
                    <?php
                          setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                          $date = strftime( "%d %B %Y" , time());
                          ?>
                        <!-- <label >Tanggal </label> -->
                        <input type="hidden" name="tanggal" class="form-control" value="<?php echo $date ?>">
                    </div>
                    
                    
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </form>
                        </div>
        </section> 
