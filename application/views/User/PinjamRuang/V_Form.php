        <section class="page-section" id="">
            <div class="container mt-3">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formulir Peminjaman Ruang Lab</h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
                <form method="post"   action="<?php echo base_url().'User/C_PinjamRuang/insert_entry'; ?>" >

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
                    
                    <div class="form-group">
                    <label > Ruang Laboratorium </label>
                                    <?php  
                                    $queryLab=$this->M_PinjamRuang->get_lab();
                                    $option = array();
                                    foreach ($queryLab->result() as $row)
                                    {
                                            $option[$row->id_lab]=$row->nama_lab;
                                    }
                                    echo form_dropdown('id_lab', $option, '', 'class="form-control"');
                                    ?>
                     </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                        <label >Jam Mulai</label>
                        <input type="time" name="jam_pinjam" class="form-control"placeholder="Jam Mulai" >
                        </div>

                        <div class="form-group col-md-3">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_kembali" class="form-control" placeholder="Jam Selesai" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keperluan</label>
                        <textarea class="form-control" name="keperluan" rows="4" placeholder="Keperluan Meminjam Ruang Lab"></textarea>      
                    </div>

                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                    <button type="reset" class="btn btn-danger" >Reset</button>
                </form>
                </div>
        </section> 


