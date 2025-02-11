<?php if( $message = Session::get('success') ): ?>
    <div style="padding:15px; background-color:green;color:white;">
        <strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>
<?php if( $message = Session::get('danger') ): ?>
    <div style="padding:15px; background-color:red;color:white;">
        <strong><?php echo e($message); ?></strong>
        
    </div>
<?php endif; ?><?php /**PATH C:\Users\ComputerStoreMTB\Desktop\Proyecto FP dual\ProyectoFP_Dual\Solicitud_Alumno\resources\views/layouts/_partials/messages.blade.php ENDPATH**/ ?>