<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
include "connect.php";
?>
<?php
session_start();
if(!isset($_SESSION['user']))
header('Location: /');

$id = $_GET['id_produs'];
if(isset($_GET['delete']))
{
    $sql = mysqli_query($con,"DELETE FROM produse WHERE id_produs = '$id';");
    header('Location: /');

}
else
    if(isset($_GET['editimg']))
    {   
        $sql = "SELECT * FROM produse WHERE id_produs='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        echo '

        <div>
        <span>Current image:</span><br><br>
        <img src = '.$row['imagine_produs'].'>    
        <br><br>

        </div>


        <form action = "upload.php?id='.$id.'" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <input id = "editimg" name = "editimg" type = "submit" value = "Edit Image" />
        </form>
        ';


    }

    else
    {


        //die(var_dump($id));

        $sql = "SELECT * FROM produse WHERE id_produs = '$id'";

        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);





        echo '

        <form id = "form" action = "op.php" method = "POST" enctype="multipart/form-data" >
        <label for = "name">Nume: </label>
        <input type = "text" name = "name" id = "name" value = "'.$row['nume_produs'].'"/>
        <span id="errorname_nume"></span>
        <br>

        <label for = "descriere">Descriere: </label>
        <input type = "text" name = "descriere" id = "descriere" value = "'.$row['descriere_produs'].'"/>
        <span id="errorname_descriere"></span>
        <br>

        <label for = "pret">Pret: </label>
        <input type = "text" name = "pret" id = "pret" value = "'.$row['pret_produs'].'"/>
        <span id="errorname_pret"></span>
        <br>

        <br><br>


        <input id = "id"type="hidden" name="id" value="'.$id.'" />



        <input id = "edit" name = "edit" type = "submit" value = "Update" />
        </form>

        ';

}

?>

<style>
    input {
        display:block;
    }
</style>
<script>




    $(document).ready(function(){
        $("#edit").click(function(event){


            var 
            ok = 0;
            form = document.getElementById('form'),
            nume = document.getElementById('name'),
            descriere = document.getElementById('descriere'),
            pret = document.getElementById('pret'),
            id = document.getElementById('id'),
            errorMessage_nume = document.getElementById('errorname_nume'),
            errorMessage_descriere = document.getElementById('errorname_descriere'),
            errorMessage_pret = document.getElementById('errorname_pret');


            ok = 1;
            event.preventDefault();
            if (nume.value === '' || !nume.value.length) {
                errorMessage_nume.innerText = 'Trebuie introdus un nume';
                ok = 0;
            } else {
                errorMessage_nume.innerText = '';
            }

            if (descriere.value === '' || !descriere.value.length) {
                errorMessage_descriere.innerText = 'Trebuie introdusa o descriere';
                ok = 0;
            } else {
                errorMessage_descriere.innerText = '';
            }

            if (pret.value === '' || !pret.value.length) {
                errorMessage_pret.innerText = 'Trebuie introdus un pret';
                ok = 0;
            } else {
                errorMessage_pret.innerText = '';
            }

            if (isNaN(pret.value)) {
                errorMessage_pret.innerText = 'Trebuie introdus un pret corect';
                ok = 0;
            } else {
                errorMessage_pret.innerText = '';
            }

            if (ok)
            { var frm = $('#form');
                $.ajax({
                    type: "POST",
                    url: "data.php",
                    dataType:'json',
                    data: {'nume': nume.value, 'descriere': descriere.value, 'pret': pret.value, 'id': id.value},
                    success: function (data) {
                    },
                    error: function (ex) {
                        document.location = '/';
                    }

                });
            }



        });

    });

</script>