<!-- HEADER مع CSS مدمج -->
<style>
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

header input#toggler{
    display:none;
}

header label[for="toggler"]{
    font-size:2rem;
    cursor:pointer;
    display:none; /* يمكن تغييره لعرض أيقونة الهامبرغر على الموبايل */
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
    color:#db87bbdc;
}

@keyframes logoPulse {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.05); }
    100% { transform: scale(1); }
}

header .navbar a{
    font-size:1.6rem;
    padding:0 .5rem;
    color:#666;
    letter-spacing:0.4px;
    white-space:nowrap;
    text-decoration:none;
}

header .navbar a:hover{
    color:#db87bbdc;
}

header .icons a{
    font-size:2.2rem;
    color:#333;
    margin-left:1rem;
}

header .icons a:hover{
    color:#db87bbdc;
}
</style>

<header>
    <input type="checkbox" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">
        <span class="P">P</span>
        <span class="E">E</span>
        <span class="T">T</span>
        <span class="S">S</span>
        <span class=" ">_</span>
        <span class="H">H</span>
        <span class="A">A</span>
        <span class="V">V</span>
        <span class="E">E</span>
        <span class="N">N</span>
    </a>

    <nav class="navbar">
        <!-- تعديل الرابط ليعيد إلى Adopt Pet -->
        <a href="adopt_pets.php">Animals</a>
    </nav>

    <div class="icons">
        <a href="login.php" class="fas fa-user"></a>
        <a href="favorites.php" class="fas fa-heart"></a>
        <a href="adopt.php" class="fas fa-paw adopt"></a>
    </div>
</header>
