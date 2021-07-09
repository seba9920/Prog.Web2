   
    
    <!-- Sidebar -->
    <!--<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">-->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
        <img class="img-fluid" src="img/logo-bootstrap-shoping-cart.png" width="124px" height="80" >
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $IndexSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="index.php">
        <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>   
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $PeliculasSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="peliculas.php">
        <i class="fas fa-video"></i>
          <span>Peliculas</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $GeneroSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="generos.php">
        <i class="fas fa-cubes"></i>
          <span>Géneros</span></a>
      </li>
      <li class="nav-item active <?= $SubgeneroSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="subgenero.php">
        <i class="fas fa-cubes"></i>
          <span>Subgéneros</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $ClasificacionSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="clasificacion.php">
        <i class="fas fa-cubes"></i>
          <span>Clasificación</span></a>
      </li>             
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $AdminSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-user-circle"></i>
          <span>Admin</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $UsuarioSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="user.php">
          <i class="fas fa-user-circle"></i>
          <span>Usuarios</span></a>
      </li>
       <!-- Nav Item - Tables -->
       <li class="nav-item active <?= $PerfilSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="perfiles.php">
          <i class="fas fa-user-circle"></i>
          <span>Perfiles</span></a>
      </li>
       <!-- Nav Item - Tables -->
       <li class="nav-item active <?= $PermisoSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="permisos.php">
          <i class="fas fa-user-circle"></i>
          <span>Permisos</span></a>
      </li>
      
      <!-- Nav Item - Tables -->
      <li class="nav-item active <?= $ComentarioSidebar?'bg-danger':'' ?>">
        <a class="nav-link" href="comentarios.php">
        <i class="fas fa-comment-alt"></i>
          <span>Comentarios</span></a>
      </li>       
         

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
     