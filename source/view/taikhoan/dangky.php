<div class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white fw-bold">ĐĂNG KÝ THÀNH VIÊN</div>
                <div class="card-body">
                    <form action="index.php?act=dangky" method="post">
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-fill"></i>
                                <span class="text-dark">Họ tên</span></label>
                            <input class="form-control" type="text" name="hoten">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-envelope-fill"></i>
                                <span class="text-dark">Email</span>
                            </label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-person-fill" style="color: black;"></i><span class="text-dark">Tên đăng
                                    nhập</span>
                            </label><br>
                            <input class="form-control" type="text" name="user">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-key-fill text-dark"></i><span class="text-dark">
                                    Mật khẩu</span></label>

                            <input class="form-control" type="password" name="pass">

                        </div>
                        <div class="mb-3 text-center">

                            <input type="submit" class="btn btn-success" value="Đăng ký" name="dangky">
                            <input type="reset" class="btn btn-success" value="Nhập lại">

                        </div>
                    </form>
                    <h2 class="mt-3 fs-5 text-success text-center">
                        <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                    </h2>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <?php include "view/boxright.php"; ?>
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