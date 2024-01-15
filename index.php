<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    function getStars($vote) {
        $stars = "";
        for($i=0; $i < $vote; $i++) {
            $stars .= "★";
        }
        for($i=0; $i < 5 - $vote; $i++) {
            $stars .= "☆";
        }
        return $stars;
    }

    if( isset($_GET["parking"]) ) {
        $hotels = array_filter($hotels, function($hotel) {
            return filter_var($_GET["parking"], FILTER_VALIDATE_BOOLEAN) == $hotel["parking"];
        });
    }

    if( isset($_GET["vote"] )) {
        $hotels = array_filter($hotels, function($hotel) {
            return intval($_GET["vote"]) == $hotel["vote"];
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotel</title>

        <!-- Boostrap CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-2 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="mb-3">Filter</h2>
                        <form action="index.php" method="GET">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parking" id="parking1" value="0">
                                    <label class="form-check-label" for="parking1">
                                        No Parking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parking" id="parking2" value="1">
                                    <label class="form-check-label" for="parking2">
                                        Parking
                                    </label>
                                </div>
                            <div class="my-3">
                                <span>Hotel Vote:</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote" id="radio1" value="1">
                                    <label class="form-check-label" for="radio1">
                                        &starf;&star;&star;&star;&star;
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote" id="radio2" value="2">
                                    <label class="form-check-label" for="radio2">
                                        &starf;&starf;&star;&star;&star;
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote" id="radio3" value="3">
                                    <label class="form-check-label" for="radio3">
                                        &starf;&starf;&starf;&star;&star;
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote" id="radio4" value="4">
                                    <label class="form-check-label" for="radio4">
                                        &starf;&starf;&starf;&starf;&star;
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote" id="radio5" value="5">
                                    <label class="form-check-label" for="radio5">
                                        &starf;&starf;&starf;&starf;&starf;
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary">Filter</button>
                        </form>
                </div>
                <div class="col">
                    <h1 class="mb-4">PHP Hotels</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Parking</th>
                                <th scope="col">Vote</th>
                                <th scope="col">Distance To Center</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hotels as $hotel) { ?>
                            <tr>
                                <td><?php echo $hotel["name"]; ?></td>
                                <td><?php echo $hotel["description"]; ?></td>
                                <td><?php echo $hotel["parking"] == true ? 'Disponibile' : 'Non Disponibile'; ?></td>
                                <td><?php echo getStars($hotel["vote"]); ?></td>
                                <td><?php echo $hotel["distance_to_center"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>