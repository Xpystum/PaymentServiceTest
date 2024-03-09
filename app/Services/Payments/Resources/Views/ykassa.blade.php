<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="0; url={{$ykassaPaymentUrl}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Процесс Оплаты...</title>
</head>
<body>

    <section class="mt-3 ms-3 d-flex justify-content-start align-items-center">
        <h5>Redirect for payment...</h5>
        <div class="spinner-border text-primary ms-3" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </section>
   

    <script>
        // window.location.href = "{{$ykassaPaymentUrl}}"
    </script>
</body>
</html>

