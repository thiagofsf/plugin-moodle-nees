<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Adiciona uma nova instância da atividade.
 *
 * @param object $neesreqbtn Dados do formulário.
 * @return int ID da nova instância.
 */
function neesreqbtn_add_instance($neesreqbtn) {
    global $DB;
    $neesreqbtn->timemodified = time();
    return $DB->insert_record('neesreqbtn', $neesreqbtn);
}

/**
 * Atualiza uma instância existente da atividade.
 *
 * @param object $neesreqbtn Dados do formulário.
 * @return bool Sucesso ou falha.
 */
function neesreqbtn_update_instance($neesreqbtn) {
    global $DB;
    $neesreqbtn->timemodified = time();
    $neesreqbtn->id = $neesreqbtn->instance;
    return $DB->update_record('neesreqbtn', $neesreqbtn);
}

/**
 * Deleta uma instância da atividade.
 *
 * @param int $id ID da instância a ser deletada.
 * @return bool Sucesso ou falha.
 */
function neesreqbtn_delete_instance($id) {
    global $DB;
    if (!$neesreqbtn = $DB->get_record('neesreqbtn', ['id' => $id])) {
        return false;
    }
    return $DB->delete_records('neesreqbtn', ['id' => $id]);
}

/**
 * Modifica a exibição da atividade na página do curso para adicionar o botão.
 * 
 * @param cm_info $cm
 */
function mod_neesreqbtn_cm_info_view(cm_info $cm) {
    global $USER, $DB, $PAGE;

    // Obtém o curso e a instância da atividade.
    $course = $DB->get_record('course', ['id' => $cm->course], '*', MUST_EXIST);
    $neesreqbtn = $DB->get_record('neesreqbtn', ['id' => $cm->instance], '*', MUST_EXIST);

    // URL da requisição GET (substitua pela URL real).
    $url = 'http://localhost:80/teste.php'; // Defina sua URL aqui.
    $params = [
        'username' => $USER->username,
        'fullname' => fullname($USER),
        'email' => $USER->email,
        'coursename' => $course->fullname,
        'courseshortname' => $course->shortname,
    ];
    $query = http_build_query($params);
    $fullurl = $url . '?' . $query;

    // Cria o HTML do botão.
    $buttonhtml = '<a href="' . $fullurl . '" class="btn btn-primary" style="margin-top: 10px;">' . format_string($neesreqbtn->buttontext) . '</a>';

    // Adiciona o botão ao sumário da atividade.
    $cm->set_content($buttonhtml);
}
