        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="text-center mb-3">
            <div class="mt-4 ">
              <a href="<?= base_url('/'); ?>" class="display-5">
                <span class="menu-text fw-bolder">SIMa<span class="text-primary">Ta</span></span>
              </a>
            </div>
            <small>Sistem Infomasi Manajemen <span class="text-primary">Ta</span>mu</small>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <?php $role_id = $this->session->userdata('role_id'); ?>
            <?php
            $qMenu = "SELECT * FROM `user_access_menu`";
            $menu = $this->db->query($qMenu)->result_array();
            ?>
            <?php foreach ($menu as $m) : ?>
              <?php if ($m['role_id'] == $role_id) : ?>
                <?php
                $qNamaMenu = "SELECT * FROM `user_menu`";
                $namaMenu = $this->db->query($qNamaMenu)->result_array();
                ?>

                <?php foreach ($namaMenu as $um) : ?>
                  <?php if ($um['id_menu'] == $m['menu_id']) : ?>
                    <?php if ($um['line'] == 1) : ?>
                      <li class="menu-header small text-uppercase">
                        <span class="menu-header-text"><?= $um['controllers']; ?></span>
                      </li>
                    <?php endif; ?>
                    <li class="menu-item <?php if ($um['menu'] == $title) {
                                            echo "active";
                                          } elseif ($openMenu == $um['menu']) {
                                            echo "active open";
                                          } ?> ">
                      <a href="<?php if ($um['sub'] == 0) {
                                  echo base_url('/') . $um['controllers'] . "/" . $um['url'];
                                } else {
                                  echo "javascript:void(0);";
                                } ?>" class="menu-link <?php if ($um['sub'] == 1) {
                                                    echo "menu-toggle";
                                                  } ?>">
                        <i class="menu-icon tf-icons <?= $um['icon']; ?>"></i>
                        <div data-i18n="Analytics"><?= $um['menu']; ?></div>
                      </a>
                      <?php if ($um['sub'] == 1) : ?>
                        <ul class="menu-sub">
                          <?php
                          $qSub = "SELECT * FROM `user_sub_menu` WHERE `user_sub_menu`.`id_menu` = " . $um['id_menu'];
                          $sub = $this->db->query($qSub)->result_array();
                          ?>
                          <?php foreach ($sub as $usm) : ?>
                            <li class="menu-item <?php if ($title == $usm['subMenu']) {
                                                    echo "active";
                                                  } ?>">
                              <a href="<?= base_url('/') . $um['controllers'] . "/" . $usm['url']; ?>" class="menu-link">
                                <div data-i18n="Without menu"><?= $usm['subMenu']; ?></div>
                              </a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>


              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </aside>
        <!-- / Menu -->