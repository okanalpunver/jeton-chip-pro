<?php
$rows = json_decode(json_encode($rows, JSON_FORCE_OBJECT));
$horizontal = (isset($horizontal) && $horizontal) ? true : false;
?>
<div class="kt-section">
@foreach ($rows as $key => $row)
    
    @if (array_has($row, 'seperator'))
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
        <h3 class="kt-section__title">{{ $row->seperator }}</h3>
        @continue
    @endif

    <div class="form-group row">
        @foreach ($row as $name => $item)

            <div class="{{ $item->col ?? 'col' }}">

                @if ($horizontal)
                    <div class="row">
                @endif

                {{ html()->label($item->label ?? title_case($item->name))->for($name)->class(['col-lg-3 col-form-label' => $horizontal]) }}

                @if($horizontal)
                    <div class="col-lg-6">
                @endif

                @isset($item->iconRight)
                    <div class="kt-input-icon">
                @endisset

                <?php
                    switch ($item->type) {
                        case 'text':
                            # text...
                            $input = html()->text($name);
                            break;

                        case 'file':
                            # text...
                            $input = html()->input('file', $name);
                            break;

                        case 'textarea':
                            # text...
                            $input = html()->textarea($name);
                            break;
                        
                        case 'email':
                            # email...
                            $input = html()->email($name);
                            break;

                        case 'number':
                            # number...
                            $input = html()->input('number', $name);
                            break;

                        case 'password':
                            # password...
                            $input = html()->password($name)->value('')->attribute('autocomplete', 'new-password');
                            break;

                        case 'select':
                            # select...
                            $input = html()->select($name, $item->options, $item->value ?? null);
                            break;

                        case 'radioInline':
                            # radioInline...
                            $input = html()->div()->children($item->options, function ($option, $value) use ($name) {
                                return html()->label(html()->radio($name)->value($value)->forgetAttribute('id') . $option . html()->span())
                                             ->class('kt-radio kt-radio--solid');
                            })->class('kt-radio-inline');
                            break;

                        case 'checkboxInline':
                            # checkboxInline...
                            $input = html()->div()->children($item->options, function ($option, $value) use ($name) {
                                return html()->label(html()->checkbox($name)->value($value)->forgetAttribute('id') . $option . html()->span())
                                             ->class('kt-checkbox kt-checkbox--solid');
                            })->class('kt-checkbox-inline');
                            break;

                        case 'switch':
                            $input = html()->checkbox($name, null)->value($item->value);
                            break;


                        default:
                            # text...
                            $input = html()->text($name);
                            break;
                    }

                    if (in_array($item->type, ['text', 'email', 'number', 'password', 'textarea', 'select'])) {
                        $input = $input->class($errors->has($name) ? 'form-control is-invalid' : 'form-control');
                    }

                    if (isset($item->value)) {

                        $value = (is_object($item->value)) ? $item->value->formatted : $item->value;
                        $input = $input->value($value);
                    }

                    if (isset($item->class)) {
                        $input = $input->class($item->class);
                    }

                    if (isset($item->attributes)) {
                        $input = $input->attributes($item->attributes);
                    }

                ?>

                @if ($item->type == 'file')
                    <div></div>
                    <div class="custom-file">
                @endif
                
                {!! $input !!}
                
                @if ($item->type == 'file')
                        <label class="custom-file-label text-left" for="customFile">Dosya seçin..</label>
                    </div>
                @endif
                

                @error($name)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @isset($item->iconRight)
                    <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="{{ $item->iconRight }}"></i></span></span>
                </div>
                @endisset


                @isset($item->desc)
                    {{ html()->span()->text($item->desc)->class('form-text text-muted') }}
                @endisset

                @if($horizontal)
                        </div>
                    </div>
                @endif

            </div>

        @endforeach
    </div>
@endforeach
</div>