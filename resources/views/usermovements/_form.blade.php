{{ csrf_field() }}

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    <label for="user_id" class="col-md-4 control-label">User ID</label>

    <div class="col-md-6">
        <input id="user_id" type="text" class="form-control"
          placeholder="UserMovements" name="user_id" value="{{ old('user_id', $usermovement->user_id) }}" required autofocus>

        @if ($errors->has('user_id'))
            <span class="help-block">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('movement_id') ? ' has-error' : ''}}">
    <label for="movement_id" class="col-md-4 control-label">Movement ID</label>

    <div class="col-md-6">
        <input id="movement_id" type="text" class="form-control"
          placeholder="UserMovements" name="movement_id" value="{{ old('movement_id',$usermovement->movement_id) }}"required autofocus>

        @if ($errors->has('movement_id'))
            <span class="help-block">
                <strong>{{ $errors->first('movement_id') }}</strong>
            </span>
        @endif
    </div>
</div>
