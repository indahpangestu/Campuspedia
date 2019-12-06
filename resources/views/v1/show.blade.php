<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Pendaftaran Siswa</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h2 align="center" >DETAIL DATA SISWA</h2><br />
<table width="500px" align="center" class="table-striped">
<tr>
        <td>Kode Siswa</td>
        <td>:</td>
        <td>{{$siswa->id}}</td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td>{{$siswa->nama}}</td>
    </tr>
    <tr>
        <td>No Handphone</td>
        <td>:</td>
        <td>{{$siswa->nohp}}</td>
    </tr>
    <tr>
        <td>Alamat Email</td>
        <td>:</td>
        <td>{{$siswa->email}}</td>
    </tr>
    <tr>
        <td>Data Ditambahkan</td>
        <td>:</td>
        <td>{{$siswa->created_at}}</td>
    </tr>
    <tr>
        <td>Data Terakhir Diedit</td>
        <td>:</td>
        <td>{{$siswa->updated_at}}</td>
    </tr>
</table>
<div align='center'>
<a href="{{action('SiswaController@index', $siswa['id'])}}" class="btn btn-primary" >Kembali</a>
</div>
</div>
</body>
</html>