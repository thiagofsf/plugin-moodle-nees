<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_neesreqbtn_upgrade($oldversion) {
    global $DB;

    // Verifique se estamos atualizando a partir de uma versão anterior à 2024100701.
    if ($oldversion < 2024100701) {
        // Define o campo buttonurl para ser adicionado à tabela neesreqbtn.
        $table = new xmldb_table('neesreqbtn');
        $field = new xmldb_field('buttonurl', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'buttontext');

        // Adiciona o campo ao banco de dados.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Atualiza o número da versão do plugin.
        upgrade_mod_savepoint(true, 2024100701, 'neesreqbtn');
    }

    return true;
}
?>
