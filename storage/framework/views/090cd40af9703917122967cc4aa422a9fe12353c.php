<div class="white-box">
    <nav>
        <ul class="showProjectTabs">
            <li class="projects">
                <a href="<?php echo e(route('admin.projects.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.overview'); ?></span></a>
            </li>
            <?php if(in_array('employees',$modules)): ?>
                <li class="projectMembers">
                    <a href="<?php echo e(route('admin.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a>
                </li>
            <?php endif; ?>
            <li class="projectMilestones">
                <a href="<?php echo e(route('admin.milestones.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.milestones'); ?></span></a>
            </li>
            <?php if(in_array('tasks',$modules)): ?>
                <li class="projectTasks">
                    <a href="<?php echo e(route('admin.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a>
                </li>
            <?php endif; ?>
            <li class="projectFiles">
                <a href="<?php echo e(route('admin.files.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.files'); ?></span></a>
            </li>
            <?php if(in_array('invoices',$modules)): ?>
                <li class="projectInvoices">
                    <a href="<?php echo e(route('admin.invoices.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.invoices'); ?></span></a>
                </li>
            <?php endif; ?> <?php if(in_array('timelogs',$modules)): ?>
                <li class="projectTimelogs">
                    <a href="<?php echo e(route('admin.time-logs.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.timeLogs'); ?></span></a>
                </li>
            <?php endif; ?>
            <li class="burndownChart">
                <a href="<?php echo e(route('admin.projects.burndown-chart', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.burndownChart'); ?></span></a>
            </li>
        </ul>
    </nav>
</div><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/projects/show_project_menu.blade.php ENDPATH**/ ?>