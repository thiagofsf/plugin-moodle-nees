<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_requestbutton_mod_form extends moodleform_mod {

    function definition() {
        $mform = $this->_form;

        // Campo para a URL.
        $mform->addElement('text', 'url', get_string('url', 'mod_requestbutton'), array('size' => '64'));
        $mform->setType('url', PARAM_URL);
        $mform->addRule('url', null, 'required', null, 'client');

        // Campo para o texto do botão.
        $mform->addElement('text', 'buttontext', get_string('buttontext', 'mod_requestbutton'), array('size' => '64'));
        $mform->setType('buttontext', PARAM_TEXT);
        $mform->addRule('buttontext', null, 'required', null, 'client');

        // Switches para os dados a serem enviados.
        $mform->addElement('advcheckbox', 'send_name', get_string('sendname', 'mod_requestbutton'));
        $mform->setDefault('send_name', 1);

        $mform->addElement('advcheckbox', 'send_email', get_string('sendemail', 'mod_requestbutton'));
        $mform->setDefault('send_email', 1);

        $mform->addElement('advcheckbox', 'send_username', get_string('sendusername', 'mod_requestbutton'));
        $mform->setDefault('send_username', 1);

        $mform->addElement('advcheckbox', 'send_courseid', get_string('sendcourseid', 'mod_requestbutton'));
        $mform->setDefault('send_courseid', 1);

        $mform->addElement('advcheckbox', 'send_coursename', get_string('sendcoursename', 'mod_requestbutton'));
        $mform->setDefault('send_coursename', 1);

        $mform->addElement('advcheckbox', 'send_shortname', get_string('sendshortname', 'mod_requestbutton'));
        $mform->setDefault('send_shortname', 1);

        $this->standard_coursemodule_elements();
        $this->add_action_buttons();
    }
}


?>