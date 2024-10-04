<?php

require_once('../../config.php');
require_once('lib.php');

$id = required_param('id', PARAM_INT);  // ID do módulo do curso.
$cm = get_coursemodule_from_id('requestbutton', $id);
$course = get_course($cm->course);
$context = context_module::instance($cm->id);

require_login($course, true, $cm);

// Carregar as configurações da instância a partir da tabela personalizada.
$instance = $DB->get_record('requestbutton', array('id' => $cm->instance), '*', MUST_EXIST);

$PAGE->set_url('/mod/requestbutton/view.php', array('id' => $id));
$PAGE->set_title($course->fullname);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();

// Preparar os parâmetros a serem enviados.
$params = array();
if ($instance->send_name) {
    $params['aluno'] = $USER->firstname . ' ' . $USER->lastname;
}
if ($instance->send_email) {
    $params['email'] = $USER->email;
}
if ($instance->send_username) {
    $params['user'] = $USER->username;
}
if ($instance->send_courseid) {
    $params['idcurso'] = $course->id;
}
if ($instance->send_coursename) {
    $params['nomecurso'] = $course->fullname;
}
if ($instance->send_shortname) {
    $params['codcurso'] = $course->shortname;
}

$query = http_build_query($params);
$url_with_params = $instance->url . '?' . $query;

// Exibir o botão.
echo html_writer::tag('a', format_string($instance->buttontext), array('href' => $url_with_params, 'class' => 'btn btn-primary'));

echo $OUTPUT->footer();



?>