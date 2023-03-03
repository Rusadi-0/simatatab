  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="">
          <?= $this->session->flashdata('message'); ?>
        </div>
        <!-- Register -->
        <h1 style="z-index: 999;" class="text-center display-2 mt-3"><strong>SIMa<span class="text-primary">Ta</span></strong></h1>

        <h5 class="text-center pb-0 mb-0">Sistem Informasi Manajemen <span class="text-primary">Ta</span>mu</h5>
        <div class="card mt-4">
          <div class="card-body">
            <!--  Logo -->
            <form id="formAuthentication" class="mb-3 mt-2" method="post" action="<?= base_url('auth'); ?>">
              <div class="mb-3">
                <label for="username" class="form-label"><?php if (form_error('username')) {
                                                            echo form_error('username', '<div class="text-danger pl-3">', '</div>');
                                                          } else {
                                                            echo "nama pengguna";
                                                          } ?></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Pengguna" autofocus value="<?= set_value('username') ?>" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label"><?php if (form_error('password')) {
                                                            echo form_error('password', '<div class="text-danger pl-3">', '</div>');
                                                          } else {
                                                            echo "kata sandi";
                                                          } ?></label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="<?= set_value('password') ?>" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <!-- <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div> -->
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="login" type="submit">Masuk</button>
              </div>
            </form>


            <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> -->
          </div>
        </div>
        <div class="text-center mt-1">
          Copyright © <?php if(date('Y') == 2023){echo "2023";}else{echo "2023 - " . date('Y');}?>, <a href="https://bapenda.tabalongkab.go.id" target="_blank" class="text-secondary fw-bolder">BAPENDA Kab.Tabalong</a>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->