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
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="no_wo" class="form-label">No WO</label>
                                            <input type="text" class="form-control" id="no_wo" placeholder="No WO" name="no_wo" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div hidden class="mb-3">
                                    <label for="name_cust" class="form-label">Name Customer</label>
                                    <input type="text" class="form-control" id="name_cust" placeholder="Name Customer" name="name_cust" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="code_qr" class="form-label">Code QR</label>
                                    <input type="text" class="form-control" id="code_qr" placeholder="Code_QR" name="code_qr" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_item" class="form-label">Name Item</label>
                                            <input type="text" class="form-control" id="name_item" placeholder="Name Item" name="name_item" />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="mb-3">

                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>
                                <div hidden class="mb-3">
                                    <label for="lot_del" class="form-label">Lot Delivery</label>
                                    <input type="text" class="form-control" id="lot_del" placeholder="Lot Devlivery" name="lot_del" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="no_sdf" class="form-label">No SDF</label>
                                    <input type="text" class="form-control" id="no_sdf" placeholder="No SDF" name="no_sdf" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="warehouse" class="form-label">Warehouse</label>
                                    <input type="text" class="form-control" id="warehouse" placeholder="Warehouse" name="warehouse" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="no_tag" class="form-label">No Tag</label>
                                    <input type="number" class="form-control" id="no_tag" placeholder="No_Tag" name="no_tag" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="desc_pn" class="form-label">Description PN</label>
                                    <input type="text" class="form-control" id="desc_pn" placeholder="Description PN" name="desc_pn" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div hidden class="mb-3">
                                    <label for="bpid" class="form-label">BPID</label>
                                    <input type="text" class="form-control" id="bpid" placeholder="BPID" name="bpid" />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="rack" class="form-label">Rack</label>
                                        <select class="form-control" id="rack" placeholder="rack" name="rack" require>
                                            <?php foreach ($uniqueRack as $v) : ?>
                                                <option value="<?= $v; ?>"><?= $v; ?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="location" class="form-label">Location</label>
                                        <select class="form-control" id="locations" placeholder="Locations" name="locations" require>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="sub_location" class="form-label">Sub Location</label>
                                        <select class="form-control" id="sub_locations" placeholder="Sub Locations" name="sub_locations" require>
                                        </select>
                                        <?php if ($validation->hasError('sub_locations')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('sub_locations'); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                </div>

                                <div hidden class="mb-3">
                                    <label for="id" class="form-label">Id</label>
                                    <select class="form-control" id="id" placeholder="ID" name="id" require>
                                    </select>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
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
                                        const filteredLocsWithEmptySubLocs = filteredLocs.filter(loc => {
                                            const subLocs = items.filter(item => item.locations === loc && (item.code_qr === "" || item.code_qr === null));
                                            return subLocs;
                                        });

                                        // New implementation starts here
                                        const ids = filteredLocsWithEmptySubLocs.map(loc => {
                                            const item = items.find(item => item.locations === loc && (item.code_qr === "" || item.code_qr === null));
                                            return item ? item.id_item : null;
                                        });
                                        const uniqueIds = [...new Set(ids)];
                                        const filteredItems = items.filter(item => uniqueIds.includes(item.id_item));
                                        // console.log(filteredItems);
                                        const locationsToPrint = [...new Set(filteredItems.map(item => item.locations))];
                                        // New implementation ends here

                                        clearOptions(locSelect);
                                        addOptions(locSelect, locationsToPrint);
                                        triggerChangeEvent(locSelect);
                                    }


                                    function filterSubLocationsByLocation() {
                                        const selectedLoc = locSelect.value;
                                        const filteredSubLocs = items.filter(item => item.locations === selectedLoc && (item.code_qr === "" || item.code_qr === null));

                                        // Menampilkan ID item jika tidak memiliki QR code
                                        filteredSubLocs.forEach(item => {
                                            if (item.code_qr === "" || item.code_qr === null) {
                                                return item.id_item;
                                            }
                                        });
                                        // console.log(filteredSubLocs);
                                        clearOptions(subLocSelect);
                                        addOptions(subLocSelect, filteredSubLocs.map(item => item.sub_locations));
                                        triggerChangeEvent(subLocSelect);
                                    }

                                    function filterIdsBySubLocationAndLocation() {
                                        const selectedSubLoc = parseInt(subLocSelect.value);
                                        const selectedLoc = locSelect.value;
                                        const filteredIds = items.filter(item => item.sub_locations === selectedSubLoc && item.locations === selectedLoc);

                                        // Add logic to display item.id_item if code_qr is empty or null and sort the ids in ascending order
                                        const sortedIdsToDisplay = filteredIds.map(item => item.id_item);
                                        // console.log(selectedSubLoc);
                                        clearOptions(idSelect);
                                        addOptions(idSelect, sortedIdsToDisplay);
                                        triggerChangeEvent(idSelect);

                                        // Select the first ID option by default
                                        if (sortedIdsToDisplay.length > 0) {
                                            idSelect.value = sortedIdsToDisplay[0];
                                            // Trigger change event for id select to display the selected item data
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
                                        // Ambil data item berdasarkan id
                                        const selectedItem = items.find(item => item.id_item === parseInt(idSelect.value));
                                    });


                                    // Trigger change event for rack select when the page first loads
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