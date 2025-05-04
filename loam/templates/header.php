<html>
    <a href="index.php" class="title">My Life On A Map</a>
    <ul class="navigation">
        <div>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <li>
                    <a href="new_exercice.php">aide</a>
                </li>
                <li>
                    <a href="http://localhost/loam/src/controllers/logout.php">Déconnexion</a>
                </li>
            </div>
        <?php endif; ?>
    </ul>
</html>