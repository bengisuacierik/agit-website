<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>İletişim Formundan Gelen Veriler</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Konu</th>
    <th>Mesaj</th>
  </tr>

  <?php
  session_start();
  if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    echo "<script>window.location.href='cikis.php';</script>";
    exit();
}

  else {
        include("baglanti.php");

        $sec = "SELECT * FROM iletisim";
        $sonuc = $baglan->query($sec);

        if ($sonuc->num_rows > 0) {
            while ($cek = $sonuc->fetch_assoc()) {
                echo "<tr>
                    <td>".$cek['adsoyad']."</td>
                    <td>".$cek['telefon']."</td>
                    <td>".$cek['email']."</td>
                    <td>".$cek['konu']."</td>
                    <td>".$cek['mesaj']."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Veri bulunamadı.</td></tr>";
        }
  }
?>
  <tr>
    <td>Ali Çetin</td>
    <td>05555555555</td>
    <td>ali.cetin@gmail.com</td>
    <td>Tebrik Mesajı</td>
    <td>Etkinlik çok keyifliydi.</td>
    
  </tr>
  
</table>

</body>
</html>
