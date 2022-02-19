
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Tambah Data Pelajar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pelajar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url() ?>Buku/add" method="POST">
              <div class="box-body">
              <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="nama_buku" placeholder="Masukan judul Buku">
                </div>
                <div class="form-group">
                    <label>Nama Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" placeholder="Masukan Nama Pengarang">
                </div>
                <div class="form-group">
                    <label>Nama Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" placeholder="Masukan Nama Penerbit">
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" class="form-control" name="tahun" placeholder="Masukan Tahun Terbit">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Masukan Link E-Book">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
