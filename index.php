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

$hotels_key = array_keys($hotels[0]);

// Initialize filters
$vote_filter = isset($_GET['vote']) ? (int)$_GET['vote'] : null;
$parking_filter = isset($_GET['parking']) ? true : null;

// Filter hotels
$filtered_hotels = array_filter($hotels, function ($hotel) use ($vote_filter, $parking_filter) {
    if (!is_null($vote_filter) && $hotel['vote'] < $vote_filter) {
        return false;
    }
    if (!is_null($parking_filter) && !$hotel['parking']) {
        return false;
    }
    return true;
});

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.scss">
    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP Hotels</title>
</head>

<body>

    <!-- TABELLA -->
    <div class="container text-center">
        <h1>LISTA HOTEL</h1>

        <!-- FORM -->
        <form action="index.php" method="GET">
            <div class="form-container mb-3">
                <label for="vote">Voto: </label>
                <select name="vote" id="vote" class="form-select d-inline w-auto">
                    <option value="null">Tutti i voti</option>
                    <option value="1" <?php echo $vote_filter === 1 ? 'selected' : ''; ?>>1 Stella</option>
                    <option value="2" <?php echo $vote_filter === 2 ? 'selected' : ''; ?>>2 Stelle</option>
                    <option value="3" <?php echo $vote_filter === 3 ? 'selected' : ''; ?>>3 Stelle</option>
                    <option value="4" <?php echo $vote_filter === 4 ? 'selected' : ''; ?>>4 Stelle</option>
                    <option value="5" <?php echo $vote_filter === 5 ? 'selected' : ''; ?>>5 Stelle</option>
                </select>

                <input type="checkbox" name="parking" id="parking" <?php echo isset($parking_filter) ? 'checked' : ''; ?>>
                <label for="parking">Pacheggio?</label>

                <button class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
        <!-- /FORM -->

        <table class="table">

            <!-- CREA UN ELEMENTO TH PER OGNI CAMPO DI HOTEL_KEYS ESTRAPOLATO DAL PRIMO ELEMENTO DI HOTELS -->
            <thead>
                <tr>
                    <th>#</th>
                    <?php foreach ($hotels_key as $keys) : ?>
                        <th><?php echo ucfirst($keys); ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <!-- /CREA UN ELEMENTO TH PER OGNI CAMPO DI HOTEL_KEYS ESTRAPOLATO DAL PRIMO ELEMENTO DI HOTELS -->

            <!-- CREA UN ELEMENTO TR PER OGNI ELEMENTO HOTELS (ARRAY INDICIZZATO) -->
            <tbody>
                <?php foreach ($filtered_hotels as $key => $hotel) : ?>
                    <tr>

                        <!-- CREA UN TH CONTENENTE L'INDICE DI OGNI SINGOLO ELEMENTO DI HOTELS -->
                        <th><?php echo ($key + 1); ?></th>

                        <!-- CREA UN TD IN BASE A QUANTE CHIAVI HA L'INDICE CORRENTE -->
                        <?php foreach ($hotel as $key2 => $hotel_data) : ?>
                            <td>
                                <?php
                                if ($key2 == 'parking') {
                                    echo $hotel_data ? 'Yes' : 'No';
                                } elseif ($key2 == 'distance_to_center') {
                                    echo $hotel_data . ' km';
                                } else {
                                    echo $hotel_data;
                                }
                                ?>
                            </td>
                        <?php endforeach ?>
                        <!-- /CREA UN TD IN BASE A QUANTE CHIAVI HA L'INDICE CORRENTE -->

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>