<?php
  if($this->session->userdata('customer_id') != "" && $this->session->userdata('customer_email') != ""){
    echo "Ada Session";
  }else{
    echo "Ga Ada Session";
  }
?>