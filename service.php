<!DOCTYPE html>
<html>
<head>
  <title>product Purchases</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    td, th {
      border: 1px solid black;
      padding: 5px;
      text-align: left;
    }
    td img {
      width: 200px;
    }
    .button-container {
      text-align: right;
    }
    .button {
      background-color: green;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .full-width {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="full-width">
    <?php include('nav-header.php'); ?>
  </div>
  <br>
  <table>
    <tr>
      <th>product picture</th>
      <th>product name</th>
      <th>Action</th>
    </tr>
    <tr>
      <td>
        <img src="" alt="">
        <br>
      </td>
      <td>pictire</td>
      <td class="button-container">
        <button class="button">purchase</button>
      </td>
    </tr>
  </table>
  <div class="full-width">
    <?php include('footer.php'); ?>
  </div>
</body>
</html>
