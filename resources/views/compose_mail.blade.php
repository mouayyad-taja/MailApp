@extends('layouts')

@section('content')
    <div class="p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <h3>Compose a new mail</h3>
        </div>

        <form method="POST" action="/compose" class="row g-3">
            {{ csrf_field() }}

            <div class="form-group col-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">TO</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="" required>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group col-12 {{ $errors->has('cc') ? 'has-error' : '' }}">
                <label for="cc">Cc</label>
                <input name="cc" type="email" class="form-control" id="cc" aria-describedby="ccHelp" placeholder="">
                <span class="text-danger">{{ $errors->first('cc') }}</span>
            </div>

            <div class="form-group col-12 {{ $errors->has('bcc') ? 'has-error' : '' }}">
                <label for="bcc">Bcc</label>
                <input name="bcc" type="email" class="form-control" id="bcc" aria-describedby="bccHelp" placeholder="">
                <span class="text-danger">{{ $errors->first('bcc') }}</span>
            </div>
            <div class="form-group col-12 {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control" id="subject" aria-describedby="subject"
                    placeholder="" required>
                <span class="text-danger">{{ $errors->first('subject') }}</span>

            </div>
            <div class="form-group col-12 {{ $errors->has('text') ? 'has-error' : '' }}">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                <span class="text-danger">{{ $errors->first('text') }}</span>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>

    </div>
@endsection
