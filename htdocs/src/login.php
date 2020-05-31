

    <script src="js/login.js"></script>

    <form id = "login" method = "POST">
        <label for = "username">Username: </label>
        <input type = "text" name = "username" id = "username"><br>

        <label for = "password">Password: </label>
        <input type = "password" name = "password" id = "password"><br>

        <input type = "checkbox" name="show_password" value="show">
        <label for="show_password"> show password.</label><br>

        <input type = "submit" value = "Login" onclick = "check_login()">
    </form>
