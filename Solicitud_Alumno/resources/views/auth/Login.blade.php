<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="error-message" id="error-message"></div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Enviar las credenciales al backend
            fetch('http://tu-api-url/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        // Guardar el token en localStorage
                        localStorage.setItem('auth_token', data.token);
                        localStorage.setItem('user', JSON.stringify(data.user));

                        // Redirigir al usuario según su tipo
                        if (data.user.type === 'teacher') {
                            window.location.href = '/teacher-dashboard';
                        } else {
                            window.location.href = '/student-dashboard';
                        }
                    } else {
                        // Mostrar el error
                        document.getElementById('error-message').textContent = 'Credenciales incorrectas';
                    }
                })
                .catch(error => {
                    console.error('Error al hacer la solicitud', error);
                    document.getElementById('error-message').textContent = 'Hubo un error en la conexión';
                });
        });
    </script>

</body>

</html>