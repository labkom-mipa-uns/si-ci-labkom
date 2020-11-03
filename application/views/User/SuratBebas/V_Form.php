        <section class="page-section" >
            <div class="container mt-4">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formulir Pembuatan Surat Bebas Lab</h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
                        <form method="post"   action="<?php echo base_url().'User/C_SuratBebas/insert_entry'; ?>" >

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control"  placeholder="contoh M311xxxx">
                                </div>
                                <div class="form-group col-md-6">
                                <label >Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"  placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label >Angkatan</label>
                                <input type="text" name="angkatan" class="form-control"  placeholder="Contoh : 2018 ">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Program  Studi</label>
                                <?php  
                                            $option = array(

                                                    'D3-Farmasi' => 'D3-Farmasi',
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
                                            echo form_dropdown('prodi', $option, '', 'class="form-control "');
                                            ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label >Alamat Email</label>
                                <input type="text" class="form-control" name="email" placeholder="youremailexambple@.com">
                            </div>

                            <div class="form-group">
                                <label>Nomor WhatsApp </label>
                                <input type="text" class="form-control" name="no_wa"  placeholder="Masukan Nomor WhatsApp ">
                            </div>

                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                            <button type="reset" class="btn btn-danger" >Reset</button>

                            <?php
                                    setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                                    $date = strftime( "%d %B %Y" , time());
                                    ?>
                                    <input type="hidden" name="tanggal" class="form-control" value="<?php echo $date ?>">

                        </form>

                        </div>
        </section> 
