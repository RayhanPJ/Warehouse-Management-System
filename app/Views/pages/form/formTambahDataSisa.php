<?= $this->extend('layouts/tamplate'); ?>

<?= $this->section('content'); ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title"><?= $title; ?></h4>
                            <p class="sub-header">This <?= $title; ?></p>

                            <form action="/tambahSisa" method="post" class="needs-validation" novalidate>
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="no_rfq" class="form-label">No RFQ</label>
                                            <input type="text" class="form-control" id="no_rfq" placeholder="No RFQ" name="no_rfq_sisa" autofocus value="<?= $item['no_rfq']; ?>" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="no_wo" class="form-label">No WO</label>
                                            <input type="text" class="form-control" id="no_wo" placeholder="No WO" name="no_wo_sisa" value="<?= $item['no_wo']; ?>" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3" hidden>
                                    <label for="name_cust" class="form-label">Name Customer</label>
                                    <input type="text" class="form-control" id="name_cust" placeholder="Name Customer" name="name_cust_sisa" value="<?= $item['name_cust']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="code_qr" class="form-label">Code QR</label>
                                    <input type="text" class="form-control" id="code_qr" placeholder="Code_QR" name="code_qr_sisa" value="<?= $item['code_qr']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_item" class="form-label">Name Item</label>
                                            <input type="text" class="form-control" id="name_item" placeholder="Name Item" name="name_item_sisa" value="<?= $item['name_item']; ?>" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3" hidden>
                                    <label for="warehouse" class="form-label">Warehouse</label>
                                    <input type="text" class="form-control" id="warehouse" placeholder="Warehouse" name="warehouse_sisa" value="<?= $item['warehouse']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="lot_del" class="form-label">Lot Delivery</label>
                                    <input type="text" class="form-control" id="lot_del" placeholder="Lot Devlivery_sisa" name="lot_del_sisa" value="<?= $item['lot_del']; ?>"/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="no_sdf" class="form-label">No SDF</label>
                                    <input type="text" class="form-control" id="no_sdf" placeholder="No SDF" name="no_sdf_sisa" value="<?= $item['no_sdf']; ?>"/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="no_tag" class="form-label">No Tag</label>
                                    <input type="number" class="form-control" id="no_tag" placeholder="No_Tag" name="no_tag_sisa" value="<?= $item['no_tag']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="desc_pn" class="form-label">Description PN</label>
                                    <input type="text" class="form-control" id="desc_pn" placeholder="Description PN" name="desc_pn_sisa" value="<?= $item['desc_pn']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="bpid" class="form-label">BPID</label>
                                    <input type="text" class="form-control" id="bpid" placeholder="BPID" name="bpid_sisa" value="<?= $item['bpid']; ?>" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!-- just show location detail -->
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="qty" class="form-label">QTY</label>
                                            <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty_sisa" value="<?= $item['qty']; ?>" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="locationsDetail" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="locationsDetail" placeholder="Locations Detail" value="<?= $item['locations']; ?>.<?= $item['sub_locations']; ?>" required readonly />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- end just show location datail -->
                                <div hidden class="mb-3" >
                                    <label for="id_data" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="id_item" placeholder="id item" name="id_item" value="<?= $item['id_item']; ?>" required readonly />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="rack" class="form-label">Rack</label>
                                    <input type="text" class="form-control" id="rack" placeholder="Rack" name="rack_sisa" value="<?= $item['rack']; ?>" required readonly />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="locations" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="locations" placeholder="Locations" name="locations_sisa" value="<?= $item['locations']; ?>" required readonly />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="sub_locations" class="form-label">Sub Location</label>
                                    <input type="text" class="form-control" id="sub_locations" placeholder="Sub Locations" name="sub_locations_sisa" value="<?= $item['sub_locations']; ?>" required readonly />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                
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


    <?= $this->endSection(); ?>