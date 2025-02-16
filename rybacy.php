<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Ryby</title>
    <link rel="icon" type="image/x-icon" href="szczupak.jpg">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Grupa Polskich Rybaków</h1>
    </header>
    <main>
        <nav>
            <h2>Menu</h2>
            <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="https://www.ryby.pl/" target="_blank">Rozpoznaj ryby</a></li>
                <li>
                    <a href="rybacy.php">Poznaj rybaków</a>
                </li>
            </ol>
        </nav>
        <section id="panelPrawy">
            <h2>Poznaj naszych rybaków</h2>
            <form method="get" action="">
            <h3>cena <input type="radio" name="wybierz" value="cena"> rozmiar <input type="radio" name="wybierz"    value="rozmiar"><input type="submit" value="Sortuj"></h3>
            </form>

            <table>
            <tr>
                <th>RYBAK</th>
                <th>RYBY</th>
                <th>CENA</th>
                <th>WAGA ~KG</th>
            </tr>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'zadanie_ryby');
            if (isset($_GET['wybierz']) && $_GET['wybierz'] == "cena") {
                $sortowanie = "wartosc";
            } else{
                $sortowanie = "waga";
            }
            $zap = "SELECT rybak, ryby, wartosc, waga FROM polowy ORDER BY $sortowanie DESC";
            $res = mysqli_query($con, $zap);
            while ($row = mysqli_fetch_array($res)) {
                echo"
                <tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                </tr>
                ";
            }
            mysqli_close($con)
            ?>
            </table>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Piotr J.</p>
    </footer>
</body>

</html>
