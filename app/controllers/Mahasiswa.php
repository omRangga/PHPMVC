<?php  

class Mahasiswa extends Controller {
	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

		public function detail($id)
	{
		$data['judul'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		} else{
				Flasher::setFlash('berhasil', 'ditambahkan', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}
		public function hapus()
	{
		if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ){
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		} else{
				Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
 			exit;
		}
	}

	public function getubah()
	{
		json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
	}

	public function ubah()
	{
		if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
			Flasher::setFlash('berhasil', 'ubah', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		} else{
				Flasher::setFlash('gagal', 'ubah', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
 			exit;

	}
}

public function cari()
{
	$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->cariData();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
}
