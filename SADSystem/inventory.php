<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INVENTORY</title>
  <link rel="stylesheet" href="inventory.css">
</head>
<body>  
  <div class="image-container">
    <img src="/img/4.jpg" alt="red bike picture">
  </div>
  <div class="input-fields">
      <input type="text" placeholder="ITEM NAME">
      <input type="text" placeholder="DESCRIPTION">
      <input type="text" placeholder="CATEGORY">
      <input type="text" placeholder="STOCKS">
  </div>
  <div class="overlap-container">
    <button class="overlap"><span>EDIT ITEM</span></button>
    <button class="overlap"><span>ADD ITEM</span></button>
    <button class="overlap"><span>DELETE ITEM</span></button>
  </div>
  <div class="categ-container">
    <button class="overlap"><span>SEARCH BY DESCRIPTION</span></button>
    <button class="overlap"><span>SEARCH BY CATEGORY</span></button>
  </div>
  <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Stocks</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Item 1</td>
                <td>Description for Item 1</td>
                <td>Category A</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Item 2</td>
                <td>Description for Item 2</td>
                <td>Category B</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Item 3</td>
                <td>Description for Item 3</td>
                <td>Category A</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Item 4</td>
                <td>Description for Item 4</td>
                <td>Category C</td>
                <td>5</td>
            </tr>
            <tr>
                <td>Item 5</td>
                <td>Description for Item 5</td>
                <td>Category B</td>
                <td>25</td>
            </tr>
        </tbody>
      </table>
  </div>
</body>
</html>