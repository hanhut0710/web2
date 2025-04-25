<?php 
    require_once "user.php";
     
    $user = new User();


    if(isset($_POST['btnAdd'])&&($_POST['btnAdd'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address_line = $_POST['address_line'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        if($user -> checkDuplicateEmail($email)){
            // header('Location: ../index.php?page=addUser&error=email');
            // window.location.href = '../index.php?page=addUser';
            echo "<script>
            alert('Email đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        if($user -> checkDuplicatePhone($phone)){
            // header('Location: ../index.php?page=addUser&error=phone');
            echo "<script>
            alert('Số điện thoại đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        if($user -> checkDuplicateUsername($username)){
            // header('Location: ../index.php?page=addUser&error=username');
            echo "<script>
            alert('Tài khoản đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        $user -> insert($fullname, $email, $phone, $address_line, $ward, $district, $city, $username, $password, $status);
        // header('Location: ../index.php?page=user');
        echo "<script>
            alert('Thêm khách hàng thành công!');
            window.location.href = '../index.php?page=user';
            </script>";
    }

    if(isset($_POST['btnUpdate'])&&($_POST['btnUpdate'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $accID = $_POST['acc_id'];
        $address_line = $_POST['address_line'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $currentUser = $user -> getInforUserByAccId($accID);

        if($user -> checkDuplicateEmail($email) && $email !== $currentUser['email']){
            echo "<script>
            alert('Email đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        if($user -> checkDuplicatePhone($phone) && $phone !== $currentUser['phone']){
            echo "<script>
            alert('Số điện thoại đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        if($user -> checkDuplicateUsername($username) && $username !== $currentUser['username']){
            echo "<script>
            alert('Tài khoản đã tồn tại!');
            window.history.back();
            </script>";
            exit;
        }

        $user -> update($fullname, $email, $phone,$accID, $address_line, $ward, $district, $city, $username, $password, $status);
        echo "<script>
        alert('Sửa khách hàng thành công!');
        window.location.href = '../index.php?page=user';
        </script>";
    }


        if(isset($_GET['act'])&& ($_GET['act']) === 'toggleStatus'){
            $accID = $_GET['id'];
            $toggle = $user -> toggleStatus($accID);
            if($toggle){
                echo "<script>
                alert('Thay đổi trạng thái khách hàng thành công!');
                window.location.href = '../index.php?page=user';
                </script>";
            }
        }
?>