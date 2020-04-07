<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.customFields.addField'); ?></h4>
</div>

<?php echo Form::open(['url' => '' ,'method' => 'post', 'id' => 'add-edit-form','class'=>'form-horizontal']); ?>

<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="display_name"><?php echo app('translator')->get('modules.invoices.type'); ?></label>
            <div class="col-sm-10">
                <?php echo Form::select('module',
                    $customFieldGroups,
                    '',['class' => 'form-control gender','id' => 'module']); ?>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="name"><?php echo app('translator')->get('modules.customFields.label'); ?></label>
            <div class="col-sm-10">
                <input type="text" name="label" id="label" class="form-control" onkeyup="slug(this.value)">
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name"><?php echo app('translator')->get('app.name'); ?></label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control" >
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="required"><?php echo app('translator')->get('app.required'); ?></label>
            <div class="col-sm-10">
                <div class="radio radio-success">

                    <input type="radio" name="required" id="optionsRadios1" value="yes" checked>
                    <label for="optionsRadios1"> <?php echo app('translator')->get('app.yes'); ?> </label>


                </div>
                <div class="radio radio-success">

                    <input type="radio" name="required" id="optionsRadios2" value="no" >
                    <label for="optionsRadios2"> <?php echo app('translator')->get('app.no'); ?> </label>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="display_name"><?php echo app('translator')->get('modules.invoices.type'); ?></label>
            <div class="col-sm-10">
                <?php echo Form::select('type',
                    [
                        'text'      => 'text',
                        'number'    =>'number',
                        'password'  => 'password',
                        'textarea'  =>'textarea',
                        'select'    =>'select',
                        'radio'    =>'radio',
                        'date'      =>'date'

                    ],
                    '',['class' => 'form-control gender','id' => 'type']); ?>

            </div>
        </div>

        <div class="form-group mt-repeater" style="display: none;">

            <div data-repeater-list="group">
                <div data-repeater-item>
                    <div class="row mt-repeater-row">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <label class="control-label"><?php echo app('translator')->get('app.value'); ?></label>
                            <input type="text" name="value[]" class="form-control" /> </div>
                        <div class="col-md-1 m-t-30" >
                            <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-xs mt-repeater-delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal-footer">
    <button id="save" type="button" class="btn btn-custom"><?php echo app('translator')->get('app.submit'); ?></button>
</div>
<?php echo e(Form::close()); ?>

<script>
    var FormRepeater = function () {

        return {
            //main function to initiate the module
            init: function () {
                $('.mt-repeater').each(function(){
                    $(this).repeater({
                        show: function () {
                            $(this).slideDown();
                        },

                        hide: function (deleteElement) {
                            $(this).slideUp(deleteElement);
                        },

                        ready: function (setIndexes) {

                        },
                        isFirstItemUndeletable: true,


                    });
                });
            }

        };

    }();

    jQuery(document).ready(function() {
        FormRepeater.init();
    });

    $('#type').on('change', function () {
        // if (this.value == '1'); { No semicolon and I used === instead of ==
        if (this.value === 'select' || this.value === 'radio' || this.value === 'checkbox'){
            $(".mt-repeater").show();
        } else {
            $(".mt-repeater").hide();
        }
    });

    function convertToSlug(Text)
    {
        return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-')
                ;
    }

    function slug(text){
        $('#name').val(convertToSlug(text));
    }

    $('#save').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.custom-fields.store')); ?>',
            container: '#add-edit-form',
            type: "POST",
            data: $('#add-edit-form').serialize(),
            file:true,
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
        return false;
    })
</script>

<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/custom-fields/create.blade.php ENDPATH**/ ?>