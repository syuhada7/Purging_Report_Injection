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
                                <option>- -</option>
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
                                <option>- -</option>
                                <?php foreach ($mesin->result() as $key => $ms) : ?>
                                    <option value="<?= $ms->nama_mesin ?>"><?= $ms->nama_mesin ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Code Type</label>
                            <select name="c_awal" class="form-control">
                                <option>- -</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="A/B">A/B</option>
                                <option value="B/C">B/C</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Part name</label>
                            <select name="name_pn" id="name_pn" class="form-control">
                                <option>- -</option>
                                <?php foreach ($part as $p): ?>
                                    <option value="<?= $p->name_pn ?>"><?= $p->name_pn ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Model</label>
                            <select name="name_model" id="name_model" class="form-control">
                                <option>- -</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Part Number</label>
                            <select name="no_pn" id="no_pn" class="form-control">
                                <option>- -</option>
                            </select>
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
                            <input type="number" name="b_purging" id="b_purging" step="0.01" min="0" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Weight Disposal</label>
                            <input type="number" name="b_disposal" id="b_disposal" step="0.01" min="0" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Qty</label>
                            <input type="number" name="qty_b_dis" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label>Summary Wieght</label>
                            <input type="number" name="jumlah_kg" id="jumlah_kg" step="0.01" min="0" class="form-control" readonly>
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
    <script>
        $(document).ready(function() {

            $('#name_pn').change(function() {
                let name_pn = $(this).val();
                $('#name_model').html('<option>- -</option>');
                $('#no_pn').html('<option>- -</option>');

                if (name_pn) {
                    $.ajax({
                        url: "<?= site_url('purging/get_model') ?>",
                        type: "POST",
                        data: {
                            name_pn: name_pn
                        },
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(i, item) {
                                $('#name_model').append(
                                    '<option value="' + item.name_model + '">' + item.name_model + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            $('#name_model').change(function() {
                let name_model = $(this).val();
                let name_pn = $('#name_pn').val();
                $('#no_pn').html('<option>- -</option>');

                if (name_model) {
                    $.ajax({
                        url: "<?= site_url('purging/get_part_number') ?>",
                        type: "POST",
                        data: {
                            name_pn: name_pn,
                            name_model: name_model
                        },
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(i, item) {
                                $('#no_pn').append(
                                    '<option value="' + item.no_pn + '">' + item.no_pn + '</option>'
                                );
                            });
                        }
                    });
                }
            });

        });
    </script>
</section>