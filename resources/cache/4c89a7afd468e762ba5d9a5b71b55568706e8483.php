<?php $__env->startSection('content'); ?>
    <div style="text-align: center">
        <h2>Relatório Geral</h2>

        <table>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Inicial</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($region['name']); ?></td>
                        <td><?php echo e($region['initials']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/ad-hoc.blade.php ENDPATH**/ ?>