<h4 class="header-title m-t-0 m-b-30">Persoonlijke gegevens</h4>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Je naam" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="E-mailadres" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord">
            </div>
        </div>
    </div>
</div>
