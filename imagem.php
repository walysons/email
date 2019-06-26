<?php
        $altura = "140";
        $largura = "200";
         
      
      switch($_FILES['arquivo']['type']):
          case 'image/jpeg';
          case 'image/pjpeg';
              $imagem_temporaria = imagecreatefromjpeg($_FILES['arquivo']['tmp_name']);
              
              $largura_original = imagesx($imagem_temporaria);
              
              $altura_original = imagesy($imagem_temporaria);
              
              $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
              
              $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
              
              $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
              imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
              $destino = 'prod_img/' . uniqid ( time () ) . '.' .$_FILES['arquivo']['name'];
              imagejpeg($imagem_redimensionada, $destino);
              
          
              
              
          break;
          
          //Caso a imagem seja extensão PNG cai nesse CASE
          case 'image/png':
          case 'image/x-png';
              $imagem_temporaria = imagecreatefrompng($_FILES['arquivo']['tmp_name']);
              
              $largura_original = imagesx($imagem_temporaria);
              $altura_original = imagesy($imagem_temporaria);
              
              
          
              $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);
  
      
              $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);
              
          
              $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
              
              
              
              imagealphablending($imagem_redimensionada, false);
              imagesavealpha($imagem_redimensionada, true);
  
              imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
              
              //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
              $destino = 'prod_img/' . uniqid ( time () ) . '.' .$_FILES['arquivo']['name'];
              imagepng($imagem_redimensionada,$destino);
              
             // colocar essa variavel $destino no  banco  //
          break;
      endswitch; 
?>