<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary mb-3">Crea un nuevo estudiante</a>

<a href="<?php echo e(route('company.index')); ?>" class="btn btn-primary mb-3">Ver Empresas</a>

<a href="<?php echo e(route('request.create')); ?>" class="btn btn-primary mb-3">Crear Solicitud</a>

<ul class="list-group">
    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="<?php echo e(route('student.show', $student->id)); ?>"><?php echo e($student->name); ?></a>
            <div>
                <a href="<?php echo e(route('student.edit', $student->id)); ?>" class="btn btn-sm btn-warning">EDIT</a>
                <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="POST" class="d-inline">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ComputerStoreMTB\Desktop\Proyecto FP dual\ProyectoFP_Dual\Solicitud_Alumno\resources\views/student/index.blade.php ENDPATH**/ ?>