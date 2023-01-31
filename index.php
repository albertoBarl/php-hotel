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

// BONUS
$filteredHotels = $hotels;

if(isset($_GET['vote']) && $_GET['vote'] !== ''){
    $tempHotels=[];
    foreach($filteredHotels as $hotel){
        if($hotel['vote'] >= $_GET['vote']){
            $tempHotels[]=$hotel;
        }
    }
    $filteredHotels = $tempHotels;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark d-flex justify-content-center pt-5">
<div class="text-white">
    <form action="./index.php" method="GET">
        <label for="">Voto</label>
        <input type="number" name="vote">

        <label for="">Parcheggio?</label>
        <select>
            <option value="1">Si</option>
            <option value="">No</option>
        </select>
        <button type="submit">Filtra</button>
        <button type="reset">Reset</button>
    </form>
</div>
<div>
    <table class="table form-control bg-body text-center" style="width: max-content">
      <thead>
        <tr>
          <th scope="col">Hotels</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Parcheggio</th>
          <th scope="col">Voto</th>
          <th scope="col">Distanza dal centro</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($filteredHotels as $hotel){?>
            <tr>
            <th class="text-success"><?php echo $hotel['name']?></th>
            <td><?php echo $hotel['description']?></td>
            <td><?php echo $hotel['parking']  ? "Si" : "No"?></td>
            <td><?php echo $hotel['vote']?></td>
            <td><?php echo $hotel['distance_to_center']?> km</td>
            </tr>
       <?php } ?>
      </tbody>
    </table>
</div>
</body>

</html>