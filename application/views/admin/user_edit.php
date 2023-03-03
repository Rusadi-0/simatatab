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
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('Administrator/users'); ?>">Users</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="<?= base_url('Administrator/users_edit/') . $users['id']; ?>" method="POST">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" name="email" id="staticEmail" value="<?= $users['email']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" name="name" id="staticEmail" value="<?= $users['name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role_id" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-6">
                                    <select name="role_id" id="role_id" class="select2 form-control mb-3 custom-select" required>
                                        <?php foreach ($user_role as $us) : ?>
                                            <option <?php if ($us['id'] == $users['role_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $us['id']; ?>"><?= $us['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_active" class="col-sm-3 col-form-label">Active</label>
                                <div class="col-sm-8">
                                    <?php if ($users['is_active'] == 1) {
                                        echo '<div class="custom-control custom-checkbox">
                                        <input type="radio" checked id="is_active1" value="1" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" id="is_active2" value="0" name="is_active" class="form-check-input custom-control-input">
                                        <label class="custom-control-label" for="is_active2">No</label>
                                    </div>';
                                    } else {
                                        echo '<div class="custom-control custom-checkbox">
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
                            <div class="form-group row">
                                <label for="role_id" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">
                                    <a class="btn btn-outline-secondary" href="<?= base_url('Administrator/users'); ?>"><i class="mdi mdi-undo-variant"></i> Back</a>
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