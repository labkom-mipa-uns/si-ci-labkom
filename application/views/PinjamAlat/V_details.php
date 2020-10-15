<html>
<title>Details Peminjaman Alat </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
            <div class="card mx-auto" style="width: 50rem;">
              <div class="card-body">
              <h3 class="mb-5" align="center"> Details Peminjaman Alat</h3>
              <table class="table table-striped mx-auto" >     

                    <tr>
                            <td>ID Pinjam Alat </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->id_pinjam_alat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>NIM </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->nim ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->nama_lengkap ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Program Studi</td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->prodi ?></td>
                            <?php } ?>
                    </tr>


                    
                    <tr>
                            <td>ID Alat </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->id_alat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Tanggal Pinjam </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->tanggal_pinjam ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Tanggal Kembali </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->tanggal_kembali ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama Alat </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->nama_alat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Harga Sewa Alat </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->harga ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jumlah Alat </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->jumlah_alat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Total Harga </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->total_harga ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Status </td>
                            <?php foreach ($p_alat as $row) { ?>
                            <td> : <?php echo $row->status ?></td>
                            <?php } ?>
                    </tr>


                    
              </table>
                            <div align="center" class="mt-5 ">     
                              <?php echo anchor('C_PinjamAlat','<div class="btn btn-primary btn-sm">KEMBALI</div>') ?>
                              <?php echo anchor('C_PinjamAlat/edit/'.$row->id_pinjam_alat,'<div class="btn btn-info btn-sm">EDIT</div>') ?>
                              <?php echo anchor('C_PinjamAlat/delete_entry/'.$row->id_pinjam_alat,'<div class="btn btn-danger btn-sm">HAPUS</div>') ?>
                            </div>
                    
              </div>
            </div>

        </section>

    



</div>
</div>
</html>