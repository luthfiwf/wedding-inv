-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 09:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getseny_wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `jam_sampai` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_res` date NOT NULL,
  `jam_res` time NOT NULL,
  `jam_res_sampai` time NOT NULL,
  `tempat_res` varchar(100) NOT NULL,
  `alamat_res` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `tanggal`, `jam`, `jam_sampai`, `tempat`, `alamat`, `tanggal_res`, `jam_res`, `jam_res_sampai`, `tempat_res`, `alamat_res`) VALUES
(1, '2021-08-01', '08:00:00', '10:00:00', 'Villa Joglo', 'Jl. Sariwangi, RT.001/003, Desa Sariwangi, Kec. Parongpong, Kab. Bandung Barat', '2021-08-01', '11:00:00', '14:00:00', 'Villa Joglo', 'Jl. Sariwangi, RT.001/003, Desa Sariwangi, Kec. Parongpong, Kab. Bandung Barat');

-- --------------------------------------------------------

--
-- Table structure for table `cerita`
--

CREATE TABLE `cerita` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_cerita` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cerita`
--

INSERT INTO `cerita` (`id`, `judul`, `isi_cerita`, `tanggal`, `foto`) VALUES
(3, 'First Meet', '   Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ducimus asperiores architecto necessitatibus, nulla facilis rerum cumque quaerat sapiente molestiae tenetur fuga sit velit corporis, a quos ut provident impedit.', '2021-03-28', '186-story-1.jpg'),
(5, 'First Date', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ducimus asperiores architecto necessitatibus, nulla facilis rerum cumque quaerat sapiente molestiae tenetur fuga sit velit corporis, a quos ut provident impedit.', '2021-03-30', '863-story-2.jpg'),
(6, 'Engangement', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ducimus asperiores architecto necessitatibus, nulla facilis rerum cumque quaerat sapiente molestiae tenetur fuga sit velit corporis, a quos ut provident impedit.', '2020-08-10', 'story-3.jpg'),
(7, 'Marriage', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ducimus asperiores architecto necessitatibus, nulla facilis rerum cumque quaerat sapiente molestiae tenetur fuga sit velit corporis, a quos ut provident impedit.', '2021-08-01', 'story-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_wa`
--

CREATE TABLE `data_wa` (
  `id` int(11) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `format_wa` text NOT NULL,
  `isi_wa` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `var_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `ket_foto` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `ket_foto`, `foto`) VALUES
(2, 'Prewed', '84-1.jpg'),
(4, '', '459-2.jpg'),
(5, '', '476-3.jpg'),
(6, '', '5.jpg'),
(7, '', '4.jpg'),
(8, '', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasangan`
--

CREATE TABLE `pasangan` (
  `id` int(11) NOT NULL,
  `sambutan` text NOT NULL,
  `foto_wanita` text NOT NULL,
  `nama_wanita` varchar(50) NOT NULL,
  `ket_wanita` text NOT NULL,
  `foto_pria` text NOT NULL,
  `nama_pria` varchar(50) NOT NULL,
  `ket_pria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasangan`
--

INSERT INTO `pasangan` (`id`, `sambutan`, `foto_wanita`, `nama_wanita`, `ket_wanita`, `foto_pria`, `nama_pria`, `ket_pria`) VALUES
(1, ' Maha Suci Allah yang telah menciptakan Makhluk-nya berpasang-pasangan. Ya Allah semoga ridhomu tercurah mengiringi pernikahan kami.\r\n', '4.jpg', 'Amel Purnamasari, S.Pd', 'Putri Kesatu dari Keluarga\r\nBapak Asep Rukmana (Alm) & Ibu Titi Rohaeti\r\n', '4.jpg', 'Lutfi Waziirul Fazri, S.Kom.', 'Putra ketiga dari\r\nBapak H. Cepi Setia Wiguna & Ibu Hj. Edah Jubaedah\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `konfirmasi` varchar(10) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `jumlah`, `konfirmasi`, `pesan`, `waktu`) VALUES
(1, 'Abdul', '2', 'datang', 'Semoga menjadi keluarga sakinah mawaddah warrahmah', '2021-03-31 07:04:49'),
(2, 'Lutfi Waziirul Fazri', '2', 'datang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, provident blanditiis similique ex impedit repellat obcaecati exercitationem delectus dicta facilis.', '2021-03-31 07:29:23'),
(3, 'joni iskandar', '2', 'datang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, provident blanditiis similique ex impedit repellat obcaecati exercitationem delectus dicta facilis.', '2021-03-31 07:52:36'),
(4, 'kuswanto', '1', 'datang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, provident blanditiis similique ex impedit repellat obcaecati exercitationem delectus dicta facilis.', '2021-03-31 07:55:10'),
(5, 'Ahmad', '1', 'datang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quasi dolorem possimus ex quis blanditiis.', '2021-03-31 09:50:08'),
(6, 'Jaelani', '2', 'datang', 'Selamat hey â¤ï¸â¤ï¸', '2021-03-31 11:16:59'),
(7, 'Imil Purnimisiri', '2', 'datang', 'Silimit yiii ', '2021-04-02 07:33:08'),
(8, 'Usep', '2', 'datang', 'Selamat', '2021-05-24 14:01:40'),
(9, 'utun ingi', '1', 'datang', 'selamat eya', '2021-06-09 06:45:03'),
(10, 'Wa entis', '2', 'datang', 'aaaaaaaaaaaaaaaaa', '2021-06-09 06:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider` text NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pasangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider`, `judul`, `pasangan`, `tanggal`, `aktif`) VALUES
(1, '718-slide-1.jpg', 'The Wedding Of', 'Amel & Lutfi', '2021-08-01', 'active'),
(2, 'slide-2.jpg', 'We Are Getting Maried', 'Amel & Lutfi', '2021-08-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_wa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id`, `nama`, `no_wa`) VALUES
(3, 'Lutfi Waziirul Fazri', '+6285723828011'),
(4, 'Lutfi Waziirul Fazri', '+6288809407743'),
(5, 'aaaa', '+80757397593'),
(6, 'aaaaaaaaaaaaa', '+62867637476');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cerita`
--
ALTER TABLE `cerita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_wa`
--
ALTER TABLE `data_wa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasangan`
--
ALTER TABLE `pasangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cerita`
--
ALTER TABLE `cerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_wa`
--
ALTER TABLE `data_wa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pasangan`
--
ALTER TABLE `pasangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
