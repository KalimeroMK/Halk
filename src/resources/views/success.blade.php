@extends(config('payment.layout'))

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50">
            <div class="card-body">
                <p class="card-text">
                    You transaciton with No {{ $orderId }} was sacessfull
                </p>
            </div>
        </div>
    </div>
@endsection