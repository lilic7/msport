<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Promo Viewer</title>
    </head>
    <body>
        <pre>
            {{$promo->title}}
            {{$promo->length.'.'.$promo->frames}}
            {{$promo->category->title}}
            {{$promo->path}}
            {{$promo->promoType->type}}
        </pre>
    </body>
</html>
