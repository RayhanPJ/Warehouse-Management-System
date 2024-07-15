<?= $this->extend('layouts/tamplate'); ?>

<?= $this->section('content'); ?>

<?php

use App\Models\TItems;

$areaModel = new TItems(); //membuat instance dari model TArea
$data = [
    'bypass' => $areaModel->getItem(),
];

$uniqueRack = [];
$uniqueLoc = [];


foreach ($data['bypass'] as $v) {
    $rack = $v['rack'];
    if (!in_array($rack, $uniqueRack)) {
        $uniqueRack[] = $rack;
    } else {
        continue;
    }
}
foreach ($data['bypass'] as $v) {
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
        <div class="container-fluid">
            <div class="col-md d-flex align-items-center justify-content-end">

                <!-- <button type="button" class="btn btn-md btn-danger mb-4" data-bs-toggle="modal" data-bs-target="#warning-alert-modal"><i class="mdi mdi-close me-1"></i>Delete Rack</button> -->
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- project card -->
                    <div class="card d-block">
                        <div class="card-body">
                            <!-- Warning Alert Modal -->
                            <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body p-4">
                                            <div class="text-center">
                                                <i class="dripicons-warning h1 text-warning"></i>
                                                <h4 class="mt-2">Warning</h4>
                                                <p class="mt-3">Button akan menghapus Rack sekaligus data didalamnya. Apa anda yakin ?</p>
                                                <button type="button" class="btn btn-sm btn-light my-2" data-bs-dismiss="modal">Tidak</button>
                                                <a class="btn btn-sm btn-danger ms-1" href="/delete/<?= $item['id_item']; ?>"><i class="mdi mdi-close me-1"></i>Ya</a>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- Form Bypass -->
                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="header-title">Form Bypass Data</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="col-md">
                                                <form action="/bypass/<?= $item['id_item']; ?>" method="post" class="needs-validation" novalidate>

                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="no_rfq" class="form-label">No RFQ</label>
                                                                <input type="text" class="form-control" id="no_rfq" placeholder="No RFQ" name="no_rfq" value="<?= $item['no_rfq']; ?>" readonly />
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="no_wo" class="form-label">No WO</label>
                                                                <input type="text" class="form-control" id="no_wo" placeholder="No WO" name="no_wo" value="<?= $item['no_wo']; ?>" readonly />
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div hidden class="mb-3">
                                                        <label for="name_cust" class="form-label">Name Customer</label>
                                                        <input type="text" class="form-control" id="name_cust" placeholder="Name Customer" name="name_cust" value="<?= $item['name_cust']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="code_qr" class="form-label">Code QR</label>
                                                        <input type="text" class="form-control" id="code_qr" placeholder="Code_QR" name="code_qr" value="<?= $item['code_qr']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name_item" class="form-label">Name Item</label>
                                                                <input type="text" class="form-control" id="name_item" placeholder="Name Item" name="name_item" value="<?= $item['name_item']; ?>" readonly />
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="mb-3">

                                                        <label for="qty" class="form-label">QTY</label>
                                                        <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty" value="<?= $item['qty']; ?>" readonly />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>

                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="lot_del" class="form-label">Lot Delivery</label>
                                                        <input type="text" class="form-control" id="lot_del" placeholder="Lot Devlivery" name="lot_del" value="<?= $item['lot_del']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="no_sdf" class="form-label">No SDF</label>
                                                        <input type="text" class="form-control" id="no_sdf" placeholder="No SDF" name="no_sdf" value="<?= $item['no_sdf']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="warehouse" class="form-label">Warehouse</label>
                                                        <input type="text" class="form-control" id="warehouse" placeholder="Warehouse" name="warehouse" value="<?= $item['warehouse']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="no_tag" class="form-label">No Tag</label>
                                                        <input type="number" class="form-control" id="no_tag" placeholder="No_Tag" name="no_tag" value="<?= $item['no_tag']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="desc_pn" class="form-label">Description PN</label>
                                                        <input type="text" class="form-control" id="desc_pn" placeholder="Description PN" name="desc_pn" value="<?= $item['desc_pn']; ?>" />
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div hidden class="mb-3">
                                                        <label for="bpid" class="form-label">BPID</label>
                                                        <input type="text" class="form-control" id="bpid" placeholder="BPID" name="bpid" value="<?= $item['bpid']; ?>" />
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
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div hidden class="mb-3">
                                                        <label for="id" class="form-label">Id</label>
                                                        <select class="form-control" id="id" placeholder="ID" name="id_item" require>
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
                                                        const items = <?php echo json_encode($data['bypass']); ?>;

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

                                                            clearOptions(subLocSelect);
                                                            addOptions(subLocSelect, filteredSubLocs.map(item => item.sub_locations));
                                                            triggerChangeEvent(subLocSelect);
                                                        }

                                                        function filterIdsBySubLocationAndLocation() {
                                                            const selectedSubLoc = parseInt(subLocSelect.value);
                                                            const selectedLoc = locSelect.value;
                                                            const filteredIds = items.filter(item => item.sub_locations === selectedSubLoc && item.locations === selectedLoc && (item.code_qr === "" || item.code_qr === null));

                                                            // Add logic to display item.id_item if code_qr is empty or null and sort the ids in ascending order
                                                            const sortedIdsToDisplay = filteredIds.filter(item => item.code_qr === "" || item.code_qr === null)
                                                                .sort((a, b) => a.id - b.id)
                                                                .map(item => item.id_item);

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
                                            </div> <!-- end col-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->

                            <div class="float-sm-end mb-2 mb-sm-0">
                                <div class="row g-2">
                                    <div class="col-auto">
                                        <a href="/rack<?= $item['rack'] ?>" class="btn btn-sm btn-link"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
                                    </div>
                                </div>
                            </div> <!-- end dropdown-->

                            <h4 class="mb-3 mt-0 font-18">Detail Item</h4>

                            <div class="clerfix"></div>

                            <div class="row">
                                <div class="col-md">
                                    <label class="mt-2 mb-1">Customer :</label>
                                    <p>
                                        <?= $item['name_cust']; ?>
                                    </p>
                                </div>
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Location :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['locations']; ?>.<?= $item['sub_locations']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Warehouse :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['warehouse']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                                <div class="col-md"></div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md">
                                    <!-- Reported by -->
                                    <label class="mt-2 mb-1">No RFQ :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['no_rfq']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end Reported by -->
                                </div> <!-- end col -->
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">No WO :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['no_wo']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">No SDF :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['no_sdf']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Lot Delivery :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['lot_del']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                            <div class="row">
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">QTY :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['qty']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">No Tag :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['no_tag']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Item :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['name_item']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Note :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['code_qr']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->


                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Description PN :</label>
                                    <div class="d-flex align-items-start">
                                        <div class="w-100">
                                            <p> <?= $item['desc_pn']; ?> </p>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                                <div class="col-md">
                                    <!-- Status -->
                                    <label class="mt-2 mb-1">Created On :</label>
                                    <p><?= date_format(date_create($item['created_at']), 'd-M-Y'); ?></p>
                                    <!-- end Status -->
                                </div> <!-- end col -->
                                <div class="col-md"></div>
                                <div class="col-md"></div>

                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md"></div>
                                <div class="col-md"></div>
                                <div class="col-md"></div>
                                <div class="col-md d-flex align-items-center justify-content-end">
                                    <a class="btn btn-md btn-warning me-1" href="/editData/<?= $item['id_item']; ?>">Edit</a>
                                    <a class="btn btn-md btn-success me-1" href="/tambahSisa/<?= $item['id_item']; ?>">Tambah</a>
                                    <button type="button" class="btn btn-md btn-primary me-1 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Bypass</button>
                                    <a class="btn btn-md btn-danger me-1" href="/reset/<?= $item['id_item']; ?>">Reset</a>
                                </div>
                            </div> <!-- end row -->

                        </div> <!-- end card-body-->

                    </div> <!-- end card-->
                </div>
                <?php foreach ($item2 as $v) : ?>
                    <?php if ($v['id_item'] === $item['id_item']) : ?>

                        <div class="col-12">
                            <!-- project card -->
                            <div class="card d-block">
                                <div class="card-body">

                                    <div class="float-sm-end mb-2 mb-sm-0">
                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <a href="/admin" class="btn btn-sm btn-link"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
                                            </div>
                                        </div>
                                    </div> <!-- end dropdown-->

                                    <h4 class="mb-3 mt-0 font-18">Detail Item Receh</h4>

                                    <div class="clerfix"></div>

                                    <div class="row">
                                        <div class="col-md">
                                            <label class="mt-2 mb-1">Customer :</label>
                                            <p>
                                                <?= $v['name_cust_sisa']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Location :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['locations_sisa']; ?>.<?= $v['sub_locations_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Warehouse :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['warehouse_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-md"></div>
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md">
                                            <!-- Reported by -->
                                            <label class="mt-2 mb-1">No RFQ :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['no_rfq_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end Reported by -->
                                        </div> <!-- end col -->
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">No WO :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['no_wo_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">No SDF :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['no_sdf_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Lot Delivery :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['lot_del_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->


                                    <div class="row">
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">QTY :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['qty_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->

                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">No Tag :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['no_tag_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->

                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Item :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['name_item_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->

                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Note :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['code_qr_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->


                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md">
                                            <!-- assignee -->
                                            <label class="mt-2 mb-1">Description PN :</label>
                                            <div class="d-flex align-items-start">
                                                <div class="w-100">
                                                    <p> <?= $v['desc_pn_sisa']; ?> </p>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-md">
                                            <!-- Status -->
                                            <label class="mt-2 mb-1">Created On :</label>
                                            <p><?= date_format(date_create($v['created_at']), 'd-M-Y'); ?></p>
                                            <!-- end Status -->
                                        </div> <!-- end col -->
                                        <div class="col-md"></div>
                                        <div class="col-md"></div>

                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md"></div>
                                        <div class="col-md"></div>
                                        <div class="col-md"></div>
                                        <div class="col-md d-flex align-items-center justify-content-end">
                                            <a class="btn btn-md btn-warning me-1" href="/editSisa/<?= $v['id_sisa']; ?>">Edit</a>
                                            <a class="btn btn-md btn-danger me-1" href="/delSisa/<?= $v['id_sisa']; ?>">Delete</a>

                                        </div>
                                    </div>
                                </div> 
                                <!-- end card-body-->

                                </div> <!-- end card-->
                            </div>

                        <?php endif ?>
                    <?php endforeach ?>
                        </div>
            </div>
        </div>
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

    <?= $this->endSection(); ?>