<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.featureSetting.editFeature'); ?></h4>
</div>

<?php echo Form::open(['url' => '' ,'method' => 'put', 'id' => 'add-edit-form','class'=>'form-horizontal']); ?>

<div class="modal-body">
    <div class="box-body">
        <?php if(isset($type) && $type != 'image' && $type != 'apps'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo app('translator')->get('app.icon'); ?></label>
                <div class="btn-group col-sm-10">
                    <button type="button" class="btn btn-primary " id="iconButton"><i
                                class="<?php echo e($feature->icon); ?>"></i></button>
                    <button data-selected="graduation-cap" type="button"
                            class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component col-sm-1"
                            data-toggle="dropdown">
                        <i style="display: none" class=""></i>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu"></div>
                </div>
                <input class="" value="<?php echo e($feature->icon); ?>"  name="icon"  id="iconInput" type="hidden"/>
            </div>
        <?php endif; ?>
            <input class="" name="type" id="type" value="<?php echo e($type); ?>" type="hidden"/>

            <div class="form-group">
            <label class="col-sm-2 control-label" for="name"><?php echo app('translator')->get('app.title'); ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($feature->title); ?>">
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name"><?php echo app('translator')->get('app.description'); ?></label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control summernote" id="description" rows="3" name="description" > <?php echo $feature->description; ?> </textarea>
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
            </div>
        </div>
        <?php if(isset($type) && $type == 'image' || $type == 'apps'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="exampleInputPassword1"><?php echo app('translator')->get('app.image'); ?> </label>
                <div class="col-sm-10">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail"
                             style="width: 200px; height: 150px;">
                            <img src="<?php echo e($feature->image_url); ?>"
                                 alt=""/>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"
                             style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                        <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                        <input type="file" name="image" id="image"> </span>
                            <a href="javascript:;" class="btn btn-danger fileinput-exists"
                               data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-sm-offset-2 col-sm-10 ">
                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo app('translator')->get('messages.FeatureImageSizeMessage'); ?></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-footer">
    <button id="save" type="button" class="btn btn-custom"><?php echo app('translator')->get('app.submit'); ?></button>
</div>
<?php echo e(Form::close()); ?>

<script src="<?php echo e(asset('plugins/iconpicker/js/fontawesome-iconpicker.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>

<script>
    $('.summernote').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ["view", ["fullscreen"]]
        ]
    });
    $(function () {
        $('.icp-dd').iconpicker({
            title: 'Dropdown with picker',
            component:'.btn > i',
            templates: {
                iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
            }
        });

        $('.icp').on('iconpickerSelected', function (e) {
            $('#iconInput').val(e.iconpickerValue);
            $('#iconButton').html('<i  class="'+e.iconpickerValue+'"></i></button>');
        });
    });
    $('#save').click(function () {
        var url = '<?php echo e(route('super-admin.feature-settings.update', $feature->id)); ?>';
        $.easyAjax({
            url: url,
            container: '#add-edit-form',
            type: "POST",
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

<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/feature-settings/edit.blade.php ENDPATH**/ ?>