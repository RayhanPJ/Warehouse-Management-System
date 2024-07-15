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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">List Data Warehouse</h4>
                                <a href="/export" class="btn btn-success btn-sm my-1"><i class="fas fa-file-excel"></i> Download</a>
                                <div class="table-responsive" data-pattern="priority-columns">

                                    <table id="demo-custom-toolbar" data-toggle="table" data-toolbar="#demo-delete-row" data-search="true" data-sort-name="id" data-page-list="[5, 20, 50]" data-page-size="50" data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                                        <thead class="table-light">
                                            <tr class="text-center">
                                                <th>NO</th>
                                                <th>ID</th>
                                                <th>CUSTOMER</th>
                                                <th>ITEM</th>
                                                <th>NO RFQ</th>
                                                <th>NO WO</th>
                                                <th>NO SDF</th>
                                                <th>QTY</th>
                                                <th>LOT DELIVERY</th>
                                                <th>LOCATION</th>

                                            </tr>

                                        </thead>


                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($item as $v) : ?>
                                                <?php if (!empty($v['no_rfq'] && $v['no_wo'])) : ?>
                                                    <tr class="text-center">
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $v['id']; ?></td>
                                                        <?php if ($v['name_cust'] == "") : ?>
                                                            <td>AOP Domestik</td>
                                                        <?php else : ?>
                                                            <td><?= $v['name_cust']; ?></td>
                                                        <?php endif ?>
                                                        <td><?= $v['name_item']; ?></td>
                                                        <td><?= $v['no_rfq']; ?></td>
                                                        <td><?= $v['no_wo']; ?></td>
                                                        <td><?= $v['no_sdf']; ?></td>
                                                        <td><?= $v['qty']; ?></td>
                                                        <td><?= $v['lot_del']; ?></td>
                                                        <td><?= $v['locations']; ?>.<?= $v['sub_locations']; ?></td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>

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