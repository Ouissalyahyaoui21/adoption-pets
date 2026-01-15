<?php
require_once __DIR__ . "/db.php";

// التأكد من تمرير id في الرابط
if (!isset($_GET['id'])) {
    die("Animal not found");
}

$id = (int) $_GET['id'];

// جلب بيانات الحيوان من جدول found_animals حسب id
$query = "SELECT * FROM found_animals WHERE AUTO_INCREMEN = $id";
$result = mysqli_query($conn, $query);
$animal = mysqli_fetch_assoc($result);

if (!$animal) {
    die("Animal not found");
}

// --- تعيين مسار الصورة بطريقة آمنة ---
$uploadsDir = __DIR__ . "/Uploads/";
$defaultImage = "Uploads/default.png";

$animalImage = isset($animal['image']) ? trim($animal['image']) : "";

if ($animalImage && file_exists($uploadsDir . $animalImage)) {
    $imageFile = "Uploads/" . $animalImage;
} else {
    $imageFile = $defaultImage;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adopt an Animal - <?php echo htmlspecialchars($animal['animal_name']); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { 
            padding-top:85px; 
            font-family:'Poppins', sans-serif; 
            background:#ffffff;
            color:#4a2c5f; 
        }

        .pet-details { max-width:600px; margin:40px auto; background:#fff; padding:25px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,.1); }
        .pet-details img { width:250px; height:250px; object-fit:cover; border-radius:50%; border:5px solid #db87bbdc; display:block; margin:0 auto 20px; }
        .pet-details h2 { text-align:center; color:#7b2cbf; margin-bottom:15px; }
        .pet-details ul { list-style:none; padding:0; line-height:1.6; }
        .pet-details ul li { margin-bottom:6px; }

        .adoption-container { max-width:600px; margin:40px auto; background:#fff; padding:30px 25px; border-radius:25px; box-shadow:0 12px 30px rgba(0,0,0,.15); }
        .adoption-container h2 { text-align:center; color:#7b2cbf; margin-bottom:25px; }
        .adoption-container input,
        .adoption-container textarea { width:100%; padding:14px 18px; margin-bottom:15px; border-radius:15px; border:1px solid #ccc; font-size:1rem; font-family:'Poppins', sans-serif; box-sizing:border-box; }
        .adoption-container textarea { min-height:100px; }

        .checkbox-container { margin-bottom:20px; }
        .custom-checkbox { position: relative; display: block; padding-left:35px; cursor: pointer; font-size:0.95rem; user-select: none; color:#4a2c5f; }
        .custom-checkbox input { position: absolute; opacity: 0; cursor: pointer; }
        .custom-checkbox .checkmark { position: absolute; top:0; left:0; height:22px; width:22px; background-color:#eee; border-radius:6px; border:2px solid #7b2cbf; }
        .custom-checkbox:hover .checkmark { background-color:#f3e5ff; }
        .custom-checkbox input:checked ~ .checkmark { background-color:#7b2cbf; border-color:#7b2cbf; }
        .custom-checkbox .checkmark:after { content:""; position:absolute; display:none; }
        .custom-checkbox input:checked ~ .checkmark:after { display:block; }
        .custom-checkbox .checkmark:after { left:7px; top:2px; width:6px; height:12px; border: solid white; border-width:0 2px 2px 0; transform: rotate(45deg); }

        .adoption-container button { width:100%; background:linear-gradient(135deg,#ff8edb,#c77dff); color:#fff; border:none; border-radius:30px; padding:14px; font-size:1.15rem; cursor:pointer; transition:all 0.3s ease; }
        .adoption-container button:hover { transform:scale(1.05); }

        .cute { color:#d63384; font-style:italic; text-align:center; margin:15px 0; display:block; }
    </style>
</head>
<body>

<?php include("header.php"); ?>

<div id="pageContent">

  <div class="pet-details">
    <img src="<?php echo htmlspecialchars($imageFile); ?>" alt="<?php echo htmlspecialchars($animal['animal_name']); ?>">
    <h2><?php echo htmlspecialchars($animal['animal_name']); ?></h2>
    <ul>
      <li><strong>Type:</strong> <?php echo htmlspecialchars($animal['animal_type']); ?></li>
      <li><strong>Age:</strong> <?php echo htmlspecialchars($animal['age']); ?> year(s)</li>
      <li><strong>Health:</strong> <?php echo htmlspecialchars($animal['health_status']); ?></li>
      <li><strong>Friendly:</strong> <?php echo htmlspecialchars($animal['friendly']); ?></li>
      <li><strong>Urgent:</strong> <?php echo htmlspecialchars($animal['urgent']); ?></li>
      <li><strong>Size:</strong> <?php echo htmlspecialchars($animal['size']); ?></li>
      <li><strong>Location:</strong> <?php echo htmlspecialchars($animal['location']); ?></li>
      <li><strong>Notes:</strong> <?php echo htmlspecialchars($animal['notes']); ?></li>
    </ul>
  </div>

  <div class="adoption-container">
    <h2>Adopt This Animal 🐾</h2>

    <form id="adoptionForm">
      <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($animal['AUTO_INCREMEN']); ?>">

      <input type="text" name="first" placeholder="First Name" required>
      <input type="text" name="last" placeholder="Last Name" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <input type="text" name="address" placeholder="Address" required>
      <textarea name="reason" placeholder="Why do you want to adopt this adult animal?" required></textarea>

      <div class="checkbox-container">
        <label class="custom-checkbox">
          <input type="checkbox" name="can_take_care" required>
          <span class="checkmark"></span>
          I can take care of this animal
        </label>
      </div>

      <button type="submit">Confirm Adoption</button>
    </form>
  </div>

</div>

<div id="successCard"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$("#adoptionForm").submit(function(e){
    e.preventDefault();

    // التحقق من اسم التشيك بوكس الصحيح
    if(!$("input[name='can_take_care']").is(":checked")){
        alert("You must agree that you can take care of this animal.");
        return;
    }

    $.ajax({
        url: "submit_adoption.php",
        method: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res){
            if(res.status === "success"){
                $("#pageContent").fadeOut(400);
                $("#successCard").html(`
                    <div class="pet-card success-card">
                        <h3>🐾 Adoption Confirmed</h3>
                        <p class="cute">
                            Thank you <strong>${res.adopter_name}</strong><br>
                            for adopting <strong>${res.pet_name}</strong> ❤️
                        </p>
                        <p>We hope you will give it a warm and loving home.</p>
                    </div>
                `).hide().fadeIn(600);
            } else {
                alert("Error: " + res.message);
            }
        }
    });
});
</script>

</body>
</html>
