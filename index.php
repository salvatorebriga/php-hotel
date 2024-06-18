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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.scss">
  <!--BOOTSTRAP CSS-->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
  <title>PHP Hotels</title>
</head>

<body>
  
  <!-- TABELLA -->
<div class="container text-center">
  <h1>LISTA HOTEL</h1>

  <!-- FORM -->
  <form action="index.php" method="GET">
    <div class="form-container">
      <label for="vote">Voto: </label>
      <input type="text" name="vote" id="vote">

      <input type="checkbox" name="parking" id="parking">
      <label for="parking">Pacheggio?</label>

      <button> SUBMIT </button>
    </div>
  </form>
  <!-- /FORM -->

<table class="table">

  <!-- CREA UN ELEMENTO TH PER OGNI CAMPO DI HOTEL_KEYS ESTRAPOLATO DAL PRIMO ELEMENTO DI HOTELS -->

  <thead>
    <tr>
      <th>#</th>
      <?php foreach($hotels_key as $keys) :?>
        <th> <?php echo $keys; ?> </th>
      <?php endforeach ?>
    </tr>
  </thead>

  <!-- /CREA UN ELEMENTO TH PER OGNI CAMPO DI HOTEL_KEYS ESTRAPOLATO DAL PRIMO ELEMENTO DI HOTELS -->

  <!-- CREA UN ELEMENTO TR PER OGNI ELEMENTO HOTELS (ARRAY INDICIZZATO) -->

  <tbody>
    <?php foreach($hotels as $key => $hotel) : ?>
      <tr>

      <!-- CREA UN TH CONTENENTE L'INDICE DI OGNI SINGOLO ELEMENTO DI HOTELS -->
       
        <th> <?php echo ($key + 1); ?> </th>

        <!-- CREA UN TD IN BASE A QUANTE CHIAVI HA L'INDICE CORRENTE -->
          <?php foreach($hotel as $key2 => $hotel_data) : ?>

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


      <!-- /CREA UN TH CONTENENTE L'INDICE DI OGNI SINGOLO ELEMENTO DI HOTELS -->
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>


  <!--BOOTSTRAP JS-->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous">
  </script>

</body>

</html>