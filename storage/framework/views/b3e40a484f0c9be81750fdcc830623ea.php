<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('company.create')); ?>" class="btn btn-primary mb-3">Crear Empresa</a>

<a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary mb-3">Ver Estudiantes</a>

<a href="<?php echo e(route('request.create')); ?>" class="btn btn-primary mb-3">Crear Solicitud</a>
<ul class="list-group">
    <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="<?php echo e(route('company.show', $company->id)); ?>"><?php echo e($company->name); ?></a>
            <div>
                <a href="<?php echo e(route('company.edit', $company->id)); ?>" class="btn btn-sm btn-warning">EDIT</a>
                <form action="<?php echo e(route('company.destroy', $company->id)); ?>" method="POST" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                </form>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="list-group-item">No data.</li>
    <?php endif; ?>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ComputerStoreMTB\Desktop\Proyecto FP dual\ProyectoFP_Dual\Solicitud_Alumno\resources\views/company/index.blade.php ENDPATH**/ ?>