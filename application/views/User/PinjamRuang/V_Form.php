        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formullir Peminjaman Ruang Lab</h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
            <form method="post"   action="<?php echo base_url().'User/C_PinjamRuang/insert_entry'; ?>" >
                
                <div class="form-group row">
                        <label class="text-white"> NIM </label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukan NIM ">
                </div>

                <div class="form-group row">   
                        <label class="text-white"> Nama Lengkap </label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap ">
                </div>

                <div class="form-group row">
                        <label class="text-white"> Angkatan </label>
                        <input type="text" name="angkatan" class="form-control" placeholder="Masukan Angkatan Anda ">
                </div>


                <div class="form-group row">
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
                      echo form_dropdown('prodi', $option, '', 'class="form-control "');
                    ?>
                </div>

                <div class="form-group row">
                        <label class="text-white"> Alamat Email </label>
                        <input type="text" name="email" class="form-control" placeholder="Masukan Alamat Email ">
                </div>

                <div class="form-group row">
                        <label class="text-white"> Nomor WhatsApp </label>
                        <input type="text" name="no_wa" class="form-control" placeholder="Masukan Nomor WhatsApp ">
                </div>

                <div class="form-group row">
                <div class="col-xs-3">
                    <label class="text-white"> Tanggal Pinjam </label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
                </div>

                <div class="form-group row">
                <label class="text-white"> Ruang Laboratorium </label>
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

                <div class="form-group row">
                    <label class="text-white"> Jam Mulai </label>
                    <input type="time" name="jam_pinjam" class="form-control"placeholder="Jam Mulai" >
                </div>

                <div class="form-group row">
                    <label class="text-white"> Jam Selesai </label>
                    <input type="time" name="jam_kembali" class="form-control" placeholder="Jam Selesai" >
                </div>

                <div class="form-group row">
                    <textarea class="form-control" name="keperluan" rows="4" placeholder="Keperluan Meminjam Ruang Lab"></textarea>      
                </div>
                    
                    
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </form>
                        </div>
        </section> 
