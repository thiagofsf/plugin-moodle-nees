<?php
require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course Module ID.

if ($id) {
    $cm = get_coursemodule_from_id('neesreqbtn', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', ['id' => $cm->course], '*', MUST_EXIST);
    $neesreqbtn = $DB->get_record('neesreqbtn', ['id' => $cm->instance], '*', MUST_EXIST);
} else {
    error('You must specify a course_module ID.');
}

require_login($course, true, $cm);

// Definir o contexto da página.
$context = context_module::instance($cm->id);
$PAGE->set_url('/mod/neesreqbtn/view.php', ['id' => $cm->id]);
$PAGE->set_title($neesreqbtn->name);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();

// URL para a requisição GET.
$url = 'http://localhost:80/teste.php'; // Substitua pela sua URL.
$params = [
    'username' => $USER->username,
    'fullname' => fullname($USER),
    'email' => $USER->email,
    'coursename' => $course->fullname,
    'courseshortname' => $course->shortname,
];
$query = http_build_query($params);
$fullurl = $url . '?' . $query;

echo $OUTPUT->box(format_module_intro('neesreqbtn', $neesreqbtn, $cm->id));

// Botão.
echo '<a href="' . $fullurl . '" class="btn btn-primary">' . format_string($neesreqbtn->buttontext) . '</a>';

echo $OUTPUT->footer();
?>