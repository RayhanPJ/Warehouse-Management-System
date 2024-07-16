<?= $this->extend('layouts/tamplate'); ?>

<?= $this->section('content'); ?>
<?php
$uniqueRack = [];
$uniqueLoc = [];


foreach ($item as $v) {
    $rack = $v['rack'];
    if (!in_array($rack, $uniqueRack)) {
        $uniqueRack[] = $rack;
    } else {
        continue;
    }
}
foreach ($item as $v) {
    $loc = $v['locations'];
    if (!in_array($loc, $uniqueLoc)) {
        $uniqueLoc[] = $loc;
    } else {
        continue;
    }
}

?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid mb-0">

            <!-- start page title -->
            <!-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Form </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Form Update Item</h4>
                    </div>
                </div>
            </div> -->
            <!-- end page title -->

            <div class="row">
                <h4 class="page-title">Form Input Item</h4>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Scan QR-Code</h4>
                            <!-- SCANNER -->
                            <!-- <div id="scanner"></div> -->

                            <div style="text-align:center;">
                                <video id="previewKamera" style="width: 180px;height: 180px;"></video>
                                <br>
                                <select id="pilihKamera" style="max-width:200px"></select>
                            </div>
                            
                            <!-- end scan qr from database local -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Input Item</h4>

                            <form action="/inputAuto" method="post" class="needs-validation" novalidate>
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="no_rfq" class="form-label">No RFQ</label>
                                            <input type="text" class="form-control" id="no_rfq" placeholder="No RFQ" name="no_rfq" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col">
                                            <label for="no_wo" class="form-label">No WO</label>
                                            <input type="text" class="form-control" id="no_wo" placeholder="No WO" name="no_wo" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="name_cust" class="form-label">Name Customer</label>
                                    <input type="text" class="form-control" id="name_cust" placeholder="Name Customer" name="name_cust" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="mb-3">
                                    <label for="code_qr" class="form-label">Code QR</label>
                                    <input type="text" class="form-control" id="code_qr" placeholder="Code_QR" name="code_qr" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_item" class="form-label">Name Item</label>
                                            <input type="text" class="form-control" id="name_item" placeholder="Name Item" name="name_item" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="lot_del" class="form-label">Lot Delivery</label>
                                    <input type="text" class="form-control" id="lot_del" placeholder="Lot Devlivery" name="lot_del" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="no_sdf" class="form-label">No SDF</label>
                                    <input type="text" class="form-control" id="no_sdf" placeholder="No SDF" name="no_sdf" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="warehouse" class="form-label">Warehouse</label>
                                    <input type="text" class="form-control" id="warehouse" placeholder="Warehouse" name="warehouse" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="no_tag" class="form-label">No Tag</label>
                                    <input type="number" class="form-control" id="no_tag" placeholder="No_Tag" name="no_tag" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="desc_pn" class="form-label">Description PN</label>
                                    <input type="text" class="form-control" id="desc_pn" placeholder="Description PN" name="desc_pn" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="bpid" class="form-label">BPID</label>
                                    <input type="text" class="form-control" id="bpid" placeholder="BPID" name="bpid" />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="rack" class="form-label">Rack</label>
                                        <select class="form-control" id="rack" placeholder="rack" name="rack" required>
                                            <?php foreach ($uniqueRack as $v) : ?>
                                                <option value="<?= $v; ?>"><?= $v; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col">
                                        <label for="location" class="form-label">Location</label>
                                        <select class="form-control" id="locations" placeholder="Locations" name="locations" required></select>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col">
                                        <label for="sub_location" class="form-label">Sub Location</label>
                                        <select class="form-control" id="sub_locations" placeholder="Sub Locations" name="sub_locations" required></select>
                                        <?php if ($validation->hasError('sub_locations')) : ?>
                                            <div class="invalid-feedback"><?= $validation->getError('sub_locations'); ?></div>
                                        <?php endif ?>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="id" class="form-label">Id</label>
                                    <select class="form-control" id="id" placeholder="ID" name="id" required></select>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <script>
                                    const rackSelect = document.getElementById("rack");
                                    const locSelect = document.getElementById("locations");
                                    const subLocSelect = document.getElementById("sub_locations");
                                    const idSelect = document.getElementById("id");
                                    const uniqueLocs = <?php echo json_encode($uniqueLoc); ?>;
                                    const items = <?php echo json_encode($item); ?>;

                                    function filterLocationsByRack() {
                                        const selectedRack = rackSelect.value;
                                        const filteredLocs = uniqueLocs.filter(loc => loc.startsWith(selectedRack));
                                        // console.log(filteredLocs);
                                        const uniqueFilteredLocs = [...new Set(filteredLocs)];
                                        // console.log(uniqueFilteredLocs);

                                        // Filter to only include locations that belong to the selected rack
                                        const locsInSelectedRack = uniqueFilteredLocs.filter(loc => loc.startsWith(selectedRack));
                                        // console.log(locsInSelectedRack);

                                        clearOptions(locSelect);
                                        addOptions(locSelect, locsInSelectedRack);
                                        triggerChangeEvent(locSelect);
                                    }

                                    function filterSubLocationsByLocation() {
                                        const selectedLoc = locSelect.value;
                                        const filteredSubLocs = items.filter(item => item.locations === selectedLoc && (item.code_qr === "" || item.code_qr === null));
                                        const uniqueSubLocs = [...new Set(filteredSubLocs.map(item => item.sub_locations))];

                                        clearOptions(subLocSelect);
                                        addOptions(subLocSelect, uniqueSubLocs);
                                        triggerChangeEvent(subLocSelect);
                                    }

                                    function filterIdsBySubLocationAndLocation() {
                                        const selectedSubLoc = parseInt(subLocSelect.value);
                                        const selectedLoc = locSelect.value;
                                        const filteredIds = items.filter(item => item.sub_locations === selectedSubLoc && item.locations === selectedLoc && (item.code_qr === "" || item.code_qr === null))
                                                                .map(item => item.id_item);

                                        const uniqueIds = [...new Set(filteredIds)];

                                        clearOptions(idSelect);
                                        addOptions(idSelect, uniqueIds);
                                        triggerChangeEvent(idSelect);

                                        if (uniqueIds.length > 0) {
                                            idSelect.value = uniqueIds[0];
                                            triggerChangeEvent(idSelect);
                                        }
                                    }

                                    function clearOptions(selectElement) {
                                        selectElement.innerHTML = "";
                                    }

                                    function addOptions(selectElement, options) {
                                        options.forEach(option => {
                                            const optionElement = document.createElement("option");
                                            optionElement.value = option;
                                            optionElement.text = option;
                                            selectElement.add(optionElement);
                                        });
                                    }

                                    function triggerChangeEvent(selectElement) {
                                        const event = new Event('change');
                                        selectElement.dispatchEvent(event);
                                    }

                                    rackSelect.addEventListener("change", filterLocationsByRack);
                                    locSelect.addEventListener("change", filterSubLocationsByLocation);
                                    subLocSelect.addEventListener("change", filterIdsBySubLocationAndLocation);
                                    idSelect.addEventListener("change", function() {
                                        const selectedItem = items.find(item => item.id_item === parseInt(idSelect.value));
                                    });

                                    triggerChangeEvent(rackSelect);
                                </script>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>


                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer mt-0">
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