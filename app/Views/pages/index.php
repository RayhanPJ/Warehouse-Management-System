<?= $this->extend('layouts/tamplate'); ?>

<?= $this->section('content'); ?>
<?php
$V = "V";
$W = "W";
$X = "X";
$Y = "Y";
$Others = "Others";
$uniqueRack = [];

foreach ($item as $v) {
    $rack = $v['rack'];
    //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
    if (!in_array($rack, $uniqueRack)) {
        $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
    } else {
        continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
    }
    // $count = count($uniqueRack); //untuk menghitung total Rack
}
?>

<!-- Begin page -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <h1 class="page-title text-center">Welcome To Warehouse</h1>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="responsive-table-plugin mt-3">
                                    <div class="table-rep-plugin">
                                        <h4 class="page-title">List Total Rack Items</h4>
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($uniqueRack as $rack) : ?>
                                                        <td>
                                                            <div class="card bg-pattern">
                                                                <a href="/rack<?= $rack; ?>">
                                                                    <div class="card-body">
                                                                        <h4 class="text-center">Rack <?= $rack; ?></h4>
                                                                        <div class="row">

                                                                            <div class="col-12">
                                                                                <div class="text-start bg-success rounded-2">
                                                                                    <label class="text-light px-1 my-1 fs-5">Full Rack :</label>
                                                                                    <h4 class="text-light px-1 my-1" style="font-size: 18px !important;"><span data-plugin="counterup"><?php echo ${'rackC' . $rack}['totalOff' . $rack]; ?></span></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="text-start bg-danger rounded-2">
                                                                                    <label class="text-light px-1 my-1 fs-5">Empty Rack :</label>
                                                                                    <h4 class="text-light px-1 my-1" style="font-size: 18px !important;"><span data-plugin="counterup"><?php echo ${'rackC' . $rack}['totalOn' . $rack]; ?></span></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="text-start bg-blue rounded-2">
                                                                                    <label class="text-light px-1 my-1 fs-5">QTY Items :</label>
                                                                                    <h4 class="text-light px-1 my-1" style="font-size: 18px !important;"><span data-plugin="counterup"><?php echo ${'rackC' . $rack}['totalQTY' . $rack]; ?></span></h4>
                                                                                </div>
                                                                            </div>

                                                                        </div> <!-- end row -->
                                                                    </div>
                                                                </a>
                                                            </div> <!-- end card-->
                                                        </td>
                                                    <?php endforeach ?>

                                                    <tr>
                                                        <div class="card bg-pattern">
                                                            <a href="<?= base_url(); ?>">
                                                                <div class="card-body">

                                                                    <h2 class="text-center">Total All Rack</h2>
                                                                    <div class="row d-flex">

                                                                        <div class="col-4">
                                                                            <div class="text-center text-start bg-success rounded-2">
                                                                                <label class="text-light px-1 my-1 fs-3">Total Full Rack :</label>
                                                                                <h3 class="text-light px-1 my-1" style="font-size: 24px !important;"><span data-plugin="counterup"><?= $total['allCountOff']; ?></span></h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="text-center text-start bg-danger rounded-2">
                                                                                <label class="text-light px-1 my-1 fs-3">Total Empty Rack :</label>
                                                                                <h3 class="text-light px-1 my-1" style="font-size: 24px !important;"><span data-plugin="counterup"><?= $total['allCountOn']; ?></span></h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="text-center text-start bg-blue rounded-2">
                                                                                <label class="text-light px-1 my-1 fs-3">Total QTY Items :</label>
                                                                                <h3 class="text-light px-1 my-1" style="font-size: 24px !important;"><span data-plugin="counterup"><?= $total['allCountQTY']; ?></span></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- end row -->

                                                                </div>
                                                            </a>
                                                        </div> <!-- end card-->
                                                    </tr>
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
<script>
    // Set the time interval in milliseconds
    var interval = 600000; // 600000 milliseconds = 10 minutes

    // Define the function to reload the page
    function reloadPage() {
        location.reload();
    }

    // Set the time interval to execute the reload function
    setInterval(reloadPage, interval);
</script>

<?= $this->endSection(); ?>