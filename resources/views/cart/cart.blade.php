@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Koszyk</h1>
            <div class="columns">
                <div class="column">
                    <form action="{{ route('cart') }}" method="POST">
                        <label class="label">Imię i Nazwisko</label>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Imię">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Nazwisko">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="label">Ulica i numer</label>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Ulica">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Numer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="label">Kod pocztowy i miasto</label>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Kod pocztowy">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Miasto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="label">Telefon</label>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field has-addons">
                                    <div class="control">
                                        <a class="button is-static">+48</a>
                                    </div>
                                    <div class="control is-expanded">
                                        <input type="tel" class="input" placeholder="Numer telefonu">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="label">Email</label>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field has-addons">
                                    <div class="control is-expanded">
                                        <input type="email" class="input" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="checkbox">
                            <input type="checkbox" checked>
                            Zapamiętaj dane
                        </label>
                    </form>
                </div>

                <div class="column">
                    @foreach ($products as $product)
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <h4><strong>{{ $product->name }}</strong></h4>
                                    10,00 zł/szt.

                                    <div class="field has-addons">
                                        <div class="control">
                                            <input type="number" class="input" placeholder="Ilość"
                                                   value="{{ $product->quantity }}" min="1" max="20">
                                        </div>
                                        <div class="control">
                                            <button class="button is-success">
                                                <span class="icon"><i class="fa fa-check"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-danger">
                                                <span class="icon"><i class="fa fa-trash"></i></span>
                                                &nbsp;Usuń
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <p>Do zapłaty: 20,00 zł brutto</p>
                        <button class="button is-success">Kupuję</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
