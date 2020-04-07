<div class="white-box">
    <div class="table-responsive tableFixHead">
        <table class="table table-nowrap mb-0">
            <thead >
                <tr>
                    <th><?php echo app('translator')->get('app.employee'); ?></th>
                    <?php for($i =1; $i <= $daysInMonth; $i++): ?>
                        <th><?php echo e($i); ?></th>
                    <?php endfor; ?>
                    <th><?php echo app('translator')->get('app.total'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $totalPresent = 0;
                ?>
                <tr>
                    
                    <td> <?php echo end($attendance); ?> </td>
                    <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key2+1 <= count($attendance)): ?>
                            <td class="text-center">
                                <?php if($day == 'Absent'): ?>
                                    <a href="javascript:;" class="edit-attendance" data-attendance-date="<?php echo e($key2); ?>"><i class="fa fa-times text-danger"></i></a>
                                <?php elseif($day == 'Holiday'): ?>
                                    <a href="javascript:;" class="edit-attendances" data-attendance-date="<?php echo e($key2); ?>"><i class="fa fa-star text-warning"></i></a>
                                <?php else: ?>
                                    <?php if($day != '-'): ?>
                                        <?php
                                            $totalPresent = $totalPresent + 1;
                                        ?>
                                    <?php endif; ?>
                                    <?php echo $day; ?>

                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td class="text-success"><?php echo e($totalPresent .' / '.(count($attendance)-1)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/attendance/summary_data.blade.php ENDPATH**/ ?>