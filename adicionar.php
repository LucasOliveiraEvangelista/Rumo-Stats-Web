<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Temporada</title>
</head>
<body>
    <form action="novatemporada.php" method="POST">
    
        <label for="temp">Temporada:</label>
        <input type="number" name="temporada" id="temp"><br><br>

        <label for="time">Time:</label>
        <input type="text" name="clube" id="time"><br><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade"><br><br>

        <label for="jogos">Jogos:</label>
        <input type="number" name="jogos" id="jogos"><br><br>

        <label for="gols">Gols:</label>
        <input type="number" name="gols" id="gols"><br><br>

        <label for="assists">Assistências:</label>
        <input type="number" name="assistencias" id="assists"><br><br>

        <!-- Liga nacional:
        <select name="liga" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>
        

        Copa nacional:
        <select name="copa" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        Supercopa nacional:
        <select name="supercopa" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        Uefa Champions League:
        <select name="champions" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        Uefa Europa League:
        <select name="europa" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        Uefa Supercuo:
        <select name="supercup" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        Libertadores da América:
        <select name="libertadores" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        < Mundial de Clubes:
        <input type="radio" name="mundial" value="Sim">Sim
        <input type="radio" name="mundial" value="Não">Não<br><br> 

        Bola de Ouro:
        <select name="goldenball" id="">
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br> -->
        <?php

        $id = $_GET['id'];
        echo "<input type='hidden' name='id' value='$id'>"
        ?>

        <input type="submit" value="Adicionar" name="enviar">
    </form>
</body>
</html>