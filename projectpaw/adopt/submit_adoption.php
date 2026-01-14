<?php
// submit_adoption.php
include("../config/db.php");

// التحقق من وجود جميع الحقول المطلوبة
if (!isset($_POST['pet_id'], $_POST['first'], $_POST['last'], $_POST['phone'], $_POST['address'], $_POST['reason'], $_POST['can_take_care'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing required fields."
    ]);
    exit;
}

// جلب البيانات من الفورم مع تنظيف بسيط
$pet_id = (int) $_POST['pet_id'];
$first  = mysqli_real_escape_string($conn, trim($_POST['first']));
$last   = mysqli_real_escape_string($conn, trim($_POST['last']));
$phone  = mysqli_real_escape_string($conn, trim($_POST['phone']));
$address = mysqli_real_escape_string($conn, trim($_POST['address']));
$reason  = mysqli_real_escape_string($conn, trim($_POST['reason']));
$care    = isset($_POST['can_take_care']) ? 1 : 0;

// إدراج البيانات في جدول adoptions
$sql = "INSERT INTO adoptions 
(pet_id, first_name, last_name, phone, address, reason, can_take_care)
VALUES 
($pet_id, '$first', '$last', '$phone', '$address', '$reason', $care)";

if (mysqli_query($conn, $sql)) {

    // تحديث حالة الحيوان إلى Adopted
    mysqli_query($conn, "UPDATE animals SET status = 'Adopted' WHERE id = $pet_id");

    // جلب اسم الحيوان لإظهار رسالة النجاح
    $petQuery = mysqli_query($conn, "SELECT name FROM animals WHERE id = $pet_id");
    $pet = mysqli_fetch_assoc($petQuery);

    // إرسال رد JSON إلى الفورم
    echo json_encode([
        "status" => "success",
        "pet_name" => $pet['name'] ?? "the animal",
        "first" => $first,
        "last"  => $last
    ]);
} else {
    // في حالة الخطأ
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}
?>
