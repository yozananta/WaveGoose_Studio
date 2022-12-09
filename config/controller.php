<?php

function select($query){
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}


//..............................................PUNYA PERSEWAAN...................................................//


function create_persewaan($post)
{
    global $koneksi;

    $id_alat = $post['id_alat'];
    $tgl_sewa = $post['tgl_sewa'];
    $tgl_kembali = $post['tgl_kembali'];
    $nama_customer = $_SESSION['user_id'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];

    $query = "INSERT INTO t_sewa VALUES (null, '$id_alat','$tgl_sewa', '$tgl_kembali','$nama_customer', '$alamat', '$telepon')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_persewaan($post)
{
    global $koneksi;

    $id_sewa = $post['id_sewa'];
    $id_alat = $post['id_alat'];
    $tgl_sewa = $post['tgl_sewa'];
    $tgl_kembali = $post['tgl_kembali'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];

    $query = "UPDATE t_sewa SET id_alat = '$id_alat', tgl_sewa = '$tgl_sewa' , tgl_kembali = '$tgl_kembali' , alamat = '$alamat', telepon = '$telepon' WHERE id_sewa = $id_sewa";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_persewaan($id_sewa)
{
    global $koneksi;

    $query = "DELETE FROM t_sewa WHERE id_sewa = $id_sewa";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



//..............................................PUNYA SEWA STUDIO...................................................//


function create_sewastudio($post)
{
    global $koneksi;

    $id_studio = $post['id_studio'];
    $tgl_latihan = $post['tgl_latihan'];
    $waktu = $post['waktu'];
    $nama_customer = $_SESSION['user_id'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];

    $query = "INSERT INTO t_sewastudio VALUES (null, '$id_studio','$tgl_latihan', '$waktu','$nama_customer', '$alamat', '$telepon')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_sewastudio($post)
{
    global $koneksi;

    $id_pesan = $post['id_pesan'];
    $id_studio = $post['id_studio'];
    $tgl_latihan = $post['tgl_latihan'];
    $waktu = $post['waktu'];
    $nama_customer = $post['nama_customer'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];

    $query = "UPDATE t_sewastudio SET id_studio = '$id_studio', tgl_latihan = '$tgl_latihan' , waktu = '$waktu' , nama_customer = '$nama_customer', alamat = '$alamat', telepon = '$telepon' WHERE id_pesan = $id_pesan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_sewastudio($id_pesan)
{
    global $koneksi;

    $query = "DELETE FROM t_sewastudio WHERE id_pesan = $id_pesan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}






// // //..............................................PUNYA ALAT...................................................//



function create_alat($post)
{
    global $koneksi;

    $nama_alat = $post['nama_alat'];
    $harga = $post['harga'];

    $query = "INSERT INTO t_alat VALUES (null, '$nama_alat','$harga')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    

}

function update_alat($post)
{
    global $koneksi;

    $id_alat = $post ['id_alat'];
    $nama_alat = $post['nama_alat'];
    $harga = $post['harga'];

    $query = "UPDATE t_alat SET nama_alat = '$nama_alat', harga = '$harga'  WHERE id_alat = $id_alat";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_alat($id_alat)
{
    global $koneksi;

    $query = "DELETE FROM t_alat WHERE id_alat = $id_alat";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



// // //..............................................PUNYA STUDIO...................................................//



function create_studio($post)
{
    global $koneksi;

    $nama_studio = $post['nama_studio'];
    $harga_studio = $post['harga_studio'];

    $query = "INSERT INTO t_studio VALUES (null, '$nama_studio','$harga_studio')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    

}

function update_studio($post)
{
    global $koneksi;

    $id_studio = $post ['id_studio'];
    $nama_studio = $post['nama_studio'];
    $harga_studio = $post['harga_studio'];

    $query = "UPDATE t_studio SET nama_studio = '$nama_studio', harga_studio = '$harga_studio'  WHERE id_studio = $id_studio";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_studio($id_studio)
{
    global $koneksi;

    $query = "DELETE FROM t_studio WHERE id_studio = $id_studio";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
// // //..............................................PUNYA AKUN...................................................//



function create_user($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    $query = "INSERT INTO t_user VALUES (null, '$nama','$username','$password','$level')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    

}


function update_user($post)
{
    global $koneksi;

    $id_user = $post ['id_user'];
    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    $query = "UPDATE t_user SET nama = '$nama', username = '$username' , password = '$password' , level = '$level' WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_user($id_user)
{
    global $koneksi;

    $query = "DELETE FROM t_user WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}