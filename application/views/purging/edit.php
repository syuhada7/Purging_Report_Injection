<section class="content">
    <div class="box">
        <div class="box-header">
            <i class="fa fa-edit"></i>
            <h3 class="box-title">Edit Purging Registration</h3>
            <div class="pull-right">
                <a href="<?= site_url('purging') ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <?= form_open_multipart('purging/update'); ?>
            <input type="hidden" name="id_catat" value="<?= $row->id_catat ?>">
            <div class="row">
                <div class="col-lg-4">
                    <label>Registration Date</label>
                    <input type="text" class="form-control" value="<?= $row->date_created ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label>Registrant</label>
                    <input type="text" class="form-control" value="<?= $row->username ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label>Shift</label>
                    <select name="shift" class="form-control">
                        <option value="1" <?= $row->shift == 1 ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= $row->shift == 2 ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= $row->shift == 3 ? 'selected' : '' ?>>3</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <label>Machine</label>
                    <select name="no_mc" class="form-control">
                        <?php foreach ($mesin->result() as $ms): ?>
                            <option value="<?= $ms->nama_mesin ?>" <?= $row->no_mc == $ms->nama_mesin ? 'selected' : '' ?>>
                                <?= $ms->nama_mesin ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Code Type</label>
                    <select name="c_awal" class="form-control">
                        <?php foreach (['A', 'B', 'C', 'A/B', 'B/C'] as $c): ?>
                            <option value="<?= $c ?>" <?= $row->c_awal == $c ? 'selected' : '' ?>><?= $c ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Part Name</label>
                    <select name="name_pn" id="name_pn" class="form-control">
                        <?php foreach ($part as $p): ?>
                            <option value="<?= $p->name_pn ?>" <?= $row->name_pn == $p->name_pn ? 'selected' : '' ?>>
                                <?= $p->name_pn ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
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
                    <input type="text" name="name_resin" value="<?= $row->name_resin ?>" class="form-control">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <label>Before Change</label>
                    <input type="text" name="bf_ganti" value="<?= $row->bf_ganti ?>" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label>After Change</label>
                    <input type="text" name="af_ganti" value="<?= $row->af_ganti ?>" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label>Weight Purging</label>
                    <input type="number" name="b_purging" id="b_purging" value="<?= $row->b_purging ?>" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label>Weight Disposal</label>
                    <input type="number" name="b_disposal" id="b_disposal" value="<?= $row->b_disposal ?>" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label>Qty</label>
                    <input type="number" name="qty_b_dis" value="<?= $row->qty_b_dis ?>" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label>Total Weight</label>
                    <input type="number" name="jumlah_kg" id="jumlah_kg" value="<?= $row->jumlah_kg ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label>Note</label>
                    <textarea name="keterangan" class="form-control"><?= $row->keterangan ?></textarea>
                </div>
                <div class="col-lg-4">
                    <label>Picture Purging</label><br>
                    <?php if ($row->pic_1): ?>
                        <img src="<?= base_url('uploads/purging/' . $row->pic_1) ?>" width="120"><br>
                        <small>Upload baru jika ingin mengganti</small>
                    <?php endif; ?>
                    <input type="file" name="attachment1">
                </div>

                <div class="col-lg-4">
                    <label>Picture Disposal</label><br>
                    <?php if ($row->pic_2): ?>
                        <img src="<?= base_url('uploads/purging/' . $row->pic_2) ?>" width="120"><br>
                        <small>Upload baru jika ingin mengganti</small>
                    <?php endif; ?>
                    <input type="file" name="attachment2">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Update
            </button>
            <?= form_close(); ?>
            <script>
                const OLD_NAME_PN = "<?= $row->name_pn ?>";
                const OLD_NAME_MODEL = "<?= $row->name_model ?>";
                const OLD_NO_PN = "<?= $row->no_pn ?>";
            </script>
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

            /* ============================
               LOAD MODEL (EDIT MODE)
            ============================ */
            function loadModel(selectedModel = null) {
                let name_pn = $('#name_pn').val();
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
                                let selected = (item.name_model === selectedModel) ? 'selected' : '';
                                $('#name_model').append(
                                    '<option value="' + item.name_model + '" ' + selected + '>' +
                                    item.name_model +
                                    '</option>'
                                );
                            });

                            if (selectedModel) {
                                loadPartNumber(selectedModel, OLD_NO_PN);
                            }
                        }
                    });
                }
            }

            /* ============================
               LOAD PART NUMBER (EDIT MODE)
            ============================ */
            function loadPartNumber(name_model, selectedPN = null) {
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
                                let selected = (item.no_pn === selectedPN) ? 'selected' : '';
                                $('#no_pn').append(
                                    '<option value="' + item.no_pn + '" ' + selected + '>' +
                                    item.no_pn +
                                    '</option>'
                                );
                            });
                        }
                    });
                }
            }

            /* ============================
               EVENT NORMAL (ADD & EDIT)
            ============================ */
            $('#name_pn').change(function() {
                loadModel();
            });

            $('#name_model').change(function() {
                loadPartNumber($(this).val());
            });

            /* ============================
               AUTO LOAD SAAT EDIT
            ============================ */
            if (OLD_NAME_PN) {
                $('#name_pn').val(OLD_NAME_PN);
                loadModel(OLD_NAME_MODEL);
            }

        });
    </script>
</section>