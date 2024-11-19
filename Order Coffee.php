<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Coffee Shop</title>
<style>
h1 {
    color: #CD6305;
    text-align: center;
    font-family: Arial, sans-serif;
}
h2 {
    color: #AB7F6E;
    font-family: Arial, sans-serif;
}
body, td, th {
    color: #E4D8D4;
    font-family: Arial, sans-serif;
}
body {
    background-color: #f5f5f5;
    background-image: url(coffeetile.jpg);
    background-repeat: repeat;
}
button {
    background-color: #CD6305;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}
button:hover {
    background-color: #AB7F6E;
}
form {
    margin-top: 15px;
}
table {
    margin: auto;
}
.home-button {
    text-align: center;
    margin-top: 20px;
}
.home-button a {
    text-decoration: none;
    background-color: #CD6305;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}
.home-button a:hover {
    background-color: #AB7F6E;
}
</style>
</head>
<body>

<h1>Order Coffee</h1>
<form action="submit_page.php" method="post">
  <table width="1200" border="0" cellspacing="0" cellpadding="10">
    <tbody>
      <tr>
        <td width="300"><img src="Pacamara.png" width="267" height="298" alt="Pacamara Coffee"/></td>
        <td width="400">
          <h2>Pacamara</h2>
          <p>Sweet fruit, Floral, Citrus, Creamy Finish.</p>
          <p>RM50</p>
          <input type="radio" name="coffeeType" value="Pacamara" required> Select Pacamara
        </td>
      </tr>
      <tr>
        <td><img src="Limani.png" width="267" height="298" alt="Limani Coffee"/></td>
        <td>
          <h2>Limani</h2>
          <p>Caramel, chocolate, hazelnut, light dry finish.</p>
          <p>RM80</p>
          <input type="radio" name="coffeeType" value="Limani" required> Select Limani
        </td>
      </tr>
      <tr>
        <td><img src="Caracolillo.png" width="267" height="298" alt="Caracolillo Coffee"/></td>
        <td>
          <h2>Caracolillo</h2>
          <p>Milk chocolate, hint of citrus, molasses, sugary finish.</p>
          <p>RM65</p>
          <input type="radio" name="coffeeType" value="Caracolillo" required> Select Caracolillo
        </td>
      </tr>
      <tr>
        <td><img src="Regular Roast.png" width="268" height="313" alt="Regular Roast Coffee"/></td>
        <td>
          <h2>Regular Roast</h2>
          <p>Sweet, hint of chocolate and caramel, smooth fresh finish.</p>
          <p>RM70</p>
          <input type="radio" name="coffeeType" value="Regular Roast" required> Select Regular Roast
        </td>
      </tr>
    </tbody>
  </table>
  <div style="text-align:center; margin-top: 20px;">
    <label for="customerName">Your Name:</label>
    <input type="text" name="customerName" id="customerName" required>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" required>
    <br><br>
    <button type="submit">Place Order</button>
  </div>
</form>

<!-- Home Button -->
<div class="home-button">
  <a href="index.html">Go to Home</a>
</div>

</body>
</html>
