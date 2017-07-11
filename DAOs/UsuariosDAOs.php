<?php

class UsuariosDAOs {

    function Verificar_usuario($login, $senha) {
        $sql = "select * from usuarios where nome_login ='" . $login . "' and senha= '" . $senha . "' ";
        $resultado = mysql_query($sql);
        $validar = mysql_fetch_array($resultado);

        return $validar["cod_usuario"];
    }

    function listatodostabela() {
        $sql = "select * from usuarios";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["nome_usuario"] . "</td><td>" . $linha["tipo"] . "</td><td>" . $linha["matricula"] . "</td><td>" . $linha["Funcao"] . "</td><td><a href=\"../controle/controleusuario.php?tipo=excluir&id=" . $linha["cod_usuario"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleusuario.php?tipo=alterar&id=" . $linha["cod_usuario"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelanome($nome) {
        $sql = "select * from usuarios where usuarios.nome_usuario like '%" . $nome . "%'";
        $query = mysql_query($sql);
        
        if ($query) {
            if (mysql_num_rows($query) > 0) {
                while ($linha = mysql_fetch_array($query)) {
                    echo "<tr><td>" . $linha["nome_usuario"] . "</td><td>" . $linha["tipo"] . "</td><td>" . $linha["matricula"] . "</td><td>" . $linha["Funcao"] . "</td><td><a href=\"../controle/controleusuario.php?tipo=excluir&id=" . $linha["cod_usuario"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleusuario.php?tipo=alterar&id=" . $linha["cod_usuario"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
                }
            }
        }
    }

    function Ver_tipo_usuario($login, $senha) {
        $sql = "select * from usuarios where nome_login ='" . $login . "' and senha= '" . $senha . "'";
        $resultado1 = mysql_query($sql);

        while ($linha = mysql_fetch_assoc($resultado1)) {
            $validar = $linha["tipo"];
        }
        return $validar;
    }

    function Inserir_Usuario($Usuario) {

        $sql1 = "INSERT INTO usuarios (cod_usuario, nome_usuario, nome_login, matricula, tipo, senha, Funcao) VALUES "
                . "(default, '" . $Usuario->getNomeUsuario() . "', '" . $Usuario->getNomeLogin() . "',' " . $Usuario->getMatricula() . "','" . $Usuario->getTipo() . "', '" . $Usuario->getSenha() . "', '" . $Usuario->getFuncao() . "')";
        $resultado = mysql_query($sql1);
        if ($resultado) {
            return 0;
        } else {
            return 1;
        }
    }

    function alterar_usuario($usuario, $id) {
        $sql = "UPDATE usuarios SET nome_usuario='" . $usuario->getNomeUsuario() . "' , nome_login='" . $usuario->getNomeLogin() . "',"
                . " matricula ='" . $usuario->getMatricula() . "', tipo='" . $usuario->getTipo() . "',"
                . " senha='" . $usuario->getSenha() . "', Funcao ='" . $usuario->getFuncao() . "' WHERE cod_usuario='" . $id . "' ";
        $query = mysql_query($sql);
        return $query;
    }

    function deletar_usuario($id) {
        $sql = "delete from usuarios  WHERE cod_usuario=" . $id . " ";
        $query = mysql_query($sql);
        return $query;
    }

    function buscaridusuario($id) {
        $sql = "select * from usuarios  WHERE cod_usuario=" . $id . " ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function Verificar_Nome_Login($nome) {
        $sql = "select * from usuarios where nome_login = '" . $nome . "'";
        $resultado = mysql_query($sql);
        $validar = mysql_num_rows($resultado);
        return $validar;
    }
      function Verificar_Nome_Login_maisalgum($nomev,$nomen) {
        $v=0;
        $sql = "select * from usuarios where nome_login = '" . $nomen . "' and nome_login != '" . $nomev . "'";
        $resultado = mysql_query($sql);
        while($linha=  mysql_fetch_array($resultado)){
            $v=1;
        }
        return $v;
    }

    function Select_lista_usuario() {
        $sql = "select * from usuarios";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<option value=" . $linha["cod_usuario"] . ">" . $linha["nome_usuario"] . "</option>";
        }
    }
    function Validar_Matricula_inserir($matri){
        $v=0;
        $sql = "select * from usuarios where matricula = '" . $matri. "'";
        $resultado = mysql_query($sql);
        while($linha=  mysql_fetch_array($resultado)){
            $v=1;
        }
        return $v;
    }
    function Validar_Matricula_alterar($matrin,$matriv){
        $v=0;
        $sql = "select * from usuarios where matricula = '" . $matrin. "' and matricula !='".$matriv."'";
        $resultado = mysql_query($sql);
        while($linha=  mysql_fetch_array($resultado)){
            $v=1;
        }
        return $v;
    }
}

?>
