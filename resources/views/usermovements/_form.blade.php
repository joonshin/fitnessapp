{{ csrf_field() }}

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    <label for="user_id" class="col-md-4 control-label">User ID</label>

    <div class="col-md-6">
    <!--    <input id="user_id" type="text" class="form-control"
          placeholder="UserMovements" name="user_id" value="{{ old('user_id', $usermovement->user_id) }}" required autofocus> -->


        <select name="user_id">
          @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->id }}</option>
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
        <input id="movement_id" type="text" class="form-control"
          placeholder="UserMovements" name="movement_id" value="{{ old('movement_id',$usermovement->movement_id) }}" required>

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
