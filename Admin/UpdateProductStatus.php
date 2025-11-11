</form>
</td></tr></Table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteProduct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #form2{
            justify-content: left; 
            width: 410px;
            height: 450px;
            padding: 20px;
            border-radius: 3%;
            margin-top: 130px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5)
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <table align = "center">
        <form method="post" action="UpdateProductStatus2.php" enctype="multipart/form-data">
            <tr>
                <td>
                    <div id = "form2">
                        <h4 align = 'center'>Update Product Status</h4><br>
                        <label class="form-label">Product ID</label><br>
                            <input type="text" name="Pro_id" size="45" required class="form-select form-select-sm"><br>
                        <label class="form-label">Purchaser ID</label><br>
                            <input type="text" name="Email" size="45" class="form-select form-select-sm"><br>
                        <label class="form-label">Selled Date</label>
                            <input type="date" name="date" required class="form-select form-select-sm"><br>
                        <label>What do you want to do</label>
                            <select name="Choose" class="form-select form-select-sm">
                                <option value="Status to NULL">Status to NULL</option>
                                <option value="Selled and Status to NULL">Selled and Status to NULL</option>
                                <option value="Selled and Update" selected>Selled and Update</option>
                            </select>
                            <br>
                        <div align = "right">
                            <button type="submit" class="btn btn-outline-secondary">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <button onclick="window.location.href='admin_home.php'" class="btn btn-outline-secondary" >Return</button>
                        </div>
                    </div>
                </td>
            </tr>
        </form>
    </table>
    </body>
</html>