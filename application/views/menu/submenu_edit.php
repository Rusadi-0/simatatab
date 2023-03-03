</header>
<!-- End Navigation Bar=============================================================================-->

<!-- ISI ================================================================================================= -->
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('menu/submenu'); ?>">Submenu Management</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-lg-7 col-xl-7">
                <div class="card m-b-30">
                    <div class="card-body">
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                        <form action="<?= base_url('menu/subMenuEdit/' . $subMenu['id']); ?>" method="post">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $subMenu['id']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Nama Submenu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $subMenu['title']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu_id" class="col-sm-4 col-form-label">Menu</label>
                                <div class="col-sm-8">
                                    <select name="menu_id" id="menu_id" class="form-control" required>
                                        <?php foreach ($menu as $m) : ?>
                                            <option <?php if ($m['id'] == $subMenu['menu_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $m['id']; ?>"><?= $m['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-sm-4 col-form-label">Url Submenu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="url" name="url" value="<?= $subMenu['url']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icon" class="col-sm-4 col-form-label">Icon (<i class="<?= $subMenu['icons']; ?>"></i>)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="icons" name="icons" value="<?= $subMenu['icons']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_active" class="col-sm-4 col-form-label">Active</label>
                                <div class="col-sm-8">
                                    <?php if ($subMenu['is_active'] == 1) {
                                        echo '
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" checked id="is_active1" value="1" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" id="is_active2" value="0" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active2">No</label>
                                    </div>';
                                    } else {
                                        echo '
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio"  id="is_active1" value="1" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" checked id="is_active2" value="0" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active2">No</label>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-8 mt-2">
                                    <a class="btn btn-outline-secondary" href="<?= base_url('menu/submenu'); ?>"><i class="mdi mdi-undo-variant"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->