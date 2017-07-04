{{ csrf_field() }}

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    <label for="user_id" class="col-md-4 control-label">User ID</label>

    <div class="col-md-6">
        <select name="user_id" id="user_id">
          @foreach ($users as $user)
            <option value="{{ $user->id }}" @if ($user->id == old('user_id', $usermovement->user_id)) selected="selected" @endif>
              {{ $user->name }}
            </option>
          @endforeach
        </select>

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
        <select name="movement_id">
          @foreach ($movements as $movement)
            <option value="{{ $movement->id }}"  @if ($movement->id == old('movement_id', $usermovement->movement_id)) selected="selected" @endif>
              {{ $movement->name }}
            </option>
          @endforeach
        </select>

        @if ($errors->has('movement_id'))
            <span class="help-block">
                <strong>{{ $errors->first('movement_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('weight') ? ' has-error' : ''}}">
    <label for="weight" class="col-md-4 control-label">Weight</label>

    <div class="col-md-6">
        <input id="weight" type="text" class="form-control"
          placeholder="UserMovements" name="weight" value="{{ old('weight',$usermovement->weight) }}">

        @if ($errors->has('weight'))
            <span class="help-block">
                <strong>{{ $errors->first('weight') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('weight_units') ? ' has-error' : ''}}">
    <label for="weight_units" class="col-md-4 control-label">Weight Unit</label>

    <div class="col-md-6">
      <select name="weight_units" class="form-control" id="weight_units">
        <option value="kgs">kg</option>
        <option value="lbs">lbs</option>
      </select>
        @if ($errors->has('weight_unit'))
            <span class="help-block">
                <strong>{{ $errors->first('weight_unit') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('time') ? ' has-error' : ''}}">
    <label for="time" class="col-md-4 control-label">Time</label>

    <div class="col-md-6">
        <input id="time" type="text" class="form-control"
          placeholder="UserMovements" name="time" value="{{ old('time',$usermovement->time) }}">

        @if ($errors->has('time'))
            <span class="help-block">
                <strong>{{ $errors->first('time') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('reps') ? ' has-error' : ''}}">
    <label for="reps" class="col-md-4 control-label">Reps</label>

    <div class="col-md-6">
        <input id="reps" type="text" class="form-control"
          placeholder="UserMovements" name="reps" value="{{ old('reps',$usermovement->reps) }}">

        @if ($errors->has('reps'))
            <span class="help-block">
                <strong>{{ $errors->first('reps') }}</strong>
            </span>
        @endif
    </div>
</div>

<script src='/js/test.js'></script>
