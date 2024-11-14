<?php
$id = 1;
$sql = "SELECT * FROM mantec_user WHERE id = '$id'";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
// print_r($_POST);
if (isset($_POST) && !empty($_POST)) {
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();
    $user = $_POST['username'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['ph_number'];

    // if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
    //     $extension = array("jpeg", "jpg", "png", "gif");
    //     $target = 'upload/admin/';
    //     $filename = $_FILES['image']['name'];
    //     $filetmp = $_FILES['image']['tmp_name'];
    //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //     if (in_array($ext, $extension)) {
    //         if (!file_exists($target . $filename)) {
    //             if (move_uploaded_file($filetmp, $target . $filename)) {
    //                 $filename = $filename;
    //             } else {
    //                 $alert = '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=add";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         } else {
    //             $newfilename = time() . $filename;
    //             if (move_uploaded_file($filetmp, $target . $newfilename)) {
    //                 $filename = $newfilename;
    //             } else {
    //                 $alert = '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=add";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         }
    //     } else {
    //         $alert = '<script type="text/javascript">';
    //         $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
    //         $alert .= 'window.location.href = "?page=admin";';
    //         $alert .= '</script>';
    //         echo $alert;
    //         exit();
    //     }
    // } else {
    //     $filename = $oldimage;
    // }

    // echo $filename;
    // exit();
    $sql = "UPDATE mantec_user SET 
        username = '$user', 
        email = '$email',  
        phone = '$phone'  
        address = '$address',
        firstname = '$name', 
    WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("อัปเดตข้อมูลเกี่ยวกับฉันสำเร็จ");';
        $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">หน้าจัดการข้อมูลเกี่ยวกับฉัน</h1>
    </div>
    <div class="col-auto">
        <a href="?page=admin" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้" value="<?= $result['username'] ?>" required disabled>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อ" value="<?= $result['name'] ?>" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" name="name" placeholder="นามสกุล" value="<?= $result['name'] ?>" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">รายละเอียด</label>
                        <textarea name="description" class="form-control" style="height: 130px"><?= $result['description'] ?></textarea>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ที่อยู่</label>
                        <textarea name="address" class="form-control" style="height: 100px"><?= $result['address'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">อีเมล</label>
                        <input type="email" class="form-control" name="email" placeholder="อีเมล" value="<?= $result['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" name="ph_number" placeholder="เบอร์ติดต่อ" value="<?= $result['ph_number'] ?>" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->