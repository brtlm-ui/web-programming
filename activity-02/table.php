<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Table</title>
<style>
  body {
  font-family: "Inter", Arial, sans-serif;
  background-color: #fdf2f8; 
  display: flex;
  flex-direction: column;  
  justify-content: center;  
  align-items: center;     
  min-height: 100vh;
}
  .table-container {
    width: 85%;
    max-width: 900px;
    background: #fff0f6; 
    padding: 24px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    animation: fadeIn 1s ease-in-out; 
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  h1 {
  text-align: center;
  font-family: 'Playfair Display', serif; 
  font-size: 2.5rem;
  margin-bottom: 20px;
  color: #9d174d; 
  font-weight: 600;
  }

  h2 {
    text-align: center;
    font-size: 1.6rem;
    margin-bottom: 20px;
    color: #9d174d; 
  }

  table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 12px;
    background-color: #ffe4ec; 
  }

  th {
    background-color: #fecdd3; 
    color: #831843;
    font-weight: 600;
    text-align: left;
    padding: 14px 16px;
    font-size: 0.95rem;
  }

  td {
    padding: 14px 16px;
    font-size: 0.9rem;
    border-top: 1px solid #fbcfe8;
    transition: background 0.2s ease-in-out;
  }

  tr:nth-child(even) {
    background-color: #fff5f7; 
  }

  tr:hover {
    background-color: #fce7f3; 
    cursor: pointer;
  }

  tr.low-stock {
    color: #dc2626; 
    font-weight: 500;
  }

.flower {
  position: absolute;
  opacity: 0.4;
  pointer-events: none; /* so it won’t block clicks */
  animation: float 6s ease-in-out infinite alternate;
}

.flower1 { top: 40px; left: 30px; font-size: 50px; }
.flower2 { bottom: 120px; right: 40px; font-size: 70px; }
.flower3 { top: 200px; right: 150px; font-size: 40px; }
.flower4 { bottom: 50px; left: 100px; font-size: 60px; }
.flower5 { top: 300px; left: 250px; font-size: 45px; }

@keyframes float {
  from { transform: translateY(0px) rotate(0deg); }
  to { transform: translateY(15px) rotate(5deg); }
}

</style>
</head>
<body>

<div class="flower flower1">🌸</div>
<div class="flower flower2">🌿</div>
<div class="flower flower3">🌺</div>
<div class="flower flower4">🌸</div>
<div class="flower flower5">🌿</div>

<h1>Our Bestselling Skincare Must-Haves 🌸</h1>
<div class="table-container">
<?php
$products = array(
  array("name"=>"COSRX Advanced Snail 96 Mucin Essence", "price"=>12.50, "stock"=>15),
  array("name"=>"Etude House SoonJung pH 5.5 Relief Toner", "price"=>9.80, "stock"=>8),
  array("name"=>"Innisfree Green Tea Seed Serum", "price"=>18.00, "stock"=>25),
  array("name"=>"Laneige Water Sleeping Mask", "price"=>20.75, "stock"=>6),
  array("name"=>"Missha Time Revolution Night Repair", "price"=>22.00, "stock"=>12),
  array("name"=>"Sulwhasoo First Care Activating Serum", "price"=>45.50, "stock"=>4),
  array("name"=>"Banila Co Clean It Zero Cleansing Balm", "price"=>14.25, "stock"=>19)
);
?>

<h2>Dynamic Product Table</h2>
<table border=1>
  <tr>
    <th>No.</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Stock</th>
  </tr>
  <?php
  $num = 1;
  foreach($products as $p){
      $rowClass = ($p["stock"] < 10) ? "low-stock" : "";
  ?>
  <tr class="<?= $rowClass ?>">
    <td><?= $num ?></td>
    <td><?= $p["name"] ?></td>
    <td>₱<?= number_format($p["price"], 2) ?></td>
    <td><?= $p["stock"] ?></td>
  </tr>
  <?php
      $num++;
  } 
  ?>
</table>
</div>

</body>
</html>
