@extends(config('payment.layout'))

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50">
            <div class="card-body">
                <h1 class="card-title text-center">3D Pay Hosting Sample Page</h1>
                <p class="card-text">
                    This sample page submits client Id, transaction type, amount, okUrl, failUrl, order Id, instalment
                    count, and store key. Credit card information will be asked in the 3d secure page.
                </p>
                <div class="text-center">
                    <form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate">
                        @csrf
                        <input type="hidden" name="clientid" value="{{ $clientId }}"/>
                        <input type="hidden" name="amount" value="{{ $amount }}"/>
                        <input type="hidden" name="islemtipi" value="{{ $transactionType }}"/>
                        <input type="hidden" name="taksit" value="{{ $instalment }}"/>
                        <input type="hidden" name="oid" value="{{ $oid }}"/>
                        <input type="hidden" name="okUrl" value="{{ $okUrl }}"/>
                        <input type="hidden" name="failUrl" value="{{ $failUrl }}"/>
                        <input type="hidden" name="rnd" value="{{ $rnd }}"/>
                        <input type="hidden" name="hash" value="{{ $hash }}"/>
                        <input type="hidden" name="storetype" value="{{ $storetype }}"/>
                        <input type="hidden" name="lang" value="{{ $lang }}"/>
                        <input type="hidden" name="currency" value="{{ $currencyVal }}"/>
                        <input type="hidden" name="refreshtime" value="10"/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection