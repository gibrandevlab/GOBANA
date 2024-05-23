<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: rgb(236, 236, 236);
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .background {
            background-color: rgb(232, 246, 251);
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            /* Necessary for absolute positioning of the img */
            overflow: hidden;
            /* Ensure the img does not overflow the container */
        }

        .background img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            justify-content: center;
        }

        .containerregister {
            align-content: center;
            justify-content: center;
            width: 22%;
            height: auto;
            padding: 3%;
            z-index: 4;
            border: 2px solid rgb(127, 190, 212);
            background-color: rgb(232, 246, 251);
            border-radius: calc(3px + 3%);
            box-shadow: 0 0 20px rgb(127, 190, 212);
            overflow: hidden;
            /* Add this line to prevent content from overflowing */
        }

        .containerregister .register {
            font-size: 20px;
            text-align: left;
            margin-bottom: 20px;
        }

        input {
            border: 2px solid rgb(127, 190, 212);
            border-radius: 3px;
            justify-content: center;
            margin: 14px 0;
            padding: .75rem;
            width: calc(100% - .75rem - 3%);
        }

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: rgb(127, 190, 212);
            opacity: 1;
            /* Firefox */
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: rgb(127, 190, 212);
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: rgb(127, 190, 212);
        }

        button {
            margin-top: 10px;
            background-color: rgb(127, 190, 212);

        }

        .containerregister button,
        .containerregister .helper {
            color: white;
            border: none;
            width: 100%;
            padding: 0.75rem;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;

        }

        .containerregister .helper a {
            font-size: 13px;
            align-items: start;
            color: grey;
            text-align: left;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="background">
        <img src="background.png">

        <div class="containerregister">
            <form action="registerproses.php" method="post">
                <div class="register">Register</div>

                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
                }
                ?>

                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="register">Register</button>
                <div class="helper">
                    <a href="https://wa.me/6281283489276?text=Halo%20saya%20ingin%20mengajukan%20permintaan%20lupa%20password" target="_blank">Lupa Password?</a>
                </div>
            </form>
        </div>

    </div>
</body>

</html>
