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
            {{$promo->video->title}}
            {{$promo->video->length.'.'.$promo->video->frames}}
            {{$promo->video->category->title}}
            {{$promo->video->path}}
            {{$promo->promoType->type}}
        </pre>
    </body>
</html>
