<?php

defined('MOODLE_INTERNAL') || die();

function requestbutton_add_instance($data, $mform) {
    global $DB;

    $instance = new stdClass();
    $instance->course = $data->course;
    $instance->url = $data->url;
    $instance->buttontext = $data->buttontext;

    // Dados opcionais
    $instance->send_name = !empty($data->send_name) ? 1 : 0;
    $instance->send_email = !empty($data->send_email) ? 1 : 0;
    $instance->send_username = !empty($data->send_username) ? 1 : 0;
    $instance->send_courseid = !empty($data->send_courseid) ? 1 : 0;
    $instance->send_coursename = !empty($data->send_coursename) ? 1 : 0;
    $instance->send_shortname = !empty($data->send_shortname) ? 1 : 0;

    $instance->timecreated = time();
    $instance->timemodified = $instance->timecreated;

    $instance->id = $DB->insert_record('requestbutton', $instance);
    
    return $instance->id;
}

function requestbutton_update_instance($data, $mform) {
    global $DB;

    $instance = new stdClass();
    $instance->id = $data->instance;
    $instance->course = $data->course;
    $instance->url = $data->url;
    $instance->buttontext = $data->buttontext;

    $instance->send_name = !empty($data->send_name) ? 1 : 0;
    $instance->send_email = !empty($data->send_email) ? 1 : 0;
    $instance->send_username = !empty($data->send_username) ? 1 : 0;
    $instance->send_courseid = !empty($data->send_courseid) ? 1 : 0;
    $instance->send_coursename = !empty($data->send_coursename) ? 1 : 0;
    $instance->send_shortname = !empty($data->send_shortname) ? 1 : 0;

    $instance->timemodified = time();

    return $DB->update_record('requestbutton', $instance);
}

function requestbutton_delete_instance($id) {
    global $DB;

    if (!$instance = $DB->get_record('requestbutton', array('id' => $id))) {
        return false;
    }

    return $DB->delete_records('requestbutton', array('id' => $id));
}

?>