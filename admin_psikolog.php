<form action="insert_psikolog.php" method="POST" enctype="multipart/form-data">
    <label for="nama_lengkap">Nama Lengkap:</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" required><br>

    <label for="nomor_lisensi">Nomor Lisensi:</label>
    <input type="text" name="nomor_lisensi" id="nomor_lisensi" required><br>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender" required>
        <option value="male">Laki-laki</option>
        <option value="female">Perempuan</option>
    </select><br>

    <label for="usia_range">Usia:</label>
    <select name="usia_range" id="usia_range" required>
        <option value="25-30">25 - 30 tahun</option>
        <option value="30-35">30 - 35 tahun</option>
        <option value=">35">> 35 tahun</option>
    </select><br>

    <label for="spesialis">Spesialis:</label>
    <select name="spesialis" id="spesialis" required>
        <option value="klinis">Psikolog Klinis</option>
        <option value="konseling">Psikolog Konseling</option>
        <option value="anak-remaja">Psikolog Anak dan Remaja</option>
    </select><br>

    <label for="kualifikasi">Kualifikasi:</label>
    <textarea name="kualifikasi" id="kualifikasi"></textarea><br>

    <label for="pengalaman_tahun">Pengalaman Tahun:</label>
    <input type="number" name="pengalaman_tahun" id="pengalaman_tahun" required><br>

    <label for="biaya_konsultasi">Biaya Konsultasi:</label>
    <input type="number" name="biaya_konsultasi" id="biaya_konsultasi" required><br>

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi"></textarea><br>

    <label for="penilaian">Penilaian (0-5):</label>
    <input type="number" step="0.1" name="penilaian" id="penilaian" min="0" max="5"><br>

    
    <h3 class="font-bold text-sky-700">Issues</h3>
    <div class="flex flex-wrap gap-2 mt-2">
        <label><input type="checkbox" name="issues" value="1"> Depresi</label>
        <label><input type="checkbox" name="issues" value="2"> Gangguan kecemasan</label>
        <label><input type="checkbox" name="issues" value="3"> Gangguan Kepribadian</label>
        <label><input type="checkbox" name="issues" value="4"> Gangguan makan</label>
        <label><input type="checkbox" name="issues" value="5"> PTSD</label><br>
        <label><input type="checkbox" name="issues" value="6"> Transisi hidup</label>
        <label><input type="checkbox" name="issues" value="7"> Stress</label>
        <label><input type="checkbox" name="issues" value="8"> kepercayaan diri</label>
        <label><input type="checkbox" name="issues" value="9"> Pengelolaan emosi</label><br>
        <label><input type="checkbox" name="issues" value="10"> Gangguan belajar</label>
        <label><input type="checkbox" name="issues" value="11"> Masalah perilaku</label>
        <label><input type="checkbox" name="issues" value="13"> Bullying</label>
        <label><input type="checkbox" name="issues" value="12"> Trauma masa kecil</label>
        <label><input type="checkbox" name="issues" value="14"> Masalah perkembangan</label>
    </div>


    <label>Foto:</label>
    <input type="file" name="foto" required>
    <br>

    <button type="submit">Submit</button>
</form>
