<?php
include_once 'core/init.php';

if(Session::exist('success')){
     echo '<p>'.Session::flash('success').'</p>';
}
