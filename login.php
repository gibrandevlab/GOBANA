<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .containerlogin {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .containerlogin.show {
            opacity: 1;
        }

        .background {
            background-color: rgb(232, 246, 251);
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .background img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            box-shadow: 0 0 10px 0 rgba(0, 0, 255, 0.5);
        }

        .containerlogin {
            align-content: center;
            justify-content: center;
            width: 22%;
            height: auto;
            padding: 3% 3%;
            z-index: 4;
            border: 2px solid rgb(127, 190, 212);
            background-color: rgb(232, 246, 251);
            border-radius: calc(3px + 3%);
            box-shadow: 0 0 20px rgb(127, 190, 212);
            overflow: hidden;
        }

        .containerlogin .login {
            font-size: 30px;
            text-align: left;
            margin-bottom: 20px;
        }

        input {
            border: 2px solid rgb(127, 190, 212);
            border-radius: 3px;
            margin: 14px 0;
            padding: .75rem;
            width: calc(100% - .75rem - 3%);
        }

        ::placeholder {
            color: rgb(127, 190, 212);
            opacity: 1;
        }

        :-ms-input-placeholder {
            color: rgb(127, 190, 212);
        }

        ::-ms-input-placeholder {
            color: rgb(127, 190, 212);
        }

        button {
            margin-top: 10px;
            background-color: rgb(127, 190, 212);
        }

        .containerlogin button,
        .containerlogin .helper {
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

        .containerlogin .helper a {
            font-size: 13px;
            align-items: start;
            color: grey;
            text-align: left;
            text-decoration: none;
        }

        .registerrequest {
            text-align: center;
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="background">
        <img src="background.png">
        <img src="bg2.png" style="z-index: 0; OBJECT-FIT: fill">


        <div class="containerlogin">
            <form action="loginproses.php" method="post">
                <div class="login">Masuk</div>
                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
                ?>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login">Masuk</button>
                <div class="helper">
                    <a href="https://wa.me/6281283489276?text=Halo%20saya%20ingin%20mengajukan%20permintaan%20lupa%20password" target="_blank">Lupa Password?</a>
                </div>
                <div class="registerrequest">
                    Belum memiliki akun?<a href="register.php"> Daftar Sekarang!</a>
                </div>
            </form>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan kelas 'show' ke elemen '.containerlogin' setelah 1 detik
            setTimeout(function() {
                document.querySelector('.containerlogin').classList.add('show');
            }, 500); // 1000 milidetik = 1 detik
        });
    </script>

</body>

</html>