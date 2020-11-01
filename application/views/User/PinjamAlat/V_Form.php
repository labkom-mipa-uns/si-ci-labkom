        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formulir Peminjaman Alat  </h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
            <form method="post"   action="<?php echo base_url().'User/C_PinjamAlat/insert_entry'; ?>" >
                
                <div class="form-group">
                        <label class="text-white"> NIM </label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukan NIM ">
                </div>

                <div class="form-group">   
                        <label class="text-white"> Nama Lengkap </label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap ">
                </div>

                <div class="form-group">
                        <label class="text-white"> Angkatan </label>
                        <input type="text" name="angkatan" class="form-control" placeholder="Masukan Angkatan Anda ">
                </div>


                <div class="form-group">
                <label class="text-white"> Program Studi </label>

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
                    <label class="text-white"> Alamat Email </label>
                    <input type="text" name="email" class="form-control" placeholder="Masukan Alamat Email ">
                </div>

                <div class="form-group">
                    <label class="text-white"> Nomor WhatsApp </label>
                    <input type="text" name="no_wa" class="form-control" placeholder="Masukan Nomor WhatsApp ">
                </div>
                
                <div class="form-group">
                    <label class="text-white"> Alat  </label>
                    <?php  
                    $queryAlat=$this->M_PinjamAlat->get_alat();
                    $option = array();
                    foreach ($queryAlat->result() as $row)
                    {
                            $option[$row->id_alat]=$row->nama_alat;
                    }
                    echo form_dropdown('id_alat', $option, '', 'class="form-control"');
                    ?>
                </div>

                <div class="form-group">
                    <label class="text-white">Jumlah Alat </label>
                    <input type="text" name="jumlah_alat" class="form-control">
                </div>


                <div class="form-group">
                    <label class="text-white"> Tanggal Pinjam </label>
                    <input type="date" name="tanggal_pinjam" class="form-control">
                </div>

                <div class="form-group">
                    <label class="text-white"> Tanggal Kembali </label>
                    <input type="date" name="tanggal_kembali" class="form-control">
                </div>

                <div class="form-group">
                    <label class="text-white"> Waktu Mulai </label>
                    <input type="time" name="jam" class="form-control">
                </div>

                <div class="form-group">
                    <label class="text-white"> Tempat  </label>
                    <input type="text" name="tempat" class="form-control">
                </div>


                <div class="form-group">
                    <label class="text-white"> Keperluan Meminjam</label>
                    <textarea class="form-control" name="keperluan" rows="4" placeholder="Contoh : 'Untuk Seminar TA di Gd.A FMIPA UNS'"></textarea>      
                </div>

                <input type="hidden" name="status" class="form-control" value="Belum Lunas">
                    
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </form>
                        </div>
        </section> 
