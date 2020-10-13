<html>
<title>Edit Data Alat</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Alat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($alat as $row) {?>
            <form action="<?php echo base_url().'C_Alat/update' ?>" method="post">

                    <div class="form-group">
                        <label for=""> ID Alat</label>
                        <input type="hidden" name="id_alat" class="form-control"
                        value="<?php echo $row->id_alat;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->id_alat;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                    <div class="form-group">
                        <label for=""> Nama Alat</label>
                        <input type="Text" name="nama_alat" class="form-control"
                        value="<?php echo $row->nama_alat;?>">
                    </div>


                    <div class="form-group">
                        <label for=""> Harga</label>
                        <input type="Text" name="harga" class="form-control"
                        value="<?php echo $row->harga;?>">
                    </div>

                    
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>

            </form>

                  <?php } ?>
    </section>
</div>