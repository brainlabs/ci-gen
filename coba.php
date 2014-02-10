

form_input(
                                array(
                                 'name'  => 'nama_pegawai',
                                 'id'    => 'nama_pegawai',                       
                                 'class' => 'form-control input-sm  required',
                                 'placeholder' => 'Nama Pegawai',
                                 ),
                                 set_value('nama_pegawai',$table_name['nama_pegawai'])
                           );

form_input(
                                array(
                                 'name'  => 'nomor_ktp',
                                 'id'    => 'nomor_ktp',                       
                                 'class' => 'form-control input-sm  required',
                                 'placeholder' => 'Nomor Ktp',
                                 ),
                                 set_value('nomor_ktp',$table_name['nomor_ktp'])
                           );

form_input(
                                array(
                                 'name'  => 'nik',
                                 'id'    => 'nik',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Nik',
                                 ),
                                 set_value('nik',$table_name['nik'])
                           );

form_dropdown(
                           'jabatan_id',
                           $jabatan,  
                           set_value('jabatan_id'),
                           'class="input-sm "'
                           );

form_input(
                                array(
                                 'name'  => 'tempat_lahir',
                                 'id'    => 'tempat_lahir',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Tempat Lahir',
                                 ),
                                 set_value('tempat_lahir',$table_name['tempat_lahir'])
                           );

form_input(
                                array(
                                 'name'  => 'tanggal_lahir',
                                 'id'    => 'tanggal_lahir',                       
                                 'class' => 'form-control input-sm  required',
                                 'placeholder' => 'Tanggal Lahir',
                                 ),
                                 set_value('tanggal_lahir',$table_name['tanggal_lahir'])
                           );

form_input(
                                array(
                                 'name'  => 'jenis_kelamin',
                                 'id'    => 'jenis_kelamin',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Jenis Kelamin',
                                 ),
                                 set_value('jenis_kelamin',$table_name['jenis_kelamin'])
                           );

form_input(
                                array(
                                 'name'  => 'nama_ibu_kandung',
                                 'id'    => 'nama_ibu_kandung',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Nama Ibu Kandung',
                                 ),
                                 set_value('nama_ibu_kandung',$table_name['nama_ibu_kandung'])
                           );

form_input(
                                array(
                                 'name'  => 'agama_id',
                                 'id'    => 'agama_id',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Agama Id',
                                 ),
                                 set_value('agama_id',$table_name['agama_id'])
                           );

form_input(
                                array(
                                 'name'  => 'status_nikah_id',
                                 'id'    => 'status_nikah_id',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Status Nikah Id',
                                 ),
                                 set_value('status_nikah_id',$table_name['status_nikah_id'])
                           );

form_input(
                                array(
                                 'name'  => 'alamat',
                                 'id'    => 'alamat',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Alamat',
                                 ),
                                 set_value('alamat',$table_name['alamat'])
                           );

form_input(
                                array(
                                 'name'  => 'telepon',
                                 'id'    => 'telepon',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Telepon',
                                 ),
                                 set_value('telepon',$table_name['telepon'])
                           );

form_input(
                                array(
                                 'name'  => 'hp',
                                 'id'    => 'hp',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Hp',
                                 ),
                                 set_value('hp',$table_name['hp'])
                           );

form_input(
                                array(
                                 'name'  => 'email',
                                 'id'    => 'email',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Email',
                                 ),
                                 set_value('email',$table_name['email'])
                           );

form_input(
                                array(
                                 'name'  => 'photo',
                                 'id'    => 'photo',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Photo',
                                 ),
                                 set_value('photo',$table_name['photo'])
                           );

form_input(
                                array(
                                 'name'  => 'jumlah_anak',
                                 'id'    => 'jumlah_anak',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Jumlah Anak',
                                 ),
                                 set_value('jumlah_anak',$table_name['jumlah_anak'])
                           );

form_input(
                                array(
                                 'name'  => 'nuptk',
                                 'id'    => 'nuptk',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Nuptk',
                                 ),
                                 set_value('nuptk',$table_name['nuptk'])
                           );

form_input(
                                array(
                                 'name'  => 'tmt_pegawai',
                                 'id'    => 'tmt_pegawai',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Tmt Pegawai',
                                 ),
                                 set_value('tmt_pegawai',$table_name['tmt_pegawai'])
                           );

form_input(
                                array(
                                 'name'  => 'tmt_sekolah',
                                 'id'    => 'tmt_sekolah',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Tmt Sekolah',
                                 ),
                                 set_value('tmt_sekolah',$table_name['tmt_sekolah'])
                           );

form_input(
                                array(
                                 'name'  => 'pendidikan_terakhir',
                                 'id'    => 'pendidikan_terakhir',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Pendidikan Terakhir',
                                 ),
                                 set_value('pendidikan_terakhir',$table_name['pendidikan_terakhir'])
                           );

form_input(
                                array(
                                 'name'  => 'jurusan',
                                 'id'    => 'jurusan',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Jurusan',
                                 ),
                                 set_value('jurusan',$table_name['jurusan'])
                           );

form_input(
                                array(
                                 'name'  => 'nama_lembaga',
                                 'id'    => 'nama_lembaga',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Nama Lembaga',
                                 ),
                                 set_value('nama_lembaga',$table_name['nama_lembaga'])
                           );

form_input(
                                array(
                                 'name'  => 'tahun_lulus',
                                 'id'    => 'tahun_lulus',                       
                                 'class' => 'form-control input-sm ',
                                 'placeholder' => 'Tahun Lulus',
                                 ),
                                 set_value('tahun_lulus',$table_name['tahun_lulus'])
                           );

form_radio(
                            array(
                                 'name'  => 'status_pegawai',
                                 'id'    => 'status_pegawai',                       
                                 'class' => 'form-control input-sm  required',                                 
                                 ) 
                           );

