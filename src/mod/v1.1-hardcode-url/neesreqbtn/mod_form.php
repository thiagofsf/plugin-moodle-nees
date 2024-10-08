<?php
defined('MOODLE_INTERNAL') || die();
require_once("$CFG->dirroot/course/moodleform_mod.php");

class mod_neesreqbtn_mod_form extends moodleform_mod {
    public function definition() {
        $mform = $this->_form;

        // Nome e descrição do plugin.
        $mform->addElement('text', 'name', get_string('neesreqbtn', 'neesreqbtn'), ['size' => '64']);
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $this->standard_intro_elements();

        // Texto do botão.
        $mform->addElement('text', 'buttontext', get_string('buttontext', 'neesreqbtn'), ['size' => '64']);
        $mform->setType('buttontext', PARAM_TEXT);
        $mform->addRule('buttontext', null, 'required', null, 'client');

        // Adicionar as partes padrão de um formulário de atividade.
        $this->standard_coursemodule_elements();

        $this->add_action_buttons();
    }
}
?>