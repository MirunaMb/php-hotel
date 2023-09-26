<?php

$hotels = [

    [
        'name'               => 'Hotel Belvedere',
        'description'        => 'Hotel Belvedere Descrizione',
        'parking'            => true,
        'vote'               => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name'               => 'Hotel Futuro',
        'description'        => 'Hotel Futuro Descrizione',
        'parking'            => true,
        'vote'               => 2,
        'distance_to_center' => 2
    ],
    [
        'name'               => 'Hotel Rivamare',
        'description'        => 'Hotel Rivamare Descrizione',
        'parking'            => false,
        'vote'               => 1,
        'distance_to_center' => 1
    ],
    [
        'name'               => 'Hotel Bellavista',
        'description'        => 'Hotel Bellavista Descrizione',
        'parking'            => false,
        'vote'               => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name'               => 'Hotel Milano',
        'description'        => 'Hotel Milano Descrizione',
        'parking'            => true,
        'vote'               => 2,
        'distance_to_center' => 50
    ],

];

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="./css/style.css">
        <title>PHP Hotel</title>
    </head>

    <body>
        <!-- FILTER FORM -->
        <form action="index.php" method="get">
            <div class="form-group">
                <label for="filter_parking">Mostra solo hotel con parcheggio: </label>
                <input type="checkbox" name="filter_parking" id="filter_parking" value="1">
            </div>
            <button type="Submit" class="btn btn-ptimary">Filtra</button>
        </form>
        <!-- FILTER RATING -->
        <form action="index.php" method="get">
            <div class="form-group">
                <label for="filter_rating">Voto minimo</label>
                <input type="number" name="filter_rating" id="filter_rating" min="1" max="5">
            </div>
        </form>

        <!-- TABLE SECTION -->
        <table class="table table-hover rounded">
            <thead class="t-head">
                <tr>
                    <?php foreach ($hotels[0] as $key => $hotel) { ?>
                        <th scope="col"><?php echo $key ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>

                <?php $filterParking = isset($_GET['filter_parking']) && $_GET['filter_parking'] == '1';
                $filterRating  = isset($_GET['filter_rating']) ? (int) $_GET['filter_rating'] : 0;

                foreach ($hotels as $hotel) {
                    if (($filterParking && !$hotel['parking']) || ($filterRating > 0 && $hotel['vote'] < $filterRating)) {
                        continue; //Salta l'hotel se il filtro parcheggio è attivo e non ha un parcheggio.
                    }
                    ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?> </td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </body>

</html>