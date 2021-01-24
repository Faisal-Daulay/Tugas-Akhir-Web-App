<?php

	include '../include/config.php';
	if ($_POST) {
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);
		$userMsg = htmlentities($_POST['userMsg']);

		if ($username!="") {
			$sql = "INSERT INTO saran_siswa(nama, email, pesan) VALUES(:nama, :email, :pesan)";
			$query = $db -> prepare($sql);
			$query -> bindParam(':nama', $username);
			$query -> bindParam(':email', $email);
			$query -> bindParam(':pesan', $userMsg);
			$query -> execute();			

            echo"
                <script>
                    alert('Pesan telah berhasil di kirim');
                    window.location.href='index.php'
                </script>
            ";
		} else {

            echo"
                <script>
                	alert('Pesan gagal di kirim');
                    window.location.href='?page=contact.php'
                </script>
            ";
		}
	} else {

        echo"
            <script>
                alert('Pesan gagal di kirim');
                window.location.href='?page=contact.php'
            </script>
        ";
	}