<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('member.all-invoices.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .dropdown-content {
            width: 250px;
            max-height: 250px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('app.product'); ?> <?php echo app('translator')->get('app.purchase'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']); ?>

                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.invoice'); ?> #</label>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-icon">
                                                    <input type="text" readonly class="form-control"
                                                           name="invoice_number" id="invoice_number"
                                                           value="<?php if(is_null($lastInvoice)): ?> <?php echo e($invoiceSetting->invoice_prefix.'#1'); ?> <?php else: ?> <?php echo e(($invoiceSetting->invoice_prefix.'#'.($lastInvoice->id+1))); ?> <?php endif; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.purchaseDate'); ?></label>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-icon">
                                                    <input type="text" disabled class="form-control" name="issue_date"
                                                           id="invoice_date"
                                                           value="<?php echo e(Carbon\Carbon::today()->format($global->date_format)); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group m-b-10">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Products <span class="caret"></span></button>
                                        <ul role="menu" class="dropdown-menu dropdown-content">
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="m-b-10">
                                                    <div class="row m-t-10">
                                                        <div class="col-md-6" style="padding-left: 30px">
                                                            <?php echo e($product->name); ?>

                                                        </div>
                                                        <div class="col-md-6" style="text-align: right;padding-right: 30px;">
                                                            <a href="javascript:;" data-pk="<?php echo e($product->id); ?>" class="btn btn-success btn btn-outline btn-xs waves-effect add-product">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12  visible-md visible-lg">

                                    <div class="col-md-4 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->get('modules.invoices.item'); ?>
                                    </div>

                                    <div class="col-md-1 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->get('modules.invoices.tax'); ?>
                                    </div>

                                    <div class="col-md-2 text-center font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                    </div>

                                    <div class="col-md-1" style="padding: 8px 15px">
                                        &nbsp;
                                    </div>

                                </div>

                                <div id="sortable">

                                </div>

                                <div class="col-xs-12 ">


                                    <div class="row">
                                        <div class="col-md-offset-9 col-xs-6 col-md-1 text-right p-t-10" ><?php echo app('translator')->get('modules.invoices.subTotal'); ?></div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="sub-total"></span>
                                        </p>


                                        <input type="hidden" class="sub-total-field" name="sub_total" value="">
                                    </div>

                                    <div class="row m-t-5" id="invoice-taxes">
                                        <div class="col-md-offset-9 col-md-1 text-right p-t-10">
                                            <?php echo app('translator')->get('modules.invoices.tax'); ?>
                                        </div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="tax-percent"></span>
                                        </p>
                                    </div>

                                    <div class="row m-t-5 font-bold">
                                        <div class="col-md-offset-9 col-md-1 col-xs-6 text-right p-t-10" ><?php echo app('translator')->get('modules.invoices.total'); ?></div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="total"></span>
                                        </p>


                                        <input type="hidden" class="total-field" name="total" value="0">
                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="form-actions" style="margin-top: 70px">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="save-form" class="btn btn-success"><i
                                                class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

    
    <div class="modal fade bs-modal-md in" id="taxModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>

    <script>
        $(function () {
            $( "#sortable" ).sortable();
        });

        $(".select2").select2({
            formatNoMatches: function () {
                return "<?php echo e(__('messages.noRecordFound')); ?>";
            }
        });

        $('#save-form').click(function(){
            calculateTotal();

            var discount = $('.discount-amount').html();
            var total = $('.total-field').val();

            if(parseFloat(discount) > parseFloat(total)){
                $.toast({
                    heading: 'Error',
                    text: 'Discount cannot be more than total amount.',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                });
                return false;
            }

            $.easyAjax({
                url:'<?php echo e(route('client.products.store')); ?>',
                container:'#storePayments',
                type: "POST",
                redirect: true,
                data:$('#storePayments').serialize()
            })
        });

        $('#storePayments').on('click','.remove-item', function () {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                calculateTotal();
            });
        });

        $('#storePayments').on('keyup','.quantity, .cost_per_item, .item_name', function () {
            var quantity = $(this).closest('.item-row').find('.quantity').val();

            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

            var amount = (quantity*perItemCost);

            $(this).closest('.item-row').find('.amount').val(amount);
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();


        });

        $('#storePayments').on('change','.type, #discount_type', function () {
            var quantity = $(this).closest('.item-row').find('.quantity').val();

            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

            var amount = (quantity*perItemCost);

            $(this).closest('.item-row').find('.amount').val(amount);
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();


        });

        function calculateTotal()
        {
//            calculate subtotal
            var subtotal = 0;
            var discount = 0;
            var tax = '';
            var taxList = new Object();
            var taxTotal = 0;
            $(".quantity").each(function (index, element) {
                var itemTax = [];
                var itemTaxName = [];
                $(this).closest('.item-row').find('input.type').each(function (index) {
                    itemTax[index] = $(this).data('rate');
                    itemTaxName[index] = $(this).data('tax-name');
                });
                var itemTaxId = $(this).closest('.item-row').find('input.type').val();
                var amount = $(this).closest('.item-row').find('.amount').val();
                subtotal = parseFloat(subtotal)+parseFloat(amount);

                if(itemTaxId != ''){
                    for(var i = 0; i<=itemTaxName.length; i++)
                    {
                        if(typeof (taxList[itemTaxName[i]]) === 'undefined'){
                            taxList[itemTaxName[i]] = ((parseFloat(itemTax[i])/100)*parseFloat(amount));
                        }
                        else{
                            taxList[itemTaxName[i]] = parseFloat(taxList[itemTaxName[i]]) + ((parseFloat(itemTax[i])/100)*parseFloat(amount));
                        }
                    }
                }
            });

            $.each( taxList, function( key, value ) {
                if(!isNaN(value)){

                    tax = tax+'<div class="col-md-offset-8 col-md-2 col-xs-6 text-right p-t-10">'
                        +key
                        +'</div>'
                        +'<p class="form-control-static col-xs-6 col-md-2" >'
                        +'<span class="tax-percent">'+decimalupto2(value)+'</span>'
                        +'</p>';

                    taxTotal = taxTotal+value;
                }

            });

            $('.sub-total').html(decimalupto2(subtotal));
            $('.sub-total-field').val(subtotal);


//       show tax
            $('#invoice-taxes').html(tax);

//            calculate total
            var totalAfterDiscount = decimalupto2(subtotal);

            totalAfterDiscount = (totalAfterDiscount < 0) ? 0 : totalAfterDiscount;

            var total = decimalupto2(totalAfterDiscount+taxTotal);

            $('.total').html(total);
            $('.total-field').val(total);

        }

        function recurringPayment() {
            var recurring = $('#recurring_payment').val();

            if(recurring == 'yes')
            {
                $('.recurringPayment').show().fadeIn(300);
            } else {
                $('.recurringPayment').hide().fadeOut(300);
            }
        }

        function decimalupto2(num) {
            var amt =  Math.round(num * 100,2) / 100;
            return parseFloat(amt.toFixed(2));
        }

        $('.add-product').on('click', function(event) {
            event.preventDefault();
            var id = $(this).data('pk');
            $.easyAjax({
                url:'<?php echo e(route('client.products.update-item')); ?>',
                type: "GET",
                data: { id: id },
                success: function(response) {
                    $(response.view).hide().appendTo("#sortable").fadeIn(500);
                    var noOfRows = $(document).find('#sortable .item-row').length;
                    var i = $(document).find('.item_name').length-1;
                    var itemRow = $(document).find('#sortable .item-row:nth-child('+noOfRows+') input.type');
                    console.log([itemRow, i, noOfRows]);
                    itemRow.attr('id', 'multiselect'+i);
                    itemRow.attr('name', 'taxes['+i+'][]');
                    $(document).find('#multiselect'+i);
                }
            });
        });


    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/products/convert_product.blade.php ENDPATH**/ ?>