<?php

            ob_start();
            var_dump($productsWithoutVAT);
            $result = ob_get_clean();
            $to = "test@example.com";
            $subject = "test subject";
            $message = "test message ".$result;
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: <sender@example.com>' . "\r\n";
            //$header .= 'Cc: ' .$email. '' . "\r\n";
            $retval = mail($to, $subject, $message, $header);
