<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('Dashboard');
        }

        $this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Log In';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Dashboard');
                    } else {
                        redirect('Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
                    <strong>Nama Pengguna</strong> atau <strong>Kata Sandi</strong> Salah!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
                <strong>Nama Pengguna</strong> tidak aktif!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
            <strong>Nama Pengguna</strong> tidak ada!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|valid_username|is_unique[user.username]', [
            'is_unique' => 'Alamat username sudah <strong>Terdaftar!</strong>'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'name' => ucwords(htmlspecialchars($this->input->post('name', true))),
                'username' => htmlspecialchars($username),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'username' => $username,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendusername($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><strong>Selamat!</strong> Akun anda telah dibuat. Silakan aktifkan akun Anda</div>');
            redirect('auth');
        }
    }


    private function _sendusername($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlusername.com',
            'smtp_user' => 'hadigbd@gmail.com',
            'smtp_pass' => 'hadirusadi123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->username->initialize($config);

        $this->username->from('hadigbd@gmail.com', 'SIMAS');
        $this->username->to($this->input->post('username'));

        if ($type == 'verify') {
            $this->username->subject('Verifikasi akun');
            $this->username->message('iKlik tautan ini untuk memverifikasi akun Anda : <a href="' . base_url() . 'auth/verify?username=' . $this->input->post('username') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->username->subject('Reset Password');
            $this->username->message('Klik tautan ini untuk mengatur ulang password Anda : <a href="' . base_url() . 'auth/resetpassword?username=' . $this->input->post('username') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->username->send()) {
            return true;
        } else {
            $this->username->print_debugger();
            echo '<br><br><center><h1>Reset Password GAGAL</h1><p> Hubungi Admin: 085210013995</p></center<br>Kembali halaman <a href="../auth/">Login</a>';
            die;
        }
    }


    public function verify()
    {
        $username = $this->input->get('username');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('username', $username);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['username' => $username]);

                    $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert">' . $username . ' sudah <strong>Active!</strong> Silahkan login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['username' => $username]);
                    $this->db->delete('user_token', ['username' => $username]);

                    $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">Mengaktifkan akun gagal! <strong>Token expired..!!</strong></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">Mengaktifkan akun gagal! <strong>Token salah..!!</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">Mengaktifkan akun gagal! username salah..!!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        // $this->session->set_flashdata('message', '<div class="alert fade show notifikasi coy lkl display-7" data-dismiss="alert" role="alert">Berhasil logout!</div>');
        redirect('/');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|valid_username');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username');
            $user = $this->db->get_where('user', ['username' => $username, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'username' => $username,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendusername($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert">Silakan periksa username Anda untuk mengatur ulang password Anda!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">username tidak terdaftar atau diaktifkan!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $username = $this->input->get('username');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_username', $username);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">Reset password gagal! Token salah..!!.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger" data-dismiss="alert" role="alert">Reset password gagal! username salah..!!</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_username')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password baru', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password baru', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $username = $this->session->userdata('reset_username');

            $this->db->set('password', $password);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->unset_userdata('reset_username');

            $this->db->delete('user_token', ['username' => $username]);

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert">Password telah diubah! Silahkan login.</div>');
            redirect('auth');
        }
    }
}
