<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><i class="fa fa-cubes"></i> Purging Data List</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('eco_public'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purging Data List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <i class="fa fa-cubes"></i>
            <h3 class="box-title">List Data Purging</h3>
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-flat"><a href="<?= site_url('purging/regis') ?>"><i class="fa fa-plus"> Created</i></a></button>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <?php if ($this->session->userdata('level') == 1): ?>
                        <th></th>
                    <?php endif; ?>
                    <th>Registrations Date</th>
                    <th>Registrations Name</th>
                    <th>Shift</th>
                    <th>Machine</th>
                    <th>Code Type</th>
                    <th>Part Name</th>
                    <th>Model</th>
                    <th>Part Number</th>
                    <th>Resin</th>
                    <th>Before Change</th>
                    <th>After Change</th>
                    <th>Weight Purging</th>
                    <th>Wieght Disposal</th>
                    <th>Qty</th>
                    <th>Summary Weight</th>
                    <th>Note</th>
                    <th>View Picture</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($row->result() as $key => $data) :
                    ?>
                        <tr class="text-center">
                            <?php if ($this->session->userdata('level') == 1): ?>
                                <td>
                                    <a href="<?= site_url('purging/edit/' . $data->id_catat) ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                            <td><?= $data->date_created ?></td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->shift ?></td>
                            <td><?= $data->no_mc ?></td>
                            <td><?= $data->c_awal ?></td>
                            <td><?= $data->name_pn ?></td>
                            <td><?= $data->name_model ?></td>
                            <td><?= $data->no_pn ?></td>
                            <td><?= $data->name_resin ?></td>
                            <td><?= $data->bf_ganti ?></td>
                            <td><?= $data->af_ganti ?></td>
                            <td><?= $data->b_purging ?></td>
                            <td><?= $data->b_disposal ?></td>
                            <td><?= $data->qty_b_dis ?></td>
                            <td><?= $data->jumlah_kg ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td><a href="<?= site_url('purging/view/' . $data->id_catat) ?>"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>