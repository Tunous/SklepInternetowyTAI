<form action="{{ route('register') }}" method="POST">
    {{ csrf_field() }}

    <div class="field">
        <div class="control has-icons-left">
            <input id="username" type="text" name="username"
                   class="input{{ $errors->has('username') ? ' is-danger' : '' }}"
                   placeholder="Login" value="{{ old('username') }}" required autofocus>
            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
        </div>
        @if ($errors->has('username'))
            <p class="help is-danger">
                {{ $errors->first('username') }}
            </p>
        @endif
    </div>

    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control is-expanded has-icons-left">
                    <input id="email" type="email" name="email"
                           class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                           placeholder="Email" value="{{ old('email') }}" required>
                    <span class="icon is-small is-left"><i
                                class="fa fa-envelope"></i></span>
                </div>
                @if ($errors->has('email'))
                    <p class="help is-danger">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control is-expanded has-icons-left">
                    <input id="password" type="password" name="password"
                           class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                           placeholder="Hasło" required>
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                </div>
                @if ($errors->has('password'))
                    <p class="help is-danger">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="field">
                <div class="control is-expanded has-icons-left">
                    <input id="password-confirm" type="password"
                           name="password_confirmation"
                           class="input{{ $errors->has('password_confirmation') ? ' is-danger' : ''}}"
                           placeholder="Powtórz hasło" required>
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                </div>
                @if ($errors->has('password_confirmation'))
                    <p class="help is-danger">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    <div class="field is-grouped is-grouped-centered">
        <div class="control is-expanded">
            <input type="submit" class="button is-fullwidth is-success" value="Zarejestruj">
        </div>
    </div>

    @php
        $input_from_cart = app('request')->input('from_cart', false);
    @endphp

    @if ($from_cart || $input_from_cart)
        <input type="hidden" name="cart-login" value="true" hidden>
    @endif
    @if (!$from_cart)
        <div class="field">
            <p class="control has-text-centered">
                Masz już konto?
                <a href="{{ route('login', ['from_cart' => $input_from_cart]) }}">Zaloguj się</a>
            </p>
        </div>
    @endif
</form>