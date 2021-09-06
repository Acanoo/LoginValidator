<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>

    <?php include './templates/nav.php' ?>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col col-md-6">
                <h3>Nueva cuenta</h3>
                <hr />
                <form id="register-form">
                    <div class="mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                </form>
                <div class="alert alert-danger mt-4 d-none" id="error-message"></div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.2/axios.min.js"></script>
    <script>
        document.getElementById('register-form').onsubmit = (e) => {
            const errorMessage = document.getElementById('error-message');
            errorMessage.classList.add('d-none');
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            //Validacion de los datos ingresados
            if (!email || !name || !password) {
                return;
            }
            axios.post('api/register.php', {
                    email: email,
                    name: name,
                    password: password
                })
                .then(res => {
                    //redirecciona al panel.php
                    console.log(res);
                })
                .catch(err => {
                    errorMessage.innerText = err.response.data;
                    errorMessage.classList.remove('d-none');
                });


        }
    </script>
</body>

</html>