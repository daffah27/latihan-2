<?php $__env->startSection('isinya'); ?>

<div class="d-block flex-column p-3 " style="width: 100%" >
            <h1 class="d-block">Data Semua Akun</h1>


        <?php if(session()->has('succes')): ?>

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?php echo e(session('succes')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php endif; ?>

        <?php if(session()->has('edit')): ?>

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?php echo e(session('edit')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php endif; ?>

            <div class="d-flex justify-content-end px-5">
              <a type="button" href="/akun/create" class="btn btn-primary m-3">Tambah Akun</a>
              <a type="button" href="/pdf" class="btn btn-outline-primary m-3">Export Data</a>
            </div>

           
     
            <table class="table-hover table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->username); ?></td>
                <td><?php echo e($item->nik); ?></td>
                <td> <?php echo e($item->level); ?></td>
                <td>
                    <a href="/akun/<?php echo e($item->id); ?>/edit" class="badge bg-warning">Edit</a>
                    <form action="/akun/<?php echo e($item->id); ?>" method="POST" class="d-inline">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button href="" class="badge bg-danger border-0" onclick="return confirm('apakah anda ingin menghapus ?')">Hapus</button>
                    </form>
                    
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
</div>
   
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daff/Desktop/latihan-ukk/resources/views/admin/akun.blade.php ENDPATH**/ ?>