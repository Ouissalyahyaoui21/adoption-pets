<?php
include("db.php");
$query = "SELECT * FROM found_animals";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Pets Haven 🐾</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root{
    --pink:#db87bbdc;
    --purple:#7b2cbf;
}

*{
    margin:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
    text-decoration:none;
    transition:.2s linear;
}

/* ====== تعديل خلفية الصفحة ====== */
body{
    background:#ffffff; /* خلفية بيضاء */
    padding-top:85px;
    color:#4a2c5f;
}

/* ================= HEADER ================= */

header{
    position:fixed;
    top:0; left:0; right:0;
    background:#fff;
    padding:1rem 6%;
    display:flex;
    align-items:center;
    justify-content:space-between;
    z-index:1000;
    box-shadow:0 .3rem .8rem rgba(0,0,0,.1);
}

header .logo{
    font-size:2.2rem;
    font-weight:bold;
    color:#333;
    display:flex;
    align-items:center;
    gap:2px;
    animation: logoPulse 3s infinite;
}

header .logo span{
    color:var(--pink);
}

@keyframes logoPulse {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.05); }
    100% { transform: scale(1); }
}

header .logo:hover{
    transform: translateY(-2px) rotate(-1deg);
}

header .navbar a{
    font-size:1.6rem;
    padding:0 .2rem;
    color:#666;
    letter-spacing:0.4px;
    white-space:nowrap;
}

header .navbar a:hover{
    color:var(--pink);
}

header .icons a{
    font-size:2.2rem;
    color:#333;
    margin-left:1rem;
}

header .icons a:hover{
    color:var(--pink);
}

/* ================= PAGE ================= */

h1{
    text-align:center;
    font-size:2.5rem;
    margin-bottom:35px;
}

.pets-container{
    display:flex;
    flex-wrap:wrap;
    gap:30px;
    justify-content:center;
}

.pet-card{
    background:#fff;
    border-radius:22px;
    padding:20px;
    width:270px;
    text-align:center;
    box-shadow:0 12px 30px rgba(0,0,0,.12);
}

.pet-card:hover{
    transform:translateY(-8px) scale(1.03);
}

.pet-card img{
    width:185px;
    height:185px;
    object-fit:cover;
    border-radius:50%;
    border:5px solid var(--pink);
    margin-bottom:15px;
}

.pet-card h3{
    color:var(--purple);
    font-size:1.4rem;
}

.pet-card p{
    font-size:.9rem;
    line-height:1.6;
}

.cute{
    font-style:italic;
    color:#d63384;
    margin:10px 0;
}

button{
    background:linear-gradient(135deg,#ff8edb,#c77dff);
    border:none;
    border-radius:30px;
    padding:10px 24px;
    color:#fff;
    font-size:1rem;
    cursor:pointer;
}

button:hover{
    transform:scale(1.08);
}
</style>
</head>

<body>

<header>
    <a href="#" class="logo">
        <span>P</span>🐶<span>E</span><span>T</span><span>S</span>_<span>H</span><span>A</span><span>V</span><span>E</span><span>N</span>
    </a>

    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Products</a>
        <a href="#">Review</a>
        <a href="#">Adopt</a>
        <a href="PetsSpot.html">PetsSpot</a>
        <a href="ai.html">Ask AI</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-user"></a>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-paw"></a>
    </div>
</header>

<h1>Adopt an Animal 🐾</h1>

<div class="pets-container">
<?php while($animal = mysqli_fetch_assoc($result)){

// تعديل المسار إلى مجلد uploads الصحيح
$imagePath = !empty($animal['image']) ? $animal['image'] : "uploads/default.png";
if(!file_exists(__DIR__.'/'.$imagePath)){
    $imagePath="uploads/default.png";
}
?>
<div class="pet-card">
<img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($animal['animal_name']) ?>">
<h3><?= htmlspecialchars($animal['animal_name']) ?></h3>
<p>
Type: <?= htmlspecialchars($animal['animal_type']) ?><br>
Age: <?= htmlspecialchars($animal['age']) ?> years<br>
Health: <?= htmlspecialchars($animal['health_status']) ?><br>
Size: <?= htmlspecialchars($animal['size']) ?><br>
Location: <?= htmlspecialchars($animal['location']) ?>
</p>
<p class="cute">"Adopt me, I’m waiting for you 🥺"</p>

<button onclick="location.href='adopt.php?id=<?php echo $animal['AUTO_INCREMEN']; ?>'">
    Adopt Me 💕
</button>

</div>
<?php } ?>
</div>

</body>
</html>
