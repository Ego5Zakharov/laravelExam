<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-auto-rows: 250px;
            grid-row-gap: 0.5rem;
            grid-column-gap: 0.5rem;
            overflow: hidden;
        }

        .item {
            padding: 10px;
            border: 1px solid crimson;
        }

        .item_4 {
            justify-self: end;
            align-self: end;
        }

        .item_7 {
            grid-row-start: 1;
            grid-column-start:2;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="item item_1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloremque odio officia
        quam quibusdam quod sequi voluptate! Amet autem eaque exercitationem in molestiae neque nobis non numquam
        perferendis veritatis? Aperiam assumenda commodi consequuntur, cum cupiditate, debitis dicta ex explicabo
        incidunt iusto nihil officiis omnis qui quod sed sit tenetur voluptatibus.
    </div>

    <div class="item item_2">2</div>
    <div class="item item_3">3</div>
    <div class="item item_4">4</div>
    <div class="item item_5">5</div>
    <div class="item item_6">6</div>
    <div class="item item_7">7</div>
    <div class="item item_8">8</div>
</div>

</body>
</html>
