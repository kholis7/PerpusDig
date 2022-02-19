  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Buku</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data E-Book</a></li>
        <li class="active">Data E-Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    <?php if($this->session->flashdata("Success")){ ?>
                        <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                            <span style="text-align: left;"><?php echo $this->session->flashdata("Success"); ?></span>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata("Error")){ ?>
                        <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                            <span style="text-align: left;"><?php echo $this->session->flashdata("Error"); ?></span>
                        </div>
                    <?php } ?>
                        <h3 class="box-title">Data E-Buku Perpustakaan</h3>
                    </div>
                    <div class="box-body">
                        <div class="pull-right">
                        <!-- <a href="<?php echo base_url() ?>laporan" class="btn btn-success"><i class="mdi mdi-plus-circle mr-2 fa fa-print"> </i> Cetak Laporan</a>     -->
                        <a href="<?php echo base_url() ?>Buku/buku_tambah" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2 fa fa-plus"> </i> Tambah E-Book</a>
                        <!-- <a data-toggle="modal" data-target="#TambahModal" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2 fa fa-plus"> </i> Tambah E-Book Dengan Modal</a> -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>NAMA BUKU</th>
                    <th>PENGARANG</th>
                    <th>PENERBIT</th>
                    <th>TAHUN</th>
                    <th>LINK</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($buku->result_array() as $data){
                        ?>
                    <tr>
                    <td><?php echo $data['nama_buku']; ?></td>
                    <td><?php echo $data['pengarang']; ?></td>
                    <td><?php echo $data['penerbit']; ?></td>
                    <td><?php echo $data['tahun']; ?></td>
                    <td><?php echo $data['link']; ?></td>
                    <td>
                        <span data-toggle="tooltip" data-original-title="Edit Data" style="font-size: 10;"> <a class="btn btn-warning" href="<?php echo base_url()?>Buku/buku_view/<?php echo $data['id_buku'];?>"><i class="fa fa-eye"></i></a></span>

                        <span data-toggle="tooltip" data-original-title="Edit Data" style="font-size: 10;"> <a class="btn btn-warning" href="<?php echo base_url()?>Buku/buku_edit/<?php echo $data['id_buku'];?>"><i class="fa fa-edit"></i></a></span>

                        <!-- <span data-toggle="tooltip" data-original-title="Edit Data Dengan Modal" style="font-size: 10;"> <a class="btn btn-info ubah_data" data-toggle="modal" data-target="#UbahModal"
                        data-nis="<?php echo $data['id_buku']; ?>"
                        data-nama_siswa="<?php echo $data['nama_buku']; ?>"
                        data-kelas="<?php echo $data['kelas']; ?>"
                        data-jurusan="<?php echo $data['jurusan']; ?>"
                        data-email="<?php echo $data['email']; ?>"><i class="fa fa-edit"></i></a></span> -->

                        <span data-toggle="tooltip" data-original-title="Hapus Data" style="font-size: 10;"> <a class="btn btn-danger" href="<?php echo base_url()?>Buku/delete/<?php echo $data['id_buku'];?>"><i class="fa fa-trash-o"></i></a></span>
                    </td>
                    </tr>
                    <?php }?>
                </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
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
