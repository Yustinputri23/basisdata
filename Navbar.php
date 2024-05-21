<nav class-Tnavbar navbar-expand-ig bg-body tertiary" data-bs-theme-"dark"> 
<div class="container-fluid">    
<a class="navbar-brand" href="admin.php">Kasir</a> 
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
data-bs-targets= "#navbarSupportedContent" aria- controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ne-auto mb-2 mb-lg-0">
        <li class="nav-item">
           <a class="nav-link" aria-currrent="page" 
        href="admin_login.php">Home</a>
    </li>
        <li class="nav-item">
            <a class="nav-link" href="admin_login.php?url=produk">Produk</a>
</li> 
<li class="nav-item"> 
    <a class="nav-link" 
    href="admin.php?url-pelanggan">Pelanggan</a>
</li> 
<li class="nav-item"> 
    <a class="nav-link" 
    href="../admin/transaksi.php">Transaksi</a>
 </li> 
</ul>
 <form class="d-flex justify-content-center align-items-center gap- 2">
 <a onclick="return confirm('Apakah anda yakin ingin logout?')">
  href="../logout.php" class="btn btn-danger">Logout</a> 
</form>
 </div>
</div>
 </nav>