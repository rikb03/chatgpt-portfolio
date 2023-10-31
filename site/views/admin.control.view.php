<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../public/styles/changeUserSettings.css" type="text/css">
</head>
<body>
<div class="container">
    <?php require('partials/nav.php'); ?>
    <main>
        <div class="wrapper">
            <div class="profilePic">
                <img src="../public/images/avatar.png" alt="avatar" class="avatar">
                <h2>Profile pic</h2>
            </div>
            <div class="userData">
                <h2>Change user Data</h2>
                <form class="formData">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" placeholder="Firstname" id="lastname">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" placeholder="Lastname" id="lastname">
                    <label for="mail">Email</label>
                    <input type="text" name="mail" placeholder="Email" id="mail">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" placeholder="Phone number" id="phone">
                    <label for="birth">Date of birth</label>
                    <input type="date" id="birth" name="birth">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <input type="submit" value="save" class="submit">
                </form>
            </div>
            <div class="certificates">
                <form class="form">
                    <label>Certificate</label>
                    <input type="text" name="certificate" placeholder="certificate" id="certificate">
                    <input type="submit" value="save" class="submit">
                </form>
                <form class="form">
                    <label>Certificate</label>
                    <input type="text" name="certificate" placeholder="certificate" id="certificate">
                    <input type="submit" value="save" class="submit">
                </form>
                <form class="form">
                    <label>Certificate</label>
                    <input type="text" name="certificate" placeholder="certificate" id="certificate">
                    <input type="submit" value="save" class="submit">
                </form>
            </div>
        </div>
    </main>
    <aside>
    </aside>
</div>
</body>
</html>
