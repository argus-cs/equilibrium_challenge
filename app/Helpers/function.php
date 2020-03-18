<?php

  if(!function_exists('cpf_format')) {

    function cpf_format($cpf) {
      return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
    }

  }
