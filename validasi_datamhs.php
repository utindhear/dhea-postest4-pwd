<!DOCTYPE html> <html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data MHS</title>
    <style>
        .error{
         color: #FF0000;
        }
    </style>
</head><body>
    <?php
        //define variables and set to empty values
        $namaErr = $nimErr = $genderErr = $prodiErr= $emailErr = $websiteErr =
        $alamatErr = "";
        $nama = $nim = $gender = $prodi = $email = $website = $alamat = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["nama"])){
                $namaErr = "Nama harus diisi";
            }else{
                $nama = test_input($_POST["nama"]);         
            }if(empty($_POST["nim"])){
                $nimErr = "Nim harus diisi";
            }else{
                $nim = test_input($_POST["nim"]);
            }if(empty($_POST["gender"])){
                $genderErr = "Gender harus dipilih";
            }else{
                $gender = test_input($_POST["gender"]);
            }if(empty($_POST["prodi"])){
                $prodiErr = "Prodi harus dipilih";
            }else{
                $prodi = test_input($_POST["prodi"]);
            }if(empty($_POST["email"])){
                $emailErr = "Email harus diisi";
            }else{
                $email = test_input($_POST["email"]);
            //check if email addres is well-formed
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Email tidak sesuai format";
                }
            }
            if(empty($_POST["website"])){
                $website = "";
            }else{
                $website = test_input($_POST["website"]);
            }if(empty($_POST["alamat"])){
                $alamat = "";
            }else{
                $alamat = test_input($_POST["alamat"]);
            }
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
 
        <h2>Formulir Data Mahasiswa</h2>
        <p><span class="error">*Harus Diisi.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table cellpadding=5>
            <tr>
                <td>Nama</td>
                <td>:<input type="text" name="nama">
                <span class="error">*<?php echo $namaErr;?></span></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:<input type="number" name="nim">
                <span class="error">*<?php echo $nimErr;?></span></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:<input type="radio" name="gender" value="L">Laki-laki
                <input type="radio" name="gender" value="P">Perempuan
                <span class="error">*<?php echo $genderErr;?></span></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:<select name="prodi" >
                    <option>Teknik Informatika</option>
                    <option>Teknik Industri</option>
                    <option>Teknik Kimia</option>
                    <option>Teknik Elektro</option>
                    <option>Teknologi Pangan</option>
                </select >
                <span class="error">*<?php echo $prodiErr;?></span></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:<input type="text" name="email">
                <span class="error">*<?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td>Website</td>
                <td>:<input type="text" name="website">
                <span class="error">*<?php echo $websiteErr;?></span></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:<textarea name="alamat" rows="5" cols="40"></textarea></t d>
            </tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </table>
    </form>
    <?php

    echo "<h2>Data Mahasiswa Yang Diisi :</h2>";
    echo "<table  border=2 width = 450 cellspacing=8 cellpadding=8 bgcolor= #FFB6C1>
    <tr>
        <td>Nama </td>
        <td>: $nama </td>
    </tr>
    <tr>
        <td>NIM </td>
        <td>: $nim </td>
    </tr>
    <tr>
        <td>Gender </td>
        <td>: $gender </td>
    </tr>
    <tr >
        <td>Prodi</td>
        <td>: $prodi </td>
    </tr>
    <tr>
        <td>E-mail </td>
        <td>: $email </td>
    </tr> 
    <tr>
        <td>Website </td>
        <td>: $website </td>
    </tr>
    <tr>
        <td>Alamat </td>
        <td>: $alamat </td>
    </tr> 
    </table>"; 
?>
</body>
</html>