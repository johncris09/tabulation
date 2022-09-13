<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Manila');
$autoload['packages']  = array();
$autoload['libraries'] = array('email', 'session', 'database', 'user_agent');
$autoload['drivers']   = array();
$autoload['config']    = array();
$autoload['helper'] = array('url', 'file', 'directory');
$autoload['language']  = array();
$autoload['model']     = array('user_model', 'final_round_model', 'candidate_model', 'production_number_model', 'talent_presentation_model', 'production_attire_model', 'swim_wear_model', 'evening_gown_model', 'top_five_model');