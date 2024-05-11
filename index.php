<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>IgralnaSoba></title>
        <meta charset="utf-8" >
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="slike/vijola.png">
    </head>
    <body>
        <h1>Igra metanje kock</h1>
        <div id="center">
            <form action="igra.php" autocomplete="off" name="form" method="post">     
            <div id="igralec">
                <table>
                <tr>
                    <td>
                        <label for="up1">Igralec 1:</label>
                        <input
                            class="vpis"
                            name="up1"
                            type="text"
                            placeholder="Ime"
                            required
                            maxlength="10"
                            />
                    </td>
                    <td>
                        <label for="up2">Igralec 2:</label>
                        <input
                            class="vpis"
                            name="up2"
                            type="text"
                            placeholder="Ime"
                            required
                            maxlength="10"
                            />
                    </td>
                    <td>
                        <label for="up3">Igralec 3:</label>
                        <input
                            class="vpis"
                            name="up3"
                            type="text"
                            placeholder="Ime"
                            required
                            maxlength="10"
                            />
                    </td>
                </tr>
            </table>
            </div>
                <div id="kocke">
                    <label for="stKock">Število kock:</label><br>
                    <select name="stKock" class="izb">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br>
                    <label for="stMetov">Število metov:</label><br>
                    <select name="stMetov" class="izb">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <input type="submit" onClick="return isEmpty()" name="igraj" value="VRZI"></input>
                </div>
            </form>
        </div>
    </body>
</html>