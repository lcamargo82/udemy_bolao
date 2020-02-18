<div class="row">
    <div class="form-group col-6">
        <label for="name">Nome</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Nome" value="{{ old('name') ?? ($register->name ?? '') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-6">
        <label for="email">E-mail</label>
        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="E-mail" value="{{ old('email') ?? ($register->email ?? '')}}">
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-6">
        <label for="password">Senha</label>
        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Senha" value="">
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-6">
        <label for="password_confirmation">Confirmar senha</label>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmar senha" value="">
    </div>
</div>
