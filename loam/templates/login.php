<html>
<?php if (!isset($_SESSION['LOGGED_USER'])): ?>
    <section class="login">
        <h2>Connexion</h2>
        <form method="POST" action="http://localhost/loam/src/controllers/post_login.php" class="logForm">
            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])): ?>
                <div class="error_message" role="alert">
                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE']; ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">valider</button>
        </form>
    </section>
<?php endif; ?>

</html>