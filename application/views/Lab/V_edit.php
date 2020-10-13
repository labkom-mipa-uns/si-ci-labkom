<html>
<title>Edit Data Lab</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($lab as $row) {?>
            <form action="<?php echo base_url().'C_Lab/update' ?>" method="post">

                    <div class="form-group">
                        <!-- <label for=""> ID Siswa</label> -->
                        <input type="hidden" name="id_lab" class="form-control"
                        value="<?php echo $row->id_lab;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->id_lab;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                      <div class="form-group">
                        <label for=""> Nama Laboratorium</label>
                        <input type="text" name="nama_lab" class="form-control"
                        value="<?php echo $row->nama_lab;?>" >
                    </div>



                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>

            </form>

                  <?php } ?>
    </section>
</div>