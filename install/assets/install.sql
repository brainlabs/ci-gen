--
-- Paste your SQL dump into this file
--

CREATE TABLE IF NOT EXISTS `jurnals` (
  `jurnal_id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `uraian` text,
  `shift` char(4) DEFAULT NULL,
  PRIMARY KEY (`jurnal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;



--
-- Struktur dari tabel `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `no_telepon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`operator_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  ;