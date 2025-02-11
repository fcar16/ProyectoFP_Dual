<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('company.index')); ?>" class="btn btn-secondary mb-3">Back</a>

<?php if(isset($company)): ?>
    <div class="card">
        <div class="card-header">
            <h1>NIF: <?php echo e($company->NIF); ?></h1>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> <?php echo e($company->name); ?></p>
            <p><strong>Website:</strong> <a href="<?php echo e($company->website); ?>" target="_blank"><?php echo e($company->website); ?></a></p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h2>Estudiantes</h2>
        </div>
        <div class="card-body">
            <?php if($company->students->isEmpty()): ?>
                <p>No hay estudiantes asociados a esta compañía.</p>
            <?php else: ?>
                <ul>
                    <?php $__currentLoopData = $company->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($student->name); ?> - <?php echo e($student->pivot->question); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <p>No company data available.</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ComputerStoreMTB\Desktop\Proyecto FP dual\ProyectoFP_Dual\Solicitud_Alumno\resources\views/company/show.blade.php ENDPATH**/ ?>