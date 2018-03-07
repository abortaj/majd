@php
$defaultOptions=[
    'wrapper_class'=>' col-md-6',
    'class'=>'',
    'width'=>'0',
    'height'=>'1',
    'quality'=>'100',
    'encode'=>'jpg',//false,'jpg,png....'
    'error-pos'=>'right',
    'placeholder'=>'',
    'img_height'=>'300px',
];
if(!isset($options))$options=[];
if(!isset($name))$name='image_name';
$options= $options+$defaultOptions;
$options['class'].=' form-control';
@endphp

<div class="form-group {{$options['wrapper_class']}}">
    @if($label!==false)
        <label for="{{$name}}">
            {{ is_string($label) ? $label : ucwords(str_replace('_',' ',$name)) }} @if(strpos($options['class'],'required')!==false) <span class="text-danger">*</span> @endif
        </label>
    @endif
    @if($options['error-pos']=='right')
        <div class="pull-right">
            @if ($errors->has($name))
                <span class="help-block" for="{{ $name }}">{{ $errors->first($name) }}</span>
            @else
                <span class="help-block" for="{{ $name }}"></span>
            @endif
        </div>
    @endif
     <div style="clear:both"></div>
    <div style="position:absolute;z-index: 1;">
        <button class="button button-green cropper-pre-uploader"  >@lang('components.choose')</button>
        <button class="button button-red cropper-cropper hide" style="display:none !important" > @lang('components.crop')</button>
        <input type="file" style="display:none" class="cropper-file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
    </div>
    <img @if($url) src="{{$url}}" @endif class="cropper" style="width:auto;height:{{$options['img_height']}}" data-width="{{$options['width']}}" data-encode="{{$options['encode']}}" data-quality="{{$options['quality']}}" data-height="{{$options['height']}}" />
    <div class="progress hide">
        <div class="progress-bar cropper-progressbar progress-bar-striped active" role="progressbar" aria-valuenow="0"
             aria-valuemin="0" aria-valuemax="100" style="width:0%">
            <span class="">0%</span>
        </div>
    </div>
    {{Form::hidden($name,$value,['class'=>'cropper-value'])}}
    @if($options['error-pos']=='under')
        @if ($errors->has($name))
            <span class="help-block" for="{{ $name }}">{{ $errors->first($name) }}</span>
        @else
            <span class="help-block" for="{{ $name }}"></span>
        @endif
    @endif
</div>