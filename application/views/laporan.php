  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Laporan</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                            <h3 class="box-title">Data Laporan Perpustakaan Digital</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>JENIS LAPORAN</th>
                                    <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laporan Data Anggota</td>
                                    <td>
                                        <span data-toggle="tooltip" data-original-title="Cetak Data" style="font-size: 10;"> <a class="btn btn-success" href="<?php echo base_url()?>laporan/laporan_anggota"><i class="fa fa-print"></i></a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Laporan Data E-Book</td>
                                    <td>
                                        <span data-toggle="tooltip" data-original-title="Cetak Data" style="font-size: 10;"> <a class="btn btn-success" href="<?php echo base_url()?>laporan/laporan_buku"><i class="fa fa-print"></i></a></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
        reserved.
    </footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->