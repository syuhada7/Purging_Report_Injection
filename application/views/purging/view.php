<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><i class="fa fa-list"></i> View Documentations</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Documentations</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <i class="fa fa-list"></i>
            <h3 class="box-title"> Purging Documentations</h3>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <?php foreach ($row->result() as $key => $data) : ?>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <!-- Tampilkan gambar jika sudah ada -->
                            <label>Picture Purging</label>
                            <?php if (!empty($data->pic_1)) : ?>
                                <div style="display:inline-block; margin:8px; text-align:center;">
                                    <img src="<?= site_url('uploads/purging/' . $data->pic_1) ?>"
                                        alt="Picture Purging"
                                        style="width:auto; height:auto; border:1px solid #ccc; padding:4px; max-width:500px;">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <!-- Tampilkan gambar jika sudah ada -->
                            <label>Picture Disposal</label>
                            <?php if (!empty($data->pic_2)) : ?>
                                <div style="display:inline-block; margin:8px; text-align:center;">
                                    <img src="<?= site_url('uploads/purging/' . $data->pic_2) ?>"
                                        alt="Picture Disposal"
                                        style="width:auto; height:auto; border:1px solid #ccc; padding:4px; max-width:500px;">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </table>
            <br>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="<?= site_url('purging/index') ?>" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->