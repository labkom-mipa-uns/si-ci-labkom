<html>
<title>List Alat Lab </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Alat Laboratorium </h1>
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"></i>
        Tambah Data Alat Lab
      </button>
      <div class="mb-3"></div>
      <table class="table" >
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Alat</th>
                          <th>Nama Alat</th>
                          <th>Harga Sewa</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <!--Fetch data dari database-->
                      <?php 
                       $i = $this->uri->segment(3)+1;
                      foreach ($data->result() as $row) :?>
                          <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row->id_alat; ?></td>
                              <td><?php echo $row->nama_alat; ?></td>
                              <td><?php echo $row->harga; ?></td>
                              <td>
                                  <?php echo anchor('C_Alat/delete_entry/'.$row->id_alat,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

                                  <?php echo anchor('C_Alat/edit/'.$row->id_alat,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                              </td> 

                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              <div class="row">
                  <div class="col">
                      <!--Tampilkan pagination-->
                      <?php echo $pagination; ?>
                  </div>
              </div>
    </section>

    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah  Data Alat Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'C_Alat/insert_entry'; ?>">
        

        <div class="form-group">
            <label > ID Alat</label>
            <input type="text" name="id_alat" class="form-control">
        </div>

        <div class="form-group">
            <label > Nama Alat</label>
            <input type="text" name="nama_alat" class="form-control">
        </div>

        <div class="form-group">
            <label > Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>



        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>

      </form>
    </div>
  </div>
</div>

</div>
</div>
</html>