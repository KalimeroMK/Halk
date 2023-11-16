@extends(config('payment.layout'))

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50">
            <div class="card-body">
                <p class="card-text">
                    Unfortunately, your transaction has failed. Please see the error details below
                </p>
                <p>Client IP: {{ $clientIp }}</p>
                <p>Error Message: {{ $mdErrorMsg }}</p>
                <p>Error Description: {{ $errMsg }}</p>

            </div>
        </div>
    </div>
@endsection