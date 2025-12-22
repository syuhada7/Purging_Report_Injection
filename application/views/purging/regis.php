<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <i class="fa fa-edit"></i>
            <h3 class="box-title"> Purging Registrations</h3>
            <div class="pull-right">
                <Span hidden><?= $id = $this->fungsi->user_login()->id_user; ?></Span>
                <a href="<?= site_url('purging/index') ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div class="header">
                    <img alt="Company Logo" height="100" src="<?= base_url() ?>uploads/logo/logo.png" width="auto">
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <?php echo form_open_multipart('purging/save'); ?>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Registration date</label>
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <input type="text" name="date_created"
                                value="<?= date('d F Y H:i:s'); ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Registrant</label>
                            <input type="text" name="username" value="<?= $this->fungsi->user_login()->nama; ?>" class="form-control" readonly>
                            <input type="hidden" name="id_catat" value="<?= $next_id ?>" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Shift</label>
                            <select name="shift" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Machine</label>
                            <select name="no_mc" class="form-control">
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="A3">A3</option>
                                <option value="A4">A4</option>
                                <option value="A5">A5</option>
                                <option value="A6">A6</option>
                                <option value="A7">A7</option>
                                <option value="A8">A8</option>
                                <option value="A9">A9</option>
                                <option value="A10">A10</option>
                                <option value="A11">A11</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Code Type</label>
                            <select name="c_awal" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="A/B">A/B</option>
                                <option value="B/C">B/C</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Part name</label>
                            <select name="name_pn" class="form-control">
                                <option value="BACK COVER">BACK COVER</option>
                                <option value="BASE ASSEMBLY, STAND">BASE ASSEMBLY, STAND</option>
                                <option value="BASE ASSY, STAND 2 POLE">BASE ASSY, STAND 2 POLE</option>
                                <option value="BASE COVER">BASE COVER</option>
                                <option value="BASE COVER STAND">BASE COVER STAND</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Model</label>
                            <input type="text" name="name_model" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Part Number</label>
                            <input type="text" name="no_pn" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Resin</label>
                            <input type="text" name="name_resin" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Before Change</label>
                            <input type="text" name="bf_ganti" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>After Change</label>
                            <input type="text" name="af_ganti" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Weight Purging</label>
                            <input type="number" name="b_purging" id="b_purging" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Weight Disposal</label>
                            <input type="number" name="b_disposal" id="b_disposal" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Qty</label>
                            <input type="number" name="qty_b_dis" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Summary Wieght</label>
                            <input type="number" name="jumlah_kg" id="jumlah_kg" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Note</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-3">
                            <label>Upload Picture Purging</label>
                            <input type="file" name="attachment1" required> Max 4 MB
                        </div>
                        <div class="col-lg-3">
                            <label>Upload Picture Disposal</label>
                            <input type="file" name="attachment2" required> Max 4 MB
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label></label>
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <br>
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button> |
                            <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const purging = document.getElementById("b_purging");
            const disposal = document.getElementById("b_disposal");
            const total = document.getElementById("jumlah_kg");

            function hitungTotal() {
                let p = parseFloat(purging.value) || 0;
                let d = parseFloat(disposal.value) || 0;
                total.value = (p + d).toFixed(2);
            }

            purging.addEventListener("input", hitungTotal);
            disposal.addEventListener("input", hitungTotal);
        });
    </script>
</section>