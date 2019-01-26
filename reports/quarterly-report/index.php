<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/server.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<section>
    <h1>Quarterly Reports</h1>

    <div class="panel panel-default">
        <form class="panel-body form-horizontal" onsubmit="">
            <div class="form-group">
                <label for="dateFromInput" class="col-sm-2 control-label">Date From</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dateFromInput" name="dateFrom">
                </div>
            </div>
            <div class="form-group">
                <label for="dateToInput" class="col-sm-2 control-label">Date To</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dateToInput" name="dateTo">
                </div>
            </div>
            <div class="form-group">
                <label for="statusInput" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-6">
                    <input class="form-control" id="statusInput" name="status">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-brand ">
                        <span class="text-capitalize">View Report</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div id="table-pdf" class="panel panel-default">
        <!-- Table -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Case No.</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button id="pdf-btn" class="btn btn-brand">
            <span class="text-capitalize">Print</span>
        </button>
    </div>
</section>

<script>
    $('#pdf-btn').click(function (e) {
        printJS('table-pdf', 'html');
    });
</script>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';

