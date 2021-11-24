<?php
    include('../_php/verificaruser.php');
    require('../_php/vendor/autoload.php');
try
{
    $client = new GuzzleHttp\Client();

    $resposta = $client->request(
        'GET',
        'https://api-quem-da-mais.herokuapp.com/usuarios/usuario/' . $emailUser . '/' . $senhaUser // URI da Api'
    );

    $dados = json_decode($resposta->getBody());
    // VARIAVEIS DADOS DO USUÁRIO
    $nome_cadr = $dados->nome;
    $email_cadr = $dados->email;
    $cpf_cadr = $dados->cpf_cnpj;
    $telefone_cadr = $dados->telefone;
    $membrodesder = $dados->criacao_conta;
    $data_nascimento = $dados->data_nascimento;
    $endereco_cadr = $dados->endereco;
    $site = $dados->link;
    $adDestaque = $dados->destaque_produto;
    $avatarr = $dados->path_avatar;
    if($adDestaque == 'off') {
        $adDestaquer = 'Não';
    } else {
        $adDestaquer = 'Sim';
    }
    

    // Inverter data
    function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }

    $data_nascimentor = inverteData($data_nascimento);
}
catch (Exception $e)
{
    echo "Ops, algo deu errado, por favor, faça login novamente";
    header('refresh: 0.5; url=../_html/loging.html');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/alterar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=PT+Sans+Narrow&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>Bem vindo</title>
</head>

<body>
    <div class="box">
        <div class="links"><a class="tlink" href="../_php/sair.php">Sair</a><img style="position: absolute; margin-top:-2px; width:25px; margin-left: 3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABiklEQVRoge3aPU7DQBiE4dkoikSFBC13oEZcg8NQpoGQY0DFCTgBDUWSho6WBFFyAV6KmD/FWPs5MRlHnno/ax5lZVvOChgAY2CBT+bACBgoN8DVlktX5TICmRdDJ9lDDQc4LTrNI0MANNirVqK9ek2W+c90ELd0ELc4Q84ji/tNtVg3KaUxsJc94PocicZ5a4ViCQFugTtgPzJkt7WASVHrIRtjCjkCnopqE+AgZ8gOItXAuEKkFcy0EuMMkQIYd4hUijksW2QPkTIwbYFIK5jZL0ybIFIFpm0QqRyTPhEppVTjgknSTNLxpssGM133XStJet9Ek7WzK1urdZA/b8NtglQ+S9oC2YkHYgli9X3LHULu67wzJBtRLLaEhBDFgB0kjCiGHCGPRa3sjw+uXxpfJb1IOkspvWVNOP4idWL5ga5OrCHAMLLYcmsBw1AvY0iol/XWiqSDuKWDuKUnaSEtD7JsuctXfnTJPlTTl3Sj5V/B94Z34evslSwPno34Pu7kkGfggsDBsw++olX6BWL12gAAAABJRU5ErkJggg=="></div>
        <div class="links"><a class="tlink" href="../_php/alterardados.php">Minha conta</a><img style="position: absolute; margin-top:-6px; width:32px; margin-left: 3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAFDklEQVR4nO3cS2gdVRzH8d9JbaUmtvXVuvBRxcbESI1QMZJWQaUgLgSturAVDK3ig7pUEKV0rRSUtlhQBLvwsRAX4soIxkdESNIKaqxNqIogFYxJTSyl+bo4U6SR5MzceZy56f8Dl1w6t//7/8+ZuXPmzJmRjDHGGGOMMcYYY8y5wsVOIC2gTdK9ku6U1C3pGkmrksUTksYlDUvql/SRc+7vGHkuOsBq4DVgivSmgFeB1bHzb1rAMuCljCt+rkngRWBZ7HqaCnAJ8GmOFT/X58Ca2HU1BaATGC9w5Z8xBnTGrq/W8Fv+TyWs/DPGgcti11lLwFKK/dmZzwB2TPg//AG3Krtj11srwBp8jyWNIeAZ/LGiNXl1Jv82nDLGP8Da2HXXBr6fHzID9AHznjwCLcD25LMh+6qssbaANsJ9/WmgN0PMjSkaYRJoLbO2pgA8nGJr7Wsg7o4UcbeUUVNTAV4PrKQhoKWBuC3ASCD2/jJqyiJzYSXoDix/wzk3mzVo8n/eDHzspqxxFx3geGAr7cgR+4ZA7N+LrKURddgDVgSW/5oj9s+B5StzxC5EHRqgTLWvrw4JTgaWX5kj9hWB5X/liF2IOjTAWGD53Tlibw4sP5ojdiHq0ADDgeV9jXZDJT0W+NhI1rhFq0MD9AeWd0vKfCImabuk9YHPfNJA3MUFP5gWGoqYATZmiLmJdEMRF5RZW9PAX0APmcEPL8y71+LPfp9IsfIB9lZZY63hZz6kHY4eAXYCXfi9py15vxM4lDLGDHBV7LprBT97oSq7YtdbO9glyfiwi/Lx4S8vjpWw8o+SY2DvnILfE/oLXPkD2DTFbPDHhN34C+iNmgF2AUtj19O0gLXAPtJ3U0k+u5cm6Go20/T0Vkn3yE9Pv1nStTp7evqYpCH5oY2PnXPTMfI0xhhjjDHGGGOMMWY+tR2Mw1+56pB0vaT25LVK0oXJ3xXJe0makp/iOJG8n5D0o6TR5O8PzrnjVeafVi0aAD8/p0fS7ZLukJ+3f1HBX/On/Ey4z5LXYB1GTKM0AP5Gux5J98mv9A2Sqr5ockrSN/KN8aGkr51zVJxDtQ0AdEl6UNIjkq6r8rtT+EXSB5Lel/RFVY1RegMAl0vaIWmbpHVlf19Bjkh6W9IB51z0u2gaAtwIHARO5rimG9tJfA1dsddnakA78C5wOuqqK9Zp4B2g8D24sJ8gYLmk5yQ9L+n8ouLWzClJ+yW94Jw7UUTAQhoAWC/pPfk+e1FmJR2T78d/L9+nH5f0h/ytRZP67xajlfLnBSslXSr/PLmO5NUu6WoVey/EqKSHnHOH8wbK3QDAVkkHJC3PGWpa0qCkgeQ1WNSD9/AzKnokbZLv9t4qKe+9ATOSHnfOHcwZp3HA08Bsjt/WY8DLQC8VTp7CT/rqBV5JcmjULPBUVXnPLWJbg0n/BuwBbmOBJ59UWIdLctmT5NaIrVUnvY5sM9XAT459Fn+wriX8kxofBb7LWNsJqnoeHX6L+SpDcsPA/TRwp2Ms+FudHiD9A6AAvqwquc0pE5oEngSWVJJYCYAl+ONc2r39riqSeitFIocp4aQlFvxP7rcp6g49naWQZI4EkjgEFD2UHB1wcbJhLWS0ikSmA0lsKD2JSIBbArVnPm/J3A0EFhymdc5F71qWqej6m6ZnslidV3TA0BZizmZ7QGTWAJFZA0RmDRCZNUBk1gCRWQMYY4wxxhhjjDHGGFORfwEa2qP8yd39VQAAAABJRU5ErkJggg=="></div> <!--<img id="fotodeperfil" src="../_img/fotoperfil.png" alt="">-->
        <div class="links"><a class="tlink" href="#">Leilões iniciados</a><img style="position: absolute; margin-top:-6px; width:35px; margin-left: 3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAADrUlEQVR4nO2Zz0sUYRjHXxfLLFC0Lka6SocKgsQudRGPlpAQ/QPRodIOnryKXeqkXoICtW6BFARWB4MCg/RQdDCtIKVLSRTZDzMr1k+HeZZ9d5zVWeednZnd+V7ceWbe930+z/s+z/vOqFSsWLFixYoVmIC9wF3gOzAHnA7ap4IJSAILZCsFHAvaN99lg38m1zfkeqBQfpQXaiBdQFIp9UQp1aSUmlJKtZeVlf0AquSR1SD8KogcZr5K7INaGowD24P21bhcwK8CX+X3vaIKAtAAzDvAXxXbH+AUcAT4LLYHQEXQvnuWW3jt+eIJQr7wWrvoB2Gr8PLMAeCDVhijFQSXBa8jR9uDwKI8Nwl8iVRh9Ai/R4OfACqBo8C/SATBy7LX+ujV4BPALbIVznSwzfxUPjPv0Fe5wN+Utj+BC6FNB5Pw0i4BjGrwrWK/qK2EcAQBqDcJL22vOcC3AstiD09NAB6bhJf2bcCnHPAjQEso0gGoFSd+AbVi8wSv9b1T/urwo5IelVhbZLDpAOyQ5ZgCzsnseIbX+t8lK8EO/0hsi4GvBLJfZdOaAaoN9d+GVRMSwDYN/iPWoak50CCIY13AfWCYTEGcNhUE23h9aXjNpgdhHLgCDAHHTY/vxsGGAgRht4Otmcz3hLRSBPGhlewToS9BcBizQ2oPwG3guvye9XvsXA4VLAg2+EGxJeV6ya9x3Ti2H+v872c6ZMEDZUAV1rkEYMz0mPk4lz7L40cQXMAvAHWmxsvXucPixDLQabowuoRvMMGyVQdPiiOTcm1sdwg9vDjZIs6sAV1iS3oNQlTg64F3Wu6vAZcc7r1A3iFc9tsO/E7Di02Hfw80+cXl1kn7Uu+VAHhaCVGZecc8B7odgtCprZANg2CDH4oUvHa/V0uHp2RecTc8JxQLfLXY7RrGOiw5to0i/BzQb7uvw89j7Q4ngEM5+piWNpGDn9WWdZ/ct8PndNjW16sowOvb2VtghWxdJs/tifXbp1O1D91Wp898WitY6bDpzDv0PSztRsI6877BS/8Ppe1ZrI+upQMvY3RL+xTW1+bSgZdxEsAA8Ff6mgD2mebJ16mCwNvGrABqTPjv1RG9Mr/JAT8rv4Ov0CZlg59h/VZXMvDPgRqgv1Tg68h9Pu/3I+dDJeCOE7zcqwZeFi28UkoB3wSw0WZ3fbaPtIDXAtmj2UoDXimlgDNkvuD0AI0lA58WcF4CoKu4qv1mkpUwBywBYwT1X5ZYsWLFihXLuP4DZpatMwx/yk4AAAAASUVORK5CYII="></div>
        <div class="links"><a class="tlink" href="#">Veículos por categoria</a><img style="position: absolute; margin-top:-5px; width:30px; margin-left: 3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADe0lEQVRoge2YP2wcRRjF35yR7ci2AKVI4STCwgYBDQUWf6xEKAVQIpAVJCRAFCDiJtRQkpiU1ElFESk4jhVhU2BFMTYNoomtdBHEQtiyMDb+QySs2P5R7Le6yd3e3s3drpNin3Ta3Zn53nvfzTe7sysVKFCgQIECzcO1Egy0SXpZ0pCkAUnH7dch6UkbFh//8Y47kv6w3x1JP0v6xTm334qfYADPAN8Ay2SHFeAiMNiMp6AZAQ5JuiBpRFLJmu9K+knSLUmLdv2vpG1Ju5I2bNwTkh6T1COpW1KfpKckvSjpdTuPcVnSZ865reCMGkjCAdft39sFrgAnM+Q/AXwL3DeNWaBUPzJc6EMTWAdey1ygrPMSsGZa7+Uh8KuRf5Q5ebXWiGnNZE08aMR/AZ2ZkifrPQ7cM83nGolptAY/seMl59x/zdlrHM65TUnf2eXHmZACh4ANYB94OhPSxnSHbEZWgY4sCD8wwhsZ+AvVvm3aw1mQ3TSy9zPwFqp91rSnQ4LeAmaA7YSn7g7QnaPnWp4Om3Ylts3rm5UB7wJ7CQExJg86Cc/bDym+9oB3pPJd60s7/0rSEeeck9QuadX6Fw88gzLueh7azNsRRV5LirxH8Mqpz2t728t8AzgD9ANdeTsHukzrjGnHeMMb0xeXmR84kzJ9v6X0HRTSPMz4iQwAU1Qv9F2gl2gNTQC/U37i5ol7pjVh2r3mxcc2MAn0p03t5zZ4KqfqCQblRX82JGjegoaBduACyS9RW8A4MNCCwaPAmHFVYgkYNQ/D1jYfQh6jA/i6Xh0Qbbt7m0jiWcpb9jScNy8ABCdi50t2WfUOQlS7k9Z/pYlErlns90l/BOX91lKlr2YSiUvq+Rpjj1n/RlJ/HZ24nBJnE3ih0UQa2cZfteMccDrUbB3Epqq+HZjWbIWHQPYHZ6QHmPbqdQ44BXQSLdQpax9rQmfcYieNq9O45zy9H7F9XkulZdcl4FOiTzZJWCPtfl5bZwD4uwbnimmWvPGtJeK1dwNfAAtED61NoltncBIeZy/RF5lN41wwjarddmaJPGyk+Upd7MAr+VgKB/BqWn/il8ZHcTZ82Fb+AdS7/a7n5KUZhHupt0byWkOt6NaakWULHEogi9uWQo02gGx1iXac9XAuG+856hJtm0cpbxh9/AmcA9pzSOSh6BYoUKBAgQL/A+WK1ss0UXvoAAAAAElFTkSuQmCC"></div>
        <div class="links"><a class="tlink" href="../_php/cadastrarveiculo.php">Anunciar</a><img style="position: absolute; margin-top:-5px; width:35px; margin-left: 3px;" <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAE0UlEQVR4nO3bW6xcUxzH8TXq2tYtLlHxUJdEpInrg2pIqWoIQsQRl0Rckop4qFAqIdLgwQMP9aRKBJGIhIhLgoZIL5Q0LlFBEJcQUhqte9vjfDysdZx9jtOZOTN7Zu+j6/syk5m91v+/fvPf//Vfa+0JIZPJZDKZTCazM9Ko0jjWhhDmVOlDE9Y0Go3TWl1UtYCqtN+KRqPRUp9d++FIK9pxtJ9M5IfdpZeO7AxkAbskC9gltRMQa7G6yferTZwd9tcttRMwhDAUQih7dq71bN8xw+FRtR9jmYhfdYzASUXtBGyVA+tG7QQMvcmB/09yDszUT8CcA7sn58B2yTkwUz8Bcw7snpwD2yXnwEz9BMw5sHtyDmyXnAMzWcBuyQJ2SS2eTKhjHmyXqiNwTcX2mzFpSqlJTWkP9WBqCOGMEMKCEMK8EMLhIYRtIYQvQwivhxCWNxqNz8uy978Ax+AmvIo/WzwdMIRncWLVflcG9saFeBBfjRFoEOuwFCdjGvbHHCzHHwUhX8TsqsfTF3AEFmEl/hoj2o94Ggsxo0U/ByVxNxfar8H5/RpL30kRVWS7+HDP7TgJE86hOBD3YEuh31U4qxdjqBSsx7d4BAPYr8S+98Od2FQQch3O6+SH2WlJefU2bCwI+S4uQtV16uQBe6Rc+m1ByA24ElOq9m/SgD1xA74pCPlhSiE5ItsFu6fo+7wg5Ec5IidIEvI6o+vODTi7pP73wlV4SSyxfsVrOLeM/mtDEnJhQcgh3NFFf0fhvlQFbDc+d5c5hlqA3XAztiURF0yg7RRcgFdS22Gew+k4FDNwi5FFQ70iUUmnblicBvhKG9ceIhb/xYnpdzyMk3bQ5tZ03Wvd+loq4kpmVXrfsZg4IA3wpybXzMVT2FoQ7hPcqMWiIEUj/NKJf32hGzHFJSF8N+bzfcQyaENBtO14BvO1ucop9L+p2XWVbumP+Tvpv+fB4t9gh1r83fSa9LoytTk2hHB9COGKEMLe6bvvQwgrQggPNRqN7/7TQ3OuTq9vTrBd9YyJzMV4R9x3nIWjxTX0YIqQQbxXiLYhvC4W3rt1aH+hOElt1+ttNzQwG/fji5RjFmP/kvp/3Pj8jReMlCCb8QCO6dDOLrgUz6e+t+HKMsYwnrGiaF/vYIC/YwWO69LWrmLp8QTex6d4FHPS9yfgckzrwsY54gbGMB/jzG78Hs9IM9G+Tp/Pxrl42eg6axUu0eEt1StwCt4o+PkNrkV5c4OYd5YavSYdNrYMpxpnZhMr/XuN3u/7Pn12WGkOdoB4lvN04UfehCXYq2xDbzWJtHbLgem43uiyYiue1OdzEczEY2KOI65778I+vTK4Rlx7Tki0Jv3NE+uxwYKY68XF/J5l+T2O3YPT3TJcUG8VJ5yDe2Wzp4jrzaVG70L/nAY5s0Q709OtOXz+8ne6dY8sy0aliLvQAynSFQa5Eud3GvFGdm5+KPS7EseXPYbaIJ7yFc+PiSXLEm0eZom13IBYjw7zJub22v/akPLVEqNLpV+SuLOatJuPDwptNmCgn77XCrGAHjC6ThsSa8yLsK94NHox3i5c8xkuk89PRhDXv8vwmx2zMUXuHlX7W1vEZ20WiZPOFnH9u1bcvppatX+ZTCaTyWQymUwm0x/+Aa/9sMyIIr0SAAAAAElFTkSuQmCC"></div>
    </div>
    </div>

    <div id="pesquisar">
        <input type="search" name="pesquisar" id="" placeholder="Procura por algo?">
        <button id="pesquisarbt">Pesquisar</button>
    </div>

    <div>
        <img id="logo" src="../_img/logoquemdamais.png" alt="">
    </div>

    <div id="barrasepara">
    </div>


<form action="../_php/alterando.php" method="post" autocomplete="off">
    <div class="divprincipal">
        <img class="fotouser" src="<?php echo $avatarr; ?>" alt="">
        <input type="file" name="fotoinput" id="inputfoto">
        <div class="box2">
            
                <ul class="itens">
                    <li class="item">
                        <h2>Nome: </h2>
                        <input class="inputs" type="text" name="newnome" placeholder="
                        <?php
                            echo "*" . $nome_cadr;    
                        ?>" required>
                    </li>
                    <li class="item">
                        <h2>Email:</h2>
                        <input class="inputs" type="email" value="
                        <?php
                            echo $email_cadr;    
                        ?>"readonly>
                    </li>
                    <li class="item">
                        <h2>Data Nascimento:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                               echo $data_nascimentor;
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>CPF:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $cpf_cadr;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Endereço:</h2>
                        <input type="text" class="inputs" name="newendereco" placeholder="
                        <?php
                            echo '*' . $endereco_cadr;    
                        ?>" required> 
                    </li>
                </ul>
                <div id="barrameio">
                </div>
                <ul class="itens2">
                    <li class="item">
                        <h2>Telefone:</h2>
                        <input type="text" class="inputs" name="newtelefone" placeholder="
                        <?php
                            echo '*' . $telefone_cadr; 
                        ?>" required> 
                    </li>
                    <li class="item">
                        <h2>Site:</h2>
                        <input type="text" class="inputs" name="newsite" placeholder="
                        <?php
                            echo '*' . $site;    
                        ?>" >
                    </li>
                    <li class="item">
                        <h2>Anúncio em destaque:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $adDestaquer;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Membro desde:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $membrodesder;    
                        ?>" readonly>
                    </li>
                    <button type="submit" id="alterarbt" name="enviado">Alterar</button>
                </ul>
        </div>
    </div>
</form>