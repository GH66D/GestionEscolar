<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Iniciar sesión como Administrador</h2>
                <form>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" name="username" placeholder="Ingresa tu usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
                    </div>
                    <button type="submit" id="login-btn" class="btn btn-primary btn-block">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    // Attach click event to login button
    document.getElementById("login-btn").addEventListener("click", function () {
        event.preventDefault();
        var form = document.querySelector("form");
        var formData = new FormData(form); //Get data from form

        //Create an instance of XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define what to do when server responds
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Success! Parse the JSON response
                    var response = JSON.parse(xhr.responseText);
                    if (response.success === true) {
                        // Successful login, redirect to home page
                        window.location.href = "MainAdmin.php";
                    } else {
                        // Invalid credentials, show error message
                        alert("Usuario o contraseña incorrectos");
                    }
                } else {
                    console.error("Error en la llamada AJAX. Estatus: " + xhr.status);
                }
            }
        };

        // Specify the type of request and URL
        xhr.open("POST", "validate.php", true);

        // Send the request
        xhr.send(formData);
    });
</script>

</html>