</form>
</td></tr></Table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        #form2{
            justify-content: left;
            width: 410px;
            height: 700px;
            padding: 20px;
            border-radius: 3%;
            margin-top: 10px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5)
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <table align = "center">
    <form method="post" action="AddProduct2.php" enctype="multipart/form-data">
        <tr>
            <td>
                <div id = "form2">
                    <h4 align = 'center'>Add Product</h4><br>
                    <label class="form-label">Seller ID</label><br>
                        <input type="text" name="Email" size="45" required class="form-select form-select-sm"><br>
                    <label class="form-label">Product Name</label><br>
                        <input type="text" name="Pro_name" size="45" required class="form-select form-select-sm"><br>
                    <label class="form-label">Price</label><br>
                        <input type="text" name="Pro_price" size="45" required class="form-select form-select-sm"><br>
                    <label class="form-label" for="Tags">Product Tag(s)</label><br>
                    <table>
                        <tr>
                            <td valign="top">
                                <input type="checkbox" name="Tag1" value = "For Professor">For_Professor<br>
                                <input type="checkbox" name="Tag2" value = "1st Year Student">1st Year Student<br>
                                <input type="checkbox" name="Tag3" value = "2nd Year Student">2nd Year Student<br>
                                <input type="checkbox" name="Tag4" value = "3rd Year Student">3rd Year Student<br>
                                <input type="checkbox" name="Tag5" value = "4th Year Student">4th Year Student<br>
                                <input type="checkbox" name="Tag6" value = "4th+ Year Student">4th+ Year Student<br>
                            </td>
                            <td valign="top">
                                <input type="checkbox" name="Tag7" value = "Electronics">Electronics<br>
                                <input type="checkbox" name="Tag8" value = "Study">Study<br>
                                <input type="checkbox" name="Tag9" value = "Utility">Utility<br>
                                <input type="checkbox" name="Tag10" value = "Cloth and Accessories">Cloth and Accessories<br>
                                <input type="checkbox" name="Tag11" value = "Other(s)">Other(s)
                            </td>
                        </tr>
                    </table><br>
                    <label class="form-label">Date Added</label>
                        <input type="date" name="date" required class="form-select form-select-sm"><br>
                    <label class="form-label">Product Images</label>
                        <input  name="picfile" class="form-control form-control-sm" type="file" aria-label=".form-control-sm example" required >
                        <br>
                </div>
            </td>
            <td>
                <div id = "form2">
                    <label class="form-label">Descriptions</label><br>
                    <textarea name="Pro_description" cols="48" rows="25" class="form-select form-select-sm"></textarea><br></br>
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