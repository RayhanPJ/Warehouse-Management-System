<?= $this->extend('layouts/tamplate'); ?>

<?= $this->section('content'); ?>

<!-- Begin page -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-box">
                            <h4 class="page-title">List Rack Items</h4>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Rack X</h4>
                                <div class="responsive-table-plugin mt-3">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 5; $i >= 1; $i--) : ?>
                                                        <tr>
                                                            <th>Rack X<?= $i ?></th>
                                                            <?php foreach ($item as $v) : ?>
                                                                <?php if ($v['rack'] === "X" && $v['locations'] == $v['rack'] . $i) : ?>
                                                                    <td>
                                                                        <?php if ($v['name_item_sisa'] == NULL) : ?>
                                                                            <a href="<?= $v['code_qr'] === '' || $v['code_qr'] === NULL ? '/input/' . $v['id_item'] : '/detail/' . $v['id_item'] ?>" class="btn btn-xs d-flex <?= $v['code_qr'] === '' || $v['code_qr'] === NULL ? 'btn-danger' : 'btn-success' ?> " aria-expanded="false">
                                                                                <?= $v['locations']; ?>.<?= $v['sub_locations']; ?><i class="mdi mdi-chevron-right"></i>
                                                                            </a>
                                                                        <?php else : ?>
                                                                            <a href="/detail/<?= $v['id_item']; ?>" class="btn btn-xs d-flex btn-success " aria-expanded="false">
                                                                                <?= $v['locations']; ?>.<?= $v['sub_locations']; ?><i class="mdi mdi-chevron-right"></i>
                                                                            </a>
                                                                        <?php endif ?>
                                                                    </td>
                                                                <?php endif ?>
                                                            <?php endforeach ?>
                                                        </tr>
                                                    <?php endfor ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive -->

                                    </div> <!-- end .table-rep-plugin-->
                                </div> <!-- end .responsive-table-plugin-->

                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end row-->


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Warehouse Management System by <a href="">RayhanPJ</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<?= $this->endSection(); ?>