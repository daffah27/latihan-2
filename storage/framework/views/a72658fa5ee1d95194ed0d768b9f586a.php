

<header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">LAPORKI</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 <?php echo e(Request::is('/') ? 'active' : ''); ?>" aria-current="page" href="/">Home</a>
        <a class="nav-link fw-bold py-1 px-0" href="/">Tentang Kami</a>
        <a class="nav-link fw-bold py-1 px-0 <?php echo e(request()->segment(1) == 'login' ? 'active' : ''); ?>" href="/login">Login</a>
      </nav>
    </div>
</header><?php /**PATH /home/daff/Desktop/latihan-ukk/resources/views/template/navbar.blade.php ENDPATH**/ ?>