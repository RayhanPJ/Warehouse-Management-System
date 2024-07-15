<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard Warehouse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Warehouse Management System" name="Rayhan" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap Tables css -->
    <link href="<?php echo base_url(); ?>assets/libs/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />

    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/iPTCBI.ico">

    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/css/config/creative/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/config/creative/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo base_url(); ?>assets/css/config/creative/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/config/creative/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- third party css -->
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <!-- icons -->
    <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<!-- body start -->

<body class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <?= $this->include('/layouts/navbar'); ?>
    <br />
    <?= $this->renderSection('content'); ?>

    <!-- Vendor js -->
    <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- third party js -->
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tableHTMLExport.js"></script>
    <!-- third party js ends -->


    <!-- Datatables init -->
    <script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>

    <!-- Bootstrap Tables js -->
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap-table/bootstrap-table.min.js"></script>
    <!-- Init js -->
    <script src="<?php echo base_url(); ?>assets/js/pages/bootstrap-tables.init.js"></script>

    <!-- App js-->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    
    <!-- Scanner -->
    <script src="<?php echo base_url('assets/js'); ?>/scan-qr.min.js"></script>

    <script>
        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = document.getElementById('pilihKamera');
        const videoElement = document.createElement('video');
        const scannerDiv = document.getElementById('scanner');

        function handleCameraChange() {
            selectedDeviceId = sourceSelect.value;
            if (codeReader) {
                codeReader.reset();
                initScanner();
            }
        }

        sourceSelect.addEventListener('change', handleCameraChange);

        function initScanner() {
            codeReader
                .listVideoInputDevices()
                .then(videoInputDevices => {
                    videoInputDevices.forEach(device =>
                        console.log(`Camera Connected`)
                    );

                    if (videoInputDevices.length > 0) {
                        if (selectedDeviceId == null) {
                            if (videoInputDevices.length > 1) {
                                selectedDeviceId = videoInputDevices[1].deviceId;
                            } else {
                                selectedDeviceId = videoInputDevices[0].deviceId;
                            }
                        }

                        if (videoInputDevices.length >= 1) {
                            sourceSelect.innerHTML = '';
                            videoInputDevices.forEach(element => {
                                const sourceOption = document.createElement('option');
                                sourceOption.text = element.label;
                                sourceOption.value = element.deviceId;
                                if (element.deviceId == selectedDeviceId) {
                                    sourceOption.selected = true;
                                }
                                sourceSelect.appendChild(sourceOption);
                            });
                        }

                        codeReader
                            .decodeFromVideoDevice(selectedDeviceId, 'previewKamera', (result, error) => {
                                if (result) {
                                    const url = "https://portal2.incoe.astra.co.id/e-wip/api/getBarcodeId/" + result.text;
                                    sendGetRequest(url);
                                }
                                if (error && !(error instanceof ZXing.NotFoundException)) {
                                    alert('Data tidak ada !')
                                    console.error(error);
                                }
                            })
                            .then(() => {

                            })
                            .catch(err => {
                                console.error(err);
                            });

                        videoElement.srcObject = null;
                        videoElement.src = '';
                        videoElement.controls = false;
                        videoElement.autoplay = true;
                        videoElement.muted = true;
                        scannerDiv.appendChild(videoElement);

                        codeReader
                            .attachVideoElement(videoElement)
                            .then(() => {
                                console.log('Kamera terhubung.');
                            })
                            .catch(err => {

                            });
                    } else {
                        alert('Kamera tidak ditemukan!');
                    }
                })
                .catch(err => {
                });
        }

        if (navigator.mediaDevices) {
            initScanner();
        } else {
            alert('Tidak dapat mengakses kamera.');
        }
    </script>

    <script type="text/javascript">

        // fungsi untuk menangani respons dari permintaan GET
        function handleResponse() {
            if (this.readyState === 4 && this.status === 200) {
                const data = JSON.parse(this.responseText);
                if (data.results[0].NO_RFQ === null || data.results[0].NO_RFQ === "") {
                    alert("Data kosong");
                } else {
                    // console.log(data.results[0]);
                    document.getElementById('no_rfq').value = data.results[0].NO_RFQ;
                    document.getElementById('no_wo').value = data.results[0].NO_WO;
                    document.getElementById('name_cust').value = data.results[0].CUSTOMER_NAME;
                    document.getElementById('code_qr').value = data.results[0].NOTE;
                    document.getElementById('qty').value = data.results[0].QTY;
                    document.getElementById('warehouse').value = data.results[0].WAREHOUSE;
                    document.getElementById('no_tag').value = data.results[0].NO_TAG;
                    document.getElementById('name_item').value = data.results[0].ITEM;
                    document.getElementById('desc_pn').value = data.results[0].DESCRIPTION_PN;
                    document.getElementById('bpid').value = data.results[0].BPID;
                    document.getElementById('no_sdf').value = data.results[0].SDF_ORDER;
                    document.getElementById('lot_del').value = data.results[0].QTY_LOT_DELIV;
                }
            } else if (this.readyState === 4) {
                alert("Tidak ada koneksi");
            }
        }

        // fungsi untuk mengirimkan permintaan GET
        function sendGetRequest(url) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = handleResponse;
            xhr.send();
        }

    </script>
</body>

</html>