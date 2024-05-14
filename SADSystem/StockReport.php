<?php include 'header.php'; ?>
<!DOCTYPE html> 
<html>
  <title> Stocks Report </title>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/179c54bbd3.js"></script>
    <link rel="stylesheet" href="StockReport.css">
  </head>
  <body>
    <main>
        <div class="stock-report">
            <h1></h1>
            <table id="stockTable">
            <tr>
                <th>Date</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td><input type="date"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number"></td>
                <td></td>
                </tr>
                <tr>
                <td><input type="date"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number"></td>
                <td></td>
                </tr>
                <tr>
                    <td><input type="date"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="number" step="0.01"></td>
                    <td><input type="number"></td>
                    <td></td>
                    </tr>
                    <tr>
                    <td><input type="date"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="number" step="0.01"></td>
                    <td><input type="number"></td>
                    <td></td>
                    </tr>
                    <tr>
                        <td><input type="date"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="number" step="0.01"></td>
                        <td><input type="number"></td>
                        <td></td>
                        </tr>

            </table>
                <button onclick="addRow()">Add Row</button>
                <div id="reportContainer"></div>
        </div>
        <script>
        let stockData = [];
    
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', captureData);
        });
    
        function captureData() {
            const row = this.parentNode.parentNode.rowIndex - 1;
            const col = this.cellIndex;
            if (!stockData[row]) {
            stockData[row] = [];
            }
            stockData[row][col] = this.value;
            updateTotal(row);
        }
    
        function updateTotal(row) {
            const priceInput = document.querySelector(`tr:nth-child(${row + 2}) td:nth-child(4) input`);
            const quantityInput = document.querySelector(`tr:nth-child(${row + 2}) td:nth-child(5) input`);
            const totalCell = document.querySelector(`tr:nth-child(${row + 2}) td:nth-child(6)`);
    
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseFloat(quantityInput.value) || 0;
            const total = price * quantity;
    
            totalCell.textContent = total.toFixed(2);
        }
    
        function addRow() {
            const table = document.getElementById('stockTable');
            const newRow = table.insertRow(-1);
    
            const dateCell = newRow.insertCell(0);
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.addEventListener('input', captureData);
            dateCell.appendChild(dateInput);
    
            const itemNameCell = newRow.insertCell(1);
            const itemNameInput = document.createElement('input');
            itemNameInput.type = 'text';
            itemNameInput.addEventListener('input', captureData);
            itemNameCell.appendChild(itemNameInput);
    
            const descriptionCell = newRow.insertCell(2);
            const descriptionInput = document.createElement('input');
            descriptionInput.type = 'text';
            descriptionInput.addEventListener('input', captureData);
            descriptionCell.appendChild(descriptionInput);
    
            const priceCell = newRow.insertCell(3);
            const priceInput = document.createElement('input');
            priceInput.type = 'number';
            priceInput.step = '0.01';
            priceInput.addEventListener('input', captureData);
            priceCell.appendChild(priceInput);
    
            const quantityCell = newRow.insertCell(4);
            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.addEventListener('input', captureData);
            quantityCell.appendChild(quantityInput);
    
            const totalCell = newRow.insertCell(5);
        }
        </script>
    </main>
  </body>
</html>