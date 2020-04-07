<?php $__env->startSection('header-section'); ?>
    <?php echo $__env->make('front.section.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .section-header small{
            font-size: 18px;
        }
        .container-scroll > .row{
            overflow-x: auto;
            white-space: nowrap;
        }
        .container-scroll > .row > .col-md-2{
            display: inline-block;
            float: none;
        }
        .pricing__head h3, .pricing__head h5{
            white-space: normal;
        }
        .container .gap-y .col-12 .flexbox{
            justify-content: unset;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒`‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Features
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
    <?php echo $__env->make('front.section.feature', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Pricing
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
    <?php if(!empty($packages)): ?>
        <?php echo $__env->make('front.section.pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | CONTACT
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
    <?php echo $__env->make('front.section.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        var maxHeight = -1;
        $(document).ready(function() {

            var promise1 = new Promise(function(resolve, reject) {

                $('.planNameHead').each(function() {
                    maxHeight = maxHeight > $(this).height() ? maxHeight :     $(this).height();
                });
                // console.log('hello1', maxHeight);
                resolve(maxHeight);
            }).then(function(maxHeight) {
                // console.log(maxHeight);
                $('.planNameHead').each(function() {
                    $(this).height(Math.round(maxHeight));
                });
                $('.planNameTitle').each(function() {
                    $(this).height(Math.round(maxHeight-28));
                });

            });
        });
        function planShow(type){
            if(type == 'monthly'){
                $('#monthlyPlan').show();
                $('#annualPlan').hide();
            }
            else{
                $('#monthlyPlan').hide();
                $('#annualPlan').show();
            }
        }

        $('#save-form').click(function () {

            <?php if(!is_null($global->google_recaptcha_key)): ?>
                if(grecaptcha.getResponse().length == 0){
                    alert('Please click the reCAPTCHA checkbox');
                    return false;
                }
            <?php endif; ?>

            $.easyAjax({
                url: '<?php echo e(route('front.contact-us')); ?>',
                container: '#contactUs',
                type: "POST",
                data: $('#contactUs').serialize(),
                messagePosition: "inline",
                success: function (response) {
                    if(response.status == 'success'){
                        $('#contactUsBox').remove();
                    }
                }
            })
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/front/home.blade.php ENDPATH**/ ?>