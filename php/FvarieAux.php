<?php
    function contentOfDir ($dir){//restituisce array con i file contenuti nella directoy dir
        $content = scandir($dir);
        unset($content[0]);//toglie .
        unset($content[1]);//toglie ..

        return array_values($content); //resetta gli indice dell'array cos' parte da 0
    }

    function elementicatalogoBuilder($dir, $tipo){
        $exp = explode('/', $dir);
        $partdir = $exp[2].'/'.$exp[3].'/'.$exp[4]; 
        $mydir = contentOfDir($dir);

        for($i = 0 ; $i <sizeof($mydir); $i+=3){
            echo'<li>';
            
                if(isset($mydir[$i])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i].' alt="1">';
                    
                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i].'>';
                        echo'    
                        <select name='.$partdir.'/'.$mydir[$i].' id='.$partdir.'/'.$mydir[$i].'>
                            <option value="0">Scegli la misura</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                        </select>';
                    
                    
                    echo '</span>';
                }else{break;}

                if(isset($mydir[$i+1])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i+1].' alt="2">';
                       
                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i+1].'>';
                        echo'    
                        <select name='.$partdir.'/'.$mydir[$i+1].' id='.$partdir.'/'.$mydir[$i+1].'>
                            <option value="0">Scegli la misura</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                        </select>';
                        
                        
                    echo '</span>';
                }else{break;}

                if(isset($mydir[$i+2])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i+2].' alt="3">';

                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i+2].'>';
                        echo'    
                        <select name='.$partdir.'/'.$mydir[$i+2].' id='.$partdir.'/'.$mydir[$i+2].'>
                            <option value="0">Scegli la misura</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                        </select>';

                    echo '</span>';
                }else{break;}

            echo'</li>';
        }
    }
?>