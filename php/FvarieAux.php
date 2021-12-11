<?php
    function contentOfDir ($dir){//restituisce array con i file contenuti nella directoy dir
        $content = scandir($dir);
        unset($content[0]);//toglie .
        unset($content[1]);//toglie ..

        return array_values($content); //resetta gli indice dell'array cos' parte da 0
    }

    function selectBuilder($tipo, $partdir, $mydir, $i){
        if($tipo == 'magliascelta')
        echo'    
        <select name='.$partdir.'/'.$mydir[$i].' id='.$partdir.'/'.$mydir[$i].'>
            <option value="0">Scegli la misura</option>
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
        </select>';


        if($tipo == 'scarpascelta'){
            echo '<select name='.$partdir.'/'.$mydir[$i].' id='.$partdir.'/'.$mydir[$i].'>
                <option value="0">Scegli la misura</option>
                <option value="-1"><30</option>
                ';
                for($j = 31; $j<50; $j++){
                     echo "<option value=".$j.">".$j."</option>";
                }
                echo '<option value="1">>50</option>
           </select>';
        }


        if($tipo == 'pantalonescelto'){
            echo '<select name='.$partdir.'/'.$mydir[$i].' id='.$partdir.'/'.$mydir[$i].'>
                <option value="0">Scegli la misura</option>
                <option value="-1"><30</option>
                ';
                for($j = 31; $j<80; $j++){
                    echo "<option value=".$j.">".$j."</option>";
                }
                echo '<option value="1">>80</option>
            </select>';
        }
    }




    function elementicatalogoBuilder($dir, $tipo){
        $exp = explode('/', $dir);
        $partdir = 'img/'.$exp[2].'/'.$exp[3].'/'.$exp[4]; 
        $mydir = contentOfDir($dir);

        for($i = 0 ; $i <sizeof($mydir); $i+=3){
            echo'<li>';
            
                if(isset($mydir[$i])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i].' alt="1">';
                    
                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i].'>';
                        
                        selectBuilder($tipo, $partdir, $mydir, $i);

                    echo '</span>';
                }else{break;}

                if(isset($mydir[$i+1])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i+1].' alt="2">';
                       
                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i+1].'>';
                        
                        selectBuilder($tipo, $partdir, $mydir, $i+1);
                        
                    echo '</span>';
                }else{break;}

                if(isset($mydir[$i+2])){
                    echo'<span>';
                        echo '<img src='.$dir.'/'.$mydir[$i+2].' alt="3">';

                        echo '<input type="radio" name='.$tipo.' id='.$tipo.' value='.$partdir.'/'.$mydir[$i+2].'>';
                        
                        selectBuilder($tipo, $partdir, $mydir, $i+2);

                    echo '</span>';
                }else{break;}

            echo'</li>';
        }
    }
?>