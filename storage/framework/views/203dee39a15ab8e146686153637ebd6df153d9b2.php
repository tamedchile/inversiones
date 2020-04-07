<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="<?php echo e(route('front.home')); ?>">
                        <img src="<?php echo e($setting->logo_front_url); ?>" alt="home" />
                    </a>
                </p>
            </div>

            <div class="col-12 col-lg-6">
                <?php $routeName = request()->route()->getName(); ?>
                <ul class="nav nav-primary nav-hero">
                    <?php $__empty_1 = true; $__currentLoopData = $footerSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('front.page', $footerSetting->slug)); ?>" ><?php echo e($footerSetting->name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-12 col-lg-3">
                <div>
                    <div class="form-group d-inline-block mr-20">
                        <select class="form-control" onchange="location = this.value;">
                            <option value="<?php echo e(route('front.language.lang', 'en')); ?>" <?php if($locale == 'en'): ?> selected <?php endif; ?>>English </option>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(route('front.language.lang', $language->language_code)); ?>"  <?php if($locale == $language->language_code): ?> selected <?php endif; ?>><?php echo e($language->language_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="social text-center text-lg-right d-inline-block">
                        <?php $__currentLoopData = json_decode($detail->social_links,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(strlen($link['link']) > 0): ?>
                                <a class="social-<?php echo e($link['name']); ?>" href="<?php echo e($link['link']); ?>" target="_blank">
                                    <i class="fab fa-<?php echo e($link['name']); ?><?php if($link['name'] == 'facebook'): ?>-f <?php endif; ?>"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/sections/front_footer.blade.php ENDPATH**/ ?>