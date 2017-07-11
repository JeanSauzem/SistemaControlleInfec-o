<?php

class UnidadeDAO {

    function selectUnidade() {
        $sql = "select * from unidade";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<option value='" . $linha["codunidade"] . "'>" . $linha["SiglaUnidade"] . "</option>";
        }
    }

}

?>