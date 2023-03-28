@extends('layouts/app')

@section('content')

<div class="container note-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    var qrcode = new QRCode("qrcode");
    function makeCode() {
        var value = "<?= route('user-data', $user_name);?>";
        qrcode.makeCode(value);
    }
    makeCode();
</script>
@endsection