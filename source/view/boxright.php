<div class="container ">
    <!-- Tài Khoản Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="rounded-top bg-danger border padding text-white text-center py-3">
                <h3>
                    <!-- Nhúng Bootstrap Icons -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
                    <!-- Biểu tượng tài khoản -->
                    <i class="bi bi-person-fill"></i> TÀI KHOẢN
                </h3>
            </div>
            <div class=" border rounded p-4 bg-light">
                <?php
                 if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
                ?>
                <div class="text-muted">
                    Xin chào !<br>
                    <?= isset($user) ? $user : '' ?>
                </div>
                <div class="list-group">
                    <li class="list-group-item">
                        <a href="index.php?act=mybill" class="text-decoration-none">
                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg style="width: 31px; height: 31px;" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 504 504" style="enable-background:new 0 0 504 504;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path style="fill:#B8BAC0;" d="M485.617,114.305C484.125,112.828,482.102,112,480,112c-0.031,0-0.07,0-0.109,0l-374.5,4.941
                                            c-2.531,0.035-4.906,1.27-6.383,3.328c-1.484,2.059-1.898,4.699-1.125,7.113l62.5,195.059c1.063,3.313,4.141,5.559,7.617,5.559
                                            h280c22.055,0,40-17.945,40-40V120C488,117.859,487.141,115.809,485.617,114.305z M208,288c0,4.418-3.578,8-8,8s-8-3.582-8-8V168
                                            c0-4.418,3.578-8,8-8s8,3.582,8,8V288z M248,288c0,4.418-3.578,8-8,8s-8-3.582-8-8V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z
                                            M288,288c0,4.418-3.578,8-8,8s-8-3.582-8-8V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z M328,288c0,4.418-3.578,8-8,8s-8-3.582-8-8
                                            V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z M368,288c0,4.418-3.578,8-8,8s-8-3.582-8-8V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z
                                            M408,288c0,4.418-3.578,8-8,8s-8-3.582-8-8V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z M448,288c0,4.418-3.578,8-8,8s-8-3.582-8-8
                                            V168c0-4.418,3.578-8,8-8s8,3.582,8,8V288z" />
                                    </g>
                                    <g>
                                        <circle style="fill:#5C546A;" cx="144" cy="416" r="32" />
                                    </g>
                                    <g>
                                        <circle style="fill:#5C546A;" cx="456" cy="416" r="32" />
                                    </g>
                                    <g>
                                        <path style="fill:#8A8895;" d="M492,108H108c-0.316,0-0.614,0.069-0.924,0.093l-6.85-23.039C96.539,72.656,84.937,64,72.008,64
                                            L72,64.001V64H56v16h16v-0.001L72.008,80c5.898,0,11.195,3.953,12.875,9.613l73.242,246.348
                                            c3.032,10.188,8.988,18.919,16.632,25.696l-37.156,49.542c-2.656,3.535-1.938,8.551,1.602,11.199
                                            c1.438,1.082,3.117,1.602,4.789,1.602c2.438,0,4.836-1.105,6.406-3.199l37.713-50.286c7.295,3.45,15.317,5.485,23.693,5.485H448
                                            v40c0,4.418,3.578,8,8,8s8-3.582,8-8v-40h16c4.422,0,8-3.582,8-8s-3.578-8-8-8H211.805c-17.563,0-33.328-11.762-38.336-28.602
                                            L114.184,132H492c6.625,0,12-5.371,12-12S498.625,108,492,108z" />
                                    </g>
                                    <g>
                                        <path style="fill:#5C546A;" d="M56,88H16C7.163,88,0,80.837,0,72v0c0-8.837,7.163-16,16-16h40c8.837,0,16,7.163,16,16v0
			                                C72,80.837,64.837,88,56,88z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg> Đơn hàng của tôi
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="index.php?act=quenmk" class="text-decoration-none">
                            <!-- Nhúng Bootstrap Icons -->
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

                            <!-- Biểu tượng "Quên mật khẩu" -->
                            <i class="bi bi-question-circle-fill"></i> Quên mật khẩu
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="index.php?act=doimk" class="text-decoration-none">
                            <!-- Nhúng Bootstrap Icons -->
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

                            <!-- Biểu tượng "Quên mật khẩu" -->
                            <i class="bi bi-key-fill"></i> Đổi mật khẩu
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="index.php?act=edit_taikhoan" class="text-decoration-none">
                            <!-- Biểu tượng cập nhật tài khoản -->
                            <i class="bi bi-person-gear"></i> Cập nhật tài khoản
                        </a>
                    </li>
                    <?php if ($role == 1) { ?>
                    <li class="list-group-item">
                        <a href="Admin/index_admin.php" class="text-decoration-none">
                            <!-- Biểu tượng đăng nhập Admin -->
                            <i class="bi bi-person-badge"></i> Đăng nhập Quản lý
                        </a>
                    </li>
                    <?php } elseif ($role == 0) { ?>
                    <li class="list-group-item">
                        <a href="Admin/index_admin.php" class="text-decoration-none">
                            <i class="bi bi-shield-lock-fill"></i> Đăng nhập Admin
                        </a>
                    </li>
                    <?php } ?>
                    <li class="list-group-item">
                        <a href="index.php?act=thoat" class="text-decoration-none">
                            <!-- Biểu tượng đăng xuất -->
                            <i class="bi bi-box-arrow-right"></i> Đăng xuất
                        </a>
                    </li>
                </div>
                <?php
        } else {
        ?>
                <form action="index.php?act=dangnhap" method="post">
                    <div class="mb-3">
                        <i class="bi bi-person-fill" style="color: black;"></i>
                        <span class="text-dark">Tên đăng nhập</span><br>
                        <input class="form-control" type=" text" name="user">
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-key-fill text-dark"></i>
                        <span class="text-dark">Mật khẩu</span><br>
                        <div class="input-group">
                            <input class="form-control" id="password" type=" password" name="pass"><br>
                            <button type="button" class="input-group-text" id="toggle-password">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name=""> Ghi nhớ tài khoản?<br>
                    </div>
                    <div class=" mb-3">
                        <input class="btn btn-primary" type="submit" value="Đăng nhập" name="dangnhap" URL="">
                    </div>
                    <li class="list-unstyled">
                        <a class="text-decoration-none" href="index.php?act=quenmk"><i
                                class="bi bi-question-circle-fill"></i> Quên mật khẩu</a>
                    </li>
                    <li class="list-unstyled">
                        <a class="text-decoration-none" href="index.php?act=dangky"><i
                                class="bi bi-person-plus-fill"></i> Đăng ký thành viên</a>
                    </li>
                </form>

                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Danh Mục Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="rounded-top bg-danger padding text-white text-center py-3">
                <h3>
                    <!-- Nhúng Bootstrap Icons -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
                    <!-- Biểu tượng danh mục -->
                    <i class="bi bi-grid-fill"></i> DANH MỤC
                </h3>
            </div>
            <div class="boxcontent1 menudoc">
                <ul class="list-group nav-link">
                    <?php
                    foreach ($dsdm as $dm) {
                        extract($dm);
                        $linkdm = "index.php?act=sanpham&iddm=" . $id;
                        echo '<li class="list-group-item"><a class="text-decoration-none text-black" href="' . $linkdm . '">' . $name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- TOP 10 YÊU THÍCH Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="rounded-top bg-danger padding text-white text-center py-3">
                <h3>
                    <!-- Nhúng Bootstrap và Bootstrap Icons -->
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
                    <!-- Biểu tượng Top 10 Yêu Thích -->
                    <i class="bi bi-star-fill text-white"></i> </i> TOP 5 YÊU THÍCH
                </h3>
            </div>
            <div class="boxcontent1 border rounded p-4 bg-light">
                <div class="list-group">
                    <?php
                    foreach ($dstop10 as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $idpro;
                        $img = $img_path . $img;
                        echo '<div class="rounded-bottom col-6 col-md-6 mb-3">
                        <div class="card">
                            <a href="' . $linksp . '">
                                <img 
                                    style="height: 100px; width: 100%; object-fit: contain;" 
                                    src="' . $img . '" 
                                    class="card-img-top" 
                                    alt="' . $name . '">
                            </a>
                            <div class="card-body">
                                <a href="' . $linksp . '" class="card-title text-decoration-none">' . $name . '</a>
                            </div>
                        </div>
                    </div>';
                
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
// Lấy đối tượng nút ẩn/hiện và input mật khẩu
const togglePassword = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password');

// Thêm sự kiện click cho nút ẩn/hiện mật khẩu
togglePassword.addEventListener('click', function() {
    // Kiểm tra kiểu mật khẩu hiện tại, nếu là 'password' thì chuyển thành 'text' và ngược lại
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;

    // Thay đổi biểu tượng con mắt khi ẩn/hiện mật khẩu
    this.innerHTML = type === 'password' ? '<i class="bi bi-eye-fill"></i>' :
        '<i class="bi bi-eye-slash-fill"></i>';
});
</script>