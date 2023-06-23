@php
    $class ??= null;
    $label ??= '';
    $name ??= strtolower($label);
    $options ??= [];
    
@endphp
<div @class(['form-group', $class])>
    <label for="{{$name}}">{{ $label }}</label>
       <select name="{{$name}}" id="{{$name}}" class="form-select">
          @foreach ($options as $option)
              <option value="{{ $option->idDep }}" >{{$option->nomDep}}</option>
          @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    </div>
@enderror